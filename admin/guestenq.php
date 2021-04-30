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
    <style>
    <style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2
    }

    th {
        background-color: #ffb03b;
        color: white;
    }

    .btn {
        background: #ffb03b;
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

    * {
        box-sizing: border-box;
    }

    html,
    body {
        min-height: 100vh;
        padding: 0;
        margin: 0;
        font-family: Roboto, Arial, sans-serif;
        font-size: 14px;
        color: #666;
    }

    input,
    textarea {
        outline: none;
    }

    .section-1 {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px 20px 10px 10px;
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
        background: #f5d09a;
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
            width: 80%;
        }
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
            <p style="color: black; font-family:satisfy;">GUEST ENQUIRY</p>
            <form action="responded.php" method="post" class="decor">
                <div class="form-left-decoration"></div>
                <div class="form-right-decoration"></div>
                <div class="circle"></div>
                <div class="form-inner">

                    <?php require_once("../classes/FormAssist.class.php");
require_once("../classes/DataAccess.class.php");
require_once("../classes/FormValidator.class.php");
$dao=new DataAccess();
if(isset($_POST["id"]))
                {
                  $id=$_POST["id"]; 
                 $data2= $dao->getData("guest_email","tbl_guest","guest_id='$id'");
                $email = $data2[0]["guest_email"];

                
                 if(isset($_POST["responded"]))
                  {
                    var_dump($dao->lastQuery());
                    $data["guest_status"]="B";
                    //var_dump($dao->getErrors());
                  }
                  else
                  {
                    var_dump($dao->lastQuery());
                    $msg="error";
                    //var_dump($dao->getErrors());
                  }
                }
            $fields=array("guest_name","guest_email","guest_subject","guest_message","guest_response","guest_id");
            if($guestenquiry= $dao->getData($fields,"tbl_guest"))
            {
                //var_dump(students);
                ?>`
                    <table>
                        <tr>

                            <th>Name</th>
                            <th>Email</th>

                            <th>Subject</th>
                            <th>Message</th>
                            <th>Reply</th>
                            <th>Clear</th>

                        </tr>
                        <?php
                        foreach($guestenquiry as $guest)
                        {
                            ?>
                        <tr>
                            <input type="hidden" name="id" value="<?php echo $guest["guest_id"]; ?>"/>
                            <td><?php echo $guest["guest_name"]; ?></td>
                            <td><?php echo $guest["guest_email"]; ?></td>
                            <td><?php echo $guest["guest_subject"]; ?></td>
                            <td><?php echo $guest["guest_message"]; ?></td>
                            <td><input type="text" name="response"></td>
                            <td><a href="responded.php?guest_id=<?php echo $guest["guest_id"]; ?>">Responded</a></td>
                            <h6><?php echo isset($msg)?$msg:"";?></h6>
                        </tr>

                        <?php
                        }

                        ?>

                    </table>


                    <?php
            }
            else
            {
                echo "<h3>No guests found ".$dao->getErrors()."</h3>";
            }


        ?>
            </form>
        </section>
    </div>

</body>

</html>