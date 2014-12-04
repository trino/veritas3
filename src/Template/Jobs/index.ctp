<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>
                    Jobs
                </div>
            </div>    
            <div class="portlet-body">
             <div class="col-md-6 col-sm-12 nopad">
                    <div id="sample_1_filter" class="dataTables_filter mar">
                        <form>
                            <label>                        
                            <input class="form-control input-inline" type="search" placeholder=" Search for Job" aria-controls="sample_1"> <button type="submit" class="btn btn-primary">Search</button>
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
                    			<th><?= $this->Paginator->sort('description') ?></th>
                    			<th><?= $this->Paginator->sort('date_start') ?></th>
                    			<th><?= $this->Paginator->sort('date_end') ?></th>
                    			<th><?= $this->Paginator->sort('site') ?></th>                    			
                    			<th class="actions"><?= __('Actions') ?></th>
                    		</tr>
                    	</thead>
                    	<tbody>
                    	<?php foreach ($job as $jobs): ?>
                    		<tr>
                    			<td><?= $this->Number->format($jobs->id) ?></td>
                    			<td><?= h($jobs->title) ?></td>
                    			<td><?= h($jobs->description) ?></td>
                    			<td><?= h($jobs->date_start) ?></td>
                    			<td><?= h($jobs->date_end) ?></td>
                    			<td><?= h($jobs->site) ?></td>                    			
                    			<td class="actions">
                    				
                    				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $jobs->id], ['class' => 'btn btn-primary']) ?>
                    				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $jobs->id], ['class' => 'btn btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?', $jobs->id)]) ?>
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
