<?php $settings = $this->requestAction('settings/get_settings');?>
<h3 class="page-title">
			<?php echo ucfirst($settings->profile);?>
			</h3>
    <div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo $this->request->webroot;?>">Dashboard</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href=""><?php echo ucfirst($settings->profile);?></a>
					</li>
				</ul>
				
			</div><div class="row">

    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>
                    <?php echo ucfirst($settings->profile);?>
                </div>
            </div>    
            <div class="portlet-body">
            <form>
                
                <div class="col-md-10 col-sm-12 nopad">
                
                    
                    <div id="sample_1_filter" class="dataTables_filter mar">
                        <div class="col-md-3 nopad">
                    <select class="form-control">
                        <option value=""><?php echo ucfirst($settings->profile);?> Type</option>
                        <option value="">Admin</option>
                        <option value="">Recruiter</option>
                        <option value="">Contacts</option>
                        <option value="">Members</option>
                        <option value="">Quick Contacts</option>
                    </select>
                    </div>  
                      <div class="col-md-6 nopad">  
                            <label>                        
                            <input class="form-control input-inline" type="search" placeholder=" Search for profiles" aria-controls="sample_1" /> <button type="submit" class="btn btn-primary">Search</button>
                            </label>
                      </div>  
                    </div>
                
                </div>
                </form>
                <div class="table-scrollable">
                
                    <table class="table table-hover">
                    	<thead>
                    		<tr>
                    			<th><?= $this->Paginator->sort('id') ?></th>
                    			<th><?= $this->Paginator->sort('title') ?></th>
                    			<th><?= $this->Paginator->sort('fname') ?></th>
                    			<th><?= $this->Paginator->sort('lname') ?></th>
                    			<th><?= $this->Paginator->sort('username') ?></th>
                    			<th><?= $this->Paginator->sort('email') ?></th>                    			
                    			<th class="actions"><?= __('Actions') ?></th>
                    		</tr>
                    	</thead>
                    	<tbody>
                    	<?php foreach ($profiles as $profile): ?>
                    		<tr>
                    			<td><?= $this->Number->format($profile->id) ?></td>
                    			<td><?= h($profile->title) ?></td>
                    			<td><?= h($profile->fname) ?></td>
                    			<td><?= h($profile->lname) ?></td>
                    			<td><?= h($profile->username) ?></td>
                    			<td><?= h($profile->email) ?></td>                    			
                    			<td class="actions">
                    				<?= $this->Html->link(__('View'), ['action' => 'view', $profile->id], ['class' => 'btn btn-info']) ?>
                    				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $profile->id], ['class' => 'btn btn-primary']) ?>
                    				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $profile->id], ['class' => 'btn btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?', $profile->id)]) ?>
                    			</td>
                    		</tr>
                    
                    	<?php endforeach; ?>
                    	</tbody>
            	</table>
            	<div class="paginator">
            		<ul class="pagination">
            			<?= $this->Paginator->prev('< ' . __('previous')); ?>
            			<?= $this->Paginator->numbers(); ?>
            			<?=	$this->Paginator->next(__('next') . ' >'); ?>
            		</ul>
            		
            	</div>
            </div>
            </div>
        </div>
    </div>
