<?php
session_start();
$cust_id=$_SESSION["cust_id"];
$cust_email=$_SESSION["cust_email"];
$cust_phone=$_SESSION["cust_phone"];
$conn=mysqli_connect('localhost', 'root', '','etailor');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>e-Tailoring</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
    <style>
    body * {
        box-sizing: border-box;
    }

    html,
    body {
        min-height: 100vh;
        padding: 0;
        margin: 0;
        font-family: Roboto, Arial, sans-serif;
        font-size: 14px;

        background-im
        age: url("bg.jpg");
        height: 120%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;

    }
    input,
    textarea {
        outline: none;
    }

    .section-1 {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        background: #f5d09a;
    }

    h1 {
        margin-top: 0;
        font-weight: 500;
    }

    form {
        position: relative;
        width: 80%;
        border-radius: 30px;
        background: #fff;
    }

    .form-left-decoration,
    .form-right-decoration {
        content: "";
        position: absolute;
        width: 50px;
        height: 20px;
        border-radius: 20px;
        background: black;
    }

    .form-left-decoration {
        bottom: 60px;
        left: -30px;
    }

    .form-right-decoration {
        top: 60px;
        right: -30px;
    }

    .form-left-decoration:before,
    .form-left-decoration:after,
    .form-right-decoration:before,
    .form-right-decoration:after {
        content: "";
        position: absolute;
        width: 50px;
        height: 20px;
        border-radius: 30px;
        background: #fff;
    }

    .form-left-decoration:before {
        top: -20px;
    }

    .form-left-decoration:after {
        top: 20px;
        left: 10px;
    }

    .form-right-decoration:before {
        top: -20px;
        right: 0;
    }

    .form-right-decoration:after {
        top: 20px;
        right: 10px;
    }

    .circle {
        position: absolute;
        bottom: 80px;
        left: -55px;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #fff;
    }

    .form-inner {
        padding: 40px;
    }

    .form-inner input,
    .form-inner textarea {
        display: block;
        width: 100%;
        padding: 15px;
        margin-bottom: 10px;
        border: none;
        border-radius: 20px;
        background: #d0dfe8;
    }

    .form-inner textarea {
        resize: none;
    }

    .button {
        width: 100%;
        padding: 10px;
        margin-top: 20px;
        border-radius: 20px;
        border: none;
        border-bottom: 4px solid #ffb03b;
        background: #ffb03b;
        font-size: 16px;
        font-weight: 400;
        color: #fff;
    }

    .button:hover {
        background: #ffb03b;
    }

    @media (min-width: 568px) {
        form {
            width: 60%;
        }
    }

    h3 {
        font-family: satisfy;

        color: #ffb03b;



    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="#">Page 2</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  <form action="" method="post" class="decor" enctype="multipart/form-data">
    <div class="form-left-decoration"></div>
    <div class="form-right-decoration"></div>
    <div class="form-inner">
      <center><p style="color: black;font-family:satisfy">CUSTOMIZE FORM</p></center>
      <label>Choose Boutique</label>
      <?php
      $result = mysqli_query($conn,"SELECT btq_name FROM tbl_btqreg WHERE btq_status='A'");
      echo "<select name='btq_name'>";
      while ($row = mysqli_fetch_array($result))
      {
          echo "<option value='" . $row['btq_name'] ."'>" . $row['btq_name'] ."</option>";
      }
      echo "</select>";
      ?>
      <br>
      <label>Email</label>
      <?php
      $result = mysqli_query($conn,"SELECT * from tbl_custreg where cust_email = '{$_SESSION['cust_email']}'");
      while($row=mysqli_fetch_array($result))
      {
          echo"<tr>";
          echo"<td><input type=\"text\" name=\"cust_id\" value=\"".$row['cust_email']."\"></td>";
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
          echo"<td><input type=\"text\" name=\"cust_id\" value=\"".$row['cust_phone']."\"></td>";
          echo"</tr>";
      }
      echo"</table>";
      ?>
      <label>Choose Category</label>
      <select class="form-control" id="category" name="category">
        <option value="">Select Category</option>
        <?php
        require "config.php";
           $sql="SELECT  * from tbl_category ";
            
        foreach ($dbo->query($sql) as $row) {
            echo "<option value=$row[cat_id]>$row[cat_name]</option>";
}
?>
      </select>
      <br>
      <label>Choose Subcategory</label>
      <select class="form-control" name=sub-category id=sub-category>
        <option value="">Select Subcategory</option>
</select>
<br>
<label>Choose Material</label>
<select class="form-control">
  <?php
  $sql="SELECT tbl_material.mat_name,tbl_material.mat_id,tbl_material.btq_id,tbl_btqreg.btq_id FROM tbl_material INNER JOIN tbl_btqreg ON tbl_material.btq_id=tbl_btqreg.btq_id";
  foreach ($conn->query($sql) as $row) {
            echo "<option value=$row[mat_id]>$row[mat_name]</option>";
}
    ?>
</select>
<script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
////////////
$('#category').change(function(){
//var st=$('#category option:selected').text();
var cat_id=$('#category').val();
$('#sub-category').empty(); //remove all existing options
///////
$.get('get_subcat.php',{'cat_id':cat_id},function(return_data){
$.each(return_data.data, function(key,value){
    $("#sub-category").append("<option value=" + value.subcat_id +">"+value.subcat_name+"</option>");
  });
}, "json");
///////
});
/////////////////////
});
</script>
      
      
    </div>
  </form>
</div>

</body>
</html>
