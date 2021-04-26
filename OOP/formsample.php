<?php
require_once("classes/FormAssist.class.php");

$fields=array("boutique_name"=>"","owner_name"=>"","location"=>"","address"=>"","phone"=>"","license_no"=>"","password"=>"","email_id"=>"","photo"=>"");
$form=new FormAssist($fields,$_POST);

?>
<html>
	<head>
		
	</head>
	<body>
		<h3>Boutique Registration</h3>
		<form method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Boutique Name</td>
				<td><?php echo $form->textBox("boutique_name",array("placeholder"=>"Enter Boutique name")); ?></td>
				<td></td>
			</tr>
			<tr>
				<td>Owner Name</td>
				<td><?php echo $form->textBox("owner_name",array("placeholder"=>"Enter Owner name")); ?></td>
				<td></td>
			</tr>
			<tr>
				<td>Location</td>
				<td><?php echo $form->textBox("location",array("placeholder"=>"Location"));?></td>
				<td></td>
			</tr>
			<tr>
				<td>Address</td>
				<td><?php echo $form->textArea("address",array("placeholder"=>"Enter Address")); ?></td>
				<td></td>
			</tr>
			<tr>
				<td>Contact Number</td>
				<td><?php echo $form->textBox("phone",array("placeholder" => "Enter Phone Number","type"=>"tel"));?></td>
				<td></td>
			</tr>
			<tr>
				<td>License Number</td>
				<td><?php echo $form->textBox("license_no",array("placeholder"=>"Enter License Number"));?></td>
				<td></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><?php echo $form->passwordBox("paswd",array("placeholder"=>"password","type"=>"password")); ?></td>
				<td></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><?php echo $form->textBox("email_id",array("placeholder"=>"Enter Email","type"=>"email",)); ?></td>
				<td></td>
			</tr>
			
			
			
			
			<tr>
				<td>Photo</td>
				<td><?php echo $form->fileField("photo",array()); ?></td>
				<td></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="reg" value="Register" /></td>
				<td>&nbsp;</td>			
			</tr>
		</table>
	</form>
	</body>

</html>