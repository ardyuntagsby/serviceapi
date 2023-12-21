<?php
class Service 
	{

		public  function get_barang()
		{
			require_once "config.php";
			$query = mysqli_query($con, "Select * from service");
			$data = array(); 
			while($row = mysqli_fetch_array($query)){
				array_push($data, array(
				  'id' => $row['id'],
				  'nama' => $row['nama'],
				  'harga' => $row['harga'],
				  'promo' => $row['promo'],
				  'gambar' => $row['gambar'] 
			   ));
			}
			$response=array(
										'status' => 200,
										'message' =>'Success',
										'data' => $data
									);
			header('Content-Type: application/json');
			echo json_encode($response);
		}

		public function get_barangid($id=0)
		{
			require_once "config.php";
			$query = mysqli_query($con, "Select * from service");
			if($id != 0)
			{
				$query = mysqli_query($con, "Select * from service WHERE id='$id'");;
			}
			$data=array();
			$data = array(); 
			while($row = mysqli_fetch_array($query)){
				array_push($data, array(
				  'id' => $row['id'],
				  'harga' => $row['harga'],
				  'promo' => $row['promo'],
				  'gambar' => $row['gambar'] 
			   ));
			}
			$response=array(
										'status' => 200,
										'message' =>'Success',
										'data' => $data
									);
			header('Content-Type: application/json');
			echo json_encode($response);
			 
		}

		public function insert_barang($nama,$harga,$promo)
			{
				require_once "config.php";
				$insert = array('nama' => $nama, 'harga' => $harga, 'promo' => $promo);
			
				$hitung = count(array_intersect_key($_POST, $insert));
				
				if($hitung == count($insert)){
				
						$result = mysqli_query($con, "INSERT INTO service SET
						nama = '$_POST[nama]',
						harga = '$_POST[harga]',
						promo = '$_POST[promo]'");
						
						if($result)
						{
							$response=array(
								'status' => 200,
								'message' =>'Data sudah berhasil ditambahkan.'
							);
						}
						else
						{
							$response=array(
								'status' => 400,
								'message' =>'Data gagal ditambahkan'
							);
						}
				}else{
					$response=array(
								'status' => 0,
								'message' =>'Parameter tidak sesuai'
							);
				}
				header('Content-Type: application/json');
				echo json_encode($response);
			}

		function update_barang($id)
			{
				global $mysqli;
				$arrcheckpost = array('nim' => '', 'nama' => '', 'jk' => '', 'alamat' => '', 'jurusan'   => '');
				$hitung = count(array_intersect_key($_POST, $arrcheckpost));
				if($hitung == count($arrcheckpost)){
				
					$result = mysqli_query($mysqli, "UPDATE tbl_mahasiswa SET
					nim = '$_POST[nim]',
					nama = '$_POST[nama]',
					jk = '$_POST[jk]',
					alamat = '$_POST[alamat]',
					jurusan = '$_POST[jurusan]'
					WHERE id='$id'");
			   
					if($result)
					{
						$response=array(
							'status' => 1,
							'message' =>'Mahasiswa Updated Successfully.'
						);
					}
					else
					{
						$response=array(
							'status' => 0,
							'message' =>'Mahasiswa Updation Failed.'
						);
					}
				}else{
					$response=array(
								'status' => 0,
								'message' =>'Parameter Do Not Match'
							);
				}
				header('Content-Type: application/json');
				echo json_encode($response);
			}

		function delete_barang($id)
		{
			require_once "config.php";
			$query="DELETE FROM service WHERE id=".$id;
			if(mysqli_query($con, $query))
			{
				$response=array(
					'status' => 1,
					'message' =>'Barang Deleted Successfully.'
				);
			}
			else
			{
				$response=array(
					'status' => 0,
					'message' =>'barang Deletion Failed.'
				);
			}
			header('Content-Type: application/json');
			echo json_encode($response);
		}
	}

 ?>