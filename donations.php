<!DOCTYPE html>
<html>
<head>
    <?php 
        include_once("components/header.php");
        require_once("databaseConn.php");
        $stmt = $pdo->query("SELECT * FROM donation_view");
        $stmtdonation = $pdo->query("SELECT * FROM donation");
    ?>
    <title>Donations</title>

</head>
<body>
    <?php include_once('components/navigation.php')?>
    <?php include_once('components/navbar.php')?>
    <div class="container-fluid">
    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
        <h2 id="donor">Donations</h2>
        <thead class="thead-dark">
            <tr>
                <th>DonationID</th>
                <th>Donor Name</th>
                <th>Donation Name</th>
                <th>DonationType Name</th>
                <th>Quantity</th>
                <th>Description</th>
                <th>Date</th>
                <th>Received</th>

            </tr>
        </thead>
        <tbody>
            <?php
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                     echo "<tr><td>";
                    echo(htmlentities($row['donationID']));
                    echo ("</td><td>");
                    echo(htmlentities($row['donorName']));
                    echo ("</td><td>");
                    echo(htmlentities($row['donationName']));
                    echo ("</td><td>");
                    echo (htmlentities($row['donationTypeDescription']));
                    echo ("</td><td>");
                    echo (htmlentities($row['donation_quantity']));
                    echo ("</td><td>");
                    echo (htmlentities($row['donation_description']));
                    echo ("</td><td>");
                    echo (htmlentities($row['date']));
                    echo ("</td><td>");
                    echo (htmlentities($row['date_received']));
                    echo ("</td></tr>");
                }

            ?>
        
        </tbody>
    </table>    

    <table id="dataTableDon" class="table table-striped table-bordered" style="width:100%">
        <h2 id="donorDonation">Donations</h2>
        <thead class="thead-dark">
            <tr>
                <th>DonationID</th>
                <th>Donor ID</th>
                <th>Donation Name</th>
                <th>DonationType ID</th>
                <th>Quantity</th>
                <th>Description</th>
                <th>Date</th>
                <th>Received</th>

            </tr>
        </thead>
        <tbody>
            <?php
                while($row = $stmtdonation->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr><td>";
                    echo(htmlentities($row['donationID']));
                    echo ("</td><td>");
                    echo(htmlentities($row['donorID']));
                    echo ("</td><td>");
                    echo(htmlentities($row['donationName']));
                    echo ("</td><td>");
                    echo (htmlentities($row['donationTypeID']));
                    echo ("</td><td>");
                    echo (htmlentities($row['donation_quantity']));
                    echo ("</td><td>");
                    echo (htmlentities($row['donation_description']));
                    echo ("</td><td>");
                    echo (htmlentities($row['date']));
                    echo ("</td><td>");
                    echo (htmlentities($row['date_received']));
                    echo ("</td></tr>");
                }

            ?>
        
        </tbody>
    </table>    
    </div>

   


    <?php include_once('components/myscript.php'); ?>
    <script>  
        //this is table Javascript
        $(document).ready(function () {
            $('#dataTableDon').DataTable();
        });
    </script>
    
</body>

</html>