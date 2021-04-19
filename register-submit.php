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
            <dt>First Name</dt>
            <dd><?= $_POST["fname"]; ?></dd>
            <dt>Last Name</dt>
            <dd><?= $_POST["lname"]; ?></dd>
            <dt>Email Address</dt>
            <dd><?= $_POST["email"]; ?></dd>
            <dt>Confirm Email Address</dt>
            <dd><?= $_POST["cemail"]; ?></dd>
            <dt>Username</dt>
            <dd><?= $_POST["uname"]; ?></dd>
            <dt>Password</dt>
            <dd><?= $_POST['pword'];?></dd>
            <dt>Confirm Password</dt>
            <dd><?= $_POST['cpword'];?></dd>
        </dl> -->
        <?php
            if((isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["email"]) && isset($_POST["cemail"]) && isset($_POST["uname"]) && isset($_POST["pword"]) && isset($_POST["cpword"]))
            && (!empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["email"]) && !empty($_POST["cemail"]) && !empty($_POST["uname"]) && !empty($_POST["pword"]) && !empty($_POST["cpword"]))){
                echo "<pre>";
                $error = "false";
                if (is_numeric($_POST["fname"])) {
                    echo "Error: First name must not be a number.\n";
                    $error = "true";
                }
                if (is_numeric($_POST["lname"])) {
                    echo "Error: Last name must not be a number.\n";
                    $error = "true";
                }
                if( strcmp($_POST["email"] , $_POST["cemail"]) != 0){
                    echo "Error: Emails provided do not match.\n";
                    $error = "true";
                }
                if( strcmp($_POST["pword"] , $_POST["cpword"]) != 0){
                  echo "Error: Passwords provided do not match.\n";
                  $error = "true";
                }
                $fh=fopen("data.html","r");
                $count = 0;
                $nametaken = "false";
                while($line=fgets($fh)){
                    $piece=explode(",",$line);
                    if(strcmp(trim($piece[3]),trim($_POST["uname"])) == 0){
                        $error = "true";
                        $nametaken = "true";
                        
                    }
                }
                if($nametaken == "true"){
                    echo "Error: Username already taken!<br>";
                }
                if($error == "true"){
                    echo "Please try again.<br>";
                }else{
                    $data = $_POST["fname"] . "," .$_POST["lname"] . "," .$_POST["email"] . "," .$_POST["uname"] . "," . $_POST["pword"] . "\r\n"; 
                    
                    $saved = file_put_contents("data.html", $data, FILE_APPEND | LOCK_EX);
                    
                    //echo $saved;
                    echo "Your First Name, Last Name, Email, Username, Password <br>";
                    echo $data . "<br><br>";
                    //echo file_get_contents("data.html") . "<br>";
                }
                echo "</pre>";
            }else{
              echo "<pre style="."text-align:center;"."> Please enter credentials! </pre>";
            }
        ?>
    </div>


    <div> <!--Validation footer-->
      <div id="w3c"><br><br>
          <a href="https://html5.validator.nu/?doc=https%3A%2F%2Fcodd.cs.gsu.edu%2F%7Eamustafa3%2Fpw%2Fpw3%2Fregister-submit.php" target="_blank"><img src="resources/w3-html.png" alt="Valid HTML"/></a>
          <a href="https://jigsaw.w3.org/css-validator/validator?uri=https%3A%2F%2Fcodd.cs.gsu.edu%2F%7Eamustafa3%2Fpw%2Fpw3%2Fregister.html&profile=css3svg&usermedium=all&warning=1&vextwarning=&lang=en" target="_blank"><img src="resources/w3-css.png" alt="Valid CSS"/></a>
      </div>
    </div>
    

  </body>
</html>
