  function validar(){
                if (document.frm1.name.value.length==0 ){
                    alert("Ingrese un Nombre.");
                    document.frm1.name.focus();
                    return false;
                }
                if (document.frm1.precio.value.length==0 ){
                    alert("Ingrese un Precio.");
                    document.frm1.precio.focus();
                    return false;
                }
                if (document.frm1.modelo.value.length==0){
                    alert("Ingrese un modelo.");
                    document.frm1.modelo.focus();
                    return false;
                }
				if (document.frm1.stock.value.length==0){
					alert("Ingrese un stock.");
					document.frm1.stock.focus();
					return false;
				}
				if (document.frm1.descripcion_short.value == " " || document.frm1.descripcion_short.value.length == 0){
					alert("Ingrese una descripcion larga corta.");
					document.frm1.descripcion_short.focus();
					return false;
				}
				if (document.frm1.descripcion.value == " " || document.frm1.descripcion.value.length == 0){
					alert("Ingrese una descripcion larga.");
					document.frm1.descripcion.focus();
					return false;
				}
   return true;
}
function validarNum(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true; //Tecla de retroceso (para poder borrar)
    patron = /\d/; //Solo acepta números
    te = String.fromCharCode(tecla);
    return patron.test(te); 
}              

