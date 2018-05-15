<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<div class="jumbotron">
    <h1 class="text-center">Mon super blog !</h1>
</div>
<p class="alert alert-info">Derniers billets du blog :</p>


<?php
while ($data = $posts->fetch())
{
?>
    <div class="card">
        <h3 class="card-header">
            <?= htmlspecialchars($data['title']) ?>
            <em>(le <?= $data['creation_date_fr'] ?>)</em>
        </h3>
        
        <p class="card-body">
            <?= nl2br(htmlspecialchars($data['content'])) ?>
            <br />
            <em><a href="index.php?action=post&id=<?= $data['id'] ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>