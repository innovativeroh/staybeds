<?php include_once("connection.php"); ?>
<link rel="stylesheet" href="./assets/css/main.css" type="text/css">
<script src="https://kit.fontawesome.com/70edc5e2f3.js" crossorigin="anonymous"></script>
<link rel="icon" type="image/png" href="./assets/img/favicon.png" />
<header>
    <div id="wrapper">
    <div class="header-flex-box">
            <div class="header-flex-area">
                <img src="./assets/img/logo-wide.png" width="140px" style="padding: 10px;">
            </div>
            <div class="header-flex-area mobile_hide">
                <div style="position: relative;">
                <form action="search.php" method="GET">
                    <input type="text" name="q" placeholder="Search" id="header_search">
                    <button type="submit" name="go" id="search_button"><i class="fas fa-search"></i></button>
                </form>
                </div>
            </div>
            <div class="header-flex-area mobile_hide">
                <button class="header_button"><i class="fas fa-user-circle"></i></button>
                <button class="header_button" style='border: 1px solid #fff;'><i class="fas fa-globe" style="color: #111"></i></button>
            </div>
        </div>
    </div>
</header>
<div class="mobile_header_nav">
    <div class="mobile_nav_flex_but">
        <button><i class="fa-solid fa-house"></i>
        <p>Home</p>
        </button>
        <button><i class="fa-solid fa-magnifying-glass"></i>
        <p>Search</p></button>
        <button><i class="fa-solid fa-user"></i>
        <p>Profile</p></button>
        <button><i class="fa-solid fa-circle-plus"></i>
        <p>Add</p></button>
        <button><i class="fa-solid fa-gear"></i>
        <p>Config</p></button>
    </div>
</div>