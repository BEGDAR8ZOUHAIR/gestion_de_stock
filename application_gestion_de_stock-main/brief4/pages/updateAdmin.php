<?php
include 'connexion.php';
$id=$_GET['updateid'];

$sql="SELECT * FROM 'users' where id=$id ";

$result=mysqli_query($link,$sql);
$row=mysqli_fetch_assoc($result);
$id=$row['id'];
$username=$row['user_name'];
$email=$row['email'];
$password=$row['password'];

if(isset($_POST['submit'])){

    if(1){


        $newpass = password_hash($_POST["password"], PASSWORD_DEFAULT); // Creates a password hash

        if(password_verify($newpass,$password)){
            
                $username=$_POST['user_name'];
                $email=$_POST['email'];
                $newPassword=$_POST['Cpassword'];
            
            $sql="UPDATE users SET username='$username', password='$password' WHERE id=$id ";
            
            
            // Redirect user to dashboard page
            header("location: dashboard.php");
        } else{
            // Password is not valid, display a generic error message
            $login_err = "Invalid password.";
            
        }

    }





}
?>