<?php include_once'header.php';
include_once'./config.php';
?>

<div class="carousel fade-carousel carousel-fade slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
  <!-- Overlay -->

  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
    <li data-target="#bs-carousel" data-slide-to="1"></li>
    <li data-target="#bs-carousel" data-slide-to="2"></li>
  </ol>
  
  <!-- Wrapper for slides --><!--image fonttttt-->
  <div class="carousel-inner">
    <div class="item slides active">
      <div class="slide-1"></div>
      <div class="hero">
        <hgroup>
            <h1></h1>        
        </hgroup>       
      </div>
    </div>
    <div class="item slides">
      <div class="slide-2"></div>
      <div class="hero">           
          <hgroup>
            <h1></h1>        
        </hgroup>  
      </div>
    </div>
    <div class="item slides">
      <div class="slide-3"></div>
      <div class="hero">        
        <hgroup>
          <h1></h1>
        </hgroup>
        
      </div>
    </div>
  </div> 
</div>

<style type="text/css">
	.carousel-fade .carousel-inner .item {
  opacity: 0;
  -webkit-transition-property: opacity;
  -moz-transition-property: opacity;
  -o-transition-property: opacity;
  transition-property: opacity;
}
.carousel-fade .carousel-inner .active {
  opacity: 1;
}
.carousel-fade .carousel-inner .active.left,
.carousel-fade .carousel-inner .active.right {
  left: 0;
  opacity: 0;
  z-index: 1;
}
.carousel-fade .carousel-inner .next.left,
.carousel-fade .carousel-inner .prev.right {
  opacity: 1;
}
.carousel-fade .carousel-control {
  z-index: 2;
}
.fade-carousel {
    position: relative;
    height: 100vh;
}
.fade-carousel .carousel-inner .item {
    height: 100vh;
}
.carousel-indicators li{
      display: inline-block;
    width: 15px !important;
    height: 15px !important;
    margin: 1px;
    text-indent: -999px;
    cursor: pointer;
    background-color: #000 \9;
    background-color: rgba(0,0,0,0);
    border: 1px solid #aaa !important;
    border-radius: 2px !important;
}
.fade-carousel .carousel-indicators > li {
    margin: 0 2px;
    background-color: slategray;
     border-color: slategray;
    opacity: 1;
}
.fade-carousel .carousel-indicators > li.active {
  width: 15px;
  height: 15px;
  border-radius: 50px !important;
  opacity: 1;
}

/********************************/
/*          Hero Headers        */
/********************************/
.hero {
    position: absolute;
    top: 50%;
    left: 50%;
    z-index: 3;
    color: #fff;
    text-align: center;
    /*text-transform: uppercase;*/
    text-shadow: 1px 1px 0 rgba(0,0,0,.75);
      -webkit-transform: translate3d(-50%,-50%,0);
         -moz-transform: translate3d(-50%,-50%,0);
          -ms-transform: translate3d(-50%,-50%,0);
           -o-transform: translate3d(-50%,-50%,0);
              transform: translate3d(-50%,-50%,0);
}
.hero h1 {
    
    font-size: 12em;
    font-family:'Great Vibes', cursive;
    color: #fff;
    text-shadow: 0px 3px 20px #000;
    font-weight: inherit;
    margin: 0;
    padding: 0;
}

.fade-carousel .carousel-inner .item .hero {
    opacity: 0;
    -webkit-transition: 2s all ease-in-out .1s;
       -moz-transition: 2s all ease-in-out .1s; 
        -ms-transition: 2s all ease-in-out .1s; 
         -o-transition: 2s all ease-in-out .1s; 
            transition: 2s all ease-in-out .1s; 
}
.fade-carousel .carousel-inner .item.active .hero {
    opacity: 1;
    -webkit-transition: 2s all ease-in-out .1s;
       -moz-transition: 2s all ease-in-out .1s; 
        -ms-transition: 2s all ease-in-out .1s; 
         -o-transition: 2s all ease-in-out .1s; 
            transition: 2s all ease-in-out .1s;    
}

