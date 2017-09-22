 <title>SPC | Admin</title>

<link href="assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css">
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

if(isset($_POST['wed_add_spc']))
{
    $spc_cat=$_POST['spc_cat'];
    $spc_desc=$_POST['desc'];

    $ins="INSERT INTO `spc`(`spc_cat`, `spc_desc`) VALUES ('".$spc_cat."','".$spc_desc."')";
    $exe=mysqli_query($con,$ins);
    
    if($exe > 0){
        ?>
        <script>
            alert('Added SPC Successfully');
            window.location='add_spc.php';
        </script>    
        <?php
    }
    else{
        ?>
        <script>
            alert('Failed to add SPC');
            window.location='add_spc.php';
        </script>    
        <?php
    }
}


/********** Update SPC ***********/

if(isset($_POST['update_spc']))
{
    $spc_cat=$_POST['spc_cat'];
    $spc_desc=$_POST['desc'];

    $up_spc="UPDATE `spc` SET spc_cat='".$spc_cat."', spc_desc='".$spc_desc."' WHERE spc_id='".$_GET['edt']."'";
    $exe_up=mysqli_query($con,$up_spc);
    
    if($exe_up > 0){
        ?>
        <script>
            alert('Update SPC Successfully');
            window.location='add_spc.php';
        </script>    
        <?php
    }
    else{
        ?>
        <script>
            alert('Failed to Update SPC');
            window.location='add_spc.php';
        </script>    
        <?php
    }
}

/********** DELETE SPC ****************/

if(isset($_GET['dlt'])){
    $dlt_id=$_GET['dlt'];
    
    $dlt_data="DELETE FROM `spc` WHERE spc_id='".$dlt_id."'";
    $exe_data=mysqli_query($con,$dlt_data);
    
    if($exe){
        ?>
        <script>
            alert('Record Deleted Successfully!');
            window.location='add_spc.php';
        </script>
        <?php
    }
    else
    {
    ?>
        <script>
            alert('Failed to Delete Record!');
            window.location='add_spc.php';
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
                            <h2>Add SPC</h2>
                        </div>
                        <div class="body">
                            <?php 
                            if(isset($_GET['edt'])){
                                $select_spc="SELECT * FROM spc WHERE spc_id='".$_GET['edt']."'";
                                $exe_spc=mysqli_query($con,$select_spc);
                                $row=mysqli_fetch_array($exe_spc);
                            }
                            
                            ?>
                            <form id="form_validation" method="POST" enctype="multipart/form-data">
                                <div class="row clearfix">
                                <div class="col-sm-10">
                                    <select class="form-control show-tick" name="spc_cat">
                                        <option value="<?php if(isset($_GET['edt'])){echo $row['spc_cat'];} ?>"><?php if(isset($_GET['edt'])){echo $row['spc_cat'];} else {?>-Select Option-<?php }?></option>
                                        <option value="Our Vision">Our Vision</option>
                                        <option value="What We Do">What We Do</option>
                                        <option value="Why SPC">Why SPC</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea class="form-control" name="desc" required><?php if(isset($_GET['edt'])){echo $row['spc_desc'];} ?></textarea>
                                        <label class="form-label">Description</label>
                                    </div>
                                </div>
                                <?php 
                                if(isset($_GET['edt'])){
                                    ?>
                                        <input class="btn btn-primary waves-effect" type="submit" value="Update SPC" name="update_spc">
                                    <?php
                                }
                                else{
                                ?>
                                <input class="btn btn-primary waves-effect" type="submit" value="Add SPC" name="wed_add_spc">
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
          
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>SPC TABLE</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Banner Id</th>
                                            <th>SPC Category</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php 
                                        $ban="SELECT * FROM `spc`";
                                        $exe_ban=mysqli_query($con,$ban);
                                        while($ban_row=mysqli_fetch_array($exe_ban))
                                        {
                                        ?>
                                        <tr>
                                            <td><?php echo $ban_row['spc_id']; ?></td>
                                            <td><?php echo $ban_row['spc_cat']; ?></td>
                                            <td><?php echo $ban_row['spc_desc']; ?></td>
                                            <td><a href="add_spc.php?edt=<?php echo $ban_row['spc_id'];?>"><button class="btn btn-info"><i class="material-icons">create</i></button></a>
                                                &nbsp;<a href="add_spc.php?dlt=<?php echo $ban_row['spc_id'];?>" onclick="return confirm('Are You Sure to Delete?');"><button class="btn btn-danger"><i class="material-icons">delete</i></button></a></td>
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
    