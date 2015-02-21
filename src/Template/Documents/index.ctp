<?php $settings = $this->requestAction('settings/get_settings');?>
<?php $sidebar =$this->requestAction("settings/all_settings/".$this->Session->read('Profile.id')."/sidebar");?>
<h3 class="page-title">
			<?php echo ucfirst($settings->document);?>s <?php if(isset($_GET['draft'])){?>(Draft)<?php }?>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo $this->request->webroot;?>">Dashboard</a>
                        <i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href=""><?php echo ucfirst($settings->document);?>s</a>
					</li>
				</ul>

                <a href="javascript:window.print();" class="floatright btn btn-info">Print</a>
			</div>


<div class="row">
    <div class="col-md-12">
        <div class="portlet box yellow-casablanca ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-copy"></i>
                    List <?php echo ucfirst($settings->document);?>s
                </div>
            </div>    
            <div class="portlet-body">
				<div class="chat-form">
					<form action="<?php echo $this->request->webroot; ?>documents/index" method="get">
                        <?php if(isset($_GET['draft'])){?><input type="hidden" name="draft" /><?php }?>
                       <!-- </form>-->
                        <?php
                            $users = $this->requestAction("documents/getAllUser");
                        ?>
                        <!--<form action="<?php// echo $this->request->webroot; ?>documents/submittedBy" method="get">-->
						
                        
                        <div class="col-md-2"  style="padding-left:0;">

                            <input class="form-control" name="searchdoc" type="search" placeholder=" Search <?php echo ucfirst($settings->document); ?>s" value="<?php if(isset($search_text)) echo $search_text; ?>" aria-controls="sample_1"/>

                        </div>
                        <div class="col-md-2" style="padding-left:0;">
							<select class="form-control" name="submitted_by_id" style="">
								<option value="">Submitted by</option>
                                <?php
                                    foreach($users as $u)
                                    {
                                        ?>
                                        <option value="<?php echo $u->id;?>" <?php if(isset($return_user_id) && $return_user_id==$u->id){?> selected="selected"<?php } ?> ><?php echo $u->username; ?></option>
                                        <?php
                                    }
                                 ?>
							</select>
						</div>
                       <!-- </form>-->
                        <?php
                            $type = $this->requestAction("documents/getDocType");
                        ?>
                        <!--<form action="<?php //echo $this->request->webroot; ?>documents/filterByType" method="get">-->
						<div class="col-md-2" style="padding-left:0;">
							<select class="form-control" name="type">
								<option value=""><?php echo ucfirst($settings->document);?> type</option>
								<?php
                                    foreach($type as $t)
                                    {
                                        ?>
                                        <option value="<?php echo $t->title;?>" <?php if(isset($return_type) && $return_type==$t->title){?> selected="selected"<?php } ?> ><?php echo ucfirst($t->title); ?></option>
                                        <?php
                                    }
                                 ?>
                                 <option value="orders" <?php if(isset($return_type) && $return_type=='orders'){?> selected="selected"<?php } ?>>Orders</option>
                                 <option value="feedbacks" <?php if(isset($return_type) && $return_type=='feedbacks'){?> selected="selected"<?php } ?>>Feedback</option>
							</select>
						</div>
                        <!--</form>-->
                        <?php
                            $clients = $this->requestAction("documents/getAllClient");
                        ?>
                        <!--<form action="<?php //echo $this->request->webroot; ?>documents/filterByClient" method="get">-->
						<div class="col-md-2" style="padding-left:0;">
							<select class="form-control showclientdivision" name="client_id">
								<option value=""><?php echo ucfirst($settings->client);?></option>
								<?php 
                                    foreach($clients as $c)
                                    {
                                        ?>
                                        <option value="<?php echo $c->id;?>" <?php if(isset($return_client_id) && $return_client_id==$c->id){?> selected="selected"<?php } ?> ><?php echo $c->company_name; ?></option>
                                        <?php
                                    }
                                 ?>

							</select>
						</div>

                        <div class="col-md-2 clientdivision"  style="padding-left:0;">
                        <!-- Divisions section -->
                        </div>

                        <div class="col-md-2" style="padding-left:0;padding-right:0;" align="right">
							<button type="submit" class="btn btn-primary" id="search">Search</button>
                        </div>

					</form>
				</div>


				<div class="clearfix"></div>


                <div class="table-responsive">
                    <table class="table table-condensed table-striped table-bordered table-hover dataTable no-footer">
                    	<thead>
                    		<tr class="sorting">
                                <th><?= $this->Paginator->sort('id');?></th>
                    			<th><?= $this->Paginator->sort('document_type',ucfirst($settings->document));?></th>
                    			<th><?= $this->Paginator->sort('user_id','Uploaded by');?><?php if(isset($end)) echo $end; if(isset($start)) echo "//".$start; ?></th>
                    			<th><?= $this->Paginator->sort('created','Uploaded on');?></th>
                                <th><?= $this->Paginator->sort('client_id',ucfirst($settings->client));?></th>
                    			<th class="actions"><?= __('Actions') ?></th>

                    		</tr>
                    	</thead>
                    	<tbody>
                        <?php
                        $row_color_class = "odd";
                        $subdoc = $this->requestAction('/profiles/getSub');
                        $docz = [''];
                        foreach($subdoc as $d)
                        {
                            array_push($docz,$d->title);
                        }
                        //var_dump($docz);
                        if (count($documents) == 0){
                            echo '<TR><TD COLSPAN="6" ALIGN="CENTER">No ' . strtolower($settings->document) . 's found';
                            if(isset($_GET['searchdoc'])) { echo " matching '" . $_GET['searchdoc'] . "'";}
                            echo '</TD></TR>';
                        }

                        foreach ($documents as $docs):
                            
                            if($docs->document_type=='feedbacks' && !$this->request->session()->read('Profile.super'))
                            continue;
                            
                            //$prosubdoc = $this->requestAction('/settings/all_settings/0/0/profile/'.$this->Session->read('Profile.id').'/'.array_search($docs->document_type, $docz));
                            //var_dump($prosubdoc);
                            if($row_color_class=="even")
                            {
                                $row_color_class ="odd";
                            }else{
                                $row_color_class ="even";
                            }
                            $uploaded_by = $this->requestAction("documents/getUser/".$docs->user_id);
                            $getClientById = $this->requestAction("documents/getClientById/".$docs->client_id);
                          ?> 
                          <tr class="<?=$row_color_class;?>" role="row">
                                <td><?= $this->Number->format($docs->id) ?></td>
                                <td><?= h($docs->document_type) ?></td>
                              <td><?php

                                  if (isset($uploaded_by->username)) {
                                      $user = h($uploaded_by->username);
                                  } else { $user = "Unknown user"; }

                                  echo $user;
                                  $docname = h($docs->document_type) . " uploaded by " . $user . " at " . h($docs->created);

                                  ?></td>
                                <td><?= h($docs->created) ?></td>
                                <td>
                                    <?php
                                    if (is_object($getClientById)) {
                                        echo h($getClientById->company_name);
                                    } else {
                                        echo "Deleted " . $settings->client;
                                    }
                                    ?>

                                </td>
                                <td class="actions  util-btn-margin-bottom-5 ">

                                    <?php  if($sidebar->document_list=='1'){ echo $this->Html->link(__('View'), ['action' => 'view',$docs->client_id, $docs->id], ['class' => 'btn btn-info']);} ?>
                                    <?php  
                                    if($sidebar->document_edit=='1')
                                    {
                                        if($docs->document_type=='feedbacks' )
                                            echo $this->Html->link(__('Edit'), ['controller'=>'feedbacks','action' => 'edit', $docs->id], ['class' => 'btn btn-primary']);
                                        elseif($docs->document_type=='order')
                                            echo $this->Html->link(__('Edit'), ['controller'=>'documents','action' => 'editorder',$docs->client_id, $docs->id], ['class' => 'btn btn-primary']);
                                        else
                                            echo $this->Html->link(__('Edit'), ['action' => 'add',$docs->client_id, $docs->id], ['class' => 'btn btn-primary']);
                                    }
                                     ?>
                                    <?php  if($sidebar->document_delete=='1')
                                    {
                                        if(isset($_GET['draft']))
                                        {
                                        ?> 
                                        <a href="<?php echo $this->request->webroot;?>documents/delete/<?php echo $docs->id;?>/draft" onclick="return confirm('Are you sure you want to delete <?= $docname;?>?');" class="btn btn-danger" >Delete</a>
                                        
                                        <?php 
                                        }
                                        else
                                        {
                                        ?>
                                        <a href="<?php echo $this->request->webroot;?>documents/delete/<?php echo $docs->id;?>" onclick="return confirm('Are you sure you want to delete <?= $docname;?>?');" class="btn btn-danger" >Delete</a>
                                        <?php 
                                        }
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
        $('.applyBtn').live('click',function(){
            var to = $('.daterangepicker_end_input .input-mini').val();
           var from = $('.daterangepicker_start_input .input-mini').val();
           var url = '<?php echo $this->request->webroot; ?>documents/index';
           var base = url;
           
           <?php
           if(isset($_GET['searchdoc']))
           {
            ?>
            if(url==base)
            url = url+'?searchdoc=<?php echo $_GET['searchdoc']?>';
            else
            url = url+'&searchdoc=<?php echo $_GET['searchdoc']?>';
            <?php
           }
           ?> 
            <?php
           if(isset($_GET['submitted_by_id']))
           {
            ?>
            if(url==base)
            url = url+'?submitted_by_id=<?php echo $_GET['submitted_by_id']?>';
            else
            url = url+'&submitted_by_id=<?php echo $_GET['submitted_by_id']?>';
            <?php
           }
           ?> 
            <?php
           if(isset($_GET['type']))
           {
            ?>
            if(url==base)
            url = url+'?type=<?php echo $_GET['type']?>';
            else
            url = url+'&type=<?php echo $_GET['type']?>';
            <?php
           }
           ?> 
           <?php
           if(isset($_GET['client_id']))
           {
            ?>
            if(url==base)
            url = url+'?client_id=<?php echo $_GET['client_id']?>';
            else
            url = url+'&client_id=<?php echo $_GET['client_id']?>';
            <?php
           }
           ?> 
           if(url==base)
           {
            url = url+'?to='+to+'&from='+from;
           }
           else
           url = url+'&to='+to+'&from='+from;
           window.location = url;
        });
        
        <?php if(isset($_GET['division'])&& $_GET['division']!=""){
            //var_dump($_GET);
            ?>
        var client_id = <?php echo $_GET['client_id'];?>;
        var division_id = <?php echo $_GET['division'];?>;
        //alert(client_id+'__'+division_id);
        if (client_id != "") {
            $.ajax({
                type: "post",
                data: "client_id=" + client_id,
                url: "<?php echo $this->request->webroot;?>clients/getdivisions/" + division_id,
                success: function (msg) {
                    //alert(msg);
                    $('.clientdivision').html(msg);
                }
            });
        }
        <?php
        }?>
        $('.showclientdivision').change(function () {
            var client_id = $(this).val();
            if (client_id != "") {
                $.ajax({
                    type: "post",
                    data: "client_id=" + client_id,
                    url: "<?php echo $this->request->webroot;?>clients/getdivisions",
                    success: function (msg) {
                        $('.clientdivision').html(msg);
                    }
                });
            }
    }); 
    var client_id = $('.showclientdivision').val();
            if(client_id !="")
            {
                $.ajax({
                    type: "post",
                    data: "client_id="+client_id,
                    url: "<?php echo $this->request->webroot;?>clients/getdivisions",
                    success: function(msg){
                        $('.clientdivision').html(msg);
                    } 
                });
            }
    </script>
