<?php

include 'connexion.php';
// Process delete operation after confirmation
if(isset($_GET["deleteid"]) && !empty($_GET["deleteid"])){

  // Prepare a delete statement
  $sql = "DELETE FROM produits WHERE id_p = ?";
  
  if($stmt = mysqli_prepare($link, $sql)){
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "i", $param_id);
      
      // Set parameters
      $param_id = trim($_GET["deleteid"]);
      
      // Attempt to execute the prepared statement
      if(mysqli_stmt_execute($stmt)){
          // Records deleted successfully. Redirect to landing page
          header("location: liste.php");
          exit();
      } else{
          echo "Oops! Something went wrong. Please try again later.";
      }
  }
   
  // Close statement
  mysqli_stmt_close($stmt);
  
  // Close connection
  mysqli_close($link);
}




?>













<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- font awesome -->
    <!-- <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'> -->
    <link rel="stylesheet" href="../css/product.css">
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
              <h1>Lists of products</h1>
              <p>For more infos about products</p>
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
          <div class="">


              <?php

              $sql="SELECT * FROM produits";
              $result=mysqli_query($link,$sql);
              
              if($result){

                if(mysqli_num_rows($result) > 0){
                  
                  echo '<table id="customers">';
                  echo "<thead>";
                  echo "<tr>";
                  echo "<th>Id </th>"; 
                  echo "<th>Reference </th>";
                  echo "<th>Nom </th>";
                  echo "<th>Descriptions </th>";
                  echo "<th>prix </th>";
                  echo "<th>Qte </th>";
                  echo "<th>Categorie </th>";
                  echo "<th>Image </th>";
                  echo '<th>Mise à jour </th>';
                  echo "</tr>";
                  echo "</thead>";
                  echo "<tbody>";

                

                while($row = mysqli_fetch_array($result)){  
                  // print_r($row);
                  echo "<tr>";
                  $id=$row['id_p'];
                  $referencespr=$row['reference'];
                  $namepr=$row['nom'];
                  $decriptionpr=$row['descriptions'];
                  $pricepr=$row['prix'];
                  $qtepr=$row['quantite'];
                  $catepr=$row['categorie'];
                  $newNmae=$row['images'];
                  

                  echo "<td>".$id."</td>";
                  echo "<td>".$referencespr."</td>";
                  echo "<td>".$namepr."</td>";
                  echo "<td>".$decriptionpr."</td>";
                  echo "<td>".$pricepr."</td>";
                  echo "<td>".$qtepr."</td>";
                  echo "<td>".$catepr."</td>";
                  echo '<td><img src="../images/'.$newNmae.'" width="50" height="50"></td>';
                  echo "<td>";
                  echo '<pre><a href="? deleteid='.$id.'" style="text-decoration:none"><button name="delete" class="delete">Delete </button> </a></pre>
                  ';
                  echo '<pre><a href="update.php?updateid='.$id.'" style="text-decoration:none"><button class="update">Update</button> </a></pre>
                  ';
      
                  echo "</td>";
                  echo "</tr>";
                 
                }

                echo "</tbody>";                            
                echo "</table>";
                
              }

              else {
               echo $login_err;
              }
            }

              ?>
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