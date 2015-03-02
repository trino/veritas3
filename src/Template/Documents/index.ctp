<?php $settings = $this->requestAction('settings/get_settings'); ?>
<?php $sidebar = $this->requestAction("settings/all_settings/" . $this->Session->read('Profile.id') . "/sidebar"); ?>
<h3 class="page-title">
    <?php echo ucfirst($settings->document); ?>s <?php if (isset($_GET['draft'])) { ?>(Draft)<?php } ?>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?php echo $this->request->webroot; ?>">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href=""><?php echo ucfirst($settings->document); ?>s</a>
        </li>
    </ul>

    <a href="javascript:window.print();" class="floatright btn btn-info">Print</a>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="portlet box yellow-casablanca ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-copy"></i>
                    List <?php echo ucfirst($settings->document); ?>s
                </div>
            </div>
            <div class="portlet-body form">

                <div class="form-actions top chat-form" style="margin-top:0;margin-bottom:0;" align="right">

                    <div class="btn-set pull-left">

                    </div>
                    <div class="btn-set pull-right">


                        <form action="<?php echo $this->request->webroot; ?>documents/index" method="get">
                            <?php if (isset($_GET['draft'])) { ?><input type="hidden" name="draft"/><?php } ?>






                            <?php
                                $type = $doc_comp->getDocType();
                            ?>

                            <select class="form-control input-inline" name="type">
                                <option value=""><?php echo ucfirst($settings->document); ?> type</option>
                                <?php
                                    foreach ($type as $t) {
                                        ?>
                                        <option
                                            value="<?php echo $t->title; ?>" <?php if (isset($return_type) && $return_type == $t->title) { ?> selected="selected"<?php } ?> ><?php echo ucfirst($t->title); ?></option>
                                    <?php
                                    }
                                ?>
                                <option
                                    value="orders" <?php if (isset($return_type) && $return_type == 'orders') { ?> selected="selected"<?php } ?>>
                                    Orders
                                </option>
                                <option
                                    value="feedbacks" <?php if (isset($return_type) && $return_type == 'feedbacks') { ?> selected="selected"<?php } ?>>
                                    Feedback
                                </option>
                            </select>






                            <?php
                                $users = $doc_comp->getAllUser();
                            ?>


                            <select class="form-control input-inline" name="submitted_by_id" style="">
                                <option value="">Submitted by</option>
                                <?php
                                    foreach ($users as $u) {
                                        ?>
                                        <option
                                            value="<?php echo $u->id; ?>" <?php if (isset($return_user_id) && $return_user_id == $u->id) { ?> selected="selected"<?php } ?> ><?php echo ucfirst($u->username); ?></option>
                                    <?php
                                    }
                                ?>
                            </select>





                            <?php
                                $clients = $doc_comp->getAllClient();
                            ?>



                            <select class="form-control showclientdivision  input-inline" name="client_id">
                                <option value=""><?php echo ucfirst($settings->client); ?></option>
                                <?php
                                    foreach ($clients as $c) {
                                        ?>
                                        <option
                                            value="<?php echo $c->id; ?>" <?php if (isset($return_client_id) && $return_client_id == $c->id) { ?> selected="selected"<?php } ?> ><?php echo ucfirst($c->company_name); ?></option>
                                    <?php
                                    }
                                ?>

                            </select>





                            <input class="form-control input-inline" name="searchdoc" type="search"
                                   placeholder=" Search <?php echo ucfirst($settings->document); ?>s"
                                   value="<?php if (isset($search_text)) echo $search_text; ?>"
                                   aria-controls="sample_1"/>





                            <button type="submit" class="btn btn-primary input-inline" id="search">Search</button>

                        </form>
                    </div>
                </div>


                <div class="clearfix"></div>

            <div class="form-body">
                <div class="table-scrollable">
                    <table class="table table-condensed table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                        <tr class="sorting">
                            <th><?= $this->Paginator->sort('id'); ?></th>
                            <th><?= $this->Paginator->sort('document_type', ucfirst($settings->document) . ' type'); ?></th>
                            <th><?= $this->Paginator->sort('user_id', 'Submitted by'); ?><?php if (isset($end)) echo $end;
                                    if (isset($start)) echo "//" . $start; ?></th>
                            <th><?= $this->Paginator->sort('uploaded_for', 'Driver'); ?><?php if (isset($end)) echo $end;
                                    if (isset($start)) echo "//" . $start; ?></th>
                            <th><?= $this->Paginator->sort('created', 'Date'); ?></th>
                            <th><?= $this->Paginator->sort('client_id', ucfirst($settings->client)); ?></th>
                            <th class="actions"><?= __('Actions') ?></th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $row_color_class = "odd";
                            $subdoc = $this->requestAction('/profiles/getSub');
                            $docz = [''];
                            foreach ($subdoc as $d) {
                                array_push($docz, $d->title);
                            }
                            //var_dump($docz);
                            if (count($documents) == 0) {
                                echo '<TR><TD COLSPAN="6" ALIGN="CENTER">No ' . strtolower($settings->document) . 's found';
                                if (isset($_GET['searchdoc'])) {
                                    echo " matching '" . $_GET['searchdoc'] . "'";
                                }
                                echo '</TD></TR>';
                            }

                            foreach ($documents as $docs):

                                if ($docs->document_type == 'feedbacks' && !$this->request->session()->read('Profile.super'))
                                    continue;


                                if ($row_color_class == "even") {
                                    $row_color_class = "odd";
                                } else {
                                    $row_color_class = "even";
                                }
                                $uploaded_by = $doc_comp->getUser($docs->user_id);
                                $uploaded_for = $doc_comp->getUser($docs->uploaded_for);
                                $getClientById = $doc_comp->getClientById($docs->client_id);
                                ?>
                                <tr class="<?= $row_color_class; ?>" role="row">
                                    <td><?= $this->Number->format($docs->id) ?></td>
                                    <td style="width: 140px;">
                                        <?php switch(1){//change the number to pick a style
                                            case 0://plain text
                                                    echo h($docs->document_type);
                                                break;
                                            case 1://top block
                                                echo '<div class="dashboard-stat ';
                                                $colors = array("pre-screening" => "blue-madison", "survey" => "green", "driver application" => "red", "road test" => "yellow", "consent form" => "purple", "feedback" => "red-intense", "attachment" => "yellow-saffron", "audits" => "grey-cascade");
                                                if (isset($colors[strtolower($docs->document_type)])){
                                                    echo $colors[strtolower($docs->document_type)];
                                                } else {
                                                    echo "blue";
                                                }
                                                ?>">
                                                <div class="whiteCorner"></div>
                                                <div class="visual" style="height: 40px;">
                                                    <i class="fa fa-copy"></i>
                                                </div>
                                                <!--div class="details"> //WARNING: This won't work while in a table...
                                                    <div class="number"></div>
                                                    <div class="desc"></div>
                                                </div-->
                                                <a class="more" id="sub_doc_click1" href="<?php if ($sidebar->document_list == '1' && !isset($_GET["draft"])) {
                                             if(!$docs->order_id)       
                                            echo $this->request->webroot.'documents/view/'.$docs->client_id.'/'.$docs->id;
                                            else
                                            echo $this->request->webroot.'documents/view/'.$docs->client_id.'/'.$docs->id.'?order_id='.$docs->order_id;
                                        }else{?>javascript:;<?php } ?>">
                                                    <?= h($docs->document_type); //it won't let me put it in the desc ?>
                                                </a>
                                                </div>

                                        <?php break;
                                            case 2: //tile, doesn't work. CSS not included? ?>

                                                <a href="/veritas3/orders/productSelection?driver=0&amp;ordertype=MEE" class="tile bg-yellow" style="display: block; height: 100px; ">
                                                    <div class="tile-body">
                                                        <i class="icon-docs"></i>
                                                    </div>
                                                    <div class="tile-object">
                                                        <div class="name">Order MEE</div>
                                                        <div class="number"></div>
                                                    </div>
                                                </a>

                                            <?php break; } ?>
                                    </td>
                                    <td><?php

                                            if (isset($uploaded_by->username)) {
                                                $user = ucfirst(h($uploaded_by->username));
                                            } else {
                                                $user = "None";
                                            }

                                            echo $user;
                                            $docname = h($docs->document_type) . " uploaded by " . $user . " at " . h($docs->created);

                                        ?></td>
                                    <td><?php

                                            if (isset($uploaded_for->username)) {
                                                $user = ucfirst(h($uploaded_for->username));
                                            } else {
                                                $user = "None";
                                            }

                                            echo $user;
                                            $docname = h($docs->document_type) . " uploaded by " . $user . " at " . h($docs->created);

                                        ?></td>
                                    <td><?= h($docs->created) ?></td>
                                    <td>
                                        <?php
                                            if (is_object($getClientById)) {
                                                echo ucfirst(h($getClientById->company_name));
                                            } else {
                                                echo "Deleted " . $settings->client;
                                            }
                                        ?>

                                    </td>
                                    <td class="actions  util-btn-margin-bottom-5 ">

                                        <?php if ($sidebar->document_list == '1' && !isset($_GET["draft"])) {
                                            if(!$docs->order_id)
                                            echo $this->Html->link(__('View'), ['action' => 'view', $docs->client_id, $docs->id], ['class' => 'btn btn-info']);
                                            else{
                                            ?>
                                            <a class="btn btn-info" href="<?php echo $this->request->webroot;?>documents/view/<?php echo $docs->client_id;?>/<?php echo $docs->id?>?order_id=<?php echo $docs->order_id;?>">View</a>
                                            <?php
                                        }} ?>
                                        <?php
                                            if ($sidebar->document_edit == '1') { 
                                                if ($docs->document_type == 'feedbacks')
                                                    echo $this->Html->link(__('Edit'), ['controller' => 'feedbacks', 'action' => 'edit', $docs->id], ['class' => 'btn btn-primary']);                                                
                                                else{
                                                if(!$docs->order_id)
                                                    echo $this->Html->link(__('Edit'), ['action' => 'add', $docs->client_id, $docs->id], ['class' => 'btn btn-primary']);
                                                else
                                                    {
                                                        ?>
                                                        <a class="btn btn-primary" href="<?php echo $this->request->webroot;?>documents/add/<?php echo $docs->client_id;?>/<?php echo $docs->id?>?order_id=<?php echo $docs->order_id;?>">Edit</a>
                                                        <?php
                                                    }
                                                    }
                                            }
                                        ?>
                                        <?php if ($sidebar->document_delete == '1' && $docs->order_id == 0) {
                                            if (isset($_GET['draft'])) {
                                                ?>
                                                <a href="<?php echo $this->request->webroot; ?>documents/delete/<?php echo $docs->id; ?>/draft"
                                                   onclick="return confirm('Are you sure you want to delete <?= $docname; ?>?');"
                                                   class="btn btn-danger">Delete</a>

                                            <?php
                                            } else {
                                                ?>
                                                <a href="<?php echo $this->request->webroot; ?>documents/delete/<?php echo $docs->id; ?>"
                                                   onclick="return confirm('Are you sure you want to delete <?= $docname; ?>?');"
                                                   class="btn btn-danger">Delete</a>
                                            <?php
                                            }
                                        }
                                        else
                                        {
                                            if($docs->order_id != 0)
                                            {
                                                ?>
                                                <strong>(Order - <?php echo $docs->order_id;?>)</strong>
                                                <?php
                                            }
                                        }

                                        ?>

                                    </td>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>

                <div class="form-actions" style="height:75px;">
                    <div class="row">
                        <div class="col-md-12" align="right">


                            <div id="sample_2_paginate" class="dataTables_paginate paging_simple_numbers" style="margin-top:-10px;">

                    <ul class="pagination sorting">
                        <?= $this->Paginator->prev('< ' . __('previous')); ?>
                        <?= $this->Paginator->numbers(); ?>
                        <?= $this->Paginator->next(__('next') . ' >'); ?>
                    </ul>
                </div>
                        </div></div></div>

            </div>
        </div>
    </div>
