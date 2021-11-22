<?php

//début de l'entrainememnt
//récuperation de la valeurs du numéro dessiné en POST
if(isset($_POST['num']))
{
    //récupération des données existantes
    $donneesExistantes = file_get_contents('donnees.data');


    $caracteresDonneesExistantes = explode(" ",$donneesExistantes);
    //incrémentation du nombre d'example dans la fiche d'entrainement
    $nbFicheEntrainement = $caracteresDonneesExistantes[0] + 1 ;


    $donneesExistantes = substr($donneesExistantes,strlen($caracteresDonneesExistantes[0]),-1);
    //mise a niveau du nouveau nombre d'entrainement
    $donneesExistantes = $nbFicheEntrainement. $donneesExistantes;



    // transformation du numéro séléctionner en binnaire
    $binNumero = decbin($_POST['num']);


    //transformation du résultat en 4 octets
    $nbFicheEntrainement= strlen($binNumero);
    if($nbFicheEntrainement == 3){
        $binNumero = '0'.$binNumero;
    }
    if($nbFicheEntrainement == 2){
        $binNumero = '00'.$binNumero;
    }
    if($nbFicheEntrainement == 1){
        $binNumero = '000'.$binNumero;
    }

    //ajout d'un espace entre chaque caractère
    $binNumero = implode(' ', str_split($binNumero));


    $arrPixelDessine=array();

    //récuperation de touts les pixels en POST
    for($i=1;$i<=400;$i++) {
        if (isset($_POST[$i])) {
            array_push($arrPixelDessine,1);
        }
        else{
            array_push($arrPixelDessine,0);
        }
    }
    $donneesExistantes.="\n";

    //ecriture des 400 pixels
    foreach($arrPixelDessine as $binPixelDessine){
        $donneesExistantes .=$binPixelDessine." ";

    }
    $donneesExistantes.="\n";
    $donneesExistantes.=$binNumero."\n";

   //ecriture des données
    file_put_contents('donnees.data',  $donneesExistantes);

    //création de l'apprentissage
    $nbInput = 400;
    $nbOutput = 4;
    $nbCouches = 3;
    $nbNeuronesCentre = 100;
    $erreurVoulue = 0.001;
    $nbMaxGenerations = 500000;
    $nbGenerationAppel = 1000;

    //création du réseau
    $reseauNeuronal = fann_create_standard($nbCouches, $nbInput, $nbNeuronesCentre, $nbOutput);

    if ($reseauNeuronal) {
        fann_set_activation_function_hidden($reseauNeuronal, FANN_SIGMOID_SYMMETRIC);
        fann_set_activation_function_output($reseauNeuronal, FANN_SIGMOID_SYMMETRIC);

        $fichierEntrainement = dirname(__FILE__) . "/donnees.data";
        //entrainement
        if (fann_train_on_file($reseauNeuronal, $fichierEntrainement, $nbMaxGenerations, $nbGenerationAppel, $erreurVoulue)){
            //sauvegarde
            fann_save($reseauNeuronal, dirname(__FILE__) . "/neurones.net");
        }

        //destruction
        fann_destroy($reseauNeuronal);
    }
    ?>
<script>
    document.location.href="index.php";
</script>
<?php
}
