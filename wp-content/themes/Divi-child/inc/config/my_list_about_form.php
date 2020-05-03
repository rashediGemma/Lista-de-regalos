<?php

$config=array(
  array(
    'name' => 'title',
    'text' => __('Titulo', 'lr'),
    'type' => 'text',
    'required' => true,
    'thead' => __('Nombre', 'lr'),
    'tooltip' => __('Escribe el título de tu lista', 'lr'),
    'value' => LR_Lists::get_value('title'),
  ),
  array(
    'name' => 'description',
    'text' => __('Descripción', 'lr'),
    'type' => 'text',
    'required' => false,
    'thead' => __('Descripción', 'lr'),
    'tooltip' => __('Indica una descripción sobre esta lista', 'lr'),
    'value' => LR_Lists::get_value('description'),
  ),
  array(
    'name' => 'visibility',
    'text' => __('¿Quién puede ver la lista?', 'lr'),
    'type' => 'radio',
    'options' => array(
      'public' => __('Todos mis contactos', 'lr'),
      'contacts' => __('Escoger contactos'),
    ),
    'tooltip' => __('Indica si quieres que sea pública o quieres escoger qué contactos la verán', 'lr'),
    'required' => true,
    'thead' => __('Visibilidad', 'lr'),
    'value' => LR_Lists::get_value('visibility'),
  ),
  array(
    'name' => 'contacts',
    'text' => __('Contactos', 'lr'),
    'type' => 'select',
    'multiple' => 'multiple',
    'options' => LR_Lists::get_contacts_for_list(),
    'tooltip' => __('Selecciona solo los contactos que quieres que vean la lista', 'lr'),
    'required' => true,
    'value' => LR_Lists::get_value('contacts'),
  ),
  array(
    'name' => 'created_date',
    'show_form' => false,
    'thead' => __('Fecha de creación', 'lr'),
  ),
  array(
    'name' => 'date',
    'text' => __('Fecha cierre de la lista', 'lr'),
    'type' => 'date',
    'required' => false,
    'thead' => __('Fecha de cierre', 'lr'),
    'tooltip' => __('Fecha en que la lista se cerrará automáticamente. Dejar vacio si no quieres que se cierre', 'lr'),
    'value' => LR_Lists::get_value('date'),
  ),
  array(
    'name' => 'gifts',
    'show_form' => false,
    'thead' => __('Regalos', 'lr'),
  ),
  array(
    'name' => 'gifts_buyed',
    'text' => __('Ver regalos comprados', 'lr'),
    'type' => 'radio',
    'options' => array(
      'true' => __('Quiero verlos', 'lr'),
      'false' => __('No quiero verlos'),
    ),
    'required' => true,
    'thead' => __('Regalos comprados', 'lr'),
    'tooltip' => __('Si selecciona quiero verlos, verá que regalos ya se han comprado pero nunca se mostrará el nombre de la persona y podrá editar los regalos no comprados aún. Si no quiere ver los regalos comprados, no se podrán eliminar ni editar los antiguos para evitar ver si ya están comprados.', 'lr'),
    'value' => LR_Lists::get_value('gifts_buyed'),
  ),
  array(
    'name' => 'status',
    'show_form' => false,
    'thead' => __('Estado', 'lr'),
  ),
);

?>
