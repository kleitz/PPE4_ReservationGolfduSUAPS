var cpt_click = 0;
var pseudo;
var num_joueur;

var date_reserv;
var date_jour = $(".barre_date").text().trim();

var btn_valider = $("#btn-validation");

$("td").click(function () {
    cpt_click++;
    pseudo = $(".menu_titre").text();
    pseudo = pseudo.trim();

    date_reserv = $(this).parents().html();
    date_reserv = date_reserv.split("<")[1];
    date_reserv = date_reserv.split(">")[1];

    num_joueur = $(this).attr('class').substr(3, 1);

    var reservation_valide = date_reserv_valide(date_jour, date_reserv);

    if(reservation_valide) {
        if ($(this).text() === "" && (cpt_click <= 1)) {

            $(this).append("réservation : " + pseudo);
            $(this).toggleClass('selection');

            btn_valider.attr('value', 'validation');
            document.getElementById("btn-validation").style.visibility = "visible";


        } else if ($(this).text() === "réservation : " + pseudo) {
            $(this).empty();
            $(this).toggleClass('selection');
            cpt_click = 0;
            btn_valider.attr('value', 'validation');
            document.getElementById("btn-validation").style.visibility = "hidden";
        }
    }else{
        cpt_click = 0;
    }

});


btn_valider.click(function () {

    if (btn_valider.val() === (date_reserv)) {
        alert("Réservation effectuée par " + pseudo + " pour le " + btn_valider.val() + " en tant que joueur n°" + num_joueur);
    }
    btn_valider.attr('value', (date_reserv));

});

/////////////FONCTIONS///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

var date_en_ENG = function (date) {
    var tab_mois = ['janvier', "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"];
    var jour = date.split(" ")[1];
    var mois = date.split(" ")[2];
    var mois_chiffre = 0;
    for (var i = 0; i < tab_mois.length; i++) {
        if (mois === tab_mois[i]) mois_chiffre = i + 1;
    }
    var annee = date.split(" ")[3];
    if (jour < 10) jour = "0" + jour;
    if (mois < 10) mois = "0" + mois;

    return annee + "/" + mois_chiffre + "/" + jour;
};

var date_reserv_valide = function (date_j, date_r) {
    var date_jour = date_en_ENG(date_j);
    var date_res = date_en_ENG(date_r);

    var datej_num = (date_jour.replace("/", "")).replace("/", "");
    var dater_num = (date_res.replace("/", "")).replace("/", "");
    return (datej_num <= dater_num);

};

