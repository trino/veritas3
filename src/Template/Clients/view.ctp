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
				
			</div>
<div class="row profile">
				<div class="col-md-12">
					<!--BEGIN TABS-->
					
							<div class="tab-pane active" id="tab_1_1">
								<div class="row">
									<div class="col-md-3">
                                        
										<ul class="list-unstyled profile-nav">
											<li>
												<img src="<?php echo $this->request->webroot;?>img/jobs/1.png" class="img-responsive" alt=""/>
												<a href="#" class="profile-edit">
												Edit </a>
                                                <br />
                                                <h3>Assigned to:</h3>
											</li>
											<li>
												<a href="<?php $this->request->webroot;?>profiles/view">
												Robert Brown </a>
											</li>
											<li>
												<a href="<?php $this->request->webroot;?>profiles/view">
												John Lenon
												</a>
											</li>
											<li>
												<a href="<?php $this->request->webroot;?>profiles/view">
												Jacob Regal </a>
											</li>
											<li>
												<a href="<?php $this->request->webroot;?>profiles/view">
												Matt Johnson </a>
											</li>
                                            <li><h3>Contacts:</h3></li>
                                            <li>
												<a href="<?php $this->request->webroot;?>profiles/view">
												Robert Brown </a>
											</li>
											<li>
												<a href="<?php $this->request->webroot;?>profiles/view">
												John Lenon
												</a>
											</li>
											<li>
												<a href="<?php $this->request->webroot;?>profiles/view">
												Jacob Regal </a>
											</li>
											<li>
												<a href="<?php $this->request->webroot;?>profiles/view">
												Matt Johnson </a>
											</li>
										</ul>
									</div>
									<div class="col-md-9">
										<div class="row">
											<div class="col-md-8 profile-info">
												<h1>Job name 1</h1>
												<p>
													 Job description goes here. Job description goes here. Job description goes here. Job description goes here. Job description goes here. Job description goes here. Job description goes here. Job description goes here. Job description goes here. Job description goes here. Job description goes here. 
												</p>
												
												<ul class="list-inline">
													
													<li>
														<i class="fa fa-calendar"></i> 18 Jan 1982
													</li>
													
												</ul>
											</div>
											<!--end col-md-8-->
											<div class="col-md-4">
												<div class="portlet sale-summary">
													<div class="portlet-title">
														<div class="caption">
															 Job Summary
														</div>
														<div class="tools">
															<a class="reload" href="javascript:;">
															</a>
														</div>
													</div>
													<div class="portlet-body">
														<ul class="list-unstyled">
															<li>
																<span class="sale-info">
																Total Uploads <i class="fa fa-img-up"></i>
																</span>
																<span class="sale-num">
																23 </span>
															</li>
															<li>
																<span class="sale-info">
																Assigned users <i class="fa fa-img-down"></i>
																</span>
																<span class="sale-num">
																87 </span>
															</li>
															<li>
																<span class="sale-info">
																Created on </span>
																<span class="sale-num">
																<i class="fa fa-calendar"></i> 18 Jan 2008 </span>
															</li>
                                                            <li>
																<span class="sale-info">
																Ends on </span>
																<span class="sale-num">
																<i class="fa fa-calendar"></i> 18 Jan 2015 </span>
															</li>
															
														</ul>
													</div>
												</div>
											</div>
											<!--end col-md-4-->
										</div>
										<!--end row-->
                                        <hr />
            
                                        <?php include('subpages/home_blocks.php');?>
                            			<div class="clearfix"></div>
                            			<hr />
                                        
                                        <table class="table table-striped">
                                            <tr><td>Signatory's name</td><td>Joe Doe</td></tr>
                                            <tr><td>Signatory's phone number</td><td>+1 - 2345678</td></tr>
                                            <tr><td>Signatory's email</td><td>info@test.com</td></tr>
                                            <tr><td>Billing Address Street Name and Number</td><td>Apartment 10, Sample street</td></tr>
                                            <tr><td>City</td><td>ABC</td></tr>
                                            <tr><td>Postal code</td><td>44600</td></tr>
                                            <tr><td>Province</td><td>CDEFG</td></tr>
                                            <tr><td>Country</td><td>Canada</td></tr>
                                            <tr><td>User's Name</td><td>John Baptist</td></tr>
                                            <tr><td>User's phone number</td><td>+1 - 2345678</td></tr>
                                            <tr><td>User's email</td><td>info@test.com</td></tr>
                                        </table>
										
									</div>
								</div>
							</div>
							<!--tab_1_2-->
							
							
							
							<!--end tab-pane-->
						
				</div>
			</div>