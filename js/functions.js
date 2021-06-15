//
// general
//




function toggleformcontacto() {
    var botoncontacto = $('#desplegablecontacto');
    var desplegablecontacto =  $('.page-template-page-contacto .c-formulario form .desplegable > p .desplegable__desplegable');
    
    botoncontacto.click(function(){
        desplegablecontacto.toggleClass('open');
    });
}

function toggleformmuestras() {
    
    var botonmuestras = $('#desplegablemuestras');
    var desplegablemuestras =  $('.page-template-page-muestras .c-formulario form .desplegable > p .desplegable__desplegable');
    
    botonmuestras.click(function(){
        desplegablemuestras.toggleClass('open');
    });
}

function toggleformfamilia() {
    
    var botonfamilia = $('#desplegablefamilia');
    var desplegafamilia =  $('.page-template-page-familia .c-formulario form .desplegable > p .desplegable__desplegable');
    
    botonfamilia.click(function(){
        desplegafamilia.toggleClass('open');
    });
}

function togglemenuservicios() {

    var aservicios = $('.item-servicios>a');   
    var submenuservicios =  $('.item-servicios>.sub-menu');  
    var submenuproductos =  $('.item-productos>.sub-menu');
    var submenuquees =  $('.item-quees>.sub-menu');

    aservicios.click(function(){
        submenuservicios.toggleClass("open");
        submenuproductos.removeClass("open");
        submenuquees.removeClass("open");
    });
    
}

function togglemenuproductos() {
    
    var submenuservicios =  $('.item-servicios>.sub-menu');
    var aproductos = $('.item-productos>a');   
    var submenuproductos =  $('.item-productos>.sub-menu');
    var submenuquees =  $('.item-quees>.sub-menu');

    aproductos.click(function(){
        submenuservicios.removeClass("open");
        submenuproductos.toggleClass("open");
        submenuquees.removeClass("open");
    });

}

function togglemenuquees() {
    
    var submenuservicios =  $('.item-servicios>.sub-menu');
    var submenuproductos =  $('.item-productos>.sub-menu');
    var aquees = $('.item-quees>a');   
    var submenuquees =  $('.item-quees>.sub-menu');

    aquees.click(function(){
        submenuservicios.removeClass("open");
        submenuproductos.removeClass("open");
        submenuquees.toggleClass("open");
    });
}


// function checklabelform() {
//     //document.querySelector("#wpcf7-f360-o1 > form > div.desplegable > p > span > span > span:nth-child(3) > label > input[type=checkbox]").checked = true;
// }


// function details() {
//     // Fetch all the details element.
//     const details = document.querySelectorAll("details");

//     // Add the onclick listeners.
//     details.forEach((targetDetail) => {
//         targetDetail.addEventListener("click", () => {
//             // Close all the details that are not targetDetail.
//             details.forEach((detail) => {
//             if (detail !== targetDetail) {
//                 detail.removeAttribute("open");
//             }
//             });
//         });
//     });
// }

// function cerrar() {
//     var details = $("details");
//     var cerrar = $('#e-cerrar');

//     cerrar.click(function(){
//         details.removeAttribute("open");
//     });
// }



