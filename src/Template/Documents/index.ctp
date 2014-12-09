<h3 class="page-title">
			Documents <small>All document listing</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo $this->request->webroot;?>">Dashboard</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="">Documents</a>
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
    <div class="col-md-4 col-sm-12">
                    <select class="form-control">
                        <option value="">Uploaded by</option>
                        <option value="0">Admin</option>
                        <option value="3">anwar</option>
                        <option value="4">bikash</option>
                        <option value="5">teken</option>
                        <option value="6">bhupal</option>
                        <option value="7">aaa</option>
                        <option value="8">aaaa</option>
                        <option value="9">asdf</option>
                        <option value="10">z</option>
                        <option value="11">y</option>
                        <option value="12">x</option>
                        <option value="13">abc</option>
                    </select>
             </div>
             <div class="col-md-4 col-sm-12">
                    <select class="form-control">
                        <option value="">Document type</option>
                        <option value="0">Admin</option>
                        <option value="3">anwar</option>
                        <option value="4">bikash</option>
                        <option value="5">teken</option>
                        <option value="6">bhupal</option>
                        <option value="7">aaa</option>
                        <option value="8">aaaa</option>
                        <option value="9">asdf</option>
                        <option value="10">z</option>
                        <option value="11">y</option>
                        <option value="12">x</option>
                        <option value="13">abc</option>
                    </select>
             </div>
             <div class="col-md-4 col-sm-12">
                    <select class="form-control">
                        <option value="">Jobs</option>
                        <option value="0">Admin</option>
                        <option value="3">anwar</option>
                        <option value="4">bikash</option>
                        <option value="5">teken</option>
                        <option value="6">bhupal</option>
                        <option value="7">aaa</option>
                        <option value="8">aaaa</option>
                        <option value="9">asdf</option>
                        <option value="10">z</option>
                        <option value="11">y</option>
                        <option value="12">x</option>
                        <option value="13">abc</option>
                    </select>
             </div>
             <div class="clearfix"></div>
             <hr />
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>
                    Jobs
                </div>
            </div>    
            <div class="portlet-body">
             
                <div class="table-scrollable">
                    <table class="table table-hover">
                    	<thead>
                    		<tr>
                    			<th>Document type</th>
                    			<th>Job</th>
                    			<th>Uploaded by</th>
                    			<th>Uploaded on</th>
                    			<th>Files</th>                   			
                    			<th class="actions"><?= __('Actions') ?></th>
                    		</tr>
                    	</thead>
                    	<tbody>
                    	
                    		<tr>
                    			<td>Orders</td>
                    			<td>Job name 1</td>
                    			<td>Admin</td>
                    			<td>12-05-2014 03:20:00</td>
                    			<td><a href="#">DummyFile.docx</a></td>
                    			                  			
                    			<td class="actions">
                    				<?= $this->Html->link(__('View'), ['action' => 'view'], ['class' => 'btn btn-info']) ?>
                    				<?= $this->Html->link(__('Edit'), ['action' => '#'], ['class' => 'btn btn-primary']) ?>
                    				<?= $this->Form->postLink(__('Delete'), ['action' => '#'], ['class' => 'btn btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?')]) ?>
                    			</td>
                    		</tr>
                            <tr>
                    			<td>Orders</td>
                    			<td>Job name 1</td>
                    			<td>Admin</td>
                    			<td>12-05-2014 03:20:00</td>
                    			<td><a href="#">DummyFile.docx</a></td>
                    			                  			
                    			<td class="actions">
                    				<?= $this->Html->link(__('View'), ['action' => 'view'], ['class' => 'btn btn-info']) ?>
                    				<?= $this->Html->link(__('Edit'), ['action' => 'edit'], ['class' => 'btn btn-primary']) ?>
                    				<?= $this->Form->postLink(__('Delete'), ['action' => '#'], ['class' => 'btn btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?')]) ?>
                    			</td>
                    		</tr>
                            <tr>
                    			<td>Orders</td>
                    			<td>Job name 1</td>
                    			<td>Admin</td>
                    			<td>12-05-2014 03:20:00</td>
                    			<td><a href="#">DummyFile.docx</a></td>
                    			                  			
                    			<td class="actions">
                    				<?= $this->Html->link(__('View'), ['action' => 'view'], ['class' => 'btn btn-info']) ?>
                    				<?= $this->Html->link(__('Edit'), ['action' => 'edit'], ['class' => 'btn btn-primary']) ?>
                    				<?= $this->Form->postLink(__('Delete'), ['action' => '#'], ['class' => 'btn btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?')]) ?>
                    			</td>
                    		</tr>
                            <tr>
                    			<td>Orders</td>
                    			<td>Job name 1</td>
                    			<td>Admin</td>
                    			<td>12-05-2014 03:20:00</td>
                    			<td><a href="#">DummyFile.docx</a></td>
                    			                  			
                    			<td class="actions">
                    				<?= $this->Html->link(__('View'), ['action' => 'view'], ['class' => 'btn btn-info']) ?>
                    				<?= $this->Html->link(__('Edit'), ['action' => 'edit'], ['class' => 'btn btn-primary']) ?>
                    				<?= $this->Form->postLink(__('Delete'), ['action' => '#'], ['class' => 'btn btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?')]) ?>
                    			</td>
                    		</tr><tr>
                    			<td>Orders</td>
                    			<td>Job name 1</td>
                    			<td>Admin</td>
                    			<td>12-05-2014 03:20:00</td>
                    			<td><a href="#">DummyFile.docx</a></td>
                    			                  			
                    			<td class="actions">
                    				<?= $this->Html->link(__('View'), ['action' => 'view'], ['class' => 'btn btn-info']) ?>
                    				<?= $this->Html->link(__('Edit'), ['action' => 'edit'], ['class' => 'btn btn-primary']) ?>
                    				<?= $this->Form->postLink(__('Delete'), ['action' => '#'], ['class' => 'btn btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?')]) ?>
                    			</td>
                    		</tr>
                            <tr>
                    			<td>Orders</td>
                    			<td>Job name 1</td>
                    			<td>Admin</td>
                    			<td>12-05-2014 03:20:00</td>
                    			<td><a href="#">DummyFile.docx</a></td>
                    			                  			
                    			<td class="actions">
                    				<?= $this->Html->link(__('View'), ['action' => 'view'], ['class' => 'btn btn-info']) ?>
                    				<?= $this->Html->link(__('Edit'), ['action' => 'edit'], ['class' => 'btn btn-primary']) ?>
                    				<?= $this->Form->postLink(__('Delete'), ['action' => '#'], ['class' => 'btn btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?')]) ?>
                    			</td>
                    		</tr>
                            <tr>
                    			<td>Orders</td>
                    			<td>Job name 1</td>
                    			<td>Admin</td>
                    			<td>12-05-2014 03:20:00</td>
                    			<td><a href="#">DummyFile.docx</a></td>
                    			                  			
                    			<td class="actions">
                    				<?= $this->Html->link(__('View'), ['action' => 'view'], ['class' => 'btn btn-info']) ?>
                    				<?= $this->Html->link(__('Edit'), ['action' => 'edit'], ['class' => 'btn btn-primary']) ?>
                    				<?= $this->Form->postLink(__('Delete'), ['action' => '#'], ['class' => 'btn btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?')]) ?>
                    			</td>
                    		</tr>
                            <tr>
                    			<td>Orders</td>
                    			<td>Job name 1</td>
                    			<td>Admin</td>
                    			<td>12-05-2014 03:20:00</td>
                    			<td><a href="#">DummyFile.docx</a></td>
                    			                  			
                    			<td class="actions">
                    				<?= $this->Html->link(__('View'), ['action' => 'view'], ['class' => 'btn btn-info']) ?>
                    				<?= $this->Html->link(__('Edit'), ['action' => 'edit'], ['class' => 'btn btn-primary']) ?>
                    				<?= $this->Form->postLink(__('Delete'), ['action' => '#'], ['class' => 'btn btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?')]) ?>
                    			</td>
                    		</tr>
                            <tr>
                    			<td>Orders</td>
                    			<td>Job name 1</td>
                    			<td>Admin</td>
                    			<td>12-05-2014 03:20:00</td>
                    			<td><a href="#">DummyFile.docx</a></td>
                    			                  			
                    			<td class="actions">
                    				<?= $this->Html->link(__('View'), ['action' => 'view'], ['class' => 'btn btn-info']) ?>
                    				<?= $this->Html->link(__('Edit'), ['action' => 'edit'], ['class' => 'btn btn-primary']) ?>
                    				<?= $this->Form->postLink(__('Delete'), ['action' => '#'], ['class' => 'btn btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?')]) ?>
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
