<?php
if(isset($disabled))
$is_disabled = 'disabled="disabled"';
else
$is_disabled = '';
?>
<h3 class="page-title">
			Clients <small>Add/Edit Client</small>
			</h3>

			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo $this->request->webroot;?>">Dashboard</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="">Add/Edit Clients</a>
					</li>
				</ul>
                <?php
				if(isset($disabled))
                { ?>
                <a href="javascript:window.print();" class="btn btn-info">Print</a>
                <?php } ?>
			</div>
<div class="row ">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i> Add/Edit Clients
							</div>
							
						</div>
						<div class="portlet-body">
                        <div class="tab-pane" id="tab_1_3">
								<div class="row profile-account">
									<div class="col-md-3">
										<img class="img-responsive" alt="" src="<?php echo $this->request->webroot;?>img/jobs/1.png">
                                        <h4>Add Image</h4>
                                            <div class="form-group">
                                            <label class="sr-only" for="exampleInputEmail22">Add Image</label>
                                            <div class="input-icon">
                                            <a class="btn btn-success" href="javascript:void(0)">
                                            <i class="fa fa-envelope"></i>
                                              Add Profile image
                                            </a>
                                            </div>
                                            </div>
                                            <table class="table table-striped table-bordered table-advance table-hover">
                                                <thead><tr><th colspan="2">Add Members</th></tr></thead>
                                                <tr>
                                                    <td>
                                                        <div class="checker">
                                                        <span><input type="checkbox" name="canView_contracts"/></span>
                                                        </div>
                                                        <span> John </span>
                                                    </td>
                                                    <td>
                                                    <div class="checker">
                                                    <span><input type="checkbox" name="canView_contracts"/></span>
                                                    </div>
                                                        <span> Falcon </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checker">
                                                        <span><input type="checkbox" name="canView_contracts"/></span>
                                                        </div>
                                                        <span> Maroni </span>
                                                    </td>
                                                    <td>
                                                    <div class="checker">
                                                    <span><input type="checkbox" name="canView_contracts"/></span>
                                                    </div>
                                                        <span> Oswalt </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checker">
                                                        <span><input type="checkbox" name="canView_contracts"/></span>
                                                        </div>
                                                        <span> Sasha </span>
                                                    </td>
                                                    <td>
                                                    <div class="checker">
                                                    <span><input type="checkbox" name="canView_contracts"/></span>
                                                    </div>
                                                        <span> Bruce </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checker">
                                                        <span><input type="checkbox" name="canView_contracts"/></span>
                                                        </div>
                                                        <span> Heather </span>
                                                    </td>
                                                    <td>
                                                    <div class="checker">
                                                    <span><input type="checkbox" name="canView_contracts"/></span>
                                                    </div>
                                                        <span> Ronney </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checker">
                                                        <span><input type="checkbox" name="canView_contracts"/></span>
                                                        </div>
                                                        <span> Mooney </span>
                                                    </td>
                                                    <td>
                                                    <div class="checker">
                                                    <span><input type="checkbox" name="canView_contracts"/></span>
                                                    </div>
                                                        <span> Alfred </span>
                                                    </td>
                                                </tr>
                                            </table>
                                            
                                            <table class="table table-striped table-bordered table-advance table-hover">
                                                <thead><tr><th colspan="2">Add Contacts</th></tr></thead>
                                                <tr>
                                                    <td>
                                                        <div class="checker">
                                                        <span><input type="checkbox" name="canView_contracts"/></span>
                                                        </div>
                                                        <span> John </span>
                                                    </td>
                                                    <td>
                                                    <div class="checker">
                                                    <span><input type="checkbox" name="canView_contracts"/></span>
                                                    </div>
                                                        <span> Falcon </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checker">
                                                        <span><input type="checkbox" name="canView_contracts"/></span>
                                                        </div>
                                                        <span> Maroni </span>
                                                    </td>
                                                    <td>
                                                    <div class="checker">
                                                    <span><input type="checkbox" name="canView_contracts"/></span>
                                                    </div>
                                                        <span> Oswalt </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checker">
                                                        <span><input type="checkbox" name="canView_contracts"/></span>
                                                        </div>
                                                        <span> Sasha </span>
                                                    </td>
                                                    <td>
                                                    <div class="checker">
                                                    <span><input type="checkbox" name="canView_contracts"/></span>
                                                    </div>
                                                        <span> Bruce </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checker">
                                                        <span><input type="checkbox" name="canView_contracts"/></span>
                                                        </div>
                                                        <span> Heather </span>
                                                    </td>
                                                    <td>
                                                    <div class="checker">
                                                    <span><input type="checkbox" name="canView_contracts"/></span>
                                                    </div>
                                                        <span> Ronney </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checker">
                                                        <span><input type="checkbox" name="canView_contracts"/></span>
                                                        </div>
                                                        <span> Mooney </span>
                                                    </td>
                                                    <td>
                                                    <div class="checker">
                                                    <span><input type="checkbox" name="canView_contracts"/></span>
                                                    </div>
                                                        <span> Alfred </span>
                                                    </td>
                                                </tr>
                                            </table>
									</div>
									<div class="col-md-9">
										<div class="tab-content">
											<div id="tab_1-1" class="tab-pane active">
                                                <h4>Client Details</h4>
												<form role="form" action="#">
													<div class="form-group">
														<label class="control-label">Title</label>
														<input type="text" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Description</label>
														<textarea class="form-control"></textarea>
													</div>
													<div class="form-group">
														<label class="control-label">Enter name of your company</label>
														<input type="text" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Signatory's First Name</label>
														<input type="text" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Signatory's Last Name</label>
														<input type="text" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Signatory's Phone Number</label>
														<input type="text" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Signatory's Email Address</label>
														<input type="text" class="form-control"/>
													</div>
                                                    <div class="form-group">
														<label class="control-label">Billing Address Street Name and Number</label>
														<input type="text" class="form-control"/>
													</div>
                                                    <div class="form-group">
														<label class="control-label">City</label>
														<input type="text" class="form-control"/>
													</div>
                                                    <div class="form-group">
														<label class="control-label">Postal Code</label>
														<input type="text" class="form-control"/>
													</div>
                                                    <div class="form-group">
														<label class="control-label">Province/State</label>
														<input type="text" class="form-control"/>
													</div>
                                                    <div class="form-group">
														<label class="control-label">User's First Name</label>
														<input type="text" class="form-control"/>
													</div>
                                                    <div class="form-group">
														<label class="control-label">User's Last Name</label>
														<input type="text" class="form-control"/>
													</div>
                                                    <div class="form-group">
														<label class="control-label">User's Email Address</label>
														<input type="text" class="form-control"/>
													</div>
                                                    <div class="form-group">
														<label class="control-label">User's Phone Number</label>
														<input type="text" class="form-control"/>
													</div>
                                                    <div class="form-group">
														<label class="control-label">Site</label>
														<input type="text" class="form-control"/>
													</div>
                                                    <div class="form-group">
														<label class="control-label">Start Date</label>
														<input type="text" class="form-control"/>
													</div>
                                                    <div class="form-group">
														<label class="control-label">End Date</label>
														<input type="text" class="form-control"/>
													</div>
                                                    <div class="clearfix"></div>
                                                    <hr />
													<div class="margiv-top-10">
														<a href="#" class="btn btn-primary">
														Save Changes </a>
														<a href="#" class="btn default">
														Cancel </a>
													</div>
												</form>
											</div>
                        </div>
                    </div>
					<!-- END SAMPLE FORM PORTLET-->
			











