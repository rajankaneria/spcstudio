<title>SPC | Admin</title>
 <link href="assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
 link href="assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

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

if(isset($_POST['add_team']))
{
    $nm=$_POST['name'];
    $team_status=$_POST['team_status'];
    $desig=$_POST['desig'];
    $status=$_POST['cat_status'];
    $photo=$_FILES['team_photo']['name']; 
    $target_dir = "uploaded/teams/";
    $target_file = $target_dir . basename($_FILES["team_photo"]["name"]);

    move_uploaded_file($_FILES["team_photo"]["tmp_name"],$target_file);

    $ins="INSERT INTO `wed_teams`(`name`, `img`, `designation`,`Status`) VALUES ('".$nm."','".$photo."','".$desig."','".$team_status."')";
    $exe=mysqli_query($con,$ins);
    
    if($exe){
        ?>
        <script>
            alert('Added category Successfully');
            window.location='add_team.php';
        </script>    
        <?php
    }
    else{
        ?>
        <script>
            alert('Failed to add category');
            window.location='add_team.php';
        </script>    
        <?php
    }
    
    
    
}
/******* Update Team ********/


if(isset($_POST['update_team']))
{

    $nm=$_POST['name'];
    $team_status=$_POST['team_status'];
    $desig=$_POST['desig'];
    $status=$_POST['team_status'];
    $photo=$_FILES['team_photo']['name']; 
    $target_dir = "uploaded/teams/";
    $target_file = $target_dir . basename($_FILES["team_photo"]["name"]);

    if(empty($photo))
    {
        $ins="UPDATE `wed_teams` SET `name`='".$nm."',`designation`='".$desig."',`status`='".$status."' WHERE    team_id='".$_GET['edt']."'  ";
        $exe=mysqli_query($con,$ins);
    }
    else
    {
        $dl=mysqli_query($con,"select * from wed_teams WHERE team_id='".$_GET['edt']."'");
        $row_dl=mysqli_fetch_array($dl);
        unlink('uploaded/teams/'.$row_dl['img']);

        move_uploaded_file($_FILES["team_photo"]["tmp_name"],$target_file);

        $ins="UPDATE `wed_teams` SET `name`='".$nm."',`img`='".$photo."',`designation`='".$desig."',`status`='".$status."' WHERE    team_id='".$_GET['edt']."'  ";
        $exe=mysqli_query($con,$ins);
        
        if($exe){
            ?>
            <script>
                alert('Updated category Successfully');
                window.location='add_team.php';
            </script>    
            <?php
        }
        else{
            ?>
            <script>
                alert('Failed to update category');
                window.location='add_team.php';
            </script>    
            <?php
        }
    }
}

/******* delete Team ********/


if(isset($_GET['dlt']))
{

    $dlt_id=$_GET['dlt'];
    $q1=mysqli_query($con,"SELECT * from wed_teams WHERE team_id='".$_GET['dlt']."'");
    $q2=mysqli_fetch_array($q1);
    unlink("uploaded/teams/".$q2['img']);
    
    $ins="DELETE FROM wed_teams WHERE team_id='".$dlt_id."'";
    $exe=mysqli_query($con,$ins);
    
    if($exe > 0){
        ?>
        <script>
            alert('Delete category Successfully');
            window.location='add_team.php';
        </script>    
        <?php
    }
    else{
        ?>
        <script>
            alert('Failed to delete category');
            window.location='add_team.php';
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
                            <h2>Add New Team</h2>
                        </div>
                        <div class="body">
                        <?php 
                        if(isset($_GET['edt'])){
                            $edt_id=$_GET['edt'];

                            $edt="SELECT * FROM wed_teams WHERE team_id='".$edt_id."'";
                            $exe_edt=mysqli_query($con,$edt);

                            $row=mysqli_fetch_array($exe_edt);
                        }
                        ?>
                            <form id="form_validation" method="POST" enctype="multipart/form-data">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="name" required value="<?php if(isset($_GET['edt'])){ echo $row['name'];} ?>">
                                        <label class="form-label">Name</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="file" class="form-control" name="team_photo" pattern="([^\s]+(\.(?i)(jpg|png|gif|bmp))$)" accept="image/jpg, image/jpeg, image/png">
                                        <?php if(isset($_GET['edt'])) { ?>
                                        <img src="uploaded/teams/<?php echo $row['img']; ?>" height="100px">
                                        <?php } ?>
<!--                                        <label class="form-label">Upload Photo</label>-->
                                    </div>
                                    <div class="help-info">Upload Only jpg | jpeg | png Files.</div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="desig" required value="<?php if(isset($_GET['edt'])){ echo $row['designation'];} ?>">
                                        <label class="form-label">Designation</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="radio" name="team_status" id="male" class="with-gap" checked="checked" value="active">
                                    <label for="male">Active</label>

                                    <input type="radio" name="team_status" id="female" class="with-gap" value="deactive">
                                    <label for="female" class="m-l-20">Deactive</label>
                                </div>
                                <?php 
                                if(isset($_GET['edt']))
                                {
                                    ?>
                                    <input class="btn btn-primary waves-effect" type="submit" value="Update Team" name="update_team">
                                    <?php
                                }
                                else{
                                ?>
                                <input class="btn btn-primary waves-effect" type="submit" value="Add Team" name="add_team">
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
                               TEAM TABLE
                            </h2>
                        </div>
                        
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Team_Id</th>
                                            <th>Name</th>
                                            <th>Images</th>
                                            <th>Designation</th>
                                            <th>Status</th> 
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                         $sql="SELECT * FROM `wed_teams` WHERE status='active'";
                                         $res=mysqli_query($con,$sql);
                                         while($row=mysqli_fetch_array($res))
                                         {
                                    ?>

                                        <tr>
                                            <td><?php echo $row['team_id']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><img src="uploaded/teams/<?php echo $row['img']; ?>" height="80"></td>
                                            <td><?php echo $row['designation']; ?></td>
                                            <td><?php echo $row['status']; ?></td>
                                            <td><a href="add_team.php?edt=<?php echo $row['team_id']; ?>"><button class="btn btn-info"><i class="material-icons">edit</i></button></a>&nbsp;
                                            <a href="add_team.php?dlt=<?php echo $row['team_id']; ?>" onclick="return confirm('Are you Sure to Delete?');"><button class="btn btn-danger"><i class="material-icons">delete</i></button></a></td>
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



    <script src="assets/js/pages/tables/jquery-datatable.js"></script>

    <script src="assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
     <script src="assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

      <script src="assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="assets/plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    
    <script src="assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="assets/js/admin.js"></script>
    <script src="assets/js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="assets/js/demo.js"></script>
     <script src="assets/plugins/jquery/jquery.min.js"></script>

    
    
    <!-- Custom Js -->
    <script src="assets/js/admin.js"></script>
    

    <script src="assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
