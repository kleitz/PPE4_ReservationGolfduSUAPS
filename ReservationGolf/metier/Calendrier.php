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
     *          Chaine de caractère au format '31-12-2017' -> date de début.
     *
     * @param $nb_de_j
     *          Entier -> nombre de jours dans le calendrier à partie de la date.
     */
    function __construct($date, $nb_de_j)
    {
        $this->_date_debut = $date;
        $this->_nb_de_jours = $nb_de_j;
    }


    /**
     * Fonction permettant de charger des dates au format chaîne de caractères dans un tableau.
     *
     * @return
     *          Un tableau avec tout le calendrier en chaine au format : dimanche 3 avril 2017 ...
     */
    function charger_dates()
    {
        $tableau_date = null;
        $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG,
            IntlDateFormatter::NONE, 'Europe/Paris', IntlDateFormatter::GREGORIAN);

        $formatter->setPattern("EEEE d MMMM y");

        for ($j = 0; $j < $this->_nb_de_jours; $j++) {
            try {
                $date = new DateTime($this->_date_debut . '+ ' . intval($j) . ' day');
                $tableau_date[$j] = $formatter->format($date);
                //echo $tableau_date[$j] . '<br>';
            } catch (Exception $e) {
                echo $e->getMessage();
                exit(1);
            }
        }
        return $tableau_date;
    }

    /**
     * Fonction permettant de retourner la semaine de notre choix.
     *
     * @param $num
     *          Numéro de la semaine à afficher à partir de la date de débt d'instance de la classe.
     *
     * @return
     *          Un tableau d'une semaine.
     */
    function charger_semaine_du_tableau($num)
    {
        $tab = null;
        if ($this->_nb_de_jours > 100) {
            $deb = ($num) * 7;
            for ($i = $deb, $j = 0; $i < $this->_nb_de_jours && $j < 7; $i++, $j++) {
                $tab[$j] = $this->charger_dates()[$i];
            }
        }
        return $tab;
    }

    /**
     * Fonction permettant de préciser le mois dans l'ensemble des dates recouvertes par la fonction charger_date().
     *
     * @param $tab_dates
     *          tableau de chaines représentant les dates au format retourné par la méthode charger_dates().
     *
     * @param $mois_choisi
     *          chaine de caractère représentant le critère mois
     *          ex : "janvier", "décembre"...
     *
     * @param $annee_choisie
     *          chaine de caractère représentant le critère année
     *          ex : "2017", "2018"...
     *
     * @return
     *          Un tableau de chaine avec les dates du mois de l'année choisies parmi le tableau
     *          ex: uniquement les jours du mois de janvier 2018
     */
    function charger_mois_du_tableau($tab_dates, $mois_choisi, $annee_choisie)
    {
        $tab = null;
        if ($this->_nb_de_jours > 100) {
            for ($i = 0; $i < $this->_nb_de_jours; $i++) {
                $mois = explode(" ", $tab_dates[$i])[2];
                $annnee = explode(" ", $tab_dates[$i])[3];

                if ($mois == $mois_choisi && $annnee == $annee_choisie) {
                    $tab[$i] = $tab_dates[$i];
                }
            }
        }

        return $tab;
    }

    /**
     * @param $date_ENG
     *             La date au format ENG, SQL : 2017-12-31.
     *
     * @return string
     *              LA conversion au format FR : 31-12-2017.
     */
    static function convertir_date_ENG_FR($date_ENG)
    {
        try {
            $date = new DateTime($date_ENG);
        } catch (Exception $e) {
            echo $e->getMessage();
            exit(1);
        }
        return $date->format('d-m-Y');
    }

    /**
     * @param $date_FR
     *             La date au format FR : 31-12-2017.
     *
     * @return string
     *              LA conversion au format ENG, SQL: 2017-12-31.
     */
    static function convertir_date_FR_ENG($date_FR)
    {
        try {
            $date = new DateTime($date_FR);
        } catch (Exception $e) {
            echo $e->getMessage();
            exit(1);
        }
        return $date->format('Y-m-d');
    }

}


