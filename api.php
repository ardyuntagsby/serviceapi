<?php
require_once "method.php";
$api = new Api();
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
	case 'GET':
			if(!empty($_GET["id"]))
			{
				$id=intval($_GET["id"]);
				$api->get_barangid($id);
			}
			else
			{
				$api->get_barang();
			}
			break;
	case 'POST':
			if(!empty($_GET["id"]))
			{
				$id=intval($_GET["id"]);
				$api->update_barang($id);
			}
			else
			{
				$api->insert_barang();
			}		
			break; 
	case 'DELETE':
		    $id=intval($_GET["id"]);
            $api->delete_barang($id);
            break;
	default:
		// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
		break;
}




?>