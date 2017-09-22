<?php include_once'header.php';include_once './admin-cp/config.php';?>


<section class="mbr-slider mbr-section mbr-section--no-padding carousel slide" data-ride="carousel" data-wrap="true" data-interval="5000" id="slider-5" style="background:linear-gradient(360deg,rgba(140,0,0,1),rgba(190,0,0,0.9));">
    <div class="mbr-section__container">
        <div>
        
            <ol class="carousel-indicators">

            
              <li data-app-prevent-settings="" data-target="#slider-5" data-slide-to="0" class="active"></li>
              <?php 
               $car=mysqli_query($con,"SELECT * FROM home_banner");
               while($row=mysqli_fetch_array($car))
               {
                ?>
              <li data-app-prevent-settings="" data-target="#slider-5" data-slide-to="<?php echo $row['ban_id']; ?>"></li>
                <?php } ?>
            </ol> 
            <div class="carousel-inner" role="listbox">
                <div class="mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--bg-adapted item dark center  mbr-section--full-height active" );"><img src="assets/images/h33.jpg" class="img-responsive">
                    <div class="mbr-box__magnet mbr-box__magnet--center-right mbr-box__magnet--sm-padding">
                    </div>
                </div>
                     <?php 
                        $bann="SELECT * FROM home_banner WHERE ban_status='active'";
                        $exe_ban=mysqli_query($con,$bann);
                         while($get_ban=mysqli_fetch_array($exe_ban))
                         {
                        ?>
                <div class="mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--bg-adapted item dark center mbr-section--full-height" );"> <img src="admin-cp/uploaded/Home_bannner/<?php echo $get_ban['ban_image']; ?>" class="itemmg-responsive">
                    <div class="mbr-box__magnet mbr-box__magnet--center-center mbr-box__magnet--sm-padding"> 
                   </div>
                </div><?php } ?>
            </div>
            
            <a data-app-prevent-settings="" class="left carousel-control" role="button" data-slide="prev" href="#slider-5">
                <span aria-hidden="true"><</span>
                <span class="sr-only">Previous</span>
            </a>
            <a data-app-prevent-settings="" class="right carousel-control" role="button" data-slide="next" href="#slider-5">
                <span aria-hidden="true">></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>

<div class="ovrly">
	<div class="content-block parallax" id="services" style="padding: 0px !important;">
		<div class="container-fluid text-center hvr"  >
			<header class="block-heading cleafix" id="portfolio">
  			<div class="container" id="portfolio">
  				<h1 style="font-size: 5em;">About The Studio</h1>
  				<p>We are a team of creative minds trying to make your events an experience to be relished. We are based in Surat | Gujarat and covering photography aspects all over. Our team consists of experienced and creative photographers and designers.</p>
        
  				<p>Wedding :
              Our vision is to improve the wedding experience of couples everywhere with innovative services and consistent delivery in a professional way.
  				 
  				Do contact us if you are looking for creating good memories.</p>
        </div>
			</header>
		</div>

    <div class="container-fluid text-center hvr why-spc">
      <header class="block-heading cleafix" id="portfolio">
        <div class="container" id="portfolio">
          <h1 style="font-size: 5em;">Why SPC</h1>
          <?php
            $whySpc="SELECT * FROM spc";
            $exe_SPC=mysqli_query($con,$whySpc);
            $data=mysqli_fetch_array($exe_SPC);
            ?>
            <p>
              <?php echo $data['spc_desc']; ?>
            </p>
        </div>
      </header>
    </div>
  </div>
</div>


<div class="content-block" id="testimonial">
	<div class="container text-center">
					
