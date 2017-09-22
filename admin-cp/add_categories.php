<title>SPC | Categories</title>
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

if(isset($_POST['wed_add_cat']))
{
    $cat_nm=$_POST['cat_name'];
    $cat_desc=$_POST['cat_desc'];
    $status=$_POST['cat_status'];
    $photo=$_FILES['cat_photo']['name']; 
    $target_dir = "uploaded/categories_photos/";
    $target_file = $target_dir . basename($_FILES["cat_photo"]["name"]);

    move_uploaded_file($_FILES["cat_photo"]["tmp_name"],$target_file);

    $ins="INSERT INTO wed_category(cat_name,cat_img,cat_desc,cat_status) VALUES('".$cat_nm."','".$photo."','".$cat_desc."','".$status."')";
    $exe=mysqli_query($con,$ins);
    
    if($exe){
        ?>
        <script>
            alert('Added category Successfully');
            window.location='add_categories.php';
        </script>    
        <?php
    }
    else{
        ?>
        <script>
            alert('Failed to add category');
            window.location='add_categories.php';
        </script>    
        <?php
    }
   
}
/*=====================  update  ============================*/
if(isset($_POST['update_team']))
{

     $cat_nm=$_POST['cat_name'];
    $cat_desc=$_POST['cat_desc'];
    $status=$_POST['cat_status'];
    $photo=$_FILES['cat_photo']['name']; 
    $target_dir = "uploaded/categories_photos/";
    $target_file = $target_dir . basename($_FILES["cat_photo"]["name"]);


    if(empty($photo))
    {
         $ins="UPDATE `wed_category` SET `cat_name`='".$cat_nm."',`cat_desc`='".$cat_desc."',`cat_status`='".$status."' WHERE id='".$_GET['edt']."' ";
    $exe=mysqli_query($con,$ins);
    
    }
   else
   {
   // Unlink Image from folder...

    $dl=mysqli_query($con,"SELECT * FROM wed_category WHERE id='".$_GET['edt']."'");
    $r_dl=mysqli_fetch_array($dl);

    unlink('uploaded/categories_photos/'.$r_dl['cat_img']);

    move_uploaded_file($_FILES["cat_photo"]["tmp_name"],$target_file);

    $ins="UPDATE `wed_category` SET `cat_name`='".$cat_nm."',`cat_img`='".$photo."',`cat_desc`='".$cat_desc."',`cat_status`='".$status."' WHERE id='".$_GET['edt']."' ";
    $exe=mysqli_query($con,$ins);
    
    if($exe){
        ?>
        <script>
            alert('Updated category Successfully');
            window.location='add_categories.php';
        </script>    
        <?php
    }
    else{
        ?>
        <script>
            alert('Failed to update category');
            window.location='add_categories.php';
        </script>    
        <?php
      }
    }
}

/******* delete Team ********/


if(isset($_GET['dlt']))
{

    $dlt_id=$_GET['dlt'];

    $q=mysqli_query($con,"SELECT * FROM wed_category WHERE id='".$_GET['dlt']."' ");
    $q3=mysqli_fetch_array($q);
    unlink("uploaded/categories_photos/".$q3['cat_img']);
    
    $ins="DELETE FROM wed_category WHERE id='".$dlt_id."'";
    $exe=mysqli_query($con,$ins);
    
    if($exe > 0){
        ?>
        <script>
            alert('Delete category Successfully');
            window.location='add_categories.php';
        </script>    
        <?php
    }
    else{
        ?>
        <script>
            alert('Failed to delete category');
            window.location='add_categories.php';
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
                            <h2>Add New Category</h2>
                        </div>
                        <div class="body">
                        <?php 
                        if(isset($_GET['edt'])){
                            $edt_id=$_GET['edt'];

                            $edt="SELECT * FROM wed_category WHERE id='".$edt_id."'";
                            $exe_edt=mysqli_query($con,$edt);

                            $row=mysqli_fetch_array($exe_edt);
                        }
                        ?>
                            <form id="form_validation" method="POST" enctype="multipart/form-data">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" value="<?php if(isset($_GET['edt'])){ echo $row['cat_name'];} ?>" name="cat_name" required>
                                        <label class="form-label">Category Name</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="file" class="form-control" name="cat_photo" pattern="([^\s]+(\.(?i)(jpg|png|gif|bmp))$)" accept="image/jpg, image/jpeg, image/png" >

                                        <?php 
                                        if(isset($_GET['edt'])) { 
                                            ?>
                                        <img src="uploaded/categories_photos/<?php echo $row['cat_img'];  ?> " height="100px">
                                        <?php } ?>
<!--                                        <label class="form-label">Upload Photo</label>-->
                                    </div>
                                    <div class="help-info">Upload Only jpg | jpeg | png Files.</div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea class="form-control" name="cat_desc" required><?php if(isset($_GET['edt'])){ echo $row['cat_desc'];} ?></textarea>
                                        <label class="form-label">Description</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="radio" name="cat_status" id="male" class="with-gap" checked="checked" value="active">
                                    <label for="male">Active</label>

                                    <input type="radio" name="cat_status" id="female" class="with-gap" value="deactive">
                                    <label for="female" class="m-l-20">Deactive</label>
                                </div>
                                <?php 
                                if(isset($_GET['edt']))
                                { ?>
                                <input class="btn btn-primary waves-effect" type="submit" value="Update category" name="update_team">
                                <?php }
                                else{ 
                                   ?>
                                    <input class="btn btn-primary waves-effect" type="submit" value="Add category" name="wed_add_cat">
                                <?php }?>
                               
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
                                Categories Table
                            </h2>
                        </div>
                        
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>cat_name</th>
                                            <th>cat_img</th>
                                            <th>cat_desc</th>
                                            <th>cat_status</th> 
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                         $sql="SELECT * FROM `wed_category`";
                                         $res=mysqli_query($con,$sql);
                                         while($row=mysqli_fetch_array($res))
                                         {
                                    ?>

                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['cat_name']; ?></td>
                                            <td><img src="uploaded/categories_photos/<?php echo $row['cat_img']; ?>" height="80"></td>
                                            <td><?php echo $row['cat_desc']; ?></td>
                                            <td><?php echo $row['cat_status']; ?></td>
                                            <td><a href="add_categories.php?edt=<?php echo $row['id']; ?>"><button class="btn btn-info"><i class="material-icons">edit</i></button></a>&nbsp;
                                            <a href="add_categories.php?dlt=<?php echo $row['id']; ?>" onclick="return confirm('Are you Sure to Delete?');"><button class="btn btn-danger"><i class="material-icons">delete</i></button></a></td>
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
    <?php include_once "footer.php"; ?>