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


<?php
    $getProfileType = $this->requestAction('profiles/getProfileType/' . $this->Session->read('Profile.id'));
    $settings = $this->requestAction('settings/get_settings');
    $sidebar = $this->requestAction("settings/all_settings/" . $this->request->session()->read('Profile.id') . "/sidebar");

function hasget($name){
    if (isset($_GET[$name])) {return strlen($_GET[$name])>0;}
    return false;
}
?>
<h3 class="page-title">
    <?php echo ucfirst($settings->profile); ?>s
</h3>

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?php echo $this->request->webroot; ?>">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href=""><?php echo ucfirst($settings->profile); ?>s</a>
        </li>
    </ul>
    <a href="javascript:window.print();" class="floatright btn btn-info">Print</a>
</div>

<div class="row">


    <div class="col-md-12">


        <div class="portlet box green-haze">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>
                    List <?php echo ucfirst($settings->profile); ?>s
                </div>
            </div>


            <div class="portlet-body form">


                <div class="form-actions top chat-form" style="margin-top:0;margin-bottom:0;">
                    <div class="btn-set pull-left">

                    </div>
                    <div class="btn-set pull-right">


                        <form action="<?php echo $this->request->webroot; ?>profiles/index" method="get">
                            <?php if (isset($_GET['draft'])) { ?><input type="hidden" name="draft"/><?php } ?>


                            <select class="form-control input-inline" style="" name="filter_profile_type">
                                <option value=""><?php echo ucfirst($settings->profile); ?> Type</option>

                                <?php
                                    $isISB = (isset($sidebar) && $sidebar->client_option == 0);
                                    if ($isISB) {
                                        ?>

                                        <option value="1" <?php if (isset($return_profile_type) && $return_profile_type == 1) { ?> selected="selected"<?php } ?> >
                                            Admin
                                        </option>
                                        <option value="2" <?php if (isset($return_profile_type) && $return_profile_type == 2) { ?> selected="selected"<?php } ?>>
                                            Recruiter
                                        </option>
                                        <option value="3" <?php if (isset($return_profile_type) && $return_profile_type == 3) { ?> selected="selected"<?php } ?>>
                                            External
                                        </option>
                                        <option value="4" <?php if (isset($return_profile_type) && $return_profile_type == 4) { ?> selected="selected"<?php } ?>>
                                            Safety
                                        </option>
                                        <option value="5" <?php if (isset($return_profile_type) && $return_profile_type == 5) { ?> selected="selected"<?php } ?>>
                                            Driver
                                        </option>
                                        <option value="6" <?php if (isset($return_profile_type) && $return_profile_type == 6) { ?> selected="selected"<?php } ?>>
                                            Contact
                                        </option>

                                    <?php } else { ?>
                                        <option value="9" <?php if (isset($return_profile_type) && $return_profile_type == 9) { ?> selected="selected"<?php } ?> >
                                            Employee
                                        </option>
                                        <option value="10" <?php if (isset($return_profile_type) && $return_profile_type == 10) { ?> selected="selected"<?php } ?> >
                                            Guest
                                        </option>
                                        <option value="11" <?php if (isset($return_profile_type) && $return_profile_type == 11) { ?> selected="selected"<?php } ?> >
                                            Partner
                                        </option>
                                    <?php } ?>

                            </select>

                            <?php
                                $super = $this->request->session()->read('Profile.super');
                                if (isset($super)) {
                                    $getClient = $this->requestAction('profiles/getClient');
                                    ?>
                                    <select class="form-control showprodivision input-inline" style="" name="filter_by_client">
                                        <option value=""><?php echo ucfirst($settings->client); ?></option>
                                        <?php
                                            if ($getClient) {
                                                foreach ($getClient as $g) {
                                                    ?>
                                                    <option value="<?php echo $g->id; ?>" <?php if (isset($return_client) && $return_client == $g->id) { ?> selected="selected"<?php } ?> ><?php echo $g->company_name; ?></option>
                                                <?php
                                                }
                                            }
                                        ?>
                                    </select>


                                    <div class="prodivisions input-inline">
                                        <!-- Divisions section -->
                                    </div>


                                <?php } ?>

                            <input class="form-control input-inline" type="search" name="searchprofile"
                                   placeholder=" Search for <?php echo ucfirst($settings->profile); ?>"
                                   value="<?php if (isset($search_text)) echo $search_text; ?>"
                                   aria-controls="sample_1"/>
                            <button type="submit" class="btn btn-primary input-inline">Search</button>
                        </form>
                    </div>
                </div>

                <div class="form-body">
                    <div class="table-scrollable">

                        <table class="table table-condensed  table-striped table-bordered table-hover dataTable no-footer">
                            <thead>
                            <tr class="sorting">
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th style="width:7px;"><?= $this->Paginator->sort('image', 'Image') ?></th>
                                <th><?= $this->Paginator->sort('username', 'Username') ?></th>
                                <th><?= $this->Paginator->sort('profile_type', ucfirst($settings->profile) . ' Type') ?></th>
                                <!--th><?= $this->Paginator->sort('email') ?></th-->

                                <th><?= $this->Paginator->sort('fname', 'First Name') ?></th>
                                <th><?= $this->Paginator->sort('lname', 'Last Name') ?></th>
                                <th>Assigned to <?=$settings->clients;?></th>

                                <!--<th class="actions"><?//=__('Actions')  ?></th> -->
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $row_color_class = "odd";

                                $isISB = (isset($sidebar) && $sidebar->client_option == 0);
                                $profiletype = ['', 'Admin', 'Recruiter', 'External', 'Safety', 'Driver', 'Contact', 'Owner Operator', 'Owner Driver', 'Employee', 'Guest', 'Partner'];


                                if (count($profiles) == 0) {
                                    echo '<TR><TD COLSPAN="8" ALIGN="CENTER">No ' . strtolower($settings->profile) . 's found';
                                    if (hasget('searchprofile')) { echo " matching '" . $_GET['searchprofile'] . "'"; }
                                    echo '</TD></TR>';
                                }

                                foreach ($profiles as $profile):
                                    if ($row_color_class == "even") {
                                        $row_color_class = "odd";
                                    } else {
                                        $row_color_class = "even";
                                    }
                                    ?>

                                    <tr class="<?= $row_color_class; ?>" role="row">
                                        <td><?= $this->Number->format($profile->id) ?></td>
                                        <td><?php
                                        if ($sidebar->profile_list == '1' && !isset($_GET["draft"])) {
                                            ?>
                                            <a href="<?php echo $this->request->webroot; ?>profiles/view/<?php echo $profile->id; ?>">
                                            <img style="width:40px;" src="<?php
                                            if($profile->image)
                                         {
                                            echo $this->request->webroot; ?>img/profile/<?php echo $profile->image;
                                         }
                                         else {
                                            echo $this->request->webroot; ?>img/profile/default.png;
                                           <?php } ?>" class="img-responsive" alt=""/>
                                             </a>
                                            <?php
                                            }
                                          ?>
                                           <!--

                                        <img src="<?php
                                        if($profile->image)
                                         {
                                            echo $this->request->webroot; ?>img/profile/<?php echo $profile->image;
                                         }
                                         else {
                                            echo $this->request->webroot; ?>img/profile/default.png;
                                           <?php  } ?>" class="img-responsive" alt="" style="height:80px width:60px;"/>


                                            -->


                                         </td>
                                        <td>
                                        <?php if ($sidebar->profile_list == '1' && !isset($_GET["draft"])) {
                                            ?>
                                            <a href="<?php echo $this->request->webroot; ?>profiles/view/<?php echo $profile->id; ?>"> <?php echo ucfirst(h($profile->username)); ?> </a>
                                            <?php
                                            }
                                            else
                                            echo ucfirst(h($profile->username));
                                             ?>
                                             <!--<td class="actions  util-btn-margin-bottom-5"> -->
                                            <br />
                                        <?php  if ($sidebar->profile_list == '1' && !isset($_GET["draft"])) {
                                                echo $this->Html->link(__('View'), ['action' => 'view', $profile->id], ['class' => 'btn btn-info btn-sm']);
                                            } ?>


                                            <?php
                                                $checker = $this->requestAction('settings/check_edit_permission/' . $this->request->session()->read('Profile.id') . '/' . $profile->id);
                                                if ($sidebar->profile_edit == '1') {

                                                    if ($checker == 1) {
                                                        if($this->request->session()->read('Profile.profile_type') == '2'){
                                                        if($profile->profile_type == '5')    
                                                        echo $this->Html->link(__('Edit'), ['action' => 'edit', $profile->id], ['class' => 'btn btn-primary btn-sm']);
                                                        }
                                                        else
                                                        echo $this->Html->link(__('Edit'), ['action' => 'edit', $profile->id], ['class' => 'btn btn-primary btn-sm']);
                                                    }
                                                } ?>
                                            <?php if ($sidebar->profile_delete == '1') {
                                                if ($this->request->session()->read('Profile.super') == '1') {
                                                    if ($this->request->session()->read('Profile.id') != $profile->id) {
                                                        ?>

                                                        <a href="<?php echo $this->request->webroot; ?>profiles/delete/<?php echo $profile->id;?><?php echo (isset($_GET['draft']))?"?draft":""; ?>"
                                                           onclick="return confirm('Are you sure you want to delete <?= ucfirst(h($profile->username)) ?>?');"
                                                           class="btn btn-danger btn-sm">Delete</a>
                                                        </span>
                                                    <?php
                                                    }
                                                } else if ($this->request->session()->read('Profile.profile_type') == '2' && ($profile->profile_type == '5')) {
                                                    ?>
                                                    <a href="<?php echo $this->request->webroot; ?>profiles/delete/<?php echo $profile->id;?><?php echo (isset($_GET['draft']))?"?draft":""; ?>"
                                                       onclick="return confirm('Are you sure you want to delete <?= ucfirst(h($profile->username)) ?>?');"
                                                       class="btn btn-danger btn-sm">Delete</a>
                                                <?php
                                                }

                                            }
                                            ?>
                                            <?php
                                              /*  if ($profile->profile_type == 5) {

                                                   // <a href="<?php echo $this->request->webroot; !>orders/productSelection?driver=<?php echo $profile->id; !>"
                                                   //    class="btn btn-success">Create Order</a>
?>

                                                    <a href="<?php echo $this->request->webroot; ?>orders/productSelection?driver=<?php echo $profile->id; ?>&ordertype=MEE" class="btn red-flamingo">Place Order</a>
                                                    <a href="<?php echo $this->request->webroot; ?>orders/productSelection?driver=<?php echo $profile->id; ?>&ordertype=CART" class="btn btn-info">A La Carte/Re-qualify</a>

                                                  <!--  <a href="<?php echo $this->request->webroot; ?>profiles/viewReport/<?php echo $profile->id; ?>"
                                                       class="btn btn-primary">Score Card</a> -->
                                                <?php
                                                } */
                                            ?>


                                        <!--</td> -->
                                        </td>
                                        <td><?php
                                                if (strlen($profile->profile_type) > 0) {
                                                    echo h($profiletype[$profile->profile_type]);
                                                    if ($profile->profile_type == 5) {//is a driver
                                                        $expires = strtotime($profile->expiry_date);
                                                        if ($expires){
                                                            if ($expires < time()) {
                                                                echo '<span class="clearfix " style="color:#a94442">License Expired</span>';
                                                            }
                                                        }
                                                    }
                                                } else {
                                                    echo "Draft";
                                                }
                                            ?></td>

                                        <!--td><?= h($profile->email) ?></td-->


                                        <td><?= h($profile->fname) ?></td>
                                        <td><?= h($profile->lname) ?></td>
                                        <td><?php echo $ProClients->getAllClientsname($profile->id);?></td>

                                       <!-- <td class="actions  util-btn-margin-bottom-5">

                                        <?php /* if ($sidebar->profile_list == '1' && !isset($_GET["draft"])) {
                                                echo $this->Html->link(__('View'), ['action' => 'view', $profile->id], ['class' => 'btn btn-info']);
                                            } ?>


                                            <?php
                                                $checker = $this->requestAction('settings/check_edit_permission/' . $this->request->session()->read('Profile.id') . '/' . $profile->id);
                                                if ($sidebar->profile_edit == '1') {

                                                    if ($checker == 1) {
                                                        if($this->request->session()->read('Profile.profile_type') == '2'){
                                                        if($profile->profile_type == '5')    
                                                        echo $this->Html->link(__('Edit'), ['action' => 'edit', $profile->id], ['class' => 'btn btn-primary']);
                                                        }
                                                        else
                                                        echo $this->Html->link(__('Edit'), ['action' => 'edit', $profile->id], ['class' => 'btn btn-primary']);
                                                    }
                                                } ?>
                                            <?php if ($sidebar->profile_delete == '1') {
                                                if ($this->request->session()->read('Profile.super') == '1') {
                                                    if ($this->request->session()->read('Profile.id') != $profile->id) {
                                                        ?>

                                                        <a href="<?php echo $this->request->webroot; ?>profiles/delete/<?php echo $profile->id;?><?php echo (isset($_GET['draft']))?"?draft":""; ?>"
                                                           onclick="return confirm('Are you sure you want to delete <?= ucfirst(h($profile->username)) ?>?');"
                                                           class="btn btn-danger">Delete</a>
                                                        </span>
                                                    <?php
                                                    }
                                                } else if ($this->request->session()->read('Profile.profile_type') == '2' && ($profile->profile_type == '5')) {
                                                    ?>
                                                    <a href="<?php echo $this->request->webroot; ?>profiles/delete/<?php echo $profile->id;?><?php echo (isset($_GET['draft']))?"?draft":""; ?>"
                                                       onclick="return confirm('Are you sure you want to delete <?= ucfirst(h($profile->username)) ?>?');"
                                                       class="btn btn-danger">Delete</a>
                                                <?php
                                                }

                                            } */
                                            ?>
                                            <?php
                                              /*  if ($profile->profile_type == 5) {

                                                   // <a href="<?php echo $this->request->webroot; !>orders/productSelection?driver=<?php echo $profile->id; !>"
                                                   //    class="btn btn-success">Create Order</a>
?>

                                                    <a href="<?php echo $this->request->webroot; ?>orders/productSelection?driver=<?php echo $profile->id; ?>&ordertype=MEE" class="btn red-flamingo">Place Order</a>
                                                    <a href="<?php echo $this->request->webroot; ?>orders/productSelection?driver=<?php echo $profile->id; ?>&ordertype=CART" class="btn btn-info">A La Carte/Re-qualify</a>

                                                  <!--  <a href="<?php echo $this->request->webroot; ?>profiles/viewReport/<?php echo $profile->id; ?>"
                                                       class="btn btn-primary">Score Card</a> -->
                                                <?php
                                                } */
                                            ?>


                                        </td> -->

                                    </tr>

                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="form-actions" style="height:75px;">
                    <div class="row">
                        <div class="col-md-12" align="right">
                            <div id="sample_2_paginate" class="dataTables_paginate paging_simple_numbers" align="right"
                                 style="margin-top:-10px;">
                                <ul class="pagination sorting">
                                    <?= $this->Paginator->prev('< ' . __('previous')); ?>
                                    <?= $this->Paginator->numbers(); ?>
                                    <?= $this->Paginator->next(__('next') . ' >'); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div></div>
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

        $(function () {
            <?php if(isset($_GET['division'])&& $_GET['division']!=""){
                     //var_dump($_GET);
                     ?>
            var client_id = <?php if(isset($_GET['filter_by_client'])&& $_GET['filter_by_client']!="") echo $_GET['filter_by_client'];?>;
            var division_id = <?php echo $_GET['division'];?>;
            //alert(client_id+'__'+division_id);
            if (client_id != "") {
                $.ajax({
                    type: "post",
                    data: "client_id=" + client_id,
                    url: "<?php echo $this->request->webroot;?>clients/getdivisions/" + division_id,
                    success: function (msg) {
                        //alert(msg);
                        $('.prodivisions').html(msg);
                    }
                });
            }
            <?php
            }
            //if(isset($_GET['division'])&& $_GET['division']!="")
            ?>

            $('.showprodivision').change(function () {
                var client_id = $(this).val();
                if (client_id != "") {
                    $.ajax({
                        type: "post",
                        data: "client_id=" + client_id,
                        url: "<?php echo $this->request->webroot;?>clients/getdivisions",
                        success: function (msg) {
                            $('.prodivisions').html(msg);
                        }
                    });
                }
            });
            var client_id = $('.showprodivision').val();
            if (client_id != "") {
                $.ajax({
                    type: "post",
                    data: "client_id=" + client_id,
                    url: "<?php echo $this->request->webroot;?>clients/getdivisions",
                    success: function (msg) {
                        $('.prodivisions').html(msg);
                    }
                });
            }

        });
    </script>