<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view("partials/back/head");
?>

<?php 
	function month($i){
		switch ($i) {
			case '01':
				$bln = "Januari";
				break;
			case '02':
				$bln = "Februari";
				break;
			case '03':
				$bln = "Maret";
				break;
			case '04':
				$bln = "April";
				break;
			case '05':
				$bln = "Mei";
				break;
			case '06':
				$bln = "Juni";
				break;
			case '07':
				$bln = "Juli";
				break;
			case '08':
				$bln = "Agustus";
				break;
			case '09':
				$bln = "September";
				break;
			case '10':
				$bln = "Oktober";
				break;
			case '11':
				$bln = "November";
				break;
			case '12':
				$bln = "Desember";
				break;
			default:
				$bln = 'TAKADA';
				break;
		}
		return $bln;
	}
?>

		<!-- BEGIN PAGE -->
		<div id="main-content">
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">
                        
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->
						<h3 class="page-title">
							Report
							<small>Grafik</small>
						</h3>
						<ul class="breadcrumb">
							<li>
                                <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
							</li>
							<li><a href="#">Grafik</a><span class="divider-last">&nbsp;</span></li>
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div id="page" class="dashboard">              
                                       
					<div class="row-fluid">
						<div class="span12">
							<!-- BEGIN SITE VISITS PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-bar-chart"></i> Grafik</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="javascript:;" class="icon-remove"></a>
									</span>
								</div>
								<div class="widget-body">
								<!-- BEGIN FORM-->
		                          <form action="<?php echo base_url() ?>Adm_graf/src" method="POST" class="form-horizontal form-row-seperated">
		                              <div class="control-group primary">
				                        <label class="control-label" for="inputWarning">Tahun</label>
				                        <div class="controls">
				                           <select class="span6" name="tahun" required>
				                             <option value="">Pilih Tahun</option>
				                             <?php foreach($thn as $ro){ ?>
				                             <option value="<?php echo $ro->tahun; ?>"><?php echo $ro->tahun; ?></option>
				                             <?php } ?>
				                           </select>
				                           <span class="help-inline"></span>
				                        </div>
				                     </div>
		                              <button type="submit" class="btn btn-success">CARI</button>
		                              <a href="<?php echo base_url() ?>Adm_graf" class="btn btn-info">RESET</a>
		                          </form>
		                          <!-- END FORM-->
		                          <?php echo $this->session->flashdata("status"); ?>
<script type="text/javascript" src="<?php echo base_url();?>assets/chart/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/chart/js/highcharts.js"></script>
<script type="text/javascript">
$(function () {
    var chart;
    var chart2;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'content',
                type: 'column',
                marginRight: 130,
                marginBottom: 35
            },
            title: {
                text: 'Grafik Statistik Penjualan',
                x: -20 //center
            },
            subtitle: {
                text: 'penjualan sparepart',
                x: -20
            },
            xAxis: {
                categories: [
                  <?php if($pjl>0){foreach($pjl as $r){ ?>
                  	'<?php echo month($r->bln); ?>',
                  <?php }} ?>
                ]
            },
            yAxis: {
                title: {
                    text: 'nilai dalam Persentase'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y ;
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 1
            },
            series: [{
                name: 'Penjualan',
                data: [
                  <?php if(!empty($pjl)){foreach($pjl as $r){ ?>
                  	<?php echo $r->total; ?>,
                  <?php }} ?>
                ]
            }]
        });

        chart2 = new Highcharts.Chart({
            chart: {
                renderTo: 'content2',
                type: 'column',
                marginRight: 130,
                marginBottom: 35
            },
            title: {
                text: 'Grafik Statistik Service',
                x: -20 //center
            },
            subtitle: {
                text: 'layanan service',
                x: -20
            },
            xAxis: {
                categories: [
                  <?php if($ser>0){foreach($ser as $r){ ?>
                  	'<?php echo month($r->bulan); ?>',
                  <?php }} ?>
                ]
            },
            yAxis: {
                title: {
                    text: 'nilai dalam Persentase'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y ;
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 1
            },
            series: [{
                name: 'Service',
                data: [
                  <?php if($ser>0){foreach($ser as $r){ ?>
                  	<?php echo $r->total; ?>,
                  <?php }} ?>
                ]
            }]
        });
    });

});
$(function () {
    var chart;
    $(document).ready(function() {        
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'content2',
                type: 'column',
                marginRight: 130,
                marginBottom: 35
            },
            title: {
                text: 'Grafik Statistik Service',
                x: -20 //center
            },
            subtitle: {
                text: 'layanan service',
                x: -20
            },
            xAxis: {
                categories: [
                  <?php if(!empty($ser)){foreach($ser as $r){ ?>
                  	'<?php echo month($r->bulan); ?>',
                  <?php }} ?>
                ]
            },
            yAxis: {
                title: {
                    text: 'nilai dalam Persentase'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y ;
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 1
            },
            series: [{
                name: 'Service',
                data: [
                  <?php if(!empty($ser)){foreach($ser as $r){ ?>
                  	<?php echo $r->total; ?>,
                  <?php }} ?>
                ]
            }]
        });
    });

});
</script>
<div id="content" ></div>									
<div id="content2" ></div>									
								</div>
							</div>
							<!-- END SITE VISITS PORTLET-->
						</div>
                    </div>

					
                  					
				</div>
				<!-- END PAGE CONTENT-->
			</div>
			<!-- END PAGE CONTAINER-->
		</div>
		<!-- END PAGE -->
	    </div>
	<!-- END CONTAINER -->


<?php $this->load->view("partials/back/foot"); ?>