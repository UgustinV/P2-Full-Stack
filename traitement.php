<?php
    require 'bdd.php';

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
        
    }
?>