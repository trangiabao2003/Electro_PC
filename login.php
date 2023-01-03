<?php
include 'connect.php';
session_start();
if(isset($_POST['submit'])) {
 
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = ($_POST['password']);

    $sql = "SELECT * FROM user_info WHERE email = '$email' && password = '$pass'";
    $query = mysqli_query($conn, $sql) ;
    if(mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
    
        $_SESSION['user_id'] = $row['ID'];
        $_SESSION['name_user'] = $row['username'];

header('location:index.php');
    
} else {
    $error[] = 'incorrect email or password';
}
}
?>


<!DOCTYPE html>
<link rel="icon" href="./img/logo.png" type="image" >

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/image/logoweb.png" />
    <title>Login form</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');
* {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    outline: none;
    border: none;
    text-decoration: none;
}

.container {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    padding-bottom: 60px;
}

.container .content {
    text-align: center;
}

.container .content h3 {
    font-size: 30px;
    color: #333;
}

.container .content h3 span {
    background: crimson;
    color: #fff;
    border-radius: 5px;
    padding: 0 15px;
}

.container .content h1 {
    font-size: 50px;
    color: #333;
}

.container .content h1 span {
    color: crimson;
}

.container .content p {
    font-size: 25px;
    margin-bottom: 20px;
}

.container .content .btn {
    display: inline-block;
    padding: 10px 30px;
    font-size: 20px;
    background: #333;
    color: #fff;
    margin: 0 5px;
    text-transform: capitalize;
}

.container .content .btn:hover {
    background: crimson;
}

.form-container {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    padding-bottom: 60px;
    background: #eee;
}

.form-container form {
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
    background: #fff;
    text-align: center;
    width: 500px;
}

.form-container form h3 {
    font-size: 30px;
    text-transform: uppercase;
    margin-bottom: 10px;
    color: #333;
}

.form-container form input,
.form-container form select {
    width: 100%;
    padding: 10px 15px;
    font-size: 17px;
    margin: 8px 0;
    background: #eee;
    border-radius: 5px;
}

.form-container form select option {
    background: #fff;
}

.form-container form .form-btn {
    background: #fbd0d9;
    color: crimson;
    text-transform: capitalize;
    font-size: 20px;
    cursor: pointer;
}

.form-container form .form-btn:hover {
    background: crimson;
    color: #fff;
}

.form-container form p {
    margin-top: 10px;
    font-size: 20px;
    color: #333;
}

.form-container form p a {
    color: crimson;
}

.form-container form .error-msg {
    margin: 10px 0;
    display: block;
    background: crimson;
    color: #fff;
    border-radius: 5px;
    font-size: 20px;
    padding: 10px;
}
    </style>
</head>
<body>
    <div class="form-container">
        <form action="" method="POST">
            <h3>Đăng nhập</h3>
<?php
            if(isset($error)) {
                foreach($error as $error) {
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            };
            ?>
         
            <input type="email" name="email" required placeholder="Enter your email">
            <input type="password" name="password" required placeholder="Enter your password">
        
            <input type="submit" name="submit"value="Login now" class="form-btn">
            <p>Don't have an account? <a href="RegisterForm.php">Đăng kí</a></p>
        </form>
    </div>
</body>
</html>