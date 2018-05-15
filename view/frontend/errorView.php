<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<div class="jumbotron">
    <h1 class="text-center">Oups ! Une erreur est survenue !</h1>
</div>

<p class="alert alert-danger"><?= $errorMessage ?></p>

<img src="public/images/giphy.gif" alt="crushing head against keyboard" class="rounded mx-auto d-block" />

<p><a class="btn btn-primary" href="index.php">Retourner à l'acceuil</a></p>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>