demo = {

  initMaterialWizard: function() {
    // Code for the Validator
    var jQueryvalidator = jQuery('.card-wizard form').validate({
      rules: {
        title: {
            required: true,
        },
        visibility: {
            required: true,
        },
        gifts_buyed: {
            required: true,
        },
      },

      highlight: function(element) {
        jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
      },
      success: function(element) {
        jQuery(element).closest('.form-group').removeClass('has-danger');
      },
      errorPlacement : function(error, element) {
        jQuery(element).append(error);
      }
    });



    // Wizard Initialization
    jQuery('.card-wizard').bootstrapWizard({
      'tabClass': 'nav nav-pills',
      'nextSelector': '.btn-next',
      'previousSelector': '.btn-previous',

      onNext: function(tab, navigation, index) {
        var jQueryvalid = jQuery('.card-wizard form').valid();
        if (!jQueryvalid) {
          jQueryvalidator.focusInvalid();
          return false;
        }
      },

      onInit: function(tab, navigation, index) {
        //check number of tabs and fill the entire row
        var jQuerytotal = navigation.find('li').length;
        var jQuerywizard = navigation.closest('.card-wizard');

        jQueryfirst_li = navigation.find('li:first-child a').html();
        jQuerymoving_div = jQuery('<div class="moving-tab">' + jQueryfirst_li + '</div>');
        jQuery('.card-wizard .wizard-navigation').append(jQuerymoving_div);

        refreshAnimation(jQuerywizard, index);

        jQuery('.moving-tab').css('transition', 'transform 0s');
      },

      onTabClick: function(tab, navigation, index) {
        var jQueryvalid = jQuery('.card-wizard form').valid();

        if (!jQueryvalid) {
          return false;
        } else {
          return true;
        }
      },

      onTabShow: function(tab, navigation, index) {
        var jQuerytotal = navigation.find('li').length;
        var jQuerycurrent = index + 1;

        var jQuerywizard = navigation.closest('.card-wizard');

        // If it's the last tab then hide the last button and show the finish instead
        if (jQuerycurrent >= jQuerytotal) {
          jQuery(jQuerywizard).find('.btn-next').hide();
          jQuery(jQuerywizard).find('.btn-finish').show();
        } else {
          jQuery(jQuerywizard).find('.btn-next').show();
          jQuery(jQuerywizard).find('.btn-finish').hide();
        }

        button_text = navigation.find('li:nth-child(' + jQuerycurrent + ') a').html();

        setTimeout(function() {
          jQuery('.moving-tab').text(button_text);
        }, 150);

        var checkbox = jQuery('.footer-checkbox');

        if (!index == 0) {
          jQuery(checkbox).css({
            'opacity': '0',
            'visibility': 'hidden',
            'position': 'absolute'
          });
        } else {
          jQuery(checkbox).css({
            'opacity': '1',
            'visibility': 'visible'
          });
        }

        refreshAnimation(jQuerywizard, index);
      }
    });


    // Prepare the preview for profile picture
    jQuery("#wizard-picture").change(function() {
      readURL(this);
    });

    jQuery('[data-toggle="wizard-radio"]').click(function() {
      wizard = jQuery(this).closest('.card-wizard');
      wizard.find('[data-toggle="wizard-radio"]').removeClass('active');
      jQuery(this).addClass('active');
      jQuery(wizard).find('[type="radio"]').removeAttr('checked');
      jQuery(this).find('[type="radio"]').attr('checked', 'true');
    });

    jQuery('[data-toggle="wizard-checkbox"]').click(function() {
      if (jQuery(this).hasClass('active')) {
        jQuery(this).removeClass('active');
        jQuery(this).find('[type="checkbox"]').removeAttr('checked');
      } else {
        jQuery(this).addClass('active');
        jQuery(this).find('[type="checkbox"]').attr('checked', 'true');
      }
    });

    jQuery('.set-full-height').css('height', 'auto');

    //Function to show image before upload

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          jQuery('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
      }
    }

    jQuery(window).resize(function() {
      jQuery('.card-wizard').each(function() {
        jQuerywizard = jQuery(this);

        index = jQuerywizard.bootstrapWizard('currentIndex');
        refreshAnimation(jQuerywizard, index);

        jQuery('.moving-tab').css({
          'transition': 'transform 0s'
        });
      });
    });

    function refreshAnimation(jQuerywizard, index) {
      jQuerytotal = jQuerywizard.find('.nav li').length;
      jQueryli_width = 100 / jQuerytotal;

      total_steps = jQuerywizard.find('.nav li').length;
      move_distance = jQuerywizard.width() / total_steps;
      index_temp = index;
      vertical_level = 0;

      mobile_device = jQuery(document).width() < 600 && jQuerytotal > 3;

      if (mobile_device) {
        move_distance = jQuerywizard.width() / 2;
        index_temp = index % 2;
        jQueryli_width = 50;
      }

      jQuerywizard.find('.nav li').css('width', jQueryli_width + '%');

      step_width = move_distance;
      move_distance = move_distance * index_temp;

      jQuerycurrent = index + 1;

      if (jQuerycurrent == 1 || (mobile_device == true && (index % 2 == 0))) {
        move_distance -= 8;
      } else if (jQuerycurrent == total_steps || (mobile_device == true && (index % 2 == 1))) {
        move_distance += 8;
      }

      if (mobile_device) {
        vertical_level = parseInt(index / 2);
        vertical_level = vertical_level * 38;
      }

      jQuerywizard.find('.moving-tab').css('width', step_width);
      jQuery('.moving-tab').css({
        'transform': 'translate3d(' + move_distance + 'px, ' + vertical_level + 'px, 0)',
        'transition': 'all 0.5s cubic-bezier(0.29, 1.42, 0.79, 1)'

      });
    }
  },


}
