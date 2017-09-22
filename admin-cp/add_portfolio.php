<title>SPC | Portfolio</title>
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

if(isset($_POST['wed_add_portfolio']))
{
    $port_cat=$_POST['main_cat'];
    $desc=$_POST['desc'];
    $photo=$_FILES['port_photo']['name']; 
    $target_dir = "uploaded/portfolio/";
    $target_file = $target_dir . basename($_FILES['port_photo']['name']);

    move_uploaded_file($_FILES["port_photo"]["tmp_name"],$target_file);

    $ins_port="INSERT INTO `gallery`(`main_cat`,`photos`,`desc`) VALUES('$port_cat','$photo','$desc')";
              
    $exe=mysqli_query($con,$ins_port);
    
    if($exe > 0){
        ?>
        <script>
            alert('Added Portfolio Successfully');
            window.location='add_portfolio.php';
        </script>    
        <?php
    }
    else{
        ?>
        <script>
            alert('Failed to add Portfolio');
            window.location='add_portfolio.php';
        </script>    
        <?php
    }
    
    
    
}


/******* Update Team ********/


if(isset($_POST['update_portfolio']))
{

    $main_cat=$_POST['main_cat'];
    $desc=$_POST['desc'];
    $port_photo=$_FILES['port_photo']['name']; 
    $target_dir = "uploaded/portfolio/";
    $target_file = $target_dir . basename($_FILES["port_photo"]["name"]);

    if(empty($port_photo))
    {
        $ins="UPDATE `gallery` SET `main_cat`='".$main_cat."',`desc`='".$desc."' WHERE port_id='".$_GET['edt']."'  ";
        $exe=mysqli_query($con,$ins);
    }
    else
    {
        /*==============unlink img=========*/
    $dl=mysqli_query($con,"select * from gallery WHERE port_id='".$_GET['edt']."'");
    $row_dl=mysqli_fetch_array($dl);
    unlink('uploaded/portfolio/'.$row_dl['photos']);

    move_uploaded_file($_FILES["port_photo"]["tmp_name"],$target_file);

    $ins="UPDATE `gallery` SET `main_cat`='".$main_cat."',`photos`='".$port_photo."',`desc`='".$desc."' WHERE port_id='".$_GET['edt']."'  ";
    $exe=mysqli_query($con,$ins);
    
    if($exe){
        ?>
        <script>
            alert('Updated category Successfully');
            window.location='add_portfolio.php';
        </script>    
        <?php
    }
    else{
        ?>
        <script>
            alert('Failed to update category');
            window.location='add_portfolio.php';
        </script>    
        <?php
        }

    }
}

/******* delete Team ********/


if(isset($_GET['dlt']))
{

    $dlt_id=$_GET['dlt'];

    $q1=mysqli_query($con,"SELECT * from gallery WHERE port_id='".$_GET['dlt']."'");
    $q2=mysqli_fetch_array($q1);
    unlink("uploaded/portfolio/".$q2['photos']);
    $ins="DELETE FROM `gallery` WHERE port_id='".$dlt_id."'";
    $exe=mysqli_query($con,$ins);
    
    if($exe > 0){
        ?>
        <script>
            alert('Delete category Successfully');
            window.location='add_portfolio.php';
        </script>    
        <?php
    }
    else{
        ?>
        <script>
            alert('Failed to delete category');
            window.location='add_portfolio.php';
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
                            <h2>Add New Portfolio</h2>
                        </div>
                        <div class="body">
                       <?php 
                        if(isset($_GET['edt'])){
                            $edt_id=$_GET['edt'];

                            $edt="SELECT * FROM  gallery WHERE port_id='".$edt_id."'";
                            $exe_edt=mysqli_query($con,$edt);

                            $row=mysqli_fetch_array($exe_edt);
                        }
                        ?>
                                 <form id="form_validation" method="POST" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <select class="form-control show-tick" name="main_cat">
                                
                                        <option value="<?php if(isset($_GET['edt'])) {
                                        echo $row['main_cat']; } ?>"><?php if(isset($_GET['edt'])) {
                                        echo $row['main_cat']; }else{ ?>-- Select Category --<?php } ?></option>
                                        <?php 
                                            $select_cat="SELECT * FROM wed_category WHERE cat_status='active'";
                                            $exe_cat=mysqli_query($con,$select_cat);
                                            
                                            while($port=mysqli_fetch_array($exe_cat))
                                            {
                                            ?>
                                            <option class="form-control" value="<?php echo $port['id']; ?>"><?php echo $port['cat_name']; ?></option>
                                            <?php
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="file" class="form-control" name="port_photo" pattern="([^\s]+(\.(?i)(jpg|png|gif|bmp))$)"  value="" accept="image/jpg, image/jpeg, image/png" >

                                        <?php if(isset($_GET['edt'])) { ?>

                                        <img src="uploaded/portfolio/<?php if(isset($_GET['edt'])){ echo $row['photos']; } ?>" height="100px">   <?php } ?>
<!--                                        <label class="form-label">Upload Photo</label>-->
                                    </div>
                                    <div class="help-info">Upload Only jpg | jpeg | png Files.</div>
                                </div>
                                
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea class="form-control" name="desc" required><?php if(isset($_GET['edt'])) { echo $row['desc']; } ?></textarea>
                                        <label class="form-label">Description</label>
                                    </div>
                                </div>

                                 <?php 
                                if(isset($_GET['edt']))
                                {
                                    ?>
                                    <input class="btn btn-primary waves-effect" type="submit" value="Update portfolio" name="update_portfolio">
                                    <?php
                                }
                                else{
                                ?>
                                  <input class="btn btn-primary waves-effect" type="submit" value="Add Portfolio" name="wed_add_portfolio">
                                <?php } ?>
                                
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
          
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Portfolio Table
                            </h2>
                        </div>
                        
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>port_id</th>
                                            <th>main_cat</th>
                                            <th>photos</th>
                                            <th>desc</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                         $sql="SELECT * FROM `gallery`";
                                         $res=mysqli_query($con,$sql);
                                         while($row=mysqli_fetch_array($res))
                                         {
                                    ?>

                                        <tr>
                                            <td><?php echo $row['port_id']; ?></td>
                                            <td><?php echo $row['main_cat']; ?></td>
                                            <td><img src="uploaded/portfolio/<?php echo $row['photos']; ?>" height="80"></td>
                                            <td><?php echo $row['desc']; ?></td>
                                           
                                            <td><a href="add_portfolio.php?edt=<?php echo $row['port_id']; ?>"><button class="btn btn-info"><i class="material-icons">edit</i></button></a>&nbsp;
                                            <a href="add_portfolio.php?dlt=<?php echo $row['port_id']; ?>" onclick="return confirm('Are you Sure to Delete?');"><button class="btn btn-danger"><i class="material-icons">delete</i></button></a></td>
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
           
        </div>
    </section>
    



<?php  include_once './footer.php';?>