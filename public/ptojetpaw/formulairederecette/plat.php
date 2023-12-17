<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="plat.css">
</head>
<body>
<header> 

 <div id="menu-bar" class="fas fa-bars"></div>

 <a href="http://localhost/test-vue/public/ppaaww/ptojetpaw/index.html#home" class="logo"><span>my</span>Recipes</a>
  <nav class="navbar">
  <a href="http://localhost/test-vue/public/ptojetpaw/index.html#home">home</a>
    <a href="http://localhost/test-vue/public/ptojetpaw/index.html#book">service</a>
    <a href="http://localhost/test-vue/public/ptojetpaw/index.html#menu">book</a>
    <a href="http://localhost/test-vue/public/ptojetpaw/index.html#clients">chefs</a>
    <a href="http://localhost/test-vue/public/ptojetpaw/index.html#contact">contact</a>
    <a href="http://localhost/test-vue/public/sdfg/profilpage.php">profile</a> 
			
  </nav>
  
  <div class="icons">
        <i class="fas fa-search" id="search-btn"></i>
        <i class="fas fa-user" id="login-btn"></i>
        

    </div>
 </header>
 <section class="plat">

    <?php
    $con=mysqli_connect("localhost","root","","tutorial");
    $requete="SELECT * from recette";
    $query=mysqli_query($con,$requete);
    if(mysqli_num_rows($query) > 0){
         $plat_principal = [];
         $salade = [];
         $sandwitch = [];
         $cote_sucre = [];
         $cote_sale = [];
         $boisson = [];
         $milk_shake = [];


         while ($rows = mysqli_fetch_assoc($query)) {
              $category = strtolower($rows['categorie']);

             if ($rows['categorie'] == 'plat_principal'){
                 $plat_principal[] = $rows;
             } elseif ($rows['categorie'] == 'salade') {
                 $salade[] = $rows;
             } elseif($rows['categorie'] == 'sandwitch') {
                 $sandwitch[] = $rows;
             } elseif ($rows['categorie'] == 'cote_sucre') {
                 $cote_sucre[] = $rows;
             } elseif ($rows['categorie'] == 'cote_sale') { 
                 $cote_sale[] = $rows;
             } elseif ($rows['categorie'] == 'boisson') {
                 $boisson[] = $rows;
             } elseif ($rows['categorie'] == 'milk_shake')  {
                 $milk_shake[] = $rows;
             }
         }

         function displayRecipes($title, $recipes)
         {
             echo '<section class="plat">';
             echo '<div class="title">';
             echo '<h2>' . $title . '</h2>';
             echo '</div>';
             echo '<div class="contenu">';
            foreach ($recipes as $recipe) {
                 echo '<div class="box">';
                 echo '<a href="recipe.php?id=' . $recipe['id'] . '">';
                 echo '<img src="image/' . $recipe['images'] . '" alt="">';
                 echo '<div class="content">';
                 echo '<h1 class="Nplat">' . $recipe['nom'] . '</h1>';
                 echo '</div>';
                 echo '</a>';
                 echo '</div>';
                 
                 }
             echo '</div>';
             echo '</section>';
            }        

         displayRecipes('Plat Principal', $plat_principal);
         displayRecipes('Salade', $salade);
         displayRecipes('Sandwitch', $sandwitch);
         displayRecipes('Côté Sucré', $cote_sucre);
         displayRecipes('Côté Salé', $cote_sale);
         displayRecipes('Boisson', $boisson);
         displayRecipes('Milk Shake', $milk_shake);
     } else {
         echo "Aucune recette trouvée.";
     }
     mysqli_close($con);
    ?>
 </section>

 <script >
     let menu = document.querySelector('#menu-bar');
     let navbar = document.querySelector('.navbar');
     menu.addEventListener('click', ()=>{
     menu.classList.toggle('fa-times');
     navbar.classList.toggle('active');
     document.querySelector('header').classList.add('active');
    });
</script>
</body>
</html>