<?php 
session_start();
if(!isset($_SESSION['id'])){
    if($_POST['name']!=null){$name = $_POST['name'];}else{die("Ви не ввели ім'я");}
    if($_POST['password']!=null){$password = $_POST['password'];}else{die("Ви не ввели пароль");}
    include("db.php");
    $request = $connect->query("SELECT id,password FROM Users WHERE name='$name'");
    if ($connect->error) {
        die($connect->error);
    }
    $user=$request->fetch_array();
    if(isset($user['id'])){
        if($password==$user['password']){
            session_start();
            $_SESSION['id']=$user['id'];
        }
        else{
            die("Пароль неправильний.");
        }
    }
    else{
        die("Такого користувача не існує.");
    }  
}
header("Location: index.php");
?>
