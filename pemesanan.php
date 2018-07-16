<script language="javascript">
function pesan()
{
    <!-- var pesanku = prompt ("Yakin Kode ini mau dihapus..?",""); !-->
    alert ("Yakin data ini mau dihapus..?");
}
</script>
<h2><legend>Daftar Pemesanan</legend></h2>
<div class="table-responsive">
    <table width="200" border="0"  align="center" class="table table-bordered" id="tabelpemesanan">
        <thead bgcolor="#CCCCCC">
            <tr class="info" align="center">
                <th><strong>ID </strong></th>
                <th><strong>Nama</strong></th>
                <th><strong>Email</strong></th>
                <th><strong>Alamat Penjemputan</strong></th>
                <th><strong>Tujuan</strong></th>
                <th><strong>User</strong></th>
                <th><strong>Driver</strong></th>
                <th><strong>Proses </strong></th>
            </tr>
        </thead>
        <tbody>
<?php
$connect = mysql_connect('localhost','root','') or die (mysql_error());
    mysql_select_db('mydb');
$sql="SELECT A.id, A.nama, A.email, A.alamat_jemput, A.tujuan,B.nm_user, C.nm_driver 
from pemesanan A 
INNER JOIN users B ON A.user_id = B.id_user
INNER JOIN driver C ON A.driver_id = C.id_driver
WHERE
A.user_id = B.id_user OR
A.driver_id = C.id_driver
ORDER BY A.id";
$qry=mysql_query($sql, $connect);
$nomor=0;
while ($data=mysql_fetch_array($qry))
{
    $x1=@$data['id_pemesanan'];
    $x2=@$data['nm_user'];
    $x3=@$data['email_user'];
    $x4=@$data['alamat_jemput'];
    $x5=@$data['tujuan'];
    $x6=@$data['nm_user'];
    $x7=@$data['nm_driver'];
    echo
    "<tr>
        <td align='center'>$x1</td>
        <td>$x2</td>
        <td>$x3</td>
        <td>$x4</td>
        <td>$x5</td>
        <td>$x6</td>
        <td>$x7</td>
        <td><a href=?panggil=proses_agama&kodehapus=$x1 onclick=pesan()>Hapus Data</a></td>
    </tr>";
}
?>
</tbody>
</table>