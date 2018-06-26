<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Laporan Data Penjualan</title>
</head>

<body>
	
<table width="100%" border="0" cellspacing="0" cellpadding="3">
    	<tr>
       	  <td style="border-bottom:1px solid black" width="8%"><img src="<?php echo base_url(); ?>assets/img/logoasa.jpg" alt="" width="104" height="76"></td>
          <td style="border-bottom:1px solid black" width="92%" align="left">LAPORAN DATA PENJUALAN<p>Jalan Teuku Umar No 16 Kedaton Bandar Lampung (0721) 788345</p></td>
        </tr>
        <tr>
        	<td colspan="2">Tanggal : <?php echo date("d M Y"); ?></td>
        </tr>	
    </table>
    <table width="100%" border="1" cellspacing="0" cellpadding="3">
    	<tr>
        	<td>No</td>
            <td>ID Penjualan</td>
            <td>Tanggal Penjualan</td>
            <td>Nama Sparepart</td>
            <td>Jumlah Item</td>
            <td>Harga</td>
        </tr>
<?php $no=1; if($pjl>0){foreach($pjl as $r){ ?>        
        <tr>
        	<td><?php echo $no++; ?></td>
            <td><?php echo $r->idpenjualan; ?></td>
            <td><?php echo $r->tglpenjualan; ?></td>
            <td><?php echo $r->nmsparepart; ?></td>
            <td><?php echo $r->jumlahitem; ?></td>
            <td><?php echo "Rp. ".number_format($r->harga); ?></td>
        </tr>
<?php }}?>        
    </table>
</body>
</html>