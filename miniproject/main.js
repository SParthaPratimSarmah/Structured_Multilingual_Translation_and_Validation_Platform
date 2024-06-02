

$(document).ready(function(){


    $('#email').on('focusout', function(){

        if($('#email').val() != ""){

           if(validateEmail($('#email').val())){

            $('.error').fadeOut('slow');

           }else{
              $('.error').text('Invalid Email...!');
              $('.error').fadeIn('slow');
           }

        }else{
            $('.error').text('Email Required..!');
            $('.error').fadeIn("slow");
        }



    });

});


function validateEmail(eVal){
    var val = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    
    if( val.test(eVal)){
        return true;
    }else{
        return false;
    }
}


