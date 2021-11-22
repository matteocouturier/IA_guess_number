<?php


$arrPixelDessine = array();
for ($i = 1; $i <= 400; $i++) {

    if (isset($_GET[$i])) {
        array_push($arrPixelDessine, 1);
    } else {
        array_push($arrPixelDessine, 0);
    }
}
//recuperation de la conf du reseau
$confReseauNeuronal = (dirname(__FILE__) . "/neurones.net");
if (!is_file($confReseauNeuronal)) {
    die("Le fichier neurones.net n'existe pas");
}

//creation du reseau avec la config
$reseauNeuronal = fann_create_from_file($confReseauNeuronal);
if (!$reseauNeuronal) {
    die("Le réseau neuronal ne peu pas etre crée");
}

//execution du calcul dans le reseau
$calculSortie = fann_run($reseauNeuronal, $arrPixelDessine);


$reponseBinaire = '';
foreach ($calculSortie as $sortie) {
    //limite de 0.5
    if ($sortie > 0.5) {
        $sortie = 1;
    } else {
        $sortie = 0;
    }

    $reponseBinaire .= $sortie;
}
$reponseInt = bindec($reponseBinaire);
if (bindec($reponseBinaire) > 9) {
    $reponseInt = '?';
}
echo '<h1>' . $reponseInt . '</h1>';
//destruction du reseau
fann_destroy($reseauNeuronal);

?>