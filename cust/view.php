<?php
require_once   '../vendor/autoload.php';
include("../dbconn.php");
$respond_id = $_GET["view"];
            $sql="SELECT respond_dress,respond_mat,respond_price,respond_mtr,respond_cost,respond_date FROM tbl_respond WHERE respond_id = '$respond_id'";
            $result=mysqli_query($conn,$sql) or die(mysql_error());
            while($row=mysqli_fetch_array($result))
            {
                 $dress = $row['respond_dress'];
                 $mat = $row['respond_mat'];
                 $price = $row['respond_price'];
                 $mtr = $row['respond_mtr'];
                 $cost=$row['respond_cost'];
                 $date=$row['respond_date'];

            }

        
            $mpdf = new \Mpdf\Mpdf();
            $data='';
            $data.='<h1>Details</h1>';
            $data.='<strong>Dress'.$dress.'<br/>';
            $data.='<strong>Material'.$mat.'<br/>';
            $data.='<strong>Price'.$price.'<br/>';
            $data.='<strong>Metre'.$mtr.'<br/>';
            $data.='<strong>Cost'.$cost.'<br/>';
            $data.='<strong>Date'.$date.'<br/>';
            $mpdf->WriteHTML($data);
            $mpdf->Output('myfile.pdf','D');
?>