<script language="javascript">
function pesan()
{
	<!-- var pesanku = prompt ("Yakin Kode ini mau dihapus..?",""); !-->
	alert ("Yakin data ini mau dihapus..?");
}
</script>
<h2><legend>Daftar Pengguna</legend></h2>
<div class="table-responsive">
	<table width="200" border="0"  align="center" class="table table-bordered" id="tabelagama">
		<thead bgcolor="#CCCCCC">
			<tr class="info" align="center">
				<th><strong>ID </strong></th>
				<th><strong>Nama</strong></th>
				<th><strong>Email</strong></th>
				<th><strong>No. HP</strong></th>
				<th colspan="2"><strong>Proses </strong></th>
			</tr>
		</thead>
		<tbody>
<?php
//require_once('./config.php');
$connect = mysql_connect('localhost','root','') or die (mysql_error());
    mysql_select_db('mydb');
$sql="select * from users";
$qry=mysql_query($sql, $connect);
print_r($qry);
$nomor=0;
while ($data=mysql_fetch_array($qry))
{
	$x1=@$data['id_user'];
	$x2=@$data['nm_user'];
	$x3=@$data['email_user'];
	$x4=@$data['nohp_user'];
	echo
	"<tr>
		<td align='center'>$x1</td>
		<td>$x2</td>
		<td>$x3</td>
		<td>$x4</td>
		<td><a href=?panggil=edit_agama&kodeedit=$x1>Edit</a></td>
		<td><a href=?panggil=proses_agama&kodehapus=$x1 onclick=pesan()>Hapus Data</a></td>
	</tr>";
}
?>
</tbody>
</table>