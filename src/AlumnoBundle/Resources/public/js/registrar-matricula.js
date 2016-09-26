var load_div = $(".load-div");
var txt_rut = $("#txt_rut");

$(function(){
	'use strict';

	fecha(".txt_fecha");

	txt_rut.focusout(function() {
		if(Rut(txt_rut))
		{
			var rut = txt_rut.val();

			// rut = rut.replace(new RegExp('.', 'g'), '');
			// rut = rut.replace(new RegExp('-', 'g'), '');
			// rut = rut.replace(new RegExp(' ', 'g'), '');
			// console.log(rut.length);

			// for(i = rut.length; i != 0)
			// {

			// }
		}
	});

	
	/***************************************/
    /* Form validation */
    /***************************************/

    jQuery.validator.addMethod("rut", function(value, element){
	    return Rut(txt_rut);
	}, "Rut inválido"); 

    var msg_required = 'Campo requerido';
    $( '#j-forms' ).validate({

        /* @validation states + elements */
        errorClass: 'error-view',
        validClass: 'success-view',
        errorElement: 'span',
        onkeyup: false,
        onclick: false,

        /* @validation rules */
        rules: {
            txt_rut: {
                required: true,
                rut: true
            },
            txt_numero_matricula: {
                required: true
            },
            txt_nombre: {
                required: true,
            },
            txt_apellido_paterno: {
                required: true
            },
            txt_apellido_materno: {
                required: true
            },
            txt_fecha_nacimiento: {
                required: true
            },
            radio_sexo: {
                required: true
            }
        },
        messages: {
            txt_rut: {
                required: msg_required,
                rut: 'Ingrese un rut válido'
            },
            txt_numero_matricula: {
                required: msg_required
            },
            txt_nombre: {
                required: msg_required
            },
            txt_apellido_paterno: {
                required: msg_required
            },
            txt_apellido_materno: {
                required: msg_required
            },
            txt_fecha_nacimiento: {
                required: msg_required
            },
            radio_sexo: {
                required: msg_required
            }
        },
        // Add class 'error-view'
        highlight: function(element, errorClass, validClass) {
            $(element).closest('.input').removeClass(validClass).addClass(errorClass);
            if ( $(element).is(':checkbox') || $(element).is(':radio') ) {
                $(element).closest('.check').removeClass(validClass).addClass(errorClass);
            }
        },
        // Add class 'success-view'
        unhighlight: function(element, errorClass, validClass) {
            $(element).closest('.input').removeClass(errorClass).addClass(validClass);
            if ( $(element).is(':checkbox') || $(element).is(':radio') ) {
                $(element).closest('.check').removeClass(errorClass).addClass(validClass);
            }
        },
        // Error placement
        errorPlacement: function(error, element) {
            if ( $(element).is(':checkbox') || $(element).is(':radio') ) {
                $(element).closest('.check').append(error);
            } else {
                $(element).closest('.unit').append(error);
            }
        },
        // Submit the form
        submitHandler:function() {
            $( '#j-forms' ).ajaxSubmit({

                // Server response placement
                target:'#j-forms #response',

                // If ajax error occurs
                error:function(xhr) {
                    $('#j-forms #response').html('An error occured: ' + xhr.status + ' - ' + xhr.statusText);
                },

                // Before submiting the form
                beforeSubmit:function(){
                    // Add class 'processing' to the submit button
                    $('#j-forms button[type="submit"]').attr('disabled', true).addClass('processing');
                },

                // If ajax success occurs
                success:function(){
                    // Remove class 'processing'
                    $('#j-forms button[type="submit"]').attr('disabled', false).removeClass('processing');

                    // Remove classes 'error-view' and 'success-view'
                    $('#j-forms .input').removeClass('success-view error-view');
                    $('#j-forms .check').removeClass('success-view error-view');

                    // If response for the server is a 'success-message'
                    if ( $('#j-forms .success-message').length ) {

                        // Reset form
                        $('#j-forms').resetForm();

                        // Destroy old date range
                        destroyDate('#date_from');
                        destroyDate('#date_to');

                        // Initialize new date range
                        dateFrom('#date_from', '#date_to');
                        dateTo('#date_from', '#date_to');

                        // Prevent submitting the form while success message is shown
                        $('#j-forms button[type="submit"]').attr('disabled', true);

                        // Prevent clicking on the 'prev' button
                        $('#j-forms .multi-prev-btn').attr('disabled', true);

                        setTimeout(function(){
                            // Delete success message after 5 seconds
                            $('#j-forms #response').removeClass('success-message').html('');

                            // Make submit button available
                            $('#j-forms button[type="submit"]').attr('disabled', false);

                            // Make 'prev' button available
                            $('#j-forms .multi-prev-btn').attr('disabled', false);

                            // Hide submit button and 'prev' button
                            $('#j-forms .multi-prev-btn').css('display', 'none');
                            $('#j-forms .multi-submit-btn').css('display', 'none');

                            // Make first fieldset from multi form active
                            $('#j-forms fieldset').removeClass('active-fieldset');
                            $('#j-forms fieldset').eq(0).addClass('active-fieldset');

                            // Show 'next' button
                            $('#j-forms .multi-next-btn').css('display', 'block');
                        }, 5000);
                    }
                }
            });
        }
    });
    /***************************************/
    /* end form validation */
    /***************************************/

	/***************************************/
    /* Multistep form */
    /***************************************/
    // if multistep form exists
    if ( $('form.j-multistep').length ) {

    	load_div.css('display', 'none');

        // For each multistep form
        // Execute the function
        $('form.j-multistep').each( function() {

            // Variables
            var
                $id 		= $(this).attr('id'),							// form ID
                $i			= $('#' + $id + ' fieldset').length,			// number of fieldsets
                $step		= $('#' + $id + ' .step').length,				// number of steps
                $next_btn	= $('#' + $id + ' .multi-next-btn'),			// 'next' button
                $prev_btn	= $('#' + $id + ' .multi-prev-btn'),			// 'previous' button
                $submit_btn	= $('#' + $id + ' .multi-submit-btn');			// 'submit' button

            // Add class "active-fieldset" to the first fieldset on the page
            $( '#' + $id + ' fieldset').eq(0).addClass('active-fieldset');

            // If class ".step" exists
            // Add class "active-step"
            if ( $step ) {
                $('#' + $id + ' .step').eq(0).addClass('active-step');
            }

            // If first fieldset has class 'active'
            // Processing the buttons
            if ( $('#' + $id + ' fieldset').eq(0).hasClass('active-fieldset') ) {
                $submit_btn.css('display', 'none');
                $prev_btn.css('display', 'none');
            }

            // Click on the "next" button
            $next_btn.on('click', function() {

                // If current fieldset doesn't have validation errors
                // Switch to the next step
                if ($('#' + $id).valid() == true) {

                    // Switch the "active" class to the next fieldset
                    $('#' + $id + ' fieldset.active-fieldset').removeClass('active-fieldset').next('fieldset').addClass('active-fieldset');

                    // If ".step" exists
                    // Switch the "active" class to the next step
                    if ( $step ) {
                        $('#' + $id + ' .step.active-step').removeClass('active-step').addClass('passed-step').next('.step').addClass('active-step');
                    }

                    // Display "prev" button
                    $prev_btn.css('display', 'block');

                    // If active fieldset is a last
                    // processing the buttons
                    if ( $('#' + $id + ' fieldset').eq($i-1).hasClass('active-fieldset') ) {
                        $submit_btn.css('display', 'block');
                        $next_btn.css('display', 'none');
                    }

                    // If current fieldset has validation errors
                } else {
                    return false;
                }
            });

            // Click on the "prev" button
            $prev_btn.on('click', function() {

                // Switch the "active" class to the previous fieldset
                $('#' + $id + ' fieldset.active-fieldset').removeClass('active-fieldset').prev('fieldset').addClass('active-fieldset');

                // If ".step" exists
                // Switch the "active" class to the previous step
                if ( $step ) {
                    $('#' + $id + ' .step.active-step').removeClass('active-step').prev('.step').removeClass('passed-step').addClass('active-step');
                }

                // If active fieldset is a first
                // processing the buttons
                if ( $('#' + $id + ' fieldset').eq(0).hasClass('active-fieldset') ) {
                    $prev_btn.css('display', 'none');
                }

                // If active fieldset is a penultimate
                // processing the buttons
                if ( $('#' + $id + ' fieldset').eq($i-2).hasClass('active-fieldset') ) {
                    $submit_btn.css('display', 'none');
                    $next_btn.css('display', 'block');
                }
            });
        });
        // end "each" statement
    }
    /***************************************/
    /* end multistep form */
    /***************************************/

});