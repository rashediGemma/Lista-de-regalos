<?php
/**
 * Admin search results
 */

if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

if ( ! isset( $products ) || ! is_array( $products ) )
    return;

?>
<div class="aawp-ajax-search-items">
    <?php foreach( $products as $product ) { ?>

        <?php if ( empty( $product['asin'] ) || ! isset( $product['images'][0]['small'] ) || empty( $product['title'] ) )
            continue; ?>

        <div class="aawp-ajax-search-item" data-aawp-ajax-search-item="<?php echo $product['asin']; ?>">
            <span class="aawp-ajax-search-item__thumb">
                <img src="<?php echo $product['images'][0]['small']; ?>" alt="thumbnail" />
            </span>
            <span class="aawp-ajax-search-item__content">
                <span class="aawp-ajax-search-item__title">
                <?php echo aawp_truncate_string( $product['title'], 40 ); ?>
            </span>
            <?php if ( ! empty( $product['pricing']['display']['formatted'] ) ) { ?>
                <span class="aawp-ajax-search-item__price">
                    <?php echo $product['pricing']['display']['formatted']; ?>
                    <?php if ( ! empty( $product['pricing']['prime'] ) ) { ?>
                        <span class="aawp-check-prime"></span>
                    <?php } ?>
                </span>
            <?php } ?>
        </div>
    <?php } ?>
</div>


