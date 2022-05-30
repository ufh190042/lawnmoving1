$(document).ready(function(){

    /* borang daftar akaun */

    $('#stkdaftarakaun').on('submit', function(e){
	
        e.preventDefault();
        
        // $('.has-error').removeClass('has-error');
        // $('.js-show-feedback').removeClass('js-show-feedback');
        
        var form    = $(this),
            panggilan_select = form.find('#panggilan_select').val(),
            nama_sendiri_text 	= form.find('#nama_sendiri_text').val(),
            email_text   = form.find('#email_text').val(),
            phone_text  = form.find('#phone_text').val(),
            pass_text    = form.find('#pass_text').val(),
            repassword_text    = form.find('#repassword_text').val(),
            // yes_admin = form.find('#yes_admin').val(),
            // no_admin  = form.find('#no_admin').val(),
            ajaxurl = form.data('url');

            console.log(ajaxurl);
            
        // if(Fname === ''){
        //     $('#Fname').parent('.form-group').addClass('has-error');
        //     return;
        // }

        // if(Lname === ''){
        //     $('#Lname').parent('.form-group').addClass('has-error');
        //     return;
        // }

        // if(jawatan === ''){
        //     $('#jawatan').parent('.form-group').addClass('has-error');
        //     return;
        // }

        // if(bahagian === ''){
        //     $('#bahagian').parent('.form-group').addClass('has-error');
        //     return;
        // }

        // if(phone === ''){
        //     $('#phone').parent('.form-group').addClass('has-error');
        //     return;
        // }
        
        // if(email === ''){
        //     $('#email').parent('.form-group').addClass('has-error');
        //     return;
        // }
        
        // if(pass === ''){
        //     $('#pass').parent('.form-group').addClass('has-error');
        //     return;
        // }

        // if(yes_admin === ''){
        //     $('#yes_admin').parent('.form-group').addClass('has-error');
        //     return;
        // }

        // if(no_admin === ''){
        //     $('#no_admin').parent('.form-group').addClass('has-error');
        //     return;
        // }
        
        // form.find('input, button, textarea').attr('disabled', 'disabled');
        // $('.js-form-submission').addClass('js-show-feedback');
        
        $.ajax({
                
            url: ajaxurl,
            type : 'post',
            data : {
                panggilan_select : panggilan_select,
                Fnama_sendiri_text : nama_sendiri_text,
                email_text : email_text,
                phone_text : phone_text,
                pass_text : pass_text,
                repassword_text : repassword_text,
                // yes_admin : yes_admin,
                action : 'stk_save_pengguna_akaun_form'
            },
            error : function(response){
                console.log(response)
            },
            success : function(response){
                console.log(response)
                if(response == 0){
                    console.log('berjaya');
                //     setTimeout(function(){
                //         $('.js-form-submission').removeClass('js-show-feedback');
                //         $('.js-form-error').addClass('js-show-feedback');
                //         form.find('input, button, textarea').removeAttr('disabled');
                //     }, 500);
                    
                }else {
                    console.log('gagal');
                //     setTimeout(function(){
                //         $('.js-form-submission').removeClass('js-show-feedback');
                //         $('.js-form-success').addClass('js-show-feedback');
                //         form.find('input, button, textarea').removeAttr('disabled').val('');
                //     }, 500);
                }
                
            }
        });
        
    });

});


