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
    <link rel="stylesheet" href="profil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Document</title>
</head>
<body>
<header>
  <?php

$email = $_SESSION['email'];
$query = mysqli_query($con,"SELECT*FROM users WHERE email='$email' ");
while($result = mysqli_fetch_assoc($query)){
    $res_username = $result["username"];
    $res_email = $result["email"];
    $res_fullname = $result["fullname"];
    $res_age = $result["age"];
    $res_location = $result["location"];
    $res_script = $result["script"];
    $res_gender = $result["gender"];
    $res_language = $result["language"];
    $res_imgprofil = $result["imgprofil"];
}?>
    <div class="user" >
        <img src="photo/imgprofil/<?php echo  $res_imgprofil?>" alt="" accept="image/png, image/jpeg, image/jpg" id="imgprofil">
       
        <h3 class="name" id="username"><?php echo $res_username ?></h3>
<br>
    </div>

    <nav class="navbar">
        <ul>
            <li><a href="http://localhost/test-vue/public/ptojetpaw/index.html#home">homme</a></li>
            <li><a href="http://localhost/test-vue/public/ptojetpaw/index.html#book">service</a></li>
            <li><a href="http://localhost/test-vue/public/ptojetpaw/index.html#menu">book</a></li>
            <li><a href="http://localhost/test-vue/public/ptojetpaw/index.html#clients">chefs</a></li>
            <li><a href="http://localhost/test-vue/public/ptojetpaw/index.html#contact">contact</a></li>
            
        </ul>
    </nav>

</header>

<div id="menu" class="fas fa-bars"></div>

<section class="about" id="about">






    <h1 class="heading">about me</h1>   
 


    <div class="row">
        <div class="info">
            <div class="box">
                <h3><span>full name: &nbsp;</span></h3>
                <h3 id="about-name"><?php echo $res_fullname ?></h3>
            </div>
            <div class="box">
                <h3><span>email:  &nbsp;</span></h3>
                <h3 id="about-email"><?php echo $res_email ?></h3>
            </div>
            <div class="box">
                <h3><span>age:  &nbsp;</span></h3>
                <h3 id="about-age"><?php echo $res_age ?></h3>
            </div>
            <div class="box">
                <h3><span>gender: &nbsp; </span></h3>
                <h3 id="about-gender"><?php echo $res_gender ?></h3>
            </div>
            <div class="box">
                <h3><span>Current Location:  &nbsp;</span></h3>
                <h3 id="about-location"><?php echo $res_location ?></h3>
            </div>
            <div class="box">
                <h3><span>language: &nbsp; </span></h3> 
                <h3 id="about-lang"><?php echo $res_language ?></h3>
            </div>
              <p><?php echo $res_script ?></p>

           <?php echo " <a href='editprofil.php?username=$res_username'><button class='btn'>Edit Profile</button></a>"?>
           

        </div>

    </div>

</section>

<section class="plan" id="plan">
    <h1>my plan of the week</h1><br>
    <div class="box-container">
    <div class="box">
        <a href="http://localhost/test-vue/public/ptojetpaw/planningdays/day1.php">
         <h3 class="h3">day 1</h3>
        <div class="r1" id="r1">
            <img src="photo/OIP.jpeg" alt="" class="img">       
         </div> </a>       
     </div>
    <div class="box"><a href="http://localhost/test-vue/public/ptojetpaw/planningdays/day2.php">
          <h3 class="h3">day 2</h3> 
        <div class="r2" id="r2"> 
            <img src="photo/OIP.jpeg" alt="" class="img">
        </div>  </a>
     </div>
    <div class="box"> <a href="http://localhost/test-vue/public/ptojetpaw/planningdays/day3.php">
         <h3 class="h3">day 3</h3>
        <div class="r3" id="r3">  
            <img src="photo/OIP.jpeg" alt="" class="img">
        </div> </a>     
     </div>
    <div class="box" >  
    <a href="http://localhost/test-vue/public/ptojetpaw/planningdays/day4.php">
        <h3 class="h3">day 4</h3>
        <div class="r4" id="r4">    
            <img src="photo/OIP.jpeg" alt="" class="img">
        </div>   </a>
     </div>
    <div class="box">
    <a href="http://localhost/test-vue/public/ptojetpaw/planningdays/day5.php">
        <h3 class="h3">day 5</h3>
        <div class="r5" id="r5">
            <img src="photo/OIP.jpeg" alt="" class="img">
        </div>   </a>    
     </div>
    <div class="box">
    <a href="http://localhost/test-vue/public/ptojetpaw/planningdays/day6.php">
        <h3 class="h3">day 6</h3>
        <div class="r6" id="r6">
            <img src="photo/OIP.jpeg" alt="" class="img">
            
        </div></a>
     </div>
    <div class="box">
        <a href="http://localhost/test-vue/public/ptojetpaw/planningdays/day7.php">
        <h3 class="h3">day 7</h3>
        <div class="r7" id="r7">
            <img src="photo/OIP.jpeg" alt="" class="img">
        </div></a>
     </div>
   </div>
 
</section>
<section class="add">
    <h1 class="heading">add a recipe </h1>
    <p>to add a recipe , click the add recipe button .</p>
    <a href="http://localhost/test-vue/public/ptojetpaw/formulairederecette/index.php"><button class="btn">add recipe</button></a>
</section>

<section class="favori" id="favori">
    <h1>my favorite recipe</h1><br>
    <div class="box-container">
    <div class="box">
         <h3 class="h3">recipe 1</h3>
        <div class="r1" id="r1">
            <img src="photo/OIP.jpeg" alt="" class="img">       
         </div>        
     </div>
    <div class="box">
          <h3 class="h3">recipe 2</h3> 
        <div class="r2" id="r2"> 
            <img src="photo/OIP.jpeg" alt="" class="img">
        </div>  
     </div>
    <div class="box"> 
         <h3 class="h3">recipe 3</h3>
        <div class="r3" id="r3">  
            <img src="photo/OIP.jpeg" alt="" class="img">
        </div>      
     </div>
    <div class="box" >  
        <h3 class="h3">recipe 4</h3>
        <div class="r4" id="r4">    
            <img src="photo/OIP.jpeg" alt="" class="img">
        </div>   
     </div>
    <div class="box">
        <h3 class="h3">recipe 5</h3>
        <div class="r5" id="r5">
            <img src="photo/OIP.jpeg" alt="" class="img">
        </div>       
     </div>
    <div class="box">
        <h3 class="h3">recipe 6</h3>
        <div class="r6" id="r6">
            <img src="photo/OIP.jpeg" alt="" class="img">
            
        </div>
     </div>
    <div class="box">
        <h3 class="h3">recipe 7</h3>
        <div class="r7" id="r7">
            <img src="photo/OIP.jpeg" alt="" class="img">
            

        </div>
     </div>
   </div>
 
</section>







<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<script src="  https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
const menu = document.getElementById('menu');
const header = document.querySelector('header');

menu.addEventListener('click', function() {
  menu.classList.toggle('fa-times');
  header.classList.toggle('active');
});

window.addEventListener('scroll', function() {
  menu.classList.remove('fa-times');
  header.classList.remove('active');
});

window.addEventListener('load', function() {
  menu.classList.remove('fa-times');
  header.classList.remove('active');
});

</script>
</body>
</html>