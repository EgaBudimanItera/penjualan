<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Laporan Data Service</title>
</head>

<body>
	
<table width="100%" border="0" cellspacing="0" cellpadding="3">
    	<tr>
       	  <td style="border-bottom:1px solid black" width="8%"><img src="<?php echo base_url(); ?>assets/img/logoasa.jpg" alt="" width="104" height="76"></td>
          <td style="border-bottom:1px solid black" width="92%" align="left">LAPORAN DATA SERVICE<p>Jalan Teuku Umar No 16 Kedaton Bandar Lampung (0721) 788345</p></td>
        </tr>
        <tr>
        	<td colspan="2">Tanggal : <?php echo date("d M Y"); ?></td>
        </tr>	
    </table>
    <table width="100%" border="1" cellspacing="0" cellpadding="3">
    	<tr>
        	<td>No</td>
            <td>ID Service</td>
            <td>Tanggal Mulai Service</td>
            <td>Tanggal Selesai Service</td>
            <td>ID Order</td>
            <td>Teknisi</td>
            <td>Biaya</td>
        </tr>
<?php $no=1; if($ser>0){foreach($ser as $r){ ?>        
        <tr>
        	<td><?php echo $no++; ?></td>
            <td><?php echo $r->idservice; ?></td>
            <td><?php echo $r->tglmulaiservice; ?></td>
            <td><?php echo $r->tglselesaiservice; ?></td>
            <td><?php echo $r->idorder; ?></td>
            <td><?php echo $r->nmteknisi; ?></td>
            <td><?php echo "Rp. ".number_format($r->biaya); ?></td>
        </tr>
<?php }}?>        
    </table>
</body>
</html>