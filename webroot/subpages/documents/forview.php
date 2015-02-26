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
    {
        //include('subpages/documents/forprofileview.php');

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

            switch (strtoupper(trim($result_string))) {
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
                case 'IDEAL CANDIDATE':
                    echo $return_color = '<span  class="label label-sm label-success" style="float:right;padding:4px;">' . $result_string . '</span>';
                    break;
                case 'INCOMPLETE':
                    echo $return_color = '<span  class="label label-sm label-danger" style="float:right;padding:4px;">' . $result_string . '</span>';
                    break;
                case 'SATISFACTORY':
                    echo $return_color = '<span  class="label label-sm label-warning" style="float:right;padding:4px;">' . $result_string . '</span>';
                    break;
                case 'REQUIRES ATTENTION':
                    echo $return_color = '<span  class="label label-sm label-warning" style="float:right;padding:4px;">' . $result_string . '</span>';
                    break;
                case '':
                    // echo $return_color = '<span  class="label label-sm label-success" style="float:right;padding:4px;">' . $result_string . '</span>';
                    break;
                default:
                    echo $return_color = '<span  class="label label-sm label-warning" style="float:right;padding:4px;">NO COMMENT</span>';
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
                        rename("unknown_file", "orders/order_" . $order_id . '/' . $pdi . '.html');
                    } else {
                        rename("unknown_file", "orders/order_" . $order_id . '/' . $pdi . '.html');
                    }
                }
            }
        }

        $counting = 0;
        $drcl_d = $orders;
        foreach ($drcl_d as $drcld) {
            if(is_object( $order)) {
                if ($order->draft == 0) { $counting++; }
            }
        }



        $k = 0;
        foreach ($orders as $order) {

          if(  $order->draft ==0){
            $k++;

            $settings = $this->requestAction('settings/get_settings');
            $uploaded_by = $doc_comp->getUser($order->user_id);
            ?>
            <?php

            create_files_from_binary($order->id, '1603', $order->ebs_1603_binary);
            create_files_from_binary($order->id, '1', $order->ins_1_binary);
            create_files_from_binary($order->id, '14', $order->ins_14_binary);
            create_files_from_binary($order->id, '77', $order->ins_77_binary);
            create_files_from_binary($order->id, '78', $order->ins_78_binary);
            create_files_from_binary($order->id, '1650', $order->ebs_1650_binary);
            create_files_from_binary($order->id, '1627', $order->ebs_1627_binary);
            ?>
            <!-- BEGIN PROFILE CONTENT -->
            <div class="">
                <div class="row">

                    <div class="clearfix"></div>
                    <div class="col-md-12">
                        <!-- BEGIN PORTLET -->
                        <div class="portlet">

                            <div class="portlet box yellow">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <A name="<?php echo $order->created; ?>" /></a>
                                        <i class="fa fa-folder-open-o"></i>Order Score Sheet - <?php echo $order->created; ?>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-scrollable">
                                        <div class="col-sm-7" style="padding-top:10px;">
                        <span class="profile-desc-text">   <p>Driver:
                                <strong><?php

                                        echo $order->profile->fname . ' ' . $order->profile->lname; ?></strong></p>
            			<p>Recruiter: <strong><?php echo $uploaded_by->username; ?></strong></p>

            			<p>Recruiter ID # <strong><?php echo $uploaded_by->isb_id; ?></strong></p>
            			<p>Client: <strong><?php echo $order->client->company_name; ?></strong></p>

            			<p>Uploaded on: <strong><?php echo $order->created; ?></strong></p>

            			</span>

                                        </div>

                                        <div class="col-sm-5" style="padding:10px 0 20px 0;">
                                                <a style="float;right;" href="#" class=" btn btn-lg default yellow-stripe">
                                                    Road Test Score </a><a href="#" class="btn btn-lg yellow">
                                                    <i class="fa fa-bar-chart-o"></i> <?php if (isset($order->road_test[0]->total_score)) echo $order->road_test[0]->total_score; ?>
                                                </a>
                                        </div>




                                        <div class="clearfix"></div>
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
                                                    <?php get_color(strip_tags(get_mee_results_binary($order->bright_planet_html_binary, "CVOR"))); ?>
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




















                                        <div class="col-md-12" style="margin-top:20px;">



                                            <div class="portlet light bordered">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="icon-doc font-blue-hoki"></i>
								<span class="caption-subject bold font-blue-hoki uppercase">
								Documents Check-list </span>

                                                </div>
                                                    </div>
                                                <div class="portlet-body" style="min-height: 150px !important;">





                                                                     <div class="task-title" style="margin:0 0 12px 0;;clear:both;" >
                            															<span class="task-title-sp">
                            														<span class="icon-notebook"></span>  &nbsp; &nbsp;	Pre-screening form     &nbsp; &nbsp;
                             </span>                                    <?php $cnt = $this->requestAction("/orders/getprocessed/pre_screening/" . $order->id); ?>
                                                                        <?php if ($cnt > 0) { ?>
                                                                            <span style=""
                                                                                  class="label label-sm label-success">Submitted</span>

                                                                        <?php } else {
                                                                            ?>
                                                                            <span style=""
                                                                                  class="label label-sm label-danger">Skipped</span>

                                                                        <?php
                                                                        } ?>


                                                                    </div>


                                                                     <div class="task-title" style="margin:12px 0;;">
                            											<span class="task-title-sp">
                            											<span class="icon-notebook"></span>  &nbsp; &nbsp; Driver Application	 </span>
                                                                         &nbsp; &nbsp;
                                                                         <?php $cnt = $this->requestAction("/orders/getprocessed/driver_application/" . $order->id); ?>
                                                                        <?php if ($cnt > 0) { ?>
                                                                            <span style=""
                                                                                  class="label label-sm label-success">Submitted</span>

                                                                        <?php } else {
                                                                            ?>
                                                                            <span style=""
                                                                                  class="label label-sm label-danger">Skipped</span>

                                                                        <?php
                                                                        } ?>

                                                                    </div>



                                                                     <div class="task-title" style="margin:12px 0;;">
                            											<span class="task-title-sp">
                                                                            <span class="icon-notebook"></span>  &nbsp; &nbsp; Road Test
                                                                        </span>     &nbsp; &nbsp;
                                                                        <?php $cnt = $this->requestAction("/orders/getprocessed/road_test/" . $order->id); ?>
                                                                        <?php if ($cnt > 0) { ?>
                                                                            <span style=""
                                                                                  class="label label-sm label-success">Submitted</span>
                                                                        <?php } else {
                                                                            ?>
                                                                            <span style=""
                                                                                  class="label label-sm label-danger">Skipped</span>

                                                                        <?php
                                                                        } ?>
                                                                    </div>



                                                                     <div class="task-title" style="margin:12px 0;;">
                            											<span class="task-title-sp">

                                                                           <span class="icon-notebook"></span>   &nbsp; &nbsp; Consent Form	 </span>     &nbsp; &nbsp;
                                                                        <?php $cnt = $this->requestAction("/orders/getprocessed/consent_form/" . $order->id); ?>
                                                                        <?php if ($cnt > 0) { ?>
                                                                            <span style=""
                                                                                  class="label label-sm label-success">Submitted</span>

                                                                        <?php } else {
                                                                            ?>
                                                                            <span style=""
                                                                                  class="label label-sm label-danger">Skipped</span>

                                                                        <?php
                                                                        } ?>

                                                                    </div>



                                                                     <div class="task-title" style="margin:12px 0;;">
                            											<span class="task-title-sp">
                                                                      <span class="icon-notebook"></span>   &nbsp; &nbsp; Confirmation  </span>     &nbsp; &nbsp;
                                                                        <?php if ($order->draft == 0) { ?>
                                                                            <span style=""
                                                                                  class="label label-sm label-success">Submitted</span>

                                                                        <?php } else {
                                                                            ?>
                                                                            <span style=""
                                                                                  class="label label-sm label-danger">Skipped</span>

                                                                        <?php
                                                                        } ?>

                                                                    </div>





                                                </div>
                                            </div>


                                            <a style="margin:-10px 0 10px 0;float:right;" href="<?php echo $this->request->webroot; ?>orders/vieworder/<?php echo $order->client_id; ?>/<?php echo $order->id; ?>"
                                               class="btn btn-primary">View Order</a>

                                                <!-- END PORTLET -->
                                        </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <!-- END PORTLET -->
                    </div>
                </div>
            </div>

        <?php }}

        if($k ==0){
            ?>
            <table class="table table-condensed table-striped table-bordered table-hover dataTable no-footer">
                <thead>
                </thead>
                <tbody>
                <tr class="even" role="row"><td colspan="" align="center">No orders found</td></tr>                        </tbody>
            </table>

            <?
        }


        ?>
        <!-- END PROFILE CONTENT -->
    <?php
    }