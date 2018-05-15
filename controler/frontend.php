<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts()
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function editComment($commentId) //Ajout d'une méthode pour éditer un commentaire
{
	$commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

	//On récupère le commentaire à modifier
	$comment = $commentManager->getComment($commentId);

	//Si le formulaire a été rempli, on édite le commentaire puis on redirige vers le billet(post)
	if (!empty($_POST['author']) && !empty($_POST['comment'])) {
		$commentManager->editComment($commentId, $_POST['author'], $_POST['comment']);

		header('Location: index.php?action=post&id=' . $comment['post_id']);
	}

	//Sinon, on affiche la page du formulaire prérempli à partir du commentaire existant
	require('view/frontend/editView.php');
}