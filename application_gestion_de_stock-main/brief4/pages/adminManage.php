
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
      $email=$row['email'];
      $password=$row['password'];





      if($_SERVER['REQUEST_METHOD']=="POST"){

      

        if(1){
          
          $newpass= $_POST['Cpassword'];
          $oldpass= $_POST['password'];

          $hashpass = password_hash($oldpass, PASSWORD_DEFAULT); // Creates a password hash

        // echo "ggggggggggggggggggggggggggggggggggggggggg";
    
           
      

            // echo $newpass."<br>";

            // echo $oldpass."<br>";

            if($hashpass !==$password){

                // echo "ggggggggggggggggggggggggggggggggggggggggg";
                
                    $username=$_POST['user_name'];
                    $email=$_POST['email'];
                    $newPassword=$_POST['Cpassword'];
                
                $sql="UPDATE users SET username='$username', password='$hashpass' WHERE id=$id ";
                
                
              //  echo' Redirect user to dashboard page';
                header("location: dashboard.php");

            }
         else{
              echo  'Password is not valid, display a generic error message';
        // echo $newpass;

                $login_err = "Invalid password.";
                
        //     }
    
        }
    
    
    
    
    
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
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                <input type="text" name="user_name" id="nameA" placeholder="   Enter your username" value="  <?php echo $username; ?>" required>
            </div>

            <div class="cont">
                <label for="email">Email</label>
                <input type="email" name="email" id="emailA" placeholder="   Enter your email" value="  <?php echo $email; ?>" required>
            </div>

            <div class="cont">
                <label for="password">Old password</label>
                <input type="password" name="password" id="passwordA"  placeholder="   Old password"  value="" required>
            </div>

            <div class="cont">
                <label for="Cpassword">New password</label>
                <input type="password" name="Cpassword" id="CpasswordA" placeholder="   New password"   required>
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
          <i
            onclick="closeSidebar()"
            class="fa fa-times"
            id="sidebarIcon"
            aria-hidden="true"
          ></i>
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
    <!-- chart  -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> -->
    <!-- end -->
    <script src="../js/script.js"></script>
    <script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
    </script>
  </body>
</html>