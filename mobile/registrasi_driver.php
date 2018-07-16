<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <h2 class="well">Form Pendaftaran Driver</h2>
	<div class="col-lg-12 well">
	<div class="row">
				<form method="post" action="">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>ID Driver</label>
								<input type="text" placeholder="Masukkan nama.." class="form-control" name="id_driver">
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Nama Driver</label>
								<input type="text" placeholder="Masukkan nama.." class="form-control" name="nm_driver">
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Email</label>
								<input type="text" name="email_driver" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Password</label>
								<input type="password" name="password_driver" class="form-control">
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
								<input type="number" name="nohp_driver" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Jenis Kelamin</label>
								<select class="form-control" name="jenkel">
									<option>Laki - Laki</option>
									<option>Perempuan</option>
								</select>
							</div>
						</div>
					<input type="submit" class="btn btn-lg btn-info" name="btndaftar" value="Daftar">				
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
				
				$id_driver = $_REQUEST['id_driver'];
				$nm_driver = $_REQUEST['nm_driver'];
				$email_driver = $_REQUEST['email_driver'];
				$password_driver = $_REQUEST['password_driver'];
				$konfirm_pass = $_REQUEST['konfirm_pass'];
				$nohp_driver = $_REQUEST['nohp_driver'];
				$jenkel = $_REQUEST['jenkel'];

				//Cek Password
				if ($password_driver != $konfirm_pass)
				{
					echo "Password tidak sama";
					//redirect 
					header('location:regitrasi_driver.php');
				}
				else
				{
					$sql = 'insert into driver values 
					("'.$id_driver.'", "'.$nm_driver.'", "'.$email_driver.'", "'.$password_driver.'", "'.$nohp_driver.'", "'.$jenkel.'")';

					mysql_query($sql, $connect) or die ("SQL Error !!".mysql_error());
					echo "Registrasi berhasil, silahkan Login untuk melanjutkan";
					header('location:login_driver.php');
				}

			}
		?>