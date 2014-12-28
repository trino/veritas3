<?php $settings = $this->requestAction('settings/get_settings');?>
<h3 class="page-title">
			<?php echo ucfirst($settings->document);?>s <small>Analytics of <?php echo ucfirst($settings->document);?>s</small>
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
                        <i class="fa fa-angle-right"></i>
					</li>
                    <li>
						<a href="">Analytics</a>
                        
					</li>
                    
				</ul>
			
			</div>



<div class="row">
    <div class="col-md-12">
        <div class="portlet box red">
        	<div class="portlet-title">
        		<div class="caption">
        			<i class="fa fa-gift"></i><?php echo ucfirst($settings->document);?>s Chart
        		</div>
        		<!--<div class="tools">
        			<a href="javascript:;" class="collapse">
        			</a>
        			<a href="#portlet-config" data-toggle="modal" class="config">
        			</a>
        			<a href="javascript:;" class="reload">
        			</a>
        			<a href="javascript:;" class="remove">
        			</a>
        		</div>-->
        	</div>
        	<div class="portlet-body">
        		<div id="chart_2" class="chart">
        		</div>
        	</div>
        </div>
    </div>
</div>
<script src="<?php echo $this->request->webroot;?>assets/global/plugins/flot/jquery.flot.min.js"></script>
<script src="<?php echo $this->request->webroot;?>assets/global/plugins/flot/jquery.flot.resize.min.js"></script>
<script src="<?php echo $this->request->webroot;?>assets/global/plugins/flot/jquery.flot.pie.min.js"></script>
<script src="<?php echo $this->request->webroot;?>assets/global/plugins/flot/jquery.flot.stack.min.js"></script>
<script src="<?php echo $this->request->webroot;?>assets/global/plugins/flot/jquery.flot.crosshair.min.js"></script>
<script src="<?php echo $this->request->webroot;?>assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->

<script src="<?php echo $this->request->webroot;?>assets/admin/pages/scripts/charts-flotcharts.js"></script>
<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
  // Metronic.init(); // init metronic core components
//Layout.init(); // init current layout
//QuickSidebar.init(); // init quick sidebar
//Demo.init(); // init demo features
   ChartsFlotcharts.init();
   ChartsFlotcharts.initCharts();
   ChartsFlotcharts.initPieCharts();
   ChartsFlotcharts.initBarCharts();
});
</script>