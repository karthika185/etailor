<?php
session_start();
$cust_id=$_SESSION["cust_id"];
require_once("../classes/FormAssist.class.php");
require_once("../classes/DataAccess.class.php");
require_once("../classes/FormValidator.class.php");
$fields=array("btq_name"=>"","cust_email"=>"","cat_name"=>"","phn"=>"","subcat_name"=>"","color"=>"","material"=>"","measurements"=>"","address"=>"","sug"=>"");
$rules=array("btq_name"=>array("required"=>""),"cust_email"=>array("required"=>""),"cat_name"=>array("required"=>""),"subcat_name"=>array("required"=>""),"color"=>array("required"=>""),"measurements"=>array("required"=>""),"address"=>array("required"=>""),"sug"=>array("required"=>""),"material"=>array("required"=>""),"phn"=>array("required"=>""));
$labels=array();
$validator=new FormValidator($rules,$labels);
$form=new FormAssist($fields,$_POST);
$dao=new DataAccess();
if(isset($_POST["add"]))
{
  if($validator->validate($_POST))
  {
    $data=array("btq_id"=>$_POST["btq_name"],"cust_id"=>$_POST["cust_email"],"cat_id"=>$_POST["cat_name"],"subcat_id"=>$_POST["subcat_name"],"mat_id"=>$_POST["mat_name"],"custom_measure"=>$_POST["measurements"],"address"=>$_POST["address"],"custom_sug"=>$_POST["sug"]);
    if($dao->insert($data,"tbl_custom"))
    {
      $msg="Success";
    }
    else
    {
      $msg="Insertion failed";
    }
  }
  else
  {
    $error=true;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    body
    * {
        box-sizing: border-box;
        }
        html, body {
        min-height: 100vh;
        padding: 0;
        margin: 0;
        font-family: Roboto, Arial, sans-serif;
        font-size: 14px;
        
        background-image: url("bg.jpg");
        height: 120%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
      }
      input, textarea
      {
        outline: none;
      }
      .section-1
      {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        background: #f5d09a;
      }
      h1
      {
        margin-top: 0;
        font-weight: 500;
      }
      form
      {
        position: relative;
        width: 80%;
        border-radius: 30px;
        background: #fff;
      }
      .form-left-decoration,
      .form-right-decoration
      {
        content: "";
        position: absolute;
        width: 50px;
        height: 20px;
        border-radius: 20px;
        background: black;
      }
      .form-left-decoration
      {
        bottom: 60px;
        left: -30px;
      }
      .form-right-decoration
      {
        top: 60px;
        right: -30px;
      }
      .form-left-decoration:before,
      .form-left-decoration:after,
      .form-right-decoration:before,
      .form-right-decoration:after
      {
        content: "";
        position: absolute;
        width: 50px;
        height: 20px;
        border-radius: 30px;
        background: #fff;
      }
      .form-left-decoration:before
      {
        top: -20px;
      }
      .form-left-decoration:after
      {
        top: 20px;
        left: 10px;
      }
      .form-right-decoration:before 
      {
        top: -20px;
        right: 0;
      }
      .form-right-decoration:after
      {
        top: 20px;
        right: 10px;
      }
      .circle
      {
        position: absolute;
        bottom: 80px;
        left: -55px;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #fff;
      }
      .form-inner
      {
        padding: 40px;
      }
      .form-inner input,
      .form-inner textarea
      {
        display: block;
        width: 100%;
        padding: 15px;
        margin-bottom: 10px;
        border: none;
        border-radius: 20px;
        background: #d0dfe8;
      }
      .form-inner textarea
      {
        resize: none;
      }
      .button
      {
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
      .button:hover
      {
        background: #ffb03b;
      }
      @media (min-width: 568px)
      {
      form
      {
        width: 60%;
      }
      }
      h3
      {
        font-family: satisfy;
     
    color: #ffb03b;
    
    
    
       }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <h3>e-Tailoring</h3>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#"><?php echo $_SESSION["cust_name"];?></a></li>
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
    <div class="circle"></div>
    <div class="form-inner">
      <center><p style="color: black;font-family:satisfy">CUSTOMIZE FORM</p></center><br><br></center>
      <label>Choose Boutique</label>
        <?php
        $btq=$dao->createOptions("btq_name","btq_id","tbl_btqreg");
        echo $form->dropDownList("btq_name",array("select"),$btq,"Select Boutique");
        echo $validator->error("btq_name");
        ?>
        <br><br>
        <label>Email</label>
        <?php
        echo $form->textBox("cust_email",array("placeholder"=>"email","type"=>"email","class"=>"form-control"));
        echo $validator->error("cust_email");
        ?>
        <label>Contact Number</label>
        <?php
        echo $form->textBox("phn",array("placeholder"=>"Phone Number","class"=>"form-control"));
        echo $validator->error("phn");
        ?>
        <label>Choose Category</label>
        <?php
        $btq=$dao->createOptions("cat_name","cat_id","tbl_category");
        echo $form->dropDownList("cat_name",array("class"=>"form-input","select"),$btq,"Select Category");
        echo $validator->error("cat_name");
        ?>
        <br><br>
        <label>Choose Subcategory</label>
        <?php
        $btq=$dao->createOptions("subcat_name","subcat_id","tbl_subcategory");
        echo $form->dropDownList("subcat_name",array("class"=>"form-input","select"),$btq,"Select SubCategory");
        echo $validator->error("subcat_name");
        ?><br><br>
        <label>Choose Material</label>
        <?php
        $btq=$dao->createOptions("mat_name","mat_id","tbl_material");
        echo $form->dropDownList("material",array("class"=>"form-input","select"),$btq,"Select Material");
        echo $validator->error("material");
        ?><br><br>
        <label>Choose Color</label>
        <?php echo $form->textBox("color",array("placeholder"=>"Color","class"=>"form-control"));
        echo $validator->error("color");
        ?>
        <label>Address</label>
        <?php echo $form->textArea("address",array("placeholder"=>"Address","class"=>"form-control"));
        echo $validator->error("address");
        ?>
        <label>Measurements</label>
        <?php echo $form->textArea("measurements",array("placeholder"=>"Measurements","class"=>"form-control"));
        echo $validator->error("measurements");
        ?>
        <label>Suggestions if any</label>
        <?php echo $form->textArea("sug",array("placeholder"=>"Suggestions","class"=>"form-control"));
        echo $validator->error("sug");
        ?>
        <input type="submit" name="add" value="SUBMIT" class="button"/>
    </div>
  </form>
</div>

</body>
</html>