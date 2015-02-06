<?php $settings = $this->requestAction('settings/get_settings');?>
<?php //* Date format= 2015-02-05  "Y-m-d"
function left($text, $length){
	return substr($text,0,$length)	;
}
function right($text, $length){
	return substr($text, -$length);
}
function extractdate($text){
	return trim(left($text, strpos($text, " ")));
}

function sortdates($data){
	$dates = array();
	foreach ($data as $order) {
		$thedate = extractdate($order->created);
		if (array_key_exists($thedate,$dates)) {
			$dates[$thedate] += 1;
		} else {
			$dates[$thedate] = 1;
		}
	}
	return $dates;
}

function total($array){
	$total=0;
	foreach($array as $value){
		$total+=$value;
	}
	return $total;
}

$days = 14;
$decimals = 2;

if (isset($_GET["days"])) {$days = $_GET["days"]; }
if ($days < 1) { $days = 1; }

$orderdates= sortdates($orders);
$ordercount= total($orderdates);
$ordavg = round ($ordercount / $days,$decimals);

$docdates= sortdates($documents);
$doccount= total($docdates);
$docavg = round ($doccount / $days,$decimals);

$profiledates = sortdates($profiles);
$profilecount=total($profiledates);
$profileavg= round ($profilecount / $days,$decimals);

$clientdates = sortdates($clients);
$clientcount=total($clientdates);
$clientavg= round ($clientcount / $days,$decimals);







function getdatestamp($date){
	$newdate = date_create($date);
	return date_timestamp_get($newdate);
}

function add_date($givendate,$day=0,$mth=0,$yr=0) {
	$cd = strtotime($givendate);
	$newdate = date('Y-m-d h:i:s', mktime(date('h',$cd), date('i',$cd), date('s',$cd), date('m',$cd)+$mth, date('d',$cd)+$day, date('Y',$cd)+$yr));
	return $newdate;
}

function enumdata($variable, $daysbackwards, $date = -1){ //* [10, 1], [17, -14], [30, 5] *// strtotime('-1 day', $dateto)
	$tempstr= "";
	$delimeter="";
	if ($date ==-1) { $date= date("Y-m-d"); }
	for ($temp=0; $temp<$daysbackwards; $temp+=1){
		$newdate =add_date($date, -$temp,0,0);
		$thedate = extractdate($newdate);
		//getdatestamp($newdate); //right($thedate,2);
		if ($temp==0) { $day = '"' . "Today". '"' ; } else {$day = '"' . date("M d" , getdatestamp($newdate)) . '"' ; }
		$quantity = 0;
		if (array_key_exists($thedate,$variable)){$quantity  = $variable[$thedate];}
		$tempstr = "[" . $day . ',' . $quantity . "]" . $delimeter . $tempstr;
		if ($temp==0) { $delimeter = ", " ;}
	}
	return $tempstr;
}
?>
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



<div class="row" style="display:none;">
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

<!--<script src="<?php echo $this->request->webroot;?>assets/global/plugins/flot/jquery.flot.time.js"></script>-->
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
	// http://www.flotcharts.org/flot/examples/
	ChartsFlotcharts.init();
	ChartsFlotcharts.initCharts();
	ChartsFlotcharts.initPieCharts();
	ChartsFlotcharts.initBarCharts();


	var data = [{
		data: [<?php echo enumdata($docdates, $days); ?>]
	}];
	var data2 = [{
		data: [<?php echo enumdata($orderdates, $days); ?>]
	}];
	var data3 = [{
		data: [<?php echo enumdata($profiledates, $days); ?>]
	}];
	var data4 = [{
		data: [<?php echo enumdata($clientdates, $days); ?>]
	}];


	var options = marking(<?php echo $docavg; ?>);

	function marking(average) {
		return {
			series: {
				lines: {
					show: true
				},
				points: {
					show: true
				}
			},
			legend: {
				noColumns: 2
			},
			xaxis: {
				tickDecimals: 0,
				mode: "categories"
			},
			yaxis: {
				tickDecimals: 0,
				min: 0
			},
			selection: {
				mode: "x"
			},
			grid: {
				markings: [
					{color: '#EDC240', lineWidth: 1, yaxis: {from: average, to: average}}
				]
			}
		};
	}


	function bind(name, data, average) {
		options = marking(average);
		var placeholder = $(name);

		placeholder.bind("plotselected", function (event, ranges) {

			$("#selection").text(ranges.xaxis.from.toFixed(1) + " to " + ranges.xaxis.to.toFixed(1));

			var zoom = $("#zoom").prop("checked");

			if (zoom) {
				$.each(plot.getXAxes(), function (_, axis) {
					var opts = axis.options;
					opts.min = ranges.xaxis.from;
					opts.max = ranges.xaxis.to;
				});
				plot.setupGrid();
				plot.draw();
				plot.clearSelection();
			}
		});
		var plot = $.plot(placeholder, data, options);
	}


	bind("#documents", data, <?php echo $docavg; ?>);
	bind("#orders", data2, <?php echo $ordavg; ?>);
	bind("#profiles", data3, <?php echo $profileavg; ?>);
	bind("#clients", data4, <?php echo $clientavg; ?>);
});
</script>


	<div class="row">
		<div class="col-md-12">
			<div class="portlet box yellow-casablanca">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-clipboard"></i>Documents
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
					<div id="documents" class="chart"> </div>
				</div>
			</div>
		</div>
	</div>

<div class="row">
	<div class="col-md-12">
		<div class="portlet box yellow">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-clipboard"></i>Orders
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
				<div id="orders" class="chart"> </div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="portlet box green-haze">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-user"></i>Profiles
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
				<div id="profiles" class="chart"> </div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="portlet box grey-salsa">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-globe"></i>Clients
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
				<div id="clients" class="chart"> </div>
			</div>
		</div>
	</div>
</div>
<!--< php
echo '<HR><H1>Clients</H1>';
debug($clients);
echo '<HR><H1>Profiles</H1>';
debug($profiles);


< php
	echo '<P>Days: ' . $days;
	echo '<P>Documents: ' . $doccount . ' Average: ' . round ($doccount / $days,2);
	echo '<P>Orders: ' . $ordercount . ' Average: ' . round ($ordercount / $days,2);

echo '<P>Profiles: ' . $profilecount . ' Average: ' . round ($profilecount / $days,2);
echo '<P>Clients: ' . $clientcount . ' Average: ' . round ($clientcount / $days,2);

echo "<P>Docs: " . enumdata($docdates, $days);
echo "<P>Orders: " . enumdata($orderdates, $days);

echo "<P>Profiles: " . enumdata($profiledates, $days);
echo "<P>Clients: " . enumdata($clientdates, $days);

debug($profiledates);
debug($profiledates);
?>-->