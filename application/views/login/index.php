<!-- application/views/login/index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?php echo base_url() ?>/css/bootstrap.min.css">
	<title>Login dengan codeigniter</title>
</head>
<body>
	<div class="container">
		<div class="row ">
			<div class="col-md-12 center-block ">
			<h2>Form Login</h2>
			<?php if ($this->session->flashdata('error')): ?>
				<div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
			<?php endif; ?>
			<form method="POST" action="<?php echo base_url() ?>index.php/login/proses" class="form form-horizontal">
				<div class="form-group">
					<label for="username" class="control-label col-md-2">Username</label>
					<div class="col-md-4">
						<input type="text" class="form-control" name="username" id="username" placeholder="Username">
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="control-label col-md-2">Password</label>
					<div class="col-md-4">
						<input type="password" class="form-control" name="password" id="password" placeholder="Password">
					</div>
				</div>
				<div class="col-md-offset-2">
					<button type="submit" class="btn btn-primary">Login</button>
					<button type="reset" class="btn btn-warning">Batal</button>
				</div>
			</form>
			</div>
		</div>
	</div>
</body>
</html>