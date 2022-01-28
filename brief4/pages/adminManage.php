<?php
      // error_reporting(0);
      include 'connexion.php';
      // $id=$_GET['updateid'];
$sql="SELECT * FROM users WHERE role like 'client' ";

      $result=mysqli_query($link,$sql);
      $row=mysqli_fetch_assoc($result);
      // print_r($row);
      $id=$row['id'];
      $username=$row['username'];
      $password=$row['password'];


if($_SERVER['REQUEST_METHOD']=="POST"){

    $oldpass = $_POST["password"];
    $username=$_POST["user_name"];
    $newPassword=$_POST['Cpassword'];
    
   
        if($oldpass===$password){
            
            $sql="UPDATE users SET username='$username', password='$newPassword' WHERE id=$id ";
            
            
            // Redirect user to dashboard page
            header("location: dashboard.php");
        } else{
            // Password is not valid, display a generic error message
            $login_err = "Invalid password.";
            
        }
      }
    
      ?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- font awesome -->
    <!-- <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'> -->
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/dash.css" />
    <title>DASHBOARD</title>
    <style>
    </style>
    <!-- line chart -->

</head>

<body id="body">
    <div class="container">
        <nav class="navbar">
            <div class="nav_icon" onclick="toggleSidebar()">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
            <div class="navbar__left">
                <a class="active_link" href="#">Admin</a>
            </div>
            <div class="navbar__right">
                <a href="#">
                    <img width="40" src="../images/logout.png" alt="" />
                    <div class="sidebar__logout">
                        <a href="logout.php">Log out</a>
                    </div>
                </a>
            </div>
        </nav>
        <main>
            <div class="main__container">
                <!-- main title -->
                <div class="main__title">
                    <img src="../images/hello.svg" alt="" />
                    <div class="main__greeting">
                        <h1>Admin Profile</h1>
                        <p>check and update your informations</p>
                    </div>
                </div>
                <!-- end main title -->
                <!-- main cards -->
                <?php  
           if(!empty($login_err)){
            echo '<div style="padding: 20px;
            background-color: #f44336;
            color: white;">' . $login_err . '</div>';
        }        
        ?>
                <div class="form_container">

                    <form action="" method="POST">
                        <div class="cont">
                            <label for="full_name">Username</label>
                            <input type="text" name="user_name" id="nameA" placeholder="   Enter your username"
                                value="  <?php echo $username; ?>" required>
                        </div>

                        <div class="cont">
                            <label for="password">Old password</label>
                            <input type="password" name="password" id="passwordA" placeholder="   Old password" value=""
                                required>
                        </div>

                        <div class="cont">
                            <label for="Cpassword">New password</label>
                            <input type="password" name="Cpassword" id="CpasswordA" placeholder="   New password"
                                required>
                        </div>

                        <div class="butt_cont">
                            <button type="submit" class="btn">Update Profile</button>
                        </div>

                    </form>

                </div>
            </div>
            <!-- end of main cards -->
    </div>
    </main>
    <!-- navbar -->
    <div id="sidebar">
        <div class="sidebar__title">
            <div class="sidebar__img">
                <h1>ShopNow</h1>
            </div>
            <i onclick="closeSidebar()" class="fa fa-times" id="sidebarIcon" aria-hidden="true"></i>
        </div>
        <div class="sidebar__menu">
            <div class="sidebar__link active_menu_link">
                <a href="dashboard.php">Dashboard</a>
            </div>
            <h2>Manage</h2>
            <div class="sidebar__link">
                <a href="adminManage.php">Admin Management</a>
            </div>
            <div class="sidebar__link">
                <a href="liste.php">List of products</a>
            </div>
            <div class="sidebar__link">
                <a href="create.php">Create products</a>
            </div>

        </div>
    </div>
    </div>

</body>

</html>