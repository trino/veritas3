<div class="row ">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i> Add/Edit Jobs
							</div>
							
						</div>
						<div class="portlet-body">
                        <form class="form-inline" role="form" action="" method="post">
							<h4>Job detail</h4>
								<hr>
								<div class="form-group col-md-12">
									<label for="phone" class="col-md-2 control-label nopad">Title</label>
									<div class="col-md-10 nopad">
										<div class="input-icon">
											<i class="fa fa-envelope"></i>
											<input type="text" name="phone" class="form-control" id="phone" placeholder="Title">
										</div>
									</div>
								</div>
                                <p>&nbsp;</p>
								<div class="form-group col-md-12">
									<label for="address" class="col-md-2 control-label nopad">Description</label>
									<div class="col-md-10 nopad">
										<div class="input-icon right">
											
											<textarea  class="form-control" name="address" id="address" placeholder="Description"></textarea>
										</div>
										
									</div>
								</div>
								<div class="clearfix"></div>
							
							<hr>
                            <h4>Add Image</h4>
                            
                            
                            <div class="form-group">
									<label class="sr-only" for="exampleInputEmail22">Add Image</label>
									<div class="input-icon">
										
										<a href="javascript:void(0)" class="btn btn-success"><i class="fa fa-envelope"></i> &nbsp; Add profile image</a>
									</div>
							</div>
                            
                            <hr>
                            <h4>Site/Date</h4>
                            <div class="form-group col-md-12">
									<label for="phone" class="col-md-2 control-label nopad">Site</label>
									<div class="col-md-10 nopad">
										<div class="input-icon">
											<i class="fa fa-envelope"></i>
											<input type="text" name="phone" class="form-control" id="phone" placeholder="Site">
										</div>
									</div>
								</div>
                                <p>&nbsp;</p>
                            <div class="form-group col-md-12">
									<label for="phone" class="col-md-2 control-label nopad">Start Date</label>
									<div class="col-md-10 nopad">
										<div class="input-icon">
											<i class="fa fa-envelope"></i>
											<input type="text" name="phone" class="form-control" id="phone" placeholder="Start Date">
										</div>
									</div>
								</div>
                                <p>&nbsp;</p>
                            <div class="form-group col-md-12">
									<label for="phone" class="col-md-2 control-label nopad">End Date</label>
									<div class="col-md-10 nopad">
										<div class="input-icon">
											<i class="fa fa-envelope"></i>
											<input type="text" name="phone" class="form-control" id="phone" placeholder="End Date">
										</div>
									</div>
								</div>
                                <p>&nbsp;</p>
                            <hr />
                            <h4>Add Members</h4>
                            
                            <div class="form-group">
                                
                                <span>     Contracts </span>
                                <input type="checkbox" name="canView_contracts">
                                <span>      Evidence </span>
                                <input type="checkbox" onclick="loadmore('evidence',$(this));" name="canView_evidence">
                                <span>      Templates </span>
                                <input type="checkbox" name="canView_templates">
                                <span>      Report </span>
                                <input type="checkbox" name="canView_client_memo" onclick="loadmore('report',$(this));">
                                <span>      Site Orders </span>
                                <input type="checkbox" name="canView_siteOrder" onclick="loadmore('siteorder',$(this));">
                                <span>      Training </span>
                                <input type="checkbox" name="canView_training">
                                <span>      Employee </span>
                                <input type="checkbox" name="canView_employee" onclick="loadmore('employee',$(this));">
                                <span>      KPI Audits </span>
                                <input type="checkbox" name="canView_KPIAudits">
                                <span>      Orders </span>
                                <input type="checkbox" name="canView_orders">
                                <span>      Deployment </span>
                                <input type="checkbox" name="canView_deployment_rate" onchange="if($(this).is(':checked')){$('.deploy_more').show();}else{$('.deploy_more').hide();if($('.is_client').is(':checked')){$('.is_client').click();}}">
                            </div>
                            <hr />
                            <h4>Add Contacts</h4>                            
                            <div class="form-group">
                            <span>     Contracts </span>
                            <input type="checkbox" checked="checked" name="Email_contracts">
                            <span>     Evidence </span>
                            <input type="checkbox" checked="checked" name="Email_evidence">
                            <span>     Templates </span>
                            <input type="checkbox" checked="checked" name="Email_templates">
                            <span>     Report </span>
                            <input type="checkbox" checked="checked" name="Email_client_memo">
                            <span>      Site Orders </span>
                            <input type="checkbox" checked="checked" name="Email_siteOrder">
                            <span>      Training </span>
                            <input type="checkbox" checked="checked" name="Email_training">
                            <span>      Employee </span>
                            <input type="checkbox" checked="checked" name="Email_employee">
                            <span>      KPI Audits </span>
                            <input type="checkbox" name="Email_KPIAudits">
                            <span>      Orders </span>
                            <input type="checkbox" name="Email_orders">
                            <span>      Deployment </span>
                            <input type="checkbox" name="Email_deployment">
                            </div>
                            
                            <hr />
                            <h4>Qucik key contacts</h4>
                            <hr />
                            <div class="form-group col-md-12">
									<label for="phone" class="col-md-2 control-label nopad">Contact Type</label>
									<div class="col-md-10 nopad">
										
											<select class="form-control">
                                                <option>Key contacts</option>
                                                <option>Staff contact</option>
                                                <option>Third Party contact</option>
                                            </select>
											
										
									</div>
								</div>
                                <div class="clearfix"></div>
                                <hr />
                                <div class="form-group col-md-6">
									<label for="phone" class="col-md-5 control-label nopad">Name</label>
									<div class="col-md-5 nopad">
										<div class="input-icon">
											<i class="fa fa-envelope"></i>
											<input type="text" name="phone" class="form-control" id="phone" placeholder="Name">
										</div>
									</div>
								</div>
                                
                                <div class="form-group col-md-6">
									<label for="phone" class="col-md-5 control-label nopad">Title</label>
									<div class="col-md-5 nopad">
										<div class="input-icon">
											<i class="fa fa-envelope"></i>
											<input type="text" name="phone" class="form-control" id="phone" placeholder="Title">
										</div>
									</div>
								</div>
                               <p>&nbsp;</p>
                                <div class="form-group col-md-6">
									<label for="phone" class="col-md-5 control-label nopad">Cell number</label>
									<div class="col-md-5 nopad">
										<div class="input-icon">
											<i class="fa fa-envelope"></i>
											<input type="text" name="phone" class="form-control" id="phone" placeholder="Cell number">
										</div>
									</div>
								</div>
                               
                                <div class="form-group col-md-6">
									<label for="phone" class="col-md-5 control-label nopad">Cellular Carrier</label>
									<div class="col-md-5 nopad">
										<select name="key_cellular[]" class="form-control" >
                                            <option value="Rogers">Rogers</option>
                                            <option value="Bell">Bell</option>
                                            <option value="Fido">Fido</option>
                                            <option value="Telus Mobility">Telus Mobility</option>
                                            <option value="Koodo Mobile">Koodo Mobile</option>
                                            <option value="Wind Mobile">Wind Mobile</option>
                                            <option value="Lynx Mobility">Lynx Mobility</option>
                                            <option value="MTS Mobility">MTS Mobility</option>
                                            <option value="PC Telecom">PC Telecom</option>
                                            <option value="Aliant">Aliant</option>
                                            <option value="SaskTel">SaskTel</option>
                                            <option value="Virgin Mobile">Virgin Mobile</option>
                                        </select>
									</div>
								</div>
                                <p>&nbsp;</p>
                                <div class="form-group col-md-6">
									<label for="phone" class="col-md-5 control-label nopad">Phone number</label>
									<div class="col-md-5 nopad">
										<div class="input-icon">
											<i class="fa fa-envelope"></i>
											<input type="text" name="phone" class="form-control" id="phone" placeholder="Phone number">
										</div>
									</div>
								</div>
                                
                                <div class="form-group col-md-6">
									<label for="phone" class="col-md-5 control-label nopad">Email</label>
									<div class="col-md-5 nopad">
										<div class="input-icon">
											<i class="fa fa-envelope"></i>
											<input type="text" name="phone" class="form-control" id="phone" placeholder="Email">
										</div>
									</div>
								</div>
                                <p>&nbsp;</p>
                                <div class="form-group col-md-6">
									<label for="phone" class="col-md-5 control-label nopad">Company</label>
									<div class="col-md-5 nopad">
										<div class="input-icon">
											<i class="fa fa-envelope"></i>
											<input type="text" name="phone" class="form-control" id="phone" placeholder="Company">
										</div>
									</div>
								</div>
                                <div class="clearfix"></div>
                            
                            <hr />
							<h4><a href="javascript:void(0)" id="add_key" class="btn btn-primary">+Add Quick Key Contacts </a></h4>
                            <hr />
                            <div class="form-group">
									
									
										
										<input type="submit" value="Submit" class="form-control btn btn-success"/>
									
							</div>
                            </form>
						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
				</div>
			</div>
