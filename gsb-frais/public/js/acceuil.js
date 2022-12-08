function comptable() {
    document.getElementById("form_visiteur")
    .style.display = "none";

    document.getElementById("form_comptable")
    .style.display = "block";
}

function visiteur() {
    document.getElementById("form_visiteur")
    .style.display = "block";

    document.getElementById("form_comptable")
    .style.display = "none";
}


var numero = 0;
var slide = new Array(
    "../img/canicule.jpg",
    "../img/geste_barriere.png",
    "../img/3.jpg",
    "../img/4.jpg",
    "../img/5.jpg"
    );

function ChangeSlide() {
    numero = numero + 1;
    if (numero < 0) numero = slide.length - 1;
    if (numero > slide.length - 1) numero = 0;
    document.getElementById("slide").src = slide[numero];
    setTimeout("ChangeSlide()", 7500);
}
setTimeout("ChangeSlide()", 7500);