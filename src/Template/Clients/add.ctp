<?php
if(isset($disabled))
$is_disabled = 'disabled="disabled"';
else
$is_disabled = '';
?>
<?php $settings = $this->requestAction('settings/get_settings');?>
<h3 class="page-title">
			<?php echo ucfirst($settings->client);?> <small>Add/Edit <?php echo ucfirst($settings->client);?></small>
			</h3>

			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo $this->request->webroot;?>">Dashboard</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="">Add/Edit <?php echo ucfirst($settings->client);?></a>
					</li>
				</ul>
                <?php
				if(isset($disabled))
                { ?>
                <a href="javascript:window.print();" class="floatright btn btn-info">Print</a>
                <?php } ?>
			</div>
<div class="row ">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i> Add/Edit <?php echo ucfirst($settings->client);?>
							</div>

						</div>
						<div class="portlet-body">
                        <div class="tab-pane" id="tab_1_3">
								<div class="row profile-account">
									<div class="col-md-3">
										<img class="img-responsive" alt="" src="<?php echo $this->request->webroot;?>img/logos/challenger_logo.png">





                                            <div class="form-group">
                                            <label class="sr-only" for="exampleInputEmail22">Add/Edit Image</label>
                                            <div class="input-icon">
                                            <a class="btn btn-success" href="javascript:void(0)">
                                            <i class="fa fa-image"></i>
                                              Add/Edit Image
                                            </a>
                                            </div>
                                            </div>
                                            <table class="table table-striped table-bordered table-advance table-hover">
                                                <thead><tr><th colspan="2">Add Recruiters</th></tr></thead>
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
                                    <ul class="nav nav-tabs">
										<li class="active">
											<a href="#tab_1_1" data-toggle="tab">Info</a>
										</li>

										<li>
											<a href="#tab_1_2" data-toggle="tab">Display</a>
										</li>
                                    </ul>
                                    	<div class="portlet-body">
										<div class="tab-content">
										<div class="tab-pane active" id="tab_1_1">
											<div id="tab_1-1" class="tab-pane active">

												<form role="form" action="#">
													<div class="form-group col-md-6">
														<label class="control-label">Title</label>
														<input type="text" class="form-control"/>
													</div>
													<div class="form-group col-md-6">
														<label class="control-label">Description</label>
														<textarea class="form-control"></textarea>
													</div>
													<div class="form-group col-md-12">
														<label class="control-label">Enter name of your company</label>
														<input type="text" class="form-control"/>
													</div>
													<div class="form-group col-md-6">
														<label class="control-label">Signatory's First Name</label>
														<input type="text" class="form-control"/>
													</div>
													<div class="form-group col-md-6">
														<label class="control-label">Signatory's Last Name</label>
														<input type="text" class="form-control"/>
													</div>
													<div class="form-group col-md-6">
														<label class="control-label">Signatory's Phone Number</label>
														<input type="text" class="form-control"/>
													</div>
													<div class="form-group col-md-6">
														<label class="control-label">Signatory's Email Address</label>
														<input type="text" class="form-control"/>
													</div>
                                                    <div class="form-group col-md-12">
														<label class="control-label">Billing Address Street Name and Number</label>
														<input type="text" class="form-control"/>
													</div>
                                                    <div class="form-group col-md-4">
														<label class="control-label">City</label>
														<input type="text" class="form-control"/>
													</div>
                                                    <div class="form-group col-md-4">
														<label class="control-label">Postal Code</label>
														<input type="text" class="form-control"/>
													</div>
                                                    <div class="form-group col-md-4">
														<label class="control-label">Province/State</label>
														<input type="text" class="form-control"/>
													</div>
                                                    <div class="form-group col-md-6">
														<label class="control-label">User's First Name</label>
														<input type="text" class="form-control"/>
													</div>
                                                    <div class="form-group col-md-6">
														<label class="control-label">User's Last Name</label>
														<input type="text" class="form-control"/>
													</div>
                                                    <div class="form-group col-md-6">
														<label class="control-label">User's Email Address</label>
														<input type="text" class="form-control"/>
													</div>
                                                    <div class="form-group col-md-6">
														<label class="control-label">User's Phone Number</label>
														<input type="text" class="form-control"/>
													</div>
                                                    <div class="form-group col-md-12">
														<label class="control-label">Site</label>
														<input type="text" class="form-control"/>
													</div>
                                                    <div class="form-group col-md-6">
														<label class="control-label">Start Date</label>
														<input type="text" class="form-control"/>
													</div>
                                                    <div class="form-group col-md-6">
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
                        		<div class="tab-pane" id="tab_1_2">



                                                <p>&nbsp;</p>
                                                <h4> Enable <?php echo ucfirst($settings->document);?>?</h4>

                                                <form action="#">
                                                    <table class="table table-light table-hover">
                                                        <tr><th></th><th class="center">System</th><th class="center"><?php echo ucfirst($settings->client);?> </th></tr>
                                                        <tr>
                                                            <td>
                                                               Pre-Screening
                                                            </td>
                                                            <td class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="optionsRadios" value="option1"/>
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="optionsRadios" value="option2" checked/>
                                                                    No </label>
                                                            </td>
                                                            <td class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="usroptions" value="option1" onclick="$(this).closest('tr').next('tr').show();"  />
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="usroptions" value="option2" onclick="$(this).closest('tr').next('tr').hide();" checked />
                                                                    No </label>
                                                            </td>
                                                            
                                                        </tr>
                                                        <tr style="display:none;">
                                                            <td></td>
                                                            <td colspan="2" class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr" value="option1"/>
                                                                    View Only </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr" value="option2" />
                                                                    Upload Only </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr" value="option3" checked/>
                                                                    Both </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Driver Application
                                                            </td>
                                                            <td class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="optionsRadios1" value="option1"/>
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="optionsRadios1" value="option2" checked/>
                                                                    No </label>
                                                            </td>
                                                        <td class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="usroptions9" value="option1" onclick="$(this).closest('tr').next('tr').show();"  />
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="usroptions9" value="option2" onclick="$(this).closest('tr').next('tr').hide();" checked />
                                                                    No </label>
                                                            </td>
                                                            
                                                        </tr>
                                                        <tr style="display:none;">
                                                            <td></td>
                                                            <td colspan="2" class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr9" value="option1"/>
                                                                    View Only </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr9" value="option2" />
                                                                    Upload Only </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr9" value="option3" checked/>
                                                                    Both </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                MEE consent
                                                            </td>
                                                            <td class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="optionsRadios2" value="option1"/>
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="optionsRadios2" value="option2" checked/>
                                                                    No </label>
                                                            </td>
                                                        <td class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="usroptions1" value="option1" onclick="$(this).closest('tr').next('tr').show();"  />
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="usroptions1" value="option2" onclick="$(this).closest('tr').next('tr').hide();" checked />
                                                                    No </label>
                                                            </td>
                                                            
                                                        </tr>
                                                        <tr style="display:none;">
                                                            <td></td>
                                                            <td colspan="2" class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr1" value="option1"/>
                                                                    View Only </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr1" value="option2" />
                                                                    Upload Only </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr1" value="option3" checked/>
                                                                    Both </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Driver Evaluation
                                                            </td>
                                                            <td class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="optionsRadios3" value="option1"/>
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="optionsRadios3" value="option2" checked/>
                                                                    No </label>
                                                            </td>
                                                        <td class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="usroptions2" value="option1" onclick="$(this).closest('tr').next('tr').show();"  />
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="usroptions2" value="option2" onclick="$(this).closest('tr').next('tr').hide();" checked />
                                                                    No </label>
                                                            </td>
                                                            
                                                        </tr>
                                                        <tr style="display:none;">
                                                            <td></td>
                                                            <td colspan="2" class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr2" value="option1"/>
                                                                    View Only </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr2" value="option2" />
                                                                    Upload Only </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr2" value="option3" checked/>
                                                                    Both </label>
                                                            </td>
                                                        </tr>
                                                        <!--
                                                        <tr>
                                                            <td>
                                                                Strike
                                                            </td>
                                                            <td class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="optionsRadios4" value="option1"/>
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="optionsRadios4" value="option2" checked/>
                                                                    No </label>
                                                            </td>
                                                        <td class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="usroptions3" value="option1" onclick="$(this).closest('tr').next('tr').show();"  />
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="usroptions3" value="option2" onclick="$(this).closest('tr').next('tr').hide();" checked />
                                                                    No </label>
                                                            </td>
                                                            
                                                        </tr>
                                                        <tr style="display:none;">
                                                            <td></td>
                                                            <td colspan="2">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr3" value="option1"/>
                                                                    View Only </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr3" value="option2" />
                                                                    Upload Only </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr3" value="option3" checked/>
                                                                    Both </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Orders
                                                            </td>
                                                            <td class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="optionsRadios5" value="option1"/>
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="optionsRadios5" value="option2" checked/>
                                                                    No </label>
                                                            </td>
                                                        <td class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="usroptions4" value="option1" onclick="$(this).closest('tr').next('tr').show();"  />
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="usroptions4" value="option2" onclick="$(this).closest('tr').next('tr').hide();" checked />
                                                                    No </label>
                                                            </td>
                                                            
                                                        </tr>
                                                        <tr style="display:none;">
                                                            <td></td>
                                                            <td colspan="2" class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr4" value="option1"/>
                                                                    View Only </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr4" value="option2" />
                                                                    Upload Only </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr4" value="option3" checked/>
                                                                    Both </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Other Document Type
                                                            </td>
                                                            <td class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="optionsRadios6" value="option1"/>
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="optionsRadios6" value="option2" checked/>
                                                                    No </label>
                                                            </td>
                                                        <td class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="usroptions5" value="option1" onclick="$(this).closest('tr').next('tr').show();"  />
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="usroptions5" value="option2" onclick="$(this).closest('tr').next('tr').hide();" checked />
                                                                    No </label>
                                                            </td>
                                                            
                                                        </tr>
                                                        <tr style="display:none;">
                                                            <td></td>
                                                            <td colspan="2" class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr5" value="option1"/>
                                                                    View Only </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr5" value="option2" />
                                                                    Upload Only </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr5" value="option3" checked/>
                                                                    Both </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Other <?php echo ucfirst($settings->document);?> Type
                                                            </td>
                                                            <td class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="optionsRadios7" value="option1"/>
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="optionsRadios7" value="option2" checked/>
                                                                    No </label>
                                                            </td>
                                                        <td class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="usroptions6" value="option1" onclick="$(this).closest('tr').next('tr').show();"  />
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="usroptions6" value="option2" onclick="$(this).closest('tr').next('tr').hide();" checked />
                                                                    No </label>
                                                            </td>
                                                            
                                                        </tr>
                                                        <tr style="display:none;">
                                                            <td></td>
                                                            <td colspan="2" class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr6" value="option1"/>
                                                                    View Only </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr6" value="option2" />
                                                                    Upload Only </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr6" value="option3" checked/>
                                                                    Both </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Other <?php echo ucfirst($settings->document);?> Type
                                                            </td>
                                                            <td class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="optionsRadios8" value="option1"/>
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="optionsRadios8" value="option2" checked/>
                                                                    No </label>
                                                            </td>
                                                        <td class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="usroptions7" value="option1" onclick="$(this).closest('tr').next('tr').show();"  />
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="usroptions7" value="option2" onclick="$(this).closest('tr').next('tr').hide();" checked />
                                                                    No </label>
                                                            </td>
                                                            
                                                        </tr>
                                                        <tr style="display:none;">
                                                            <td></td>
                                                            <td colspan="2" class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr7" value="option1"/>
                                                                    View Only </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr7" value="option2" />
                                                                    Upload Only </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr7" value="option3" checked/>
                                                                    Both </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Other <?php echo ucfirst($settings->document);?> Type
                                                            </td>
                                                            <td class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="optionsRadios9" value="option1"/>
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="optionsRadios9" value="option2" checked/>
                                                                    No </label>
                                                            </td>
                                                        <td class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="usroptions8" value="option1" onclick="$(this).closest('tr').next('tr').show();"  />
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="usroptions8" value="option2" onclick="$(this).closest('tr').next('tr').hide();" checked />
                                                                    No </label>
                                                            </td>
                                                            
                                                        </tr>
                                                        <tr style="display:none;">
                                                            <td></td>
                                                            <td colspan="2" class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr8" value="option1"/>
                                                                    View Only </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr8" value="option2" />
                                                                    Upload Only </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="Usr8" value="option3" checked/>
                                                                    Both </label>
                                                            </td>
                                                        </tr>-->
                                                    </table>
                                                    
                                                    <!--end profile-settings-->

                                                </form>
											</div>
                                    </div>
                                </div>
                    </div>
					<!-- END SAMPLE FORM PORTLET-->

                </div>
            </div>
        </div>
   </div>
</div>
</div>








