<style>
    @media print {
        .page-header {
            display: none;
        }

        .page-footer, .nav-tabs, .page-title, .page-bar, .theme-panel, .page-sidebar-wrapper {
            display: none !important;
        }

        .portlet-body, .portlet-title {
            border-top: 1px solid #578EBE;
        }
    }

</style>
<?php

    function get_string_between($string, $start, $end)
    {
        $string = " " . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return "";
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }


    function get_mee_results_binary($bright_planet_html_binary, $document_type)
    {
        return (get_string_between(base64_decode($bright_planet_html_binary), $document_type, '</tr>'));
    }

    function get_color($result_string)
    {

        $return_color = '<span  class="label label-sm label-warning" style="float:right;padding:4px;">' . $result_string . '</span>';

        switch (trim($result_string)) {
            case 'NOT ATTACHED':
                echo $return_color = '<span  class="label label-sm label-danger" style="float:right;padding:4px;">' . $result_string . '</span>';;
                break;
            case 'PASS':
                echo $return_color = '<span  class="label label-sm label-success" style="float:right;padding:4px;">' . $result_string . '</span>';
                break;
            case 'DISCREPANCIES':
                echo $return_color = '<span  class="label label-sm label-warning" style="float:right;padding:4px;">' . $result_string . '</span>';
                break;
            case 'COACHING REQUIRED':
                echo $return_color = '<span  class="label label-sm label-warning" style="float:right;padding:4px;">' . $result_string . '</span>';
                break;
            case 'VERIFIED':
                echo $return_color = '<span  class="label label-sm label-success" style="float:right;padding:4px;">' . $result_string . '</span>';
                break;
            case 'POTENTIAL TO SUCCEED':
                echo $return_color = '<span  class="label label-sm label-warning" style="float:right;padding:4px;">' . $result_string . '</span>';
                break;
            default:
                echo $return_color = '<span  class="label label-sm label-warning" style="float:right;padding:4px;">' . $result_string . '</span>';


        }

    }


    function return_link($pdi, $order_id)
    {
        if (file_exists("orders/order_" . $order_id . '/' . $pdi . '.pdf')) {
            $link = "orders/order_" . $order_id . '/' . $pdi . '.pdf';
            return $link;

        } else if (file_exists("orders/order_" . $order_id . '/' . $pdi . '.html')) {
            $link = "orders/order_" . $order_id . '/' . $pdi . '.html';
            return $link;

        } else if (file_exists("orders/order_" . $order_id . '/' . $pdi . '.txt')) {
            $link = "orders/order_" . $order_id . '/' . $pdi . '.txt';
            return $link;

        }
        return false;
    }

    function create_files_from_binary($order_id, $pdi, $binary)
    {
        $createfile_pdf = "orders/order_" . $order_id . '/' . $pdi . '.pdf';
        $createfile_html = "orders/order_" . $order_id . '/' . $pdi . 'html';
        $createfile_text = "orders/order_" . $order_id . '/' . $pdi . 'txt';

        if (!file_exists($createfile_pdf) && !file_exists($createfile_text) && !file_exists($createfile_html)) {

            if (isset($binary) && $binary != "") {
                file_put_contents('unknown_file', base64_decode($binary));
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mime = finfo_file($finfo, 'unknown_file');

                if ($mime == "application/pdf") {
                    rename("unknown_file", "orders/order_" . $order_id . '/' . $pdi . '.pdf');
                } elseif ($mime == "text/html") {
                    rename("unknown_file", "orders/order_" . $order_id . '/' . $pdi . '.html');
                } elseif ($mime == "text/plain") {
                    /*
                    $binary = base64_decode($binary);
                    $binary = str_replace("<br />", "", $binary);
                    $binary = str_replace("&nbsp;", "", $binary);
                    file_put_contents('unknown_file', $binary);
*/
                    rename("unknown_file", "orders/order_" . $order_id . '/' . $pdi . '.html');
                } else {
                    rename("unknown_file", "orders/order_" . $order_id . '/' . $pdi . '.html');
                    //  echo "There was an error converting the file. Please contact the system administrator.";
                }
            }
        }
    }

    create_files_from_binary($order->id, '1603', $order->ebs_1603_binary);
    create_files_from_binary($order->id, '1', $order->ins_1_binary);
    create_files_from_binary($order->id, '14', $order->ins_14_binary);
    create_files_from_binary($order->id, '77', $order->ins_77_binary);
    create_files_from_binary($order->id, '78', $order->ins_78_binary);
    create_files_from_binary($order->id, '1650', $order->ebs_1650_binary);
    create_files_from_binary($order->id, '1627', $order->ebs_1627_binary);

