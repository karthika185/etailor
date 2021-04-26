<?php
session_start();
$admin_id=$_SESSION["admin_id"];
if(!isset($_SESSION['admin_name']))
{
header('location:../login.php');
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    
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
           
        
        </section>
    </div>

</body>
</html>




















    








