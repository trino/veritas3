<?php $settings = $this->requestAction('settings/get_settings');?>
<?php $sidebar =$this->requestAction("settings/all_settings/".$this->Session->read('Profile.id')."/sidebar");?>
<h3 class="page-title">
			<?php echo ucfirst($settings->document);?>s <small>View/Edit/Delete <?php echo ucfirst($settings->document);?>s</small>
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
                <form action="<?php echo $this->request->webroot; ?>documents/index" method="get">
				<div class="page-toolbar">
					<div id="dashboard-report-range" style="padding-bottom: 6px;" class="pull-right tooltips btn btn-fit-height grey-salt docum_date_filter" data-placement="top" data-original-title="Change dashboard date range">
						<i class="icon-calendar"></i>&nbsp;
						<span class="thin uppercase visible-lg-inline-block" id="doc_date_filter">&nbsp;</span>&nbsp;
						<i class="fa fa-angle-down"></i>
					</div>
				</div>
                </form>
                <a href="javascript:window.print();" class="floatright btn btn-info">Print</a>
			</div>



<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>
                    <?php echo ucfirst($settings->document);?>
                </div>
            </div>    
            <div class="portlet-body">
				<div class="chat-form">
					<form action="<?php echo $this->request->webroot; ?>documents/index" method="get">
						<div class="col-md-2 col-sm-12" style="padding-left:0;">

							<input class="form-control" name="searchdoc" type="search" placeholder=" Search <?php echo ucfirst($settings->document); ?>s" value="<?php if(isset($search_text)) echo $search_text; ?>" aria-controls="sample_1"/>

						</div>
                       <!-- </form>-->
                        <?php
                            $users = $this->requestAction("documents/getAllUser");
                        ?>
                        <!--<form action="<?php// echo $this->request->webroot; ?>documents/submittedBy" method="get">-->
						<div class="col-md-3 col-sm-12">
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
						<div class="col-md-3 col-sm-12">
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
                                 <option value="feedbacks" <?php if(isset($return_type) && $return_type=='feedbacks'){?> selected="selected"<?php } ?>>Feedbacks</option>
							</select>
						</div>
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
							<button type="submit" class="btn btn-primary" id="search">Search</button>
                        </div>

					</form>
				</div>


				<div class="clearfix"></div>



                <div class="table-scrollable">
                    <table class="table table-hover table-striped table-bordered table-hover dataTable no-footer">
                    	<thead>
                    		<tr>
                                <th>ID</th>
                    			<th><?php echo ucfirst($settings->document);?></th>
                    			<th>Uploaded by<?php if(isset($end)) echo $end; if(isset($start)) echo "//".$start; ?></th>
                    			<th>Uploaded on</th>           			
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
                          ?>
                          <tr class="<?=$row_color_class;?>" role="row">
                                <td><?= $this->Number->format($docs->id) ?></td>
                                <td><?= h($docs->document_type) ?></td>
                                <td><?= h($uploaded_by->username) ?></td>
                                <td><?= h($docs->created) ?></td>
                                
                                <td class="actions">

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
                                    <?php  if($sidebar->document_delete=='1'){ echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $docs->id], ['class' => 'btn btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?', $docs->id)]);} ?>

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
						<li tabindex="0" aria-controls="sample_2" class="paginate_button active"><a href="#">1</a></li>
						<li tabindex="0" aria-controls="sample_2" class="paginate_button "><a href="#">2</a></li>
						<li tabindex="0" aria-controls="sample_2" class="paginate_button "><a href="#">3</a></li>
						<li tabindex="0" aria-controls="sample_2" class="paginate_button "><a href="#">4</a></li>
						<li tabindex="0" aria-controls="sample_2" class="paginate_button "><a href="#">5</a></li>
						<li id="sample_2_next" tabindex="0" aria-controls="sample_2" class="paginate_button next"><a
								href="#"><i class="fa fa-angle-right"></i></a></li>
					</ul>
					<ul class="pagination">
						<li class="prev disabled">
							<a href="">< previous</a>
						</li>
						<li class="next">
							<a href="#" rel="next">next ></a>
						</li>
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
    </script>
