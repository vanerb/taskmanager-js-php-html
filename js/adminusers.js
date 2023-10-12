
$(document).ready(function () {


    register();


    login();


    function login() {
        $(".card").on("click", "#logininput", function(e){

            e.preventDefault();
            var data = new FormData();

            var form_data = $("#login").serializeArray();

            $.each(form_data, function (key, input) {
                data.append(input.name, input.value);
            });

            console.log(form_data);

            $.ajax({
                url: 'php/users/login.php',
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                type: 'post',
                success: function(php_response){
                    if(php_response == "logged"){
                        console.log("Se ha hecho loggin");
                    }
                    else{
                        console.log(php_response);
                    }
                    
                }
            })
        });
    }


    function register() {
        $("#adduser").on("click", "#btadd", function(e){
            console.log("add");
            e.preventDefault();
            var data = new FormData();

            var form_data = $("#adduser").serializeArray();

            $.each(form_data, function (key, input) {
                data.append(input.name, input.value);
            });

            console.log(form_data);

            $.ajax({
                url: 'php/users/add.php',
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                type: 'post',
                success: function(php_response){
                    if(php_response == "added"){
                        
                    }
                    
                }
            })
        });
    }
});