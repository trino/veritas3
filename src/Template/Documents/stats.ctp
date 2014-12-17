<?php $settings = $this->requestAction('settings/get_settings');?>
<h3 class="page-title">
			<?php echo ucfirst($settings->document);?> <small>Recruiter Stats</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo $this->request->webroot;?>">Dashboard</a>
						<i class="fa fa-angle-right"></i>
					</li>
					
                    <li>
						<a href="">Recruiter Stats</a>
					</li>
				</ul>
				<!--<div class="page-toolbar">
					<div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height grey-salt" data-placement="top" data-original-title="Change dashboard date range">
						<i class="icon-calendar"></i>&nbsp;
						<span class="thin uppercase visible-lg-inline-block">&nbsp;</span>&nbsp;
						<i class="fa fa-angle-down"></i>
					</div>
				</div>-->
			</div>
<div class="row">
    <div class="col-md-4 col-sm-12">
                    <select class="form-control">
                        <option value="">Select Recruiter</option>
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
             <!--<div class="col-md-4 col-sm-12">
                    <select class="form-control">
                        <option value="">Document type</option>
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
             <div class="col-md-4 col-sm-12">
                    <select class="form-control">
                        <option value="">Clients</option>
                        <option value="0">Client 1</option>
                        <option value="3">Client 2</option>
                        <option value="4">Client 3</option>
                        <option value="5">Client</option>
                        
                    </select>
             </div>-->
             <div class="clearfix"></div>
             <hr />
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>
                    <?php echo ucfirst($settings->document);?>
                </div>
            </div>    
            <div class="portlet-body">
             
                <div class="table-scrollable">
                    <table class="table table-hover">
                    	<thead>
                    		<tr>
                    			<th><?php echo ucfirst($settings->document);?> type</th>
                                <th>Prepared for</th>
                    			<th><?php echo ucfirst($settings->client);?></th>
                    			<th>Uploaded by</th>
                    			<th>Uploaded on</th>
                    			<th>Files</th>
                                <th>Status</th>                    			
                    			<th class="actions"><?= __('Recruiter') ?></th>
                    		</tr>
                    	</thead>
                    	<tbody>
                    	
                    		<tr>
                    			<td>Orders</td>
                                <td>Rob Anthony</td>
                    			<td>Client name 1</td>
                    			<td>Admin</td>
                    			<td>12-05-2014 03:20:00</td>
                    			<td><a href="#">DummyFile.docx</a></td>
                    			<td class="c_blue">Draft</td>                  			
                    			<td class="actions">
                    				Jimmy Page
                    			</td>
                    		</tr>
                            <tr>
                    			<td>Orders</td>
                                <td>Jimmy Hendrix</td>
                    			<td>Client name 1</td>
                    			<td>Admin</td>
                    			<td>12-05-2014 03:20:00</td>
                    			<td><a href="#">DummyFile.docx</a></td>
                   			    <td class="c_green">Approved</td>                 			
                    			<td class="actions">
                    				Jimi Hendrix
                    			</td>
                    		</tr>
                            <tr>
                    			<td>Orders</td>
                                <td>Angela Stuart</td>
                    			<td>Client name 1</td>
                    			<td>Admin</td>
                    			<td>12-05-2014 03:20:00</td>
                    			<td><a href="#">DummyFile.docx</a></td>
                    			<td class="c_orange">Pending</td>                 			
                    			<td class="actions">
                                    Jim Morission
                                </td>
                            <tr>
                    			<td>Orders</td>
                                <td>Jim Morrison</td>
                    			<td>Client name 1</td>
                    			<td>Admin</td>
                    			<td>12-05-2014 03:20:00</td>
                    			<td><a href="#">DummyFile.docx</a></td>
                    			<td class="c_blue">Draft</td>                 			
                    			<td class="actions">
                    			     Jennis Joplin	
                    			</td>
                    		</tr><tr>
                    			<td>Orders</td>
                                <td>Jacob Brown</td>
                    			<td>Client name 1</td>
                    			<td>Admin</td>
                    			<td>12-05-2014 03:20:00</td>
                    			<td><a href="#">DummyFile.docx</a></td>
                    			<td class="c_blue">Draft</td>                 			
                    			<td class="actions">
                    				Janet Jackson
                    			</td>
                    		</tr>
                            <tr>
                    			<td>Orders</td>
                                <td>Peter Smith</td>
                    			<td>Client name 1</td>
                    			<td>Admin</td>
                    			<td>12-05-2014 03:20:00</td>
                    			<td><a href="#">DummyFile.docx</a></td>
                    			<td class="c_green">Approved</td>                  			
                    			<td class="actions">
                    				John Mayer
                    			</td>
                    		</tr>
                            <tr>
                    			<td>Orders</td>
                                <td>Jude Brown</td>
                    			<td>Client name 1</td>
                    			<td>Admin</td>
                    			<td>12-05-2014 03:20:00</td>
                    			<td><a href="#">DummyFile.docx</a></td>
                    			<td class="c_blue">Draft</td>                 			
                    			<td class="actions">
                    				Joe Satriani
                    			</td>
                    		</tr>
                            <tr>
                    			<td>Orders</td>
                                <td>Luke Smith</td>
                    			<td>Client name 1</td>
                    			<td>Admin</td>
                    			<td>12-05-2014 03:20:00</td>
                    			<td><a href="#">DummyFile.docx</a></td>
                    			<td class="c_green">Approved</td>                  			
                    			<td class="actions">
                    				John Lennon
                    			</td>
                    		</tr>
                    
                    	
                    	</tbody>
            	</table>
            	<div class="paginator">
                    <ul class="pagination">
                    <li class="prev disabled">
                    <a href="">< previous</a>
                    </li>
                    <li class="active">
                    <a href="#">1</a>
                    </li>
                    <li>
                    <a href="#">2</a>
                    </li>
                    <li class="next">
                    <a href="#" rel="next">next ></a>
                    </li>
                    </ul>
                </div>
                </div>
            </div>
        </div>
