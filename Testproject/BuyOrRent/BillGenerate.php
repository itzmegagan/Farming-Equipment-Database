<!DOCTYPEHTML>
<html><head><title>Billing</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>
body{
text-align: center;
}p{text-align:center;}
h1{
text-align: center;
}
table{
        text-align:center;margin-right:auto;margin-left:auto;
        color:black;border-collapse: collapse;}
table, th, td {color:black;
              border: 1px solid black;padding:8px;
}
</style>
</head>
<body>
<div>
<br><br><br>
<?php
$ft=$_POST["radio1"];
$qt=$_POST["Qty"];
$dt=$_POST["dat"];
$farmid='F9999';
if($qt>0)
{
    $d=mysqli_connect('localhost','root','','farmer_machinery_and_equipment') or die("Error connecting to MySQL server.");
    $fq=explode(',',$ft);
   // echo "$fq[1] / $fq[2]";
    $qer1=mysqli_query($d,"Select MF.Quantity from Manufactured_From MF where MF.Equipment_ID='$fq[2]' and MF.Manufacturer_ID='$fq[1]'");
//    if(mysqli_num_rows($qer1)>0) {
        $res = mysqli_fetch_array($qer1);
        $test=$res['Quantity']-$qt;
       // echo "test = $test";
   //    echo "res = $res['Quantity']";
        if (($res['Quantity'] - $qt) < 0) {
            echo "Less than 0";
        }
//    }
    else {
        $row1 = mysqli_fetch_array($qer1, MYSQLI_NUM);
        $qer2 = mysqli_query($d, "Update Manufactured_From MF set MF.Quantity=$test where MF.Equipment_ID='$fq[2]' and MF.Manufacturer_ID='$fq[1]'");

        //    }
//    else
        $qer3 = mysqli_query($d, "Insert into Farmer_Owned_Equipment values('$farmid','$fq[2]','$fq[0]','$fq[1]',$qt)");
        $qur4= mysqli_query($d, "Select Equipment_Name from Machinery_Details where Equipment_ID='$fq[2]'");
        $ress=mysqli_fetch_array($qur4);
        $qur5= mysqli_query($d, "Select Dealer_Name from Dealer_Details where Dealer_ID='$fq[0]'");
        $resss=mysqli_fetch_array($qur5);
        echo "BILL<table><tr><th>Farmer ID</th><th>Equipment Name</th><th>Piece(s)</th><th>Dealer Name</th></tr><tr><td>$farmid</td><td>$ress[Equipment_Name]</td><td>$qt</td><td>$resss[Dealer_Name]</td></tr>";

    }
        //    }

  /*  $qer5=mysqli_query($d,"Select Price from AVAILABLE_IN where FId=$fq[1] and DId=$fq[0]");
    $row2=mysqli_fetch_array($qer5,MYSQLI_NUM);
    $qer4=mysqli_query($d,"Insert into BILLING values($farmid,default,'$dt',$fq[1],$fq[0],$qt,$qt * $row2[0])");
    if($qer4){
        $id=mysqli_insert_id($d);

        $str1="select B.BDate,F.FName,F.FCompany,D.DName,B.Qty,B.Amount,Fa.FarmName from FERTILIZER F,DEALER D,BILLING B,FARMER Fa Where B.FId=F.FId and D.DId=B.DId and Fa.FarmId=B.FarmId and B.Bill_Id=$id";
        $qer6=mysqli_query($d,$str1);
        $row3=mysqli_fetch_array($qer6,MYSQLI_NUM);
        echo "<table><thead><h3>BILLING</h3></thead><tr><th>Name: $row3[6]</th></tr><tr><th>Bill Id: $id</th></tr><tr><th>Date: ";
        echo date("Y-m-d",strtotime($row3[0]));
        echo "</th></tr><tr><th>Fertilizer Name</th><th>Company</th><th>";
        echo "Dealer Name</th><th>Pieces</th><th>Amount(Rs.)</th></tr><tr><td>$row3[1]</td><td>$row3[2]</td><td>$row3[3]</td><td>$row3[4]  Kg.</td><td>$row3[5]  Rs.</td></tr></table>";
*/
        mysqli_close($d);
}//}

else
{
} 
?>
</body></html>