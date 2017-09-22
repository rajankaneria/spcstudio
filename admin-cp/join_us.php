 <title>SPC | Admin</title>

<link href="assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    
    <link href="../../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">


    <!-- Custom Css -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="assets/css/themes/all-themes.css" rel="stylesheet" />
    
<?php 
session_start();
include_once './header.php';
include_once './config.php';

/********** DELETE SPC ****************/

if(isset($_GET['dlt'])){
    $dlt_id=$_GET['dlt'];
    
    $dlt_data="DELETE FROM `join_us` WHERE Join_id='".$dlt_id."'";
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
          
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Join Us Details</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Category</th>
                                            <th>Location</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php 
                                        $ban="SELECT * FROM `join_us`";
                                        $exe_ban=mysqli_query($con,$ban);
                                        while($ban_row=mysqli_fetch_array($exe_ban))
                                        {
                                        ?>
                                        <tr>
                                            <td><?php echo $ban_row['Join_id']; ?></td>
                                            <td><?php echo $ban_row['Name']; ?></td>
                                            <td><?php echo $ban_row['Phone']; ?></td>
                                            <td><?php echo $ban_row['Email']; ?></td>
                                            <td><?php echo $ban_row['Category']; ?></td>
                                            <td><?php echo $ban_row['Location']; ?></td>
                                            <td>&nbsp;<a href="add_spc.php?dlt=<?php echo $ban_row['Join_id'];?>" onclick="return confirm('Are You Sure to Delete?');"><button class="btn btn-danger"><i class="material-icons">delete</i></button></a></td>
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
    