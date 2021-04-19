<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register!</title>
    <link rel="shortcut icon" href="favi/lock.png" type="image/x-icon" />
    <link rel="stylesheet" href="register.css" />
  </head>
  <body class="body">
    <div class="navbar">
      <div style="margin-left: 1%; float: left">
        <a class="buttons" href="home.html">Home</a>
      </div>
      <div style="width: 90%; text-align: center">
        <h1>Submission</h1>
      </div>
      <div style="margin-right: 1%; float: right">
        <a class="buttons" href="login.html">Login</a>
      </div>
    </div>
    <div class="centerpre">
        <!-- <dl>
            <dt>Username </dt>
            <dd><?= $_GET["uname"]; ?></dd>
            <dt>Password</dt>
            <dd><?= $_GET['pword'];?></dd>
        </dl> -->

        <?php
            session_save_path("session");
            session_start();
            echo "<pre>";
            if(empty($_GET["uname"]) || empty($_GET["pword"])){
                echo "Please enter a username and / or password!<br>";
            }
            else if(isset($_GET["uname"]) && isset($_GET["pword"])){
                $fh=fopen("data.html","r");
                $count = 0;
                while($line=fgets($fh)){
                    $piece=explode(",",$line);
                    if($piece[3]==$_GET["uname"]){
                        $password=$piece[4];
                        $uname=$piece[3];
                        $count++;
                    }
                }
                if($count=0){
                    echo "Username or password not found. Please try again! <br>";
                }
                else if(strcmp(trim($_GET["pword"]) , trim($password)) == 0){
                    //insert code here to sign them in
                    //$_SESSION["uname"] = $_GET["uname"];
                    $user = $_GET["uname"];
                    $_SESSION["uname"] = $user;
                    echo "sesh" . $_SESSION["uname"];
                    header("Location: dashboard.php?uname=" . $user);
                    
                }
                else{
                    //header('Location: validation.php'); //link to error page
                    echo "Incorrect Password: Please try again!<br>";
                    
                }
            }else{
                echo "Error: Please try again later.<br>";
            }
            echo "<pre>";
        ?>
    </div>
    
    <div> <!--Validation footer-->
      <div id="w3c"><br><br>
          <a href="https://html5.validator.nu/?doc=https%3A%2F%2Fcodd.cs.gsu.edu%2F%7Eamustafa3%2Fpw%2Fpw3%2Fregister-submit.php" target="_blank"><img src="resources/w3-html.png" alt="Valid HTML"/></a>
          <a href="https://jigsaw.w3.org/css-validator/validator?uri=https%3A%2F%2Fcodd.cs.gsu.edu%2F%7Eamustafa3%2Fpw%2Fpw3%2Flogin.html&profile=css3svg&usermedium=all&warning=1&vextwarning=&lang=en" target="_blank"><img src="resources/w3-css.png" alt="Valid CSS"/></a>
      </div>
    </div>


  </body>
</html>
