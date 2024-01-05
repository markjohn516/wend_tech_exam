<?php
header("Content-Type:application/json");
include('db.php');
$result = mysql_query("SELECT Id, Name FROM tblnames order by id desc limit 1",$con);
if($result)
{	
	$row = mysql_fetch_assoc($result);
	
	$name = $row['Name'];
	$id = $row['Id'];
	$data = response($id, $name); 
	
	echo json_encode($data);
	mysql_close($con);
}
else
{
	response(200,"No Record Inserted");		
}

function response($id,$name)
{
	$response['id'] = $id;
	$response['name'] = $name;
	
	return $response;
}
?>



