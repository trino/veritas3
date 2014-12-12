
<!-- END DASHBOARD STATS -->
<div class="clearfix">
</div>
<div class="row">
    <div class="col-md-6 col-sm-6">
        <!-- BEGIN PORTLET-->
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bar-chart font-green-sharp hide"></i>
                    <span class="caption-subject font-green-sharp bold uppercase">Site Visits</span>
                    <span class="caption-helper">weekly stats...</span>
                </div>
                <div class="actions">
                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                        <label class="btn btn-transparent grey-salsa btn-circle btn-sm active">
                            <input type="radio" name="options" class="toggle" id="option1">New</label>
                        <label class="btn btn-transparent grey-salsa btn-circle btn-sm">
                            <input type="radio" name="options" class="toggle" id="option2">Returning</label>
                    </div>
                </div>
            </div>
            <div class="portlet-body">


            </div>
        </div>
        <!-- END PORTLET-->
    </div>
    <div class="col-md-6 col-sm-6">
        <!-- BEGIN PORTLET-->
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-share font-red-sunglo hide"></i>
                    <span class="caption-subject font-red-sunglo bold uppercase">Revenue</span>
                    <span class="caption-helper">monthly stats...</span>
                </div>
                <div class="actions">
                    <div class="btn-group">
                        <a href="" class="btn grey-salsa btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            Filter Range<span class="fa fa-angle-down">
									</span>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="javascript:;">
                                    Q1 2014 <span class="label label-sm label-default">
											past </span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    Q2 2014 <span class="label label-sm label-default">
											past </span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="javascript:;">
                                    Q3 2014 <span class="label label-sm label-success">
											current </span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    Q4 2014 <span class="label label-sm label-warning">
											upcoming </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <div id="site_activities_loading" style="display: none;">
                    <img src="../../assets/admin/layout/img/loading.gif" alt="loading">
                </div>
                <div id="site_activities_content" class="display-none" style="display: block;">
                    <div id="site_activities" style="height: 228px; padding: 0px; position: relative;">
                        <canvas class="flot-base" width="625" height="228" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 625px; height: 228px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; max-width: 64px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 18px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 20px; text-align: center;">DEC</div><div style="position: absolute; max-width: 64px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 18px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 86px; text-align: center;">JAN</div><div style="position: absolute; max-width: 64px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 18px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 151px; text-align: center;">FEB</div><div style="position: absolute; max-width: 64px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 18px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 213px; text-align: center;">MAR</div><div style="position: absolute; max-width: 64px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 18px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 280px; text-align: center;">APR</div><div style="position: absolute; max-width: 64px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 18px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 344px; text-align: center;">MAY</div><div style="position: absolute; max-width: 64px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 18px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 410px; text-align: center;">JUN</div><div style="position: absolute; max-width: 64px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 18px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 477px; text-align: center;">JUL</div><div style="position: absolute; max-width: 64px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 18px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 539px; text-align: center;">AUG</div><div style="position: absolute; max-width: 64px; top: 209px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 18px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 606px; text-align: center;">SEP</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; top: 197px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 18px; text-align: right;">0</div><div style="position: absolute; top: 149px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 7px; text-align: right;">500</div><div style="position: absolute; top: 100px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">1000</div><div style="position: absolute; top: 52px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">1500</div><div style="position: absolute; top: 3px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 10px; line-height: 14px; font-family: 'Open Sans', sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">2000</div></div></div><canvas class="flot-overlay" width="625" height="228" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 625px; height: 228px;"></canvas></div>
                </div>
                <div style="margin: 20px 0 10px 30px">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
										<span class="label label-sm label-success">
										Revenue: </span>
                            <h3>$13,234</h3>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
										<span class="label label-sm label-info">
										Tax: </span>
                            <h3>$134,900</h3>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
										<span class="label label-sm label-danger">
										Shipment: </span>
                            <h3>$1,134</h3>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
										<span class="label label-sm label-warning">
										Orders: </span>
                            <h3>235090</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PORTLET-->
    </div>
</div>
<div class="clearfix">
</div>
<div class="row">
<div class="col-md-6 col-sm-6">
<div class="portlet light ">
<div class="portlet-title">
    <div class="caption">
        <i class="icon-share font-blue-steel hide"></i>
        <span class="caption-subject font-blue-steel bold uppercase">Recent Activities</span>
    </div>
    <div class="actions">
        <div class="btn-group">
            <a class="btn btn-sm btn-default btn-circle" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                Filter By <i class="fa fa-angle-down"></i>
            </a>
            <div class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
                <label><div class="checker"><span><input type="checkbox"></span></div> Finance</label>
                <label><div class="checker"><span class="checked"><input type="checkbox" checked=""></span></div> Membership</label>
                <label><div class="checker"><span><input type="checkbox"></span></div> Customer Support</label>
                <label><div class="checker"><span class="checked"><input type="checkbox" checked=""></span></div> HR</label>
                <label><div class="checker"><span><input type="checkbox"></span></div> System</label>
            </div>
        </div>
    </div>
</div>
<div class="portlet-body">
<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 300px;"><div class="scroller" style="height: 300px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible="0" data-initialized="1">
<ul class="feeds">
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-sm label-info">
                    <i class="fa fa-check"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    You have 4 pending tasks. <span class="label label-sm label-warning ">
														Take action <i class="fa fa-share"></i>
														</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            Just now
        </div>
    </div>
</li>
<li>
    <a href="#">
        <div class="col1">
            <div class="cont">
                <div class="cont-col1">
                    <div class="label label-sm label-success">
                        <i class="fa fa-bar-chart-o"></i>
                    </div>
                </div>
                <div class="cont-col2">
                    <div class="desc">
                        Finance Report for year 2013 has been released.
                    </div>
                </div>
            </div>
        </div>
        <div class="col2">
            <div class="date">
                20 mins
            </div>
        </div>
    </a>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-sm label-danger">
                    <i class="fa fa-user"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    You have 5 pending membership that requires a quick review.
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            24 mins
        </div>
    </div>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-sm label-info">
                    <i class="fa fa-shopping-cart"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    New order received with <span class="label label-sm label-success">
														Reference Number: DR23923 </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            30 mins
        </div>
    </div>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-sm label-success">
                    <i class="fa fa-user"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    You have 5 pending membership that requires a quick review.
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            24 mins
        </div>
    </div>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-sm label-default">
                    <i class="fa fa-bell-o"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    Web server hardware needs to be upgraded. <span class="label label-sm label-default ">
														Overdue </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            2 hours
        </div>
    </div>
