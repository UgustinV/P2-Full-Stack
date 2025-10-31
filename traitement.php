<?php
include 'bdd.php';

$formData = $_POST;

if(
    !isset($formData['submit'])
    || empty($formData['titre'])
    || empty($formData['artiste'])
    || strlen(trim($formData['description'])) < 3
    || !filter_var($formData['image'], FILTER_VALIDATE_URL)
    ) {
        echo 'Quelque chose ne va pas dans le formulaire. Veuillez recommencer.';
        header('Location: ajouter.php');
        return;
}
else {
    $titre = htmlspecialchars($_POST['titre']);
    $artiste = htmlspecialchars($_POST['artiste']);
    $image = htmlspecialchars($_POST['image']);
    $description = htmlspecialchars($_POST['description']);
    
    $dbClient = connexion();
    $insertOeuvre = $dbClient->prepare('INSERT INTO oeuvres(titre, artiste, image, description) VALUES(:titre, :artiste, :image, :description)');
    $insertOeuvre->execute([
        'titre' => $titre,
        'artiste' => $artiste,
        'image' => $image,
        'description' => $description
    ]);

    header('Location: oeuvre.php?id=' . $dbClient->lastInsertId());
}
?>