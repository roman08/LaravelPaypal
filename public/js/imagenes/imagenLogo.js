
//recuṕerar imagen
$(document).ready(function(){
    $('.btn-imagen-logo').click(function(){
        $('#logo').click();
    });



    $('#btnEnvio').on('click',function(e){
     //   e.preventDefault();
        var resul  = $("#frmIdentidad").valid();
          if(resul)
          {
            $(".loader").fadeIn(2000);
          }
        var control = 0;
        var logo = $('#logo').val();
        var identidad = $('#identidad').val();
        identidad = parseInt(identidad);
        if(identidad == 0)
        {
                    /*****************************
                      terminos
                      ******************************/
                      $("form[name='frmIdentidad']").validate({
                            ignore: [],
                            rules: {
                              logo: {
                                required: true,
                              },
                              portada: {
                                required: true,
                                
                              },
                        },
                        messages: {
                          logo:
                          {
                            required: "Debe cargar una imagen para el logo.",
                          },
                          portada:
                          {
                            required: "Debe cargar una imagen para la portada.",
                          },
                          
                        },
                        errorPlacement: function (error, element) {
                           alertify.alert(error.text());
                        },
                        highlight: function(element) {
                            $(element).closest('.form-group').addClass('has-error');
                        },
                        unhighlight: function(element) {
                            $(element).closest('.form-group').removeClass('has-error');
                        }
                    });
        }
       
        
    })
});
