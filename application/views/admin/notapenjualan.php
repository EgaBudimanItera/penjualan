<!DOCTYPE html>
<html>
<head>
	<title>Nota - Penjualan</title>
</head>
<body>
<?php 
	foreach($spare as $r){
		$nm = $r->nmsparepart;
	}
 ?>
<table width="20%" align="center">
	<tr>
		<td colspan="3" align="center"><u>NOTA PENJUALAN</u></td>
	</tr>
	<tr>
		<td colspan="3" align="center" style="border-bottom: 1px solid black">ASA COM<p>Jalan Teuku Umar No 16 Kedaton Bandar Lampung (0721) 788345</p></td>
	</tr>
	<tr><td colspan="3">&nbsp;</td></tr>
	<tr>
		<td><?php echo $nm; ?></td>
		<td><?php echo $this->session->userdata("jumlahitem") ?></td>
		<td align="right"><?php echo "Rp. ".number_format($this->session->userdata("harga")); ?></td>
	</tr>
	<tr><td colspan="3">&nbsp;</td></tr>
	<tr>
		<td style="border-top: 1px solid black" colspan="3" align="center">Terima Kasih.</td>
	</tr>
</table>

</body>
</html>