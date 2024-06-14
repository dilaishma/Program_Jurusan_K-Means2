<html>
<head>
	<title>Penentuan jurusan pada SMKN 1 muaro jambi dengan menggunakan metode k-means clustering</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
 
	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Siswa.xls");
	?>
 
	<center>
		<h1>DATA SISWA SMKN 1 MUARO JAMBI</h1>
	</center>
 
	<table border="1">
		<tr>
			<th>#</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>B INDO</th>
            <th>B INGGRIS</th>
            <th>MTK</th>
            <th>FISIKA</th>
            <th>BIOLOGI</th>
        </tr>
        <?php
        $no = 1;
        include '../koneksi.php';
        $query = mysqli_query($koneksi, "SELECT data_nilai.*, data_siswa.* FROM data_nilai, data_siswa WHERE data_nilai.nis = data_siswa.nis");
        while($data = mysqli_fetch_array($query)){
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $data['nis'] ?></td>
            <td><?= $data['nama_siswa'] ?></td>
            <td><?= $data['c1'] ?></td>
            <td><?= $data['c2'] ?></td>
            <td><?= $data['c3'] ?></td>
            <td><?= $data['c4'] ?></td>
            <td><?= $data['c5'] ?></td>
        </tr>
        <?php } ?>
	</table>
</body>
</html>