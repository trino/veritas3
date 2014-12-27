<?php
if(isset($disabled))
$is_disabled = 'disabled="disabled"';
else
$is_disabled = '';

if(isset($client))
$c = $client;
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
                                    <?php if($this->request['action']!="add"){
                                        ?>
                                    
										<li>
											<a href="#tab_1_2" data-toggle="tab">Display</a>
										</li>
                                        <?php 

                                        }?>

                                    </ul>
                                    	<div class="portlet-body">
										<div class="tab-content">
										<div class="tab-pane active" id="tab_1_1">
											<div id="tab_1-1" class="tab-pane active">
												<form role="form" action="" method="post">
													<div class="form-group col-md-6">
														<label class="control-label">Title</label>

														<input type="text" class="form-control" name="title" <?php if(isset($c->title)) { ?> value="<?php echo $c->title; ?>" <?php } ?> />
													</div>
													<div class="form-group col-md-6">
														<label class="control-label">Description</label>
														<textarea class="form-control" name="description"><?php if(isset($c->description)) { echo $c->description;} ?></textarea>
													</div>
												
													<div class="form-group col-md-12">
														<label class="control-label">Enter name of your company</label>
														<input type="text" class="form-control" name="company_name" <?php if(isset($c->company_name)){?> value="<?php echo $c->company_name; ?>" <?php } ?> />
													</div>
													<div class="form-group col-md-6">
														<label class="control-label">Signatory's First Name</label>
														<input type="text" class="form-control" name="sig_fname" <?php if(isset($c->sig_fname)){?> value="<?php echo $c->sig_fname; ?>" <?php } ?>/>
													</div>
													<div class="form-group col-md-6">
														<label class="control-label">Signatory's Last Name</label>
														<input type="text" class="form-control" name="sig_lname" <?php if(isset($c->sig_lname)){?> value="<?php echo $c->sig_lname; ?>" <?php } ?>/>
													</div>
													<div class="form-group col-md-6">
														<label class="control-label">Signatory's Phone Number</label>
														<input type="text" class="form-control" name="sig_phone" <?php if(isset($c->sig_phone)){?> value="<?php echo $c->sig_phone; ?>" <?php } ?>/>
													</div>
													<div class="form-group col-md-6">
														<label class="control-label">Signatory's Email Address</label>
														<input type="email" id="sig_email" class="form-control" name="sig_email" <?php if(isset($c->sig_email)){?> value="<?php echo $c->sig_email; ?>" <?php } ?>/>
													</div>
                                                    <div class="form-group col-md-12">
														<label class="control-label">Billing Address Street Name and Number</label>
														<input type="text" class="form-control" name="billing_address" <?php if(isset($c->billing_address)){?> value="<?php echo $c->billing_address; ?>" <?php } ?>/>
													</div>
                                                    <div class="form-group col-md-4">
														<label class="control-label">City</label>
														<input type="text" class="form-control" name="city" <?php if(isset($c->city)){?> value="<?php echo $c->city; ?>" <?php } ?>/>
													</div>
                                                    <div class="form-group col-md-4">
														<label class="control-label">Postal Code</label>
														<input type="text" class="form-control" name="postal" <?php if(isset($c->postal)){?> value="<?php echo $c->postal; ?>" <?php } ?>/>
													</div>
                                                    <div class="form-group col-md-4">
														<label class="control-label">Province/State</label>
														<input type="text" class="form-control" name="province" <?php if(isset($c->province)){?> value="<?php echo $c->province; ?>" <?php } ?>/>
													</div>
                                                    <div class="form-group col-md-6">
														<label class="control-label">User's First Name</label>
														<input type="text" class="form-control" name="u_fname" <?php if(isset($c->u_fname)){?> value="<?php echo $c->u_fname; ?>" <?php } ?>/>
													</div>
                                                    <div class="form-group col-md-6">
														<label class="control-label">User's Last Name</label>
														<input type="text" class="form-control" name="u_lname" <?php if(isset($c->u_lname)){?> value="<?php echo $c->u_lname; ?>" <?php } ?>/>
													</div>
                                                    <div class="form-group col-md-6">
														<label class="control-label">User's Email Address</label>
														<input type="email" id="u_email" class="form-control" name="u_email" <?php if(isset($c->u_email)){?> value="<?php echo $c->u_email; ?>" <?php } ?>/>
													</div>
                                                    <div class="form-group col-md-6">
														<label class="control-label">User's Phone Number</label>
														<input type="text" class="form-control" name="u_phone" <?php if(isset($c->u_phone)){?> value="<?php echo $c->u_phone; ?>" <?php } ?>/>
													</div>
                                                    <div class="form-group col-md-12">
														<label class="control-label">Site</label>
														<input type="text" class="form-control" name="site" <?php if(isset($c->site)){?> value="<?php echo $c->site; ?>" <?php } ?>/>
													</div>
                                                    
                                                    <?php
                                                    if($c->date_start){
                                                    foreach($c->date_start as $k=>$d)
                                                    {
                                                        if($k == 'date')
                                                        $start_date = $d;
                                                    }
                                                    }
                                                    else
                                                    $start_date = '';
                                                    
                                                    if($c->date_end){
                                                    foreach($c->date_end as $k=>$d)
                                                    {
                                                        if($k == 'date')
                                                        $end_date = $d;
                                                    }
                                                    }
                                                    else
                                                    $end_date = '';
                                                    ?>
                                                    
                                                    <div class="form-group col-md-6">
														<label class="control-label">Start Date</label>
														<input type="text" class="form-control" name="date_start" <?php if(isset($start_date)){?> value="<?php echo $start_date; ?>" <?php } ?>/>
													</div>
                                                    <div class="form-group col-md-6">
														<label class="control-label">End Date</label>
														<input type="text" class="form-control" name="date_end" <?php if(isset($end_date)){?> value="<?php echo $end_date; ?>" <?php } ?>/>
													</div>
                                                    <div class="clearfix"></div>
                                                    <hr />
                                                    <div class="margin-top-10 alert alert-success display-hide flash1" style="display: none;">
                                                            <button class="close" data-close="alert"></button>
                                                            Data saved successfully
                                                        </div>
													<div class="margiv-top-10">
                                                    <a href="javascript:void(0)" class="btn btn-primary" id="save_client_p1" >Save</a>
														<a href="" class="btn default">
														Cancel </a>
													</div>
												</form>
											</div>
                        </div>
                        		<div class="tab-pane" id="tab_1_2">



                                                <p>&nbsp;</p>
                                                <h4> Enable <?php echo ucfirst($settings->document);?>?</h4>

                                                <form action="" id="displayform1" method="post">
                                                    <table class="table table-light table-hover">
                                                        <tr><th></th><th class="center">System</th><th class="center"><?php echo ucfirst($settings->client);?> </th></tr>
                                                        <?php
                                                        $subdoc = $this->requestAction('/clients/getSub');
                                                        
                                                        foreach($subdoc as $sub)
                                                        {
                                                            ?>
                                                            <tr>
                                                            <td>
                                                                
                                                               <?php echo ucfirst($sub['title']);?>
                                                            </td>
                                                            <td class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="<?php echo $sub->id;?>" value="1" <?php if($sub['display']==1) {?>checked="checked" <?php }?> disabled="disabled" />
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="<?php echo $sub->id;?>" value="0" <?php if($sub['display']==0) {?>checked="checked" <?php }?> disabled="disabled" />
                                                                    No </label>
                                                            </td>
                                                            <?php
                                                                 $csubdoc = $this->requestAction('/clients/getCSubDoc/'.$id.'/'.$sub->id);
                                                            ?>
                                                            <td class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="clientC[<?php echo $sub->id;?>]" value="" onclick="$(this).closest('tr').next('tr').show();" <?php if($csubdoc['display'] != 0) {?> checked="checked" <?php } ?> />
                                                                    Yes </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="clientC[<?php echo $sub->id;?>]" value="0" onclick="$(this).closest('tr').next('tr').hide();" <?php if($csubdoc['display'] == 0) {?> checked="checked" <?php } ?> />
                                                                    No </label>
                                                            </td>
                                                            
                                                        </tr>
                                                        <tr <?php if($csubdoc['display'] == 0) {?>style="display:none;" <?php } ?> >
                                                            <td></td>
                                                            <td colspan="2" class="center">
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="client[<?php echo $sub->id;?>]" value="1" <?php if($csubdoc['display'] == 1) {?> checked="checked" <?php } ?> />
                                                                    View Only </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio" name="client[<?php echo $sub->id;?>]" value="2" <?php if($csubdoc['display'] == 2) {?> checked="checked" <?php } ?> />
                                                                    Upload Only </label>
                                                                <label class="uniform-inline">
                                                                    <input <?php echo $is_disabled?> type="radio"  name="client[<?php echo $sub->id;?>]" value="3" <?php if($csubdoc['display'] == 3) {?> checked="checked" <?php } ?>/>
                                                                    Both </label>
                                                            </td>
                                                        </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                           
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
                                                    
                                                    <?php
                                                    if(!isset($disabled))
                                                    {
                                                        ?>

                                                        <div class="margin-top-10 alert alert-success display-hide flash" style="display: none;">
                                                            <button class="close" data-close="alert"></button>
                                                            Data saved successfully
                                                        </div>
                                                        <div class="margin-top-10">
                                                            <a href="javascript:void(0)" id="save_display1" class="btn btn-primary"> Save Changes </a>



                                            </div>
                                        <?php
                                        }
                                        ?>

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


<script>
                                    $(function(){
                                        <?php
                                        if(isset($id))
                                        {
                                            ?>
                                            
                                       $('#save_display1').click(function(){
                                        $('#save_display1').text('Saving..');
                                            var str = $('#displayform1 input').serialize();
                                            $.ajax({
                                               url:'<?php echo $this->request->webroot;?>clients/displaySubdocs/<?php echo $id;?>',
                                               data:str,
                                               type:'post',
                                               success:function(res)
                                               {
                                                $('.flash').show();
                                                $('#save_display1').text(' Save Changes ');
                                               } 
                                            })
                                       });
                                       <?php
                                        } 
                                        ?>
                                       $('#save_client_p1').click(function(){
                                        $('#save_client_p1').text('Saving..');
                                        var str = '';
                                        $('.recruiters input').each(function(){
                                           if($(this).is(':checked'))
                                           {
                                            if(str=='')
                                            str = 'recruiter_id[]='+$(this).val();
                                            else
                                            str = str+'&recruiter_id[]='+$(this).val();
                                           } 
                                        });
                                        $('.contacts input').each(function(){
                                           if($(this).is(':checked'))
                                           {
                                            if(str=='')
                                            str = 'contact_id[]='+$(this).val();
                                            else
                                            str = str+'&contact_id[]='+$(this).val();
                                           } 
                                        });
                                            if(str=='')
                                            {
                                                str = $('#tab_1_1 input').serialize();
                                            }
                                            else
                                            {
                                                str = str+'&'+$('#tab_1_1 input').serialize();
                                            }
                                            str = str+'&description='+$('#tab_1_1 textarea').val();
                                            
                                            
                                            $.ajax({
                                               url:'<?php echo $this->request->webroot;?>clients/saveClients',
                                               data:str,
                                               type:'post',
                                               success:function(res)
                                               {
                                                if(res!='e'){
                                                window.location = '<?php echo $this->request->webroot;?>clients/edit/'+res;
                                                }
                                                else
                                                {
                                                    alert('Couldn\'t save your data');
                                                }
                                                $('#save_client_p1').text(' Save ');
                                               } 
                                            })
                                       }); 
                                    });
                                    </script>





