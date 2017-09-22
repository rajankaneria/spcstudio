<?php
if(!$_SESSION['login_user']) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montez' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Montez" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <link href="assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css">

    <!-- Waves Effect Css -->
    <link href="assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="assets/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="assets/css/themes/all-themes.css" rel="stylesheet" />
    
    <!--=============== ALL SCRIPT ==================-->
    <script src="assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.6.7/jquery.tinymce.min.js"></script>
    <!-- Select Plugin Js -->
    



    <!-- Waves Effect Plugin Js -->
<!--    <script src="assets/plugins/node-waves/waves.js"></script>-->



    <!-- Morris Plugin Js -->
    <script src="assets/plugins/raphael/raphael.min.js"></script>
    <script src="assets/plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="assets/plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="assets/plugins/flot-charts/jquery.flot.js"></script>
    <script src="assets/plugins/flot-charts/jquery.flot.resize.js"></script>
    
    <script src="assets/plugins/flot-charts/jquery.flot.categories.js"></script>
    
    <!-- Sparkline Chart Plugin Js -->
    <script src="assets/plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="assets/js/admin.js"></script>
    <script src="assets/js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
    <!--=============== OVER SCRIPT ================-->
    
    <link href="admin-cp/assets/plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="admin-cp/assets/plugins/light-gallery/css/lightgallery.css" rel="stylesheet">
    
    
    
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="add_categories.php">The SPC - studio</a>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
<!--            <div class="user-info">
                <div class="image">
                    <img src="images/user.png" width="48" height="48" alt="User" />
                </div>
            </div>-->
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a <?php if (strpos($_SERVER['PHP_SELF'], 'add_categories.php') !== false) { ?>class="active-menu" <?php } ?> href="add_categories.php">
                            <i class="material-icons">layers</i>
                            <span>Add New Category</span>
                        </a>
                    </li>
                    <li>
                        <a <?php if (strpos($_SERVER['PHP_SELF'], 'add_portfolio.php') !== false) { ?>class="active-menu" <?php } ?> id="addPortfolioLink" href="add_portfolio.php">
                            <i class="material-icons">perm_media</i>
                            <span>Add Portfolio</span>
                        </a>
                    </li>
                    
                    <li>
                        <a <?php if (strpos($_SERVER['PHP_SELF'], 'add_home_banners.php') !== false) { ?>class="active-menu" <?php } ?> href="add_home_banners.php">
                            <i class="material-icons">panorama</i>
                            <span>Add Home Banner</span>
                        </a>
                    </li>

                     <li>
                        <a <?php if (strpos($_SERVER['PHP_SELF'], 'add_spc.php') !== false) { ?>class="active-menu" <?php } ?> href="add_spc.php">
                            <i class="material-icons">view_headline</i>
                            <span>Add SPC</span>
                        </a>
                    </li>

                    <li>
                        <a <?php if (strpos($_SERVER['PHP_SELF'], 'add_team.php') !== false) { ?>class="active-menu" <?php } ?> href="add_team.php">
                            <i class="material-icons">group_add</i>
                            <span>Add Team</span>
                        </a>
                    </li>
                     <li>
                        <a <?php if (strpos($_SERVER['PHP_SELF'], 'testimonial.php') !== false) { ?>class="active-menu" <?php } ?> href="testimonial.php">
                            <i class="material-icons">group</i>
                            <span>Testimonial</span>
                        </a>
                    </li>
<!--                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Forms</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/forms/basic-form-elements.html">Basic Form Elements</a>
                            </li>
                            <li>
                                <a href="pages/forms/advanced-form-elements.html">Advanced Form Elements</a>
                            </li>
                            <li>
                                <a href="pages/forms/form-examples.html">Form Examples</a>
                            </li>
                            <li>
                                <a href="pages/forms/form-validation.html">Form Validation</a>
                            </li>
                            <li>
                                <a href="pages/forms/form-wizard.html">Form Wizard</a>
                            </li>
                            <li>
                                <a href="pages/forms/editors.html">Editors</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">view_list</i>
                            <span>Tables</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/tables/normal-tables.html">Normal Tables</a>
                            </li>
                            <li>
                                <a href="pages/tables/jquery-datatable.html">Jquery Datatables</a>
                            </li>
                            <li>
                                <a href="pages/tables/editable-table.html">Editable Tables</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">perm_media</i>
                            <span>Medias</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/medias/image-gallery.html">Image Gallery</a>
                            </li>
                            <li>
                                <a href="pages/medias/carousel.html">Carousel</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">content_copy</i>
                            <span>Example Pages</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/examples/sign-in.html">Sign In</a>
                            </li>
                            <li>
                                <a href="pages/examples/sign-up.html">Sign Up</a>
                            </li>
                            <li>
                                <a href="pages/examples/forgot-password.html">Forgot Password</a>
                            </li>
                            <li>
                                <a href="pages/examples/blank.html">Blank Page</a>
                            </li>
                            <li>
                                <a href="pages/examples/404.html">404 - Not Found</a>
                            </li>
                            <li>
                                <a href="pages/examples/500.html">500 - Server Error</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">trending_down</i>
                            <span>Multi Level Menu</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);">
                                    <span>Menu Item</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <span>Menu Item - 2</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Level - 2</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <span>Menu Item</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle">
                                            <span>Level - 3</span>
                                        </a>
                                        <ul class="ml-menu">
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <span>Level - 4</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>-->
                    <li class="header">More</li>
                    <li>
                        <a <?php if (strpos($_SERVER['PHP_SELF'], 'contact.php') !== false) { ?>class="active-menu" <?php } ?> href="contact.php">
                            <i class="material-icons">comment</i>
                            <span>Contact Details</span>
                        </a>
                    </li>
                    <li>
                        <a <?php if (strpos($_SERVER['PHP_SELF'], 'join_us.php') !== false) { ?>class="active-menu" <?php } ?> href="join_us.php">
                            <i class="material-icons">person_add</i>
                            <span>Join Us Details</span>
                        </a>
                    </li>
                     <li>
                         <a href="logout.php">
                            <i class="material-icons">input</i>
                            <span>Log Out</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
    </section>
    <script>
$(document).ready(function() {
$(".menu>list>li").on("click", function(){
$(".menu").find(".active").removeClass("active");
$(this).parent().addClass("active");
});
    });     

$(document).ready(function(){
tinymce.init({
    selector: "textarea",
plugins: [
    "advlist autolink lists link image charmap print preview anchor",
    "searchreplace visualblocks code fullscreen",
    "insertdatetime media table contextmenu paste "
],
toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter      alignright alignjustify | bullist numlist outdent indent | link image"
});
});
     </script>