</li>
<li>
    <a href="#">
        <div class="col1">
            <div class="cont">
                <div class="cont-col1">
                    <div class="label label-sm label-default">
                        <i class="fa fa-briefcase"></i>
                    </div>
                </div>
                <div class="cont-col2">
                    <div class="desc">
                        IPO Report for year 2013 has been released.
                    </div>
                </div>
            </div>
        </div>
        <div class="col2">
            <div class="date">
                20 mins
            </div>
        </div>
    </a>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-sm label-info">
                    <i class="fa fa-check"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    You have 4 pending tasks. <span class="label label-sm label-warning ">
														Take action <i class="fa fa-share"></i>
														</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            Just now
        </div>
    </div>
</li>
<li>
    <a href="#">
        <div class="col1">
            <div class="cont">
                <div class="cont-col1">
                    <div class="label label-sm label-danger">
                        <i class="fa fa-bar-chart-o"></i>
                    </div>
                </div>
                <div class="cont-col2">
                    <div class="desc">
                        Finance Report for year 2013 has been released.
                    </div>
                </div>
            </div>
        </div>
        <div class="col2">
            <div class="date">
                20 mins
            </div>
        </div>
    </a>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-sm label-default">
                    <i class="fa fa-user"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    You have 5 pending membership that requires a quick review.
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            24 mins
        </div>
    </div>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-sm label-info">
                    <i class="fa fa-shopping-cart"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    New order received with <span class="label label-sm label-success">
														Reference Number: DR23923 </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            30 mins
        </div>
    </div>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-sm label-success">
                    <i class="fa fa-user"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    You have 5 pending membership that requires a quick review.
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            24 mins
        </div>
    </div>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-sm label-warning">
                    <i class="fa fa-bell-o"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    Web server hardware needs to be upgraded. <span class="label label-sm label-default ">
														Overdue </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            2 hours
        </div>
    </div>
</li>
<li>
    <a href="#">
        <div class="col1">
            <div class="cont">
                <div class="cont-col1">
                    <div class="label label-sm label-info">
                        <i class="fa fa-briefcase"></i>
                    </div>
                </div>
                <div class="cont-col2">
                    <div class="desc">
                        IPO Report for year 2013 has been released.
                    </div>
                </div>
            </div>
        </div>
        <div class="col2">
            <div class="date">
                20 mins
            </div>
        </div>
    </a>
</li>
</ul>
</div><div class="slimScrollBar" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 191.897654584222px; background: rgb(187, 187, 187);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(234, 234, 234);"></div></div>
<div class="scroller-footer">
    <div class="btn-arrow-link pull-right">
        <a href="#">See All Records</a>
        <i class="icon-arrow-right"></i>
    </div>
</div>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6">
<div class="portlet light tasks-widget">
<div class="portlet-title">
    <div class="caption">
        <i class="icon-share font-green-haze hide"></i>
        <span class="caption-subject font-green-haze bold uppercase">Tasks</span>
        <span class="caption-helper">tasks summary...</span>
    </div>
    <div class="actions">
        <div class="btn-group">
            <a class="btn green-haze btn-circle btn-sm" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                More <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu pull-right">
                <li>
                    <a href="#">
                        <i class="i"></i> All Project </a>
                </li>
                <li class="divider">
                </li>
                <li>
                    <a href="#">
                        AirAsia </a>
                </li>
                <li>
                    <a href="#">
                        Cruise </a>
                </li>
                <li>
                    <a href="#">
                        HSBC </a>
                </li>
                <li class="divider">
                </li>
                <li>
                    <a href="#">
                        Pending <span class="badge badge-danger">
											4 </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        Completed <span class="badge badge-success">
											12 </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        Overdue <span class="badge badge-warning">
											9 </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="portlet-body">
<div class="task-content">
<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 305px;"><div class="scroller" style="height: 305px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible1="1" data-initialized="1">
<!-- START TASK LIST -->



        <ul class="task-list">
            <li>
                <div class="task-checkbox">
                    <div class="checker"><span><input type="checkbox" class="liChild" value="checked" checked /></span></div>
                </div>
                <div class="task-title">
												<span class="task-title-sp">
												Document submitted - Check </span>
                    <span class="label label-sm label-success">Company</span>
												<span class="task-bell">
												<i class="fa fa-bell-o"></i>
												</span>
                </div>

            </li>


            <li>
                <div class="task-checkbox">
                    <div class="checker"><span><input type="checkbox" class="liChild" value="checked" checked /></span></div>
                </div>
                <div class="task-title">
												<span class="task-title-sp">
												Document submitted - Check </span>
                    <span class="label label-sm label-success">Company</span>
												<span class="task-bell">
												<i class="fa fa-bell-o"></i>
												</span>
                </div>

            </li>

            <li>
                <div class="task-checkbox">
                    <div class="checker"><span><input type="checkbox" class="liChild" value="checked" checked /></span></div>
                </div>
                <div class="task-title">
												<span class="task-title-sp">
												Document submitted - Check </span>
                    <span class="label label-sm label-success">Company</span>
												<span class="task-bell">
												<i class="fa fa-bell-o"></i>
												</span>
                </div>

            </li>

</ul>


<!-- END START TASK LIST -->
</div><div class="slimScrollBar" style="width: 7px; position: absolute; top: 39px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 265.785714285714px; background: rgb(187, 187, 187);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(234, 234, 234);"></div></div>
</div>
<div class="task-footer">
    <div class="btn-arrow-link pull-right">
        <a href="#">See All Records</a>
        <i class="icon-arrow-right"></i>
    </div>
