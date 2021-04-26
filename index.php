<?php

require_once("classes/FormAssist.class.php");
require_once("classes/DataAccess.class.php");
require_once("classes/FormValidator.class.php");

$fields=array("name"=>"","email"=>"","subject"=>"","message"=>"");
$rules= array("name"=>array("required"=>"","minlength"=>3,"maxlength"=>20,"nospecchars"=>"","alphaspaceonly"=>""),
        "message"=>array("required"=>""),
        "email"=>array("required"=>"","email"=>""),
        "subject"=>array("required"=>"")
        );
$labels=array("name"=>"NAME","email"=>"EMAIL","subject"=>"SUBJECT","message"=>"MESSAGE");
$validator=new FormValidator($rules,$labels);
$form=new FormAssist($fields,$_POST);
$dao=new DataAccess();
if(isset($_POST["submit"]))
{
  if($validator->validate($_POST))
  {
       
    
       $data = array("guest_name"=>$_POST["name"],"guest_email"=>$_POST["email"],"guest_subject"=>$_POST["subject"],"guest_message"=>$_POST["message"]);

if($dao->insert($data,"tbl_guest"))
{

	$msg="You will get email for your enquiry";
	//var_dump($dao->getErrors());
}
else
{
$msg="Failed ,please try again";
var_dump($dao->getErrors());
//var_dump($dao->getQuery());

}
}
else
{
$error=true;
var_dump($dao->getErrors());
}


  }


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>e-tailoring system</title>
	<meta content="" name="description">
    <meta content="" name="keywords">
	<link href="index/img/favicon.png" rel="icon">
	<link href="index/img/apple-touch-icon.png" rel="apple-touch-icon">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
	<link href="index/animate.css/animate.min.css" rel="stylesheet">
	<link href="index/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="index/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="index/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="index/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="index/swiper/swiper-bundle.min.css" rel="stylesheet">
