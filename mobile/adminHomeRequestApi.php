<?php 
    $db = mysqli_connect('localhost','root','','fido');

	if(!$db){
		echo "database failed";
	}
    // $orgname = mysqli_real_escape_string($db,$_POST['orgname']);
    $sql = $db->query("SELECT * FROM admin_request_view ORDER BY requestDate ASC and Urgent DESC");

    $result = array();

    while($rowdata = $sql->fetch_assoc()){
        $result[] = $rowdata; 
    }
    echo json_encode($result);



?>