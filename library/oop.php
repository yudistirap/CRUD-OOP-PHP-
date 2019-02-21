<?php 
	class oop{

		function simpan( $con,$table, $values){
			$sql = "INSERT INTO $table VALUES ($values)";
			$query = mysqli_query($con, $sql);

		}

		function hapus($con, $table, $where, $redirect,$values){
			$sql = mysqli_query($con,"DELETE FROM $table WHERE $where = $values");
			if ($sql) {
				echo "<script>alert('data kehapus');document.location.href = '$redirect'</script>";
			}else{
				echo printf("Error: %s\n", mysqli_error($con));
				exit();
			}
		}

		function tampil($con, $table){
			$sql = mysqli_query($con,"SELECT * FROM $table");
			$isi = [];
			while($data=mysqli_fetch_array($sql)){
				$isi[] = $data;
			}return $isi;
		}
		function edit($con, $table, $where, $values){
			$sql = mysqli_query($con,"SELECT * FROM $table WHERE $where = $values");
			$tampil = mysqli_fetch_array($sql);
			return $tampil;
		}
		function update($con, $table, $set, $where, $values, $redirect){
			$sql = mysqli_query($con,"UPDATE $table SET $set WHERE $where = $values");
			if ($sql) {
				echo "<script>alert('data berhasil diupdate');document.location.href='$redirect'</script>";
			}else{
				echo printf("ERROR: %s\n", mysqli_error($con));
			}
		}
	}
 ?>