</head>
<body>
	 <header id="header" class="fixed-top d-flex align-items-center header-transparent">
	 	<div class="container-fluid container-xl d-flex align-items-center justify-content-between">
	 		<div class="logo me-auto">
	 			<h1><a href="#">e-Tailoring</a></h1>
	 		</div>
	 		<nav id="navbar" class="navbar order-last order-lg-0">
	 			<ul>
	 				<li><a class="nav-link scrollto" href="#contact">Help</a></li>
          			<li><a class="nav-link scrollto" href="#about">About Us</a></li>
	 			
	 		<li class="dropdown"><a href="#"><span><h4  class="signup-signin-btn scrollto">Register/Login here</h4></span> </a>
	 			<ul>
                  <li><a href="btqreg.php">Sign up as Boutique</a></li>
                  <li><a href="custreg.php">Sign up as Customer</a></li>
                  <li><a href="login.php">Login</a></li>
                </ul>
                </ul>
 					<i class="bi bi-list mobile-nav-toggle"></i>
	 		</nav>



	 		<!--<a href="login.php" class="signup-signin-btn scrollto">Signup/Signin</a>-->
	 	</div>
	 </header>
	 <section id="hero">
	 	<div class="hero-container">
	 		<div class="carousel-inner" role="listbox">
	 			<div class="carousel-item active" style="background: url('index/img/slide-1.jpg');">
	 				<div class="carousel-container">
	 					<div class="carousel-content">
	 						<h2 class="animate__animated animate__fadeInDown"><span>e-Tailoring</span></h2>
	 						<p class="animate__animated animate__fadeInUp">The secret of great style is to feel good in what you wear</p>
	 					</div>
	 				</div>
	 			</div>
	 		</div>
	 	</div>
	 </section>
	 <main id="main">
	 	<section id="why-us" class="why-us">
	 		<div class="container">
	 		<div class="section-title">
	 			<h2>About <span>e-Tailoring System</span></h2>
	 			<p>An e-tailer is a retailer that sells products and services to customers using an online store.</p>
	 		</div>
	 		<div class="row">
	 			<div class="col-lg-4">
	 				<div class="box">
	 					<span>01</span>
              				<h4>Customize</h4>
              				<p>Design your own dress</p>
	 				</div>
	 			</div>
	 			<div class="col-lg-4 mt-4 mt-lg-0">
	 				<div class="box">
	 					<span>02</span>
	 					<h4>Repellat Nihil</h4>
              			<p>Dolorem est fugiat occaecati voluptate velit esse. Dicta veritatis dolor quod et vel dire leno para dest</p>
	 				</div>
	 			</div>
	 			<div class="col-lg-4 mt-4 mt-lg-0">
	 				<div class="box">
	 					<span>03</span>
	 					<h4> Ad ad velit qui</h4>
              			<p>Molestiae officiis omnis illo asperiores. Aut doloribus vitae sunt debitis quo vel nam quis</p>
	 				</div>
	 			</div>
	 		</div>
	 		</div>
	 	</section>
	 	<!--<section id="contact-us" class="contact-us">
	 		<div class="container">
	 			<div class="section-title">
	 				<h2>Contact <span>Us</span></h2>
          			<p>You will get mails for your queries</p>
	 			</div>
	 			<form>
	 				<div class="row">
	 					<div class="col-lg-4 col-md-6 form-group">
	 						<input type="text" name="name" class="form-control" id="name" placeholder="Your Name"><br>
	 					</div>
	 					<div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
	 						<input type="email" class="form-control" name="email" id="email" placeholder="Your Email">
	 					</div>
	 					<div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
	 						<input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone">
	 					</div>
	 					<div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
	 						<input type="text" class="form-control" name="msg" id="msg" placeholder="Type your enquiry">
	 					</div>
	 				</div>
	 				<div class="text-center"><button type="submit">Send Message</button></div>
	 			</form>
	 		</div>
	 	</section>-->
	 	<section id="gallery" class="gallery">
	 		<div class="container-fluid">
	 			<div class="section-title">
	 				<h2>Our <span>Customers</span></h2>
	 			</div>
	 			<div class="row no-gutters">
	 				<div class="col-lg-3 col-md-4">
	 					<div class="gallery-item">
	 						<a href="index/img/gallery/gallery-1.jpg" class="gallery-lightbox">
	 							<img src="index/img/gallery/gallery-1.jpg" alt="" class="img-fluid">
	 						</a>
	 					</div>

	 				</div>
	 			
	 			
	 				<div class="col-lg-3 col-md-4">
	 					<div class="gallery-item">
	 						<a href="index/img/gallery/gallery-2.jpg" class="gallery-lightbox">
	 							<img src="index/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
	 						</a>
	 					</div>
	 				</div>
	 			
	 			
	 				<div class="col-lg-3 col-md-4">
	 					<div class="gallery-item">
	 						<a href="index/img/gallery/gallery-3.jpg" class="gallery-lightbox">
	 							<img src="index/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
	 						</a>
	 					</div>
	 				</div>
	 			
	 			
	 				<div class="col-lg-3 col-md-4">
	 					<div class="gallery-item">
	 						<a href="index/img/gallery/gallery-4.jpg" class="gallery-lightbox">
	 							<img src="index/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
	 						</a>
	 					</div>
	 				</div>
	 			
	 			
	 				<div class="col-lg-3 col-md-4">
	 					<div class="gallery-item">
	 						<a href="index/img/gallery/gallery-5.jpg" class="gallery-lightbox">
	 							<img src="index/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
	 						</a>
	 					</div>
	 				</div>
	 			
	 			
	 				<div class="col-lg-3 col-md-4">
	 					<div class="gallery-item">
	 						<a href="index/img/gallery/gallery-6.jpg" class="gallery-lightbox">
	 							<img src="index/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
	 						</a>
	 					</div>
	 				</div>
	 			
	 			
	 				<div class="col-lg-3 col-md-4">
	 					<div class="gallery-item">
	 						<a href="index/img/gallery/gallery-7.jpg" class="gallery-lightbox">
	 							<img src="index/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
	 						</a>
	 					</div>
	 				</div>
	 			
	 			
	 				<div class="col-lg-3 col-md-4">
	 					<div class="gallery-item">
	 						<a href="index/img/gallery/gallery-8.jpg" class="gallery-lightbox">
	 							<img src="index/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
	 						</a>
	 					</div>
	 				</div>
	 			</div>
	 		</div>
	 	</section>
	 	<section id="boutique" class="boutique">
	 		<div class="container">
	 			<div class="section-title">
	 				<h2>Our Top <span>Boutiques</span></h2>
	 			</div>
	 			
	 			<div class="row">
	 				<div class="col-lg-4 col-md-6">
	 					<div class="member">
	 						<div class="pic"><img src="index/img/btq/btq-1.jpg" class="img-fluid" alt=""></div>
	 						<div class="member-info">
	 							<h4>Theresa Boutique</h4>
	 							<span>Ernakulam</span>
	 							<div class="social">
                  					<a href=""><i class="bi bi-facebook"></i></a>
                  					<a href=""><i class="bi bi-instagram"></i></a>
                				</div>
	 						</div>
	 					</div>
	 				</div>
	 			
	 				<div class="col-lg-4 col-md-6">
	 					<div class="member">
	 						<div class="pic"><img src="index/img/btq/btq-2.jpg" class="img-fluid" alt=""></div>
	 						<div class="member-info">
	 							<h4>Rose Petals</h4>
	 							<span>Kozhikodu</span>
	 							<div class="social">
                  					<a href=""><i class="bi bi-facebook"></i></a>
                  					<a href=""><i class="bi bi-instagram"></i></a>
                				</div>
	 						</div>
	 					</div>
	 				</div>
	 			
	 				<div class="col-lg-4 col-md-6">
	 					<div class="member">
	 						<div class="pic"><img src="index/img/btq/btq-3.jpg" class="img-fluid" alt=""></div>
	 						<div class="member-info">
	 							<h4>Inarah Boutique</h4>
	 							<span>Malappuram</span>
	 							<div class="social">
                  					<a href=""><i class="bi bi-facebook"></i></a>
                  					<a href=""><i class="bi bi-instagram"></i></a>
                				</div>
	 						</div>
	 					</div>
	 				</div>
	 			</div>
	 		</div>
	 	</section>
	 	<section id="contact" class="contact">
	 		<div class="container">
	 			<div class="section-title">
	 				<h2><span>Contact</span> Us</h2>
	 				<p>You will get mails for your queries</p>
	 			</div>
	 		
	 		<form method="post" role="form" class="contact-form">
	 			<div class="row">
	 				<div class="col-lg-4 col-md-6 form-group">
	 					 <?php echo $form->textBox("name",array("placeholder"=>"Your Name","class"=>"form-control")); ?>
                  <font color=red size=2><?php echo $validator->error("name"); ?>
	 				</div>
	 				<div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
              			<?php echo $form->textBox("email",array("placeholder"=>"Your Email","type"=>"email","class"=>"form-control")); ?>
                  		<font color=red size=2><?php echo $validator->error("email"); ?> 
	 				</div>
	 				<div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
              			<?php echo $form->textBox("subject",array("placeholder"=>"Subject","class"=>"form-control")); ?>
                  <font color=red size=2><?php echo $validator->error("subject"); ?>
	 				</div>
	 				<div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
              			<?php echo $form->textArea("message",array("placeholder"=>"Your Message","class"=>"form-control")); ?>
                  <?php echo $validator->error("message"); ?>
	 				</div>
	 			</div>
	 			<div class="text-center"><input type="submit"  name="submit" class="text-center" value="Submit"/>
	 			</div>
	 			<h2><?php echo isset($msg)?$msg:"";?></h2>
	 		</form>
	 		</div>
	 	</section>
	 </main>
	  <footer id="footer">
	  	<div class="container">
	  		<h3>e-Tailoring</h3>
	  		<p>Style your own clothes</p>
	  		<div class="social-links">
	  			<a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        		<a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
	  		</div>
      		<div class="copyright">
      			 &copy; Copyright <strong><span>e-Tailor</span></strong>. All Rights Reserved
      		</div>
      		<div class="credits">
      			 Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      		</div>
	  	</div>
	  </footer>
	  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
	  <script src="index/main.js"></script>
</body>
</html>