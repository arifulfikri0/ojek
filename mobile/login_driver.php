<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <h2 class="well">Login Driver</h2>
  <div class="col-lg-12 well">
  <div class="row">
        <form method="post" action="proseslogin_driver.php">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-6 form-group">
                <label>Nama Driver</label>
                <input type="text" placeholder="Masukkan nama.." class="form-control" name="nm_driver">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 form-group">
                <label>Password</label>
                <input type="password" name="password_driver" class="form-control">
              </div>
            </div>
            <input type="submit" class="btn btn-md btn-info" name="btndaftar" value="Login"> <input value="Batal" type="reset" class="btn btn-md btn-danger">
          </div>
        </form> 
        </div>
      </div>
    </div>