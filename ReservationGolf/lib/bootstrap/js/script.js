var cpt_click = 0;

$("td").click(function () {
    cpt_click++;
    var classe_case=$(this).attr('class');
    var pseudo = $(".menu_titre").text();
    //alert(classe_case);
    if ($(this).text() === "" && (cpt_click <= 1)) {
        $(this).append(pseudo);
        $(this).css('background', "#64ffc8");
        if($(this).parents().attr('class')==='dimanche'){
            $(this).css('background', "#61c4ff");
        }
    }else if ($(this).text() === pseudo){
        $(this).empty();
        $(this).css('background', "#f1f5f0");
        if($(this).parents().attr('class')==='dimanche'){
            $(this).css('background', "darkgray");
        }
        cpt_click = 0;
    }
});

