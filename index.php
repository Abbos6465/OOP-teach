<?php
    require_once "./includes/header.php";
    require_once "./config/bootstrap.php";

    $posts = Post::getAll();

    if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["Delete"])){
        $id = $_POST['id'];
        $_SESSION["deletePost"] = "$id - id post deleted";
        Post::deletePost($id);
    }
?>
        <header class="bg-primary py-3">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="text-white">OOP Blog</h1>
                    <a href="./create_post.php" class="text-decoration-none text-white btn btn-success">Create posts</a>
                </div>
            </div>
        </header>
        <div class="container">
            <div class="mt-3 mx-auto alert alert-<?php if($_SESSION['create_post']){echo "success";} 
                 if($_SESSION['deletePost']){echo "danger";}
                 if($_SESSION['updatePost']){echo "primary";}
                ?>" role="alert">
                <?php 
                    if($_SESSION['create_post']){
                        echo "<h3 class='text-center'>". $_SESSION['create_post'] . "</h3>";
                        unset($_SESSION['create_post']);
                    }
                    if($_SESSION["deletePost"]){
                        echo "<h3 class='text-center'>" . $_SESSION["deletePost"] . "</h3>";
                        unset($_SESSION['deletePost']);
                    }
                    if($_SESSION["updatePost"]){
                        echo "<h3 class='text-center'>" . $_SESSION["updatePost"] . "</h3>";
                        unset($_SESSION['updatePost']);
                    }
        
                ?>
            </div>
            <div class="list-group mt-3">
                <?php foreach($posts as $post): ?>
                    <div class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <a href="./post.php?id=<?=$post->id?>" class="text-decoration-none">
                                <h3 class="mb-1"><?= $post->title ?></h3>
                            </a>
                            <small><?= $post->id ?></small>
                        </div>
                        <p class="mb-1"><?= $post->body ?></p>
                        <div class="d-flex align-items-center justify-content-between my-3">
                            <div class="btn-group">
                                <a href="./post_update.php?id=<?= $post->id ?>" class="btn btn-warning">Update</a>
                                <form action="" method="POST" class="btn-group">
                                    <input type="hidden" name="Delete">
                                    <input type="hidden" name="id" value="<?=$post->id?>">
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </div>
                            <div class="text-end"><?= $post->created_at ?></div>
                        </div>
                        </div>
                <?php endforeach; ?>
                
            </div>
       </|div>
<?php require_once "./includes/footer.php"; ?>