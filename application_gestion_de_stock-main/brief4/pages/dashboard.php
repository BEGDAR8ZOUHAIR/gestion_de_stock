<?php
include 'connexion.php';
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
$query = "SELECT count(*) FROM produits";
$qresult = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($qresult);
$count = $row["count(*)"];

$queryy = "SELECT SUM(quantite) FROM produits";
$qresultt = mysqli_query($link, $queryy);
$roww = mysqli_fetch_assoc($qresultt);
$countt = $roww["SUM(quantite)"];

$queryyy = "SELECT SUM(prix) FROM produits";
$qresulttt = mysqli_query($link, $queryyy);
$rowww = mysqli_fetch_assoc($qresulttt);
$counttt = $rowww["SUM(prix)"];

$queryyyy = "SELECT prix FROM produits LIMIT 1" ;;
$qresultttt = mysqli_query($link, $queryyyy);
$rowwww = mysqli_fetch_assoc($qresultttt);
$countttt = $rowwww["prix"];


?>









<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- font awesome -->
    <link rel="stylesheet" href="../css/dash.css" />
    <title>DASHBOARD</title>
 <!-- line chart -->
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </head>
  <body id="body">
    <div class="container">
      <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
          
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
              <h1>Welcome  <b style=" color:#FB7600 ; margin-left:5px; margin-right:5px;"><?php echo htmlspecialchars($_SESSION["username"]); ?></b>  to ShopNow</h1>
              <p>The statistics in our application</p>
            </div>
          </div>

          <!-- end main title -->

          <!-- main cards -->
          <div class="main__cards">
            <div class="card">
            <img src="../images/package.png" alt="" class="ic">
            <div class="card_inner">
                <p class="text-primary-p">Number of all products</p>
                <span class="font-bold text-title"><?php echo $count; ?></span>
              </div>
            </div>

            <div class="card">
            <img src="../images/categorie.png" alt="" class="ic">
              <div class="card_inner">
                <p class="text-primary-p">number of <br> categories</p>
                <span class="font-bold text-title"><?php echo $count; ?></span>
              </div>
            </div>

            <div class="card">
            <img src="../images/stock.png" alt="" class="ic">
              <div class="card_inner">
                <p class="text-primary-p">Quantity of stock</p>
                <span class="font-bold text-title"><?php echo $countt; ?></span>
              </div>
            </div>
            </div>
          </div>
          <!-- end of main cards -->

          <!-- charts -->
    
           <div class="charts">
            <div class="charts__left">
              <div class="charts__left__title">
                <div>
                  <h1>Daily Stock</h1>
                  <p>Morocco ,Safi ,ShopNow</p>
                </div>
                <div class="chartdiv">
                <canvas id="myChart"></canvas>
              </div>
              </div>
              <div id="apex1"></div>
            </div>

            <div class="charts__right">
              <div class="charts__right__title">
                <div>
                  <h1>Stats Reports</h1>
                  <p>Morocco ,Safi ,ShopNow</p>
                </div>
                <img src="../images/dollar.png" alt="" class="ic">
              </div>

              <div class="charts__right__cards">
                <div class="card1">
                  <h1>Income</h1>
                  <br>
                  <p>$<?php echo $counttt; ?></p>
                </div>

                <div class="card2">
                  <pre><h1>Most expensive</h1></pre>
                  <br>
                  <p>$<?php echo $countttt; ?></p>
                </div>
              </div>
            </div>
          </div>
          <!-- end of charts -->
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
