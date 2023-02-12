<?php include_once("connection.php"); ?>
<link rel="stylesheet" href="./assets/css/main.css" type="text/css">
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>

<link rel="icon" type="image/png" href="./assets/img/favicon.png" />
<header>
    <div id="wrapper">
    <div class="header-flex-box">
            <div class="header-flex-area">
                <a href="index.php"><img src="./assets/img/logo-wide.png" width="140px" style="padding: 10px;"></a>
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
                
                <?php if (isset($_SESSION['username'])) {?>
                    <div style='position: relative;'>
                    <button class="header_button" onclick="dropdown_trigger()"><i class="fas fa-user-circle"></i></button>
                    <div class="dropdown_menu">
                            <button><i class="fa-solid fa-user"></i>&nbsp; Edit Profile</button><br>
                            <button><i class="fa-solid fa-message"></i> Queries</button><br>
                            <a href='logout.php'><button><i class="fa-solid fa-right-from-bracket"></i> Logout</button></a>
                        </div>
                    </div>
                    <?php } else { ?>
                        <a href='login.php'><button class="header_button"><i class="fas fa-user-circle"></i></button></a>
                        <?php } ?>

                        <button class="header_button_text">List Your PG</button>
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
<script>
    let dropdown_area = document.querySelector('.dropdown_menu');
    function dropdown_trigger() {
        if(dropdown_area.style.display == 'none') {    
        dropdown_area.style.display = 'block';
    } else {
        dropdown_area.style.display = 'none';
    }
    }
</script>