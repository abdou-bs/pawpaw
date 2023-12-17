<?php
session_start();

$con=mysqli_connect("localhost","root","","tutorial");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="day.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Document</title>
</head>
<body>
    <header> 

		<div id="menu-bar" class="fas fa-bars"></div>
	
		<a href="#" class="logo"><span>my</span>recipes</a>
		<nav class="navbar">
	    <a href="http://localhost/test-vue/public/ptojetpaw/index.html#home">home</a>
    <a href="http://localhost/test-vue/public/ptojetpaw/index.html#book">service</a>
    <a href="http://localhost/test-vue/public/ptojetpaw/index.html#menu">book</a>
    <a href="http://localhost/test-vue/public/ptojetpaw/index.html#clients">chefs</a>
    <a href="http://localhost/test-vue/public/ptojetpaw/index.html#contact">contact</a>
    <a href="http://localhost/test-vue/public/sdfg/profilpage.php">profile</a> 
			
		</nav>
		<div class="icons">
		
        <a href="http://localhost/test-vue/public/sdfg/profilpage.php"><i class="fas fa-user" id="login-btn"></i></a> 
			
	
		</div>

	</header>
    <?php


$query = mysqli_query($con,"SELECT*FROM day7 WHERE  id='11' ");
while($result = mysqli_fetch_assoc($query)){
    $res_nom = $result["nom"];
    $res_categorie = $result["categorie"];
    $res_temps = $result["temps"];
    $res_images = $result["images"];
}?>

<?php
$query = mysqli_query($con,"SELECT*FROM day7 WHERE  id='12'");
while($result = mysqli_fetch_assoc($query)){
    $res_nom2 = $result["nom"];
    $res_categorie2 = $result["categorie"];
    $res_temps2 = $result["temps"];
    $res_images2 = $result["images"];

}?>
<?php
$query = mysqli_query($con,"SELECT*FROM day7 WHERE  id='13' ");
while($result = mysqli_fetch_assoc($query)){
    $res_nom3 = $result["nom"];
    $res_categorie3 = $result["categorie"];
    $res_temps3 = $result["temps"];
    $res_images3 = $result["images"];

}?>
     
     <div class="menu">
        <h2>first <span>plan</span></h2>
     <div class="box-container">

        <div class="box">
            <div class="image">
                <?php if(!empty($res_images)) echo '<img src="../formulairederecette/image/' . $res_images . '" />' ?>
            </div>    
            <div class="info">
                <h2></h2>
                <h3><?php if(!empty($res_nom)) echo $res_nom  ?></h3>
                <span><?php if(!empty($res_categorie)) echo $res_categorie ?></span>
                <span><?php if(!empty($res_temps)) echo $res_temps ?> min</span>
              
            </div>
        </div>
        <div class="box">
            <div class="image">
            <?php if(!empty($res_images2)) echo '<img src="../formulairederecette/image/' . $res_images2 . '" />' ?>
            </div>    
            <div class="info">
                <h3><?php if(!empty($res_nom2))echo $res_nom2 ?></h3>
                <span><?php if(!empty($res_categorie2))echo $res_categorie2 ?></span>
                <span><?php if(!empty($res_temps2))echo $res_temps2 ?> min</span>
                
            </div>
        </div>
        <div class="box">
            <div class="image">
            <?php if(!empty($res_images3)) echo '<img src="../formulairederecette/image/' . $res_images3 . '" />' ?>
            </div>    
            <div class="info">
                <h3><?php if(!empty($res_nom3))echo $res_nom3 ?></h3>
                <span><?php if(!empty($res_categorie3))echo $res_categorie3 ?></span>
                <span><?php if(!empty($res_temps3))echo $res_temps3 ?> min</span>
            
            </div>
        </div>
    </div>
    </div>


    </div>
    </div>
    <?php
$query = mysqli_query($con,"SELECT*FROM day7 WHERE  id='21' ");
while($result = mysqli_fetch_assoc($query)){
    $res_nom = $result["nom"];
    $res_categorie = $result["categorie"];
    $res_temps = $result["temps"];
    $res_images = $result["images"];


}?>

