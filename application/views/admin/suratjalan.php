<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Surat Jalan - Servis ASA COM</title>
</head>
<?php 

  foreach($srt as $r){
    $idorder = $r->idorder;
    $tglorder = $r->tglorder;
    $ket = $r->ketkerusakan;
    $nm = $r->nmpelanggan;
    $alamat = $r->alamat;
    $telp = $r->telp;
  }

?>
<body>
<table width="50%" align="center" border="0">
  <tr>
  	<td width="10%"><img src="<?php echo base_url(); ?>assets/img/logoasa.jpg" alt="" width="104" height="76"></td>
    <td align="center" width="20%"><u>ASA COM</u><br>SURAT JALAN</td>
    <td></td>
  </tr>
  <tr>
    <td colspan="3" style="border-bottom: 1px solid black"></td>
  </tr>
  <tr>
    <td colspan="3">Tanggal : <?php echo date("d M Y") ?></td>
  </tr>
</table>
<table width="50%" align="center" border="1" cellspacing="0" cellpadding="3">
  <tbody>
    <tr>
      <td width="14%">No Order</td>
      <td width="36%">:&nbsp;<?php echo $idorder; ?></td>
    </tr>
    <tr>
      <td>Tanggal Order</td>
      <td>:&nbsp;<?php echo $tglorder; ?></td>
    </tr>
    <tr>
      <td>Nama Pelanggan</td>
      <td>:&nbsp;<?php echo $nm; ?></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td>:&nbsp;<?php echo $alamat; ?></td>
    </tr>
    <tr>
      <td>No Telepon</td>
      <td>:&nbsp;<?php echo $telp; ?></td>
    </tr>
      <td>Est. Selesai</td>
      <td>:</td>
    </tr>
    <tr>
      <td>Kerusakan</td>
      <td>:&nbsp;<?php echo $ket; ?></td>
    </tr>
    <tr style="height: 100px;">
      <td>&nbsp;Keterangan:</td>
      <td></td>
    </tr>
  </tbody>
</table>
<table align="center" width="50%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td>Manager</td>
      <td align="right">
      <p><?php echo $nm; ?></p></td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
</body>
</html>
