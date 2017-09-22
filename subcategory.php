<?php
include("config.php");


if(isset($_POST['submit']))
{
    $main=trim($_POST['main']);
    $s1t=trim($_POST['sub']);
    
    

   if(isset($_POST['submit'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
       else if($file_size > 8097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      else if(empty($errors)==true){
         move_uploaded_file($file_tmp,"uploaded_img/".$file_name);
         echo "Success";

         $res=mysql_query("INSERT INTO `tbl_subcategory`(`cat_name`,`sub_cat`,`img`) VALUES ('$main','$s1t','$file_name')");
      }else{
         print_r($errors);
      }
   }
}
?>
<html>
   <body>
      
      <form action="" method="POST" enctype="multipart/form-data">
        <select required="required" name="main">
                          <option>-Select Category-</option>
                          <?php 
                          $q1="SELECT * FROM tbl_category";
                          $q2=mysql_query($q1);
                          while($mcat=mysql_fetch_array($q2))
                          {
                          ?>
                          <option value="<?php echo $mcat['cat_name']; ?>"><?php echo $mcat['cat_name']; ?></option>
                          <?php } ?>
                      </select>
                       <label for="name" >Subcategory Name : </label>
                      <input required="true"  name="sub" type="text" placeholder="Enter State Name">
                  
         <input type="file" name="image" />
         <input type="submit"  name="submit" value="add" />
      </form>
      
   </body>
</html>