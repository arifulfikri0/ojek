 <script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete, autocomplete2;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});
        autocomplete2 = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete2')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
        autocomplete2.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();
        var place = autocomplete2.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
            autocomplete2.setBounds(circle.getBounds());
          });
        }
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDO-RH5OiTfvE7GaA8aNMs8zLsxpkVM5uE&libraries=places&callback=initAutocomplete" async defer></script>

<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">PEMESANAN</h2>
    </div>
                    <!-- /.col-lg-12 -->
</div>
                <!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <form method="post" action="">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-6 form-group">
                <label>ID Pemesanan</label>
                <input type="text" placeholder="" class="form-control" name="id_pemesanan">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 form-group">
                <label>Nama User</label>
                <input type="text" placeholder="" class="form-control" name="nm_user" value="<?php echo $nm_user;?>">
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
                <label>Lokasi Penjemputan</label>
                <input type="text" name="lokasi" id="autocomplete" class="form-control" onfocus="geolocate()">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 form-group">
                <label>Tujuan</label>
                <input type="text" name="tujuan" id="autocomplete2" class="form-control" onfocus="geolocate()">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 form-group">
                <label>Driver</label>
                <?php
                require_once('./config.php');
                echo"<select class='form-control' name =cb_driver>";
                $sql="select * from driver";
                $data=mysql_query($sql) or die ("database tidak bisa dibuka");
                while($i=mysql_fetch_array($data))
                {
                echo"<option value=$i[id_driver]>$i[nm_driver]</option>";
                }
                echo"</select>";
                ?>
              </div>
            </div>
            <input type="submit" class="btn btn-md btn-info" name="btnpesan" value="Pesan"> <input value="Batal" type="reset" class="btn btn-md btn-danger">
          </div>
        </form> 
    </div>
</div>

<?php
            if (isset($_POST['btnpesan']))
            {
                $connect = mysql_connect('localhost','root','','mydb') or die (mysql_error());
                mysql_select_db('mydb') or die ("Tidak ada Database yang dipilih !!");

                //$id_driver = $_REQUEST['driver_id'];
                $user_id = @$_POST['user_id'];
                $id_pemesanan = $_POST['id_pemesanan'];
                $nm_user = $_POST['nm_user'];
                $email_user = $_POST['email_user'];
                $lokasi = $_POST['lokasi'];
                $tujuan = $_POST['tujuan'];
                $driver_id = @$_POST['driver_id'];

                //Cek Password
                if ($nm_user == NULL)
                {
                    echo "Nama tidak boleh kosong";
                    //redirect 
                    header('location:?user=pemesanan');
                }
                else
                {
                    $sql = 'insert into pemesanan (id, nama, email, alamat_jemput, tujuan, driver_id, user_id) values 
                    ("'.$id_pemesanan.'", "'.$nm_user.'", "'.$email_user.'", "'.$lokasi.'", "'.$tujuan.'", "'.$driver_id.'", "'.$user_id.'")';

                    mysql_query($sql, $connect) or die ("SQL Error !!".mysql_error());
                    echo "Pemesanan berhasil !!";
                }

            }
        ?>