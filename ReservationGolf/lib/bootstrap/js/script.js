var cpt_click = 0;

$("td").click(function () {
    cpt_click++;
    var classe_case=$(this).attr('class');
    var pseudo = $(".menu_titre").text();

    if ($(this).text() === "" && (cpt_click <= 1)) {
        $(this).append("réservation : "+pseudo);
        /*$(this).css('background', "#a3ff65");
        if($(this).parents().attr('class')==='dimanche'){
            $(this).css('background', "#98ff2a");
        }*/
    }else if ($(this).text() === "réservation : "+pseudo){
        $(this).empty();
        /*$(this).css('background', "#f1f5f0");
        if($(this).parents().attr('class')==='dimanche'){
            $(this).css('background', "darkgray");
        }*/
        cpt_click = 0;

    }
});

