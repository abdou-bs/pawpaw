<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>
<body>

   <div class="container">
    <div class="box form-box">
        <?php
            
            include("php/config.php");
            if(isset($_POST['submit'])){
                $username = mysqli_real_escape_string($con,$_POST['username']);
                $password = mysqli_real_escape_string($con,$_POST['password']);

                $result = mysqli_query($con,"SELECT * FROM users WHERE username='$username' AND password='$password' ") or die("select error");
                $row = mysqli_fetch_assoc($result);


                if(is_array($row) && !empty($row)){
                    $_SESSION['valid']= $row['username'];
                    $_SESSION['email']= $row['email'];
                    $_SESSION['fullname']= $row['fullname'];
                    $_SESSION['age']= $row['age'];
                    $_SESSION['gender']= $row['gender'];
                    $_SESSION['language']= $row['language'];
                    $_SESSION['location']= $row['location'];
                    $_SESSION['script']= $row['script']; if(isset($_SESSION['valid'])){
                    header("Location: ../ptojetpaw/index.html");
                }

                }else{  
                  echo " <div class='message'>
                      <p>wrong username or password</p>
                      </div><br>";
                    echo " <a href='login.php'><button class='btn'>Go Back</button>";
                }
               
            }   else{ 

        ?>
        <h1>login</h1>
        <form action="" method="post">
            <div class="field input">
                <label for="username"></label>
                <input type="text" name="username" id="username" placeholder="username" autocomplete="off" required>
            </div>

            <div class="field input">
                <label for="password"></label>
                <input type="password" name="password" id="password" placeholder="password" autocomplete="off" required>
            </div>
            <div class="field">
                
                <input type="submit" name="submit" class="btn" value="login Now" >
            </div>
            <div class="links">
                Don't have account? <a href="http://localhost:8080/">Sign Up Now</a>

            </div>

        </form>
    </div>
   </div>
   <?php } ?>
</body>
</html>