?>
<h3 class="page-title">
    View Report
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?php echo $this->request->webroot; ?>">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="">View Report
            </a>
        </li>
    </ul>
    <a href="javascript:window.print();" class="floatright btn btn-info">Print</a>
</div>
<!-- BEGIN PROFILE SIDEBAR -->
<div class="profile-sidebar">
    <!-- PORTLET MAIN -->
    <div class="portlet light profile-sidebar-portlet">
        <!-- SIDEBAR USERPIC -->
        <div class="profile-userpic">
            <center>
                <?php
                    //debug($order);
                    if (isset($order->profile->image) && $order->profile->image != "") { ?>
                        <img
                            src="<?php echo $this->request->webroot; ?>img/profile/<?php echo $order->profile->image ?>"
                            class="img-responsive" alt="" id="clientpic"/>

                    <?php } else {
                        ?>
                        <img src="<?php echo $this->request->webroot; ?>img/profile/default.png" class="img-responsive"
                             id="clientpic"
                             alt=""/>
                    <?php
                    }
                ?>
            </center>
        </div>
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">
                <?php echo ucwords($order->profile->fname); ?>   <?php echo ucwords($order->profile->lname); ?>
            </div>
            <div class="profile-usertitle-job">
                Reference Number <?php echo ucwords($order->profile->id); ?>
            </div>

            <div class="profile-usertitle-job">
                <label class="uniform-inline">
                    <input type="checkbox" name="stat" value="1" id="<?php echo $order->id; ?>"
                           class="checkdriver" <?php if ($order->is_hired == '1') echo "checked"; ?> />
                    Was this driver hired? </label>

            </div>

            <!--<div class="">
                <label class="uniform-inline">
                    <input  type="checkbox" name="stat"  value="1" />
                    Hired </label>

            </div>-->

        </div>
        <!-- END SIDEBAR USER TITLE -->
        <!-- SIDEBAR BUTTONS -->
    </div>
    <script>
        $(function () {

            $('.checkdriver').click(function () {

                var oid = $(this).attr('id');
                if ($(this).is(":checked")) {
                    var hired = 1;
                }
                else
                    var hired = 0;

                $.ajax({
                    url: "<?php echo $this->request->webroot;?>documents/savedriver/" + oid,
                    type: 'post',
                    data: 'is_hired=' + hired,
                    success: function (msg) {
                    }
                })
            });
        });
    </script>
    <!-- END PORTLET MAIN -->
    <!-- PORTLET MAIN -->
    <div class="portlet light">

        <div class="margin-bottom-20">

            <a href="#" class="btn btn-lg default yellow-stripe">
                Road Test Score </a><a href="#" class="btn btn-lg yellow">

                <i class="fa fa-bar-chart-o"></i> <?php if (isset($order->road_test[0]->total_score)) echo $order->road_test[0]->total_score; ?>
            </a>

        </div>


        <?php $settings = $this->requestAction('settings/get_settings');
            $uploaded_by = $this->requestAction("documents/getUser/" . $order->user_id);
        ?>
        <span class="profile-desc-text">   <p>  <?php echo ucfirst($settings->document); ?> type:
                <strong>Orders</strong></p>
                        <p>Filed by: <strong><?php echo $uploaded_by->username; ?></strong></p>

            <p>Recruiter ID # <strong><?php echo $uploaded_by->isb_id; ?></strong></p>
                        <p>Client: <strong><?php echo $order->client->company_name; ?></strong></p>

            <p>Uploaded on: <strong><?php echo $order->created; ?></strong></p>

</span>
        <!--hr/>
        <h4 class="profile-desc-title">About Marcus Doe</h4>
        <span class="profile-desc-text"> Lorem ipsum dolor sit amet diam nonummy nibh dolore. </span>

        <div class="margin-top-20 profile-desc-link">
            <i class="fa fa-globe"></i>
            <a href="#">Lorem ipsum</a>
        </div>
        <div class="margin-top-20 profile-desc-link">
            <i class="fa fa-twitter"></i>
            <a href="#">Lorem ipsum</a>
        </div>
        <div class="margin-top-20 profile-desc-link">
            <i class="fa fa-facebook"></i>
            <a href="#">Lorem ipsum</a>
        </div-->

    </div>
    <!-- END PORTLET MAIN -->
