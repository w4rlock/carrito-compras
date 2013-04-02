  $(document).ready(function() {
 
            //Cuando la pagina carga...
            $(".tab_content").hide(); //esconder contenido
            $("ul.tabs li:first").addClass("active").show(); //Agrega la clase 'active' a la pestaña activa
            $(".tab_content:first").show();
 
            //On Click Event
            $("ul.tabs li").click(function() {
 
                $("ul.tabs li").removeClass("active"); //Remover la clase 'active'
                $(this).addClass("active"); //Agregar clase 'active' a la pestaña seleccionada
                $(".tab_content").hide();
 
                var activeTab = $(this).find("a").attr("href");
                $(activeTab).fadeIn();
                return false;
            });
 
        });
