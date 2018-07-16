<script language="javascript">
function pesan()
{
	<!-- var pesanku = prompt ("Yakin Kode ini mau dihapus..?",""); !-->
	alert ("Yakin data ini mau dihapus..?");
}
</script>
<h2><legend>Daftar Driver</legend></h2>
<div class="table-responsive">
	<table width="200" border="0"  align="center" class="table table-bordered" id="tabelagama">
		<thead bgcolor="#CCCCCC">
			<tr class="info" align="center">
				<th><strong>ID </strong></th>
				<th><strong>Nama</strong></th>
				<th><strong>Email</strong></th>
				<th><strong>No. HP</strong></th>
				<th><strong>Jenkel</strong></th>
				<th colspan="2"><strong>Proses </strong></th>
			</tr>
		</thead>
		<tbody>
<?php
require_once('./config.php');
$sql="select * from driver";
$qry=mysql_query($sql);
$nomor=0;
while ($data=mysql_fetch_array($qry))
{
	$x1=@$data['id_driver'];
	$x2=@$data['nm_driver'];
	$x3=@$data['email_driver'];
	$x4=@$data['nohp_driver'];
	$x5=@$data['jenkel'];
	echo
	"<tr>
		<td align='center'>$x1</td>
		<td>$x2</td>
		<td>$x3</td>
		<td>$x4</td>
		<td>$x5</td>
		<td><a href=?panggil=edit_agama&kodeedit=$x1>Edit</a></td>
		<td><a href=?panggil=proses_agama&kodehapus=$x1 onclick=pesan()>Hapus Data</a></td>
	</tr>";
}
?>
</tbody>
</table>