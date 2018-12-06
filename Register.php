<!doctype html>
<?php
/*
 * Student 1 : Ayman Fattar
 * Student# 1 : 218327676
 * Title: Task 1
 * Declaration: This is my own work and
 *  any code obtained from other sources
 *  will be referenced
 * Source #1: Bootsnipp.com
 */
include_once ('inc_function.php');
include_once('DBConn.php');
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/LoginRegister.css">
</head>

<body>
<!--div class="container-fluid"-->

<?php function DispRegister(){ ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="register-form" action="<?= $_SERVER['SCRIPT_NAME'] ?>" method="post" style="display: block;">
                                    <h2>REGISTER</h2>
                                    <div class="form-group">
                                        <input type='text' pattern="[A-Za-z]{*}" placeholder="First Name" class="form-control"  name="Fname" required>
                                    </div>

                                    <div class="form-group">
                                        <input type='text' pattern="[A-Za-z]{*}" placeholder="Last Name" class="form-control" name="Lname" required>
                                    </div>
                                    <div class="form-group">
                                        <input type='email' placeholder="Email" class="form-control" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type='text' pattern="[0-9]{10}" placeholder="Cell number" class="form-control" name="phone" required>
                                    </div>
                                    <div class="form-group">
                                        <input type='password' placeholder="Password" class="form-control   " name="password" required>
                                    </div>

                                    <br/>
                                    <div class="form-group">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6 tabs">
                                <a href="Login.php" class="active" id="login-form-link"><div class="login">LOGIN</div></a>
                            </div>
                            <div class="col-xs-6 tabs">
                                <a href="#" id="register-form-link"><div class="register">REGISTER</div></a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>


    <?php

    if(isset($_POST['Fname']) and isset($_POST['Lname']) and isset($_POST['email']) and isset($_POST['password']) and isset($_POST['phone'])) {
        $Fname = $_POST['Fname'];
        $Lname = $_POST['Lname'];
        $email = $_POST['email'];
        $pass = md5($_POST['password']);
        $phoneNumber = $_POST['phone'];

        $sqlInsertT = "INSERT INTO student (FName, LName, Email, Password, CellNumber, UserImage) VALUES ('$Fname','$Lname','$email','$pass','$phoneNumber','');";

        $QResultIT = $DBConnect->query($sqlInsertT);
        if($QResultIT === FALSE){
            echo "Problem";
        }else{
            $sqlReadT = "Select Fname,Lname,email,password, cellNumber, UserImage From student WHERE email = '$email' AND password = '$pass';";

            $QResultRT = $DBConnect->query($sqlReadT);
            while ($row = $QResultRT->fetch_assoc()) {
                DispUser($row);
                exit;
            }
            $QResultRT->free();
        }
    }else{
        DispRegister();
    }
?>
</div>
</body>
</html>
