<title>SPC | Admin</title>

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

if(isset($_POST['wed_add_banner']))
{
    $status=$_POST['ban_status'];
    $photo=$_FILES['ban_photo']['name']; 
    $target_dir = "uploaded/Home_bannner/";
    $target_file = $target_dir . basename($_FILES["ban_photo"]["name"]);

    move_uploaded_file($_FILES["ban_photo"]["tmp_name"],$target_file);

    $ins="INSERT INTO `home_banner`(`ban_image`, `ban_status`) VALUES ('".$photo."','".$status."')";
    $exe=mysqli_query($con,$ins);
    
    if($exe){
        ?>
        <script>
            alert('Added Home Bannner Successfully');
            window.location='add_home_banners.php';
        </script>    
        <?php
    }
    else
    {
        ?>
        <script>
            alert('Failed to add Home Banner');
            window.location='add_home_banners.php';
        </script>    
        <?php
    }
}
if(isset($_POST['wed_up_banner']))
{
    $status=$_POST['ban_status'];
    $photo=$_FILES['ban_photo']['name'];
    $target_dir="uploaded/Home_bannner/";
     $target_file=$target_dir.basename($_FILES['ban_photo']['name']);
    /*====================unlink=======================*/
    if(empty($photo))
    {
        $ban_up=mysqli_query($con,"UPDATE `home_banner` SET `ban_status`='".$status."' WHERE ban_id='".$_GET['edt']."'"); 
    }
    else
    {

        $q1=mysqli_query($con,"SELECT * FROM home_banner WHERE ban_id='".$_GET['edt']."'");
        $ro=mysqli_fetch_array($q1);
        unlink("uploaded/Home_bannner/".$ro['ban_image']);
        move_uploaded_file($_FILES['ban_photo']['tmp_name'],$target_file);

        $ban_up=mysqli_query($con,"UPDATE `home_banner` SET `ban_image`='".$photo."',`ban_status`='".$status."' WHERE ban_id='".$_GET['edt']."'");
        if($ban_up)
        { ?>
            <script>
                alert('Update Home Bannner Successfully');
                window.location='add_home_banners.php';
            </script>    
            <?php
        }
        else
        {
            ?>
            <script>
                alert('Failed to Update Home Banner');
                window.location='add_home_banners.php';
            </script>    
            
        <?php } 
       
        }
}




if(isset($_GET['dlt'])){
    $dlt_id=$_GET['dlt'];

      $q1=mysqli_query($con,"SELECT * FROM home_banner WHERE ban_id='".$_GET['dlt']."'");

    $row_dlt=mysqli_fetch_array($q1);
    unlink("uploaded/Home_bannner/".$row_dlt['ban_image']);
    
    
    $dlt_data="DELETE FROM `home_banner` WHERE ban_id='".$dlt_id."'";
    $exe_data=mysqli_query($con,$dlt_data);

   
    if($exe_data > 0){
        ?>
        <script>
            alert('Record Deleted Successfully!');
            window.location='add_home_banners.php';
        </script>
        <?php
    }
    else
    {
    ?>
        <script>
            alert('Failed to Delete Record!');
            window.location='add_home_banners.php';
        </script>
    <?php    
    }
    
}

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
                            <h2>Add New Home Banner</h2>
                        </div>
                        <div class="body">
                        <?php
                            if(isset($_GET['edt']))
                            {
                                $ed=$_GET['edt'];
                                $sql="SELECT * FROM  home_banner WHERE ban_id='".$ed."'";
                                $sql2=mysqli_query($con,$sql);
                                $row=mysqli_fetch_array($sql2);
                            }
                        ?>
                            <form id="form_validation" method="POST" enctype="multipart/form-data">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="file" class="form-control" name="ban_photo" pattern="([^\s]+(\.(?i)(jpg|png|gif|bmp))$)" accept="image/jpg, image/jpeg, image/png">
                                        <?php if(isset($_GET['edt'])) { ?>
                                        <img src="uploaded/Home_bannner/<?php echo $row['ban_image']; ?>" height="100px">
                                        <?php } ?>
<!--                                        <label class="form-label">Upload Photo</label>-->
                                    </div>
                                    <div class="help-info">Upload Only jpg | jpeg | png Files.</div>
                                </div>
                                <div class="form-group">
                                    <input type="radio" name="ban_status" id="male" class="with-gap" checked="checked" value="active">
                                    <label for="male">Active</label>

                                    <input type="radio" name="ban_status" id="female" class="with-gap" value="deactive">
                                    <label for="female" class="m-l-20">Deactive</label>
                                </div>
                                <?php
                                if(isset($_GET['edt']))
                                {
                                    ?>
                                    <input class="btn btn-primary waves-effect" type="submit" value="update Banner" name="wed_up_banner">
                                    <?php
                                }
                                else
                                {
                                    ?> <input class="btn btn-primary waves-effect" type="submit" value="Add Banner" name="wed_add_banner">
                                    <?php
                                } ?>
                               
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
        
        
        
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Edit Home Banner</h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>HOME BANNER </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Banner Id</th>
                                            <th>Photo</th>
                                            <th>Banner Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php 
                                        $ban="SELECT * FROM `home_banner` WHERE ban_status='active'";
                                        $exe_ban=mysqli_query($con,$ban);
                                        while($ban_row=mysqli_fetch_array($exe_ban))
                                        {
                                        ?>
                                        <tr>
                                            <td><?php echo $ban_row['ban_id']; ?></td>
                                            <td><img src="uploaded/Home_bannner/<?php echo $ban_row['ban_image']; ?>" height="80"></td>
                                            <td><?php echo $ban_row['ban_image']; ?></td>
                                            <td><?php echo $ban_row['ban_status']; ?></td>
                                            <td>
                                                <a href="add_home_banners.php?edt=<?php echo $ban_row['ban_id']; ?>" onclick="return" >
                                                <button class="btn btn-primary"><i class="material-icons">edit</i></button></a>
                                                <a href="add_home_banners.php?dlt=<?php echo $ban_row['ban_id'];?>" onclick="return confirm('Are You Sure to Delete?');"><button class="btn btn-danger"><i class="material-icons">delete</i></button></a>



                                                </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div></section>
        
        
        
    
    <!-- Waves Effect Plugin Js -->
    
   <?php include_once './footer.php'; ?>

    <!-- Demo Js -->
    