</div>
</div>
</div>
</div>
</div>
<div class="clearfix">
</div>
<div class="row">
    <div class="col-md-6 col-sm-6">
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-cursor font-purple-intense hide"></i>
                    <span class="caption-subject font-purple-intense bold uppercase">General Stats</span>
                </div>
                <div class="actions">
                    <a href="javascript:;" class="btn btn-sm btn-circle btn-default easy-pie-chart-reload">
                        <i class="fa fa-repeat"></i> Reload </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="easy-pie-chart">
                            <div class="number transactions" data-percent="55">
											<span>
											+55 </span>
                                %
                                <canvas height="75" width="75"></canvas></div>
                            <a class="title" href="#">
                                Transactions <i class="icon-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="margin-bottom-10 visible-sm">
                    </div>
                    <div class="col-md-4">
                        <div class="easy-pie-chart">
                            <div class="number visits" data-percent="85">
											<span>
											+85 </span>
                                %
                                <canvas height="75" width="75"></canvas></div>
                            <a class="title" href="#">
                                New Visits <i class="icon-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="margin-bottom-10 visible-sm">
                    </div>
                    <div class="col-md-4">
                        <div class="easy-pie-chart">
                            <div class="number bounce" data-percent="46">
											<span>
											-46 </span>
                                %
                                <canvas height="75" width="75"></canvas></div>
                            <a class="title" href="#">
                                Bounce <i class="icon-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6">
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-equalizer font-purple-plum hide"></i>
                    <span class="caption-subject font-red-sunglo bold uppercase">Server Stats</span>
                    <span class="caption-helper">monthly stats...</span>
                </div>
                <div class="tools">
                    <a href="" class="collapse" data-original-title="" title="">
                    </a>
                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title="">
                    </a>
                    <a href="" class="reload" data-original-title="" title="">
                    </a>
                    <a href="" class="remove" data-original-title="" title="">
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="sparkline-chart">
                            <div class="number" id="sparkline_bar"><canvas width="113" height="55" style="display: inline-block; width: 113px; height: 55px; vertical-align: top;"></canvas></div>
                            <a class="title" href="#">
                                Network <i class="icon-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="margin-bottom-10 visible-sm">
                    </div>
                    <div class="col-md-4">
                        <div class="sparkline-chart">
                            <div class="number" id="sparkline_bar2"><canvas width="107" height="55" style="display: inline-block; width: 107px; height: 55px; vertical-align: top;"></canvas></div>
                            <a class="title" href="#">
                                CPU Load <i class="icon-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="margin-bottom-10 visible-sm">
                    </div>
                    <div class="col-md-4">
                        <div class="sparkline-chart">
                            <div class="number" id="sparkline_line"><canvas width="100" height="55" style="display: inline-block; width: 100px; height: 55px; vertical-align: top;"></canvas></div>
                            <a class="title" href="#">
                                Load Rate <i class="icon-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix">
</div>
<div class="row">
<div class="col-md-6 col-sm-6">
</div>
<div class="col-md-6 col-sm-6">
<!-- BEGIN PORTLET-->
<div class="portlet light">
<div class="portlet-title tabbable-line">
    <div class="caption">
        <i class="icon-globe font-green-sharp"></i>
        <span class="caption-subject font-green-sharp bold uppercase">Feeds</span>
    </div>
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#tab_1_1" data-toggle="tab">
                System </a>
        </li>
        <li>
            <a href="#tab_1_2" data-toggle="tab">
                Activities </a>
        </li>
        <li>
            <a href="#tab_1_3" data-toggle="tab">
                Recent Profiles </a>
        </li>
    </ul>
</div>
<div class="portlet-body">
<!--BEGIN TABS-->
<div class="tab-content">
<div class="tab-pane active" id="tab_1_1">
<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 339px;"><div class="scroller" style="height: 339px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible="0" data-initialized="1">
<ul class="feeds">
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-sm label-success">
                    <i class="fa fa-bell-o"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    You have 4 pending tasks. <span class="label label-sm label-info">
																Take action <i class="fa fa-share"></i>
																</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            Just now
        </div>
    </div>
</li>
<li>
    <a href="#">
        <div class="col1">
            <div class="cont">
                <div class="cont-col1">
                    <div class="label label-sm label-success">
                        <i class="fa fa-bell-o"></i>
                    </div>
                </div>
                <div class="cont-col2">
                    <div class="desc">
                        New version v1.4 just lunched!
                    </div>
                </div>
            </div>
        </div>
        <div class="col2">
            <div class="date">
                20 mins
            </div>
        </div>
    </a>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-sm label-danger">
                    <i class="fa fa-bolt"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    Database server #12 overloaded. Please fix the issue.
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            24 mins
        </div>
    </div>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-sm label-info">
                    <i class="fa fa-bullhorn"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    New order received. Please take care of it.
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            30 mins
        </div>
    </div>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-sm label-success">
                    <i class="fa fa-bullhorn"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    New order received. Please take care of it.
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            40 mins
        </div>
    </div>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-sm label-warning">
                    <i class="fa fa-plus"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    New user registered.
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            1.5 hours
        </div>
    </div>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-sm label-success">
                    <i class="fa fa-bell-o"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    Web server hardware needs to be upgraded. <span class="label label-sm label-default ">
																Overdue </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            2 hours
        </div>
    </div>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-sm label-default">
                    <i class="fa fa-bullhorn"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    New order received. Please take care of it.
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            3 hours
        </div>
    </div>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-sm label-warning">
                    <i class="fa fa-bullhorn"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    New order received. Please take care of it.
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            5 hours
        </div>
    </div>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-sm label-info">
                    <i class="fa fa-bullhorn"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    New order received. Please take care of it.
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            18 hours
        </div>
    </div>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-sm label-default">
                    <i class="fa fa-bullhorn"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    New order received. Please take care of it.
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            21 hours
        </div>
    </div>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-sm label-info">
                    <i class="fa fa-bullhorn"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    New order received. Please take care of it.
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            22 hours
        </div>
    </div>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-sm label-default">
                    <i class="fa fa-bullhorn"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    New order received. Please take care of it.
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            21 hours
        </div>
    </div>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-sm label-info">
                    <i class="fa fa-bullhorn"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    New order received. Please take care of it.
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            22 hours
        </div>
    </div>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-sm label-default">
                    <i class="fa fa-bullhorn"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    New order received. Please take care of it.
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            21 hours
        </div>
    </div>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-sm label-info">
                    <i class="fa fa-bullhorn"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    New order received. Please take care of it.
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            22 hours
        </div>
    </div>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-sm label-default">
                    <i class="fa fa-bullhorn"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    New order received. Please take care of it.
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            21 hours
        </div>
    </div>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-sm label-info">
                    <i class="fa fa-bullhorn"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    New order received. Please take care of it.
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            22 hours
        </div>
    </div>
