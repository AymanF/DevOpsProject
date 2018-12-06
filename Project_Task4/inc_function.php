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

function DispLogIn(){
    ?>
    <!--form action="<!--?= $_SERVER['SCRIPT_NAME']?>" method="post">

        <div class="row">
            <p class="offset-4 col-form-label"> First name</p>

            <input type='text' class="form-control col-xl-4 offset-4" value="<!--?php if(isset($_POST['Fname'])) echo $_POST['Fname'] ?>" name="Fname">
        </div>
        <div class="row">
            <p class="offset-4 col-form-label"> Last name</p>

            <input type='text' class="form-control col-xl-4 offset-4" value="<!--?php if(isset($_POST['Lname'])) echo $_POST['Lname'] ?>" name="Lname">
        </div>
        <div class="row">
            <p class="offset-4 col-form-label"> Email</p>

            <input type='text' class="form-control col-xl-4 offset-4" value="<!--?php if(isset($_POST['email'])) echo $_POST['email'] ?>" name="email">
        </div>
        <div class="row">
            <p class="offset-4 col-form-label"> Password</p>

            <input type='password' class="form-control col-xl-4 offset-4" name="password">
        </div>
        <br/>
        <input class="btn btn-success offset-4" type="submit" value="Log in">
        <button class="btn btn-danger" formaction="Register.php">Register now !</button>
    </form-->
    <!--style>
        #login{
            margin-top: 15%;
        }
    </style>
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-primary">
                        <div class="form-wrap">
                            <div class="panel-heading">
                                <h1>Log in with your email account</h1>
                            </div>
                            <div class="panel-body">
                            <form role="form" action="<!--?= $_SERVER['SCRIPT_NAME']?>" method="post" id="login-form" autocomplete="off">
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<!--?php if(isset($_POST['email'])) echo $_POST['email'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="key" class="sr-only">Password</label>
                                    <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                                </div>
                                <input type="submit" id="btn-login" class="btn btn-success btn-lg btn-block" value="Log in">
                                <button class="btn btn-danger btn-lg btn-block" formaction="Register.php" >Register now !</button>
                            </form>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div> <!-- /.col-xs-12 -->
            <!--/div> <!-- /.row -->
        <!--/div> <!-- /.container -->
    <!--/section-->

<div class="container">
   <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-login">
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12">
              <form id="login-form" action="<?= $_SERVER['SCRIPT_NAME']?>" method="post" role="form" style="display: block;">
                <h2>LOGIN</h2>
                  <div class="form-group">
                    <input type="email" name="email" id="username" tabindex="1" class="form-control" placeholder="Email" value="<?php if(isset($_POST['email'])) echo $_POST['email'] ?>"  required>
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password"  required>
                  </div>
                  <div class="col-xs-6 form-group pull-right">
                        <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                  </div>
              </form>
             </div>
          </div>
        </div>
          <div class="panel-heading">
              <div class="row">
                  <div class="col-xs-6 tabs">
                      <a href="#" class="active" id="login-form-link"><div class="login">LOGIN</div></a>
                  </div>
                  <div class="col-xs-6 tabs">
                      <a href="Register.php" id="register-form-link"><div class="register">REGISTER</div></a>
                  </div>
              </div>
          </div>
       </div>
    </div>
   </div>
</div>

<?php } ?>

<?php
function DispUser($row){

    $Fname = $row['Fname'];
    $Lname = $row['Lname'];
    $Email = $row['email'];
    $Cell = $row['cellNumber'];
    $image = $row['UserImage']?>

<style>
        .table-user-information > tbody > tr {
            border-top: 1px solid rgb(221, 221, 221);
        }

        .table-user-information > tbody > tr:first-child {
            border-top: 0;
        }


        .table-user-information > tbody > tr > td {
            border-top: 0;
        }
        .toppad{
            margin-top:20px;
        }
</style>
<div class="jumbotron">
    <div class="container">
        <h1 align="center">User Details</h1>

    </div>
</div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">User Detail</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 " align="center"><?php if(!$image){?>
                                    <img height=140,width=120 class="img-circle img-responsible" src='images/Default.jpg' onclick="window.open(this.src,'_blank', 'location=yes,height=128,width=128,status=yes')">
                                <?php } else{ ?>
                                    <img height=140,width=120  class="img-circle img-responsible" src='images/<?= $image?>.jpg' onclick="window.open(this.src,'_blank', 'location=yes,height=128,width=128,status=yes')">
                                <?php } ?>
                                <!--img src="images/<!?= $image?>.jpg" class="img-circle img-responsive"-->
                            </div>
                            <div class=" col-md-9 col-lg-9 ">
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>First name :</td>
                                        <td><?= $Fname ?></td>
                                    </tr>
                                    <tr>
                                        <td>Last name :</td>
                                        <td><?= $Lname ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email address :</td>
                                        <td><?= $Email ?></td>
                                    </tr>
                                    <tr>
                                        <td>Phone number :</td>
                                        <td><?= $Cell ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class='panel-footer'>
                        <form>
                            <button type="submit" class="btn btn-danger" formaction="ShowStudents.php">See all our students here !</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
