  function validar(){
                if (document.frm1.username.value.length==0 ){
                    alert("Ingrese su nombre de usuario.");
                    document.frm1.username.focus();
                    return false;
                }
                else{if (document.frm1.username.value.length<4){
                         alert("Su nombre de usuario debe tener mas de 3 caracteres.");
                         document.frm1.username.focus();
                         return false;
                    }}
                if (document.frm1.password.value.length==0){
                    alert("Ingrese un password.");
                    document.frm1.password.focus();
                    return false;
                }
                else{if (document.frm1.password.value.length<6){
                         alert("Su password debe ser mayor a 5 caracteres.");
                         document.frm1.password.focus();
                         return false;
                    }}
                 if (document.frm1.password2.value.length==0){
                    alert("Ingrese un password.");
                    document.frm1.password2.focus();
                    return false;
                }

                if (document.frm1.password.value != document.frm1.password2.value)
                {
                	alert("Los passwords no coinciden verifique.");
                    document.frm1.password.focus();
                    return false;
                }
				if (document.frm1.domicilio.value.length==0)
                {
                    alert("Ingrese su domicilio.");
                    document.frm1.domicilio.focus();
                    return false;
                }
				if (document.frm1.dni.value.length==0)
                {
                    alert("Ingrese su dni.");
                    document.frm1.dni.focus();
                    return false;
                }
				else{
					if (document.frm1.dni.value.length<10){
						 alert("Complete su dni.");
                   		 document.frm1.dni.focus();
	                     return false;
					}
				}
                var x =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                if (!x.test(document.frm1.email.value)){
                    alert("La dirección de email es incorrecta.");
                    document.frm1.email.focus();
                    return (false);
                }
                return true;
                }
function validarLetras(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true; //Tecla de retroceso (para poder borrar)
    patron = /\w/; 
    te = String.fromCharCode(tecla);
    return patron.test(te); 
}
function validarDNI(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true; //Tecla de retroceso (para poder borrar)
	dn = document.frm1.dni.value
	if (dn.length==2 || dn.length == 6)
		document.frm1.dni.value = dn + '.'
    patron = /\d/; 
    te = String.fromCharCode(tecla);
    return patron.test(te); 
}