</li>
</ul>
</div><div class="slimScrollBar" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 189.952066115702px; background: rgb(187, 187, 187);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(234, 234, 234);"></div></div>
</div>
<div class="tab-pane" id="tab_1_2">
<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 290px;"><div class="scroller" style="height: 290px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible1="1" data-initialized="1">
<ul class="feeds">
<li>
    <a href="#">
        <div class="col1">
            <div class="cont">
                <div class="cont-col1">
                    <div class="label label-sm label-success">
                        <i class="fa fa-bell-o"></i>
                    </div>
                </div>
                <div class="cont-col2">
                    <div class="desc">
                        New user registered
                    </div>
                </div>
            </div>
        </div>
        <div class="col2">
            <div class="date">
                Just now
            </div>
        </div>
    </a>
</li>
<li>
    <a href="#">
        <div class="col1">
            <div class="cont">
                <div class="cont-col1">
                    <div class="label label-sm label-success">
                        <i class="fa fa-bell-o"></i>
                    </div>
                </div>
                <div class="cont-col2">
                    <div class="desc">
                        New order received
                    </div>
                </div>
            </div>
        </div>
        <div class="col2">
            <div class="date">
                10 mins
            </div>
        </div>
    </a>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-sm label-danger">
                    <i class="fa fa-bolt"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    Order #24DOP4 has been rejected. <span class="label label-sm label-danger ">
																Take action <i class="fa fa-share"></i>
																</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            24 mins
        </div>
    </div>
</li>
<li>
    <a href="#">
        <div class="col1">
            <div class="cont">
                <div class="cont-col1">
                    <div class="label label-sm label-success">
                        <i class="fa fa-bell-o"></i>
                    </div>
                </div>
                <div class="cont-col2">
                    <div class="desc">
                        New user registered
                    </div>
                </div>
            </div>
        </div>
        <div class="col2">
            <div class="date">
                Just now
            </div>
        </div>
    </a>
</li>
<li>
    <a href="#">
        <div class="col1">
            <div class="cont">
                <div class="cont-col1">
                    <div class="label label-sm label-success">
                        <i class="fa fa-bell-o"></i>
                    </div>
                </div>
                <div class="cont-col2">
                    <div class="desc">
                        New user registered
                    </div>
                </div>
            </div>
        </div>
        <div class="col2">
            <div class="date">
                Just now
            </div>
        </div>
    </a>
</li>
<li>
    <a href="#">
        <div class="col1">
            <div class="cont">
                <div class="cont-col1">
                    <div class="label label-sm label-success">
                        <i class="fa fa-bell-o"></i>
                    </div>
                </div>
                <div class="cont-col2">
                    <div class="desc">
                        New user registered
                    </div>
                </div>
            </div>
        </div>
        <div class="col2">
            <div class="date">
                Just now
            </div>
        </div>
    </a>
</li>
<li>
    <a href="#">
        <div class="col1">
            <div class="cont">
                <div class="cont-col1">
                    <div class="label label-sm label-success">
                        <i class="fa fa-bell-o"></i>
                    </div>
                </div>
                <div class="cont-col2">
                    <div class="desc">
                        New user registered
                    </div>
                </div>
            </div>
        </div>
        <div class="col2">
            <div class="date">
                Just now
            </div>
        </div>
    </a>
</li>
<li>
    <a href="#">
        <div class="col1">
            <div class="cont">
                <div class="cont-col1">
                    <div class="label label-sm label-success">
                        <i class="fa fa-bell-o"></i>
                    </div>
                </div>
                <div class="cont-col2">
                    <div class="desc">
                        New user registered
                    </div>
                </div>
            </div>
        </div>
        <div class="col2">
            <div class="date">
                Just now
            </div>
        </div>
    </a>
</li>
<li>
    <a href="#">
        <div class="col1">
            <div class="cont">
                <div class="cont-col1">
                    <div class="label label-sm label-success">
                        <i class="fa fa-bell-o"></i>
                    </div>
                </div>
                <div class="cont-col2">
                    <div class="desc">
                        New user registered
                    </div>
                </div>
            </div>
        </div>
        <div class="col2">
            <div class="date">
                Just now
            </div>
        </div>
    </a>
</li>
<li>
    <a href="#">
        <div class="col1">
            <div class="cont">
                <div class="cont-col1">
                    <div class="label label-sm label-success">
                        <i class="fa fa-bell-o"></i>
                    </div>
                </div>
                <div class="cont-col2">
                    <div class="desc">
                        New user registered
                    </div>
                </div>
            </div>
        </div>
        <div class="col2">
            <div class="date">
                Just now
            </div>
        </div>
    </a>
