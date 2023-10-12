$(document).ready(function () {

    logout();
   
    $.ajax({
        url: 'php/Session.php',
        type: 'GET',
        success: function(php_response){
            console.log(php_response);
            if(php_response !== "500"){
                var listado = jQuery.parseJSON(php_response);
                console.log(listado);
                
                for (var x of listado) {
                    if(x.id != null){
                        $("#registers li.nav-item:eq(0)").hide();
                        $("#registers li.nav-item:eq(1)").hide();
                        $("#registers li.nav-item:eq(2)").show();
                    }
                    else{
                        $("#registers li.nav-item:eq(0)").show();
                        $("#registers li.nav-item:eq(1)").show();
                        $("#registers li.nav-item:eq(2)").hide();
                    }
                }
            }
            else{
                $("#registers li.nav-item:eq(2)").hide();
                
            }
            
            
        }
    })

    function logout() {
        $("body").on("click", "#logout", function (e) {
            $.ajax({
                url: 'php/users/logout.php',
                type: 'GET',
                success: function(php_response){
                    if(php_response == "1"){
                        window.location.href = "login.html";
                    }
                    
                }
            })
        })
       
    }
});