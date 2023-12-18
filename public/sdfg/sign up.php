<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sign up.css">
    
    <title>Document</title>
</head>
<body>
    <?php
      include("php/config.php");
      if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $fullname = $_POST['fullname'];
            $location = $_POST['Location'];
            $language = $_POST['language'];
            $script = $_POST['script'];
            $password = $_POST['password'];
            $imgprofil = $_POST['imgprofil'];


            //virify the unique email
            $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");
            $verify_queryy = mysqli_query($con,"SELECT username FROM users WHERE username='$username'");
            if(mysqli_num_rows($verify_query) !=0 ){

                echo "<div class='container'><div class='boxx'> <div class='message'>
                          <p>This email is used, Try another One Please!</p>
                       <br></div>
                <a href='javascript:self.history.back()'><button class='btnn'>Go Back</button></div></div>";
             }
             else{if(mysqli_num_rows( $verify_queryy) !=0){
                echo "<div class='container'><div class='boxx'> <div class='message'>
                 <p>This usename is used, Try another One Please!</p>
                 <br></div>
                 <a href='javascript:self.history.back()'><button class='btnn'>Go Back</button></div></div>";
             }else{
    
                mysqli_query($con,"INSERT INTO users(Username,Email,Age,gender,fullname,location,language,script, Password,imgprofil) VALUES('$username','$email','$age','$gender','$fullname','$location','$language','$script','$password','$imgprofil')") or die("Erroe Occured");
    
                echo "<div class='container'><div class='boxx'> <div class='message'>
                          <p>Registration successfully!</p>
                      </div> <br>
                <a href='login.php'><button class='btnn'>Login Now</button></div></div>";
             
             }
             }
        }else{

      

    ?>



    
    <div class="container">
        
        <div class="box form-box">
            <h1>Sign up</h1>

            <form action="" method="post">
                <div class="field input">
                    <label for="fullname"></label>
                    <input type="text" name="fullname" id="fullname" placeholder="fullname" required>
                </div>
                <div class="field input">
                    <label for="username"></label>
                    <input type="text" name="username" id="username" placeholder="username" required>
                </div>
    
                <div class="field input">
                    <label for="email"></label>
                    <input type="text" name="email" id="email" placeholder="email" required>
                </div>
                <div class="field input">
                    <label for="age"></label>
                    <input type="number" name="age" id="age" placeholder="age" min="1" max="99" required>
                </div>
                <div class="field input">
                    <label for="gender"></label>
                    <select name="gender" id="gender" class="input" required>
                        <option value="female">female</option>
                        <option value="male">male</option>
                       
                    </select>
        </div>
                <div class="field input">
                    <label for="Location"></label>
                    <input type="text" name="Location" id="Location" placeholder="Location" required>
                </div>
                <div class="field input">
                    <label for="language"></label>
                    <select name="language" id="language" class="input" required >
                        <option value="arabe">arabe</option>
                        <option value="english">english</option>
                        <option value="français">français</option>
                    </select>
                </div>
                <div class="field input">
                    <label for="script"></label>
                    <textarea name="script" id="script" cols="50" rows="4" placeholder="script about you "></textarea>
                </div>
                <div class="field input" >
                    <label for="imgprofil"></label>
                    <input type="file" accept="image/png, image/jpeg, image/jpg" name="imgprofil" id="imgprofil">
                    
                </div>
                <div class="field input">
                    <label for="script"></label>
                    <input type="password" name="password" id="password" placeholder="password" required>
                </div>
                <div class="field">
                    
                    <input type="submit" name="submit" class="btn" value="login Now" >
                </div>
                <div class="links">
                    Don't have account? <a href="#">Sign Up Now</a>
    
                </div>
                
            </form>
        </div>
        <?php } ?>
       </div>
       <script src="sing up.js"></script>
</body>
</html>