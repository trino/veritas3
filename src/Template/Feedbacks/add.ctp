<?php
if(isset($disabled))
{
$is_disabled = 'disabled="disabled"';
}
else
{
$is_disabled = '';
}
?>
<h3 class="page-title">
			<?php //echo ucfirst($settings->client);?>Feedbacks <!--<small>Add/Edit <?php //echo ucfirst($settings->client);?></small>-->
			</h3>

			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo $this->request->webroot;?>">Dashboard</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="">Add Feedbacks</a>
					</li>
				</ul>
                <?php
                /*
				if(isset($disabled))
                { ?>
                <a href="javascript:window.print();" class="floatright btn btn-info">Print</a>
                <?php }*/ ?>
			</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                            <i class="fa fa-comment"></i>
                            Feedbacks
                            </div>
                        </div>
                        <div class="portlet-body">
                            <form role="form" action="" method="post">
                                                    <input type="hidden" name="document_type" value="feedbacks" />
                                                    <input type="hidden" name="user_id" value="<?php echo $this->request->session()->read('Profile.id');?>" />
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Title</label>
                                                            <div class="col-md-7">
                                                                <input type="text" class="form-control" name="title" />
                                                            </div>
                                                            <div class="clearfix"></div>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="control-label col-md-3">Description</label>
                                                            <div class="col-md-7">
                                                                <textarea class="form-control" name="description" ></textarea>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                    </div>
                                                    <div class="clearfix"></div>

                                                        <?php
                                                        if (!isset($disabled)) {
                                                            ?>
                                                            <div class="margiv-top-10">
                                                                <button type="submit" class="btn btn-primary">
                                                                    Send </button>
                                                                
                                                            </div>
                                                        <?php } ?>
                             </form>
                        </div>
                    </div>
                </div>
            </div>
            