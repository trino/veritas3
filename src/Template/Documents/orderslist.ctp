<?php $settings = $this->requestAction('settings/get_settings');?>
<?php $sidebar =$this->requestAction("settings/get_side/".$this->Session->read('Profile.id'));?>
<h3 class="page-title">
			Orders <small>View/Edit/Delete Orders</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo $this->request->webroot;?>">Dashboard</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="">Orders</a>
					</li>
				</ul>
				<div class="page-toolbar">
					<!--div id="dashboard-report-range" style="padding-bottom: 6px;" class="pull-right tooltips btn btn-fit-height grey-salt" data-placement="top" data-original-title="Change dashboard date range">
						<i class="icon-calendar"></i>&nbsp;
						<span class="thin uppercase visible-lg-inline-block">&nbsp;</span>&nbsp;
						<i class="fa fa-angle-down"></i>
					</div-->
				</div>
                <a href="javascript:window.print();" class="floatright btn btn-info">Print</a>
			</div>



<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-clipboard"></i>
                    Orders Listing
                </div>
            </div>    
            <div class="portlet-body">
				<div class="chat-form">
					<form action="<?php echo $this->request->webroot; ?>documents/orderslist" method="get">
						<div class="col-md-2 col-sm-12" style="padding-left:0;">
							<input class="form-control" name="searchdoc" type="search" placeholder=" Search Orders" value="<?php if(isset($search_text)) echo $search_text; ?>" aria-controls="sample_1"/>
						</div>
                        <?php
                            $users = $this->requestAction("documents/getAllUser");
                        ?>
						<div class="col-md-3 col-sm-12">
							<select class="form-control" name="submitted_by_id" style="">
								<option value="">Submitted by</option>
                                <?php 
                                    foreach($users as $u) {
                                        ?>
                                        <option value="<?php echo $u->id;?>" <?php if(isset($return_user_id) && $return_user_id==$u->id){?> selected="selected"<?php } ?> ><?php echo $u->username; ?></option>
                                        <?php
                                    }
                                 ?>
							</select>
						</div>
                        <!--
                        <?php
                            $type = $this->requestAction("documents/getDocType");
                        ?>
						<div class="col-md-3 col-sm-12">
							<select class="form-control" name="type">
								<option value="">Order Type</option>
								<?php 
                                    foreach($type as $t)
                                    {
                                        ?>
                                        <option value="<?php echo $t->title;?>" <?php if(isset($return_type) && $return_type==$t->title){?> selected="selected"<?php } ?> ><?php echo ucfirst($t->title); ?></option>
                                        <?php
                                    }
                                 ?>
                                 <option value="orders" <?php if(isset($return_type) && $return_type=='orders'){?> selected="selected"<?php } ?>>Orders</option>
                                 <option value="feedbacks" <?php if(isset($return_type) && $return_type=='feedbacks'){?> selected="selected"<?php } ?>>Feedbacks</option>
							</select>
						</div>-->
                        <!--</form>-->
                        <?php
                            $clients = $this->requestAction("documents/getAllClient");
                        ?>
                        <!--<form action="<?php //echo $this->request->webroot; ?>documents/filterByClient" method="get">-->
						<div class="col-md-3 col-sm-12">
							<select class="form-control" name="client_id">
								<option value=""><?php echo ucfirst($settings->client);?></option>
								<?php 
                                    foreach($clients as $c)
                                    {
                                        ?>
                                        <option value="<?php echo $c->id;?>" <?php if(isset($return_client_id) && $return_client_id==$c->id){?> selected="selected"<?php } ?> ><?php echo $c->title; ?></option>
                                        <?php
                                    }
                                 ?>

							</select>
						</div>
                        <div class="col-md-1 col-sm-12">
							<button type="submit" class="btn btn-primary">Search</button>
                        </div>

					</form>
				</div>


				<div class="clearfix"></div>



                <div class="table-scrollable">
                    <table class="table table-hover table-striped table-bordered table-hover dataTable no-footer">
                    	<thead>
                    		<tr>
                                <th><?= $this->Paginator->sort('id');?></th>
             			        <th><?= $this->Paginator->sort('title');?></th>
                    			<th><?= $this->Paginator->sort('profile->title','Uploaded by');?></th>
                    			<th><?= $this->Paginator->sort('profile->title;','Uploaded for');?></th>   
                                <th><?= $this->Paginator->sort('client_id','Client');?></th>
                                <th><?= $this->Paginator->sort('created','Created');?></th>               			
                    			<th class="actions"><?= __('Actions') ?></th>
                    		</tr>
                    	</thead>
                    	<tbody>
                        <?php
                        $row_color_class = "odd";
                        
                        foreach ($orders as $order):
                                //var_dump($order);
                            if($row_color_class=="even")
                            {
                                $row_color_class ="odd";
                            }else{
                                $row_color_class ="even";
                            }
                            $uploaded_by = $this->requestAction("documents/getUser/".$order->user_id);
                            $uploaded_for = $this->requestAction("documents/getUser/".$order->uploaded_for);
                            $client = $this->requestAction("clients/getClient/".$order->client_id);
                          ?>
                          <tr class="<?=$row_color_class;?>" role="row">
                                <td><?= $this->Number->format($order->id); //echo $order->profile->title; ?></td>
                                <td><?= h($order->title) ?></td>
                                <td><?= h($uploaded_by->username) ?></td>
                                <td><?= h($uploaded_for->username) ?></td>
                                <td><?= h($client->title) ?></td>
                                <td><?= h($order->created) ?></td>
                                <td class="actions  util-btn-margin-bottom-5" >

                                    <?php
                                      if($sidebar->orders_list=='1'){
                                        
                                        echo $this->Html->link(__('View'), ['action' => 'vieworder', $order->client_id,$order->id], ['class' => 'btn btn-info']);} ?>
                                    <?php
                                    $super = $this->request->session()->read('Profile.super');
                                        if(isset($super) || isset($_GET['draft']))
                                        {  
                                    if($sidebar->orders_edit=='1')
                                    {
                                        
                                        echo $this->Html->link(__('Edit'), ['controller'=>'documents','action' => 'addorder',$order->client_id, $order->id], ['class' => 'btn btn-primary']);
                                        
                                    }
                                     if($sidebar->orders_delete=='1'){
                                        ?><a href="<?php echo $this->request->webroot;?>documents/deleteorder/<?php echo $order->id;?>" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</a>
                                        <?php
                                         } } 
                                         ?>

                                        
<?php                                   if($sidebar->orders_requalify=='1') echo $this->Html->link(__('Re-Qualify'), ['controller' => 'documents', 'action' => 'addorder', $order->id], ['class' => 'btn btn-warning']);
?>
                                        <?php echo $this->Html->link(__('View Score Card'), ['controller'=>'documents','action' => 'viewReport',$order->client_id, $order->id], ['class' => 'btn btn-success']);?>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    	</tbody>
            	</table>

                </div>



				<div id="sample_2_paginate" class="dataTables_paginate paging_simple_numbers">
					 <ul class="pagination">
                        <?= $this->Paginator->prev('< ' . __('previous')); ?>
                        <?= $this->Paginator->numbers(); ?>
                        <?= $this->Paginator->next(__('next') . ' >'); ?>
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