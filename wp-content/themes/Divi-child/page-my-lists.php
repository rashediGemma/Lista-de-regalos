<?php
/**
* Template Name: Mis listas
*/

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

global $page_key;
$page_key='my_lists';
$lists=LR_Lists::get_lists(get_current_user_id(), '');
$columns=LR_Lists::get_columns_lists();

get_header('my-account'); ?>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <a href="<?=get_permalink( get_page_by_path( 'nueva-lista' ) );?>" class="btn btn-info"><?=__('Añadir lista', 'lr');?></a>
      </div>
      <div class="col-md-12">
        <?php if (count($lists)==0) {
          echo '<br/><br/><h5>'.__('Aún no tienes ninguna lista. Empieza a crear una.', 'lr').'</h5>';
        }  else { ?>
          <div class="card">
            <div class="card-body">
              <div class="material-datatables">
                <div class="row">
                  <div class="col-sm-12 table-responsive">
                    <table id="datatables" class="table table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                      <thead>
                        <tr>
                          <?php foreach ($columns as $column) {
                            if ($column['name']=='contacts') { continue; }
                            echo '<th>'.$column['thead'].'</th>';
                          } ?>
                          <th><?=__('Acciones', 'lr');?></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($lists as $list) { ?>
                          <tr class="list status-<?=get_post_status($list);?>">
                            <?php foreach ($columns as $column) {
                              if ($column['name']=='contacts') { continue; }
                              echo '<td><a href="'.get_permalink( get_page_by_path( 'nueva-lista' ) ).'?id='.get_post_meta($list, 'list_identifier', true).'">';
                              if (isset($column['show_form'])) {
                                if ($column['name']=='created_date') { echo get_the_date('d-m-Y', $list); }
                                else if ($column['name']=='gifts') { echo count(LR_Gifts::get_gifts_list($list)); }
                                else if ($column['name']=='status') { echo __(LR_Lists::$status[get_post_status($list)]['name'], 'lr'); }
                              } else {
                                if ($column['name']=='visibility') {
                                  LR_Lists::show_visibility_list(get_post_meta($list, $column['name'], true), $list);
                                } else if ($column['name']=='gifts_buyed') { echo LR_Gifts::get_gifts_buyed_list($list); }
                                else {
                                  echo get_post_meta($list, $column['name'], true);
                                }
                              }
                              echo '</a></td>';
                            } ?>
                            <td class="icons-actions-list"><?=LR_Lists::get_icons_functions($list, get_post_status($list));?></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div><!-- #primary -->

<?php

get_footer('my-account');
