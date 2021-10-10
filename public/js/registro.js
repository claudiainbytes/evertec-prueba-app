//var baseURL = window.location.origin + "/";
var baseURL = "";
// Disable form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
      // Get the forms we want to add validation styles to
      var forms = document.getElementsByClassName('needs-validation');

      // Validate fields  
      const emailField = document.getElementById('email');
      const nombresField = document.getElementById('nombres');
      const apellidosField = document.getElementById('apellidos');
      const contrasenaField = document.getElementById('contrasena');
      const soyField = document.getElementById('soy');
      const empresaField = document.getElementById('empresa');
      const mensajeField = document.getElementById('mensaje');

      validateInputField(emailField);
      validateInputField(nombresField);
      validateInputField(emailField);
      validateInputField(apellidosField);
      validateInputField(contrasenaField);
      validateInputField(soyField);
      validateInputField(empresaField);
      validateInputField(mensajeField);
      
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
      
    }, false); 
    
    //Validate fields using Bootstrap
    function validateInputField(fieldName){
        if(fieldName != undefined){
            fieldName.addEventListener('keyup', function (event) {
                let isValidField = this.checkValidity();
                let formGroup = this.closest('.form-group');
                if ( isValidField ) {
                formGroup.querySelector('.valid-feedback').style.display = 'block';
                formGroup.querySelector('.invalid-feedback').style.display = 'none';
                } else {
                formGroup.querySelector('.valid-feedback').style.display = 'none';
                formGroup.querySelector('.invalid-feedback').style.display = 'block';
                }
            }); 
        }
    }
    
    function validateRadios(inputNameRadio){
        if(document.getElementsByName(inputNameRadio) > 0 ){
            let radios = document.getElementsByName(inputNameRadio);
            for (let i = 0; i < radios.length; i++) {
                radios[i].addEventListener('change', function(e) {
                    e.preventDefault();
                    for (let i = 0; i < radios.length; i++) { 
                        radios[i].removeAttribute('checked');
                    }
                    this.setAttribute('checked', 'checked');
                });
            }
        }
    }
    function validateCheckBox(inputNameCheckbox){
        let checkBox = document.getElementsByName(inputNameCheckbox)[0];
        if(checkBox != undefined){
            checkBox.addEventListener('change', function(e) {
                e.preventDefault();
                if( this.checked ) {
                    this.setAttribute('checked', 'checked');
                    this.value = 1;
                } else {
                    this.removeAttribute('checked');
                    this.value = 0;
                }   
            });
        }
    }
    document.addEventListener('DOMContentLoaded', function () {
        validateRadios("producto");
        validateCheckBox("accept_terms_conditions");
    });
})();