</li>
</ul>
</div><div class="slimScrollBar" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; background: rgb(187, 187, 187);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(234, 234, 234);"></div></div>
</div>
<div class="tab-pane" id="tab_1_3">
    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 290px;"><div class="scroller" style="height: 290px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible1="1" data-initialized="1">
            <div class="row">
                <div class="col-md-6 user-info">
                    <img alt="" src="../../assets/admin/layout/img/avatar.png" class="img-responsive">
                    <div class="details">
                        <div>
                            <a href="#">
                                Robert Nilson </a>
														<span class="label label-sm label-success label-mini">
														Approved </span>
                        </div>
                        <div>
                            29 Jan 2013 10:45AM
                        </div>
                    </div>
                </div>
                <div class="col-md-6 user-info">
                    <img alt="" src="../../assets/admin/layout/img/avatar.png" class="img-responsive">
                    <div class="details">
                        <div>
                            <a href="#">
                                Lisa Miller </a>
														<span class="label label-sm label-info">
														Pending </span>
                        </div>
                        <div>
                            19 Jan 2013 10:45AM
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 user-info">
                    <img alt="" src="../../assets/admin/layout/img/avatar.png" class="img-responsive">
                    <div class="details">
                        <div>
                            <a href="#">
                                Eric Kim </a>
														<span class="label label-sm label-info">
														Pending </span>
                        </div>
                        <div>
                            19 Jan 2013 12:45PM
                        </div>
                    </div>
                </div>
                <div class="col-md-6 user-info">
                    <img alt="" src="../../assets/admin/layout/img/avatar.png" class="img-responsive">
                    <div class="details">
                        <div>
                            <a href="#">
                                Lisa Miller </a>
														<span class="label label-sm label-danger">
														In progress </span>
                        </div>
                        <div>
                            19 Jan 2013 11:55PM
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 user-info">
                    <img alt="" src="../../assets/admin/layout/img/avatar.png" class="img-responsive">
                    <div class="details">
                        <div>
                            <a href="#">
                                Eric Kim </a>
														<span class="label label-sm label-info">
														Pending </span>
                        </div>
                        <div>
                            19 Jan 2013 12:45PM
                        </div>
                    </div>
                </div>
                <div class="col-md-6 user-info">
                    <img alt="" src="../../assets/admin/layout/img/avatar.png" class="img-responsive">
                    <div class="details">
                        <div>
                            <a href="#">
                                Lisa Miller </a>
														<span class="label label-sm label-danger">
														In progress </span>
                        </div>
                        <div>
                            19 Jan 2013 11:55PM
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 user-info">
                    <img alt="" src="../../assets/admin/layout/img/avatar.png" class="img-responsive">
                    <div class="details">
                        <div>
                            <a href="#">
                                Eric Kim </a>
														<span class="label label-sm label-info">
														Pending </span>
                        </div>
                        <div>
                            19 Jan 2013 12:45PM
                        </div>
                    </div>
                </div>
                <div class="col-md-6 user-info">
                    <img alt="" src="../../assets/admin/layout/img/avatar.png" class="img-responsive">
                    <div class="details">
                        <div>
                            <a href="#">
                                Lisa Miller </a>
														<span class="label label-sm label-danger">
														In progress </span>
                        </div>
                        <div>
                            19 Jan 2013 11:55PM
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 user-info">
                    <img alt="" src="../../assets/admin/layout/img/avatar.png" class="img-responsive">
                    <div class="details">
                        <div>
                            <a href="#">
                                Eric Kim </a>
														<span class="label label-sm label-info">
														Pending </span>
                        </div>
                        <div>
                            19 Jan 2013 12:45PM
                        </div>
                    </div>
                </div>
                <div class="col-md-6 user-info">
                    <img alt="" src="../../assets/admin/layout/img/avatar.png" class="img-responsive">
                    <div class="details">
                        <div>
                            <a href="#">
                                Lisa Miller </a>
														<span class="label label-sm label-danger">
														In progress </span>
                        </div>
                        <div>
                            19 Jan 2013 11:55PM
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 user-info">
                    <img alt="" src="../../assets/admin/layout/img/avatar.png" class="img-responsive">
                    <div class="details">
                        <div>
                            <a href="#">
                                Eric Kim </a>
														<span class="label label-sm label-info">
														Pending </span>
                        </div>
                        <div>
                            19 Jan 2013 12:45PM
                        </div>
                    </div>
                </div>
                <div class="col-md-6 user-info">
                    <img alt="" src="../../assets/admin/layout/img/avatar.png" class="img-responsive">
                    <div class="details">
                        <div>
                            <a href="#">
                                Lisa Miller </a>
														<span class="label label-sm label-danger">
														In progress </span>
                        </div>
                        <div>
                            19 Jan 2013 11:55PM
                        </div>
                    </div>
                </div>
            </div>
        </div><div class="slimScrollBar" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; background: rgb(187, 187, 187);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(234, 234, 234);"></div></div>
