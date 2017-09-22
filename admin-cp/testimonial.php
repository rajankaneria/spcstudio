<title>SPC | Testimonial</title>
<link href="assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="assets/css/themes/all-themes.css" rel="stylesheet" />
<?php 
session_start();
include_once './header.php';
include_once './config.php';

if(isset($_POST['wed_add_test']))
{
    $cat_nm=$_POST['cat_name'];
    /*$cat_desc=$_POST['cat_desc'];*/
    $cat_desc =str_replace("'","\'",$_POST['cat_desc']);
    $status=$_POST['cat_status'];
     $photo=$_FILES['cat_photo']['name']; 
    $target_dir = "uploaded/testimonial/";
    $target_file = $target_dir . basename($_FILES["cat_photo"]["name"]);

    move_uploaded_file($_FILES["cat_photo"]["tmp_name"],$target_file);
    
    $ins="INSERT INTO  testimonial (Name,Description,image) VALUES ('".$cat_nm."','".$cat_desc."','".$photo."')";



    $exe=mysqli_query($con,$ins);
    
    if($exe){
        ?>
        <script>
            alert('Added  Successfully');
            window.location='testimonial.php';
        </script>    
        <?php
    }
    else{
        ?>
        <script>
            alert('Failed to add');
            window.location='testimonial.php';
        </script>    
        <?php
    }
}

/*=============update==============*/
   if(isset($_POST['t_update']))
   {
      $cat_name=$_POST['cat_name'];
      $cat_desc=$_POST['cat_desc'];
      $photo=$_FILES['cat_photo']['name']; 
      $target_dir = "uploaded/testimonial/";
      $target_file = $target_dir . basename($_FILES["cat_photo"]["name"]);

    if(empty($photo))
    {

         $q1="UPDATE `testimonial` SET `Name`='".$cat_name."',`Description`='".$cat_desc."' WHERE t_id='".$_GET['edt']."'";
         $q2=mysqli_query($con,$q1);
    }
    else
    {
        $dl="SELECT * FROM testimonial WHERE t_id='".$_GET['edt']."'";
        $q1=mysqli_query($con,$dl);
        $r_dl=mysqli_fetch_array($q1);
        unlink('uploaded/testimonial/'.$r_dl['image']);
         move_uploaded_file($_FILES["cat_photo"]["tmp_name"],$target_file);
        $q1="UPDATE testimonial SET Name='$cat_name', Description='$cat_desc', image='$photo' WHERE t_id='".$_GET['edt']."'";
        $q2=mysqli_query($con,$q1);
         if($q2){
            ?>
            <script>
                alert('Updated Testimonial Successfully');
                window.location='testimonial.php';
            </script>    
            <?php
        }
        else{
            ?>
            <script>
                alert('Failed to update Testimonial');
                window.location='testimonial.php';
        </script> 
           <?php
    }
  }    
}
/*============= End update==============*/

/*=============delete================*/

    if(isset($_GET['dlt']))
    {
        $dlt=$_GET['dlt'];

            $q1=mysqli_query($con,"SELECT * from testimonial WHERE t_id='".$_GET['dlt']."'");
            $q2=mysqli_fetch_array($q1);
            unlink("uploaded/testimonial/".$q2['image']);
                $s1="DELETE FROM `testimonial` WHERE t_id='".$dlt."'";
                $s2=mysqli_query($con,$s1);
                if($s2)
                {   ?>
                <script>
                    alert('Delete category Successfully');
                    window.location='testimonial.php';
                </script>    
                <?php
            }
            else{
                ?>
                <script>
                    alert('Failed to delete category');
                    window.location='testimonial.php';
                </script>    
                <?php
        }

}
    
/*=============end delete================*/
?>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                
            </div>
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Add Testimonial</h2>
                        </div>
                        <div class="body">
                        <?php 
                            if(isset($_GET['edt']))
                            {
                                $g_id=$_GET['edt'];
                                $sql="SELECT * FROM  testimonial WHERE t_id='$g_id'";
                                $res=mysqli_query($con,$sql);
                                $roww=mysqli_fetch_array($res);
                            }
                        ?>
                            <form id="form_validation" method="POST" enctype="multipart/form-data">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="cat_name" value="<?php if(isset($_GET['edt'])){ echo $roww['Name']; } ?>" required>
                                        <label class="form-label">Name</label>
                                    </div>
                                </div>

                                 <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea minlength="1" maxlength="50000"  class="form-control" name="cat_desc" required><?php if(isset($_GET['edt'])) {
                                            echo $roww['Description']; } ?></textarea>
                                        <label class="form-label">Description</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="file" class="form-control" name="cat_photo" pattern="([^\s]+(\.(?i)(jpg|png|gif|bmp))$)" accept="image/jpg, image/jpeg, image/png">
                                        <?php if(isset($_GET['edt'])) { ?>
                                        <img src="uploaded/testimonial/<?php echo $roww['image']; ?>" height="100px">
                                        <?php } ?>
<!--                                        <label class="form-label">Upload Photo</label>-->
                                    </div>
                                    <div class="help-info">Upload Only jpg | jpeg | png Files.</div>
                                </div>
                                <?php 
                                    if(isset($_GET['edt']))
                                    {
                                        ?>
                                         <input class="btn btn-primary waves-effect" type="submit" value="Update Testimonial" name="t_update">
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                         <input class="btn btn-primary waves-effect" type="submit" value="Add category" name="wed_add_test">
                                        <?php
                                    }
                                ?>
                                 </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Validation -->
            <!-- Advanced Validation -->
            
            <!-- #END# Advanced Validation -->
            <!-- Validation Stats -->
            
            <!-- #END# Validation Stats -->
        </div>
    </section>
 <!-- Basic Examples -->
 <section class="content">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TESTIMONIAL TABLE
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">

                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Description</th>
                                            <th>Actions</th>
                                           
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php 

                                        $sql="SELECT * FROM testimonial";
                                        $res=mysqli_query($con,$sql);
                                        while ($row=mysqli_fetch_array($res)) {
                                            ?>

                                        <tr>
                                            <td><?php echo $row['t_id']; ?></td>
                                            <td><?php echo $row['Name']; ?></td>
                                            <td><img src="uploaded/testimonial/<?php echo $row['image']; ?>" height="80"></td>
                                            <td><?php echo $row['Description']; ?></td>

                                            
                                            <td>
                                             &nbsp;<a href="testimonial.php?edt=<?php echo $row['t_id'];?>"><button class="btn btn-info"><i class="material-icons">edit</i></button></a>
                                                &nbsp;<a href="testimonial.php?dlt=<?php echo $row['t_id'];?>" onclick="return confirm('Are You Sure to Delete?');"><button class="btn btn-danger"><i class="material-icons">delete</i></button></a></td>
                                            
                                        </tr>
                                         <?php
                                        }

                                        ?>
                                        
                                        
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </section>
            <!-- #END# Basic Examples -->

<?php include_once'./footer.php'; ?>