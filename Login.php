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
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/LoginRegister.css">

<body>

<?php //Script 5.31
include_once("inc_function.php");
include_once('DBConn.php');
?>


<?php
if(isset($_POST['email']) AND isset($_POST['password'])) {
    $email = $_POST['email'];
    $pass = md5($_POST['password']);

    $sqlReadT = "Select Fname,Lname,email,password, cellNumber, UserImage From student WHERE email = '$email' AND password = '$pass';";
    $QResultRT = $DBConnect->query($sqlReadT);

    if ($QResultRT === FALSE) {
        echo "Wrong";
        DispLogIn();
    }
    else{
        while ($row = $QResultRT->fetch_assoc()) {
            DispUser($row);
        }
        $QResultRT->free();
    }

}else{
    DispLogIn();
}


$DBConnect->close();
?>
</body>
</html>
