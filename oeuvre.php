<?php
    require 'header.php';
    require 'bdd.php';

    $dbClient = connexion();

    // Si l'URL ne contient pas d'id, on redirige sur la page d'accueil
    if(empty($_GET['id'])) {
        header('Location: index.php');
    }
    $id = $_GET['id'];
    $oeuvreRequest = $dbClient->prepare('SELECT * FROM oeuvres WHERE id = :id');
    $oeuvreRequest->execute(['id' => $id]);
    $oeuvre = $oeuvreRequest->fetch();

    if(is_null($oeuvre) || empty($oeuvre)) {
        header('Location: index.php');
    }
?>

<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['titre'] ?>">
    </div>
    <div id="contenu-oeuvre">
        <h1><?= $oeuvre['titre'] ?></h1>
        <p class="description"><?= $oeuvre['artiste'] ?></p>
        <p class="description-complete">
             <?= $oeuvre['description'] ?>
        </p>
    </div>
</article>

<?php require 'footer.php'; ?>
