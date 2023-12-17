<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="recipe.css">
</head>
<body>
<header> 

<div id="menu-bar" class="fas fa-bars"></div>

<a href="#" class="logo"><span>My</span>Recipes</a>
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

    <?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $con=mysqli_connect("localhost","root","","tutorial");

    if ($con->connect_error) {
        die("La connexion à la base de données a échoué : " . $con->connect_error);
    }


    $sql = "SELECT * FROM recette WHERE id = $id";
    $result = $con->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            
            $row = $result->fetch_assoc();

    
            echo '<section>';
            echo '<div class="room1">';
            echo '<div class="image">';
            echo '<img id="dish-page-image" class="object-cover" src="image/' . $row['images'] . '" />';
            echo '</div>';
            echo '<div style="overflow: scroll" class="grd">';
            echo '<h2 id="dish-page-name">' . $row['nom'] . '</h2>';
            echo '<form action="planning.php" method="post">';
            echo '<input type="hidden" name="id" value="' . $id . '">';
            echo '<button type="submit" class="botton">Ajouter au planning</button>'; 
            echo '</form>';
            echo '<span id="dish-page-prep-time" class="time">' . $row['temps'] . ' min</span>';
            echo '<span id="dish-page-cuisine-type" class="pays">' . $row['categorie'] . '</span>';        
            echo '<h2>Ingredients</h2>';
            echo '<ul>';
            echo '<p id="dish-page-ingredients">';
            $ingredients = explode(".", $row['ingredients']);
            for ($i=0; $i<count($ingredients); $i++) {
                $ingredient = trim($ingredients[$i]); 
                if (strpos($ingredient, ':') !== false) {
                    
                    $parts = explode(':', $ingredient, 2);
                    echo '<li><strong><u>' . $parts[0] . ':</u></strong> ' . $parts[1] . '</li>';
                } else {
                  
                    echo '<li>' . $ingredient . '</li>';
                }
            }
            echo '</p>';
            echo '</ul>';
            echo '</div>';
            echo '</div>';
            echo '<div class="drct">';
            echo '<div class="drct1">';
            echo '<h2>Instructions<h2>';
            echo '<ul>';
            $etapes = explode(".", $row['instructions']);
            for ($i=0; $i < count($etapes); $i++) {
                $etapes[$i] = trim($etapes[$i]);
                if (is_string($etapes[$i]) && strpos($etapes[$i], ':')!== false) {
                    $parts = explode(':', $etapes[$i], 2);
                    echo '<li><strong><u>' . $parts[0] . ':</u></strong> ' . $parts[1] . '</li>';
                } else {
                    echo '<li>' . $etapes[$i] . '</li>';
                }
            }
            echo '</ul>';
            echo '</div>';
            echo '</div>';
            echo '</section>';
        } else {
            echo "Recette non trouvée.";
        }
    } else {
        echo "Erreur d'exécution de la requête : " . $con->error;
    }
    mysqli_close($con);
} else {
    echo "Identifiant de recette manquant dans l'URL.";
}
?>
<script src="recipe.js"></script>
</body>
</html>