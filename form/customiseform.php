<?php
require_once("../../classes/FormAssist.class.php");
require_once("../../classes/DataAccess.class.php");
require_once("../../classes/FormValidator.class.php");
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
<html >
<head>
  <meta charset="UTF-8">
  <title>Customise</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <div class="container">
  
  <h1 class="text-center">Customise</h1>
  <form class="registration-form">
    <label>
      <span class="label-text">Choose Boutique</span>
      <?php
                    $btq=$dao->createOptions("btq_name","btq_id","tbl_btqreg");
                    echo $form->dropDownList("btq_name",array("class"=>"form-input","select"),$btq,"Select Boutique");
                    ?>

    </label>
  
    
    <label>
      <span class="label-text">Email</span>
      $custemail=$dao->getData("cust_email","cust_id","tbl_custreg");
      <?php echo $custemail["cust_email"]; ?>
    </label>
    <label>
      <span class="label-text">Contact Number</span>
      <input type="text" name="phn">
    </label>
    <label>
      <span class="label-text">Choose Category</span>
      <select class="mdb-select md-form">
  <option value="" disabled selected>Choose Category</option>
  <option value="1">Option 1</option>
  <option value="2">Option 2</option>
  <option value="3">Option 3</option>
</select>

    </label>
    <label>
      <span class="label-text">Choose Subcategory</span>
      <select class="mdb-select md-form">
  <option value="" disabled selected>Choose Subcategory</option>
  <option value="1">Option 1</option>
  <option value="2">Option 2</option>
  <option value="3">Option 3</option>
</select>

    </label>
    <label>
      <span class="label-text">Choose Color</span>
      <select class="mdb-select md-form">
  <option value="" disabled selected>Choose Color</option>
  <option value="1">Option 1</option>
  <option value="2">Option 2</option>
  <option value="3">Option 3</option>
</select>
<label>
      <span class="label-text">Choose Material</span>
      <select class="mdb-select md-form">
  <option value="" disabled selected>Choose Material</option>
  <option value="1">Option 1</option>
  <option value="2">Option 2</option>
  <option value="3">Option 3</option>
</select>

    </label>
  <label>
      <span class="label-text">Measurements(In inch)</span>
      <input type="text" name="phn">
    </label>
    <label>
      <span class="label-text">Address</span>
      <input type="text" name="phn">
    </label>
    <label>
      <span class="label-text">Suggestions if any</span>
      <input type="text" name="phn">
    </label>
  
    
    <div class="text-center">
      <button class="submit" name="register">SEND REQUEST</button>
    </div>
  </form>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
