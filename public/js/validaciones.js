
$('#confirmpassword').on('keyup',function(){
  var pass = $('#password').val();
  var confirm = $(this).val();
  if(confirm != pass)
  {
    $('#nota').css('display','block');
    $('#btn-signupRest').prop('disabled',true);
  }else{
    $('#nota').css('display','none');
    $('#btn-signupRest').prop('disabled',false);
  }
});

$('#btn-signupRest').on('click',function(e){
  

})

$( document ).ready( function () {
        /************************************
         validacion datos constraseñas frmReserPass
        ***********************************/
          $("#loginForm").validate({
            ignore: [],
                       rules: {
                password: "required",
               
            },
            messages: {
                password: "La contraseña es requerida.",
            },
        
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        }
    });

          /*****************************
      terminos
      ******************************/
      $("form[name='frmTerminos']").validate({
            ignore: [],
            rules: {
              termino: {
                required: true,
              },
              privacidad: {
                required: true,
                
              },
        },
        messages: {
          termino:
          {
            required: "Debe aceptar los términos y condiciones.",
          },
          privacidad:
          {
            required: "Debe aceptar el aviso de privacidad.",
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

      /*****************************
      sucursales
      ******************************/
      $("form[name='frmNuevaSucursal']").validate({
            ignore: [],
            rules: {
              cp: {
                maxlength: 5,
              },
              telefono: {
                required: true,
                maxlength: 12,
              },
              numero: {
                maxlength:5,
              },
              nombreS: {
                required: true,
                maxlength:100,
              },
              idmunicipio: {
                required:true,
              },
              lat: {
              required: true,
            }
            
        },
        messages: {
          
          cp:
          {
            maxlength: "El código postal no debe contener mas de 5 digitos.",
          },
          telefono:
          {
            required: "El teléfono es requerido",
            maxlength: "El código postal no debe contener mas de 12 digitos.",
          },
          numero:
          {
            maxlength: "El número no debe contener mas de 5 digitos.",
          },
          nombreS: {
                required: "El nombre es requerido",
                maxlength:"El número no debe contener mas de 100 caracteres.",
              },
            cp:{
              required: "El CP es requerido",
            },
            colonia: {
              required: "La colonia es requerida",
            },
            calle: {
              required: "La calle es requerida",
            },
            lat: {
              required: "Ubique su dirección en el mapa.",
            },
            idmunicipio: {
              required: "Campo requerido.",
            },
          
        },
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        }
    });



    $("form[name='rfmEmpresa']").validate({
        rules: {
            mail: {
               required: true,
                //email: true,
            },
            nombre: {
              required: true,
              maxlength: 100,
            },
            razon_social: {
              required: true,
              maxlength: 150,
            },
            rfc: {
              required: true,
              maxlength: 20,
            },
            domicilio_fiscal: {
              required: true,
              maxlength: 100,
            },
            contacto: {
              required: true,
              maxlength: 60,
            },
            telefono: {
              required: true,
              maxlength: 12,
              minlength:10,
            }

            
        },
        messages: {
         
          mail:
          {
            //email: "Ingrese correo válido.",
            required:'Ingrese un correo',
          } ,
          nombre: {
            required: "El nombre de la empresa es requerido.",
            maxlength: "El nombre no puede contener mas de 100 caracteres",
          },
          razon_social: {
            required: "La razón social de la empresa es requerida.",
            maxlength: "La razón social no puede contener mas de 150 caracteres",
          },
          rfc: {
              required: "El RFC es requerido.",
              maxlength: "El RFC no puede contener mas de 20 caracteres",
          },
          domicilio_fiscal: {
              required: "El domicilio es requerido.",
              maxlength: "El domicilio no puede contener mas de 100 caracteres",
          },
          contacto: {
              required: "El contacto es requerido.",
              maxlength: "El contacto no puede contener mas de 60 caracteres",
          },
          telefono: {
              required: "El teléfono es requerido.",
              maxlength: "El teléfono no puede contener mas de 12 digitos",
              minlength: "El teléfono debe contener mínimo 12 digitos."
          },
            
          
        },
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        }
    });
    $("form[name='frmDatosCliente']").validate({
      rules: {
            nombre: {
              maxlength:50,
              required: true,
            },
            telefono: {
               // required: true,
                maxlength: 12,
                minlength: 10,
            },
            mail: {
              //email:true,
              maxlength:40,
              required: true,
            }
            
        },
        messages: {
          /*
          confirm_password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long",
            equalTo: "Please enter the same password as above"
          },*/
          telefono:
          {
            maxlength: "Ingrese máximo 12 digitos.",
            minlength: "Ingrese mínimo 10 digitos",
          } ,
          nombre: {
              maxlength: "El nombre no puede exceder los 50 caracteres.",
              required: "El nombre es requerido.",
            },
            mail: {
              maxlength: "El correo no puede exceder los 40 caracteres.",
              required: "El correo es requerido.",
              //email:'Escriba un correo con formato valido.'
            },
          
        },
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        }
    });

     $("form[name='frmInfoBasica']").validate({
      ignore: [],
        rules: {
            mail: {
                required: true,
               // email:true,
                maxlength: 40,
            },
            pagina: {
                url: true,
                maxlength: 200,
                
            },
            telefono: {
              maxlength: 12,
              minlength: 10,
              required: true,
            },
            desc_corta: {
              maxlength: 50,
              required: true,
            },
            descripcion: {
              maxlength: 500,
              required: true,
            },
            palabras: {
              maxlength: 1000,
              required: true,
            },
            calle:{
              maxlength: 200,
              required: true,
            },
            numero:{
              maxlength: 6,
            },
            colonia:{
              maxlength: 200,
              required: true,
            },
            cp:{
              maxlength: 200,
              required: true,
            },
            idmunicipio:
            {
              required: true,
            },
            lat:{
              required: true,
            }
        },
        messages: {

          mail:
          {
            required:"Ingrese un correo. ",
           // email:"Ingrese un correo válido",
            maxlength: "Ingrese máximo 40 caracteres.",
          } ,
          pagina: {
            url: 'Ingrese una dirección web correcta, con el siguiente formato http://www.ejemplo.com',
            maxlength: "Ingrese máximo 200 caracteres.",
            
          },
          telefono: {
            maxlength: "Ingrese máximo 12 digitos.",
            minlength: "Ingrese mínimo 10 digitos.",
            required: "Ingrese un número de teléfono",
          },
          desc_corta: {
            maxlength: "Ingrese máximo 50 caracteres.",
            required: "Ingrese una breve descripción de su producto",
          },
          descripcion:{
            maxlength: "Ingrese máximo 500 caracteres.",
            required: "Ingrese una descripción de su producto",
          },
          palabras:{
            maxlength: "Ingrese máximo 1000 caracteres.",
            required: "Ingrese mínimo una palabra de búsqueda.",
          },
          calle: {
            maxlength: "Ingrese máximo 200 caracteres.",
            required: "Campo requerido.",
          },
          numero:{
              maxlength: "Ingrese máximo 5 caracteres.",
            },
            colonia:{
              maxlength: "Ingrese máximo 200 caracteres.",
            required: "Campo requerido.",
            },
            cp:{
             maxlength: "Ingrese máximo 5 caracteres.",
            required: "Campo requerido.",
            },
            idmunicipio:
            {
              required: "Campo requerido.",
            },
            lat: {
              required: "Ubique su dirección en el mapa.",
            }
        },
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        }
    });
      
});

