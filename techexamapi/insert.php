<?php
header("Content-Type:application/json");
if (isset($_POST['name']) && $_POST['name']!="")
{
	include('db.php');
	$name = $_POST['name'];
	$result = mysql_query("insert into tblnames(Name) values ('$name')",$con);
	if($result)
	{
		response(200,"New record inserted!");
		mysql_close($con);
	}
	else
	{
		response(200,"Error inserting record!");		
	}
}
else
{
	response(400,"Invalid request!");
}

function response($id,$name)
{
	$response['id'] = $id;
	$response['message'] = $name;
	
	$json_response = json_encode($response);
	echo $json_response;
}
?>