</div>
</div>
<!--END TABS-->
</div>
</div>
<!-- END PORTLET-->
</div>
</div>
<div class="clearfix">
</div>
<div class="row">
    <div class="col-md-6 col-sm-6">
        <!-- BEGIN PORTLET-->
        <div class="portlet light calendar ">
            <div class="portlet-title ">
                <div class="caption">
                    <i class="icon-calendar font-green-sharp"></i>
                    <span class="caption-subject font-green-sharp bold uppercase">Feeds</span>
                </div>
            </div>
            <div class="portlet-body">
                <div id="calendar" class="fc fc-ltr fc-unthemed"><div class="fc-toolbar"><div class="fc-left"><h2>December 2014</h2></div><div class="fc-right"><div class="fc-button-group"><button type="button" class="fc-prev-button fc-button fc-state-default fc-corner-left"><span class="fc-icon fc-icon-left-single-arrow"></span></button><button type="button" class="fc-next-button fc-button fc-state-default"><span class="fc-icon fc-icon-right-single-arrow"></span></button><button type="button" class="fc-today-button fc-button fc-state-default fc-state-disabled" disabled="disabled">today</button><button type="button" class="fc-month-button fc-button fc-state-default fc-state-active">month</button><button type="button" class="fc-agendaWeek-button fc-button fc-state-default">week</button><button type="button" class="fc-agendaDay-button fc-button fc-state-default fc-corner-right">day</button></div></div><div class="fc-center"></div><div class="fc-clear"></div></div><div class="fc-view-container" style=""><div class="fc-view fc-month-view fc-basic-view"><table><thead><tr><td class="fc-widget-header"><div class="fc-row fc-widget-header"><table><thead><tr><th class="fc-day-header fc-widget-header fc-sun">Sun</th><th class="fc-day-header fc-widget-header fc-mon">Mon</th><th class="fc-day-header fc-widget-header fc-tue">Tue</th><th class="fc-day-header fc-widget-header fc-wed">Wed</th><th class="fc-day-header fc-widget-header fc-thu">Thu</th><th class="fc-day-header fc-widget-header fc-fri">Fri</th><th class="fc-day-header fc-widget-header fc-sat">Sat</th></tr></thead></table></div></td></tr></thead><tbody><tr><td class="fc-widget-content"><div class="fc-day-grid-container"><div class="fc-day-grid"><div class="fc-row fc-week fc-widget-content" style="height: 73px;"><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-other-month fc-past" data-date="2014-11-30"></td><td class="fc-day fc-widget-content fc-mon fc-past" data-date="2014-12-01"></td><td class="fc-day fc-widget-content fc-tue fc-past" data-date="2014-12-02"></td><td class="fc-day fc-widget-content fc-wed fc-past" data-date="2014-12-03"></td><td class="fc-day fc-widget-content fc-thu fc-past" data-date="2014-12-04"></td><td class="fc-day fc-widget-content fc-fri fc-past" data-date="2014-12-05"></td><td class="fc-day fc-widget-content fc-sat fc-past" data-date="2014-12-06"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-number fc-sun fc-other-month fc-past" data-date="2014-11-30">30</td><td class="fc-day-number fc-mon fc-past" data-date="2014-12-01">1</td><td class="fc-day-number fc-tue fc-past" data-date="2014-12-02">2</td><td class="fc-day-number fc-wed fc-past" data-date="2014-12-03">3</td><td class="fc-day-number fc-thu fc-past" data-date="2014-12-04">4</td><td class="fc-day-number fc-fri fc-past" data-date="2014-12-05">5</td><td class="fc-day-number fc-sat fc-past" data-date="2014-12-06">6</td></tr></thead><tbody><tr><td></td><td class="fc-event-container"><a class="fc-day-grid-event fc-event fc-start fc-end fc-draggable" style="background-color:#F8CB00"><div class="fc-content"><span class="fc-time">12a</span> <span class="fc-title">All Day</span></div></a></td><td></td><td></td><td></td><td></td><td class="fc-event-container"><a class="fc-day-grid-event fc-event fc-start fc-not-end fc-draggable" style="background-color:#89C4F4"><div class="fc-content"><span class="fc-time">12a</span> <span class="fc-title">Long Event</span></div></a></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style=""><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-past" data-date="2014-12-07"></td><td class="fc-day fc-widget-content fc-mon fc-past" data-date="2014-12-08"></td><td class="fc-day fc-widget-content fc-tue fc-past" data-date="2014-12-09"></td><td class="fc-day fc-widget-content fc-wed fc-past" data-date="2014-12-10"></td><td class="fc-day fc-widget-content fc-thu fc-today fc-state-highlight" data-date="2014-12-11"></td><td class="fc-day fc-widget-content fc-fri fc-future" data-date="2014-12-12"></td><td class="fc-day fc-widget-content fc-sat fc-future" data-date="2014-12-13"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-number fc-sun fc-past" data-date="2014-12-07">7</td><td class="fc-day-number fc-mon fc-past" data-date="2014-12-08">8</td><td class="fc-day-number fc-tue fc-past" data-date="2014-12-09">9</td><td class="fc-day-number fc-wed fc-past" data-date="2014-12-10">10</td><td class="fc-day-number fc-thu fc-today fc-state-highlight" data-date="2014-12-11">11</td><td class="fc-day-number fc-fri fc-future" data-date="2014-12-12">12</td><td class="fc-day-number fc-sat fc-future" data-date="2014-12-13">13</td></tr></thead><tbody><tr><td class="fc-event-container" colspan="2"><a class="fc-day-grid-event fc-event fc-not-start fc-end fc-draggable" style="background-color:#89C4F4"><div class="fc-content"> <span class="fc-title">Long Event</span></div></a></td><td rowspan="2"></td><td rowspan="2"></td><td class="fc-event-container" rowspan="2"><a class="fc-day-grid-event fc-event fc-start fc-end fc-draggable" style="background-color:#95a5a6"><div class="fc-content"><span class="fc-time">2p</span> <span class="fc-title">Lunch</span></div></a></td><td class="fc-event-container" rowspan="2"><a class="fc-day-grid-event fc-event fc-start fc-end fc-draggable" style="background-color:#9b59b6"><div class="fc-content"><span class="fc-time">7p</span> <span class="fc-title">Birthday</span></div></a></td><td rowspan="2"></td></tr><tr><td></td><td class="fc-event-container"><a class="fc-day-grid-event fc-event fc-start fc-end fc-draggable" style="background-color:#F3565D"><div class="fc-content"><span class="fc-time">4p</span> <span class="fc-title">Repeating Event</span></div></a></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 73px;"><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-future" data-date="2014-12-14"></td><td class="fc-day fc-widget-content fc-mon fc-future" data-date="2014-12-15"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2014-12-16"></td><td class="fc-day fc-widget-content fc-wed fc-future" data-date="2014-12-17"></td><td class="fc-day fc-widget-content fc-thu fc-future" data-date="2014-12-18"></td><td class="fc-day fc-widget-content fc-fri fc-future" data-date="2014-12-19"></td><td class="fc-day fc-widget-content fc-sat fc-future" data-date="2014-12-20"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-number fc-sun fc-future" data-date="2014-12-14">14</td><td class="fc-day-number fc-mon fc-future" data-date="2014-12-15">15</td><td class="fc-day-number fc-tue fc-future" data-date="2014-12-16">16</td><td class="fc-day-number fc-wed fc-future" data-date="2014-12-17">17</td><td class="fc-day-number fc-thu fc-future" data-date="2014-12-18">18</td><td class="fc-day-number fc-fri fc-future" data-date="2014-12-19">19</td><td class="fc-day-number fc-sat fc-future" data-date="2014-12-20">20</td></tr></thead><tbody><tr><td></td><td></td><td></td><td class="fc-event-container"><a class="fc-day-grid-event fc-event fc-start fc-end fc-draggable" style="background-color:#1bbc9b"><div class="fc-content"><span class="fc-time">4p</span> <span class="fc-title">Repeating Event</span></div></a></td><td></td><td></td><td class="fc-event-container"><a class="fc-day-grid-event fc-event fc-start fc-end fc-draggable"><div class="fc-content"><span class="fc-time">10:30a</span> <span class="fc-title">Meeting</span></div></a></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 73px;"><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-future" data-date="2014-12-21"></td><td class="fc-day fc-widget-content fc-mon fc-future" data-date="2014-12-22"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2014-12-23"></td><td class="fc-day fc-widget-content fc-wed fc-future" data-date="2014-12-24"></td><td class="fc-day fc-widget-content fc-thu fc-future" data-date="2014-12-25"></td><td class="fc-day fc-widget-content fc-fri fc-future" data-date="2014-12-26"></td><td class="fc-day fc-widget-content fc-sat fc-future" data-date="2014-12-27"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-number fc-sun fc-future" data-date="2014-12-21">21</td><td class="fc-day-number fc-mon fc-future" data-date="2014-12-22">22</td><td class="fc-day-number fc-tue fc-future" data-date="2014-12-23">23</td><td class="fc-day-number fc-wed fc-future" data-date="2014-12-24">24</td><td class="fc-day-number fc-thu fc-future" data-date="2014-12-25">25</td><td class="fc-day-number fc-fri fc-future" data-date="2014-12-26">26</td><td class="fc-day-number fc-sat fc-future" data-date="2014-12-27">27</td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 73px;"><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-future" data-date="2014-12-28"></td><td class="fc-day fc-widget-content fc-mon fc-future" data-date="2014-12-29"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2014-12-30"></td><td class="fc-day fc-widget-content fc-wed fc-future" data-date="2014-12-31"></td><td class="fc-day fc-widget-content fc-thu fc-other-month fc-future" data-date="2015-01-01"></td><td class="fc-day fc-widget-content fc-fri fc-other-month fc-future" data-date="2015-01-02"></td><td class="fc-day fc-widget-content fc-sat fc-other-month fc-future" data-date="2015-01-03"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-number fc-sun fc-future" data-date="2014-12-28">28</td><td class="fc-day-number fc-mon fc-future" data-date="2014-12-29">29</td><td class="fc-day-number fc-tue fc-future" data-date="2014-12-30">30</td><td class="fc-day-number fc-wed fc-future" data-date="2014-12-31">31</td><td class="fc-day-number fc-thu fc-other-month fc-future" data-date="2015-01-01">1</td><td class="fc-day-number fc-fri fc-other-month fc-future" data-date="2015-01-02">2</td><td class="fc-day-number fc-sat fc-other-month fc-future" data-date="2015-01-03">3</td></tr></thead><tbody><tr><td class="fc-event-container"><a class="fc-day-grid-event fc-event fc-start fc-end fc-draggable" href="http://google.com/" style="background-color:#F8CB00"><div class="fc-content"><span class="fc-time">12a</span> <span class="fc-title">Click for Google</span></div></a></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 75px;"><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-other-month fc-future" data-date="2015-01-04"></td><td class="fc-day fc-widget-content fc-mon fc-other-month fc-future" data-date="2015-01-05"></td><td class="fc-day fc-widget-content fc-tue fc-other-month fc-future" data-date="2015-01-06"></td><td class="fc-day fc-widget-content fc-wed fc-other-month fc-future" data-date="2015-01-07"></td><td class="fc-day fc-widget-content fc-thu fc-other-month fc-future" data-date="2015-01-08"></td><td class="fc-day fc-widget-content fc-fri fc-other-month fc-future" data-date="2015-01-09"></td><td class="fc-day fc-widget-content fc-sat fc-other-month fc-future" data-date="2015-01-10"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-number fc-sun fc-other-month fc-future" data-date="2015-01-04">4</td><td class="fc-day-number fc-mon fc-other-month fc-future" data-date="2015-01-05">5</td><td class="fc-day-number fc-tue fc-other-month fc-future" data-date="2015-01-06">6</td><td class="fc-day-number fc-wed fc-other-month fc-future" data-date="2015-01-07">7</td><td class="fc-day-number fc-thu fc-other-month fc-future" data-date="2015-01-08">8</td><td class="fc-day-number fc-fri fc-other-month fc-future" data-date="2015-01-09">9</td><td class="fc-day-number fc-sat fc-other-month fc-future" data-date="2015-01-10">10</td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div></div></div></td></tr></tbody></table></div></div>
                </div>
            </div>
        </div>
        <!-- END PORTLET-->
    </div>
    <div class="col-md-6 col-sm-6">
        <!-- BEGIN PORTLET-->
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bubble font-red-sunglo"></i>
                    <span class="caption-subject font-red-sunglo bold uppercase">Chats</span>
                </div>
                <div class="actions">
                    <div class="portlet-input input-inline">
                        <div class="input-icon right">
                            <i class="icon-magnifier"></i>
                            <input type="text" class="form-control input-circle" placeholder="search...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="portlet-body" id="chats">
                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 341px;"><div class="scroller" style="height: 341px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible1="1" data-initialized="1">
                        <ul class="chats">
                            <li class="in">
                                <img class="avatar" alt="" src="../../assets/admin/layout/img/avatar1.jpg">
                                <div class="message">
											<span class="arrow">
											</span>
                                    <a href="#" class="name">
                                        Bob Nilson </a>
											<span class="datetime">
											at 20:09 </span>
											<span class="body">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                </div>
                            </li>
                            <li class="out">
                                <img class="avatar" alt="" src="../../assets/admin/layout/img/avatar2.jpg">
                                <div class="message">
											<span class="arrow">
											</span>
                                    <a href="#" class="name">
                                        Lisa Wong </a>
											<span class="datetime">
											at 20:11 </span>
											<span class="body">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                </div>
                            </li>
                            <li class="in">
                                <img class="avatar" alt="" src="../../assets/admin/layout/img/avatar1.jpg">
                                <div class="message">
											<span class="arrow">
											</span>
                                    <a href="#" class="name">
                                        Bob Nilson </a>
											<span class="datetime">
											at 20:30 </span>
											<span class="body">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                </div>
                            </li>
                            <li class="out">
                                <img class="avatar" alt="" src="../../assets/admin/layout/img/avatar3.jpg">
                                <div class="message">
											<span class="arrow">
											</span>
                                    <a href="#" class="name">
                                        Richard Doe </a>
											<span class="datetime">
											at 20:33 </span>
											<span class="body">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                </div>
                            </li>
                            <li class="in">
                                <img class="avatar" alt="" src="../../assets/admin/layout/img/avatar3.jpg">
                                <div class="message">
											<span class="arrow">
											</span>
                                    <a href="#" class="name">
                                        Richard Doe </a>
											<span class="datetime">
											at 20:35 </span>
											<span class="body">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                </div>
                            </li>
                            <li class="out">
                                <img class="avatar" alt="" src="../../assets/admin/layout/img/avatar1.jpg">
                                <div class="message">
											<span class="arrow">
											</span>
                                    <a href="#" class="name">
                                        Bob Nilson </a>
											<span class="datetime">
											at 20:40 </span>
											<span class="body">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                </div>
                            </li>
                            <li class="in">
                                <img class="avatar" alt="" src="../../assets/admin/layout/img/avatar3.jpg">
                                <div class="message">
											<span class="arrow">
											</span>
                                    <a href="#" class="name">
                                        Richard Doe </a>
											<span class="datetime">
											at 20:40 </span>
											<span class="body">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                </div>
                            </li>
                            <li class="out">
                                <img class="avatar" alt="" src="../../assets/admin/layout/img/avatar1.jpg">
                                <div class="message">
											<span class="arrow">
											</span>
                                    <a href="#" class="name">
                                        Bob Nilson </a>
											<span class="datetime">
											at 20:54 </span>
											<span class="body">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. sed diam nonummy nibh euismod tincidunt ut laoreet. </span>
                                </div>
                            </li>
                        </ul>
                    </div><div class="slimScrollBar" style="width: 7px; position: absolute; top: 167px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 174.073353293413px; background: rgb(187, 187, 187);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(234, 234, 234);"></div></div>
                <div class="chat-form">
                    <div class="input-cont">
                        <input class="form-control" type="text" placeholder="Type a message here...">
                    </div>
                    <div class="btn-cont">
									<span class="arrow">
									</span>
                        <a href="" class="btn blue icn-only">
                            <i class="fa fa-check icon-white"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PORTLET-->
    </div>
