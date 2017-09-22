<?php 
include_once './gallery_header.php'; 
include_once './admin-cp/config.php';
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Gallery</title>

    <!-- Bootstrap Core Css -->
    <link href="admin-cp/assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Light Gallery Plugin Css -->
    <link href="admin-cp/assets/plugins/light-gallery/css/lightgallery.css" rel="stylesheet">
      <link href="admin-cp/assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Light Gallery Plugin Css -->
    <link href="admin-cp/assets/plugins/light-gallery/css/lightgallery.css" rel="stylesheet">
    
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->

</head>

<body class="theme-red">
    <!-- Page Loader -->
    
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    
    <!-- #Top Bar -->
    

    <section class="content" style="background: url('assets/images/1348.jpg');">
        <div style="padding: 50px;"></div>
        <div class="container-fluid">
            <div class="block-header">
                <center><h2 style="color: #ddd;font-family: 'Montez';font-size: 50px;text-shadow: 0px 0px 50px #fff;padding: 0px 0px 25px;">Image Gallery
                    
<!--                    <small>Taken from <a href="http://sachinchoolur.github.io/lightGallery/" target="_blank">sachinchoolur.github.io/lightGallery</a></small>-->
                </h2>
                </center>    
            </div>
            <!-- Image Gallery -->
            <div class="block-header container">
                <?php 
                if(isset($_GET['gid']))
                {
                  $cat_id=$_GET['gid'];
                    $select_cat="SELECT * FROM wed_category WHERE id='$cat_id'";
                    $exe_select_cat=mysqli_query($con,$select_cat);
                    $detail=mysqli_fetch_array($exe_select_cat);
                    ?>
                <center><img src="admin-cp/uploaded/categories_photos/<?php echo $detail['cat_img']; ?>" class="img-responsive" style="max-height: 500px;width:auto !important; "></center>
                <span class="container"><p class="glry-desc"><?php echo $detail['cat_desc']; ?></p></span>
                    <?php
                }
                ?>
            </div>
    
            <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card box-glry">
                        <div><h2 style="color: #bbb;line-height: 5rem;margin-top: -5px;">Related Images</h2></div>
                        <div class="body">
                            <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                            <?php 
                            if(isset($_GET['gid'])){
                                
                                $id=$_GET['gid'];

                                $select="SELECT * FROM gallery WHERE main_cat='".$id."'";
                                $exe_img=mysqli_query($con,$select);

                                while($img=mysqli_fetch_array($exe_img))
                                {
                                ?>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="admin-cp/uploaded/portfolio/<?php echo $img['photos']; ?>" data-sub-html="" style="width:200px;">
                                        <img class="img-responsive thumbnail" src="admin-cp/uploaded/portfolio/<?php echo $img['photos']; ?>">
                                    </a>
                                </div>
                            <?php } } ?>
                         </div>
<!--                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="../../images/image-gallery/20.jpg" data-sub-html="Demo Description">
                                        <img class="img-responsive thumbnail" src="../../images/image-gallery/thumb/thumb-20.jpg">
                                    </a>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="padding: 50px 0px;"></div>
    </section>
    <script src="admin-cp/assets/plugins/light-gallery/js/lightgallery-all.js"></script>
<script src="admin-cp/assets/plugins/jquery/jquery.min.js"></script>

    <!-- Custom Js -->
    <script src="admin-cp/assets/js/pages/medias/image-gallery.js"></script>
    
   
</body>
<?php   include_once './gallery_footer.php';  ?>
</html>