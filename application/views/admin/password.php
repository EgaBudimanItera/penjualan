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
              Setting
              <small>Password</small>
            </h3>
            <ul class="breadcrumb">
              <li>
                  <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
              </li>
              <li><a href="#">Password</a><span class="divider-last">&nbsp;</span></li>
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
                  <h4><i class="icon-folder-close"></i> Password</h4>
                  <span class="tools">
                  <a href="javascript:;" class="icon-chevron-down"></a>
                  <a href="javascript:;" class="icon-remove"></a>
                  </span>
                </div>
                <div class="widget-body">
                  <form id="simpan" method="POST" action="<?php echo base_url() ?>Adm_pass/edt" class="form-horizontal">
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">Password Lama</label>
                        <div class="controls">
                           <input type="text" class="span6" id="inputWarning" name="passlama" required />
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">Password Baru</label>
                        <div class="controls">
                           <input type="text" class="span6" id="inputWarning" required name="passbaru" required />
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">Konfirmasi Password</label>
                        <div class="controls">
                           <input type="text" class="span6" id="inputWarning" required name="konfpass" />
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

           
        </div>
        <!-- END PAGE CONTENT-->
      </div>
      <!-- END PAGE CONTAINER-->
    </div>
    <!-- END PAGE -->
      </div>
  <!-- END CONTAINER -->


<?php $this->load->view("partials/back/foot"); ?>