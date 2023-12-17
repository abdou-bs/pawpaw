<?php
session_start();

include("php/config.php");
if(!isset($_SESSION["valid"])){
header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sign up.css">
    <title>Document</title>
</head>
<body>
<div class="container">
         <?php 
                if(isset($_POST['submit'])){
                    $fullname = $_POST['fullname'];
                    $age = $_POST['age'];
                    $location = $_POST['Location'];
                    $language = $_POST['language'];
                    $script = $_POST['script'];


                    $email = $_SESSION['email'];

                    $edit_query = mysqli_query($con,"UPDATE users SET fullname = '$fullname' ,  age = '$age', location = '$location', language ='$language', script = '$script' WHERE email = '$email'  ") or die("error occurred");

                    $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");
                    if($edit_query){
                            echo "<div class='container'><div class='boxx'> <div class='message'>
                          <p>profil updated!</p>
                          </div> <br>
                          <a href='profilpage.php'><button class='btnn'>go to profil page </button></div></div>";
                        }
                    
                }else{
                    $email = $_SESSION['email'];
                    $query = mysqli_query($con,"SELECT*FROM users WHERE email='$email' ");

                    while($result = mysqli_fetch_assoc($query)){
                       
                     
                        $res_fullname = $result["fullname"];
                        $res_age = $result["age"];
                        $res_location = $result["location"];
                        $res_script = $result["script"];
                       
                        $res_language = $result["language"];
                    }
            ?>
        <div class="box form-box">
           
            <h1>change profile</h1>

            <form action="" method="post">
                <div class="field input">
                    <label for="fullname"></label>
                    <input type="text" name="fullname" id="fullname" placeholder="fullname" value="<?php echo $res_fullname ?>" required>
                </div>
 
                <div class="field input">
                    <label for="age"></label>
                    <input type="number" name="age" id="age" placeholder="age" min="1" max="99" value="<?php echo $res_age ?>"required>
                </div>
              
                <div class="field input">
                    <label for="Location"></label>
                    <input type="text" name="Location" id="Location" placeholder="Location" value="<?php echo $res_location ?>"required>
                </div>
                <div class="field input">
                    <label for="language"></label>
                    <select name="language" id="language" class="input" required >
                        <option value="" disabled selected hidden> <?php echo $res_language ?></option>
                        <option value="arabe">arabe</option>
                        <option value="english">english</option>
                        <option value="français">français</option>
                    </select>
                </div>
                <div class="field input">
                    <label for="script"></label>
                    <textarea name="script" id="script" cols="50" rows="4" placeholder="script about you " ><?php echo $res_script ?></textarea>
                </div>
                <div class="field">
                    
                    <input type="submit" name="submit" class="btn" value="update" >
                </div>
                </form>
                </div>
                <?php } ?>
                </div>
</body>
</html>