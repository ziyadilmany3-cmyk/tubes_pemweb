<?php
session_start();

include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_query(
    $conn,
    "SELECT * FROM user
    WHERE username='$username'
    AND password='$password'"
);

if(mysqli_num_rows($data)>0){

    $_SESSION['username']=$username;

    // COOKIE
    if(isset($_POST['remember'])){

        setcookie(
            "username",
            $username,
            time()+(60*60*24*7),
            "/"
        );

        setcookie(
            "password",
            $password,
            time()+(60*60*24*7),
            "/"
        );

    }else{

        setcookie("username","",time()-3600,"/");
        setcookie("password","",time()-3600,"/");

    }

    echo "
    <script>
        alert('Login berhasil!');
        window.location='dashboard.php';
    </script>
    ";

}else{

    echo "
    <script>
        alert('Username atau Password salah!');
        window.location='login.php';
    </script>
    ";

}
?>