// Mettre curseur automatiquement dans l'input au chargement
$(document).ready(function(){
    $('#search_title').focus();
});

// Slide de la recherche
$(document).ready(function(){
    $("#search_plus").click(function(){
        $("#plus").slideToggle(500, "linear", function () {
            if ($("#search_plus").val() == "+") {
                $("#search_plus").text("-");
                $("#search_plus").val("-");
            }
            else {
                $("#search_plus").text("+");
                $("#search_plus").val("+");
            }
        });
    });
});