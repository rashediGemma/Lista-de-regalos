jQuery(document).ready(function($) {

  $('[data-toggle="tooltip"]').tooltip();

  // Initialise the wizard
  if ($("#wizardProfile").length) {
    demo.initMaterialWizard();
    setTimeout(function() {
      $('.card.card-wizard').addClass('active');
    }, 600);
  }

  if ($("input.datepicker").length) {
    md.initFormExtendedDatetimepickers();
  }

  $("input.datepicker").on("blur", function() {
    if($("input.datepicker").val()!='') {
      $("input.datepicker").parent().addClass("is-filled");
    } else {
      $("input.datepicker").parent().removeClass("is-filled");
    }
  });

  $("#lr_add_gift").on("click", function(){
    var priority_parent=$(".lr_gifts_accordion:first-child input[type='radio']:checked").val();
    $(".lr_gifts_accordion:first-child").clone().appendTo(".lr_gifts_accordion_wrap");
    $(".lr_gifts_accordion:last-child").find("input, textarea, select").val("").prop("checked", false);
    $(".lr_gifts_accordion:last-child").find(".bmd-form-group").removeClass("is-filled").removeClass("has-success");
    $(".lr_gifts_accordion:last-child").removeClass("gift_existing");
    $(".lr_gifts_accordion:last-child").find(".gift_link_wrapper:nth-child(2)").remove();
    $(".lr_gifts_accordion.d-none").remove();
    var accordions=$(".lr_gifts_accordion").length;
    $(".lr_gifts_accordion:last-child").data("gift", accordions);
    $("input[name='gifts_number']").val(accordions);
    $(".lr_gifts_accordion:last-child input, .lr_gifts_accordion:last-child textarea").each(function(){
      var name=$(this).attr("name").split("[");
      name=name[0]+'['+accordions+']';
      $(this).attr("name", name);
    });
    $(".lr_gifts_accordion:first-child input[value='"+priority_parent+"']").prop("checked", "checked");
  });

  $(".gift-delete").live("click", function(){
    var gift=$(this).parent().data("gift");
    var accordions=$(".lr_gifts_accordion").length;
    if (accordions==1) {
      $(".lr_gifts_accordion[data-gift='"+gift+"']").addClass("d-none");
    } else {
      $(".lr_gifts_accordion").each(function(){
        if ($(this).data("gift")==gift) {
          $(this).remove();
        }
      });
    }
    var accordions=$(".lr_gifts_accordion").not(".d-none").length;
    $("input[name='gifts_number']").val(accordions);
  });

  $(".icons-actions-list .fa-trash").on("click", function(){
    var sure=confirm("¿Seguro que quieres eliminar la lista definitivamente?");
    if (sure!=true) {
      return false;
    }
    var list=$(this).data("list");
    action_list('delete_list', list);
  });

  $(".icons-actions-list .fa-eye-slash").on("click", function(){
    var list=$(this).data("list");
    action_list('hide_list', list);
  });

  $(".icons-actions-list .fa-folder").on("click", function(){
    var list=$(this).data("list");
    action_list('archive_list', list);
  });

  $(".icons-actions-list .fa-eye").on("click", function(){
    var list=$(this).data("list");
    action_list('show_list', list);
  });

  function action_list(action, list) {
    $.ajax({
      url: lr_js.ajaxurl,
      type: 'POST',
      data: {
        action: action,
        list: list,
      },
      success: function(resp) {
        location.reload();
      },
      error: function(e) {}
    });
  }

  $(".add_friendship").live("click", function(){
    var user_id=$(this).data("user");
    var sibling_span=$(this).siblings("span");
    $(this).remove();
    $(sibling_span).html("<div class='spinner-border' role='status'></div>");
    friendship_action(user_id, 'new');
  });

  $("#user-search").on('keydown', function(){
    $(".user-search-results__placeholder").html("<div class='spinner-border' role='status'></div>");
    $.ajax({
      url: lr_js.ajaxurl,
      type: 'POST',
      data: {
        action: 'search_users',
        k: $(this).val(),
      },
      success: function(resp) {
        $(".user-search-results__placeholder").html(resp);
      },
      error: function(e) {}
    });
  });


  $("input[name='visibility']").on("click", function(){
    var value=$(this).val();
    if (value=='contacts') {
      $(".input-group.form-control-lg.contacts").show();
    } else {
      $(".input-group.form-control-lg.contacts").hide();
    }
  });

  $(".add-link-gift.fa-plus").live("click", function(){
    var parnet_accordion=$(this).parents(".lr_gifts_accordion");
    var id_gift=$(parnet_accordion).data("gift");
    var parent=$(this).parent().parent();
    $(parnet_accordion).find(".form-control.gift_link").attr("name","gift_link["+id_gift+"][]");
    $(parnet_accordion).find(".gift_link_wrapper:first-child").clone().appendTo(parent);
    $(parnet_accordion).find(".gift_link_wrapper:last-child i.add-link-gift").removeClass("fa-plus").addClass("fa-trash");
  });

  $(".add-link-gift.fa-trash").live("click", function(){
    $(this).parent().remove();
  });

  $(".my_contacts_wrapper__contact i.fa-check").on("click", function() {
    var user=$(this).data("user");
    friendship_action(user, "accepted");
  });

  $(".my_contacts_wrapper__contact i.fa-times").on("click", function() {
    var sure=confirm("¿Seguro que quieres eliminar la solicitud?");
    if (sure!=true) {
      return false;
    }
    var user=$(this).data("user");
    friendship_action(user, "rejected");
  });

  function friendship_action(user_id, status) {
    $.ajax({
      url: lr_js.ajaxurl,
      type: 'POST',
      data: {
        action: 'add_friendship',
        id_user: user_id,
        status: status,
      },
      success: function(resp) {
        location.reload();
      },
      error: function(e) {}
    });
  }

  $(".lr-help-icons__link .far.fa-bell").on("click", function() {
    $(".lr-user-notifications-wrapper").slideToggle();
    return false;
  });

  $(".lr-user-notification-link").on("click", function() {
    $.ajax({
      url: lr_js.ajaxurl,
      type: 'POST',
      data: {
        action: 'notification_readed',
        notification_id: $(this).data("notification"),
      },
      success: function(resp) {
      },
      error: function(e) {}
    });
  });

  $image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:200,
      height:200,
      type:'circle'
    },
    boundary:{
      width:300,
      height:300
    }
  });

  $('#upload_image').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
  });

  $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $.ajax({
        url: lr_js.ajaxurl,
        type: 'POST',
        data: {
          action: 'save_profile_image',
          image: response,
        },
        success:function(data) {
          location.reload();
        }
      });
    })
  });

  $(".person_id").on("change", function(){
    if ($(this).val()=='0') {
      $(".other_contact").show();
    } else {
      $(".other_contact").hide();
    }
  });

  if ($(".shoppings_wrapper").length>0) {
    load_shoppings();
  };

  $(".year_shopping ul.dropdown-menu li").live("click", function(){
    load_shoppings();
  });

  function load_shoppings() {
    $(".shoppings_wrapper").html("<div class='spinner-border' role='status'></div>");
    $(".total_year span").html("<div class='spinner-border' role='status'></div>");
    $.ajax({
      url: lr_js.ajaxurl,
      type: 'POST',
      data: {
        action: 'load_shoppings',
        year: $(".year_shopping").val(),
      },
      success:function(data) {
        $(".shoppings_wrapper").html(data);
        $('[data-toggle="tooltip"]').tooltip();
      }
    });
    $.ajax({
      url: lr_js.ajaxurl,
      type: 'POST',
      data: {
        action: 'get_total_year',
        year: $(".year_shopping").val(),
      },
      success:function(data) {
        $(".total_year span").html(data);
      }
    });
  }

  $(".gift-wrapper-id .fa-trash").live("click", function(){
    var gift_id=$(this).data("gift");
    var parent=$(".gift-wrapper-id[data-gift='"+gift_id+"']");
    $.ajax({
      url: lr_js.ajaxurl,
      type: 'POST',
      data: {
        action: 'delete_shopping',
        id: gift_id,
        year: $(".year_shopping").val(),
        person: $(parent).find(".person_name").val(),
      },
      success:function(data) {
        $(parent).parent().parent().siblings(".card-header").find(".total_person").html(data);
        if(data=='0 €') {
          $(parent).parent().parent().parent().remove();
        }
        $(".gift-wrapper-id[data-gift='"+gift_id+"']").remove();
        $.ajax({
          url: lr_js.ajaxurl,
          type: 'POST',
          data: {
            action: 'get_total_year',
            year: $(".year_shopping").val(),
          },
          success:function(data) {
            $(".total_year span").html(data);
          }
        });
      }
    });
  });

  $(".gift-wrapper-id .fa-edit").live("click", function(){
    $(this).siblings(".fa-check").show();
    var gift_id=$(this).data("gift");
    var parent=$(".gift-wrapper-id[data-gift='"+gift_id+"']");
    $(parent).find("input").attr("disabled", false).addClass("editable");
    $(this).hide();
  });

  $(".gift-wrapper-id .fa-check").live("click", function(){
    var gift_id=$(this).data("gift");
    var icon=$(this);
    var parent=$(".gift-wrapper-id[data-gift='"+gift_id+"']");
    $.ajax({
      url: lr_js.ajaxurl,
      type: 'POST',
      data: {
        action: 'edit_shopping',
        id: gift_id,
        name: $(parent).find("input[name='name']").val(),
        price: $(parent).find("input[name='price']").val(),
        buyed: $(parent).find("input[name='buyed']").prop("checked"),
        year: $(".year_shopping").val(),
        person: $(parent).find(".person_name").val(),
      },
      success:function(data) {
        $(icon).hide();
        $(icon).siblings(".fa-edit").show();
        $(parent).find("input").attr("disabled", true).removeClass("editable");
        $(parent).parent().parent().siblings(".card-header").find(".total_person").html(data);
        $.ajax({
          url: lr_js.ajaxurl,
          type: 'POST',
          data: {
            action: 'get_total_year',
            year: $(".year_shopping").val(),
          },
          success:function(data) {
            $(".total_year span").html(data);
          }
        });
      }
    });
  });

  $(".gift_buy input").live("click", function(){
    $("#gift_name_buyed_modal").modal({keyboard:false, backdrop: 'static'});
    $("#gift_name_buyed_modal").find("button.btn").data("gift", $(this).data("gift"));
  });

  $("#modal-btn-si, #modal-btn-no").on("click", function(){
    var name_show=$(this).data("show");
    var gift_id=$(this).data("gift");
    $("#gift_name_buyed_modal").modal("toggle");
    var parent=$("div[data-gift='"+gift_id+"']").find(".list_gift_wrapper");
    var label=$(parent).find(".gift_buy label");
    var input=$(parent).find(".gift_buy input");
    $.ajax({
      url: lr_js.ajaxurl,
      type: 'POST',
      data: {
        action: 'mark_gift_buyed',
        gift_id: gift_id,
        show_name: name_show,
      },
      success:function(data) {
        $(input).remove();
        $(parent).addClass("buyed");
        $(label).html(data);
        $(label).after('<i class="fas fa-undo-alt" data-gift="'+gift_id+'"></i>');
      }
    });
  });

  $(".gift_buy i.fa-undo-alt").live("click", function(){
    var undo=confirm("¿Quieres deshacer la compra?");
    if (!undo) {
      return false;
    }
    var gift_id=$(this).data("gift");
    var parent=$(this).parent().parent().parent();
    var label=$(this).siblings();
    var icon=$(this);
    $.ajax({
      url: lr_js.ajaxurl,
      type: 'POST',
      data: {
        action: 'mark_gift_unbuyed',
        gift_id: gift_id,
      },
      success:function(data) {
        $(icon).remove();
        $(parent).removeClass("buyed");
        $(label).html(data);
        $(label).before('<input type="checkbox" data-gift="'+gift_id+'"></i>');
      }
    });
  });

  $(".change_contact").live("click", function(){
    var person_name=$(this).find("i").data("person_name");
    $("#change_contact_name_modal").modal({keyboard:false, backdrop: 'static'});
    $("#change_contact_name_modal .person_name").val(person_name);
    return false;
  });

});
