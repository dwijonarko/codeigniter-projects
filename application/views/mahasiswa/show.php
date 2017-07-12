<!-- application/views/mahasiswa/show.php -->
<div class="container">
	<h1><?php echo $title ?></h1>
	<?php if ($this->session->flashdata('message')): ?>
		<div class="alert alert-success"><?php echo $this->session->flashdata('message'); ?></div>
	<?php endif; ?>
	<div class="pull-right">
		<a href="<?php echo site_url("mahasiswa/index") ?>" class="btn btn-primary">New</a>
	</div>
	<table class="table">
		<thead>
			<tr>
				<th>NIM</th>
				<th>Nama</th>
				<th>Tempat Lahir</th>
				<th>Tanggal Lahir</th>
				<th>Jenis Kelamin</th>
				<th>Alamat</th>
				<th>Program Studi</th>
				<th>Email</th>
				<th>Foto</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($mahasiswa as $row): ?>
				<tr>
					<td><?php echo $row->nim ?></td>
					<td><?php echo $row->nama ?></td>
					<td><?php echo $row->tmp_lahir ?></td>
					<td><?php echo $row->tgl_lahir ?></td>
					<td><?php echo $row->gender ?></td>
					<td><?php echo $row->alamat ?></td>
					<td><?php echo $row->jurusan ?></td>
					<td><?php echo $row->email ?></td>
					<td><img src="<?php echo base_url().$row->foto ?>" class="img-responsive"></td>
					<td>
						<a href="<?php echo base_url().'index.php/mahasiswa/edit/'.$row->nim; ?>" > Edit </a>
						<a href="<?php echo base_url().'index.php/mahasiswa/delete/'.$row->nim; ?>" > Delete </a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>