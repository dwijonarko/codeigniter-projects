<!DOCTYPE html>
<html>
<head>
	<title>Pendaftaran Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1>Input Data Mahasiswa</h1><hr>
	<?php if (isset($error)): ?>
		<div class="alert alert-danger"><?php echo $error ?></div>
	<?php endif ?>
    <form class="form-horizontal" action="<?php echo base_url()?>index.php/mahasiswa/create" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<div class="col-sm-3">
				<label for="nim">Nomor Induk Mahasiswa</label>
			</div>
			<div class="col-sm-8">
				<input type="text" name="nim" id="nim" class="form-control" placeholder="Nomor Induk Mahasiswa" >
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-3">
				<label for="nama">Nama Lengkap</label>
			</div>
			<div class="col-sm-8">
				<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Lengkap Mahasiswa" >
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-3">
				<label for="tmp_lahir">Tempat Lahir</label>
			</div>
			<div class="col-sm-8">
				<input type="text" name="tmp_lahir" id="tmp_lahir" class="form-control" placeholder="Tempat Lahir Mahasiswa" >
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-3">
				<label for="tgl_lahir">Tanggal Lahir</label>
			</div>
			<div class="col-sm-8">
				<input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-3">
				<label for="alamat">Alamat</label>
			</div>
			<div class="col-sm-8">
				<textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"></textarea>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-3">
				<label for="gender">Jenis Kelamin</label>
			</div>
            <div class="col-sm-8 radio">
                <label>
                    <input type="radio" name="gender" id="laki-laki" value="L"> Laki-Laki
                </label>
                <label>            
                    <input type="radio" name="gender" id="perempuan" value="P"> Perempuan
                </label>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-3">
				<label for="jurusan">Program Studi</label>
			</div>
			<div class="col-sm-8">
				<select name="jurusan" id="jurusan" class="form-control">
					<option value="TI" selected="selected">Teknik Informatika</option>
					<option value="TT">Teknik Telekomunikasi</option>
					<option value="TM">Teknik Mekatronika</option>
					<option value="TAB">Teknik Alat Berat</option>
				</select>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-3">
				<label for="email">E-mail</label>
			</div>
			<div class="col-sm-8">
				<input type="email" name="email" id="email" class="form-control" placeholder="Alamat E-mail Mahasiswa" >
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-3">
				<label for="foto">Foto</label>
			</div>
			<div class="col-sm-8">
				<input type="file" name="foto" id="foto" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-9 col-sm-offset-3">
				<button type="submit" class="btn btn-primary" name="submit">Submit</button>
			</div>
		</div>
	</form>	

	<script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
</body>
</html>
