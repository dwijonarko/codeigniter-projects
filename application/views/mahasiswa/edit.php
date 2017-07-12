<!-- application/views/template/edit.php -->
<div class="container">
	<h1><?php echo $title ?></h1><hr>
    <form class="form-horizontal" action="<?php echo base_url()?>index.php/mahasiswa/update" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<div class="col-sm-3">
				<label for="nim">Nomor Induk Mahasiswa</label>
			</div>
			<div class="col-sm-8">
				<input type="text" name="nim" id="nim" class="form-control" placeholder="Nomor Induk Mahasiswa" value="<?php echo $mahasiswa->nim ?>" readonly>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-3">
				<label for="nama">Nama Lengkap</label>
			</div>
			<div class="col-sm-8">
				<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Lengkap Mahasiswa" value="<?php echo $mahasiswa->nama ?>" >
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-3">
				<label for="tmp_lahir">Tempat Lahir</label>
			</div>
			<div class="col-sm-8">
				<input type="text" name="tmp_lahir" id="tmp_lahir" class="form-control" placeholder="Tempat Lahir Mahasiswa" value="<?php echo $mahasiswa->tmp_lahir ?>" >
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-3">
				<label for="tgl_lahir">Tanggal Lahir</label>
			</div>
			<div class="col-sm-8">
				<input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="<?php echo $mahasiswa->tgl_lahir ?>">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-3">
				<label for="alamat">Alamat</label>
			</div>
			<div class="col-sm-8">
				<textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"><?php echo $mahasiswa->alamat ?></textarea>
				
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-3">
				<label for="gender">Jenis Kelamin</label>
			</div>
            <div class="col-sm-8 radio">
                <label>
                    <input type="radio" name="gender" id="laki-laki" value="L" <?php echo $mahasiswa->gender=='L'?'checked':'' ?>> Laki-Laki
                </label>
                <label>
                    <input type="radio" name="gender" id="perempuan" value="P" <?php echo $mahasiswa->gender=='P'?'checked':'' ?>> Perempuan
                </label>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-3">
				<label for="jurusan">Program Studi</label>
			</div>
			<div class="col-sm-8">
				<select name="jurusan" id="jurusan" class="form-control">
					<option value="TI"  <?php echo $mahasiswa->jurusan=='TI'?'selected':'' ?> >Teknik Informatika</option>
					<option value="TT"  <?php echo $mahasiswa->jurusan=='TM'?'selected':'' ?> >Teknik Telekomunikasi</option>
					<option value="TM"  <?php echo $mahasiswa->jurusan=='TT'?'selected':'' ?> >Teknik Mekatronika</option>
					<option value="TAB"   <?php echo $mahasiswa->jurusan=='TAB'?'selected':'' ?> >Teknik Alat Berat</option>
				</select>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-3">
				<label for="email">E-mail</label>
			</div>
			<div class="col-sm-8">
				<input type="email" name="email" id="email" class="form-control" placeholder="Alamat E-mail Mahasiswa" value="<?php echo $mahasiswa->email ?>" >
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
</div>
