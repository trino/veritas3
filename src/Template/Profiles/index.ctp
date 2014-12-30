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
    <a href="javascript:window.print();" class="floatright btn btn-info">Print</a>
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
                            <form action="<?php echo $this->request->webroot; ?>profiles/search" method="get">
                                <div class="col-md-2" style="padding-left:0;">
                                    <select class="form-control" style="" name="filter_profile_type">
                                        <option value="">Filter By</option>
                                        <!--<option value=""><?php //echo ucfirst($settings->profile); ?> Type</option>-->
                                        <option value="1" <?php if(isset($return_profile_type) && $return_profile_type==1){?> selected="selected"<?php } ?> >Admin</option>
                                        <option value="2" <?php if(isset($return_profile_type) && $return_profile_type==2){?> selected="selected"<?php } ?>>Recruiter</option>
                                        <option value="3" <?php if(isset($return_profile_type) && $return_profile_type==3){?> selected="selected"<?php } ?>>External</option>
                                        <option value="4" <?php if(isset($return_profile_type) && $return_profile_type==4){?> selected="selected"<?php } ?>>Safety</option>
                                        <option value="5" <?php if(isset($return_profile_type) && $return_profile_type==5){?> selected="selected"<?php } ?>>Driver</option>
                                        <option value="6" <?php if(isset($return_profile_type) && $return_profile_type==6){?> selected="selected"<?php } ?>>Contact</option>
                                    </select>
                                </div>
                                 <!--</form>
                                <form action="<?php //echo $this->request->webroot; ?>profiles/search" method="get">-->
                                <div class="col-md-6 ">
                                    <input class="form-control input-inline" type="search" name="searchprofile"  placeholder=" Search for <?php echo ucfirst($settings->profile); ?>" value="<?php if(isset($search_text)) echo $search_text; ?>"     aria-controls="sample_1"/>
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