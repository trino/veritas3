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
						<a href=""><?php echo ucfirst($settings->document);?>
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
					<div class="portlet box blue" id="form_wizard_1">
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
							<form action="#" class="form-horizontal" id="submit_form" method="POST">
								<div class="form-wizard">
									<div class="form-body">
                                        <?php

                                        if($param !='view')
                                        {
                                            $tab = 'tab-pane';
                                            ?>

										<ul class="nav nav-pills nav-justified steps">    
                                            <?php
                                                $doc = $this->requestAction('/documents/getDocument');
                                                
                                                $doc2 = $doc;
                                                $i = 1;
                                                foreach($doc as $d)
                                                {
                                                    $j = $d->id;
                                                ?>
                                                <li>
												<a href="#tab<?php echo $j;?>" data-toggle="tab" class="step">
												<span class="number">
												<?php echo $i; ?> </span><br />
												<span class="desc">
												<i class="fa fa-check"></i> <?php echo ucfirst($d->title); ?> </span>
												</a>
											</li>
                                                <?php
                                                
                                                $i++;
                                                }
                                            ?>
											
                                           <!-- <li>
												<a href="#tab<?php echo $j++; ?>" data-toggle="tab" class="step">
												<span class="number">
												<?php echo $i++;?></span><br />
												<span class="desc">
												<i class="fa fa-check"></i> Confirmation </span>
												</a>
											</li>-->
                                            <li>
												<a href="#tab<?php echo $j++; ?>" data-toggle="tab" class="step">
												<span class="number">
												<?php echo $i++;?></span><br />
												<span class="desc">
												<i class="fa fa-check"></i> Report Card </span>
												</a>
											</li>
                                            
										</ul>
										<div id="bar" class="progress progress-striped" role="progressbar">
											<div class="progress-bar progress-bar-info">
											</div>
										</div>
                                        <?php
                                        }
                                        ?>
                                        <div class="form-actions <?php if($tab=='nodisplay')echo $tab;?>">
										<div class="row">
											<div class="col-md-offset-3 col-md-9">
												<a href="javascript:;" class="btn default button-previous">
												<i class="m-icon-swapleft"></i> Back </a>

                                                <a href="javascript:;" class="btn red button-next">
												Skip <i class="m-icon-swapdown m-icon-white"></i>
												</a>

												<a href="javascript:;" class="btn blue button-next cont">
												Save & Continue <i class="m-icon-swapright m-icon-white"></i>
												</a>

												
                                                <a href="javascript:window.print();" class="btn btn-info button-submit">Print</a>
											</div>
										</div>
									</div>
										<div class="tab-content">
											<div class="alert alert-danger display-none">
												<button class="close" data-dismiss="alert"></button>
												You have some form errors. Please check below.
											</div>
											<div class="alert alert-success display-none">
												<button class="close" data-dismiss="alert"></button>
												Your form validation is successful!
											</div>
                                            <div class="form-group mar-top-10 col-md-12">
                                        <?php
                                                    $users = $this->requestAction("documents/getAllUser");
                                         ?>
                                         
                                            <label class="col-md-3 control-label">Select <?php echo ucfirst($settings->profile);?></label>
                                            <div class="col-md-6">
                                        <select class="form-control" name="uploaded_for" id="uploaded_for">
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
                                         <input type="hidden" name="client_id" value="<?php echo $cid;?>" id="client_id" />
                                         <input type="hidden" name="did" value="<?php echo $did;?>" id="did" />
                                         <?php
                                         if(!$did)
                                         {
                                            ?>
                                            
                                         <input type="hidden" name="user_id" value="<?php $this->request->session()->read('Profile.id');?>" id="user_id" />
                                         
                                         <?php
                                         }
                                         ?>
                                         </div>
                                         </div>
                                         <div class="clearfix"></div>
                                            <?php foreach($doc2 as $d){
                                                $j = $d->id;
                                                ?>
											<div class="<?php echo $tab;?> <?php if($tab=='tab-pane'){?>active<?php }?>" id="tab<?php echo $d->id; ?>">
												<?php
                                                
                                                    include('subpages/documents/'.$d->form);
                                                ?>
											</div>
                                            <?php } ?>
											
                                            <div class="<?php echo $tab;?>" id="tab<?php echo $j++; ?>">
												<?php
                                                    include('subpages/documents/confirmation.php');
                                                ?>
											</div>
                                            <div class="<?php echo $tab;?>" id="tab<?php echo $j++; ?>">
												<?php
                                                    include('subpages/documents/forview.php');
                                                ?>
											</div>
                                            <?php

                                            // For view action only

                                            if($tab=='nodisplay')
                                            {
                                                ?>

                                            <div class="forview <?php if($tab=='tab-pane')echo 'nodisplay';?>">
                                                <?php include('subpages/documents/forview.php');?>
                                            </div>

                                            <?php
                                            }
                                            ?>
										</div>
									</div>
									<div class="form-actions <?php if($tab=='nodisplay')echo $tab;?>">
										<div class="row">
											<div class="col-md-offset-3 col-md-9">
												<a href="javascript:;" class="btn default button-previous">
												<i class="m-icon-swapleft"></i> Back </a>

                                                <a href="javascript:;" class="btn red button-next">
												Skip <i class="m-icon-swapdown m-icon-white"></i>
												</a>

												<a href="javascript:;" class="btn blue button-next cont">
												Save & Continue <i class="m-icon-swapright m-icon-white"></i>
												</a>

												
                                                <a href="javascript:window.print();" class="btn btn-info button-submit">Print</a>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
<script>
function subform(form_type)
{
    var filename = form_type.replace(/\W/g, '_');
    var filename = filename.toLowerCase();
    $('.subform').show();   1
    $('.subform').load('<?php echo WEB_ROOT;?>documents/subpages/'+filename);
}
jQuery(document).ready(function() {
    $('.cont').click(function(){
        
    
    $.ajax({
       data:'uploaded_for='+$('#uploaded_for').val(),
       type:'post', 
       url:'<?php echo $this->request->webroot;?>documents/savedoc/<?php echo $cid;?>/'+$('#did').val(), 
       success:function(res)
       {
        $('#did').val(res);
       }
    });
    });
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
