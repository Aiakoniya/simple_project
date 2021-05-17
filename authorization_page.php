<?php

session_start();
include('config.php');
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = $connection -> prepare("SELECT * FROM users WHERE email =: email");
    $query -> bindParam("email", $email, PDO::PARAM_STR);
    $query -> execute();
    $result = $query -> fetch(PDO::PARAM_STR);
    if(!$result){
        echo '<p class="error"> Username password combination is wrong! </p>';
    }
    else{
        if(password_verify($password, $result['password'])){
            $_SESSION['user_id'] = $result['id'];
            echo '<p class= "success"> Username password combination is wrong!</p>';
        }
    }
}

?>

<!Doctype html>
<html>
<head>
    <title>
        Authorization
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"></script>
</head>
<body>
<div class="m-5">
<h1>
    Authorization Form
</h1>

<form action="welcome.php" method="post" name="signin-form" class="row g-3 needs-validation" novalidate>
    <div class="col-md-4">
    <label class="form-label">
        Login
    </label>
    <input type="text"name="login" class="form-control">
    </div>
    <br>
    <div class="col-md-4">
    <label class="form-label">Password</label>
    <input type="password" name="password" class="form-control">
    </div>
    <br> <button class="btn btn-secondary">Submit</button>
</form></div>
</body>
</html>