</div>
<!-- END BEGIN PROFILE SIDEBAR -->
<!-- BEGIN PROFILE CONTENT -->
<div class="profile-content">
    <div class="row">

        <div class="clearfix"></div>
        <div class="col-md-6">
            <!-- BEGIN PORTLET -->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption caption-md">
                        <i class="icon-bar-chart theme-font hide"></i>
                        <span class="caption-subject font-blue-madison bold uppercase">Driver Score Sheet</span>
                        <span class="caption-helper"></span>
                    </div>
                    <div class="inputs">
                        <div class="portlet-input input-inline input-small ">

                        </div>
                    </div>
                </div>


                <div class="portlet box yellow">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-folder-open-o"></i>ISB MEE Results
                        </div>
                        <!--div class="tools">
                            <a href="javascript:;" class="collapse" data-original-title="" title="">
                            </a>
                            <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title="">
                            </a>
                            <a href="javascript:;" class="reload" data-original-title="" title="">
                            </a>
                            <a href="javascript:;" class="remove" data-original-title="" title="">
                            </a>
                        </div-->
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable">

                            <table class="table ">

                                <tbody>


                                <tr class="even" role="row">


                                    <td>
                                        <span class="icon-notebook"></span>

                                    </td>

                                    <td>Premium National Criminal Record Check
                                        <?php
                                            get_color(strip_tags(get_mee_results_binary($order->bright_planet_html_binary, "Premium National Criminal Record Check")));
                                        ?>

                                    </td>

                                    <td class="actions">
                                        <?php
                                            $createfile = APP . "../webroot/orders/order_" . $order->id . '/1603.pdf';


                                            if (return_link('1603', $order->id) == false) { ?>
                                                <span class="label label label-info">Pending </span>
                                            <? } else { ?>
                                                <a target="_blank"
                                                   href="<? echo $this->request->webroot . return_link('1603', $order->id); ?>"
                                                   class="btn btn-primary">Download</a>
                                            <? } ?>


                                    </td>
                                </tr>


                                <tr class="even" role="row">
                                    <td>
                                        <span class="icon-notebook"></span>

                                    </td>
                                    <td>Driver's Record Abstract
                                        <?php
                                            get_color(strip_tags(get_mee_results_binary($order->bright_planet_html_binary, "Driver's Record Abstract")));
                                        ?>
                                    </td>

                                    <td class="actions">
                                        <?php
                                            if (return_link('1', $order->id) == false) { ?>
                                                <span class="label label label-info">Pending </span>
                                            <? } else { ?>
                                                <a target="_blank"
                                                   href="<? echo $this->request->webroot . return_link('1', $order->id); ?>"
                                                   class="btn btn-primary">Download</a>
                                            <? } ?>

                                    </td>
                                </tr>


                                <tr class="even" role="row">
                                    <td>
                                        <span class="icon-notebook"></span>

                                    </td>
                                    <td>CVOR


                                        <?php
                                            get_color(strip_tags(get_mee_results_binary($order->bright_planet_html_binary, "CVOR")));
                                        ?>


                                    </td>

                                    <td class="actions">
                                        <?php
                                            if (return_link('14', $order->id) == false) { ?>
                                                <span class="label label label-info">Pending </span>
                                            <? } else { ?>
                                                <a target="_blank"
                                                   href="<? echo $this->request->webroot . return_link('14', $order->id); ?>"
                                                   class="btn btn-primary">Download</a>
                                            <? } ?>

                                    </td>
                                </tr>


                                <tr class="odd" role="row">

                                    <td>
                                        <span class="icon-notebook"></span>

                                    </td>
                                    <td>Pre-employment Screening Program Report

                                        <?php
                                            get_color(strip_tags(get_mee_results_binary($order->bright_planet_html_binary, "Pre-employment Screening Program Report")));
                                        ?>

                                    </td>

                                    <td class="actions">
                                        <?php
                                            if (return_link('77', $order->id) == false) { ?>
                                                <span class="label label label-info">Pending </span>
                                            <? } else { ?>
                                                <a target="_blank"
                                                   href="<? echo $this->request->webroot . return_link('77', $order->id); ?>"
                                                   class="btn btn-primary">Download</a>
                                            <? } ?>

                                    </td>
                                </tr>


                                <tr class="even" role="row">

                                    <td>
                                        <span class="icon-notebook"></span>

                                    </td>
                                    <td>Transclick

                                        <?php
                                            get_color(strip_tags(get_mee_results_binary($order->bright_planet_html_binary, "TransClick")));
                                        ?>
                                    </td>

                                    <td class="actions">
                                        <?php
                                            if (return_link('78', $order->id) == false) { ?>
                                                <span class="label label label-info">Pending </span>
                                            <? } else { ?>
                                                <a target="_blank"
                                                   href="<? echo $this->request->webroot . return_link('78', $order->id); ?>"
                                                   class="btn btn-primary">Download</a>
                                            <? } ?>

                                    </td>
                                </tr>


                                <tr class="odd" role="row">

                                    <td>
                                        <span class="icon-notebook"></span>

                                    </td>
                                    <td>Certifications

                                        <?php
                                            get_color(strip_tags(get_mee_results_binary($order->bright_planet_html_binary, "Certifications")));
                                        ?>
                                    </td>

                                    <td class="actions">
                                        <?php
                                            if (return_link('1650', $order->id) == false) { ?>
                                                <span class="label label label-info">Pending </span>
                                            <? } else { ?>
                                                <a target="_blank"
                                                   href="<? echo $this->request->webroot . return_link('1650', $order->id); ?>"
                                                   class="btn btn-primary">Download</a>
                                            <? } ?>

                                    </td>
                                </tr>


                                <tr class="odd" role="row">

                                    <td>
                                        <span class="icon-notebook"></span>

                                    </td>
                                    <td>Letter of Experience

                                        <?php
                                            get_color(strip_tags(get_mee_results_binary($order->bright_planet_html_binary, "Letter Of Experience")));
                                        ?>
                                    </td>

                                    <td class="actions">
                                        <?php
                                            if (return_link('1627', $order->id) == false) { ?>
                                                <span class="label label label-info">Pending </span>
                                            <? } else { ?>
                                                <a target="_blank"
                                                   href="<? echo $this->request->webroot . return_link('1627', $order->id); ?>"
                                                   class="btn btn-primary">Download</a>
                                            <? } ?>

                                    </td>
                                </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
            <!-- END PORTLET -->
        </div>


        <div class="col-md-6">

            <div class="portlet-body">
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-bar-chart font-green-haze"></i>
                            <span class="caption-subject bold uppercase font-green-haze"> Performance Chart</span>
                        </div>
                        <div class="tools">
                            <!--a title="" data-original-title="" href="javascript:;" class="collapse">
                            </a>
                            <a title="" data-original-title="" href="#portlet-config" data-toggle="modal" class="config">
                            </a>
                            <a title="" data-original-title="" href="javascript:;" class="reload">
                            </a>
                            <a title="" data-original-title="" href="javascript:;" class="fullscreen">
                            </a>
                            <a title="" data-original-title="" href="javascript:;" class="remove">
                            </a-->
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="chart_8" class="chart" style="height: 370px; overflow: hidden; text-align: left;">

                            <!--img style="z-index:99999;position: absolute;top: 70px;opacity: 0.6"
                                 src="<?php echo $this->request->webroot; ?>img/coming-soon.png"/-->


                            <div style="position: relative;">
                                <div style="">
                                    <svg version="1.1" style="position: absolute; width: 388px; height: 400px;">
                                        <g>
                                            <path stroke-opacity="0" stroke-width="1" fill-opacity="0" stroke="#000000"
                                                  fill="#FFFFFF" d="M0.5,0.5 L387.5,0.5 L387.5,399.5 L0.5,399.5 Z"
                                                  cs="100,100"></path>
                                        </g>
                                        <g>
                                            <g visibility="visible">
                                                <g>
                                                    <path stroke="#000000" stroke-opacity="0.2" stroke-width="1"
                                                          fill="none" d="M194.5,73.5 L194.5,73.5" cs="100,100"></path>
                                                </g>
                                                <g>
                                                    <path stroke="#000000" stroke-opacity="0.2" stroke-width="1"
                                                          fill="none" d="M194.5,200.5 L194.5,200.5" cs="100,100"></path>
                                                </g>
                                                <g>
                                                    <g transform="translate(194,200)">
                                                        <path stroke-width="1" stroke-opacity="0" stroke="#000"
                                                              fill-opacity="0.3" fill="#0066CC"
                                                              d=" M0,0 L-89.80256121069155,-89.80256121069151 A127,127,0,0,1,89.80256121069151,-89.80256121069155 L0,0 Z"
                                                              cs="1000,1000"></path>
                                                    </g>
                                                </g>
                                                <g>
                                                    <path stroke="#000000" stroke-opacity="0.2" stroke-width="1"
                                                          fill="none" d="M194.5,73.5 L194.5,73.5" cs="100,100"></path>
                                                </g>
                                                <g>
                                                    <path stroke="#000000" stroke-opacity="0.2" stroke-width="1"
                                                          fill="none" d="M194.5,200.5 L194.5,200.5" cs="100,100"></path>
                                                </g>
                                                <g>
                                                    <g transform="translate(194,200)">
                                                        <path stroke-width="1" stroke-opacity="0" stroke="#000"
                                                              fill-opacity="0.3" fill="#CC3333"
                                                              d=" M0,0 L89.80256121069154,89.80256121069152 A127,127,0,0,1,-89.80256121069152,89.80256121069155 L0,0 Z"
                                                              cs="1000,1000"></path>
                                                    </g>
                                                </g>
                                                <g>
                                                    <path stroke="#000000" stroke-opacity="0.2" stroke-width="1"
                                                          fill="none" d="M194.5,200.5 L189.5,200.5" cs="100,100"></path>
                                                    <circle transform="translate(194,200)" stroke-opacity="0.08"
                                                            stroke-width="1" fill-opacity="0" stroke="#000000"
                                                            fill="#FFFFFF" cy="0" cx="0" r="0"></circle>
                                                </g>
                                                <g>
                                                    <path stroke="#000000" stroke-opacity="0.2" stroke-width="1"
                                                          fill="none" d="M194.5,155.5 L189.5,155.5" cs="100,100"></path>
                                                    <circle transform="translate(194,200)" stroke-opacity="0.08"
                                                            stroke-width="1" fill-opacity="0" stroke="#000000"
                                                            fill="#FFFFFF" cy="0" cx="0" r="45"></circle>
                                                    <g transform="translate(194,200)">
                                                        <path stroke-width="1" stroke-opacity="0" stroke="#000"
                                                              fill-opacity="0.05" fill="#FFFFFF"
                                                              d=" M0,0 L0,-45 A45,45,0,1,1,-0.04712388119100082,-44.99997532599125 L0,0 Z"
                                                              cs="1000,1000"></path>
                                                    </g>
                                                </g>
                                                <g>
                                                    <path stroke="#000000" stroke-opacity="0.2" stroke-width="1"
                                                          fill="none" d="M194.5,109.5 L189.5,109.5" cs="100,100"></path>
                                                    <circle transform="translate(194,200)" stroke-opacity="0.08"
                                                            stroke-width="1" fill-opacity="0" stroke="#000000"
                                                            fill="#FFFFFF" cy="0" cx="0" r="91"></circle>
                                                </g>
                                                <g>
                                                    <path stroke="#000000" stroke-opacity="0.2" stroke-width="1"
                                                          fill="none" d="M194.5,64.5 L189.5,64.5" cs="100,100"></path>
                                                    <circle transform="translate(194,200)" stroke-opacity="0.08"
                                                            stroke-width="1" fill-opacity="0" stroke="#000000"
                                                            fill="#FFFFFF" cy="0" cx="0" r="136"></circle>
                                                    <g transform="translate(194,200)">
                                                        <path stroke-width="1" stroke-opacity="0" stroke="#000"
                                                              fill-opacity="0.05" fill="#FFFFFF"
                                                              d=" M0,-91 L0,-136 A136,136,0,1,1,-0.1424188409328025,-135.99992542966245 L-0.09529495974180166,-90.9999501036712 A91,91,0,1,0,0,-91 Z"
                                                              cs="1000,1000"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g>
                                            <g visibility="visible" opacity="1" transform="translate(194,200)">
                                                <g></g>
                                                <g></g>
                                                <g>
                                                    <path stroke="#67b7dc" stroke-opacity="0.9" stroke-width="1"
                                                          fill="none"
                                                          d="M0.5,-72.5 L58.5,-57.5 L41.5,0.5 L22.5,22.5 L0.5,83.5 L-53.5,54.5 L-100.5,0.5 L-63.5,-63.5 L0.5,-72.5 M0,0 L0,0"
                                                          cs="100,100"></path>
                                                    <path stroke-opacity="0" stroke-width="1" fill-opacity="0.3"
                                                          stroke="#000" fill="#67b7dc"
                                                          d="M0.5,-72.5 L58.5,-57.5 L41.5,0.5 L22.5,22.5 L0.5,83.5 L-53.5,54.5 L-100.5,0.5 L-63.5,-63.5 L0.5,-72.5 Z"
                                                          cs="100,100"></path>
                                                </g>
                                            </g>
                                        </g>
                                        <g></g>
                                        <g>
                                            <g visibility="visible">
                                                <text transform="translate(191,73)" text-anchor="end" opacity="1"
                                                      font-size="11" font-family="Open Sans" fill="#888" y="6">
                                                    <tspan x="0" y="6"></tspan>
                                                </text>
                                                <text transform="translate(191,200)" text-anchor="end" opacity="1"
                                                      font-size="11" font-family="Open Sans" fill="#888" y="6">
                                                    <tspan x="0" y="6"></tspan>
                                                </text>
                                                <text transform="translate(191,73)" text-anchor="end" opacity="1"
                                                      font-size="11" font-family="Open Sans" fill="#888" y="6">
                                                    <tspan x="0" y="6"></tspan>
                                                </text>
                                                <text transform="translate(191,200)" text-anchor="end" opacity="1"
                                                      font-size="11" font-family="Open Sans" fill="#888" y="6">
                                                    <tspan x="0" y="6"></tspan>
                                                </text>
                                                <text transform="translate(186,200)" text-anchor="end" opacity="1"
                                                      font-size="11" font-family="Open Sans" fill="#888" y="6">
                                                    <tspan x="0" y="6">0</tspan>
                                                </text>
                                                <text transform="translate(186,155)" text-anchor="end" opacity="1"
                                                      font-size="11" font-family="Open Sans" fill="#888" y="6">
                                                    <tspan x="0" y="6">5</tspan>
                                                </text>
                                                <text transform="translate(186,109)" text-anchor="end" opacity="1"
                                                      font-size="11" font-family="Open Sans" fill="#888" y="6">
                                                    <tspan x="0" y="6">10</tspan>
                                                </text>
                                                <text transform="translate(186,64)" text-anchor="end" opacity="1"
                                                      font-size="11" font-family="Open Sans" fill="#888" y="6">
                                                    <tspan x="0" y="6">15</tspan>
                                                </text>
                                            </g>
                                        </g>
                                        <g>
                                            <g visibility="visible">
                                                <path stroke="#000000" stroke-opacity="0.2" stroke-width="1" fill="none"
                                                      d="M194.5,200.5 L194.5,64.5" cs="100,100"></path>
                                                <text transform="translate(194,49)" text-anchor="middle" opacity="1"
                                                      font-size="11" font-family="Open Sans" fill="#888" y="6">
                                                    <tspan x="0" y="6">Lorem</tspan>
                                                </text>
                                                <path stroke="#000000" stroke-opacity="0.2" stroke-width="1" fill="none"
                                                      d="M194.5,200.5 L290.5,104.5" cs="100,100"></path>
                                                <text transform="translate(302,97)" text-anchor="start" opacity="1"
                                                      font-size="11" font-family="Open Sans" fill="#888" y="6">
                                                    <tspan x="0" y="6">Lorem</tspan>
                                                </text>
                                                <path stroke="#000000" stroke-opacity="0.2" stroke-width="1" fill="none"
                                                      d="M194.5,200.5 L330.5,200.5" cs="100,100"></path>
                                                <text transform="translate(345,200)" text-anchor="start" opacity="1"
                                                      font-size="11" font-family="Open Sans" fill="#888" y="6">
                                                    <tspan x="0" y="6">Lorem</tspan>
                                                </text>
                                                <path stroke="#000000" stroke-opacity="0.2" stroke-width="1" fill="none"
                                                      d="M194.5,200.5 L290.5,296.5" cs="100,100"></path>
                                                <text transform="translate(302,303)" text-anchor="start" opacity="1"
                                                      font-size="11" font-family="Open Sans" fill="#888" y="6">
                                                    <tspan x="0" y="6">Lorem</tspan>
                                                </text>
                                                <path stroke="#000000" stroke-opacity="0.2" stroke-width="1" fill="none"
                                                      d="M194.5,200.5 L194.5,336.5" cs="100,100"></path>
                                                <text transform="translate(194,351)" text-anchor="middle" opacity="1"
                                                      font-size="11" font-family="Open Sans" fill="#888" y="6">
                                                    <tspan x="0" y="6">Lorem</tspan>
                                                </text>
                                                <path stroke="#000000" stroke-opacity="0.2" stroke-width="1" fill="none"
                                                      d="M194.5,200.5 L98.5,296.5" cs="100,100"></path>
                                                <text transform="translate(86,303)" text-anchor="end" opacity="1"
                                                      font-size="11" font-family="Open Sans" fill="#888" y="6">
                                                    <tspan x="0" y="6">Lorem</tspan>
                                                </text>
                                                <path stroke="#000000" stroke-opacity="0.2" stroke-width="1" fill="none"
                                                      d="M194.5,200.5 L58.5,200.5" cs="100,100"></path>
                                                <text transform="translate(43,200)" text-anchor="end" opacity="1"
                                                      font-size="11" font-family="Open Sans" fill="#888" y="6">
                                                    <tspan x="0" y="6">Lorem</tspan>
                                                </text>
                                                <path stroke="#000000" stroke-opacity="0.2" stroke-width="1" fill="none"
                                                      d="M194.5,200.5 L98.5,104.5" cs="100,100"></path>
                                                <text transform="translate(86,97)" text-anchor="end" opacity="1"
                                                      font-size="11" font-family="Open Sans" fill="#888" y="6">
                                                    <tspan x="0" y="6">Lorem</tspan>
                                                </text>
                                            </g>
                                        </g>
                                        <g></g>
                                        <g></g>
                                        <g>
                                            <g visibility="visible" opacity="1" transform="translate(194,200)">
                                                <circle transform="translate(0,-73)" stroke-opacity="0" stroke-width="2"
                                                        fill-opacity="1" stroke="#67b7dc" fill="#67b7dc" cy="0" cx="0"
                                                        r="4"></circle>
                                                <circle transform="translate(58,-58)" stroke-opacity="0"
                                                        stroke-width="2" fill-opacity="1" stroke="#67b7dc"
                                                        fill="#67b7dc" cy="0" cx="0" r="4"></circle>
                                                <circle transform="translate(41,0)" stroke-opacity="0" stroke-width="2"
                                                        fill-opacity="1" stroke="#67b7dc" fill="#67b7dc" cy="0" cx="0"
                                                        r="4"></circle>
                                                <circle transform="translate(22,22)" stroke-opacity="0" stroke-width="2"
                                                        fill-opacity="1" stroke="#67b7dc" fill="#67b7dc" cy="0" cx="0"
                                                        r="4"></circle>
                                                <circle transform="translate(0,83)" stroke-opacity="0" stroke-width="2"
                                                        fill-opacity="1" stroke="#67b7dc" fill="#67b7dc" cy="0" cx="0"
                                                        r="4"></circle>
                                                <circle transform="translate(-54,54)" stroke-opacity="0"
                                                        stroke-width="2" fill-opacity="1" stroke="#67b7dc"
                                                        fill="#67b7dc" cy="0" cx="0" r="4"></circle>
                                                <circle transform="translate(-101,0)" stroke-opacity="0"
                                                        stroke-width="2" fill-opacity="1" stroke="#67b7dc"
                                                        fill="#67b7dc" cy="0" cx="0" r="4"></circle>
                                                <circle transform="translate(-64,-64)" stroke-opacity="0"
                                                        stroke-width="2" fill-opacity="1" stroke="#67b7dc"
                                                        fill="#67b7dc" cy="0" cx="0" r="4"></circle>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- END PORTLET -->


    </div>
    <div class="row">


        <div class="col-md-6">


            <div class="portlet light">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-pencil"></i>Recruiter Notes
                        </div>

                    </div>
                    <div class="portlet-body">

                        <?php include('subpages/documents/recruiter_notes.php'); ?>
                    </div>
                </div>
            </div>


        </div>

        <div class="col-md-6">
            <!-- BEGIN PORTLET -->
            <div class="portlet light tasks-widget">
                <div class="portlet-title">
                    <div class="caption caption-md">
                        <i class="icon-bar-chart theme-font hide"></i>
                        <span
                            class="caption-subject font-blue-madison bold uppercase"><?php echo ucfirst($settings->document); ?>
                            Check-list</span>
                        <span class="caption-helper"></span>
                    </div>
                    <div class="inputs">
                        <div class="portlet-input input-small input-inline">

                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="task-content">
                        <div class="slimScrollDiv"
                             style="position: relative; overflow: hidden; width: auto; height: 282px;">
                            <div class="scroller" style="height: 282px; overflow: hidden; width: auto;"
                                 data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2"
                                 data-initialized="1">
                                <!-- START TASK LIST -->
                                <ul class="task-list">
                                    <li>
                                        <!--<div class="task-checkbox">
                                            <input type="hidden" value="1" name="test">

                                            <div class="checker"><span><input type="checkbox" class="liChild" value="2"
                                                                              name="test"></span></div>
                                        </div>-->
                                        <div class="task-title">
															<span class="task-title-sp">
														<span class="icon-notebook"></span>	Pre-screening form
 </span>                                    <?php $cnt = $this->requestAction("/documents/getprocessed/pre_screening/" . $order->id); ?>
                                            <?php if ($cnt > 0) { ?>
                                                <span style="float:right;padding:5px"
                                                      class="label label-sm label-success">Processed</span>
                                                &#x2713;
                                            <?php } else {
                                                ?>
                                                <span style="float:right;padding:5px"
                                                      class="label label-sm label-danger">Skipped</span>

                                            <?php
                                            } ?>


                                        </div>

                                    </li>
                                    <li>
                                        <!--<div class="task-checkbox">
                                            <div class="checker"><span><input type="checkbox" class="liChild" value=""></span>
                                            </div>
                                        </div>-->
                                        <div class="task-title">
											<span class="task-title-sp">
											<span class="icon-notebook"></span> Driver Application	 </span>
                                            <?php $cnt = $this->requestAction("/documents/getprocessed/driver_application/" . $order->id); ?>
                                            <?php if ($cnt > 0) { ?>
                                                <span style="float:right;padding:5px"
                                                      class="label label-sm label-success">Processed</span>
                                                &#x2713;
                                            <?php } else {
                                                ?>
                                                <span style="float:right;padding:5px"
                                                      class="label label-sm label-danger">Skipped</span>

                                            <?php
                                            } ?>

                                        </div>

                                    </li>
                                    <li>
                                        <!--<div class="task-checkbox">
                                            <div class="checker"><span><input type="checkbox" class="liChild" value=""></span>
                                            </div>
                                        </div>-->
                                        <div class="task-title">
											<span class="task-title-sp">
                                                <span class="icon-notebook"></span> Road Test
                                            </span>
                                            <?php $cnt = $this->requestAction("/documents/getprocessed/road_test/" . $order->id); ?>
                                            <?php if ($cnt > 0) { ?>
                                                <span style="float:right;padding:5px"
                                                      class="label label-sm label-success">Processed</span>
                                                &#x2713;
                                            <?php } else {
                                                ?>
                                                <span style="float:right;padding:5px"
                                                      class="label label-sm label-danger">Skipped</span>

                                            <?php
                                            } ?>
                                        </div>

                                    </li>
                                    <li>
                                        <!--<div class="task-checkbox">
                                            <div class="checker"><span><input type="checkbox" class="liChild" value=""></span>
                                            </div>
                                        </div>-->
                                        <div class="task-title">
											<span class="task-title-sp">

                                               <span class="icon-notebook"></span>  MEE Order	 </span>
                                            <?php $cnt = $this->requestAction("/documents/getprocessed/consent_form/" . $order->id); ?>
                                            <?php if ($cnt > 0) { ?>
                                                <span style="float:right;padding:5px"
                                                      class="label label-sm label-success">Processed</span>
                                                &#x2713;
                                            <?php } else {
                                                ?>
                                                <span style="float:right;padding:5px"
                                                      class="label label-sm label-danger">Skipped</span>

                                            <?php
                                            } ?>

                                        </div>

                                    </li>
                                    <li>
                                        <!--<div class="task-checkbox">
                                            <div class="checker"><span><input type="checkbox" class="liChild" value=""></span>
                                            </div>
                                        </div>-->
                                        <div class="task-title">
											<span class="task-title-sp">
                                          <span class="icon-notebook"></span>  Confirmation  </span>
                                            <?php if ($order->draft == 0) { ?>
                                                <span style="float:right;padding:5px"
                                                      class="label label-sm label-success">Processed</span>
                                                &#x2713;
                                            <?php } else {
                                                ?>
                                                <span style="float:right;padding:5px"
                                                      class="label label-sm label-danger">Skipped</span>

                                            <?php
                                            } ?>

                                        </div>

                                    </li>

                                </ul>
                                <!-- END START TASK LIST -->
                            </div>
                            <div class="slimScrollBar"
                                 style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 227.211428571429px; background: rgb(215, 220, 226);"></div>
                            <div class="slimScrollRail"
                                 style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(234, 234, 234);"></div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- END PORTLET -->
        </div>
    </div>
</div>
<!-- END PROFILE CONTENT -->