</div>
<style>
    @media print {
        .page-header {
            display: none;
        }

        .page-footer, .chat-form, .nav-tabs, .page-title, .page-bar, .theme-panel, .page-sidebar-wrapper, .more {
            display: none !important;
        }

        .portlet-body, .portlet-title {
            border-top: 1px solid #578EBE;
        }

        .tabbable-line {
            border: none !important;
        }

        a:link:after,
        a:visited:after {
            content: "" !important;
        }

        .actions {
            display: none
        }

        .paging_simple_numbers {
            display: none;
        }
    }

</style>
<script>
    $(function () {
        $('.sorting').find('a').each(function () {

            <?php if(isset($_GET['draft'])){?>
            var hrf = $(this).attr('href');
            if (hrf != "")
                $(this).attr('href', hrf + '&draft');
            <?php } ?>
        });
    })
</script>
<script>
    $('.applyBtn').live('click', function () {
        var to = $('.daterangepicker_end_input .input-mini').val();
        var from = $('.daterangepicker_start_input .input-mini').val();
        var url = '<?php echo $this->request->webroot; ?>documents/index';
        var base = url;

        <?php
        if(isset($_GET['searchdoc']))
        {
        ?>
        if (url == base)
            url = url + '?searchdoc=<?php echo $_GET['searchdoc']?>';
        else
            url = url + '&searchdoc=<?php echo $_GET['searchdoc']?>';
        <?php
        }
        ?>
        <?php
        if(isset($_GET['submitted_by_id']))
        {
        ?>
        if (url == base)
            url = url + '?submitted_by_id=<?php echo $_GET['submitted_by_id']?>';
        else
            url = url + '&submitted_by_id=<?php echo $_GET['submitted_by_id']?>';
        <?php
        }
        ?>
        <?php
        if(isset($_GET['type']))
        {
        ?>
        if (url == base)
            url = url + '?type=<?php echo $_GET['type']?>';
        else
            url = url + '&type=<?php echo $_GET['type']?>';
        <?php
        }
        ?>
        <?php
        if(isset($_GET['client_id']))
        {
        ?>
        if (url == base)
            url = url + '?client_id=<?php echo $_GET['client_id']?>';
        else
            url = url + '&client_id=<?php echo $_GET['client_id']?>';
        <?php
        }
        ?>
        if (url == base) {
            url = url + '?to=' + to + '&from=' + from;
        }
        else
            url = url + '&to=' + to + '&from=' + from;
        window.location = url;
    });

    <?php if(isset($_GET['division'])&& $_GET['division']!=""){
    //var_dump($_GET);
    ?>
    var client_id = <?php echo $_GET['client_id'];?>;
    var division_id = <?php echo $_GET['division'];?>;
    //alert(client_id+'__'+division_id);
    if (client_id != "") {
        $.ajax({
            type: "post",
            data: "client_id=" + client_id,
            url: "<?php echo $this->request->webroot;?>clients/getdivisions/" + division_id,
            success: function (msg) {
//alert(msg);
                $('.clientdivision').html(msg);
            }
        });
    }
    <?php
    }?>
    $('.showclientdivision').change(function () {
        var client_id = $(this).val();
        if (client_id != "") {
            $.ajax({
                type: "post",
                data: "client_id=" + client_id,
                url: "<?php echo $this->request->webroot;?>clients/getdivisions",
                success: function (msg) {
                    $('.clientdivision').html(msg);
                }
            });
        }
    });
    var client_id = $('.showclientdivision').val();
    if (client_id != "") {
        $.ajax({
            type: "post",
            data: "client_id=" + client_id,
            url: "<?php echo $this->request->webroot;?>clients/getdivisions",
            success: function (msg) {
                $('.clientdivision').html(msg);
            }
        });
    }
</script>
