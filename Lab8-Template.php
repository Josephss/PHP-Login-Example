<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>CSC 292 - Lab 8</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://twitter.github.com/bootstrap/assets/css/bootstrap.css" rel="stylesheet">
    <link href="http://twitter.github.com/bootstrap/assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <div class="container-fluid" style="margin-top: 10px;">
        <div class="row-fluid">
            <div class="col-md-3 well">
                <h1>Primary Nav</h1>
                <ul class="nav">
                    <li><a href="#">Home</a>
                    <li><a href="#">Link 1</a>
                    <li><a href="#">Link 2</a>
                </ul>
                 <?php
                        //let's check for a login - that is, the form was POST'ed to this page
                        if($_SERVER['REQUEST_METHOD'] === 'POST') {

                          //create a handle to the database server
                          //@todo: fill in your values here
                          $dbh = new PDO("mysql:host=localhost;dbname=csc292","root","toor");

                          //@todo: create the select statement to check for the posted username & password
                          $userSelect = "SELECT * FROM user WHERE username = :username AND password = :password";

                          $select = $dbh->prepare($userSelect);

                          //@todo: make sure to update your placeholders
                          $select->execute(array(':username'=>$_POST['user'],':password'=>$_POST['password']));

                          $rowCount = $select->rowCount();

                
                          if($rowCount ==1){
                            session_start();
                            $_SESSION['logged_in'] =true;
                            header("Location: Protected.php");
                                ?>
                                <div class="msg"> Login succeeded </div>
                                <?php


                          } else{
                            ?>
                                <div class="msg"> Login failed </div>
                                <?php
                          }


                        }

              ?>


                <form method="post" action="<?php $_SERVER["PHP_SELF"]; ?>">
                  <div class="form-group">
                    <input name="user" id="user" type="text" class="col-lg-12">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" id="password" class="col-lg-12" />
                   <button type="submit" class="btn btn-primary">Login</button>
                  </div>
                </form>
            </div>
            <div class="col-md-9">
                <div class="alert bg-danger">
                    <strong>Uh oh!</strong> There was an error processing your request!
                </div>

            <h1>What is Lorem Ipsum?</h1>
            <blockquote>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
            </blockquote>
             <h2>Some Uses</h2>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr><th>Purpose</th>  <th>Result</th>
                    <tbody>
                        <tr><td>Col</td>   <td>Col</td></tr>
                        <tr><td>Col </td><td>Col</td></tr>
                </table>
            <div> </div>
                <div class="row">
                  <div class="col-xs-6 col-md-3">
                    <a href="#" class="thumbnail">
                      <img width="100%" src="images.jpg" alt="Unicorn" >
                    </a>
                  </div>
                  <div class="col-xs-6 col-md-3">
                    <a href="#" class="thumbnail">
                        <img width="100%" src="images.jpg" alt="Unicorn" >
                    </a>
                  </div>
                  <div class="col-xs-6 col-md-3">
                    <a href="#" class="thumbnail">
                        <img width="100%" src="images.jpg" alt="Unicorn" >
                    </a>
                  </div>
                </div>

        <h1>More Information</h1>
        <p>
        Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
        </p>
    </div></div></div>
    <footer class="footer" style="text-align:center;background-color:#ccc;padding:5px;margin:10px 0 0 0;">Josh Stroschein</footer>
  </body>
</html>