/********************************/
/*            Overlay           */
/********************************/
.overlay {
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: 2;
    background-color: #080d15;
    opacity: .7;
}

/********************************/
/*          Custom Buttons      */
/********************************/
.btn.btn-lg {padding: 10px 40px;}
.btn.btn-hero,
.btn.btn-hero:hover,
.btn.btn-hero:focus {
    color: #f5f5f5;
    background-color: #1abc9c;
    border-color: #1abc9c;
    outline: none;
    margin: 20px auto;
}

/********************************/
/*       Slides backgrounds     */
/********************************/
.fade-carousel .slides .slide-1, 
.fade-carousel .slides .slide-2,
.fade-carousel .slides .slide-3 {
  height: 100vh;
  background-size: cover;
  background-position: center center;
  background-repeat: no-repeat;
}
.fade-carousel .slides .slide-1 {
  background-image: url(assets/images/b9.jpg); 
}
.fade-carousel .slides .slide-2 {
  background-image: url(assets/images/h33.jpg);
}
.fade-carousel .slides .slide-3 {
  background-image: url(assets/images/h2.jpg);
}

/********************************/
/*          Media Queries       */
/********************************/
@media screen and (min-width: 980px){
    .hero { width: 980px; }    
}
@media screen and (max-width: 640px){
    .hero h1 { font-size: 4em; }    
}
</style>
			
			<div class="content-block" id="portfolio">
				<div class="container">
					<header class="block-heading cleafix">
						
							
					<!-- logo -->
                
					<!-- /logo -->
                </div>

				<!-- main nav -->
                

<style>
	.navbar {
    -webkit-transition: all 0.6s ease-out;
    -moz-transition: all 0.6s ease-out;
    -o-transition: all 0.6s ease-out;
    -ms-transition: all 0.6s ease-out;
    transition: all 0.6s ease-out;
    border-radius: 0px;
}




/*-------- don't use this css its for only top margin   ----------------------*/

.margintop{ margin-top:20px;}

</style>
    
    		</header>
					<div class="ovrly">
		<div class="content-block parallax" id="services" style="padding: 0px !important;">
				<div class="container-fluid text-center hvr"  >

					<header class="block-heading cleafix" id="portfolio">
					<div class="container" id="portfolio">
						<h1 style="font-size: 5em;">About The Studio</h1>
						<p>We are a team of creative minds trying to make your events an experience to be relished. We are based in Surat | Gujarat and covering photography aspects all over. Our team consists of experienced and creative photographers and designers.</p>
          
						<p>Our vision is to improve the wedding experience of couples everywhere with innovative services and consistent delivery in a professional way.
						 
						Do contact us if you are looking for creating good memories.</p></div>

						<center><img src="assets/images/log.png" class="img-responsive" widt0px"></center>
					</header>
					<section class="block-body">
						<div class="row">
							<div class="col-md-4">
								<div class="service" style="text-align: center;">
									<i class="fa fa-send-o"></i>
									<h2>Our Vision</h2>
									<p>In at accumsan risus. Nam id volutpat ante. Etiam vel mi mattis, vulputate nunc nec, sodales nibh. Etiam nulla magna, gravida eget ultricies sit amet, hendrerit in lorem.</p>
								</div>
							</div>
							<div class="col-md-4">
								<div class="service"  style="text-align: center;">
									<i class="fa fa-heart-o"></i>
									<h2>What We Do</h2>
									<p>In at accumsan risus. Nam id volutpat ante. Etiam vel mi mattis, vulputate nunc nec, sodales nibh. Etiam nulla magna, gravida eget ultricies sit amet, hendrerit in lorem.</p>
								</div>
							</div>
							<div class="col-md-4">
								<div class="service"  style="text-align: center;">
									<i class="fa fa-camera-retro"></i>
									<h2>Why SPC</h2>
									<p>In at accumsan risus. Nam id volutpat ante. Etiam vel mi mattis, vulputate nunc nec, sodales nibh. Etiam nulla magna, gravida eget ultricies sit amet, hendrerit in lorem.</p>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div><!-- #services -->
			</div>
			<div class="content-block" id="testimonial">
				<div class="container text-center">
					<header class="block-heading cleafix">
					<style type="text/css">
						.text-center {
							
						    text-align: center !important;
						    text-shadow: 34px;
						    

						}

					</style>
					</header>


					<div style="margin-top: 50px; font-size: 50px; font-style: italic;color: #fff;" class="show" >
					
