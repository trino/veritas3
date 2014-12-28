<?php $settings = $this->requestAction('settings/get_settings');?>
<?php $sidebar =$this->requestAction("settings/get_side/".$this->Session->read('Profile.id'));?>
<h3 class="page-title">
			<?php echo ucfirst($settings->document);?>s <small>View/Edit/Delete <?php echo ucfirst($settings->document);?>s</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo $this->request->webroot;?>">Dashboard</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href=""><?php echo ucfirst($settings->document);?>s</a>
					</li>
				</ul>
				<div class="page-toolbar">
					<div id="dashboard-report-range" style="padding-bottom: 6px;" class="pull-right tooltips btn btn-fit-height grey-salt" data-placement="top" data-original-title="Change dashboard date range">
						<i class="icon-calendar"></i>&nbsp;
						<span class="thin uppercase visible-lg-inline-block">&nbsp;</span>&nbsp;
						<i class="fa fa-angle-down"></i>
					</div>
				</div>
                <a href="javascript:window.print();" class="floatright btn btn-info">Print</a>
			</div>



<div class="row">
    <div class="col-md-12">





        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>
                    <?php echo ucfirst($settings->document);?>
                </div>
            </div>    
            <div class="portlet-body">








				<div class="chat-form">
					<form>


						<div class="col-md-3 col-sm-12" style="padding-left:0;">

							<input class="form-control input-inline" type="search" placeholder=" Search <?php echo ucfirst($settings->document); ?>s" aria-controls="sample_1"/>
							<button type="submit" class="btn btn-primary">Search</button>

						</div>


						<div class="col-md-3 col-sm-12">
							<select class="form-control" style="">
								<option value="">Submitted by</option>
								<option value="3">Jack Black</option>
								<option value="4">Nick Smith</option>
								<option value="5">James Blont</option>
								<option value="6">Mark Henry</option>
								<option value="7">John Lenon</option>
								<option value="8">Elvis Moore</option>
								<option value="9">Peter Brown</option>
								<option value="10">Jimmy Green</option>
								<option value="11">Robert Black</option>
							</select>
						</div>
						<div class="col-md-3 col-sm-12">
							<select class="form-control">
								<option value=""><?php echo ucfirst($settings->document);?> type</option>
								<option value="0">Contract</option>
								<option value="3">Evidence</option>
								<option value="4">Report</option>
								<option value="5">Site Order</option>
								<option value="6">Orders</option>
								<option value="7">Template</option>
								<option value="8">KPI Audit</option>
								<option value="9">Others</option>

							</select>
						</div>
						<div class="col-md-3 col-sm-12">
							<select class="form-control">
								<option value=""><?php echo ucfirst($settings->client);?></option>
								<option value="0">Challenger - Ontario</option>
								<option value="3">
									Challenger - Quebec</option>
								<option value="4">Challenger - BC</option>
								<option value="5">Challenger - London</option>

							</select>
						</div>

					</form>
				</div>


				<div class="clearfix"></div>



                <div class="table-scrollable">
                    <table class="table table-hover table-striped table-bordered table-hover dataTable no-footer">
                    	<thead>
                    		<tr>
                    			<th><?php echo ucfirst($settings->document);?></th>
                                <th>Prepared for</th>
                    			<th><?php echo ucfirst($settings->client);?></th>
                    			<th>Uploaded by</th>
                    			<th>Uploaded on</th>
                    			<th>Files</th>
                                <th>Status</th>                    			
                    			<th class="actions"><?= __('Actions') ?></th>
                    		</tr>
                    	</thead>
                    	<tbody>
                    	
                    		<tr>
                    			<td>Orders</td>
                                <td>Rob Anthony</td>
                    			<td>Challenger - Ontario </td>
                    			<td>Admin</td>
                    			<td>12-05-2014 03:20:00</td>
                    			<td><a href="#">Dummy.pdf</a></td>
                    			<td class="">
											<span class="label label-sm label-success">
										Passed </span>

								</td>
                    			<td class="actions">
                    			<?php  if($sidebar->document_list=='1'){ echo $this->Html->link(__('View'), ['action' => 'view'], ['class' => 'btn btn-info']);} ?>
                    				<?php  if($sidebar->document_edit=='1'){ echo $this->Html->link(__('Edit'), ['action' => 'edit'], ['class' => 'btn btn-primary']);} ?>
                    				<?php  if($sidebar->document_delete=='1'){ echo $this->Form->postLink(__('Delete'), ['action' => '#'], ['class' => 'btn btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?')]);} ?>
                    			</td>
                    		</tr>



                            <tr>
                    			<td>Orders</td>
                                <td>Jimmy Hendrix</td>
                    			<td>Challenger - London</td>
                    			<td>John Q Sample</td>
                    			<td>12-05-2014 03:20:00</td>
                    			<td><a href="#">Dummy.pdf</a></td>
                   			    <td class="">
	<span class="label label-sm label-danger">
										Failed </span>
								</td>
                    			<td class="actions">
                    				<?php  if($sidebar->document_list=='1'){ echo $this->Html->link(__('View'), ['action' => 'view'], ['class' => 'btn btn-info']);} ?>
                    				<?php  if($sidebar->document_edit=='1'){ echo $this->Html->link(__('Edit'), ['action' => 'edit'], ['class' => 'btn btn-primary']);} ?>
                    				<?php  if($sidebar->document_delete=='1'){ echo $this->Form->postLink(__('Delete'), ['action' => '#'], ['class' => 'btn btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?')]);} ?>
                    			</td>
                    		</tr>
                            <tr>
                    			<td>Orders</td>
                                <td>Angela Stuart</td>
                    			<td>Challenger - London</td>
                    			<td>John Q Sample</td>
                    			<td>12-05-2014 03:20:00</td>
                    			<td><a href="#">Dummy.pdf</a></td>
                    			<td class="">

											<span class="label label-sm label-success">
										Passed </span>


								</td>
                    			<td class="actions">
                    				<?php  if($sidebar->document_list=='1'){ echo $this->Html->link(__('View'), ['action' => 'view'], ['class' => 'btn btn-info']);} ?>
                    				<?php  if($sidebar->document_edit=='1'){ echo $this->Html->link(__('Edit'), ['action' => 'edit'], ['class' => 'btn btn-primary']);} ?>
                    				<?php  if($sidebar->document_delete=='1'){ echo $this->Form->postLink(__('Delete'), ['action' => '#'], ['class' => 'btn btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?')]);} ?>
                    			</td>
                    		</tr>
                            <tr>
                    			<td>Orders</td>
                                <td>Jim Morrison</td>
                    			<td>Challenger - Quebec</td>
                    			<td>John Q Sample</td>
                    			<td>12-05-2014 03:20:00</td>
                    			<td><a href="#">Dummy.pdf</a></td>
                    			<td class="">

								<span class="label label-sm label-danger">
										Failed </span>

								</td>
                    			<td class="actions">
                    				<?php  if($sidebar->document_list=='1'){ echo $this->Html->link(__('View'), ['action' => 'view'], ['class' => 'btn btn-info']);} ?>
                    				<?php  if($sidebar->document_edit=='1'){ echo $this->Html->link(__('Edit'), ['action' => 'edit'], ['class' => 'btn btn-primary']);} ?>
                    				<?php  if($sidebar->document_delete=='1'){ echo $this->Form->postLink(__('Delete'), ['action' => '#'], ['class' => 'btn btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?')]);} ?>
                    			</td>
                    		</tr><tr>
                    			<td>Orders</td>
                                <td>Jacob Brown</td>
                    			<td>Challenger - BC</td>
                    			<td>Bob Smith</td>
                    			<td>12-05-2014 03:20:00</td>
                    			<td><a href="#">Dummy.pdf</a></td>
                    			<td class="">
										<span class="label label-sm label-warning">
										Pending </span>
								</td>
                    			<td class="actions">
                    				<?php  if($sidebar->document_list=='1'){ echo $this->Html->link(__('View'), ['action' => 'view'], ['class' => 'btn btn-info']);} ?>
                    				<?php  if($sidebar->document_edit=='1'){ echo $this->Html->link(__('Edit'), ['action' => 'edit'], ['class' => 'btn btn-primary']);} ?>
                    				<?php  if($sidebar->document_delete=='1'){ echo $this->Form->postLink(__('Delete'), ['action' => '#'], ['class' => 'btn btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?')]);} ?>
                    			</td>
                    		</tr>
                            <tr>
                    			<td>Orders</td>
                                <td>Peter Smith</td>
                    			<td>Challenger - BC</td>
                    			<td>Bob Smith</td>
                    			<td>12-05-2014 03:20:00</td>
                    			<td><a href="#">Dummy.pdf</a></td>
                    			<td class="">

														<span class="label label-sm label-warning">
										Pending </span>

								</td>
                    			<td class="actions">
                    				<?php  if($sidebar->document_list=='1'){ echo $this->Html->link(__('View'), ['action' => 'view'], ['class' => 'btn btn-info']);} ?>
                    				<?php  if($sidebar->document_edit=='1'){ echo $this->Html->link(__('Edit'), ['action' => 'edit'], ['class' => 'btn btn-primary']);} ?>
                    				<?php  if($sidebar->document_delete=='1'){ echo $this->Form->postLink(__('Delete'), ['action' => '#'], ['class' => 'btn btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?')]);} ?>
                    			</td>
                    		</tr>
                            <tr>
                    			<td>Orders</td>
                                <td>Jude Brown</td>
                    			<td>Challenger - London</td>
                    			<td>Bob Smith</td>
                    			<td>12-05-2014 03:20:00</td>
                    			<td><a href="#">Dummy.pdf</a></td>
                    			<td class="">

											<span class="label label-sm label-success">
										Approved </span>

								</td>
                    			<td class="actions">
                    				<?php  if($sidebar->document_list=='1'){ echo $this->Html->link(__('View'), ['action' => 'view'], ['class' => 'btn btn-info']);} ?>
                    				<?php  if($sidebar->document_edit=='1'){ echo $this->Html->link(__('Edit'), ['action' => 'edit'], ['class' => 'btn btn-primary']);} ?>
                    				<?php  if($sidebar->document_delete=='1'){ echo $this->Form->postLink(__('Delete'), ['action' => '#'], ['class' => 'btn btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?')]);} ?>
                                </td>
                    		</tr>
                            <tr>
                    			<td>Orders</td>
                                <td>Luke Smith</td>
                    			<td>Challenger - London</td>
                    			<td>Jack Black</td>
                    			<td>12-05-2014 03:20:00</td>
                    			<td><a href="#">Dummy.pdf</a></td>
                    			<td class="">

									<span class="label label-sm label-danger">
										Failed </span>


								</td>
                    			<td class="actions">
                    				<?php  if($sidebar->document_list=='1'){ echo $this->Html->link(__('View'), ['action' => 'view'], ['class' => 'btn btn-info']);} ?>
                    				<?php  if($sidebar->document_edit=='1'){ echo $this->Html->link(__('Edit'), ['action' => 'edit'], ['class' => 'btn btn-primary']);} ?>
                    				<?php  if($sidebar->document_delete=='1'){ echo $this->Form->postLink(__('Delete'), ['action' => '#'], ['class' => 'btn btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?')]);} ?>
                    			</td>
                    		</tr>
                    
                    	
                    	</tbody>
            	</table>

                </div>



				<div id="sample_2_paginate" class="dataTables_paginate paging_simple_numbers">
					<ul class="pagination">
						<li id="sample_2_previous" tabindex="0" aria-controls="sample_2"
							class="paginate_button previous disabled"><a href="#"><i
									class="fa fa-angle-left"></i></a></li>
						<li tabindex="0" aria-controls="sample_2" class="paginate_button active"><a href="#">1</a>
						</li>
						<li tabindex="0" aria-controls="sample_2" class="paginate_button "><a href="#">2</a></li>
						<li tabindex="0" aria-controls="sample_2" class="paginate_button "><a href="#">3</a></li>
						<li tabindex="0" aria-controls="sample_2" class="paginate_button "><a href="#">4</a></li>
						<li tabindex="0" aria-controls="sample_2" class="paginate_button "><a href="#">5</a></li>
						<li id="sample_2_next" tabindex="0" aria-controls="sample_2" class="paginate_button next"><a
								href="#"><i class="fa fa-angle-right"></i></a></li>
					</ul>
					<ul class="pagination">
						<li class="prev disabled">
							<a href="">< previous</a>
						</li>
						<li class="next">
							<a href="#" rel="next">next ></a>
						</li>
					</ul>
				</div>



            </div>
        </div>
        </div>
        </div>
<style>
@media print {
    .page-header{display:none;}
    .page-footer,.chat-form,.nav-tabs,.page-title,.page-bar,.theme-panel,.page-sidebar-wrapper,.more{display:none!important;}
    .portlet-body,.portlet-title{border-top:1px solid #578EBE;}
    .tabbable-line{border:none!important;}
    a:link:after,
    a:visited:after {
        content: "" !important;
    }
    .actions{display:none}
    .paging_simple_numbers{display:none;}
    }
    
</style>