<?php
$query = mysqli_query($con,"SELECT*FROM day7 WHERE id='22'");
while($result = mysqli_fetch_assoc($query)){
    $res_nom2 = $result["nom"];
    $res_categorie2 = $result["categorie"];
    $res_temps2 = $result["temps"];
    $res_images2 = $result["images"];

}?>
<?php
$query = mysqli_query($con,"SELECT*FROM day7 WHERE  id='23' ");
while($result = mysqli_fetch_assoc($query)){
    $res_nom3 = $result["nom"];
    $res_categorie3 = $result["categorie"];
    $res_temps3 = $result["temps"];
    $res_images3 = $result["images"];

}?>
     
     <div class="menu">
        <h2>second <span>plan</span></h2>
     <div class="box-container">

        <div class="box">
            <div class="image">
            <?php if(!empty($res_images)) echo '<img src="../formulairederecette/image/' . $res_images . '" />' ?>
            </div>    
            <div class="info">
                <h3><?php if(!empty($res_nom))echo $res_nom ?></h3>
                <span><?php if(!empty($res_categorie))echo $res_categorie ?></span>
                <span><?php if(!empty($res_temps)) echo $res_temps ?> min</span>
              
            </div>
        </div>
        <div class="box">
            <div class="image">
            <?php if(!empty($res_images2)) echo '<img src="../formulairederecette/image/' . $res_images2 . '" />' ?>
            </div>    
            <div class="info">
                <h3><?php if(!empty($res_nom2))echo $res_nom2 ?></h3>
                <span><?php if(!empty($res_categorie2))echo $res_categorie2 ?></span>
                <span><?php if(!empty($res_temps2))echo $res_temps2 ?> min</span>
                
            </div>
        </div>
        <div class="box">
            <div class="image">
            <?php if(!empty($res_images3)) echo '<img src="../formulairederecette/image/' . $res_images3 . '" />' ?>
            </div>    
            <div class="info">
                <h3><?php if(!empty($res_nom3))echo $res_nom3 ?></h3>
                <span><?php if(!empty($res_categorie3))echo $res_categorie3 ?></span>
                <span><?php if(!empty($res_temps3)) echo $res_temps3 ?> min</span>
            
            </div>
        </div>
    </div>
    </div>


    </div>
    </div>
    <?php
$query = mysqli_query($con,"SELECT*FROM day7 WHERE id='31' ");
while($result = mysqli_fetch_assoc($query)){
    $res_nom = $result["nom"];
    $res_categorie = $result["categorie"];
    $res_temps = $result["temps"];
    $res_images = $result["images"];

}?>

<?php
$query = mysqli_query($con,"SELECT*FROM day7 WHERE  id='32'");
while($result = mysqli_fetch_assoc($query)){
    $res_nom2 = $result["nom"];
    $res_categorie2 = $result["categorie"];
    $res_temps2 = $result["temps"];
    $res_images2 = $result["images"];

}?>
<?php
$query = mysqli_query($con,"SELECT*FROM day7 WHERE id='33' ");
while($result = mysqli_fetch_assoc($query)){
    $res_nom3 = $result["nom"];
    $res_categorie3 = $result["categorie"];
    $res_temps3 = $result["temps"];
    $res_images3 = $result["images"];

}?>
     
     <div class="menu">
        <h2>third <span>plan</span></h2>
     <div class="box-container">

        <div class="box">
            <div class="image">
            <?php if(!empty($res_images)) echo '<img src="../formulairederecette/image/' . $res_images . '" />' ?>
            </div>    
            <div class="info">
                <h3><?php if(!empty($res_nom))echo $res_nom ?></h3>
                <span><?php if(!empty($res_categorie))echo $res_categorie ?></span>
                <span><?php if(!empty($res_temps)) echo $res_temps ?> min</span>
              
            </div>
        </div>
        <div class="box">
            <div class="image">
            <?php if(!empty($res_images2)) echo '<img src="../formulairederecette/image/' . $res_images2 . '" />' ?>
            </div>    
            <div class="info">
                <h3><?php if(!empty($res_nom2))echo $res_nom2 ?></h3>
                <span><?php if(!empty($res_categorie2)) echo $res_categorie2 ?></span>
                <span><?php if(!empty($res_temps2)) echo $res_temps2 ?> min</span>
                
            </div>
        </div>
        <div class="box">
            <div class="image">
            <?php if(!empty($res_images3)) echo '<img src="../formulairederecette/image/' . $res_images3 . '" />' ?>
            </div>    
            <div class="info">
                <h3><?php if(!empty($res_nom3))echo $res_nom3 ?></h3>
                <span><?php if(!empty($res_categorie3))echo $res_categorie3 ?></span>
                <span><?php if(!empty($res_temps3))echo $res_temps3 ?> min</span>
            
            </div>
        </div>
    </div>
    </div>


    </div>
    </div>
    <script src="day.js"></script>
</body>
</html>