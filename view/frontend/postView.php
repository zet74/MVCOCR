<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<div class="jumbotron">
    <h1 class="text-center">Mon super blog !</h1>
</div>
<p><a class="btn btn-primary" href="index.php">Retour à la liste des billets</a></p>

<div class="card">
    <h3 class="card-header">
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creation_date'] ?></em>
    </h3>
    
    <p class="card-body">
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
</div>

<h2 class="alert alert-info">Commentaires</h2>

<?php
while ($comment = $comments->fetch())
{
?>
    <div class="card">
        <p class="card-header"><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?> (<a href="index.php?action=editComment&amp;id=<?= $comment['id'] ?>">modifier</a>)</p>
        <p class="card-body"><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    </div>
<?php
}
?>

<h2 class="alert alert-info">Ajouter un commentaire</h2>

<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div class="form-group row">
        <label for="author" class="col-sm-2 col-form-label">Auteur</label>
        <div class="col-sm-10">
            <input type="text" id="author" name="author" class="form-control" />
        </div>
    </div>
    <div class="form-group row">
        <label for="comment" class="col-sm-2 col-form-label">Commentaire</label><br />
        <div class="col-sm-10">
            <textarea id="comment" name="comment" class="form-control"></textarea>
        </div>
    </div>
    <div>
        <input type="submit" class="btn btn-primary" />
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>