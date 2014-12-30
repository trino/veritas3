<?php
if(isset($disabled))
$is_disabled = 'disabled="disabled"';
else
$is_disabled = '';
?>
<?php $settings = $this->requestAction('settings/get_settings');?>
<h3 class="page-title">
	<?php echo ucfirst($settings->document);?>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo $this->request->webroot;?>">Dashboard</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href=""><?php echo "Orders";?>
                        </a>
					</li>
				</ul>
                
                <?php
                if(isset($disabled))
                { ?>
					<a href="javascript:window.print();" class="floatright btn btn-primary">Print Report</a>

					<a href="" class="floatright btn btn-success">Re-Qualify</a>
                <a href="" class="floatright btn btn-info">Add to Task List</a>
                <?php } ?>

			</div>
            <div class="row">
				<div class="col-md-12">
					<div class="portlet box blue" id="">
						<div class="portlet-title">
                        <?php
                                        $param = $this->request->params['action'];
                                        $tab = 'nodisplay';
                                        ?>
							<div class="caption">
								<i class="fa fa-gift"></i> <?php if($param == 'view')?><?php echo ucfirst($settings->document);?> - <span class="step-title">
								View </span>
							</div>

						</div>
						<div class="portlet-body form">
							<form action="" class="form-horizontal" id="" method="POST">
								<div class="">
									<div class="form-body">
                                        <?php

                                        if($param !='view')
                                        {
                                            $tab = 'tab-pane';
                                            $doc = $this->requestAction('/documents/getDocument');
                                            ?>

										
                                        <?php
                                        }
                                        ?>
                                        
                                        
                                    
                                        <!--<div class="form-group mar-top-10">
                                            label class="col-md-3 control-label">Select <?php echo ucfirst($settings->document);?> Type</label>
                                            <div class="col-md-6">
                                            <select name="doc_type" class="form-control" onchange="showforms(this.value);">
                                                <option value="">Select <?php echo ucfirst($settings->document);?> type</option>
                                                <?php foreach($doc as $d){?>
                                                    <option value="<?php echo $d->form;?>" id="<?php echo $d->Form;?>"><?php echo ucfirst($d->title);?></option>
                                                <?php }?>
                                            </select>
                                            
                                            </div>-->
                                            <?php  include('subpages/home_blocks.php');?>
                                        </div>
                                        <div class="form-group mar-top-10">
                                        <?php
                                                    $users = $this->requestAction("documents/getAllUser");
                                         ?>
                                         
                                            <label class="col-md-3 control-label">Select <?php echo ucfirst($settings->profile);?>
                                            </label>
                                            <div class="col-md-6">
                                        <select class="form-control" name="uploaded_for">
								        <option value="">Select <?php echo ucfirst($settings->profile);?></option>
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
                                         </div>
										<div class="subform">
								            
										</div>
									</div>
									<div class="form-actions">
										<div class="row">
											<div class="col-md-offset-3 col-md-9">
												

                                                <input type="submit" class="btn green" value="Save"/>
												

												<a href="javascript:;" class="btn blue">
												Save As Draft <i class="m-icon-swapright m-icon-white"></i>
												</a>

												
                                                
											</div>
										</div>
									</div>
                                    </form>
								</div>
							
						</div>
					</div>
				</div>
			</div>
            
            
<script>
    var doc_type = '<?php echo $document->document_type;?>';
    
function showforms(form_type)
{
    //var form_type = $(this).val();
    //alert(form_type);
    //var filename = form_type.replace(/\W/g, '_');
    //var filename = filename.toLowerCase();
    //$('.subform').show();   1
    if(form_type!= "")
        $('.subform').load('<?php echo WEB_ROOT;?>documents/subpages/'+form_type);
    else
        $('.subform').html("");
}
jQuery(document).ready(function() {
    
   $('#addfiles').click(function(){
            //alert("ssss");
           $('#doc').append('<div style="padding-top:10px;"><a href="#" class="btn btn-success">Browse</a> <a href="javascript:void(0);" class="btn btn-danger" onclick="$(this).parent().remove();">Delete</a><br/></div>');
        });
});
</script>

<style>
@media print {
    .page-header{display:none;}
    .page-footer,.nav-tabs,.page-title,.page-bar,.theme-panel,.page-sidebar-wrapper,.form-actions,.steps,.caption{display:none!important;}
    .portlet-body,.portlet-title{border-top:1px solid #578EBE;}
    .tabbable-line{border:none!important;}
    
    }
</style>
