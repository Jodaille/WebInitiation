<?php
/**
* Envoi et réception d'un formulaire avec PHP
* @author: Jodaille
*
*/
// Nous créons et initialisons une variable nommée : $ton_nom
$ton_nom = null;

// Et une autre $grand_titre qui contient le premier titre de la page
$grand_titre = 'Initiation au HTML et PHP';

/**
Notre formulaire form ci-après utilise la méthode GET
pour envoyer son contenu.
Nous utilisons une variable $reception pour y stocker
le contenu de ce que nous recevons.
Cela permettra de changer plus tard aisément la métode utilisée (POST)
*/
$reception = $_GET;

/**
Nous vérifions que nous avons reçu une valeur dans
le paramètre nom pour l'affecter à notre variable $ton_nom

*/
if(isset($reception['nom']))
{
    $ton_nom = $reception['nom'];
    $grand_titre = 'Bonjour ' . $ton_nom . ' !';
}
?>
<!doctype html>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Page d'accueil</title>

<body>
    <h1><?php echo $grand_titre ?></h1>

    <blockquote cite="https://fr.wikipedia.org/wiki/PHP">
      <p><strong>PHP: Hypertext Preprocessor</strong>, plus connu sous son sigle PHP (acronyme récursif), est un langage de programmation libre.</p>
    </blockquote>

    <form name="formulaireSimple" method="get">
        <label name="libelle">Quel est non nom ?
        <input type="text" name="nom" value="<?php echo $ton_nom ?>" />
        </label>
        <input type="submit" name="bouton" value="Envoyer" />
    </form>

</body>


</html>
