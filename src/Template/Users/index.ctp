<div class="row">
    <div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo $this->request->webroot;?>">Dashboard</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="">Users</a>
					</li>
				</ul>
				
			</div>
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>
                    Users
                </div>
            </div>    
            <div class="portlet-body">
                <div class="col-md-6 col-sm-12 nopad">
                    <div id="sample_1_filter" class="dataTables_filter mar">
                        <form>
                            <label>                        
                            <input class="form-control input-inline" type="search" placeholder=" Search for users" aria-controls="sample_1"> <button type="submit" class="btn btn-primary">Search</button>
                            </label>
                        </form>
                    </div>
                </div>
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
                    	<?php foreach ($users as $user): ?>
                    		<tr>
                    			<td><?= $this->Number->format($user->id) ?></td>
                    			<td><?= h($user->title) ?></td>
                    			<td><?= h($user->fname) ?></td>
                    			<td><?= h($user->lname) ?></td>
                    			<td><?= h($user->username) ?></td>
                    			<td><?= h($user->email) ?></td>                    			
                    			<td class="actions">
                    				<?= $this->Html->link(__('View'), ['action' => 'view', $user->id], ['class' => 'btn btn-info']) ?>
                    				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class' => 'btn btn-primary']) ?>
                    				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['class' => 'btn btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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
