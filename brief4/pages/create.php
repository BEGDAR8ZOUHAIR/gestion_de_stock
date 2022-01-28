<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/dash.css" />
    <title>DASHBOARD</title>
    <style>
    </style>


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
        <main style="height:900px">

            <div class="main__container">
                <!-- main title -->
                <div class="main__title">
                    <img src="../images/hello.svg" alt="" />
                    <div class="main__greeting">
                        <h1>Create some products</h1>
                        <p>Insert the infos of products</p>
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
                    <form action="createpr.php" method="POST" enctype="multipart/form-data">
                        <div class="cont">
                            <label> Reference :</label>
                            <input class="refer" type="text" id="referP" placeholder="  Enter your reference"
                                name="referPr">
                        </div>

                        <div class="cont">
                            <label> Name :</label>
                            <input class="inp" type="text" id="nameP" placeholder="  Enter your product" name="namePr"
                                require>
                        </div>

                        <div class="cont">
                            <label> Description :</label>
                            <textarea
                                style="padding-top:15px; padding-left:2px;width:100%; height: 40px; border: none;border-radius: 5px; font-size:14px; font-family:Lato,'sans-serif';"
                                id="descr" placeholder="  Describe your product" name="descrPr" require>
             </textarea>
                        </div>

                        <div class="cont">
                            <label> Prix :</label>
                            <input class="inp" type="number" id="prix" placeholder="  Enter price" name="pricePr"
                                require>
                        </div>

                        <div class="cont">
                            <label> Quantity :</label>
                            <input class="inp" type="number" id="qte" placeholder="  Enter the quantity" name="qtePr"
                                require>
                        </div>

                        <div class="cont">
                            <label> categorie :</label>
                            <input class="inp" type="text" id="cat" placeholder="  Enter the categorie" name="catPr"
                                require>
                        </div>

                        <div class="cont">
                            <label> image :</label>
                            <input class="inp" accept="image/*" type="file" id="img" placeholder="  Choose image"
                                name="file" require>
                        </div>

                        <div class="butt_cont">
                            <button type="submit" name="submit" class="btn">Create Product</button>
                        </div>

                    </form>

                </div>
            </div>
            <!-- end of main cards -->
    </div>
    </main>
    <!-- navbar -->
    <div id="sidebar" style="height: 935px;margin-top: -60%;">
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