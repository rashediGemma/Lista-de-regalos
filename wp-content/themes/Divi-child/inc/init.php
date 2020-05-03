<?php

class LR_Init {

  function __construct(){

    $this->include_classes();
  }


  public function include_classes() {
    $array_classes=['user', 'layout', 'tools', 'gifts', 'lists', 'shoppings', 'crons', 'contacts', 'notifications', 'emails'];
    foreach ($array_classes as $array_class) {
      require ('classes/'.$array_class.'.php');
    }
  }

}


new LR_Init();