</div>





















<div class="content bordertop borderbot col-md-5">
												<h3 class="block">Document information</h3>
												<div class="form-group">
													<label class="control-label col-md-3 alignleft"><strong>Document type</strong>
													</label>
													<label class="control-label col-md-8 alignleft">
														Orders
													</label>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3 alignleft"><strong>Uploaded by</strong>
													</label>
													<label class="control-label col-md-8 alignleft">
														Admin

													</label>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3 alignleft"><strong>Uploaded on</strong>
													</label>
													<label class="control-label col-md-8 alignleft">
														<?php echo date('Y-m-d H:i:s')?>

													</label>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3 alignleft"><strong>Description</strong>
													</label>
													<label class="control-label col-md-8 alignleft">
													Sample description goes here

													</label>
												</div>
											</div>
											<div class="content bordertop borderbot col-md-5">
												<h3 class="block">Atttachments</h3>
												<div class="form-group">
													<label class="control-label col-md-7 alignleft"><i class="icon-notebook"> &nbsp; </i><strong>Document 1</strong>
													</label>
													<label class="control-label col-md-4 alignleft">
														&#x2713;
													</label>
												</div>
                                                <div class="form-group">
													<label class="control-label col-md-7 alignleft"><i class="icon-notebook"> &nbsp; </i><strong>Document 2</strong>
													</label>
													<label class="control-label col-md-4 alignleft">
														&#x2713;
													</label>
												</div>

											</div>
                                            <div class="clean"></div>
											<div class="content bordertop borderbot col-md-5">
												<h3 class="block">Sub-documents</h3>
                                                <div class="form-group">
													<label class="control-label col-md-7 alignleft"><i class="icon-notebook"> &nbsp; </i><strong>Company pre-screen questions</strong>
													</label>
													<label class="control-label col-md-4 alignleft">
														&#x2713;
													</label>
												</div>
                                                <div class="form-group">
													<label class="control-label col-md-7 alignleft"><i class="icon-notebook"> &nbsp; </i><strong>Driver application</strong>
													</label>
													<label class="control-label col-md-4 alignleft">
														&#x2713;
													</label>
												</div>
                                                <div class="form-group">
													<label class="control-label col-md-7 alignleft"><i class="icon-notebook"> &nbsp; </i><strong>Driver evaluation form</strong>
													</label>
													<label class="control-label col-md-4 alignleft">
														&#x2713;
													</label>
												</div>
                                                <div class="form-group">
													<label class="control-label col-md-7 alignleft"><i class="icon-notebook"> &nbsp; </i><strong>Employment verification form</strong>
													</label>
													<label class="control-label col-md-4 alignleft">
														&#x2713;
													</label>
												</div>
                                                <div class="form-group">
													<label class="control-label col-md-7 alignleft"><i class="icon-notebook"> &nbsp; </i><strong>Consent form</strong>
													</label>
													<label class="control-label col-md-4 alignleft">
														&#x2713;
													</label>
												</div>

											</div>
											<div class="content bordertop borderbot col-md-5">
												<h3 class="block">Finalization</h3>
                                                <div class="form-group">
													<label class="control-label col-md-7 alignleft"><i class="icon-notebook"> &nbsp; </i><strong>Document 1</strong>
													</label>
													<label class="control-label col-md-4 alignleft">
														&#x2713;
													</label>
												</div>
                                                <div class="form-group">
													<label class="control-label col-md-7 alignleft"><i class="icon-notebook"> &nbsp; </i><strong>Document 2</strong>
													</label>
													<label class="control-label col-md-4 alignleft">
														&#x2713;
													</label>
												</div>
                                                <div class="form-group">
													<label class="control-label col-md-7 alignleft"><i class="icon-notebook"> &nbsp; </i><strong>Document 3</strong>
													</label>
													<label class="control-label col-md-4 alignleft">
														&#x2713;
													</label>
												</div>
                                                <div class="form-group">
													<label class="control-label col-md-7 alignleft"><i class="icon-notebook"> &nbsp; </i><strong>Document 4</strong>
													</label>
													<label class="control-label col-md-4 alignleft">
														&#x2713;
													</label>
												</div>
                                                <div class="form-group">
													<label class="control-label col-md-7 alignleft"><i class="icon-notebook"> &nbsp; </i><strong>Document 5</strong>
													</label>
													<label class="control-label col-md-4 alignleft">
														&#x2713;
													</label>
												</div>



											</div>
                                            <div class="clean"></div>
                                            <div class="form-group col-md-6">
                                                    <div class="col-sm-12">
                                                    <a href="#" class="btn btn-primary">Print Report</a>
                                                    </div>
                                                </div>
                                             <div class="clean"></div>