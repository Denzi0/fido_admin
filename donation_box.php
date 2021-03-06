<!DOCTYPE html>
<html>
<head>
    <?php 
        include_once("components/header.php");
        require_once("databaseConn.php");
        session_start();
        if(empty($_SESSION['access'])){
             header("Location: index.php");
                    die();
        }
        $stmtdonation_box = $pdo->query("SELECT * FROM donation_box");
        $stmtdonation_box_view = $pdo->query("SELECT * FROM donation_box_view");
    ?>
    <title>Donations</title>

</head>
<body>
    <?php include_once('components/navigation.php')?>
    <?php include_once('components/navbar.php')?>
    <div class="container-fluid">
   
        
   
    <table id="dataTableDonationBoxView" class="text-center table table-striped table-bordered table-responsive " style="width:100%">
        <h2 id="donorDonation">Donation Box</h2>
        <thead class="thead-dark">
            <tr>
                <th>Donation Box ID</th>
                <th>Request ID</th>
                <th>orgName</th>
                <th>Request Name</th>
                <th>Request quantity</th>
                <th>Request Status</th>
                <th>donationID</th>
                <th>donorName</th>
                <th>donation Name</th>
                <th>donation quantity</th>
                <th>donation Status</th>
                <th>date Recieved</th>
                <th>orgFeedback</th>
                <th>Status</th>
                <!-- <th>Action</th> -->

            </tr>
        </thead>
        <tbody>
            <?php
                while($row = $stmtdonation_box_view->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr><td>";
                    echo(htmlentities($row['donation_boxID']));
                    echo ("</td><td>");
                    echo(htmlentities($row['requestID']));
                    // echo ("</td><td>");
                    // echo(htmlentities($row['orgID']));
                    echo ("</td><td>");
                    echo(htmlentities($row['orgName']));
                   
                    echo ("</td><td>");
                    echo(htmlentities($row['name']));
                      echo ("</td><td>");
                    echo(htmlentities($row['quantity']));
                     
                    echo ("</td><td class='text-white  bg-info'>");
                    if($row['requestStatus'] == '1'){
                        echo htmlentities("Pending");
                    }
                    if($row['requestStatus'] == '5'){
                        echo htmlentities("Approved");
                    }
                    if($row['requestStatus'] == '6') {
                        echo htmlentities("Dissapprove");
                    }
                    echo ("</td><td>");
                    echo(htmlentities($row['donationID'] ));
                    // echo ("</td><td>");
                    // echo(htmlentities($row['donorID']));
                    echo ("</td><td>");
                    echo(htmlentities($row['donorName']));
                    echo ("</td><td>");
                    echo(htmlentities($row['donationName']));
                     echo ("</td><td>");
                    echo(htmlentities($row['donation_quantity']));
                    
                    echo ("</td><td class='text-white bg-info'>");
                    if($row['donationStatus'] == '1'){
                        echo htmlentities("Pending");
                    }
                    if($row['donationStatus'] == '5'){
                        echo htmlentities("Approved");
                    }
                    if($row['donationStatus'] == '6') {
                        echo htmlentities("Dissapprove");
                    }
                    echo ("</td><td>");
                    echo(htmlentities($row['date_given']));
                    
                    echo ("</td><td>");
                    echo(htmlentities($row['orgFeedback']));
                    echo ("</td><td class='text-white bg-success'>");
                   
                    echo(htmlentities($row['statusDescription']));
                    // echo ("</td><td>");
                    // echo ('<a class="btn btn-primary" href="donation_boxUpdate.php?donation_boxID=' .$row['donation_boxID'].'&requestID=' .$row['requestID'].'&quantity=' .$row['donation_quantity'].'">Notify</a>');
                    echo ("</td></tr>");

                    // if($row['statusDescription'] == "Claimed By Organization"){
                    //     $sqlrequestupdate = "UPDATE donation_request SET quantity = :qty WHERE requestID =:id";
                    //     $stmtrequestupdate = $pdo->prepare($sqlrequestupdate);

                    //     $stmtrequestupdate->execute(array(
                    //     'qty' => $row['quantity'] - $row['donation_quantity'],
                    //     'id' => $row['requestID']
                    //     ));
                    // }
                }

            ?>
        
        </tbody>
    </table>    
    <button class="btn btn-primary" id="showDatabase">Show Database</button>

   <table id="dataTableDonationBox" class="text-center table table-striped table-bordered " style="width:100%">
        <!-- <h2 id="donorDonation">Donations</h2> -->
        <thead class="thead-dark">
            <tr>
                <th>Donation Box ID</th>
                <th>Request ID</th>
                <th>Donation ID</th>
                <th>Date Recieved</th>
                <th>Org feedback</th>

                <th>Status</th>
                <th>Action</th>
                

            </tr>
        </thead>
        <tbody>
            <?php
                while($row = $stmtdonation_box->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr><td>";
                    echo(htmlentities($row['donation_boxID']));
                    echo ("</td><td>");
                    echo(htmlentities($row['requestID']));
                    echo ("</td><td>");
                    echo(htmlentities($row['donationID']));
                    echo ("</td><td>");
                     echo(htmlentities($row['date_given']));
                    echo ("</td><td>");
                    echo(htmlentities($row['orgFeedback']));
                    echo ("</td><td>");
                    echo(htmlentities($row['statusID']));
                    // echo ("</td><td>");
                    // echo ('<a class="btn btn-primary" href="donation_boxUpdate.php?donation_boxID=' .$row['donation_boxID'] . '">Notify</a>');
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
            $('#dataTableDonationBox').DataTable();
            $('#showDatabase').click(function(){
                
                $('#dataTableDonationBox').parents('div.dataTables_wrapper').first().toggle();
            });
        });
    </script>
    <script>  
        //this is table Javascript
        $(document).ready(function () {
            $('#dataTableDonationBoxView').DataTable();
           
        });
    </script>
</body>

</html>