<?php
    session_start();
    if(isset($_SESSION['id'])) {
        if($_POST['text']!=null){
            $text = $_POST['text'];
        } 
        else {
            die("Ви не ввели текст");
        }
        include("db.php");
        $id=$_SESSION['id'];
        $request = $connect->query("SELECT name FROM Users WHERE id='$id'");
        $user = $request->fetch_array();
        $name=$user['name'];
        $date=date("Y-m-d");
        $connect->query("INSERT INTO Comments (creator, text, date) VALUES ('$name', '$text', '$date')");
    }
    header("Location: index.php");
?>