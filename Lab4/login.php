<?php
    
    session_start();
    require("header2.php");
    $mysqli = new mysqli('localhost','imnotroot','123Secured!@#','pmvcwgnz_lab4') or die(mysqli_error($mysqli));
    if(isset($_POST["uname"]) && isset($_POST["upassword"])){
        $uname=$_POST["uname"];
        $upassword=$_POST["upassword"];
        $result = $mysqli->query("SELECT * FROM users WHERE uname = '$uname'") or die($mysqli->error);
        if (mysqli_num_rows($result)==1) {
            $row=mysqli_fetch_assoc($result);
            $stored_hash = $row["upassword"];
            if (password_verify($upassword, $stored_hash)) {
                $_SESSION["user_id"]=$row["id"];
                $_SESSION["user_type"] = $row["utype"];
                header("Location: landing.php"); 
            }
            else {
                header("Location: login.php?login=error");
            }
        }
        else {
            header("Location: login.php?login=error");
        }
    }    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>DN | Login</title>
    <style>
        * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
           
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f0f2f5;
    color: #1c1e21;
}

main {
    height: 90vh;
    width: 100vw;
    position: relative;
    margin: 0 auto;
}

footer {
    height: 10vh;
    background-color: #ffffff;
}

.row {
    display: flex;
    justify-content: space-around;
    align-items: center;
    width: 100%;
    max-width: 1000px;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
}

.colm-logo {
    flex: 0 0 50%;
    text-align: left;
}

.colm-form {
    flex: 0 0 40%;
    text-align: center;
}

.colm-logo img {
    max-width: 400px;
}

.colm-logo h2 {
    font: 26px;
    font-weight: 400;
    padding: 0 30px;
    line-height: 32px;
}

.colm-form .form-container {
    background-color: #ffffff;
    border: none;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1), 0 8px 16px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
    padding: 20px;
    max-width: 400px;
}

.colm-form .form-container input, .colm-form .form-container .btn-login {
    width: 100%;
    margin: 5px 0;
    height: 45px;
    vertical-align: middle;
    font-size: 16px;
}

.colm-form .form-container input {
    border: 1px solid #dddfe2;
    color: #1d2129;
    padding: 0 8px;
    outline: none;
}

.colm-form .form-container input:focus {
    border-color: #1877f2;
    box-shadow: 0 0 0 2px #e7f3ff;
}

.colm-form .form-container .btn-login {
    background-color: #61b4cd;
    border: none;
    border-radius: 6px;
    font-size: 20px;
    padding: 0 16px;
    color: #ffffff;
    font-weight: 700;
}

.colm-form .form-container a {
    display: block;
    color: #1877f2;
    font-size: 14px;
    text-decoration: none;
    padding: 10px 0 20px;
    border-bottom: 1px solid #dadde1;
}

.colm-form .form-container a:hover {
    text-decoration: underline;
}

.colm-form .form-container .btn-new {
    background-color: #42b72a;
    border: none;
    border-radius: 6px;
    font-size: 17px;
    line-height: 48px;
    padding: 0 16px;
    color: #ffffff;
    font-weight: 700;
    margin-top: 20px; 
}

.colm-form p {
    font-size: 14px;
}

.colm-form p a {
    text-decoration: none;
    color: #1c1e21;
    font-weight: 600;
}

.colm-form p a:hover {
    text-decoration: underline;
}

.footer-contents {
    position: relative;
    max-width: 1000px;
    margin: 0 auto;
}

footer ol {
    display: flex;
    flex-wrap: wrap;
    list-style-type: none;
    padding: 10px 0;
}

footer ol:first-child {
    border-bottom: 1px solid #dddfe2;
}
           
footer ol:first-child li:last-child button {
    background-color: #f5f6f7;
    border: 1px solid #ccd0d5;
    outline: none;
    color: #4b4f56;
    padding: 0 8px;
    font-weight: 700;
    font-size: 16px;
}

footer ol li {
    padding-right: 15px;
    font-size: 12px;
    color: #385898;
}

footer ol li a {
    text-decoration: none;
    color: #385898;
}

footer ol li a:hover {
    text-decoration: underline;
}

footer small {
    font-size: 11px;
}
    </style>
    <!-- <link rel="stylesheet" href="style2.css"> -->
</head>
<body>
    <main>
        <?php
        if(isset($_GET["login"]) && $_GET["login"]=="error"){
            echo '<script>alert("Invalid Credentials. Try again.")</script>';
        }
        ?>
        <div class="row">
            <div class="colm-logo">
                <img src="https://static.vecteezy.com/system/resources/previews/001/188/041/non_2x/heartbeat-long-line-png.png" alt="Logo">
                <h2>Let's make everything easier..</h2>
            </div>
            <div class="colm-form">
                <h2>Log in to access the app.</h2>
                <br>
                <br>
                <form class="form-container" action="login.php" method="POST">
                    <input type="text" name="uname" placeholder="Username">
                    <input type="password" name="upassword" placeholder="Password">
                    <input type="submit" class="btn-login"></input>
                
                </form>
            </div>
        </div>
    </main>
    <footer>

    </footer>
</body>
</html>