<?php
require_once "service.php";
$service = new Service();
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
	case 'GET':
			if(!empty($_GET["id"]))
			{
				$id=intval($_GET["id"]);
				$service->get_barangid($id);
			}
			else
			{
				$service->get_barang();
			}
			break;
	case 'POST':
			if(!empty($_GET["id"]))
			{
				$id=intval($_GET["id"]);
				$service->update_barang($id);
			}
			else
			{
				$nama=$_GET["nama"];
				$harga=intval($_GET["harga"]);
				$promo=intval($_GET["promo"]);
				$service->insert_barang($nama,$harga,$promo);
			}		
			break; 
	case 'DELETE':
		    $id=intval($_GET["id"]);
            $service->delete_barang($id);
            break;
	default:
		// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
		break;
}




?>
<?php

//require_once('config.php');
//$query = mysqli_query($con, "Select * from service");

//$data = array(); 
//while($row = mysqli_fetch_array($query)){
//	array_push($data, array(
//      'id' => $row['id'],
//      'harga' => $row['harga'],
//      'promo' => $row['promo'],
//     'gambar' => $row['gambar'] 
//   ));
//}
//$response=array(
		//					'status' => 200,
		//					'message' =>'Success',
		//					'data' => $data
		//				);
		//header('Content-Type: application/json');
		//echo json_encode($response);
?>