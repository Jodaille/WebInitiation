<?php
/**
* Réception des données et écriture d'un fichier csv avec PHP
* @author: Jodaille
*
*/
// Pour facliter le debug nous activons le rapport des erreurs
error_reporting(E_ALL);
// et leur affichage
ini_set('display_errors', true);

// Créons une variable pour le répertoire de stockage des fichiers
$dataDir = 'data';

// Créons une variable pour le nom du fichier csv dans lequel nous
// enregistrons nos données
$dataFichier = 'donnees.csv';


/**
Nous utilisons une variable $reception pour y stocker
le contenu de ce que nous recevons.
Cela permettra de changer plus tard aisément la métode utilisée (POST ou GET ici)
*/
$reception = $_GET;

// Nous initialisons des variables qui recevrons nos valeurs
$ruche = null;
$temperature = null;
$humidite = null;
$hauteur_pluie_mm = null;

// la variablle $ligne contiendra nos valeurs
$ligne = null;

/**
Nous vérifions que nous avons reçu une valeur dans
le paramètre ruche pour l'affecter à notre variable $ruche
*/
if(isset($reception['ruche']))
{
    $ruche = $reception['ruche'];
}
// De mêm pour les autres
if(isset($reception['temperature']))
{
    $temperature = $reception['temperature'];
}
if(isset($reception['humidite']))
{
    $humidite = $reception['humidite'];
}
if(isset($reception['hauteur_pluie_mm']))
{
    $hauteur_pluie_mm = $reception['hauteur_pluie_mm'];
}

if($ruche)
{
    // il nous faut la date l'heure et les ms, nous appelons notre fonction
    $heure = getHeure();

    // nous construisons une chaine qui sera une ligne du fichier
    $ligne = "$heure;$ruche;$temperature;$humidite;$hauteur_pluie_mm\n";

    $chemin_du_fichier = "./$dataDir/$dataFichier";

    // nous ecrivons la ligne à la suite du fichier
    file_put_contents($chemin_du_fichier, $ligne,FILE_APPEND);
}

$lien_vers_fichier = "$dataDir/$dataFichier";
?>

<?php echo $ligne; ?>
<br >
<form name="formulaire" method="GET">
    <label for="ruche">Ruche
        <input type="text" name="ruche" value="" />
    </label>
    <label for="temperature">T°C
        <input type="text" name="temperature" value="" />
    </label>
    <label for="humidite">H%
        <input type="text" name="humidite" value="" />
    </label>
    <label for="hauteur_pluie_mm">mm
        <input type="text" name="hauteur_pluie_mm" value="" />
    </label>
    <input type="submit" name="bouton" value="Envoyer" />

</form>
<hr >
<a href="<?php echo $lien_vers_fichier; ?>" target="_blank">Récupérer le fichier</a>

<?php
/**
* Fonction retorunant l'heure avec les milli seocndes
*/
function getHeure()
{
    $t = microtime(true);
    $micro = sprintf("%06d",($t - floor($t)) * 1000000);
    $d = new DateTime( date('Y-m-d H:i:s.'.$micro, $t) );

    $time = $d->format("Y-m-d H:i:s.u"); // note at point on "u"
    return $time;
}
