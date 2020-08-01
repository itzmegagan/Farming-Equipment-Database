<?php
$con = mysqli_connect("localhost", "root", "", "farmer_machinery_and_equipment") or die(mysqli_error($con));
$select_query = "SELECT Manufacturer_ID, Manufacturer_Name, Location_Of_Production FROM manufacturer_details";
$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));

?>
<!DOCTYPE html>
<html>
<head>
    <style>
        body{
            background-image: url("/Myproject/img/green.jpg");

        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: "Lato", sans-serif;
        }

        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: green;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: black;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        #main {
            transition: margin-left .5s;
            margin-left:40px;
            padding: 16px;
            display: inline;

        }

        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }
    </style>
    <title>Manufacturer Details</title>
    <link rel="stylesheet" type="text/css" href="/Myproject/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!--jQuery library-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!--Latest compiled and minified JavaScript-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
</head>
<form>
    <input class="form-control" id="myInput" type="text" placeholder="Search..">
</form>
<body>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#">About</a>
    <a href="/Myproject/DealerDetails/Dealer_Details.php">Dealer Details</a>
    <a href="/Myproject/MachineryDetails/Machinery_Details.php">Machinery Details</a>
    <a href="/Myproject/ManufacturerDetails/Manufacturer_Details.php">Manufacturer Details</a>
    <a href="/Myproject/BuyOrRent/Buy_Rent.php">Buy Equipment</a>
</div>

<div id="main">
    <!--    <h2>Sidenav Push Example</h2>-->
    <!--        <p>Click on the element below to open the side navigation menu, and push this content to the right.</p>-->
    <span style="font-size:30px;cursor:pointer; margin-left:0px;" onclick="openNav()">&#9776; DASHBOARD</span>
</div>
<div class="yellow">

    <?php echo "<table id='Manuf_Table' class=\"table table-dark table-hover\"><thead><tr><th>Manufacturer ID</th><th>Manufacturer Name</th><th>Location of Production</th></tr></thead><tbody>"; ?>
    <?php while ($row = mysqli_fetch_array($select_query_result))
    { ?>
        <?php echo "<thread>"."<tr><td>". $row["Manufacturer_ID"]. "</td><td>". $row["Manufacturer_Name"]. "</td><td>".$row["Location_Of_Production"]. "</td><td>". "</thread>"; ?>

    <?php } ?>
    <hr/>
</div>


<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#Manuf_Table tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
    }
</script>

</body>
</html>
