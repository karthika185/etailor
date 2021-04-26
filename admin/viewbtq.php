<?php
session_start();
$admin_id=$_SESSION["admin_id"];
if(!isset($_SESSION['admin_name']))
{
header('location:../login.php');
}
require_once("../classes/FormAssist.class.php");
require_once("../classes/DataAccess.class.php");
require_once("../classes/FormValidator.class.php");
$dao=new DataAccess();
if(isset($_POST["btq_id"]))
{
  $id=$_POST["btq_id"];
  $data2= $dao->getData("btq_status","tbl_btqreg","btq_id='$id'");
  $stat = $data2[0]["btq_status"];

  if(isset($_POST["block"]))
  {
    $data["btq_status"]="B";
  }
  else if(isset($_POST["unblock"]))
  {
    $data["btq_status"]="A";
  }
  else
  {
    var_dump($dao->getErrors());
    $msg="Error";
  }
  if($dao->update($data,"tbl_btqreg","btq_id=$id"))
  {
   
    //
  }

}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
		table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #ffb03b;
  color: white;
}
.btn{background: #ffb03b;
    color: #fff;
    border-radius: 30px;
    margin: 0 0 0 20px;
    padding: 5px 20px;
    font-size: 13px;
    font-weight: 500;
    letter-spacing: 1px;
    transition: 0.3s;
    white-space: nowrap;
}
		</style>
</head>
<body>
    <input type="checkbox" id="checkbox">
    <header class="header">
        <h2 class="u-name">e<b>Tailoring</b>
            <label for="checkbox">
                <i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
            </label>
        </h2>
        <i class="fa fa-user" aria-hidden="true"></i>


    </header>
    <div class="body">
        <nav class="side-bar">
            <div class="user-p">
                <img src="img/user.jpg">
                <h4><?php echo $_SESSION["admin_name"];?></h4>
            </div>
            <ul>
                <li>
                    <a href="adminhome.php">
                        <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                        <span>Boutique Requests</span>
                    </a>
                </li>
                <li>
                    <a href="guestenq.php">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <span>Guest Enquiry</span>
                    </a>
                </li>
                <li>
                    <a href="custenq.php">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <span>Customer Enquiry</span>
                    </a>
                </li>
                 <li>
                    <a href="btqenq.php">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <span>Boutique Enquiry</span>
                    </a>
                </li>
                <li>
                    <a href="addcat.php">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        <span>Add Category</span>
                    </a>
                </li>
                <li>
                    <a href="addsubcat.php">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        <span>Add Subcategory</span>
                    </a>
                </li>
                <li>
                    <a href="viewcust.php">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>Customers</span>
                    </a>
                </li>
                <li>
                    <a href="viewbtq.php">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>Boutiques</span>
                    </a>
                </li>
                <li>
                    <a href="../destroysession.php">
                        <i class="fa fa-power-off" aria-hidden="true"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
        <section class="section-1">
            <?php
            require_once("../classes/DataAccess.class.php");
            $dao = new DataAccess();
            if (isset($_POST["id"]))
                {
                    $id=$_POST["id"];
                    if (isset($_POST["block"])) 
                    {
                        $data["btq_status"]="B";
                    }
                    elseif (isset($_POST["unblock"])) 
                    {
                        $data["btq_status"]="A";
                    }
                    else
                    {
                        //
                    }
                    if($dao->update($data,"tbl_btqreg","btq_id=$id"))
                    {
                        $msg="success!";
                    }
                }
                if($boutiques = $dao->getData("*","tbl_btqreg"))
                {
                    ?>
                    <table>
                        <tr>
                            <th>Boutique Name</th>
                            <th>Owner Name</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>License</th>
                            <th>Status</th>
                        </tr>
                        <?php
                        foreach($boutiques as $btq)
                        {
                        ?>
                        <form method="post">
                            <tr>
                                <input type="hidden" name="id" value="<?php echo $btq["btq_id"];?>">
                                <td><?php echo $btq["btq_name"]; ?></td>
                                <td><?php echo $btq["btq_owner"]; ?></td>
                                <td><?php echo $btq["btq_address"]; ?></td>
                                <td><?php echo $btq["btq_email"]; ?></td>
                                <td><?php echo $btq["btq_phone"]; ?></td>
                                <td><?php echo $btq["btq_lic"]; ?></td>
                                <td>
                                    <?php
                                    if($btq["btq_status"]=="A")
                                    {
                                        ?>
                                        <input type="submit" name="block" value="block"/>
                                        <?php
                                    }
                                    if($btq["btq_status"]=="B")
                                    {
                                        ?>
                                        <input type="submit" name="unblock" value="unblock"/>
                                </td>
                                    <?php
                                    }
                                    ?>
                            </tr>
                        </form>  
                        <?php 
                        }
                        ?>                                              
                    </table>
                    <?php
                }
                else
                {
                    echo "<h3>No boutiques found ".$dao->getErrors()."</h3>";
                }
                ?>
                <br><br><br><br><a href="printBoutique.php">PRINT</a>
            </section>
        </div>
    </body>
</html>















           