<div class="row">
      <div class="col-md-8 col-md-offset-2">
                <div class="quote"><i class="fa fa-quote-left fa-4x"></i></div>
        <div class="carousel slide" id="fade-quote-carousel" data-ride="carousel" data-interval="3000">
          <!-- Carousel indicators -->
                  <ol class="carousel-indicators">
            <li data-target="#fade-quote-carousel" data-slide-to="0"></li>
            <li data-target="#fade-quote-carousel" data-slide-to="1"></li>
            <li data-target="#fade-quote-carousel" data-slide-to="2" class="active"></li>
                    <li data-target="#fade-quote-carousel" data-slide-to="3"></li>
                    <li data-target="#fade-quote-carousel" data-slide-to="4"></li>
                    <li data-target="#fade-quote-carousel" data-slide-to="5"></li>
          </ol>
          <!-- Carousel items -->
          <div class="carousel-inner">
            <div class="item">
                        <div class="profile-circle" style="background-color: rgba(0,0,0,.2);"></div>
              <blockquote>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
              </blockquote> 
            </div>
            <div class="item">
                        <div class="profile-circle" style="background-color: rgba(77,5,51,.2);"></div>
              <blockquote>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
              </blockquote>
            </div>
            <div class="active item">
                        <div class="profile-circle" style="background-color: rgba(145,169,216,.2);"></div>
              <blockquote>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
              </blockquote>
            </div>
                    <div class="item">
                        <div class="profile-circle" style="background-color: rgba(77,5,51,.2);"></div>
                <blockquote>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
              </blockquote>
            </div>
                    <div class="item">
                        <div class="profile-circle" style="background-color: rgba(77,5,51,.2);"></div>
                <blockquote>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
              </blockquote>
            </div>
                    <div class="item">
                        <div class="profile-circle" style="background-color: rgba(77,5,51,.2);"></div>
                <blockquote>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
              </blockquote>
            </div>
          </div>
        </div>
      </div>              
    </div>

          </div>

					<section class="block-body">
					</section>
				</div>
			</div>

<!--galleryyy-->
 <div class="content">
        <div align="center">
           <div class="heading">
        <h2>Our <strong>Services</strong></h2>
       
    </div>
           <!-- <button class="btn btn-default filter-button" data-filter="spray">Spray Nozzle</button>
            <button class="btn btn-default filter-button" data-filter="irrigation">Irrigation Pipes</button>-->
        </div>
            
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){

    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        
        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            
        }
    });
    
    if ($(".filter-button").removeClass("active")) {
$(this).removeClass("active");
}
$(this).addClass("active");

});
</script>

			<div class="content-block" id="photos" style="padding: 7rem 30px;">
				<div class="">
					<section class="block-body">
						<div class="row">
							<div class="col-sm-4  filter hdpe">
								<a href="#" class="recent-work" style="background-image:url(assets/images/pre.jpg);box-shadow: 0px 0px 97px #000;">
									<span class="btn btn-o-white">pre-wedding</span>
								</a>
							</div>
							<div class="col-sm-4 filter sprinkle" >
								<a href="#" class="recent-work" style="background-image:url(assets/images/c2.jpg);box-shadow: 0px 0px 97px #000;">
									<span class="btn btn-o-white">wedding</span>
								</a>
							</div>
							<div class="col-sm-4 filter sprinkle">
								<a href="#" class="recent-work" style="background-image:url(assets/images/pp.jpg);box-shadow: 0px 0px 97px #000;">
									<span class="btn btn-o-white">Lorem Rocks</span>
								</a>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4 ilter irrigation">
								<a href="#" class="recent-work" style="background-image:url(assets/images/bbbb.jpg);box-shadow: 0px 0px 97px #000;">
									<span class="btn btn-o-white">Lorem Rocks</span>
								</a>
							</div>
							<div class="col-sm-4 filter spray">
								<a href="#" class="recent-work" style="background-image:url(assets/images/mn.jpg);box-shadow: 0px 0px 97px #000;">
									<span class="btn btn-o-white">events & exhibitions</span>
								</a>
							</div>
							<div class="col-sm-4">
								<a href="#" class="recent-work" style="background-image:url(assets/images/im.jpg);box-shadow: 0px 0px 97px #000;">
									<span class="btn btn-o-white">baby</span>
								</a>
							</div>
						</div>
					</section>
				</div>
			</div><!-- #portfolio -->

