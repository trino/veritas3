<?php $settings = $this->requestAction('settings/get_settings');?>
<?php $sidebar =$this->requestAction("settings/get_side/".$this->Session->read('Profile.id'));?>
<h3 class="page-title">
			<?php echo ucfirst($settings->client);?>s
			</h3>
    <div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo $this->request->webroot;?>">Dashboard</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href=""><?php echo ucfirst($settings->client);?></a>
					</li>
				</ul>
			<a href="javascript:window.print();" class="floatright btn btn-info">Print</a>	
			</div>
<div class="row">
    
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>
                    <?php echo ucfirst($settings->client);?>
                </div>
            </div>    
            <div class="portlet-body">
             <div class="chat-form">
                            <!--<form>
                                div class="col-md-2" style="padding-left:0;">
                                    <select class="form-control" style="">
                                        <option value=""><?php //echo ucfirst($settings->client); ?> Type</option>
                                        <option value="">London</option>
                                        <option value="">Quebec</option>
                                        <option value="">BC</option>
                                        <option value="">Ontario</option>
                                        <option value="">Quick Contacts</option>
                                    </select>
                                </div-->
                                <form action="<?php echo $this->request->webroot; ?>clients/search" method="get">
                                <div class="col-md-6"  style="padding-left:0;">
                                    <input class="form-control input-inline" name="search" type="search"     placeholder=" Search for <?php echo ucfirst($settings->client); ?>"   value="<?php if(isset($search_text)) echo $search_text; ?>"    aria-controls="sample_1"/>
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </form>
                    </div>
                <div class="table-scrollable">
                    <table class="table table-hover  table-striped table-bordered table-hover dataTable no-footer">
                    	<thead>
                    		<tr>
                    			<th><?= $this->Paginator->sort('id') ?></th>
                    			<th><?= $this->Paginator->sort('image') ?></th>
                    			<th><?= $this->Paginator->sort('title') ?></th>
                    			<th><?= $this->Paginator->sort('description') ?></th>
                    			<th><?= $this->Paginator->sort('date_start') ?></th>
                    			<th><?= $this->Paginator->sort('date_end') ?></th>
                    			<th><?= $this->Paginator->sort('site') ?></th>                    			
                    			<th class="actions"><?= __('Actions') ?></th>
                    		</tr>
                    	</thead>
                    	<tbody>
                    	<?php foreach ($client as $clients):
                        //print_r($clients);
                        if($clients->date_start){
                        foreach($clients->date_start as $k=>$d)
                        {
                            if($k == 'date')
                            $start_date = $d;
                        }
                        }
                        else
                        $start_date = '';
                        
                        if($clients->date_end){
                        foreach($clients->date_end as $k=>$d)
                        {
                            if($k == 'date')
                            $end_date = $d;
                        }
                        }
                        else
                        $end_date = '';
                          ?>

                    
                    		<tr>
                    			<td><?= $this->Number->format($clients->id) ?></td>
                    			<td>     <img src="<?php echo $this->request->webroot; ?>img/logos/challenger_logo.png" style="height:45px;"/>
                                 </td>
                    			<td><?= h($clients->title) ?></td>
                    			<td><?= h($clients->description) ?></td>
                    			<td><?= h($start_date) ?></td>
                    			<td><?= h($end_date) ?></td>
                    			<td><?= h($clients->site) ?></td>
                    			<td class="actions">
                    				<?php  if($sidebar->client_list=='1'){ echo $this->Html->link(__('View'), ['action' => 'view', $clients->id], ['class' => 'btn btn-info']);}
                                if($this->request->session()->read('Profile.admin'))
                                {
                                    if($sidebar->client_edit=='1'){ echo $this->Html->link(__('Edit'), ['action' => 'edit', $clients->id], ['class' => 'btn btn-primary']);} ?>
                    				<?php  if($sidebar->client_delete=='1'){ echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $clients->id], ['class' => 'btn btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?', $clients->id)]);} ?>
                                    <?php
                                }
                                ?>	 
                    			</td>
                    		</tr>
                    
                    	<?php endforeach; ?>
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
                        <?= $this->Paginator->prev('< ' . __('previous')); ?>
                        <?= $this->Paginator->numbers(); ?>
                        <?=	$this->Paginator->next(__('next') . ' >'); ?>
                    </ul>

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