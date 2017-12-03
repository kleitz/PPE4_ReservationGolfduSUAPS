<?php
try {
    $date = new DateTime('2000-01-01');
} catch (Exception $e) {
    echo $e->getMessage();
    exit(1);
}

echo $date->format('d-m-Y');
?>

<?php

define('MYSQL_DATETIME_FORMAT','Y-m-d H:i:s');

define('MYSQL_DATE_FORMAT','Y-m-d');

try{    // On effectue la connexion si nécessaire    

    $db=new PDO('mysql:localhost;db=madb','root','');    

    $db->setAttribute(PDO::ATTR_ERR_MODE,PDO::ERR_MODE_EXCEPTION);

    // On crée un DateTime PHP  

    $date =new DateTime('14/02/12');    

    $req = $db->prepare('INSERT INTO tableName(col_date_time) VALUES(:dt)');    

    $req->bindValue('dt',$date->format(MYSQL_DATETIME_FORMAT));    

    $req->execute();   

}catch(PDOException $e){

    exit($e->getMessage());

}
?>

<?php

$formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG,
    IntlDateFormatter::NONE, 'Europe/Paris', IntlDateFormatter::GREGORIAN);

$formatter->setPattern("EE d MMMM y");	
	
for($j=0;$j<14;$j++){
    try {
        $date = new DateTime('01-12-2017 + ' . intval($j) . ' day');
        $tableau_date_dec_2017[$j] = $formatter->format($date);
        echo $tableau_date_dec_2017[$j].'<br>';
    }catch(Exception $e){
        echo $e->getMessage();
        exit(1);
    }
}