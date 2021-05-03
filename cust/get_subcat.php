<?php
session_start();
$cust_id=$_SESSION["cust_id"];
$cust_email=$_SESSION["cust_email"];
$cust_phone=$_SESSION["cust_phone"];
$conn=mysqli_connect('localhost', 'root', '','etailor');

?>
<option value="">Select Sub Category</option>
           <?php

          $result = mysqli_query($conn,"SELECT  tbl_category.cat_id,tbl_category.cat_name,tbl_subcategory.cat_id,tbl_subcategory.subcat_name,tbl_subcategory.subcat_id FROM tbl_category INNER JOIN tbl_subcategory ON tbl_category.cat_id=tbl_subcategory.cat_id");
         while($row = mysqli_fetch_array($result)) {
          ?>
        <option value="<?php echo $row["subcat_id"];?>"><?php echo $row["subcat_name"];?></option>
        <?php
       }
      ?>