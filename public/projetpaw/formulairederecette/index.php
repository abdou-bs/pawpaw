<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_FILES["image_file"]["tmp_name"])) {
        header("location:index.php?message=er");
    }

    $target_directory = "image/";

    if (!file_exists($target_directory)) {
        mkdir($target_directory, 0777, true);
     }

    $nom = htmlspecialchars($_POST['nom']);
    $categorie = htmlspecialchars($_POST['categorie']);
    $temps = htmlspecialchars($_POST['temps']);
    $ingredients = htmlspecialchars($_POST['ingredients']);
    $instructions = htmlspecialchars($_POST['instructions']);

    $file_basename = pathinfo($_FILES["image_file"]["name"], PATHINFO_FILENAME);
    $file_extension = pathinfo($_FILES["image_file"]["name"], PATHINFO_EXTENSION);
    $new_image_name = $file_basename . '_' . date("ymd_His") . '_' . $file_extension;


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tutorial";
    
    
    $con = new mysqli($servername, $username, $password, $dbname);

    if ($con->connect_error) {
        die("la connexion à la base de données a échoué :" . $con->connect_error);
    }

    $stmt = $con->prepare("INSERT INTO recette (nom, categorie, temps, ingredients, instructions, images) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nom, $categorie, $temps, $ingredients, $instructions, $new_image_name);

    if ($stmt->execute()) {
        $target_directory = "image/";
        $target_path = $target_directory . $new_image_name;
  
        
        // Add more checks for file type and size
        $allowed_extensions = array("jpg", "jpeg", "png", "gif");
        if (!in_array(strtolower($file_extension), $allowed_extensions)) {
            header("location:index.php?message=er");
        }

        if (!move_uploaded_file($_FILES["image_file"]["tmp_name"], $target_path) & !move_uploaded_file($_FILES["image_file"]["tmp_name"], $target_path)) {
            header("location:index.php?message=er");
        }


        header("location:index.php?message=ok");
    } else {
        header("Erreur d'exécution de la requête : " . $stmt->error);
    }
    
    


    $stmt->close();
    $con->close();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire d'ajout d'une recette</title>
    <link rel="stylesheet" href="for.css">
</head>
<body>

   <div class="containe">
      <h2>Ajouter votre recette</h2>
      <form action="" id="formulaire" method="post" enctype="multipart/form-data">
      
        <?php
      if (isset($_GET["message"])){
     if($_GET["message"]== "ok"){
         ?>
         <div class="alert sucess">
             <span class="closebtn" onclick="this.parentElement.style.display='none';">$time;</span>
             L'insertion de l'image dans la bdd a réussi !
         </div>
       <?php   
     }else{
         ?>
         <div class="alert sucess">
             <span class="closebtn" onclick="this.parentElement.style.display='none';">$time;</span>
             L'insertion de l'image dans la bdd a echoué !
         </div>
         
      <?php
         
     }
    }
      ?>
      
        <div class="input_containe">
         <label for="nom">Nom de la recette :</label>
         <input type="text" id="nom" name="nom" required><br>
        </div>
        <div class="input_containe">
         <label for="categorie">Catégorie de la Recette :</label>
         <select name="categorie" id="categorie" required>
             <option value="salade">Salade</option>
             <option value="plat_principal">Plat Principal </option>
             <option value="sandwitch">Sandwitch</option>
             <option value="cote_sucre">Côté Sucré</option>
             <option value="cote_sale">Côté Salé</option>
             <option value="boisson">Boisson</option>
             <option value="milk_shake">Milk Shake</option>
         </select>
        </div><br>
        <div class="input_containe">
         <label for="temps">Temps de cuisson (en minutes) :</label>
         <input type="number" id="temps" name="temps" required><br>
        </div>
        <div class="input_containe">
         <label for="ingredients">Ingrédients (chaqu'un par ligne):</label>
         <textarea id="ingredients" name="ingredients" required></textarea><br>
        </div>
        <div class="input_containe">
         <label for="instructions">Instructions :</label>
         <textarea id="instructions" name="instructions" required></textarea><br>
        </div>
        <div class="input_containe">
         <label for="image" class="drop-container" id="dropcontainer"> Inserer une photo:<input type="file" name="image_file" id="images" acczpt="image/*" required>
         </label>
        </div>

         <div class="input_containe">
         <input type="submit" value="Envoyer">
         </div>
         <div class="input_containe">
         <a href="plat.php">AFFICHAGE</a>
         </div>
       </form>
   </div>

</body>
</html> 