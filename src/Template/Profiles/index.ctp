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


<?php
$getProfileType = $this->requestAction('profiles/getProfileType/' . $this->Session->read('Profile.id'));
 $settings = $this->requestAction('settings/get_settings');
$sidebar =$this->requestAction("settings/all_settings/".$this->request->session()->read('Profile.id')."/sidebar");
?>
<h3 class="page-title">
    <?php echo ucfirst($settings->profile); ?>s
</h3>

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?php echo $this->request->webroot; ?>">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href=""><?php echo ucfirst($settings->profile); ?>s</a>
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
                    List <?php echo ucfirst($settings->profile); ?>s
                </div>
            </div>




            <div class="portlet-body">
                    <div class="chat-form">
                            <form action="<?php echo $this->request->webroot; ?>profiles/index" method="get">
                            <?php if(isset($_GET['draft'])){?><input type="hidden" name="draft" /><?php }?>
                            <div class="col-md-3" align="left" style="padding-left:0;">
                                    <input  class="form-control input-inline" type="search" name="searchprofile"  placeholder=" Search for <?php echo ucfirst($settings->profile); ?>" value="<?php if(isset($search_text)) echo $search_text; ?>"     aria-controls="sample_1" />
                            </div>
                                <div class="col-md-3" style="padding-left:0;">
                                    <select class="form-control" style="" name="filter_profile_type">
                                        <option value="">Filter By <?php echo ucfirst($settings->profile); ?> Type</option>
                                        <!--<option value=""><?php //echo ucfirst($settings->profile); ?> Type</option>-->

                                        <?php
                                        $isISB = (isset($sidebar) && $sidebar->client_option == 0);
                                        if ($isISB){
                                        ?>

                                        <option value="1" <?php if(isset($return_profile_type) && $return_profile_type==1){?> selected="selected"<?php } ?> >Admin</option>
                                        <option value="2" <?php if(isset($return_profile_type) && $return_profile_type==2){?> selected="selected"<?php } ?>>Recruiter</option>
                                        <option value="3" <?php if(isset($return_profile_type) && $return_profile_type==3){?> selected="selected"<?php } ?>>External</option>
                                        <option value="4" <?php if(isset($return_profile_type) && $return_profile_type==4){?> selected="selected"<?php } ?>>Safety</option>
                                        <option value="5" <?php if(isset($return_profile_type) && $return_profile_type==5){?> selected="selected"<?php } ?>>Driver</option>
                                        <option value="6" <?php if(isset($return_profile_type) && $return_profile_type==6){?> selected="selected"<?php } ?>>Contact</option>
                                       <option value="7" <?php if(isset($return_profile_type) && $return_profile_type==7){?> selected="selected"<?php } ?>>Owner Operator</option>
                                        <option value="8" <?php if(isset($return_profile_type) && $return_profile_type==8){?> selected="selected"<?php } ?>>Owner Driver</option>
                                        <?php } else { ?>
                                        <option value="9" <?php if(isset($return_profile_type) && $return_profile_type==9){?> selected="selected"<?php } ?> >Employee</option>
                                        <option value="10" <?php if(isset($return_profile_type) && $return_profile_type==9){?> selected="selected"<?php } ?> >Guest</option>
                                        <option value=11 <?php if(isset($return_profile_type) && $return_profile_type==9){?> selected="selected"<?php } ?> >Partner</option>
                                        <?php }  ?>

                                    </select>
                                </div>
                                <?php
                                $super = $this->request->session()->read('Profile.super');
                                if(isset($super))
                                {
                                $getClient = $this->requestAction('profiles/getClient'); 
                                ?>
                                <div class="col-md-3" style="padding-left:0;">
                                    <select class="form-control showprodivision" style="" name="filter_by_client" >
                                        <option value="">Filter By <?php echo ucfirst($settings->client); ?></option>
                                        <?php 
                                        if($getClient)
                                            {
                                                foreach($getClient as $g)
                                                    {
                                                ?>
                                                <option value="<?php echo $g->id; ?>" <?php if(isset($return_client) && $return_client==$g->id){?> selected="selected"<?php } ?> ><?php echo $g->company_name; ?></option>
                                                <?php
                                                    }
                                             }
                                         ?>
                                    </select>
                                </div>
                                
                                <div class="col-md-2 prodivisions" style="padding-left:0;">
                                  <!-- Divisions section -->  
                                </div>
                                
                                
                                <?php } ?>
                                 <!--</form>
                                <form action="<?php //echo $this->request->webroot; ?>profiles/search" method="get">-->

                                <div class="col-md-1" align="right" style="padding-left:0;padding-right:0;">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </form>
                    </div>

                <div class="table-responsive">

                    <table class="table table-condensed  table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                        <tr class="sorting">
                            <th><?= $this->Paginator->sort('id') ?></th>
                            <th><?= $this->Paginator->sort('profile_type', ucfirst($settings->profile) . ' Type') ?></th>
                            <th><?= $this->Paginator->sort('fname','First Name') ?></th>
                            <th><?= $this->Paginator->sort('lname', 'Last Name') ?></th>
                            <th><?= $this->Paginator->sort('username', ucfirst($settings->profile)) ?></th>
                            <th><?= $this->Paginator->sort('email') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $row_color_class = "odd";

                        $isISB = (isset($sidebar) && $sidebar->client_option == 0);
                        $profiletype = ['', 'Admin', 'Recruiter', 'External', 'Safety', 'Driver', 'Contact', 'Owner Operator', 'Owner Driver', 'Employee', 'Guest', 'Partner'];


                        if (count($profiles) == 0){
                            echo '<TR><TD COLSPAN="7" ALIGN="CENTER">No ' . strtolower($settings->profile) . 's found';
                            if(isset($_GET['searchprofile'])) { echo " matching '" . $_GET['searchprofile'] . "'";}
                            echo '</TD></TR>';
                        }


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
                                <td><?php if (strlen( $profile->profile_type) > 0) { echo h($profiletype[$profile->profile_type]); } else {echo "Not specified"; } ?></td>
                                <td><?= h($profile->fname) ?></td>
                                <td><?= h($profile->lname) ?></td>
                                <td><?= h($profile->username) ?></td>
                                <td><?= h($profile->email) ?></td>
                                <td class="actions  util-btn-margin-bottom-5">

                                    <?php  if($sidebar->profile_list=='1'){ echo $this->Html->link(__('View'), ['action' => 'view', $profile->id], ['class' => 'btn btn-info']);} ?>
                                    <?php  
                                    $checker = $this->requestAction('settings/check_edit_permission/'.$this->request->session()->read('Profile.id').'/'.$profile->id);
                                    if($sidebar->profile_edit=='1' )
                                    {
                                        //if($profile->super == '1' && ($this->request->session()->read('Profile.super') == '1'))
//                                        {
//                                        echo $this->Html->link(__('Edit'), ['action' => 'edit', $profile->id], ['class' => 'btn btn-primary']);
//                                        }
//                                        else
//                                        {
//                                          if($profile->super != '1' && $profile->profile_type !='1')
//                                          {
//                                            if($this->request->session()->read('Profile.profile_type') != '1')
//                                            {
//                                                $pt = $profile->profile_type;
//                                                if($this->request->session()->read('Profile.id') == $profile->id)
//                                                {
//                                                    echo $this->Html->link(__('Edit'), ['action' => 'edit', $profile->id], ['class' => 'btn btn-primary']);
//                                                }
//                                                
//                                                else if($pt=='5' || $this->request->session()->read('Profile.id')==$profile->id)    
//                                                echo $this->Html->link(__('Edit'), ['action' => 'edit', $profile->id], ['class' => 'btn btn-primary']);
//                                            }
//                                            else
//                                            echo $this->Html->link(__('Edit'), ['action' => 'edit', $profile->id], ['class' => 'btn btn-primary']);
//                                          }  
//                                        }
                                    
            if($checker==1)
            {
                echo $this->Html->link(__('Edit'), ['action' => 'edit', $profile->id], ['class' => 'btn btn-primary']);

            } 
                                    } ?>
                                    <?php  if($sidebar->profile_delete=='1')
                                    {
                                        if($this->request->session()->read('Profile.super') == '1')
                                        {
                                            if($this->request->session()->read('Profile.id')!=$profile->id){
                                            ?>
                                            <a href="<?php echo $this->request->webroot;?>profiles/delete/<?php echo $profile->id;?>" onclick="return confirm('Are you sure you want to delete <?= h($profile->username) ?>?');" class="btn btn-danger" >Delete</a>
                                            <?php
                                            }
                                        }
                                        else if($this->request->session()->read('Profile.profile_type') == '2' && ($profile->profile_type == '5'))
                                        {                                        
                                                ?> 
                                                <a href="<?php echo $this->request->webroot;?>profiles/delete/<?php echo $profile->id;?>" onclick="return confirm('Are you sure you want to delete <?= h($profile->username) ?>?');" class="btn btn-danger" >Delete</a>
                                                <?php
                                        }
                                        
                                        
                                        /*else if($this->request->session()->read('Profile.profile_type') != '1')
                                        {
                                            $pt = $profile->profile_type;
                                            if($pt=='5' && $this->request->session()->read('Profile.id')==$profile->id)
                                            {
                                                ?>
                                                <a href="<?php echo $this->request->webroot;?>profiles/delete/<?php echo $profile->id;?>" onclick="return confirm('Are you sure you want to delete <?= h($profile->username) ?>?');" class="btn btn-danger" >Delete</a>
                                                <?php
                                            }
                                        }*/
                                    } 
                                    ?>
                                    <?php
                                    if($profile->profile_type==5)
                                    {
                                        ?>
                                        <a href="<?php echo $this->request->webroot;?>documents/productSelection?driver=<?php echo $profile->id;?>" class="btn btn-success">Add Order</a>
                                        <a href="<?php echo $this->request->webroot;?>profiles/viewReport/<?php echo $profile->id;?>" class="btn btn-primary">View Scorecard</a>
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
                        

                        <ul class="pagination sorting">
                            <?= $this->Paginator->prev('< ' . __('previous')); ?>
                            <?= $this->Paginator->numbers(); ?>
                            <?=	$this->Paginator->next(__('next') . ' >'); ?>
                        </ul>


                    </div>


        </div>
    </div>
</div>
<script>
    $(function () {
        $('.sorting').find('a').each(function(){
            
           <?php if(isset($_GET['draft'])){?>
           var hrf = $(this).attr('href');
           if(hrf!="")
            $(this).attr('href',hrf+'&draft');
           <?php } ?> 
        });
    })
    </script>
<script>

$(function(){
   <?php if(isset($_GET['division'])&& $_GET['division']!=""){
            //var_dump($_GET);
            ?>
        var client_id = <?php if(isset($_GET['filter_by_client'])&& $_GET['filter_by_client']!="") echo $_GET['filter_by_client'];?>;
        var division_id = <?php echo $_GET['division'];?>;
        //alert(client_id+'__'+division_id);
        if (client_id != "") {
            $.ajax({
                type: "post",
                data: "client_id=" + client_id,
                url: "<?php echo $this->request->webroot;?>clients/getdivisions/" + division_id,
                success: function (msg) {
                    //alert(msg);
                    $('.prodivisions').html(msg);
                }
            });
        }
        <?php
        }
        //if(isset($_GET['division'])&& $_GET['division']!="")
        ?>
        
        $('.showprodivision').change(function () {
            var client_id = $(this).val();
            if (client_id != "") {
                $.ajax({
                    type: "post",
                    data: "client_id=" + client_id,
                    url: "<?php echo $this->request->webroot;?>clients/getdivisions",
                    success: function (msg) {
                        $('.prodivisions').html(msg);
                    }
                });
            }
    }); 
    var client_id = $('.showprodivision').val();
            if(client_id !="")
            {
                $.ajax({
                    type: "post",
                    data: "client_id="+client_id,
                    url: "<?php echo $this->request->webroot;?>clients/getdivisions",
                    success: function(msg){
                        $('.prodivisions').html(msg);
                    } 
                });
            }
 
});
</script>