<?php
  $config=array(
    array(
      'name' => 'gift_name',
      'text' => __('Nombre', 'lr'),
      'type' => 'text',
      'required' => true,
      'width' => 'col-md-6'
    ),
    array(
      'name' => 'gift_note',
      'text' => __('Nota', 'lr'),
      'type' => 'textarea',
      'required' => false,
      'width' => 'col-md-6'
    ),
    array(
      'name' => 'gift_priority',
      'text' => __('Importancia', 'lr'),
      'type' => 'radio',
      'options' => array(
        'must' => __('Quiero tenerlo', 'lr'),
        'want' => __('Me gustaría tenerlo'),
      ),
      'required' => true,
      'width' => 'col-md-6'
    ),
    array(
      'name' => 'gift_link',
      'text' => __('Link', 'lr'),
      'type' => 'text',
      'required' => false,
      'width' => 'col-md-6'
    ),
    array(
      'name' => 'gift_buyed',
      'text' => '',
      'type' => 'radio',
      'options' => array(
        'buyed' => __('Comprado', 'lr'),
      ),
      'required' => true,
      'width' => 'col-md-6'
    ),
    /*array(
      'name' => 'gift_image',
      'text' => __('Imágenes', 'lr'),
      'type' => 'files',
      'required' => false,
      'width' => 'col-md-12'
    ),*/
  );
?>
