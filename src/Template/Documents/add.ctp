<?php
if(isset($disabled))
$is_disabled = 'disabled="disabled"';
else
$is_disabled = '';
?>
<h3 class="page-title">
			Add/Edit Doccument
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo $this->request->webroot;?>">Dashboard</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="">Add/Edit Documents
                        </a>
					</li>
				</ul>
				
			</div>
            <div class="row">
				<div class="col-md-12">
					<div class="portlet box blue" id="form_wizard_1">
						<div class="portlet-title">
                        <?php
                                        $param = $this->request->params['action'];
                                        $tab = 'nodisplay';
                                        ?>
							<div class="caption">
								<i class="fa fa-gift"></i> <?php if($param == 'view')?>Document - <span class="step-title">
								View </span>
							</div>
							
						</div>
						<div class="portlet-body form">
							<form action="#" class="form-horizontal" id="submit_form" method="POST">
								<div class="form-wizard">
									<div class="form-body">
                                        <?php
                                        
                                        if($param !='view')
                                        {
                                            $tab = 'tab-pane';
                                            ?>
                                            
										<ul class="nav nav-pills nav-justified steps">
											<li>
												<a href="#tab1" data-toggle="tab" class="step">
												<span class="number">
												1 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Document info </span>
												</a>
											</li>
											<li>
												<a href="#tab2" data-toggle="tab" class="step">
												<span class="number">
												2 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Attachments </span>
												</a>
											</li>
											<li>
												<a href="#tab3" data-toggle="tab" class="step active">
												<span class="number">
												3 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Sub-document </span>
												</a>
											</li>
											<li>
												<a href="#tab4" data-toggle="tab" class="step">
												<span class="number">
												4 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Finalize </span>
												</a>
											</li>
										</ul>
										<div id="bar" class="progress progress-striped" role="progressbar">
											<div class="progress-bar progress-bar-info">
											</div>
										</div>
                                        <?php
                                        }
                                        ?>
										<div class="tab-content">
											<div class="alert alert-danger display-none">
												<button class="close" data-dismiss="alert"></button>
												You have some form errors. Please check below.
											</div>
											<div class="alert alert-success display-none">
												<button class="close" data-dismiss="alert"></button>
												Your form validation is successful!
											</div>
											<div class="<?php echo $tab;?> <?php if($tab=='tab-pane'){?>active<?php }?>" id="tab1">
												<h3 class="block">Provide the document information</h3>
												<div class="form-group">
													<label class="control-label col-md-3">Document type <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<select <?php echo $is_disabled;?> id="document_type" class="form-control" name="document_type">
                                                        <option value="">Choose Document Type</option>
                                                        <option value="contract">Contracts</option>
                                                        <option value="evidence">Evidence</option>
                                                        <option value="template">Templates</option>
                                                        <option value="report">Report</option>
                                                        <option value="siteOrder">Site Orders</option>
                                                        <option value="training">Training</option>
                                                        <option value="employee">Employee</option>
                                                        <option value="KPIAudits">KPI Audits</option>
                                                        <option value="deployment_rate">Deployment</option>
                                                        <option value="orders">Orders</option>
                                                        </select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Uploaded by <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input <?php echo $is_disabled;?> type="text" class="form-control" name="" id="" value="Admin" disabled="" />
														<span class="help-block">
														Provide your password. </span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Uploaded on <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input <?php echo $is_disabled;?> type="text" class="form-control" name="" value="<?php echo date('Y-m-d H:i:s')?>" disabled=""/>
														<span class="help-block">
														Confirm your password </span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Description <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<textarea <?php echo $is_disabled;?> class="form-control" name="description"></textarea>
														
													</div>
												</div>
											</div>
											<div class="<?php echo $tab;?>" id="tab2">
												<h3 class="block">Atttach Image/Video/Documents</h3>
												<div class="form-group">
													<label class="control-label col-md-3">Attach file <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<a <?php echo $is_disabled;?> href="#" class="btn btn-success">Browse</a> <a id="addfiles" class="btn btn-primary" href="javascript:void(0)">Add More +</a>                                                        
                                                        <div id="doc"></div>
													</div>
												</div>
												
											</div>
											<div class="<?php echo $tab;?>" id="tab3">
												<h3 class="block">Choose sub-document</h3>
												<div class="form-group">
													<label class="control-label col-md-3">Sub-document <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<select <?php echo $is_disabled;?> class="form-control" onchange="subform($(this).val());">
                                                        
                                                            <option value="">Choose sub-document</option>
                                                        
                                                            <option value="Company pre-screen question">Company pre-screen questions</option>

                                                            <option value="Driver application">Driver application</option>

                                                            <option value="Driver evaluation form">Driver evaluation form</option>

                                                            <option value="Employment verification form">Employment verification form</option>
                                                            
                                                            <option value="Consent form">Consent form</option>
                                                            
                                                        </select>
													</div>
												</div>
                                                <div style="display: none;" class="subform">
                                                </div>
											</div>
											<div class="<?php echo $tab;?>" id="tab4">
												<h3 class="block">Finalize</h3>
												<div class="table-scrollable">
                                                    <table class="table table-striped">
                                                        <tr><td>Original CVOR abstract (30 days old or less) for Ontario applicants.</td><td><a class="btn blue">Browse</a></td></tr>
                                                        <tr><td>Original Drivers Abstract (30 days old or less)</td><td><a class="btn blue">Browse</a></td></tr>
                                                        <tr><td>Copy of Drivers License</td><td><a class="btn blue">Browse</a></td></tr>
                                                        <tr><td>Copy of your FAST card</td><td><a class="btn blue">Browse</a></td></tr>
                                                        <tr><td>Original Criminal Record Search (within 90 days)</td><td><a class="btn blue">Browse</a></td></tr>
                                                        <tr><td>Proof of Citizenship (birth certificate, passport or Canadian citizenship/US Visa)</td><td><a class="btn blue">Browse</a></td></tr>
                                                        <tr><td>Completion of an on road evaluation</td><td><a class="btn blue">Browse</a></td></tr>
                                                    </table>
                                                    
                                                </div>
												
											</div>
                                            <?php
                                            
                                            // For view action only
                                            
                                            if($tab=='nodisplay')
                                            {
                                                ?>
                                                
                                            <div class="forview <?php if($tab=='tab-pane')echo 'nodisplay';?>">
                                                <?php include('subpages/forview.php');?>
                                            </div>
                                            
                                            <?php
                                            }
                                            ?>
										</div>
									</div>
									<div class="form-actions <?php if($tab=='nodisplay')echo $tab;?>">
										<div class="row">
											<div class="col-md-offset-3 col-md-9">
												<a href="javascript:;" class="btn default button-previous">
												<i class="m-icon-swapleft"></i> Back </a>
                                                
                                                <a href="javascript:;" class="btn green button-next">
												Save <i class="m-icon-swapdown m-icon-white"></i>
												</a>
                                                
												<a href="javascript:;" class="btn blue button-next">
												Continue <i class="m-icon-swapright m-icon-white"></i>
												</a>
                                                
												<a href="javascript:;" class="btn blue button-submit">
												Finalize <i class="m-icon-swapright m-icon-white"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
<script>
function subform(form_type)
{
    var filename = form_type.replace(/\W/g, '_');
    var filename = filename.toLowerCase();
    $('.subform').show();   1    
    $('.subform').load('<?php echo WEB_ROOT;?>documents/subpages/'+filename);
}
jQuery(document).ready(function() { 
   $('#addfiles').click(function(){
            //alert("ssss");
           $('#doc').append('<div style="padding-top:10px;"><a href="#" class="btn btn-success">Browse</a> <a href="javascript:void(0);" class="btn btn-danger" onclick="$(this).parent().remove();">Delete</a><br/></div>'); 
        }); 
});
</script>