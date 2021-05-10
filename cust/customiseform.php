<?php
  session_start();
  $cust_id=$_SESSION["cust_id"];
  $cust_email=$_SESSION["cust_email"];
  $cust_phone=$_SESSION["cust_phone"];
  $conn=mysqli_connect('localhost', 'root', '','etailor');
  if (isset($_POST['submit']))
  {
    
    $boutique=$_POST['boutique'];
    $email=$_POST['cust_email'];
    $phn=$_POST['cust_phone'];
    $cat=$_POST['category'];
    $subcat=$_POST['sub-category'];
    $mat=$_POST['material'];
    $measure=$_POST['measurements'];
    $sug=$_POST['suggestion'];
    $sql = "INSERT INTO tbl_customiseform (cust_id,custform_btq,custform_mail,custform_phn,custform_cat,custform_subcat,custform_mat,custform_measure,custform_sug)
   VALUES ('$cust_id','$boutique','$cust_email','$phn','$cat','$subcat','$mat','$measure','$sug')";
   if (mysqli_query($conn,$sql))
   {
     echo "New record created successfully !";
   }
   else
   {
    echo "Error: " . $sql . "
" . mysqli_error($conn);;
   }
   mysqli_close($conn);
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>e-Tailoring</title>
  <style type="text/css">
    body {font-family: Arial, Helvetica, sans-serif;}
    * {box-sizing: border-box;}

    input[type=text], select, textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-top: 6px;
      margin-bottom: 16px;
      resize: vertical;
    }

    input[type=submit] {
      background-color: #04AA6D;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type=submit]:hover {
      background-color: #45a049;
    }

    .container {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
  <form action="customiseform.php" method="post" class="decor" enctype="multipart/form-data">
   
  <label>Email</label>
  <?php
  $result ="SELECT * from tbl_custreg where cust_email = '{$_SESSION['cust_email']}'";
  $res=mysqli_query($conn,$result);
  while($row = mysqli_fetch_array($res))
  {
    echo"<tr>";
    echo"<td><input type=\"text\" name=\"cust_email\" id=\"cust_email\" value=\"".$row['cust_email']."\"></td>";
    echo"</tr>";
  }
  echo"</table>";
  ?>
  <br>
  <label>Phone Number</label>
  <?php
  $phn = mysqli_query($conn,"SELECT * from tbl_custreg where cust_phone = '{$_SESSION['cust_phone']}'");
  while($row=mysqli_fetch_array($phn))
  {
    echo"<tr>";
    echo"<td><input type=\"text\" name=\"cust_phone\" id=\"cust_phone\" value=\"".$row['cust_phone']."\"></td>";
    echo"</tr>";
  }
  echo"</table>";
  ?>
  <br>
  <label>Choose Category</label>
  <select id="category" name="category">
    <option value="">Select Category</option>
    <?php
    require "config.php";
    $sql="SELECT  * from tbl_category ";
    foreach ($dbo->query($sql) as $row)
    {
      echo "<option value=$row[cat_id]>$row[cat_name]</option>";
    }
    ?>
  </select>
  <br>
  <label>Choose Subcategory</label>
  <select name=sub-category id=sub-category>
    <option value="">Select Subcategory</option>
  </select>
  <br>
  <label>Choose Boutique</label>
  <select id="boutique" name="boutique">
    <option value="">Select Boutique</option>
    <?php
    require "config.php";
    $sql="SELECT  * from tbl_btqreg WHERE btq_status='A'";
    foreach ($dbo->query($sql) as $row)
    {
      echo "<option value=$row[btq_id]>$row[btq_name]</option>";
    }
    ?>
  </select>
  <br>
  <label>Choose Material</label>
  <select name=material id=material>
    <option value=""> Select Material</option>
  </select>
  <br>
  <label>Measurements</label>
  <textarea name="measurements" id="measurements" value="Measurements" ></textarea>
  <br>
  <label>Suggestion</label>
  <textarea name="suggestion" id="suggestion" value="suggestion" ></textarea>
  <input type="submit" name="submit"></input>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function()
    {
      $('#category').change(function()
      {
        var cat_id=$('#category').val();
        $('#sub-category').empty();
        $.get('get_subcat.php',{'cat_id':cat_id},function(return_data)
        {
          $.each(return_data.data, function(key,value)
          {
            $("#sub-category").append("<option value=" + value.subcat_id +">"+value.subcat_name+"</option>");
          });
        },"json");
      });
    });
    $(document).ready(function()
    {
      $('#boutique').change(function()
      {
        var btq_id=$('#boutique').val();
        $('#material').empty();
        $.get('get_material.php',{'btq_id':btq_id},function(return_data)
        {
          $.each(return_data.data, function(key,value)
          {
            $("#material").append("<option value=" + value.mat_id +">"+value.mat_name+"</option>");
          });
        },"json");
      });
    });
  </script>
</body>
</html>