<style>
    div{border:0px solid green;}
</style>

<?php $settings = $this->requestAction('settings/get_settings'); ?>
<?php $sidebar =$this->requestAction("settings/get_side/".$this->Session->read('Profile.id'));?>
<h3 class="page-title">
    <?php echo ucfirst($settings->profile); ?>
</h3>

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?php echo $this->request->webroot; ?>">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href=""><?php echo ucfirst($settings->profile); ?></a>
        </li>
    </ul>

</div>

<div class="row">


    <div class="col-md-12">


        <div class="portlet box green-haze">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>
                    <?php echo ucfirst($settings->profile); ?>
                </div>
            </div>




            <div class="portlet-body">
                    <div class="chat-form">
                            <form>
                                <div class="col-md-2" style="padding-left:0;">
                                    <select class="form-control" style="">
                                        <option value=""><?php echo ucfirst($settings->profile); ?> Type</option>
                                        <option value="">Admin</option>
                                        <option value="">Recruiter</option>
                                        <option value="">Contacts</option>
                                        <option value="">Members</option>
                                        <option value="">Quick Contacts</option>
                                    </select>
                                </div>
                                <div class="col-md-6 ">
                                    <input class="form-control input-inline" type="search"     placeholder=" Search for <?php echo ucfirst($settings->profile); ?>"      aria-controls="sample_1"/>
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </form>
                    </div>

                <div class="table-scrollable">

                    <table class="table table-hover  table-striped table-bordered table-hover dataTable no-footer">
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
                        <?php
                        $row_color_class = "odd";
                        foreach ($profiles as $profile):

                            if($row_color_class=="even")
                            {
                                $row_color_class ="odd";
                            }else{
                                $row_color_class ="even";
                            }
                            ?>

                            <tr class="<?=$row_color_class;?>" role="row">
                                <td><?= $this->Number->format($profile->id) ?></td>
                                <td><?= h($profile->title) ?></td>
                                <td><?= h($profile->fname) ?></td>
                                <td><?= h($profile->lname) ?></td>
                                <td><?= h($profile->username) ?></td>
                                <td><?= h($profile->email) ?></td>
                                <td class="actions">

                                    <?php  if($sidebar->profile_list=='1'){ echo $this->Html->link(__('View'), ['action' => 'view', $profile->id], ['class' => 'btn btn-info']);} ?>
                                    <?php  if($sidebar->profile_edit=='1'){ echo $this->Html->link(__('Edit'), ['action' => 'edit', $profile->id], ['class' => 'btn btn-primary']);} ?>
                                    <?php  if($sidebar->profile_delete=='1'){ echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $profile->id], ['class' => 'btn btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?', $profile->id)]);} ?>
                                    <?php  if($sidebar->document_create == '1'){?><a href="<?php echo $this->request->webroot; ?>documents/add" class="btn btn-warning" >Submit Order</a><?php }?>

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
