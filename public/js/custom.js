function nobackbutton()
{
    history.go(1);
    window.location.hash="no-back-button";
    window.location.hash="Again-No-back-button"
    window.onhashchange=function(){window.location.hash="no-back-button";}
}

function guarda() {
    // Aquí va la lógica que quieras ejecutar cuando el input pierda el foco
    console.log("El campo usuario ha perdido el foco");
}

