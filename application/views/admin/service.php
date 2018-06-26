<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view("partials/back/head");
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
              Transaksi
              <small>Service</small>
            </h3>
            <ul class="breadcrumb">
              <li>
                  <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
              </li>
              <li><a href="#">Service</a><span class="divider-last">&nbsp;</span></li>
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
                  <h4><i class="icon-folder-close"></i> Service</h4>
                  <span class="tools">
                  <a href="javascript:;" class="icon-chevron-down"></a>
                  <a href="javascript:;" class="icon-remove"></a>
                  </span>
                </div>
                <div class="widget-body">
                  <form id="simpan" method="POST" action="<?php echo base_url() ?>Adm_ser/add" class="form-horizontal">
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">ID Service</label>
                        <div class="controls">
                           <input type="text" class="span6" readonly value="<?php print_r($id); ?>" id="inputWarning" name="idservice" required/>
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">Tanggal Mulai Service</label>
                        <div class="controls">
                           <div class="controls">
                                <div class="input-append" id="ui_date_picker_trigger">
                                    <input type="text" class="m-wrap medium" name="tglmulaiservice" /><span class="add-on"><i class="icon-calendar"></i></span>
                                </div>
                            </div>
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">Tanggal Selesai Service</label>
                        <div class="controls">
                           <div class="controls">
                                <div class="input-append" id="ui_date_picker_trigger">
                                    <input type="text" class="m-wrap medium" name="tglselesaiservice" /><span class="add-on"><i class="icon-calendar"></i></span>
                                </div>
                            </div>
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">Order</label>
                        <div class="controls">
                           <select class="span6" name="idorder" required>
                             <option value="">Pilih Data Order</option>
                             <?php foreach($ord as $ro){ ?>
                             <option value="<?php echo $ro->idorder; ?>"><?php echo $ro->idorder."|".$ro->nmpelanggan; ?></option>
                             <?php } ?>
                           </select>
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">Teknisi</label>
                        <div class="controls">
                           <select class="span6" name="idteknisi" required>
                             <option value="">Pilih Teknisi</option>
                             <?php foreach($tek as $rt){ ?>
                             <option value="<?php echo $rt->idteknisi; ?>"><?php echo $rt->nmteknisi; ?></option>
                             <?php } ?>
                           </select>
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">Biaya</label>
                        <div class="controls">
                           <input type="text" class="span6" id="inputWarning" name="biaya" required/>
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">Keterangan Kerusakan</label>
                        <div class="controls">
                           <textarea class="span6" id="inputWarning" name="ketkerusakan" required></textarea>
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="form-actions">
                        <button type="submit" class="btn btn-success">Save</button>
                     </div>
                  </form>
                </div>
              </div>
              <!-- END SITE VISITS PORTLET-->
            </div>
          </div>                                         
          <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN EXAMPLE TABLE widget-->
                    <div class="widget">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i>Data Service</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                          <?php echo $this->session->flashdata("status"); ?>
                          <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                                <tr>
                                    <th>ID Service</th>
                                    <th class="hidden-phone">Tanggal Mulai Service</th>
                                    <th class="hidden-phone">Tanggal Selesai Service</th>
                                    <th class="hidden-phone">ID Order</th>
                                    <th class="hidden-phone">Teknisi</th>
                                    <th class="hidden-phone">Biaya Total</th>
                                    <th class="hidden-phone">B. Perusahaan</th>
                                    <th class="hidden-phone">B. Teknisi</th>
                                    <th class="hidden-phone"></th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
if($ser>0){
  foreach($ser as $r){
?>                            
                                <tr class="odd gradeX">
                                    <td><?php echo $r->idservice; ?></td>
                                    <td class="hidden-phone"><?php echo $r->tglmulaiservice; ?></td>
                                    <td class="hidden-phone"><?php echo $r->tglselesaiservice; ?></td>
                                    <td class="hidden-phone"><?php echo $r->idorder; ?></td>
                                    <td class="center hidden-phone"><?php echo $r->nmteknisi; ?></td>
                                    <td class="center hidden-phone"><?php echo number_format($r->biaya); ?></td>
                                    <td class="center hidden-phone"><?php echo number_format($r->biaya * 60 / 100); ?></td>
                                    <td class="center hidden-phone"><?php echo number_format($r->biaya * 40 / 100); ?></td>
                                    <td class="center hidden-phone">
                                      <div class="btn-group">
                                        <a href="<?php echo base_url() ?>Adm_ser/Det_ser/<?php echo $r->idservice; ?>" class="btn btn-info">sparepart</a>
                                        <a target="_blank" onclick="return confirm('Pastikan Sparepart yang digunakan sudah terinput semua!')" href="<?php echo base_url() ?>Adm_ser/Fin_ser/<?php echo $r->idservice; ?>/<?php echo $r->idorder; ?>" class="btn btn-success">selesai</a>
                                        <a onclick="return confirm('Hapus Data Ini?')" class="btn btn-danger" href="<?php echo base_url() ?>Adm_ser/del/<?php echo $r->idservice; ?>">hapus</a>
                                      </div>
                                    </td>
                                </tr>
<?php }}?>                                
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE widget-->
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