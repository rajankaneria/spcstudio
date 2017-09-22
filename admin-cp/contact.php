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

/********** DELETE SPC ****************/

if(isset($_GET['dlt'])){
    
    $dlt_data="DELETE FROM `contact` WHERE main_id='".$_GET['dlt']."'";
    $exe_data=mysqli_query($con,$dlt_data);
    
    if($exe_data){
        ?>
        <script>
            alert('Record Deleted Successfully!');
            window.location='contact.php';
        </script>
        <?php
    }
    else
    {
    ?>
        <script>
            alert('Failed to Delete Record!');
            window.location='contact.php';
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
                            <h2>SPC TABLE</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>name</th>
                                            <th>mobile</th>
                                            <th>email</th>
                                            <th>category</th>
                                            <th>date_from</th>
                                            <th>date_to</th>
                                            <th>city</th>
                                            <th>desc</th>
                                            <th>desc</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                      <?php
                                         $sql="SELECT * FROM `contact`";
                                         $res=mysqli_query($con,$sql);
                                         while($row=mysqli_fetch_array($res))
                                         {
                                    ?>

                                        <tr>
                                            <td><?php echo $row['main_id']; ?></td>
                                            <td><?php echo $row['Name']; ?></td>
                                            <td><?php echo $row['Phone']; ?></td>
                                            <td><?php echo $row['Email']; ?></td>
                                            <td><?php echo $row['Category']; ?></td>
                                            <td><?php echo $row['Date_From']; ?></td>
                                            <td><?php echo $row['Date_To']; ?></td>
                                            <td><?php echo $row['Vanue']; ?></td>
                                            <td><?php echo $row['Message']; ?></td>

                                           
                                            <!--<td><a href="contact.php?edt=<?php //echo $row['port_id']; ?>"><button class="btn btn-info"><i class="material-icons">edit</i></button></a>&nbsp;-->
                                            <td>
                                            <a href="contact.php?dlt=<?php echo $row['main_id']; ?>" onclick="return confirm('Are you Sure to Delete?');"><button class="btn btn-danger"><i class="material-icons">delete</i></button></a></td>
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
        </div></section>
        
        
        
    
    <!-- Waves Effect Plugin Js -->
    
   <?php include_once './footer.php'; ?>

    <!-- Demo Js -->
    