<?php include_once './header.php'; include_once './config.php';?>
<!--============form.php=============-->
<?php
if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $Contact = trim($_POST['Contact']);
    $email = trim($_POST['email']);
    $choose = trim($_POST['choose']);
    $date_from = trim($_POST['date_from']);
    $date_to = trim($_POST['date_to']);
    $city = trim($_POST['city']);
    $story = trim($_POST['story']);

    $sql = "INSERT INTO `contact`(`Name`, `Phone`, `Email`, `Category`, `Date_From`, `Date_To`, `Vanue`, `Message`) VALUES (
    '".$name."','".$Contact."','".$email."','".$choose."','".$date_from."','".$date_to."','".$city."','".$story."')";
    $res = mysqli_query($con,$sql);
    if ($res > 0) {
        ?>
        <script type="text/javascript">
            alert("Thank you for Contact us..");window.location = 'index.php';
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            alert("Oops.. Something is Wrong....!");window.location = 'index.php';
        </script>
        <?php
    }
}
?>
<!--==============join.php=============-->
<?php
if (isset($_POST['join_us_spc'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $category = $_POST['category'];
    $location = $_POST['location'];

    $q1 ="INSERT INTO `join_us`(`Name`, `Phone`, `Email`, `Category`, `Location`) VALUES('".$name."','".$phone."',
    '".$email."','".$category ."','".$location."')";
    
    $join_spc=mysqli_query($con,$q1);
    if ($join_spc > 0) 
    {
      ?>
        <script type="text/javascript"> 
            alert("Thank you for Join Us.");
            window.location='<?php echo $_SERVER['PHP_SELF']; ?>'; 
        </script>
      <?php  
    } 
    else 
        {  ?>
        <script type="text/javascript">
            alert("Oops...Something is wrong...!");
            window.location='<?php echo $_SERVER['PHP_SELF']; ?>'; 
        </script>
    <?php
         }
}
?>
<!--=============jquery======-->

<!--==============contacts=================-->
<style type="text/css">
    .n-hdr
    {
    font-size: 40px;
    font-weight: 500;
    margin: 0 0 20px;
    color: #fff !important;
    text-shadow: 1px 2px 10px #000;
    margin: 30px 0px 0px -20px !important;
    }
</style>
<div class="content-block" id="contact">
    <div class="container text-center">
        <header class="block-heading cleafix">
            <div align="center">
                <div class="heading">
                    <h2 class="n-hdr">Get <strong>Quote</strong></h2>
                </div>
            </div>
<!--<p id="pp" >Tell us your story.</p>-->
        </header>
        <section class="block-body">
            <div class="row" style="background: rgba(55,55,55,0.6);padding: 60px 0px;}">
                <div class="col-md-6 col-md-offset-3">
                    <form class="" role="form" method="POST">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control form-control-white" id="subject" placeholder="Name" required></div>
                        <div class="form-group">
                            <input type="text" name="Contact" class="form-control form-control-white" id="subject" placeholder="Phone" required></div>
                        <div class="form-group">
                            <input type="email"  name="email" class="form-control form-control-white" id="subject" placeholder="E-mail" required></div>
                        <div class="form-group">
                            <select class="form-control form-control-white" id="subject" name="choose" >
                                <option value="">Select Option</option>
                                <option value="Baby Shoot">Baby Shoot</option>
                                <option value="Baby Shower">Baby Shower</option>
                                <option value="Wedding">Wedding</option>
                                <option value="Pre-Wedding">Pre-Wedding</option>
                                <option value="Engagement & Candid's">Engagement & Candid's</option>
                                <option value="Fashion Show">Fashion Show</option>
                                <option value="Event & Exhibition">Event & Exhibition</option>
                                <option value="Home Warming Ceremony">Home Warming Ceremony</option>
                                <option value="Portfolio Shoot">Portfolio Shoot</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div>
                                <div class="col-md-6" style="padding:0px !important;">
                                <input class="form-control form-control-white" type="text" id="datepicker" name="date_from" placeholder="From Date"/><span class="date-text date-depart"></span>
                              </div>
                              <div class="col-md-6" style="padding:0px !important;">
                                <input class="form-control form-control-white" type="text" id="datepicker1" name="date_to" placeholder="To Date"/><span class="date-text date-return"></span>
                              </div>
                            </div>
                        </div>
                        <link rel="stylesheet" href="assets/css/pikaday.css">
                        <script src="assets/js/pikaday.js"></script>
                            <script>

                            var picker = new Pikaday(
                            {
                                field: document.getElementById('datepicker'),
                                firstDay: 1,
                                minDate: new Date(),
                                maxDate: new Date(2020, 12, 31),
                                yearRange: [2000,2020]
                            });
                            
                            var picker = new Pikaday(
                            {
                                field: document.getElementById('datepicker1'),
                                firstDay: 1,
                                minDate: new Date(),
                                maxDate: new Date(2020, 12, 31),
                                yearRange: [2000,2020]
                            });

                            </script>
                        <div class="form-group">
                            <input type="text" name="city" class="form-control form-control-white" id="subject" placeholder="Venus/Location/City of the event" required style="padding:25px 15px !important;">
                        </div>
                            
                        <div class="form-group">
                            <textarea class="form-control form-control-white"  name="story" placeholder="Write Something" required></textarea>
                        </div>
                        <input type="submit" class="btn btn-o-white btn-block" value="send" name="submit">
                    </form>
                </div>
            </div>
        </section>
    </div>
</div><!-- #contact -->

<!--===========================
            join as
=============================-->


<section class="block-body" id="join">
    <div class="container-fluid">
        <div class="row" id="join">
            <div class="col-md-6 col-md-offset-3">
                <form class="" role="form" method="POST">
                    <div>
                        <div class="heading">
                            <h2>Work with<strong> Us</strong></h2>
                        </div>
                         <div class="form-group">
                            <input type="text" name="name" class="form-control form-control-black" id="subject" placeholder="Name" required></div>
                        <div class="form-group">
                            <input type="phone" name="phone" class="form-control form-control-black" id="subject" placeholder="Phone Number" required></div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control form-control-black" id="subject" placeholder="email" required></div>
                             <div class="form-group">
                            <select class="form-control form-control-black" id="subject" name="category">
                                <option value="">Select Option</option>
                                <option value="Videography" >Videography </option>
                                <option value="Photo graphy">Photography </option>
                                <option value="Videography" >Both </option>
                                <option value="Photo graphy">Others </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea name="location" class="form-control form-control-black" id="subject" placeholder="Location" required></textarea> 
                        </div>
                        <input type="submit" class="btn btn-o-black btn-block" value="send" name="join_us_spc"></div>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script>

// Make your own here: https://eternicode.github.io/bootstrap-datepicker

var dateSelect = $("#flight-datepicker");
var dateDepart = $("#start-date");
var dateReturn = $("#end-date");
var spanDepart = $(".date-depart");
var spanReturn = $(".date-return");
var spanDateFormat = "ddd, MMMM D yyyy";

dateSelect.datepicker({
  autoclose: true,
  format: "dd/mm/yy",
  maxViewMode: 0,
  startDate: "now"
})
  .on("change", function() {
  var start = $.format.date(dateDepart.datepicker("getDate"), spanDateFormat);
  var end = $.format.date(dateReturn.datepicker("getDate"), spanDateFormat);
  spanDepart.text(start);
  spanReturn.text(end);
});


</script>


<!--====================Details=========-->


    <div class="content-block parallax" id="services" style="padding: 0px !important;">
        <div class="container-fluid text-center con" >

            <header class="block-heading cleafix">
                <div>
                    <h1 style="font-size: 5em;  font-weight: 600;">keep in touch</h1>
                    <h1 style="font-size: 23px; font-family: 'Bellefair', serif; ">Do contact us if you are looking for creating good memories.</h1>
                </div>
            </header>

            <section class="block-body" >
                <div class="row">
                    <div class="col-md-2">
                        <div class="service">
                            <h1 style="font-weight: 600;">Contact</h1>
                            <p><i class="fa fa-phone" style="font-size: 20PX;"> &nbsp; +91 &nbsp;97272 20481</i></p>
                            <i class="fa fa-phone" style="font-size: 20PX;"> &nbsp; +91 &nbsp;99986 20481</i>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="service">
                            <h1 style="font-weight: 600;">Address</h1>
                            <address>
                               <li>A-4, 303,L B PARK, Besides Abhishek Restaurant,</li>
                               <li>Opp Bhavik Complex Ghod Dod Road,</li>
                               <li> Surat 395007. </li>
                            </address>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="service">
                            <h1 style="font-weight: 600;">email</h1>
                             <p style="margin-top: 0px;"><i class="glyphicon glyphicon-envelope"  style="font-size: 20PX;"> &nbsp;aneeket.spcian@gmail.com</i></p>
                            <i class="glyphicon glyphicon-envelope"  style="font-size: 20PX; text-align: left;">  &nbsp;imspcian@gmail.com</i>
                        </div>
                    </div>

                     <div class="col-md-3">
                        <div class="socials-area">
                            <h1 style="font-weight: 600;">Social Media</h1>
                             <ul class="social-links">
                             <a href="#"><i class="fa fa-2x fa-facebook-official" aria-hidden="true"></i></a>
                             <a href="#"><i class="fa fa-2x fa-instagram" aria-hidden="true"></i></a>
                             <a href="#"><i class="fa fa-2x fa-youtube-play" aria-hidden="true"></i></a>
                             <a href="#"><i class="fa fa-2x fa-google-plus" aria-hidden="true"></i></a>
                             </ul>
                        </div>
                    </div>
                        </div>
                        </section>
                    </div>
                    <div class="content-block" id="footer">
                        <div class="container">
                            <div class="row">
                                <div class="row">
                                    <div class="col-xs-6">&copy; Copyright SPC Studio 2017</div>
                                    <div class="col-xs-6 text-right">Developed by : <a href="https://intelliworkz.com/" target="_blank" class="d-by">&nbsp;Intelliworkz.com</a></div>
                                </div>
                            </div>
                        </div><!-- #footer -->
                    </div><!--/#wrapper-->
                    
                    <!-- <script src="assets/js/jquery-migrate-1.2.1.min.js"></script> -->
                    <script src="assets/js/bootstrap.min.js"></script>
                    <script src="assets/js/script.js"></script>

                    </body>
                    </html>
