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
              Master
              <small>Teknisi</small>
            </h3>
            <ul class="breadcrumb">
              <li>
                  <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
              </li>
              <li><a href="#">Teknisi</a><span class="divider-last">&nbsp;</span></li>
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
                  <h4><i class="icon-folder-close"></i> Teknisi</h4>
                  <span class="tools">
                  <a href="javascript:;" class="icon-chevron-down"></a>
                  <a href="javascript:;" class="icon-remove"></a>
                  </span>
                </div>
                <div class="widget-body">
                  <form id="simpan" method="POST" action="<?php echo base_url() ?>Adm_tek/add" class="form-horizontal">
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">ID Teknisi</label>
                        <div class="controls">
                           <input type="text" class="span6" id="inputWarning" value="<?php print_r($id); ?>" readonly name="idteknisi" />
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">Nama Teknisi</label>
                        <div class="controls">
                           <input type="text" class="span6" id="inputWarning" required name="nmteknisi" />
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="form-actions">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="button" class="btn">Cancel</button>
                     </div>
                  </form>
                  <form style="display: none;" id="ubah" method="POST" action="<?php echo base_url() ?>Adm_tek/edt" class="form-horizontal">
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">ID Teknisi</label>
                        <div class="controls">
                           <input type="text" class="span6" id="idteknisi" value="<?php print_r($id); ?>" readonly name="idteknisi" />
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">Nama Teknisi</label>
                        <div class="controls">
                           <input type="text" class="span6" id="nmteknisi" required name="nmteknisi" />
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="form-actions">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="button" onclick="batal();" class="btn">Cancel</button>
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
                            <h4><i class="icon-reorder"></i>Data</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                         <?php echo $this->session->flashdata("status"); ?>
                            <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                                <tr>
                                    <th>ID Teknisi</th>
                                    <th class="hidden-phone">Nama Teknisi</th>
                                    <th class="hidden-phone"></th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
if($tek>0){
  foreach($tek as $r){
?>                            
                                <tr class="odd gradeX">
                                    <td><?php echo $r->idteknisi; ?></td>
                                    <td class="hidden-phone"><?php echo $r->nmteknisi; ?></td>
                                    <td class="center hidden-phone">
                                      <div class="btn-group">
                                        <button class="btn btn-warning" onclick="edit('<?php echo $r->idteknisi; ?>','<?php echo $r->nmteknisi; ?>');">ubah</button>
                                        <a onclick="return confirm('Hapus Data Ini?')" class="btn btn-danger" href="<?php echo base_url() ?>Adm_tek/del/<?php echo $r->idteknisi ?>">hapus</a>
                                      </div>
                                    </td>
                                </tr>
<?php }}?>                                
                                </tbody>
                        </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE widget-->
                </div>
          </div>

<script type="text/javascript">
function edit(id,nm){

  document.getElementById('simpan').style.display='none';
  document.getElementById('ubah').style.display='';
  document.getElementById('idteknisi').value=id;
  document.getElementById('nmteknisi').value=nm;

}

function batal(){
  document.getElementById('simpan').style.display='';
  document.getElementById('ubah').style.display='none';
}
</script>          
                            
        </div>
        <!-- END PAGE CONTENT-->
      </div>
      <!-- END PAGE CONTAINER-->
    </div>
    <!-- END PAGE -->
      </div>
  <!-- END CONTAINER -->


<?php $this->load->view("partials/back/foot"); ?>