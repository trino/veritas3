<?php $settings = $this->requestAction('settings/get_settings');?>
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			MEE Dashboard <small>Driver Qualification System</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo $this->request->webroot;?>">Dashboard</a>
						
					</li>
					
				</ul>
				<!--<div class="page-toolbar">
					<div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height grey-salt" data-placement="top" data-original-title="Change dashboard date range">
						<i class="icon-calendar"></i>&nbsp;
						<span class="thin uppercase visible-lg-inline-block">&nbsp;</span>&nbsp;
						<i class="fa fa-angle-down"></i>
					</div>
				</div>-->
			</div>

            

            <?php include('subpages/home_topblocks.php');?>
            <div class="clearfix"></div>

            
            <?php include('subpages/job_block.php');?>
            <div class="clearfix"></div>

            <?php include('subpages/home_blocks.php');?>
			<div class="clearfix"></div>

			<?php include('subpages/recent_activities.php');?>
			<div class="clearfix"></div>
			