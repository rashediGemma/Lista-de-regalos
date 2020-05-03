<?php
/**
* Template Name: Ayuda
*/

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

global $page_key;
$page_key='';

get_header('my-account'); ?>

<?php LR_Layout::display_user_menu_top(); ?>
<div class="content">
  <div class="container-fluid help_wrapper">
    <div class="row">
      <div class="col-12">
        <h1 class="title"><?=__('Preguntas frecuentes', 'lr');?></h1>
      </div>
      <div class="col-12">
        <h3 class="question">¿Cómo creo una lista?</h3>
        <p>Al menú de la izquierda encontrarás "Mis listas", dale click y podrás añadir una nueva lista. Solo tendrás que introducir los datos principales de la lista y añadir regalos a tu nueva lista.</p>
      </div>
      <div class="col-12">
        <h3 class="question">¿Cómo añado regalos una lista?</h3>
        <p>Puedes añadir regalos al crear una nueva lista o una vez creada se pueden ir introduciendo regalos. Para eso solo tienes que elegir la lista que quieres añadir los regalos e ir añadiendo.</p>
      </div>
      <div class="col-12">
        <h3 class="question">¿Cómo comparto mis listas?</h3>
        <p>Para que tus amigos puedan ver tu lista, primero tienes que tener una lista de contactos. Puedes compartir tus listas con todos tus contactos o elegir los que quieras que la vean</p>
      </div>
      <div class="col-12">
        <h3 class="question">¿Cómo añado un contacto nuevo?</h3>
        <p>Al menú de la izquierda encontrarás "Contactos", dale click y podrás buscar por nombre, apellido o nombre de usuario, el amigo que quieres agregar. Solo saldrán esas personas que están registradas. Si no están registradas, díselo para que lo hagan y así poder compartir vuestras listas.</p>
      </div>
      <div class="col-12">
        <h3 class="question">¿Una vez agregado un contacto, ya puedo ver sus listas y compartir las mías?</h3>
        <p>No, cuando encuentras un contacto que quieres añadir, primero se manda una solicitud de amistad y tienes que esperar que esa persona acepte estar conectada contigo para poder empezar a compartir.</p>
      </div>
      <div class="col-12">
        <h3 class="question">¿Puedo modificar los regalos una vez creada la lista?</h3>
        <p>Se pueden modificar siempre y cuando no estén ya comprados. Hay la opción de poder ver si quieres ver los regalos comprados. Si eliges no verlos e intentas modificar o eliminar alguno comprado, entonces si que verás que no puedes y significa que está comprado.</p>
      </div>
      <div class="col-12">
        <h3 class="question">¿Puedo personalizar mi perfil?</h3>
        <p>En el menú desplegable de la izquierda (donde aparece tu nombre), puedes rellenar tus datos personales y cambiar tu foto de perfil. Además también puedes indicar que notificaciones en la web o por correo quieres recibir.</p>
      </div>
      <div class="col-12">
        <h3 class="question">¿Para qué sirve el apartado mis compras?</h3>
        <p>A veces queremos llevar un resumen de todas nuestras compras para saber que nos gastamos o para saber año tras año que hemos comprado a cada persona y no repetir. Aquí puedes ir añadiendo tus regalos para así poder tener una mejor organización.</p>
      </div>
      <div class="col-12">
        <h3 class="question">¿Cuál es la relación con las listas de los amigos?</h3>
        <p>Al marcar un regalo como comprado en una lista de un amigo, automáticamente se te añadirá en tus compras. Solo tendrás que añadir el precio que te ha costado.</p>
      </div>
      <div class="col-12">
        <h3 class="question">¿Puedo añadir una persona que no está en mis contactos en mis compras?</h3>
        <p>Si, no todos tus amigos o familiaries pueden estar registrados y aún así puedes querer llevar la cuenta de sus regalos. Para eso solo tienes que elegir la opción de no está entre mis contactos y así poder escribir su nombre. Si en un futuro se registra en la web, podrás cambiar esa persona y elegirla entre tus contactos-</p>
      </div>
      <div class="col-12">
        <h3 class="question">¿Tienes más preguntas o has visto que algo no funciona correctamente?</h3>
        <p>Si es así, no dudes en escribirnos a info@lista-regalos.com y preguntarnos. Estaremos encantados de poder ayudarte.</p>
      </div>
    </div>
  </div>
</div><!-- #primary -->

<?php

get_footer('my-account');