<!--==================testimonial===========================-->

	<div style="margin-top: 50px; font-size: 50px; font-style: italic;color: #fff;" class="show" >
	  <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="carousel slide" id="fade-quote-carousel" data-ride="carousel" data-interval="3000">
          <ol class="carousel-indicators">
            <li data-target="#fade-quote-carousel" data-slide-to="0" class="active"></li>
            <?php
                   $sql="SELECT * FROM `testimonial`";
                   $res=mysqli_query($con,$sql);

                   while ($row1=mysqli_fetch_array($res)) {
               ?>
            <li data-target="#fade-quote-carousel" data-slide-to="<?php echo $row1['t_id']; ?>"></li>
            <?php } ?>
          </ol>
          <!-- Carousel items -->
          <div class="carousel-inner">
            <div class="active item">
                        <div class="profile-circle" >
                            <img src="assets/images/dish_joshi.jpg" class="img-responsive" style="border-radius: 1000px;">
                        </div>
              <blockquote>
              <h1>- Disha Joshi - Ahemdabad</h1>
                <p>DEAR SPC,
                    thank you so much for preserving life time memory of my darling  niece  Prisha. Her each photo carries her differnt  mood. Innocence, curiosity,  naughtiness and what not.
                    Allowing team  to select photo for frame was the correct decision. I would have never be so perfect selector for photos.
                    More power to team. Keep growing.</p>
              </blockquote> 
            </div>
              <?php
                   $sql="SELECT * FROM `testimonial`";
                   $res=mysqli_query($con,$sql);

                   while ($row=mysqli_fetch_array($res)) {
               ?>
            <div class="item">
             <div class="profile-circle">
                 <img src="admin-cp/uploaded/testimonial/<?php echo $row['image']; ?>" class="img-responsive" style="border-radius: 1000px;">
            </div>
            <blockquote>
                <h1><?php echo $row['Name']; ?></h1>
                <p><?php echo $row['Description']; ?></p>
            </blockquote>
            </div><?php } ?>
          </div>
        </div>
      </div>              
    </div>
  </div>
 </div>
</div>
<!--================== end testimonial===========================-->

<!--galleryyy-->
<div class="">
  <div class="row" id="photos">
    <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
    </div>
      <div align="center">
        <div class="heading">
          <h2>Our <strong>Services</strong></h2>
        </div>
      </div>
    <br/>
  </div>
</div>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
  
<div class="content-block"  style="padding:0px 30px;">
  <div class="">
		<section class="block-body">
			<div class="row">
          <?php 
          $cat="SELECT * FROM wed_category";
          $exe_cat=mysqli_query($con,$cat);
          while($cat1=mysqli_fetch_array($exe_cat))
          {
          ?>
					<div class="col-sm-4  filter hdpe">
					<a href="gallery.php?gid=<?php echo $cat1['id']; ?>" class="recent-work" style="background-image:url('admin-cp/uploaded/categories_photos/<?php echo $cat1['cat_img']; ?>');box-shadow: 0px 0px 5px #3a3a3a;">
          <span class="btn btn-o-white"><?php echo $cat1['cat_name']; ?></span>
					</a>
					</div>
          <?php } ?>
			</div>
		</section>
	</div>
</div><!-- #portfolio -->

<!--service -->
<div class="row" class="block-my" id="h11" >

</div>



<div class="container">
 <!--  <div id="aniimated-thumbnials">
  <a href="assets/images/jk.jpg">
    <img src="assets/images/jk.jpg" />
  </a>
  
