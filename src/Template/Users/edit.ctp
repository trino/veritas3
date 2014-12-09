<?php
if(isset($disabled))
$is_disabled = 'disabled="disabled"';
else
$is_disabled = '';
?>
<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN STYLE CUSTOMIZER -->
			<div class="theme-panel hidden-xs hidden-sm hide">
				<div class="toggler">
				</div>
				<div class="toggler-close">
				</div>
				<div class="theme-options">
					<div class="theme-option theme-colors clearfix">
						<span>
						THEME COLOR </span>
						<ul>
							<li class="color-default current tooltips" data-style="default" data-container="body" data-original-title="Default">
							</li>
							<li class="color-darkblue tooltips" data-style="darkblue" data-container="body" data-original-title="Dark Blue">
							</li>
							<li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue">
							</li>
							<li class="color-grey tooltips" data-style="grey" data-container="body" data-original-title="Grey">
							</li>
							<li class="color-light tooltips" data-style="light" data-container="body" data-original-title="Light">
							</li>
							<li class="color-light2 tooltips" data-style="light2" data-container="body" data-html="true" data-original-title="Light 2">
							</li>
						</ul>
					</div>
					<div class="theme-option">
						<span>
						Layout </span>
						<select class="layout-option form-control input-sm">
							<option value="fluid" selected="selected">Fluid</option>
							<option value="boxed">Boxed</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Header </span>
						<select class="page-header-option form-control input-sm">
							<option value="fixed" selected="selected">Fixed</option>
							<option value="default">Default</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Top Menu Dropdown</span>
						<select class="page-header-top-dropdown-style-option form-control input-sm">
							<option value="light" selected="selected">Light</option>
							<option value="dark">Dark</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Sidebar Mode</span>
						<select class="sidebar-option form-control input-sm">
							<option value="fixed">Fixed</option>
							<option value="default" selected="selected">Default</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Sidebar Menu </span>
						<select class="sidebar-menu-option form-control input-sm">
							<option value="accordion" selected="selected">Accordion</option>
							<option value="hover">Hover</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Sidebar Style </span>
						<select class="sidebar-style-option form-control input-sm">
							<option value="default" selected="selected">Default</option>
							<option value="light">Light</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Sidebar Position </span>
						<select class="sidebar-pos-option form-control input-sm">
							<option value="left" selected="selected">Left</option>
							<option value="right">Right</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Footer </span>
						<select class="page-footer-option form-control input-sm">
							<option value="fixed">Fixed</option>
							<option value="default" selected="selected">Default</option>
						</select>
					</div>
				</div>
			</div>
			<!-- END STYLE CUSTOMIZER -->
			<!-- BEGIN PAGE HEADER-->			
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo $this->request->webroot;?>">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="">Profile</a>
					</li>
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row margin-top-20">
				<div class="col-md-12">
					<!-- BEGIN PROFILE SIDEBAR -->
					<div class="profile-sidebar">
						<!-- PORTLET MAIN -->
						<div class="portlet light profile-sidebar-portlet">
							<!-- SIDEBAR USERPIC -->
							<div class="profile-userpic">
								<img src="<?php echo $this->request->webroot;?>img/uploads/male.png" class="img-responsive" alt="">
							</div>
							<!-- END SIDEBAR USERPIC -->
							<!-- SIDEBAR USER TITLE -->
							<div class="profile-usertitle">
								<div class="profile-usertitle-name">
									 Marcus Doe
								</div>
								<div class="profile-usertitle-job">
									 Refrence #: 1
								</div>
							</div>
							
						</div>
						<!-- END PORTLET MAIN -->
						<!-- PORTLET MAIN -->
						<div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption">Job assigned</div>
                            </div>
                            <div class="portlet-body">
								<div class="profile-desc-text col-sm-6 nopad"><a href="#">Sample job 1</a></div>
                                <div class="profile-desc-text col-sm-6 nopad"><a href="#">Sample job 1</a></div>
                                <div class="profile-desc-text col-sm-6 nopad"><a href="#">Sample job 1</a></div>
                                <div class="profile-desc-text col-sm-6 nopad"><a href="#">Sample job 1</a></div>
                                <div class="profile-desc-text col-sm-6 nopad"><a href="#">Sample job 1</a></div>
                                <div class="profile-desc-text col-sm-6 nopad"><a href="#">Sample job 1</a></div>
                                <div class="profile-desc-text col-sm-6 nopad"><a href="#">Sample job 1</a></div>
                                <div class="profile-desc-text col-sm-6 nopad"><a href="#">Sample job 1</a></div>
								<div class="clearfix"></div>
							</div>
                        </div>
                            <hr />
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption">Orders Associated</div>
                            </div>
                            <div class="portlet-body">
								<div class="profile-desc-text col-sm-6 nopad"><a href="#">Sample Order 1</a></div>
                                <div class="profile-desc-text col-sm-6 nopad"><a href="#">Sample Order 1</a></div>
                                <div class="profile-desc-text col-sm-6 nopad"><a href="#">Sample Order 1</a></div>
                                <div class="profile-desc-text col-sm-6 nopad"><a href="#">Sample Order 1</a></div>
                                <div class="profile-desc-text col-sm-6 nopad"><a href="#">Sample Order 1</a></div>
                                <div class="profile-desc-text col-sm-6 nopad"><a href="#">Sample Order 1</a></div>
                                <div class="profile-desc-text col-sm-6 nopad"><a href="#">Sample Order 1</a></div>
                                <div class="profile-desc-text col-sm-6 nopad"><a href="#">Sample Order 1</a></div>
								<div class="clearfix"></div>
							</div>
                        </div>
						<!-- END PORTLET MAIN -->
					</div>
					<!-- END BEGIN PROFILE SIDEBAR -->
					<!-- BEGIN PROFILE CONTENT -->
					<div class="profile-content">
						<div class="row">
							<div class="col-md-12">
								<div class="portlet light">
									<div class="portlet-title tabbable-line">
										<div class="caption caption-md">
											<i class="icon-globe theme-font hide"></i>
											<span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
										</div>
										<ul class="nav nav-tabs">
											<li class="active">
												<a href="#tab_1_1" data-toggle="tab">Personal Info</a>
											</li>
                                            <?php
                                            if(!isset($disabled))
                                            {
                                                ?>
                                                
											<li>
												<a href="#tab_1_2" data-toggle="tab">Change Avatar</a>
											</li>
											<li>
												<a href="#tab_1_3" data-toggle="tab">Change Password</a>
											</li>
                                            <?php
                                            }
                                            ?>
											<li>
												<a href="#tab_1_4" data-toggle="tab">Permissions</a>
											</li>
										</ul>
									</div>
									<div class="portlet-body">
										<div class="tab-content">
											<!-- PERSONAL INFO TAB -->
											<div class="tab-pane active" id="tab_1_1">
												<form role="form" action="#">
                                                    <div class="form-group">
														<label class="control-label">Title</label>
														<input <?php echo $is_disabled?> type="text" placeholder="eg. Mr" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">First Name</label>
														<input <?php echo $is_disabled?> type="text" placeholder="eg. John" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Last Name</label>
														<input <?php echo $is_disabled?> type="text" placeholder="eg. Doe" class="form-control"/>
													</div>
                                                    <div class="form-group">
														<label class="control-label">Email</label>
														<input <?php echo $is_disabled?> type="text" placeholder="eg. test@domain.com" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Phone Number</label>
														<input <?php echo $is_disabled?> type="text" placeholder="eg. +1 646 580 6284" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Address</label>
														<input <?php echo $is_disabled?> type="text" placeholder="eg. Street, City, Province, Country" class="form-control"/>
													</div>
													<?php
                                                    if(!isset($disabled))
                                                    {
                                                        ?>
													<div class="margiv-top-10">
														<a href="#" class="btn green-haze">
														Save Changes </a>
														<a href="#" class="btn default">
														Cancel </a>
													</div>
                                                    <?php }?>
												</form>
											</div>
											<!-- END PERSONAL INFO TAB -->
											<!-- CHANGE AVATAR TAB -->
											<div class="tab-pane" id="tab_1_2">
												<p>
													 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
												</p>
												<form action="#" role="form">
													<div class="form-group">
														<div class="fileinput fileinput-new" data-provides="fileinput">
															<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
																<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
															</div>
															<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
															</div>
															<div>
																<span class="btn default btn-file">
																<span class="fileinput-new">
																Select image </span>
																<span class="fileinput-exists">
																Change </span>
																<input type="file" name="...">
																</span>
																<a href="#" class="btn default fileinput-exists" data-dismiss="fileinput">
																Remove </a>
															</div>
														</div>
														
													</div>
													<div class="margin-top-10">
														<a href="#" class="btn green-haze">
														Submit </a>
														<a href="#" class="btn default">
														Cancel </a>
													</div>
												</form>
											</div>
											<!-- END CHANGE AVATAR TAB -->
											<!-- CHANGE PASSWORD TAB -->
											<div class="tab-pane" id="tab_1_3">
												<form action="#">
													<div class="form-group">
														<label class="control-label">Current Password</label>
														<input type="password" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">New Password</label>
														<input type="password" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Re-type New Password</label>
														<input type="password" class="form-control"/>
													</div>
													<div class="margin-top-10">
														<a href="#" class="btn green-haze">
														Change Password </a>
														<a href="#" class="btn default">
														Cancel </a>
													</div>
												</form>
											</div>
											<!-- END CHANGE PASSWORD TAB -->
											<!-- PRIVACY SETTINGS TAB -->
											<div class="tab-pane" id="tab_1_4">
												<form action="#">
													<table class="table table-light table-hover">
													<tr>
														<td>
															 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus..
														</td>
														<td>
															<label class="uniform-inline">
															<input <?php echo $is_disabled?> type="radio" name="optionsRadios1" value="option1"/>
															Yes </label>
															<label class="uniform-inline">
															<input <?php echo $is_disabled?> type="radio" name="optionsRadios1" value="option2" checked/>
															No </label>
														</td>
													</tr>
													<tr>
														<td>
															 Enim eiusmod high life accusamus terry richardson ad squid wolf moon
														</td>
														<td>
															<label class="uniform-inline">
															<input <?php echo $is_disabled?> type="checkbox" value=""/> Yes </label>
														</td>
													</tr>
													<tr>
														<td>
															 Enim eiusmod high life accusamus terry richardson ad squid wolf moon
														</td>
														<td>
															<label class="uniform-inline">
															<input <?php echo $is_disabled?> type="checkbox" value=""/> Yes </label>
														</td>
													</tr>
													<tr>
														<td>
															 Enim eiusmod high life accusamus terry richardson ad squid wolf moon
														</td>
														<td>
															<label class="uniform-inline">
															<input <?php echo $is_disabled?> type="checkbox" value=""/> Yes </label>
														</td>
													</tr>
													</table>
													<!--end profile-settings-->
                                                    <?php
                                                    if(!isset($disabled))
                                                    {
                                                        ?>
                                                        
													<div class="margin-top-10">
														<a href="#" class="btn green-haze">
														Save Changes </a>
														
													</div>
                                                    <?php
                                                    }
                                                    ?>
												</form>
											</div>
											<!-- END PRIVACY SETTINGS TAB -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END PROFILE CONTENT -->
				</div>
			</div>

















<?php /*






















<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(
				__('Delete'),
				['action' => 'delete', $user->id],
				['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
			)
		?></li>
		<li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
	</ul>
</div>
<div class="users form large-10 medium-9 columns">
	<?= $this->Form->create($user); ?>
	<fieldset>
		<legend><?= __('Edit User') ?></legend>
		<?php
			echo $this->Form->input('title');
			echo $this->Form->input('fname');
			echo $this->Form->input('lname');
			echo $this->Form->input('username');
			echo $this->Form->input('email');
			echo $this->Form->input('password');
			echo $this->Form->input('address');
			echo $this->Form->input('phone');
			echo $this->Form->input('image');
			echo $this->Form->input('admin');
			echo $this->Form->input('super');
		?>
	</fieldset>
	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>
</div>
*/
?>