<!--service -->
	<div class="row" class="block-my" id="h11" >

</div>
<!--=============================
                 teams1
=================================-->
<!--
Bootstrap Line Tabs by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
-->

<div class="container content">
    <div class="heading">
        <h2>Our <strong>Great Team</strong></h2>
       
    </div><!-- //end heading -->

  <div class="row">
        <?php
            $sql="SELECT * FROM wed_teams";
            $res=mysqli_query($con,$sql);
            while($row=mysqli_fetch_array($res))
            {   
        ?>
        <div class="col-sm-4">
            <div class="team-members">
                <div class="team-avatar">
                  <img src="admin-cp/uploaded/teams/<?php echo $row['img']; ?>">
                 </div>
                <div class="team-desc">
                    <h4><?php echo $row['name']; ?></h4>
                    <span><?php echo $row['designation']; ?></span>
                </div>
            </div>
        </div>
        <?php  }  ?>
        
    </div><!-- //end row -->
</div>

<br>


<!--=============================
                 teams2
=================================-->
<!--<section id="Teams" class="team row" > 
					<div class="container">
				<div class="title-start team-menu col-md-4 col-md-offset-4" >
					<h2 class="team-heading">Our Team</h2>
					<p class="sub-text">Meet the greatest Team of Themewagon</p>
				</div>
				</div>
					<div class="team-member row">
					<div class="col-md-3 col-sm-6 member">
						<img class="blog-image" src="assets/images/russs.jpg" width="100%" height="280" alt="Blog Image 2"/>
						<p class="name-member" style="text-align: center;">Jon Doe, CEO</p>
					    
					   
					</div>
					<div class="col-md-3 col-sm-6 member">
						<img class="blog-image" src="assets/images/testimonial_31-190x190.jpg" width="100%" height="280" alt="Blog Image 2"/>
					    <p class="name-member" >Jon Doe, Head of Ideas</p>
					   
					    
					</div>
					<div class="col-md-3 col-sm-6 member">
						<img class="blog-image" src="assets/images/testimonial_11-190x190.jpg" width="100%" height="280" alt="Blog Image 2"/>
					    <p class="name-member">Jon Doe, Chief Developer</p>
					   
					   
					</div>
					<div class="col-md-3 col-sm-6 member">
						<img class="blog-image" src="assets/images/testimonial2.jpg" width="100%" height="280" alt="Blog Image 2"/>
						<p class="name-member">Jon Doe, Event Manager</p>
					    
					  
					</div>
					</div>

				</section>
				</div></div>
-->

<!--==================snippest============-->


</div></div>
<!--<div class="container-fluid demo acc">
<h1 style="text-align: center;">Frequently <ins>asked</ins> Questions</h1>
    
    <div class="panel-group" id="parallax" role="tablist" aria-multiselectable="true">

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">

                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    
                        <i class="more-less glyphicon glyphicon-plus"></i>
                        Collapsible Group Item #1
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                        Collapsible Group Item #2
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                        Collapsible Group Item #3
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>-->

    </div><!-- panel-group -->
    
    
</div><!-- container -->


<?php include_once'./footer.php' ?>