</div> -->
  <div class="cont">

  <div class="demo-gallery">
    <ul id="lightgallery" >
      <li data-responsive="assets/images/jk.jpg" data-src="assets/images/jk.jpg"
      data-sub-html="<h4>Fading Light</h4><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>" data-pinterest-text="Pin it" data-tweet-text="share on twitter ">
        <a href="">
          <img class="img-responsive" src="assets/images/jk.jpg">
          <div class="demo-gallery-poster">
            <img src="https://sachinchoolur.github.io/lightGallery/static/img/zoom.png">
          </div>
        </a>
      </li>
      <li data-responsive="https://sachinchoolur.github.io/lightGallery/static/img/2-375.jpg 375, https://sachinchoolur.github.io/lightGallery/static/img/2-480.jpg 480, https://sachinchoolur.github.io/lightGallery/static/img/2.jpg 800" data-src="https://sachinchoolur.github.io/lightGallery/static/img/2-1600.jpg"
      data-sub-html="<h4>Bowness Bay</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy I was passing the right place at the right time....</p>" data-pinterest-text="Pin it" data-tweet-text="share on twitter ">
        <a href="">
          <img class="img-responsive" src="https://sachinchoolur.github.io/lightGallery/static/img/thumb-2.jpg">
          <div class="demo-gallery-poster">
            <img src="https://sachinchoolur.github.io/lightGallery/static/img/zoom.png">
          </div>
        </a>
      </li>
      <li data-responsive="https://sachinchoolur.github.io/lightGallery/static/img/13-375.jpg 375, https://sachinchoolur.github.io/lightGallery/static/img/13-480.jpg 480, https://sachinchoolur.github.io/lightGallery/static/img/13.jpg 800" data-src="https://sachinchoolur.github.io/lightGallery/static/img/13-1600.jpg"
      data-sub-html="<h4>Sunset Serenity</h4><p>A gorgeous Sunset tonight captured at Coniston Water....</p>" data-pinterest-text="Pin it" data-tweet-text="share on twitter ">
        <a href="">
          <img class="img-responsive" src="https://sachinchoolur.github.io/lightGallery/static/img/thumb-13.jpg">
          <div class="demo-gallery-poster">
            <img src="https://sachinchoolur.github.io/lightGallery/static/img/zoom.png">
          </div>
        </a>
      </li>
      <li data-responsive="https://sachinchoolur.github.io/lightGallery/static/img/4-375.jpg 375, https://sachinchoolur.github.io/lightGallery/static/img/4-480.jpg 480, https://sachinchoolur.github.io/lightGallery/static/img/4.jpg 800" data-src="https://sachinchoolur.github.io/lightGallery/static/img/4-1600.jpg"
      data-sub-html="<h4>Coniston Calmness</h4><p>Beautiful morning</p>" data-pinterest-text="Pin it" data-tweet-text="share on twitter ">
        <a href="">
          <img class="img-responsive" src="https://sachinchoolur.github.io/lightGallery/static/img/thumb-4.jpg">
          <div class="demo-gallery-poster">
            <img src="https://sachinchoolur.github.io/lightGallery/static/img/zoom.png">
          </div>
        </a>
      </li>
    </ul>
 
  </div>
</div>
</div>
<!--=============================
                 teams1
=================================-->
<!--
Bootstrap Line Tabs by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
-->

<div class="container content" id="Teams">
  <div class="heading">
    <h2>Our <strong>Great Team</strong></h2>
  </div><!-- //end heading -->

 <!-- ======================carousel====================-->
     
  <div id="owl-demo" class="owl-carousel owl-theme roomy-60">
    <div class="item active">
      <div class="our-team">
          <img src="admin-cp/uploaded/teams/2.JPG" class="img-responsive center-block" alt="">
            <div class="team-content">
                <h3 class="team-prof">
                    <a href="#">Priya Jalan</a>
                    <small>Photographer</small>
                </h3>
            </div>
        </div>
      </div>

  <?php 
    $sql=mysqli_query($con,"SELECT * FROM wed_teams");
   while($row=mysqli_fetch_array($sql)){
    ?>
      <div class="item active">
        <div class="our-team">
            <img src="admin-cp/uploaded/teams/<?php echo $row['img']; ?>" class="img-responsive center-block" alt="">
          <div class="team-content">
            <h3 class="team-prof">
              <a href="#"><?php echo $row['name']; ?></a>
              <small><?php echo $row['designation']; ?></small>
            </h3>
          </div>
        </div>
      </div>
  <?php } ?>           
  </div>
</div>

    <!-- ======================end carousel====================-->


<?php include_once'./footer.php' ?>