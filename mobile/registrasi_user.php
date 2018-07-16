<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <h2 class="well">Form Pendaftaran User</h2>
	<div class="col-lg-12 well">
	<div class="row">
				<form method="post" action="">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>ID User</label>
								<input type="text" class="form-control" name="id_user">
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Nama User</label>
								<input type="text" placeholder="Masukkan nama.." class="form-control" name="nm_user">
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Email</label>
								<input type="email" name="email_user" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Password</label>
								<input type="password" name="password_user" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Password</label>
								<input type="password" name="konfirm_pass" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>No. HP</label>
								<input type="number" name="nohp_user" class="form-control">
							</div>
						</div>
						<input type="submit" class="btn btn-md btn-info" name="btndaftar" value="Daftar">
					</div>
				</form> 
				</div>
			</div>
		</div>
		<?php
			if (isset($_POST['btndaftar']))
			{
				$connect = mysql_connect('localhost','root','','mydb') or die (mysql_error());
				mysql_select_db('mydb') or die ("Tidak ada Database yang dipilih !!");

				$id_user = $_REQUEST['id_user'];
				$nm_user = $_REQUEST['nm_user'];
				$email_user = $_REQUEST['email_user'];
				$password_user = $_REQUEST['password_user'];
				$konfirm_pass = $_REQUEST['konfirm_pass'];
				$nohp_user = $_REQUEST['nohp_user'];

				//Cek Password
				if ($password_user != $konfirm_pass)
				{
					echo "Password tidak sama";
					//redirect 
					header('location:regitrasi_user.php');
				}
				else
				{
					$sql = 'insert into users values 
					("'.$id_user.'", "'.$nm_user.'", "'.$email_user.'", "'.$password_user.'", "'.$nohp_user.'")';

					mysql_query($sql, $connect) or die ("SQL Error !!".mysql_error());
					echo "Registrasi berhasil, silahkan Login untuk melanjutkan";
					header('location:login_user.php');
				}

			}
		?>