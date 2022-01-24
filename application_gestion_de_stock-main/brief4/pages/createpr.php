<?php

 include 'connexion.php';


if($_SERVER['REQUEST_METHOD']=="POST"){

    $referencespr = $_POST['referPr'];
    $namepr = $_POST['namePr'];
    $decriptionpr = $_POST['descrPr'];
    $pricepr = $_POST['pricePr'];
    $qtepr = $_POST['qtePr'];
    $catepr = $_POST['catPr'];
    
    // file properties
    $file=$_FILES["file"]["tmp_name"];
    $name=$_FILES["file"]["name"];
    $extention=explode(".",$name);
    $newNmae=uniqid()."images".".".$extention[1];
    $fileUpload="../images/".$newNmae;
    move_uploaded_file($file,$fileUpload);
    

    // echo $_FILES["file"];

    // header('location:liste.php');

    // print_r($_FILES["image"]);

    $sql = "INSERT INTO produits (reference,nom,descriptions,prix,quantite,categorie,images) VALUES
    ('$referencespr','$namepr','$decriptionpr','$pricepr','$qtepr','$catepr','$newNmae')";

    $result=mysqli_query($link,$sql);
    if($result){
      header("location: liste.php");
    }
    else{
      echo $login_err;
    }

  }



?>