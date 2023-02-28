<?php
$title = "Update Post";
require_once "./includes/header.php";
require_once "./config/bootstrap.php";
$id=$_GET['id'];
$post=Post::getPost($id);

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $post_title=$_POST["title"];
    $post_body=$_POST["body"];
    $_SESSION['updatePost'] = "$id - post changed successfully";
    Post::updatePost($post_title,$post_body,$id);
}
?>

<div class="container">
    <div class="mx-auto my-4 p-5">
        <div class="card p-5 shadow rounded my-4">
            <h1 class="text-center text-primary mb-3"><?= $title ?></h1>
        <form action="" method="POST">
            <label class="form-label">Enter a title text</label>
            <input type="text" class="form-control mb-3" name="title" value="<?= $post->title ?>">
            <label for="exampleFormControlTextarea1" class="form-label">Enter a body text</label>
            <textarea class="form-control mb-4" name="body" id="exampleFormControlTextarea1" rows="3"><?= $post->body ?></textarea>
            <button class="btn btn-success d-block py-2 w-75 mx-auto text-white fs-5">Submit</button>
        </form>
        </div>
    </div>
</div>

<?php require_once "includes/footer.php" ?>