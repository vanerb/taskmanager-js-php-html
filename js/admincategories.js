
$(document).ready(function () {
    
    

    addCategory();
    getCategory();
    deleteCategory();
    editCategory();


    function getCategory() {
        $("#cartas").empty();
        $.ajax({
            type: "GET",
            url: "php/categories/show.php",
            success: function (datos) {
                var listado = jQuery.parseJSON(datos);
                console.log(listado);
                for (var x of listado) {
                    $('<div class="row"><div class="col-md-4"><div class="card"><div class="card-header"><h1>'+x.name+'</h1></div><div class="card-footer"><div id="btedit"><input data-bs-toggle="modal" data-bs-target="#editcategory" type="button" name="'+x.id+'" class="btn btn-success" value="Editar"></div><div id="btdelete"><input type="button" name="'+x.id+'" class="btn btn-danger" value="Eliminar"></div></div></div></div></div>').appendTo("#cartas")
                    
                }


            }
        });
    }


    function editCategory() {
        var cod;
        $("#cartas").on("click", "#btedit", function(e){
            e.preventDefault();
            cod = $(this).parents("#cartas .card-footer").find('input[type="button"]').attr('name');
            console.log(cod);

            $.ajax({
                type: "GET",
                url: "php/categories/find.php?id=" + cod,
                success: function (datos) {
                    var category = jQuery.parseJSON(datos);
                    for (var x of category) {
                        $("#editcategory").find("input[type='text']:eq(0)").val(x.name);
                    }
                },
            });


        });

        $("#editcategory").on("click", "#btedit", function(e){
            e.preventDefault();
            console.log("EDITAR");
            
            var data = new FormData();

            var form_data = $("#editcategorys").serializeArray();

            $.each(form_data, function (key, input) {
                data.append(input.name, input.value);
            });

            console.log(form_data);

            $.ajax({
                url: 'php/categories/edit.php?id='+cod,
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                type: 'post',
                success: function(php_response){
                    if(php_response == "edited"){
                        console.log("editado con exito");
                        getCategory();
                    }
                    
                }
            })
        })




    }

    function addCategory(){
        $("#addcategory").on("click", "#btadd", function(e){
            console.log("add");
            e.preventDefault();
            var data = new FormData();

            var form_data = $("#addcategorys").serializeArray();

            $.each(form_data, function (key, input) {
                data.append(input.name, input.value);
            });

            console.log(form_data);

            $.ajax({
                url: 'php/categories/add.php',
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                type: 'post',
                success: function(php_response){
                    if(php_response == "added"){
                        console.log("añadido con exito");
                        getCategory();
                    }
                    
                }
            })
        });
    }


    function deleteCategory() {
        $("#cartas").on("click", "#btdelete", function(e){
            e.preventDefault();
            var cod = $(this).parents("#cartas .card-footer").find('input[type="button"]').attr('name');
            console.log(cod);
            
            $.ajax({
                type: 'GET',
                url: 'php/categories/delete.php?id='+cod,
                success: function(php_response){
                    if(php_response == "deleted"){
                        getCategory();
                    }
                   
                    
                    
                }
            })
        });
    }
    
});