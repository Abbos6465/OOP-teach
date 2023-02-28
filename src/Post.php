<?php
    class Post{
        public static $pdo;
        public $id;
        public $title;
        public $body;
        public $created_at;

        public static function getAll(){
            $stetament = self::$pdo ->prepare("SELECT * FROM posts");
            $stetament -> setFetchMode(PDO::FETCH_CLASS,'Post');
            $stetament->execute();
            $posts=$stetament->fetchAll();
            return $posts;
            exit;
        }

        public static function getById($id){
            $stetament=self::$pdo->prepare("SELECT * FROM posts WHERE id=?");
            $stetament->setFetchMode(PDO::FETCH_CLASS,"Post");
            $stetament->execute([$id]);
            $posts=$stetament->fetch();
            return $posts;
            exit;
        }

        public static function setPost($title,$body){
            $stetament=self::$pdo->prepare("INSERT INTO posts (title,body) VALUES (:title,:body)");
            $stetament->setFetchMode(PDO::FETCH_CLASS,"Post");
            $stetament->execute([
                "title" => $title,
                "body" =>$body
            ]);
            header("location:index.php");
            exit;
        }

        public static function deletePost($id){
            $stetament=self::$pdo->prepare("DELETE FROM posts WHERE id=?");
            $stetament->setFetchMode(PDO::FETCH_CLASS,"Post");
            $stetament->execute([$id]);
            header("location:index.php");
            exit;
        }

        public static function getPost($id){
            $stetament = self::$pdo -> prepare("SELECT * FROM posts WHERE id=?");
            $stetament->setFetchMode(PDO::FETCH_CLASS,"Post");
            $stetament->execute([$id]);
            $post = $stetament->fetch();
            return $post;
            exit;
        }

        public static function updatePost($title,$body,$id){
            $stetament=self::$pdo->prepare("UPDATE posts SET title=:title,body=:body WHERE id=:id");
            $stetament->setFetchMode(PDO::FETCH_CLASS,"Post");
            $stetament->execute([
                'title' => $title,
                'body' => $body,
                "id" => $id
            ]);
            header("location:index.php");
        }
    }
?>