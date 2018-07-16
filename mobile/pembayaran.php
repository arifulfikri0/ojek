<?php
require_once ('./config.php');
  $tanggal= mktime(date("m"),date("d"),date("Y"));
  sprintf(date("Y-m-d"))
?>
<script type="text/javascript">
    $(function() {
        $("#tanggal").datepicker({ dateFormat:'yy-mm-dd'});
 
    });
  </script>

<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">PEMBAYARAN</h2>
    </div>
                    <!-- /.col-lg-12 -->
</div>
                <!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <form method="post" action="">
          <input name="tanggal" id="hiddenbutton" type="hidden" value="<?php echo"$tanggal"; ?>" />
          <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-6 form-group">
                <label>ID Pembayaran</label>
                <input type="text" placeholder="" class="form-control" name="id_pembayaran">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 form-group">
                <label>Nama</label>
                <input type="text" placeholder="" class="form-control" name="nm_user">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 form-group">
                <label>Tanggal</label>
                <input type="text" name="tanggal" id="tanggal" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 form-group">
                <label>ID Pemesanan</label>
                <?php
                require_once('./config.php');
                echo"<select class='form-control' name =pemesanan_id>";
                $sql="select * from pemesanan";
                $data=mysql_query($sql) or die ("database tidak bisa dibuka");
                while($i=mysql_fetch_array($data))
                {
                echo"<option value=$i[id]>$i[id]</option>";
                }
                echo"</select>";
                ?>
              </div>
            </div>
            <input type="submit" class="btn btn-md btn-info" name="btnbayar" value="Bayar"> <input value="Batal" type="reset" class="btn btn-md btn-danger">
          </div>
        </form> 
    </div>
</div>

<?php
            if (isset($_POST['btnbayar']))
            {
                $connect = mysql_connect('localhost','root','','mydb') or die (mysql_error());
                mysql_select_db('mydb') or die ("Tidak ada Database yang dipilih !!");

                //$id_driver = $_REQUEST['driver_id'];
                $id_pembayaran = $_POST['id_pembayaran'];
                $nm_user = $_POST['nm_user'];
                $tanggal = $_POST['tanggal'];
                $pemesanan_id = @$_POST['pemesanan_id'];

                //Cek Password
                if ($nm_user == NULL)
                {
                    echo "Nama tidak boleh kosong";
                    //redirect 
                    header('location:?user=pemesanan');
                }
                else
                {
                    $sql = 'insert into pembayaran (id, nama, tanggal, pemesanan_id) values 
                    ("'.$id_pembayaran.'", "'.$nm_user.'", "'.$tanggal.'", "'.$pemesanan_id.'")';

                    mysql_query($sql, $connect) or die ("SQL Error !!".mysql_error());
                    echo "Pembayaran berhasil !!";
                }

            }
        ?>