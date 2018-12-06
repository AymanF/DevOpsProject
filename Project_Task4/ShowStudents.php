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
<div class="container-fluid">
    <div class="jumbotron">
        <div class="container">
            <h1 align="center">Welcome</h1>
            <h2 align="center">Here you will find the list of our students</h2>
        </div>
    </div>
    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">List of students</div>

        <!-- Table -->
        <table class="table">
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Cell number</th>
                <th>Picture</th>
                <th>More</th>
            </tr>
    <?php
    $sqlReadT = "Select Fname,Lname,email,CellNumber, UserImage From tbl_user;";

    $QResultRT = $DBConnect->query($sqlReadT);
    if ($QResultRT === FALSE){
        echo "<p> Unable to perform SQL Request </p>";
    }
    else{
        while ($row = $QResultRT->fetch_assoc()) {
            ShowStudents($row);
            }
        }
        ?>

    <?php
    function ShowStudents($row){

        ?>
            <tr>
                <td><?= $row['Fname'] ?></td>
                <td><?= $row['Lname'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['CellNumber'] ?></td>
                <td>
                    <button>
                        <?php if(!$row['UserImage'] ){?>
                            <img height=70,width=60 src='images/Default.jpg' onclick="window.open(this.src,'_blank', 'location=yes,height=128,width=128,status=yes')">
                        <?php } else{ ?>
                            <img height=70,width=60 src='images/<?= $row['UserImage']?>.jpg' onclick="window.open(this.src,'_blank', 'location=yes,height=128,width=128,status=yes')">
                        <?php } ?>
                    <!--img height=70,width=60 src='images/<!--?= $row['UserImage']?>.jpg' onclick="window.open(this.src,'_blank', 'location=yes,height=128,width=128,status=yes')"-->
                    </button>
                </td>
            </tr>
   <?php } ?>
        </table>
    </div>
</div>

</body>
</html>