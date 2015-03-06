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
        function PrintLine($lineclass, $name, $cnt, $bypass = false){
                  if($cnt>0 || $bypass) {
                      echo '<tr class="' . $lineclass . '" role="row"><td><span class="icon-notebook"></span></td>';
                      echo '<td>' . $name . '</td>';
                      echo '<td class="actions">';
                      if ($cnt > 0) {
                          echo '<span style="" class="label label-sm label-success">Submitted</span>';
                      } else { //should not occur
                          echo '<span style="" class="label label-sm label-danger">Skipped</span>';
                      }
                      echo "</TD></TR>";
                      if ($lineclass == "even") { $lineclass = "odd";} else { $lineclass = "even"; }
                  }
                  return $lineclass;
              }

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
            if(isset($order)){
            if(is_object( $order)) {
                if ($order->draft == 0) { $counting++; }
            }}
        }



        $k = 0;
        foreach ($orders as $order) {
          $forms = $order->forms;
          if(!$forms)
          {
            $forms_arr[0] = 1;
            $forms_arr[1] = 1;
            $forms_arr[2] = 1;
            $forms_arr[3] = 1;
            $forms_arr[4] = 1;
            $forms_arr[5] = 1;
            $forms_arr[6] = 1;
            $forms_arr[7] = 1;
          }
          else
          {
            $forms_arr = explode(',',$forms);

          }
          $p = $forms_arr;

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
                                        <A name="<?php echo $order->created; ?>" /></A>
                                        <i class="fa fa-folder-open-o"></i>Order Score Sheet - <?php echo $order->created; ?>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div oldclass="table-scrollable">

                                        <div class="col-sm-6" style="padding-top:10px;" oldstyle="border: 1px solid #E5E5E5;">
                        <span class="profile-desc-text">   <p>Driver:
                                <strong><?php

                                        echo $order->profile->fname . ' ' . $order->profile->lname; ?></strong></p>
            			<p>Recruiter: <strong><?php echo $uploaded_by->username; ?></strong></p>

            			<p>Recruiter ID # <strong><?php echo $uploaded_by->isb_id; ?></strong></p>
            			<p>Client: <strong><?php echo $order->client->company_name; ?></strong></p>

            			<p>Uploaded on: <strong><?php echo $order->created; ?></strong></p>

            			</span>

                                        </div>

                                        <div class="col-sm-6" style="paddng-left: 0; padding-right: 0;">
                                                <TABLE align="right" style="float;right;"><TR><TD>
                                               <SPAN style="white-space:nowrap"><a style="float;right;" href="#" class=" btn btn-lg default yellow-stripe">
                                                    Road Test Score </a><a href="#" class="btn btn-lg yellow">
                                                    <i class="fa fa-bar-chart-o"></i> <?php if (isset($order->road_test[0]->total_score)) echo $order->road_test[0]->total_score; ?>
                                                </a></SPAN></TD></TR><TR><TD>
                                            <a style="margin:10px 0px 0px 0px;float:right;" href="<?php echo $this->request->webroot; ?>orders/vieworder/<?php echo $order->client_id; ?>/<?php echo $order->id; ?>"
                                               class="btn btn-primary">View Order</a>
                                                        </TD></TR></TABLE>
                                        </div>



<div class="clearfix"></div>
                                        <div class="col-md-12" style="margin-bottom: 8px;">
                                            <H4><i class="icon-doc font-blue-hoki"></i>
								<span class="caption-subject bold font-blue-hoki uppercase">
								Product Orders </span></H4>
                                        </div>


                                        <div class="clearfix"></div>
                                        <table class="table" style="margin-bottom: 0px;">
                                            <tbody>
                                            <?php
                                            if($p[0]){
                                                ?>

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
                                                            <a target="_blank" href="<? echo $this->request->webroot . return_link('1603', $order->id); ?>" class="btn btn-primary">Download</a>
                                                        <? } ?>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if($p[1]){
                                                ?>
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
                                                            <a target="_blank" href="<? echo $this->request->webroot . return_link('1', $order->id); ?>" class="btn btn-primary">Download</a>
                                                        <? } ?>

                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if($p[2]){
                                                ?>
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
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if($p[3]){
                                                ?>
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
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if($p[4]){
                                                ?>
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
                                             <?php
                                            }
                                            ?>
                                            <?php
                                            if($p[5]){
                                                ?>
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
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if($p[6]){
                                                ?>
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
                                            <?php
                                            }
                                            ?>

<TR><TD colspan="3">

                                                        <H4><i class="icon-doc font-blue-hoki"></i>
								<span class="caption-subject bold font-blue-hoki uppercase">
								Documents Check-list </span></H4>
                                        <div class="clearfix"></div>
    </TD></TR>



 <?php
 $line="even";
 $doc = $this->requestAction('/orders/getSubDocs');
 
            //var_dump($doc); die();
 if($doc)
 {
    foreach($doc as $d)
    {
        $title = ucfirst($d->title);
        $cnt = $this->requestAction("/orders/getprocessed/".$d->table_name."/". $order->id);
        $line = PrintLine($line,$title , $cnt);
    }
    
 }
 /*
$cnt = $this->requestAction("/orders/getprocessed/pre_screening/" . $order->id);
     $line = PrintLine($line, "Pre-Screening", $cnt);

$cnt = $this->requestAction("/orders/getprocessed/driver_application/" . $order->id);
    $line = PrintLine($line, "Driver Application", $cnt);

$cnt = $this->requestAction("/orders/getprocessed/road_test/" . $order->id);
    $line = PrintLine($line, "Road Test", $cnt);

$cnt = $this->requestAction("/orders/getprocessed/consent_form/" . $order->id);
    $line = PrintLine($line, "Consent Form", $cnt);
*/
    $line = PrintLine($line, "Confirmation", 1-$order->draft, true)

?><TR><TD colspan="3"> </TD></TR>
    </tbody>
</table>





                                                </div>
                                            </div>




                                                <!-- END PORTLET -->


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
                <tr class="even" role="row"><td colspan="3" align="center">
                        No orders found
                </td></tr>
            <?php if ($sidebar->orders_create == 1 && false) {
                echo '<TR class="odd" role="row">';
                if ($sidebar->orders_mee == 1) {
                    ?>
                    <TD align="center"><a
                            href="<?php echo $this->request->webroot; ?>orders/productSelection?driver=<?= $profile["id"]; ?>&ordertype=MEE">Order
                            Mee</a></td>
                <?php }
                if ($sidebar->orders_products == 1) { ?>
                    <TD align="center"><a
                            href="<?php echo $this->request->webroot; ?>orders/productSelection?driver=<?= $profile["id"]; ?>&ordertype=CART">Order
                            Products </a></TD>
                <?php }
                if ($sidebar->order_requalify == 1) { ?>
                    <TD align="center"><a
                            href="<?php echo $this->request->webroot; ?>orders/productSelection?driver=<?= $profile["id"]; ?>&ordertype=QUA">Re-Qualify </a>
                    </TD>
                <?php }
                echo "</tr>";
            } ?>
                </tbody>
            </table>

            <?
        }


        ?>
        <!-- END PROFILE CONTENT -->
    <?php
    }