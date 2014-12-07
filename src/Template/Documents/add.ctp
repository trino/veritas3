<h3 class="page-title">
			Add/Edit Doccument
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo WEB_ROOT;?>">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Add/Edit Document</a>
					</li>
				</ul>
				<div class="page-toolbar">
					<div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height grey-salt" data-placement="top" data-original-title="Change dashboard date range">
						<i class="icon-calendar"></i>&nbsp;
						<span class="thin uppercase visible-lg-inline-block">&nbsp;</span>&nbsp;
						<i class="fa fa-angle-down"></i>
					</div>
				</div>
			</div>
<div class="row">
				<div class="col-md-12">
					<div class="portlet box blue" id="form_wizard_1">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Add/Edit Document - <span class="step-title">
								Step 1 of 4 </span>
							</div>
							<div class="tools hidden-xs">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body form">
							<form action="#" class="form-horizontal" id="submit_form" method="POST">
								<div class="form-wizard">
									<div class="form-body">
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
											<div class="progress-bar progress-bar-success">
											</div>
										</div>
										<div class="tab-content">
											<div class="alert alert-danger display-none">
												<button class="close" data-dismiss="alert"></button>
												You have some form errors. Please check below.
											</div>
											<div class="alert alert-success display-none">
												<button class="close" data-dismiss="alert"></button>
												Your form validation is successful!
											</div>
											<div class="tab-pane active" id="tab1">
												<h3 class="block">Provide the document information</h3>
												<div class="form-group">
													<label class="control-label col-md-3">Document type <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<select id="document_type" class="form-control" name="document_type">
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
														<input type="text" class="form-control" name="" id="" value="Admin" disabled="" />
														<span class="help-block">
														Provide your password. </span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Uploaded on <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="" value="<?php echo date('Y-m-d H:i:s')?>" disabled=""/>
														<span class="help-block">
														Confirm your password </span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Description <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<textarea class="form-control" name="description"></textarea>
														
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab2">
												<h3 class="block">Atttach Image/Video/Documents</h3>
												<div class="form-group">
													<label class="control-label col-md-3">Attach file <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<a href="#" class="btn btn-success">Browse</a> <a id="addfiles" class="btn btn-primary" href="javascript:void(0)">Add More +</a>                                                        
                                                        <div id="doc"></div>
													</div>
												</div>
												
											</div>
											<div class="tab-pane" id="tab3">
												<h3 class="block">Choose sub-document</h3>
												<div class="form-group">
													<label class="control-label col-md-3">Sub-document <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<select class="form-control" onchange="subform($(this).val());">
                                                        
                                                            <option value="">Choose sub-document</option>
                                                        
                                                            <option value="Company pre-screen question">Company pre-screen questions</option>

                                                            <option value="Driver application">Driver application</option>

                                                            <option value="Driver evaluation form">Driver evaluation form</option>

                                                            <option value="Employment verification form">Employment verification form</option>
                                                            
                                                        </select>
													</div>
												</div>
                                                <div style="display: none;" class="subform">
												<div class="form-group">
													<label class="control-label col-md-3">Driver name <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name=""/>
														
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">D/L# <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" placeholder="" class="form-control" name=""/>
														
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Date <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" placeholder="" class="form-control" name=""/>
														
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Transmission <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<div class="checkbox-list">
															<label>
															<input type="checkbox" name="" value="1"/> Manual Shift </label>
															<label>
															<input type="checkbox" name="" value="2"/> Auto Shift </label>
														</div>
														<div id="form_payment_error">
														</div>
													</div>
												</div>
                                                <div class="form-group">
													<label class="control-label col-md-3">Name of evaluator <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" placeholder="" class="form-control" name=""/>														
													</div>
												</div>
                                                
                                                <div class="form-group">
													<label class="control-label col-md-3">Select <span class="required">
													* </span>
													</label>
													<div class="col-md-9">
														<div class="checkbox-list col-md-4 nopad">
															<label>
															<input type="checkbox" name="" value="1"/> Pre Hire </label>
															<label>
															<input type="checkbox" name="" value="2"/> Post Accident </label>
														</div>
														<div class="checkbox-list col-md-4 nopad">
															<label>
															<input type="checkbox" name="" value="1"/> Post Injury </label>
															<label>
															<input type="checkbox" name="" value="2"/> Post Training </label>
														</div>
                                                        <div class="checkbox-list col-md-4 nopad">
															<label>
															<input type="checkbox" name="" value="1"/> Annual </label>
															<label>
															<input type="checkbox" name="" value="2"/> Skill Verification </label>
														</div>
													</div>
												</div>
                                                <hr />
                                                
                                                <div class="col-md-12">
                                                    <div class="col-md-6">
                                                        <div class="portlet box blue">
                                                            <div class="portlet-title">
                                                                <div class="caption"><strong>Pre-trip Inspection:</strong> Fails to check the following</div>
                                                            </div>
                                                            
                                                            <div class="portlet-body">
                                                                <div class="col-md-6 checkbox-list">
                                                                    <label>
        															<input type="checkbox" name=""/> Fuel tank </label>
        															<label>
        															<input type="checkbox" name=""/> All Gauges </label>
                                                                    <label>
        															<input type="checkbox" name=""/> Audible Air Leaks </label>
        															<label>
        															<input type="checkbox" name=""/> Wheels Tires </label>
                                                                    <label>
        															<input type="checkbox" name=""/> Trailer Brakes </label>
                                                                    <label>
        															<input type="checkbox" name=""/> Trailer Airlines </label>
                                                                    <label>
        															<input type="checkbox" name=""/> Inspect 5th Wheel </label>
                                                                    <label>
        															<input type="checkbox" name=""/> Cold Check </label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>
        															<input type="checkbox" name=""/> Seat and Mirror set up </label>
        															<label>
        															<input type="checkbox" name=""/> Coupling&nbsp; &nbsp; &nbsp; &nbsp;</label>
                                                                    <label>
        															<input type="checkbox" name=""/> Paperwork </label>
        															<label>
        															<input type="checkbox" name=""/> Lights/ABS Lamps </label>
                                                                    <label>
        															<input type="checkbox" name=""/> Annual Inspection Stickers </label>
                                                                    <label>
        															<input type="checkbox" name=""/> In cab air brake checks </label>
                                                                    <label>
        															<input type="checkbox" name=""/> Landing Gear </label>
                                                                    <label>
        															<input type="checkbox" name=""/> Emergency exit </label>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="portlet box blue center">
                                                            <div class="portlet-title">
                                                                <div class="caption"><strong>Driving:</strong></div>
                                                            </div>
                                                            
                                                            <div class="portlet-body">
                                                            afddfadf
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                
                                                </div>
											</div>
											<div class="tab-pane" id="tab4">
												<h3 class="block">Confirm your account</h3>
												<h4 class="form-section">Account</h4>
												<div class="form-group">
													<label class="control-label col-md-3">Username:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="username">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Email:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="email">
														</p>
													</div>
												</div>
												<h4 class="form-section">Profile</h4>
												<div class="form-group">
													<label class="control-label col-md-3">Fullname:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="fullname">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Gender:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="gender">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Phone:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="phone">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Address:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="address">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">City/Town:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="city">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Country:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="country">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Remarks:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="remarks">
														</p>
													</div>
												</div>
												<h4 class="form-section">Billing</h4>
												<div class="form-group">
													<label class="control-label col-md-3">Card Holder Name:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="card_name">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Card Number:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="card_number">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">CVC:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="card_cvc">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Expiration:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="card_expiry_date">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Payment Options:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="payment[]">
														</p>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-actions">
										<div class="row">
											<div class="col-md-offset-3 col-md-9">
												<a href="javascript:;" class="btn default button-previous">
												<i class="m-icon-swapleft"></i> Back </a>
												<a href="javascript:;" class="btn blue button-next">
												Continue <i class="m-icon-swapright m-icon-white"></i>
												</a>
												<a href="javascript:;" class="btn green button-submit">
												Submit <i class="m-icon-swapright m-icon-white"></i>
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
    $('.subform').load('<?php echo WEB_ROOT;?>documents/subpages/'+filename);
}
jQuery(document).ready(function() { 
   $('#addfiles').click(function(){
            //alert("ssss");
           $('#doc').append('<div style="padding-top:10px;"><a href="#" class="btn btn-success">Browse</a> <a href="javascript:void(0);" class="btn btn-danger" onclick="$(this).parent().remove();">Delete</a><br/></div>'); 
        }); 
});
</script>