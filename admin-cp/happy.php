<title>Happy Clients</title>
<link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

<?php 
session_start();
include_once './header.php';
include_once 'config.php';

if(isset($_POST['add']))
{
    $fname=$_POST['fname'];
    $img_name=$_FILES['photo']['name'];
    $tmp_name=$_FILES['photo']['tmp_name'];
    
    $store="happy/".$img_name;
    $desc=$_POST['desc'];

    $sql="INSERT INTO `happy_client`(`happy_name`, `happy_image`, `happy_description`) VALUES ('$fname','$img_name','$desc')";
    $res=mysqli_query($con,$sql);
    if($res)
    {

    if(move_uploaded_file($tmp_name,$store))
    {
        echo "uploaded"; 
      }
    else
    {
        echo "not uploaded";
    }
      ?>
            <script>alert('inserted');</script>
      <?php
    }
    else
    {
        ?>
             <script>alert('not inserted');</script>

        <?php
    }
}
?>


<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Add cliect</h2>
            </div>
            <!-- Advanced Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Happy Add client</h2>
                        </div>
                        <div class="body">
                            <form id="form_advanced_validation" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="fname"  required>
                                        <label class="form-label">name</label>
                                    </div>
                                    <div class="help-info">Min. 3, Max. 30 characters</div>
                                </div>
                                
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="file" class="form-control" name="photo"  accept="image/jpg, image/jpeg, image/png" required>
<!--                                        <label class="form-label">Upload Photo</label>-->
                                    </div>
                                    <div class="help-info">Upload Only jpg | jpeg | png Files.</div>
                                </div>
                                
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="desc" required>
                                        <label class="form-label">Description</label>
                                    </div>
                                    <div class="help-info">Min. Character: 10, Max. Character: 5000</div>
                                </div>
                                <input type="submit" name="add" class="btn btn-primary waves-effect" value="Add">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Advanced Validation -->
            <!-- Validation Stats -->
            <!-- #END# Validation Stats -->
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    JQUERY DATATABLES
                  
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                BASIC EXAMPLE
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Photos</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $sql="SELECT * FROM `happy_client`";
                                    $res=mysqli_query($con,$sql);
                                    while($row=mysqli_fetch_array($res))
                                    {
                                        ?>
                                          <tbody>
                                        <?php
                                        echo "<tr><td>".$row['happy_name']."</td>";
                                        echo "<td>".$row['happy_image']."</td>";
                                        echo "<td>".$row['happy_description']."</td></tr>";
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
 <script src="../../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>