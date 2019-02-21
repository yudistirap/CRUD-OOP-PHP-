<?php 
	include "config/koneksi.php";
	include "library/oop.php";

	$redirect = "siswa.php";
	$oop = new oop();
	$table = "siswa";
	@$values = "'$_POST[nis]','$_POST[nama]'";

	if (isset($_POST['simpan'])){
		$oop->simpan($con,$table,$values);
	}

	if (isset($_GET['hapus'])) {
		$where = "nis";
		$values = "'$_GET[nis]'";
		$oop->hapus($con,$table,$where,$redirect,$values);
	}

	if (isset($_GET['edit'])) {
		$where = "nis";
		@$values = "'$_GET[nis]'";
		$e=$oop->edit($con, $table, $where, $values);
	}

	if (isset($_POST['update'])) {
		$where = "nis";
		@$values = "'$_GET[nis]'";
		$set = "nis='$_POST[nis]',nama='$_POST[nama]'";
		$oop->update($con,$table,$set,$where,$values,$redirect);
	}

 ?>

<form method="post">
	<table align="center" border="1">
		<tr>
			<td>NIS</td>
			<td>:</td>
			<td><input type="number" name="nis" required placeholder="NIS" value="<?php echo $e['nis'] ?>"></td>
		</tr>
		<tr>
			<td>NAMA</td>
	 		<td>:</td>
			<td><input type="text" name="nama" required placeholder="NAMA" value="<?php echo @$e['nama'] ?>"></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><input type="submit" name="simpan" value="KLIK!">
				<input type="submit" name="update" value="UPDATE"></td>
		</tr>
	</table>
</form>



<table align="center" border="1">

	<tr>
		<th>NO</th>
		<th>NIS</th>
		<th>NAMA</th>
		<th colspan="2">AKSI</th>
	</tr>
		<?php 
		$no = 0;
		$b = $oop->tampil($con,$table);
		foreach ($b as $c) {
			$no++;
		 ?>
		 <tr>
		 	<td><?php echo $no; ?></td>
		 	<td><?php echo $c[0]; ?></td>
		 	<td><?php echo $c[1]; ?></td>
		 	<td><a onclick="return confirm('Yakin ingin dihapus?')" href="siswa.php?hapus&nis= <?php echo $c[0]; ?>">HAPUS</a></td>
		 	<td><a href="siswa.php?edit&nis=<?php echo $c[0]; ?>">EDIT</a></td>
		 </tr>
		<?php } ?>
	</table>