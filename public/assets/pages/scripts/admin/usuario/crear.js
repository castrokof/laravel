$(document).ready(function(){
    const reglas ={
        re_password:{
            equalTo: "#password"
        }
    };
    const mensajes ={
        re_password:{
            equalTo: 'las contraseñas no coinciden'
        }
    }
    Manteliviano.validacionGeneral('form-general', reglas, mensajes);
  
});