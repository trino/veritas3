<?php
if(isset($disabled))
$is_disabled = 'disabled="disabled"';
else
$is_disabled = '';
?>
<h3 class="page-title">
			Jobs <small>Add/Edit job</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo $this->request->webroot;?>">Dashboard</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="">Add/Edit Jobs</a>
					</li>
				</ul>
				
			</div>
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
											<input <?php echo $is_disabled;?> type="text" name="phone" class="form-control" id="phone" placeholder="Title">
										</div>
									</div>
								</div>
                                <p>&nbsp;</p>
								<div class="form-group col-md-12">
									<label for="address" class="col-md-2 control-label nopad">Description</label>
									<div class="col-md-10 nopad">
										<div class="input-icon right">
											
											<textarea <?php echo $is_disabled;?>  class="form-control" name="address" id="address" placeholder="Description"></textarea>
										</div>
										
									</div>
								</div>
								<div class="clearfix"></div>
							
							<hr>
                            <h4>Add Image</h4>
                            
                            
                            <div class="form-group">
									<label class="sr-only" for="exampleInputEmail22">Add Image</label>
									<div class="input-icon">
										
										<a href="javascript:void(0)" <?php echo $is_disabled;?> class="btn btn-success"><i class="fa fa-envelope"></i> &nbsp; Add profile image</a>
									</div>
							</div>
                            
                            <hr>
                            <h4>Site/Date</h4>
                            <div class="form-group col-md-12">
									<label for="phone" class="col-md-2 control-label nopad">Site</label>
									<div class="col-md-10 nopad">
										<div class="input-icon">
											<i class="fa fa-envelope"></i>
											<input <?php echo $is_disabled;?> type="text" name="phone" class="form-control" id="phone" placeholder="Site">
										</div>
									</div>
								</div>
                                <p>&nbsp;</p>
                            <div class="form-group col-md-12">
									<label for="phone" class="col-md-2 control-label nopad">Start Date</label>
									<div class="col-md-10 nopad">
										<div class="input-icon">
											<i class="fa fa-envelope"></i>
											<input <?php echo $is_disabled;?> type="text" name="phone" class="form-control" id="phone" placeholder="Start Date">
										</div>
									</div>
								</div>
                                <p>&nbsp;</p>
                            <div class="form-group col-md-12">
									<label for="phone" class="col-md-2 control-label nopad">End Date</label>
									<div class="col-md-10 nopad">
										<div class="input-icon">
											<i class="fa fa-envelope"></i>
											<input <?php echo $is_disabled;?> type="text" name="phone" class="form-control" id="phone" placeholder="End Date">
										</div>
									</div>
								</div>
                                <p>&nbsp;</p>
                            <hr />
                            <h4>Add Members</h4>
                            
                            <div class="form-group">
                                

                                <span>     John </span>
                                <input <?php echo $is_disabled;?> type="checkbox" name="canView_contracts">
                                <span>      Falcon </span>
                                <input <?php echo $is_disabled;?> type="checkbox" onclick="loadmore('evidence',$(this));" name="canView_evidence">
                                <span>      Maroni </span>
                                <input <?php echo $is_disabled;?> type="checkbox" name="canView_templates">
                                <span>      Oswalt </span>
                                <input <?php echo $is_disabled;?> type="checkbox" name="canView_client_memo" onclick="loadmore('report',$(this));">
                                <span>      Sasha </span>
                                <input <?php echo $is_disabled;?> type="checkbox" name="canView_siteOrder" onclick="loadmore('siteorder',$(this));">
                                <span>      Bruce </span>
                                <input <?php echo $is_disabled;?> type="checkbox" name="canView_training">
                                <span>      Heather </span>
                                <input <?php echo $is_disabled;?> type="checkbox" name="canView_employee" onclick="loadmore('employee',$(this));">
                                <span>      Ronny </span>
                                <input <?php echo $is_disabled;?> type="checkbox" name="canView_KPIAudits">
                                <span>      Mooney </span>
                                <input <?php echo $is_disabled;?> type="checkbox" name="canView_orders">
                                <span>      Alferd </span>
                                <input <?php echo $is_disabled;?> type="checkbox" name="canView_deployment_rate" onchange="if($(this).is(':checked')){$('.deploy_more').show();}else{$('.deploy_more').hide();if($('.is_client').is(':checked')){$('.is_client').click();}}">

                            </div>
                            <hr />
                            <h4>Add Contacts</h4>                            
                            <div class="form-group">

                            <span>     Tyrion </span>
                            <input <?php echo $is_disabled;?> type="checkbox" checked="checked" name="Email_contracts">
                            <span>     Sansha </span>
                            <input <?php echo $is_disabled;?> type="checkbox" checked="checked" name="Email_evidence">
                            <span>     Jon </span>
                            <input <?php echo $is_disabled;?> type="checkbox" checked="checked" name="Email_templates">
                            <span>     Araya </span>
                            <input <?php echo $is_disabled;?> type="checkbox" checked="checked" name="Email_client_memo">
                            <span>      Joffery </span>
                            <input <?php echo $is_disabled;?> type="checkbox" checked="checked" name="Email_siteOrder">
                            <span>      Jimmy </span>
                            <input <?php echo $is_disabled;?> type="checkbox" checked="checked" name="Email_training">
                            <span>      Cersei </span>
                            <input <?php echo $is_disabled;?> type="checkbox" checked="checked" name="Email_employee">
                            <span>      Robb </span>
                            <input <?php echo $is_disabled;?> type="checkbox" name="Email_KPIAudits">
                            <span>      Catelyin </span>
                            <input <?php echo $is_disabled;?> type="checkbox" name="Email_orders">
                            <span>      Daenerys </span>
                            <input <?php echo $is_disabled;?> type="checkbox" name="Email_deployment">

                            </div>
                            
                            <hr />
                            <h4>Add Qucik key contacts</h4>
                            <div class="form-group">
                            <span>     John </span>
                            <input <?php echo $is_disabled;?> type="checkbox" checked="checked" name="Email_contracts">
                            <span>     Trish </span>
                            <input <?php echo $is_disabled;?> type="checkbox" checked="checked" name="Email_evidence">
                            <span>     Andy </span>
                            <input <?php echo $is_disabled;?> type="checkbox" checked="checked" name="Email_templates">
                            <span>     Loyala </span>
                            <input <?php echo $is_disabled;?> type="checkbox" checked="checked" name="Email_client_memo">
                            <span>      Lorde </span>
                            <input <?php echo $is_disabled;?> type="checkbox" checked="checked" name="Email_siteOrder">
                            <span>      Herrison </span>
                            <input <?php echo $is_disabled;?> type="checkbox" checked="checked" name="Email_training">
                            <span>      Simpsons </span>
                            <input <?php echo $is_disabled;?> type="checkbox" checked="checked" name="Email_employee">
                            <span>      Eric </span>
                            <input <?php echo $is_disabled;?> type="checkbox" name="Email_KPIAudits">
                            <span>      Kyle </span>
                            <input <?php echo $is_disabled;?> type="checkbox" name="Email_orders">
                            <span>      Stan </span>
                            <input <?php echo $is_disabled;?> type="checkbox" name="Email_deployment">
                            </div>
                            <hr/>
                            <div class="form-group">
									
									
										<?php if(!$is_disabled){?>
										<input type="submit" value="Submit" class="form-control btn btn-success"/>
									   <?php }?>
							</div>
                            </form>
						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
				</div>
			</div>
