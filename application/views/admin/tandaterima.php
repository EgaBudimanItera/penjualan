<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tanda Terima Service - Servis ASA COM</title>
</head>
<?php 

  foreach($ser as $r){
    $idservice = $r->idservice;
    $nmpelanggan = $r->nmpelanggan;
    $tglmulai = $r->tglmulaiservice;
    $tglselesai = $r->tglselesaiservice;
    $nmpelanggan = $r->nmpelanggan;
    $alamat = $r->alamat;
    $nmteknisi = $r->nmteknisi;
    $ket = $r->ketkerusakan;
    $telp = $r->telp;
    $biaya = $r->biaya;
  }

?>
<body>
<table width="50%" align="center" border="0">
  <tr>
  	<td width="22%"><img src="<?php echo base_url(); ?>assets/img/logoasa.jpg" alt="" width="104" height="76"></td>
    <td align="center" width="26%"><u>ASA COM</u><br>Jalan Teuku Umar No 16 Kedaton Bandar Lampung (0721) 788345</td>
    <td width="52%" align="right">Tanda Terima Service</td>
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
      <td width="17%">No Service</td>
      <td width="32%">:&nbsp;<?php echo $idservice; ?></td>
      <td width="22%">Pemilik</td>
      <td width="29%">:&nbsp;<?php echo $nmpelanggan; ?></td>
    </tr>
    <tr>
      <td>Tanggal</td>
      <td>:&nbsp;<?php echo $tglmulai; ?> S/D <?php echo $tglselesai; ?></td>
      <td>Alamat</td>
      <td>:&nbsp;<?php echo $alamat; ?></td>
    </tr>
    <tr>
      <td>Teknisi</td>
      <td>:&nbsp;<?php echo $nmteknisi; ?></td>
      <td>Telp</td>
      <td>:&nbsp;<?php echo $telp; ?></td>
    </tr>
    <tr>
      <td>Kerusakan</td>
      <td colspan="3">:&nbsp;<?php echo $ket; ?></td>
    </tr>
    <tr>
      <td colspan="4">Biaya : <?php echo "Rp. ".number_format($biaya); ?></td>
    </tr>
  </tbody>
</table><br>
<table width="50%" align="center" border="1" cellspacing="0" cellpadding="3">
  <tr>
    <td colspan="4">Sparepart :</td>
  </tr>
  <tr>
    <td>No</td>
    <td>Sparepart</td>
    <td>Jumlah</td>
    <td>Harga</td>
  </tr>  
<?php $no=1; if(!empty($detser)){ foreach($detser as $rw){?>
  <tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $rw->nmsparepart; ?></td>
    <td><?php echo $rw->jumlahitem; ?></td>
    <td><?php echo "Rp. ".number_format($rw->harga); ?></td>
  </tr>
<?php }}?>
  <tr>
    <td colspan="3">Total</td>
    <td><?php echo "Rp. ".number_format($sum[0]->harga); ?></td>
  </tr>
</table>
<table align="center" width="50%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td>Service Manager,</td>
      <td align="right">
      <p>Customer,</p></td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
</body>
</html>
