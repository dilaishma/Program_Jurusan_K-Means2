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
	header("Content-Disposition: attachment; filename=Data Hasil PenentuanCluster.xls");
	?>
 
	<center>
		<h1>DATA HASIL PENENTUAN KLUSTER PENYAKIT PUSKESMAS NGEMPLAK</h1>
	</center>
 
	<table border="1">
		<tr>
        <th>#</th>
                  <th>Nama Cluster</th>
                  <th>0-11 tahun</th>
                  <th>12-24 tahun</th>
                  <th>25-45 tahun</th>
                  <th>45-65 tahun</th>
                  <th>> 65 tahun</th>
                  <th>Perempuan</th>
                  <th>Laki-laki</th>
            <th>Kategori</th>
        </tr>
        <?php
        $no = 1;
        include '../koneksi.php';
        $ArrayNamaCluster = array();
        $queryNamaCluster = mysqli_query($koneksi, "SELECT * FROM data_cluster");
        while($dataNamaCluster = mysqli_fetch_array($queryNamaCluster)){
          array_push($ArrayNamaCluster, $dataNamaCluster['nama_cluster']);
        }
        $query = mysqli_query($koneksi, "SELECT data_hasil.*, data_nilai.*, data_siswa.* FROM data_hasil, data_nilai, data_siswa WHERE data_nilai.nis = data_siswa.nis AND data_hasil.id_nilai = data_nilai.id_nilai");
        while($data = mysqli_fetch_array($query)){
        	if($data['Cluster'] == "Cluster-1"){
                $jurusan = $ArrayNamaCluster[0];
            }elseif($data['Cluster'] == "Cluster-2"){
                $jurusan = $ArrayNamaCluster[1];
            }elseif($data['Cluster'] == "Cluster-3"){
                $jurusan = $ArrayNamaCluster[2];
            }
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
            <td><?= $data['c6'] ?></td>
            <td><?= $data['c7'] ?></td>
            <td><?= $jurusan ?></td>
        </tr>
        <?php } ?>
	</table>
</body>
</html>