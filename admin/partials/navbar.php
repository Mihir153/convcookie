<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo plugin_dir_url(__FILE__) . 'admin/css/conversios-cookie-admin-css'; ?>">
<style>
.custom-navbar {
    background-color: #043E88;
    font-weight: 700; 
}

.custom-navbar {
    background-color: #043E88;
    font-weight: 700;  */
}

.custom-navbar .nav-link {
    color: white;
    font-weight: normal; 
    font-size: 16px; 
}

.navbar .nav-link.active {
    font-weight: bold;
    color: #FFFFFF;
    letter-spacing: 0.5px;
    font-weight: 750;
    position: relative; 
}


.navbar .nav-link.active::after {
    content: '';
    display: block;
    width: 100%; 
    height: 4px; 
    background-color: #FFFFFF; 
    position: absolute;
    bottom: -13px; 
    left: 0; 
    border-top-left-radius: 2.5px; 
    border-top-right-radius: 2.5px; 
}

.custom-navbar .nav-link:hover:not(.active) {
    color: #FFFFFF;
    font-weight: 750;
}

#wpcontent {
    height: 100%;
    padding-left: 0px;
}

.navbar-nav {
    margin-right: 50px; 
    margin-left: 0; /
}

</style>
<nav class="navbar navbar-expand-lg navbar-light custom-navbar">
    <div class="container-fluid">
        <a href="https://www.conversios.io"> 
            <img src="data:image/png;base64,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">
        </a
    
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#custom-navbarNav" aria-controls="custom-navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="custom-navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php if (isset($_GET['page']) && $_GET['page'] == 'dashboard' && (!isset($_GET['tab']) || $_GET['tab'] == '')) echo 'active'; ?>" aria-current="page" href="<?php echo admin_url('admin.php?page=dashboard'); ?>">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if (isset($_GET['page']) && $_GET['page'] == 'dashboard' && $_GET['tab'] == 'cookie_banner') echo 'active'; ?>" href="<?php echo admin_url('admin.php?page=dashboard&tab=cookie_banner'); ?>" >Cookie Banner</a>
                </li>
            </ul>
        </div>
        <div class="navbar-nav ms-auto">
            <a class="nav-link" href="https://www.conversios.io/about-us/">About Us</a>
            <a class="nav-link" href="https://www.conversios.io/contact-us/">Support</a>
        </div>
    </div>
</nav>
