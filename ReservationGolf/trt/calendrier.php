<?php

/**
 * Class Calendrier
 *
 * Classe permettant de créer un calendrier de plusieurs jours à partir d'une date données.
 */
class Calendrier
{
    /**
     * @var $_date_debut
     *
     *      Chaine de caractère au format '31-12-2017' qui précise la première date du calendrier.
     */
    private $_date_debut;

    /**
     * @var $_nb_de_jours
     *
     *      Entier qui désigne le nombre de date à utiliser, créer dans ce calendrier.
     */
    private $_nb_de_jours;


    /**
     * Calendrier constructor.
     *
     * @param $date
     *          Chaine de caractère au format '31-12-2017' -> date de début
     *
     * @param $nb_de_j
     *          Entier -> nombre de jours dans le calendrier
     */
    function __construct($date, $nb_de_j)
    {
        $this->_date_debut = $date;
        $this->_nb_de_jours = $nb_de_j;
    }

    /** Fonction permettant de charger des dates au format chaîne de caractères dans un tableau
     *
     */

    function charger_dates()
    {
        $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG,
            IntlDateFormatter::NONE, 'Europe/Paris', IntlDateFormatter::GREGORIAN);

        $formatter->setPattern("EEEE d MMMM y");

        for ($j = 0; $j < $this->_nb_de_jours; $j++) {
            try {
                $date = new DateTime($this->_date_debut . '+ ' . intval($j) . ' day');
                $tableau_date_dec_2017[$j] = $formatter->format($date);
                echo $tableau_date_dec_2017[$j] . '<br>';
            } catch (Exception $e) {
                echo $e->getMessage();
                exit(1);
            }
        }
    }
}

$cal = new Calendrier('01-12-2017', 20);
$cal->charger_dates();