/***********************
validacion para horarios
**********************/
      $("form[name='frmHorarios']").validate({
            ignore: [],
            rules: {
              opcion: {
                required: true,
              },
             
        },
        messages: {
          opcion:
          {
            required: "Debe seleccionar un tipo de horario.",
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
/***********************
validacion para horarios sucursal
**********************/
      $("form[name='frmEditHorarioSucusarl']").validate({
            ignore: [],
            rules: {
              opconSucursal: {
                required: true,
              },
             
        },
        messages: {
          opconSucursal:
          {
            required: "Debe seleccionar un tipo de horario.",
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
/***********************
validacion para formulario promocion
**********************/
      $("form[name='frmPromo']").validate({
            ignore: [],
            rules: {
              fecha_inicio: {
                required: true,
              },
              fecha_fin: {
                required: true,
              },
              descripcion: {
                required: true,
              },
              promocion: {
                required: true,
              }
             
        },
        messages: {
          fecha_inicio:
          {
            required: "Campo requeriodo.",
          },
         fecha_fin: {
          required: "Campo requeriodo",
         },
         descripcion: {
          required: "Campo requeriodo"
         },
         promocion: {
          required: 'Debe seleccionar una imagen para la promoción',
         }
          
        },

        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        }
    });
/***********************
validacion para formulario productos
**********************/
      $("form[name='frmProduct']").validate({
            ignore: [],
            rules: {
              nombre_producto: {
                required: true,
              },
              descripcion_producto: {
                required: true,
              },

              producto: {
                required: true,
              }
             
        },
        messages: {
          nombre_producto:
          {
            required: "Campo requeriodo.",
          },
         descripcion_producto: {
          required: "Campo requeriodo",
         },

         producto: {
          required: 'Debe seleccionar una imagen para el producto',
         }
          
        },

        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        }
    });


/***********************
validacion para formulario productos edit
**********************/
      $("form[name='frmProductoEdit']").validate({
            ignore: [],
            rules: {
              nombre_producto_edit: {
                required: true,
              },
              descripcion_producto_edit: {
                required: true,
              },

      
        },
        messages: {
          nombre_producto_edit:
          {
            required: "Campo requeriodo.",
          },
         descripcion_producto_edit: {
          required: "Campo requeriodo",
         },

          
        },

        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        }
    });
