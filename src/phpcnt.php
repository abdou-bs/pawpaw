<?php
header("Access-Control-Allow-Origin: *");
$results = array();
$results["error"] = false;
$results["message"] = "";

//connect db
$connect = @mysqli_connect("localhost","root","","tutorial");
$db_name= "tutorial";
if(isset($connect)&& isset($db_name)){
    $connect_db= @mysqli_select_db($connect,$db_name);
    if($connect_db){
        $results["is_db_connected"] = true;
        $results["connection_msg"] = "successfuly conected";
    }else{
        $results["is_db_connected"] = false;
        $results["connection_msg"] = "error : db is not found";
    }

}else{
    $results["is_db_cannected"] = false;
    $results["connection_msg"] = "error : connection setup is not correct!";
}
$action = "";
if(isset($_GET["action"])){
    $action = $_GET["action"];
}

function generateRandomString($length = 10) {
    $characters = "1234567890azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
    $charactersLength = strlen($characters);
    $randomString = "";
    for ($i = 0; $i < $length; $i++){
        $randomString .= $characters[rand(0, $charactersLength -1)];
    }
    return $randomString;
}
//crud
if($action == "read"){
    $results["calling_read"]=true;
}
if($action == "update"){
    $imgName ="";
    $upload_path = "";
    if(isset($_FILES["imgprofil"]["name"])){
        $img_name=$_FILES["imgprofil"]["name"];
        $valid_extension=array("png","jpg","jpeg","gif");
        $extension = pathinfo($img_name, PATHINFO_EXTENSION);
        if(in_array($extension, $valid_extension)){
            $newGeneratedId = generateRandomString(75);
            $upload_path = "assets/imgprofil/". $newGeneratedId. ".". $extension;
            $upload_path = "../public/sdfg/photo/imgprofil/". $newGeneratedId. ".". $extension;

            if(file_exists($upload_path)){
                $newGeneratedId = generateRandomString(75);
                $imgName =$newGeneratedId. ".". $extension;
            }else{
                $imgName =$newGeneratedId. ".". $extension;
            }
        }else{
            $results["error"]=true;
            $results["message"]="profil img has be : PNG, JPEG, JPG, GIF";
        }
    }else{
        $results["error"]=true;
        $results["message"]="must select img profil";

    }
    $results["newImageUploaded"] = $imgName;
    if($imgName != "" && $upload_path != ""){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $fullname = $_POST['fullname'];
            $location = $_POST['Location'];
            $language = $_POST['language'];
            $script = $_POST['script'];
            $password = $_POST['password'];
            


        $sql ="";
            
            //add img to folder and add to db
            if(move_uploaded_file($_FILES["imgprofil"]["tmp_name"], $upload_path)){
                $results["new sign up"] = true;

            }else{
                $results["error"]=true;
                $results["message"]="failed saving img profile";
            }

            $verify_query = mysqli_query($connect,"SELECT Email FROM users WHERE Email='$email'");
            $verify_queryy = mysqli_query($connect,"SELECT username FROM users WHERE username='$username'");
            if(mysqli_num_rows($verify_query) !=0 && mysqli_num_rows($verify_queryy) !=0){

             }
             else{if(mysqli_num_rows( $verify_queryy) !=0){

             }else{
    
                $sql = mysqli_query($connect,"INSERT INTO users(Username,Email,Age,gender,fullname,location,language,script,imgprofil, Password) VALUES('$username','$email','$age','$gender','$fullname','$location','$language','$script','$imgName','$password')") or die("Erroe Occured");
    

             }
             }
             if($sql){
                $results["error"] = false;
                $results["message"] = "Registration successfully! ";
                $results["added_data"] = true;
             }else{
                $results["error"] = true;
                $results["message"] = "this email or username is used ! try a nother one";
                $results["added_data"] = false;
             }
    }
}



echo json_encode($results);
//disconnect from db
?>