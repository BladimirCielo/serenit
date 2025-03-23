
const cloud = document.getElementById("cloud");
const barraLateral = document.querySelector(".barra-lateral");
const spans = document.querySelectorAll("span");
const menu = document.querySelector(".menu");
const main = document.querySelector("main");
const logo = document.getElementById("logo");


logo.addEventListener("click",()=>{ /* acción, función que se ejecuta al realizar la acción*/
    /*alert("Hola");*/
    barraLateral.classList.toggle("mini-barra-lateral"); /* toggle añade clase mini a la barra, en caso de que ya la tenga lo elimina */
    /*span.classList.toggle("oculto"); /* sólo selecciona el primer span que encuentre */
    main.classList.toggle("min-main");
    spans.forEach(span => {
        span.classList.toggle("oculto");
    });
});

menu.addEventListener("click",()=>{
    barraLateral.classList.toggle("max-barra-lateral");
    if (barraLateral.classList.contains("max-barra-lateral")) {
        menu.children[0].style.display = "none";
        menu.children[1].style.display = "block";
    }
    else {
        menu.children[0].style.display = "block";
        menu.children[1].style.display = "none";
    }

    if (window.innerWidth<=320) {
        barraLateral.classList.add("mini-barra-lateral");
        main.classList.add("min-main");
        spans.forEach((span)=> {
            span.classList.add("oculto");
        })
    }
});

// /* Minimizar barra lateral cuando se abre la vista de registrar ventas */
// function activarModoMini () {
//     barraLateral.classList.add("mini-barra-lateral");
//     main.classList.add("min-main");
//     spans.forEach(span => {
//         span.classList.add("oculto");
//     });
// }
// // Verificar si la URL actual contiene el fragmento que identifica la vista "registrarventas"
// function verificarVistaRegistrarVentas() {
//     const urlActual = window.location.href;
//     if (urlActual.includes("ventanaventas") || urlActual.includes("buscarprod")) {
//         activarModoMini();
//     }
// }

// // Llamar a la función para verificar la vista cuando se carga la página
// verificarVistaRegistrarVentas();