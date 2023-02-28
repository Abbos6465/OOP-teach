<?php
$post_id = $_GET['id'];
$title="Post $post_id";
require_once "includes/header.php";
require_once "config/bootstrap.php";

$post=Post::getById($post_id);

?>

        <div class="container">
            <div class="m-5 p-5">
                <div class="card p-4 shadow rounded">
                    <h1 class="text-center"><?= $post->title ?></h1>
                     <p><?=$post->body ?> </p>
                     <div class="text-end"><?= $post->created_at ?></div>
                </div>
            </div>
        </div>
 <?php require_once "./includes/footer.php" ?>