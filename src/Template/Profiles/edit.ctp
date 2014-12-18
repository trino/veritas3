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

        .tabbable-line {
            border: none !important;
        }

    }

</style>
<?php
if (isset($disabled))
    $is_disabled = 'disabled="disabled"';
else
    $is_disabled = '';
?>
<?php $settings = $this->requestAction('settings/get_settings'); ?>
<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                Widget settings form goes here
            </div>
            <div class="modal-footer">
                <button type="button" class="btn blue">Save changes</button>
                <button type="button" class="btn default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<!-- BEGIN STYLE CUSTOMIZER -->
<div class="theme-panel hidden-xs hidden-sm">
    <div class="toggler">
    </div>
    <div class="toggler-close">
    </div>
    <div class="theme-options">
        <div class="theme-option theme-colors clearfix">
						<span>
						THEME COLOR </span>
            <ul>
                <li class="color-default <?php if ($settings->layout == 'default') echo "current"; ?> tooltips"
                    data-style="default" onclick="change_layout('default');" data-container="body"
                    data-original-title="Default">
                </li>
                <li class="color-darkblue tooltips <?php if ($settings->layout == 'darkblue') echo "current"; ?>"
                    data-style="darkblue" onclick="change_layout('darkblue');" data-container="body"
                    data-original-title="Dark Blue">
                </li>
                <li class="color-blue tooltips <?php if ($settings->layout == 'blue') echo "current"; ?>"
                    data-style="blue" onclick="change_layout('blue');" data-container="body" data-original-title="Blue">
                </li>
                <li class="color-grey tooltips <?php if ($settings->layout == 'grey') echo "current"; ?>"
                    data-style="grey" onclick="change_layout('grey');" data-container="body" data-original-title="Grey">
                </li>
                <li class="color-light tooltips <?php if ($settings->layout == 'light') echo "current"; ?>"
                    data-style="light" onclick="change_layout('light');" data-container="body"
                    data-original-title="Light">
                </li>
                <li class="color-light2 tooltips <?php if ($settings->layout == 'light2') echo "current"; ?>"
                    data-style="light2" onclick="change_layout('light2');" data-container="body" data-html="true"
                    data-original-title="Light 2">
                </li>
            </ul>
        </div>
        <div class="theme-option">
						<span>
						Theme Style </span>
            <select class="layout-style-option form-control input-sm">
                <option value="square" selected="selected">Square corners</option>
                <option value="rounded">Rounded corners</option>
            </select>
        </div>
        <div class="theme-option">
						<span>
						Layout </span>
            <select class="layout-option form-control input-sm" onchange="change_body();">
                <option value="fluid" selected="selected">Fluid</option>
                <option value="boxed">Boxed</option>
            </select>
        </div>
        <div class="theme-option">
						<span>
						Header </span>
            <select class="page-header-option form-control input-sm" onchange="change_body();">
                <option value="fixed" selected="selected">Fixed</option>
                <option value="default">Default</option>
            </select>
        </div>
        <div class="theme-option">
						<span>
						Top Menu Dropdown</span>
            <select class="page-header-top-dropdown-style-option form-control input-sm" onchange="change_body();">
                <option value="light" selected="selected">Light</option>
                <option value="dark">Dark</option>
            </select>
        </div>
        <div class="theme-option">
						<span>
						Sidebar Mode</span>
            <select class="sidebar-option form-control input-sm" onchange="change_body();">
                <option value="fixed">Fixed</option>
                <option value="default" selected="selected">Default</option>
            </select>
        </div>
        <div class="theme-option">
						<span>
						Sidebar Menu </span>
            <select class="sidebar-menu-option form-control input-sm" onchange="change_body();">
                <option value="accordion" selected="selected">Accordion</option>
                <option value="hover">Hover</option>
            </select>
        </div>
        <div class="theme-option">
						<span>
						Sidebar Style </span>
            <select class="sidebar-style-option form-control input-sm" onchange="change_body();">
                <option value="default" selected="selected">Default</option>
                <option value="light">Light</option>
            </select>
        </div>
        <div class="theme-option">
						<span>
						Sidebar Position </span>
            <select class="sidebar-pos-option form-control input-sm" onchange="change_body();">
                <option value="left" selected="selected">Left</option>
                <option value="right">Right</option>
            </select>
        </div>
        <div class="theme-option">
						<span>
						Footer </span>
            <select class="page-footer-option form-control input-sm" onchange="change_body();">
                <option value="fixed">Fixed</option>
                <option value="default" selected="selected">Default</option>
            </select>
        </div>
    </div>
</div>
<div class="clearfix"></div>

<!-- END STYLE CUSTOMIZER -->
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    <?php echo ucfirst($settings->profile); ?> Manager
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?php echo $this->request->webroot; ?>">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href=""><?php echo ucfirst($settings->profile); ?></a>
        </li>
    </ul>
    <?php
    if (isset($disabled)) { ?>
        <a href="javascript:window.print();" class="floatright btn btn-info">Print</a>
    <?php } ?>

</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row margin-top-20">
    <div class="col-md-12">
        <!-- BEGIN PROFILE SIDEBAR -->
        <div class="profile-sidebar">
            <!-- PORTLET MAIN -->
            <div class="portlet light profile-sidebar-portlet">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="<?php echo $this->request->webroot; ?>img/uploads/male.png" class="img-responsive" alt="">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        Marcus Doe
                    </div>
                    <div class="profile-usertitle-job">
                        Reference Number: 1
                    </div>
                </div>

            </div>
            <!-- END PORTLET MAIN -->
            <!-- PORTLET MAIN -->
            <!--div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">Associated Clients</div>
                </div>
                <div class="portlet-body">
                    <table class="table">
                        <tr><td><a href="#">Sample client 1</a></td><td><a href="#">Sample client 1</a></td></tr>
                        <tr><td><a href="#">Sample client 1</a></td><td><a href="#">Sample client 1</a></td></tr>
                        <tr><td><a href="#">Sample client 1</a></td><td><a href="#">Sample client 1</a></td></tr>
                        <tr><td><a href="#">Sample client 1</a></td><td><a href="#">Sample client 1</a></td></tr>
                    </table>
                    <div class="clearfix"></div>
                </div>
            </div>
                <hr /-->
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">Orders</div>
                </div>
                <div class="portlet-body">
                    <table class="table">
                        <tr>
                            <td><a href="#">Sample Order 1</a></td>
                            <td><a href="#">Sample Order 1</a></td>
                        </tr>
                        <tr>
                            <td><a href="#">Sample Order 1</a></td>
                            <td><a href="#">Sample Order 1</a></td>
                        </tr>
                        <tr>
                            <td><a href="#">Sample Order 1</a></td>
                            <td><a href="#">Sample Order 1</a></td>
                        </tr>
                        <tr>
                            <td><a href="#">Sample Order 1</a></td>
                            <td><a href="#">Sample Order 1</a></td>
                        </tr>
                    </table>

                    <a href="<?php echo WEB_ROOT; ?>documents/add" class="btn btn-warning margin-top-10">
                        Submit Order </a>

                    <div class="clearfix"></div>

                </div>
            </div>
            <!-- END PORTLET MAIN -->
        </div>
        <!-- END BEGIN PROFILE SIDEBAR -->
        <!-- BEGIN PROFILE CONTENT -->
        <div class="profile-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light">
                        <div class="portlet-title tabbable-line">
                            <div class="caption caption-md">
                                <i class="icon-globe theme-font hide"></i>
                                <span
                                    class="caption-subject font-blue-madison bold"><?php echo ucfirst($settings->profile); ?></span>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1_1" data-toggle="tab">Info</a>
                                </li>
                                <?php
                                if (!isset($disabled)) {
                                    ?>

                                    <li>
                                        <a href="#tab_1_2" data-toggle="tab">Picture</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_3" data-toggle="tab">Password</a>
                                    </li>
                                <?php
                                }
                                ?>
                                <li>
                                    <a href="#tab_1_4" data-toggle="tab">Display</a>
                                </li>
                                <li>
                                    <a href="#tab_1_5" data-toggle="tab">Logos</a>
                                </li>

                                <li>
                                    <a href="#tab_1_6" data-toggle="tab">Pages</a>
                                </li>

                                <!--<li>
                                                <a href="#tab_1_7" data-toggle="tab"><?php echo ucfirst($settings->document); ?></a>
                                            </li>-->

                                <li>
                                    <a href="#tab_1_7" data-toggle="tab">Blocks</a>
                                </li>

                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <!-- PERSONAL INFO TAB -->
                                <div class="tab-pane active" id="tab_1_1">


                                    <div class="row">


                                        <div class="col-md-12">


                                            <div class="portlet box green-haze">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-user"></i>
                                                        <?php echo ucfirst($settings->profile); ?>
                                                    </div>
                                                </div>


                                                <div class="portlet-body">


                                                    <form role="form" action="#">
                                                        <div class="form-group col-md-6">
                                                            <label
                                                                class="control-label">Profile Type</label>
                                                            <select <?php echo $is_disabled ?>
                                                                class="form-control member_type">
                                                                <option value="Admin">Admin</option>
                                                                <option value="Member">Recruiter</option>
                                                                <option value="Contact">Examiner</option>
                                                                <option value="Contact">Driver</option>
                                                                <option value="Contact">Contact</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="control-label">Title</label>
                                                            <input <?php echo $is_disabled ?> type="text"
                                                                                              placeholder="eg. Mr"
                                                                                              class="form-control"/>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="control-label">First Name</label>
                                                            <input <?php echo $is_disabled ?> type="text"
                                                                                              placeholder="eg. John"
                                                                                              class="form-control"/>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="control-label">Last Name</label>
                                                            <input <?php echo $is_disabled ?> type="text"
                                                                                              placeholder="eg. Doe"
                                                                                              class="form-control"/>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="control-label">Email</label>
                                                            <input <?php echo $is_disabled ?> type="text"
                                                                                              placeholder="eg. test@domain.com"
                                                                                              class="form-control"/>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="control-label">Phone Number</label>
                                                            <input <?php echo $is_disabled ?> type="text"
                                                                                              placeholder="eg. +1 646 580 6284"
                                                                                              class="form-control"/>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label class="control-label">Address</label>
                                                            <input <?php echo $is_disabled ?> type="text"
                                                                                              placeholder="eg. Street, City, Province, Country"
                                                                                              class="form-control"/>
                                                        </div>

                                                        <?php
                                                        if (!isset($disabled)) {
                                                            ?>
                                                            <div class="margiv-top-10">
                                                                <a href="#" class="btn btn-primary">
                                                                    Save Changes </a>
                                                                <a href="#" class="btn default">
                                                                    Cancel </a>
                                                            </div>
                                                        <?php } ?>
                                                    </form>

                                                    <div class="clearfix"></div>


                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-12">


                                            <div class="portlet box blue">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-user"></i>
                                                        <?php echo ucfirst($settings->profile); ?> Notes
                                                    </div>
                                                </div>


                                                <div class="portlet-body">


                                                    Lorem ipsum set tollaLorem ipsum set tollaLorem ipsum set tollaLorem
                                                    ipsum set tollaLorem ipsum set tollaLorem ipsum set tollaLorem ipsum
                                                    set tollaLorem ipsum set tollaLorem ipsum set tollaLorem ipsum set
                                                    tollaLorem ipsum set tollaLorem ipsum set tollaLorem ipsum set
                                                    tollaLorem ipsum set tollaLorem ipsum set tollaLorem ipsum set
                                                    tollaLorem ipsum set tollaLorem ipsum set tollaLorem ipsum set
                                                    tollaLorem ipsum set tollaLorem ipsum set tollaLorem ipsum set
                                                    tollaLorem ipsum set tollaLorem ipsum set tollaLorem ipsum set
                                                    tollaLorem ipsum set tollaLorem ipsum set tollaLorem ipsum set
                                                    tollaLorem ipsum set tollaLsum set tollaLorem ipsum set tollaLorem
                                                    ipsum set tollaLorem ipsum set tollaLorem ipsum set tollaLorem ipsum
                                                    set tollaLorem ipsum set tollaLorem ipsum set tollaLorem ipsum set
                                                    tollaLorem ipsum set tollaLorem ipsum set tollaLorem ipsum set
                                                    tollaLorem ipsum set tollaLorem ipsum set tollaLorem ipsum set
                                                    tollaLorem ipsum set tollaLorem ipsum set tollaLorem ipsum set
                                                    tollaLorem ipsum set tollaLorem ipsum set tollaLorem ipsum set tolla
                                                    <div class="clearfix"></div>


                                                </div>
                                            </div>
                                        </div>


                                    </div>


                                </div>
                                <!-- END PERSONAL INFO TAB -->
                                <!-- CHANGE AVATAR TAB -->
                                <div class="tab-pane" id="tab_1_2">
                                    <p>
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                        richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                        brunch. Food truck quinoa nesciunt laborum eiusmod.
                                    </p>

                                    <div class="form-group">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <img
                                                    src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"
                                                    alt=""/>
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"
                                                 style="max-width: 200px; max-height: 150px;">
                                            </div>
                                            <div>
																<span class="btn default btn-file">
																<span class="fileinput-new">
																Select image </span>
																<span class="fileinput-exists">
																Change </span>
																<input type="file" name="...">
																</span>
                                                <a href="#" class="btn default fileinput-exists"
                                                   data-dismiss="fileinput">
                                                    Remove </a>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                                <!-- END CHANGE AVATAR TAB -->
                                <!-- CHANGE PASSWORD TAB -->
                                <div class="tab-pane" id="tab_1_3">
                                    <form action="#">
                                        <div class="form-group">
                                            <label class="control-label">Current Password</label>
                                            <input type="password" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">New Password</label>
                                            <input type="password" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Re-type New Password</label>
                                            <input type="password" class="form-control"/>
                                        </div>
                                        <div class="margin-top-10">
                                            <a href="#" class="btn btn-primary">
                                                Change Password </a>
                                            <a href="#" class="btn default">
                                                Cancel </a>
                                        </div>
                                    </form>
                                </div>
                                <!-- END CHANGE PASSWORD TAB -->
                                <!-- PRIVACY SETTINGS TAB -->
                                <div class="tab-pane" id="tab_1_4">
                                    <form action="<?php echo $this->request->webroot; ?>settings/change_text"
                                          role="form" method="post">
                                        <div class="form-group" id="notli">

                                            <label class="control-label">Choose what to display</label>

                                            <div class="clearfix"></div>
                                            <div class="form-group">
                                                <label class="control-label">Client</label>
                                                <input type="text" name="client" class="form-control"
                                                       value="<?php echo $settings->client; ?>"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Document</label>
                                                <input type="text" name="document" class="form-control"
                                                       value="<?php echo $settings->document; ?>"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Profile</label>
                                                <input type="text" name="profile" class="form-control"
                                                       value="<?php echo $settings->profile; ?>"/>
                                            </div>
                                            <!--<select class="form-control" onchange="change_text(this.value)">
                                                <option value="">Select User/Profile</option>
                                                <option value="1">Profile/Client</option>
                                                <option value="2">User/Job</option>
                                            </select>-->

                                        </div>
                                        <div class="margin-top-10">
                                            <input type="submit" class="btn btn-primary" value="Submit"/>
                                            <a href="#" class="btn default">
                                                Cancel </a>
                                        </div>
                                    </form>

                                    <p>&nbsp;</p>
                                    <h4> Enable Documents</h4>

                                    <form action="#">
                                        <table class="table table-light table-hover">
                                            <tr>
                                                <th></th>
                                                <th class="">System</th>
                                                <th class="">User</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Reports
                                                </td>
                                                <td class="">
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="optionsRadios"
                                                                                          value="option1"/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="optionsRadios"
                                                                                          value="option2" checked/>
                                                        No </label>
                                                </td>
                                                <td class="">
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio" name="usroptions"
                                                                                          value="option1"
                                                                                          onclick="$(this).closest('tr').next('tr').show();"/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio" name="usroptions"
                                                                                          value="option2"
                                                                                          onclick="$(this).closest('tr').next('tr').hide();"
                                                                                          checked/>
                                                        No </label>
                                                </td>

                                            </tr>
                                            <tr style="display:none;">
                                                <td></td>
                                                <td colspan="2" class="">
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio" name="Usr"
                                                                                          value="option1"/>
                                                        View Only </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio" name="Usr"
                                                                                          value="option2"/>
                                                        Upload Only </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio" name="Usr"
                                                                                          value="option3" checked/>
                                                        Both </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <?php echo ucfirst($settings->document); ?>
                                                </td>
                                                <td class="">
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="optionsRadios1"
                                                                                          value="option1"/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="optionsRadios1"
                                                                                          value="option2" checked/>
                                                        No </label>
                                                </td>
                                                <td class="">
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="usroptions9"
                                                                                          value="option1"
                                                                                          onclick="$(this).closest('tr').next('tr').show();"/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="usroptions9"
                                                                                          value="option2"
                                                                                          onclick="$(this).closest('tr').next('tr').hide();"
                                                                                          checked/>
                                                        No </label>
                                                </td>

                                            </tr>
                                            <tr style="display:none;">
                                                <td></td>
                                                <td colspan="2" class="">
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio" name="Usr9"
                                                                                          value="option1"/>
                                                        View Only </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio" name="Usr9"
                                                                                          value="option2"/>
                                                        Upload Only </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio" name="Usr9"
                                                                                          value="option3" checked/>
                                                        Both </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    templates
                                                </td>
                                                <td class="">
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="optionsRadios2"
                                                                                          value="option1"/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="optionsRadios2"
                                                                                          value="option2" checked/>
                                                        No </label>
                                                </td>
                                                <td class="">
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="usroptions1"
                                                                                          value="option1"
                                                                                          onclick="$(this).closest('tr').next('tr').show();"/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="usroptions1"
                                                                                          value="option2"
                                                                                          onclick="$(this).closest('tr').next('tr').hide();"
                                                                                          checked/>
                                                        No </label>
                                                </td>

                                            </tr>
                                            <tr style="display:none;">
                                                <td></td>
                                                <td colspan="2" class="">
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio" name="Usr1"
                                                                                          value="option1"/>
                                                        View Only </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio" name="Usr1"
                                                                                          value="option2"/>
                                                        Upload Only </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio" name="Usr1"
                                                                                          value="option3" checked/>
                                                        Both </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    KPI Report
                                                </td>
                                                <td class="">
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="optionsRadios3"
                                                                                          value="option1"/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="optionsRadios3"
                                                                                          value="option2" checked/>
                                                        No </label>
                                                </td>
                                                <td class="">
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="usroptions2"
                                                                                          value="option1"
                                                                                          onclick="$(this).closest('tr').next('tr').show();"/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="usroptions2"
                                                                                          value="option2"
                                                                                          onclick="$(this).closest('tr').next('tr').hide();"
                                                                                          checked/>
                                                        No </label>
                                                </td>

                                            </tr>
                                            <tr style="display:none;">
                                                <td></td>
                                                <td colspan="2" class="">
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio" name="Usr2"
                                                                                          value="option1"/>
                                                        View Only </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio" name="Usr2"
                                                                                          value="option2"/>
                                                        Upload Only </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio" name="Usr2"
                                                                                          value="option3" checked/>
                                                        Both </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Strike
                                                </td>
                                                <td class="">
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="optionsRadios4"
                                                                                          value="option1"/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="optionsRadios4"
                                                                                          value="option2" checked/>
                                                        No </label>
                                                </td>
                                                <td class="">
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="usroptions3"
                                                                                          value="option1"
                                                                                          onclick="$(this).closest('tr').next('tr').show();"/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="usroptions3"
                                                                                          value="option2"
                                                                                          onclick="$(this).closest('tr').next('tr').hide();"
                                                                                          checked/>
                                                        No </label>
                                                </td>

                                            </tr>
                                            <tr style="display:none;">
                                                <td></td>
                                                <td colspan="2">
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio" name="Usr3"
                                                                                          value="option1"/>
                                                        View Only </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio" name="Usr3"
                                                                                          value="option2"/>
                                                        Upload Only </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio" name="Usr3"
                                                                                          value="option3" checked/>
                                                        Both </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Orders
                                                </td>
                                                <td class="">
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="optionsRadios5"
                                                                                          value="option1"/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="optionsRadios5"
                                                                                          value="option2" checked/>
                                                        No </label>
                                                </td>
                                                <td class="">
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="usroptions4"
                                                                                          value="option1"
                                                                                          onclick="$(this).closest('tr').next('tr').show();"/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="usroptions4"
                                                                                          value="option2"
                                                                                          onclick="$(this).closest('tr').next('tr').hide();"
                                                                                          checked/>
                                                        No </label>
                                                </td>

                                            </tr>
                                            <tr style="display:none;">
                                                <td></td>
                                                <td colspan="2" class="">
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio" name="Usr4"
                                                                                          value="option1"/>
                                                        View Only </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio" name="Usr4"
                                                                                          value="option2"/>
                                                        Upload Only </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio" name="Usr4"
                                                                                          value="option3" checked/>
                                                        Both </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Other Document Type
                                                </td>
                                                <td class="">
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="optionsRadios6"
                                                                                          value="option1"/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="optionsRadios6"
                                                                                          value="option2" checked/>
                                                        No </label>
                                                </td>
                                                <td class="">
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="usroptions5"
                                                                                          value="option1"
                                                                                          onclick="$(this).closest('tr').next('tr').show();"/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="usroptions5"
                                                                                          value="option2"
                                                                                          onclick="$(this).closest('tr').next('tr').hide();"
                                                                                          checked/>
                                                        No </label>
                                                </td>

                                            </tr>
                                            <tr style="display:none;">
                                                <td></td>
                                                <td colspan="2" class="">
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio" name="Usr5"
                                                                                          value="option1"/>
                                                        View Only </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio" name="Usr5"
                                                                                          value="option2"/>
                                                        Upload Only </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio" name="Usr5"
                                                                                          value="option3" checked/>
                                                        Both </label>
                                                </td>
                                            </tr>
                                        </table>
                                        <!--end profile-settings-->
                                        <?php
                                        if (!isset($disabled)) {
                                            ?>

                                            <div class="margin-top-10">
                                                <a href="#" class="btn btn-primary">
                                                    Save Changes </a>

                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </form>
                                </div>
                                <div class="tab-pane" id="tab_1_5">
                                    <div>
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#subtab_1_1" data-toggle="tab">Primary Logo</a>
                                            </li>
                                            <li>
                                                <a href="#subtab_1_2" data-toggle="tab">Secondary Logo</a>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="subtab_1_1">
                                            <div class="portlet ">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-user"></i>Choose A Primary Logo
                                                    </div>

                                                </div>
                                                <div class="portlet-body">

                                                    <form action="<?php echo $this->request->webroot; ?>logos"
                                                          method="post" class="form-inline" role="form">
                                                        <?php foreach ($logos as $logo) { ?>
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-1">
                                                                    <input type="radio" value="<?php echo $logo->id; ?>"
                                                                           name="logo" <?php echo ($logo->active == '1') ? "checked='checked'" : ""; ?>/>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <img
                                                                        src="<?php echo $this->request->webroot; ?>img/logos/<?php echo $logo->logo; ?>"
                                                                        width="86px" height="14px"/>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <hr/>

                                                        <?php } ?>
                                                        <input type="submit" class="btn btn-success" value="submit"
                                                               name="submit"/>
                                                    </form>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="subtab_1_2">
                                            <div class="portlet ">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-user"></i>Choose A Secondary Logo
                                                    </div>

                                                </div>
                                                <div class="portlet-body">

                                                    <form action="<?php echo $this->request->webroot; ?>logos/secondary"
                                                          method="post" class="form-inline" role="form">
                                                        <?php foreach ($logos1 as $logo) { ?>
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-1">
                                                                    <input type="radio" value="<?php echo $logo->id; ?>"
                                                                           name="logo" <?php echo ($logo->active == '1') ? "checked='checked'" : ""; ?>/>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <img
                                                                        src="<?php echo $this->request->webroot; ?>img/logos/<?php echo $logo->logo; ?>"
                                                                        width="86px" height="14px"/>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <hr/>

                                                        <?php } ?>
                                                        <input type="submit" class="btn btn-success" value="submit"
                                                               name="submit"/>
                                                    </form>


                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="tab-pane" id="tab_1_6">
                                    <div>
                                        <ul class="nav nav-tabs">


                                            <li class="active">
                                                <a href="#subtab_1_5" data-toggle="tab">Product Example</a>
                                            </li>
                                            <li class="">
                                                <a href="#subtab_1_6" data-toggle="tab">Help</a>
                                            </li>
                                            <li>
                                                <a href="#subtab_1_4" data-toggle="tab">Privacy Code</a>
                                            </li>
                                            <li>
                                                <a href="#subtab_1_6" data-toggle="tab">Terms</a>
                                            </li>
                                            <li class="">
                                                <a href="#subtab_1_7" data-toggle="tab">FAQ</a>
                                            </li>


                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="subtab_1_3">
                                            <div class="portlet box blue">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-gift"></i>Page Manager - Help
                                                    </div>

                                                </div>

                                                <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                    <form action="#" class="form-horizontal form-bordered">
                                                        <div class="form-body">
                                                            <div class="form-group last">
                                                                <label class="control-label col-md-3">Page Title</label>

                                                                <div class="col-md-4">
                                                                    <input class="form-control" name="title"
                                                                           value="Help"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-body">
                                                            <div class="form-group last">
                                                                <label
                                                                    class="control-label col-md-3">Description</label>

                                                                <div class="col-md-9">
                                                                    <textarea class="ckeditor form-control"
                                                                              name="editor1" rows="6"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-actions">
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-9">
                                                                    <button type="submit" class="btn blue"><i
                                                                            class="fa fa-check"></i> Submit
                                                                    </button>
                                                                    <button type="button" class="btn default">Cancel
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <!-- END FORM-->
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="subtab_1_4">
                                            <div class="portlet box blue">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-gift"></i>Page Manager - Privacy Code
                                                    </div>

                                                </div>

                                                <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                    <form action="#" class="form-horizontal form-bordered">
                                                        <div class="form-body">
                                                            <div class="form-group last">
                                                                <label class="control-label col-md-3">Page Title</label>

                                                                <div class="col-md-4">
                                                                    <input class="form-control" name="title"
                                                                           value="Privacy code"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-body">
                                                            <div class="form-group last">
                                                                <label
                                                                    class="control-label col-md-3">Description</label>

                                                                <div class="col-md-9">
                                                                    <textarea class="ckeditor form-control"
                                                                              name="editor1" rows="6"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-actions">
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-9">
                                                                    <button type="submit" class="btn blue"><i
                                                                            class="fa fa-check"></i> Submit
                                                                    </button>
                                                                    <button type="button" class="btn default">Cancel
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <!-- END FORM-->
                                                </div>
                                            </div>

                                        </div>

                                        <div class="tab-pane" id="subtab_1_5">
                                            <div class="portlet box blue">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-gift"></i>Page Manager - Product Example
                                                    </div>

                                                </div>

                                                <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                    <form action="#" class="form-horizontal form-bordered">
                                                        <div class="form-body">
                                                            <div class="form-group last">
                                                                <label class="control-label col-md-3">Page Title</label>

                                                                <div class="col-md-4">
                                                                    <input class="form-control" name="title"
                                                                           value="Product example"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-body">
                                                            <div class="form-group last">
                                                                <label
                                                                    class="control-label col-md-3">Description</label>

                                                                <div class="col-md-9">
                                                                    <textarea class="ckeditor form-control"
                                                                              name="editor1" rows="6"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-actions">
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-9">
                                                                    <button type="submit" class="btn blue"><i
                                                                            class="fa fa-check"></i> Submit
                                                                    </button>
                                                                    <button type="button" class="btn default">Cancel
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <!-- END FORM-->
                                                </div>
                                            </div>

                                        </div>

                                        <div class="tab-pane" id="subtab_1_6">
                                            <div class="portlet box blue">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-gift"></i>Page Manager - Terms
                                                    </div>

                                                </div>

                                                <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                    <form action="#" class="form-horizontal form-bordered">
                                                        <div class="form-body">
                                                            <div class="form-group last">
                                                                <label class="control-label col-md-3">Page Title</label>

                                                                <div class="col-md-4">
                                                                    <input class="form-control" name="title"
                                                                           value="Terms"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-body">
                                                            <div class="form-group last">
                                                                <label
                                                                    class="control-label col-md-3">Description</label>

                                                                <div class="col-md-9">
                                                                    <textarea class="ckeditor form-control"
                                                                              name="editor1" rows="6"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-actions">
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-9">
                                                                    <button type="submit" class="btn blue"><i
                                                                            class="fa fa-check"></i> Submit
                                                                    </button>
                                                                    <button type="button" class="btn default">Cancel
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <!-- END FORM-->
                                                </div>
                                            </div>

                                        </div>

                                        <div class="tab-pane" id="subtab_1_7">
                                            <div class="portlet box blue">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-gift"></i>Page Manager - FAQ
                                                    </div>

                                                </div>

                                                <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                    <form action="#" class="form-horizontal form-bordered">
                                                        <div class="form-body">
                                                            <div class="form-group last">
                                                                <label class="control-label col-md-3">Page Title</label>

                                                                <div class="col-md-4">
                                                                    <input class="form-control" name="title"
                                                                           value="FAQ"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-body">
                                                            <div class="form-group last">
                                                                <label
                                                                    class="control-label col-md-3">Description</label>

                                                                <div class="col-md-9">
                                                                    <textarea class="ckeditor form-control"
                                                                              name="editor1" rows="6"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-actions">
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-9">
                                                                    <button type="submit" class="btn blue"><i
                                                                            class="fa fa-check"></i> Submit
                                                                    </button>
                                                                    <button type="button" class="btn default">Cancel
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <!-- END FORM-->
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <!-- END PRIVACY SETTINGS TAB -->


                                <!-- PRIVACY SETTINGS TAB -->
                                <div class="tab-pane" id="tab_1_7">
                                    <?php $sidebar = $this->requestAction("settings/get_side"); ?>
                                    <?php $block = $this->requestAction("settings/get_blocks"); ?>
                                    <h4> Sidebar Module </h4>

                                    <form action="<?php echo $this->request->webroot; ?>profiles/blocks" method="post">
                                        <table class="table table-light table-hover">
                                            <tr>
                                                <td>
                                                    <?php echo ucfirst($settings->profile); ?>
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[profile]"
                                                                                          value="1" <?php if ($sidebar->profile == 1) echo "checked"; ?> />
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[profile]"
                                                                                          value="0" <?php if ($sidebar->profile == 0) echo "checked"; ?>/>
                                                        No </label>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <?php echo ucfirst($settings->client); ?>
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[client]"
                                                                                          value="1" <?php if ($sidebar->client == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[client]"
                                                                                          value="0" <?php if ($sidebar->client == 0) echo "checked"; ?>/>
                                                        No </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <?php echo ucfirst($settings->document); ?>
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[document]"
                                                                                          value="1" <?php if ($sidebar->document == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="side[document]"
                                                                                          value="0" <?php if ($sidebar->document == 0) echo "checked"; ?>/>
                                                        No </label>
                                                </td>
                                            </tr>
                                        </table>
                                        <!--end profile-settings-->










                                        <h4> Homepage Top Block</h4>


                                        <table class="table table-light table-hover">
                                            <tr>
                                                <td>
                                                    Add a <?=$settings->profile; ?>
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[addadriver]"
                                                                                          value="1" <?php if ($block->addadriver == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[addadriver]"
                                                                                          value="0" <?php if ($block->addadriver == 0) echo "checked"; ?>/>
                                                        No </label>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    Search <?=$settings->profile; ?>
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio" name="block[searchdriver]"
                                                                                          value="1" <?php if ($block->searchdriver == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio" name="block[searchdriver]"
                                                                                          value="0" <?php if ($block->searchdriver == 0) echo "checked"; ?>/>
                                                        No </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Submit Order
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[submitorder]"
                                                                                          value="1" <?php if ($block->submitorder == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[submitorder]"
                                                                                          value="0" <?php if ($block->submitorder == 0) echo "checked"; ?>/>
                                                        No </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Order History
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[orderhistory]"
                                                                                          value="1" <?php if ($block->orderhistory == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[orderhistory]"
                                                                                          value="0" <?php if ($block->orderhistory == 0) echo "checked"; ?>/>
                                                        No </label>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    Schedule
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[schedule]"
                                                                                          value="1" <?php if ($block->schedule == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[schedule]"
                                                                                          value="0" <?php if ($block->schedule == 0) echo "checked"; ?>/>
                                                        No </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Tasks
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[tasks]"
                                                                                          value="1" <?php if ($block->tasks == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[tasks]"
                                                                                          value="0" <?php if ($block->tasks == 0) echo "checked"; ?>/>
                                                        No </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Feedback
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio" name="block[feedback]"
                                                                                          value="1" <?php if ($block->feedback == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio" name="block[feedback]"
                                                                                          value="0" <?php if ($block->feedback == 0) echo "checked"; ?>/>
                                                        No </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Analytics
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[analytics]"
                                                                                          value="1" <?php if ($block->analytics == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[analytics]"
                                                                                          value="0" <?php if ($block->analytics == 0) echo "checked"; ?>/>
                                                        No </label>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td>
                                                    Master <?=$settings->client; ?>
                                                </td>
                                                <td>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[masterjob]"
                                                                                          value="1" <?php if ($block->analytics == 1) echo "checked"; ?>/>
                                                        Yes </label>
                                                    <label class="uniform-inline">
                                                        <input <?php echo $is_disabled ?> type="radio"
                                                                                          name="block[maserjob]"
                                                                                          value="0" <?php if ($block->analytics == 0) echo "checked"; ?>/>
                                                        No </label>
                                                </td>
                                            </tr>








                                        </table>

                                        <?php
                                        if (!isset($disabled)) {
                                            ?>

                                            <div class="margin-top-10">
                                                <input type="submit" name="submit" class="btn btn-primary"
                                                       value="Save Changes"/>

                                            </div>
                                        <?php
                                        }
                                        ?>


                                    </form>
                                </div>


                                <!-- PRIVACY SETTINGS TAB -->


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PROFILE CONTENT -->
    </div>
</div>


<script>
    $(function () {
        $('.member_type').change(function () {
            if ($(this).val() == 'Contact') {
                $('.nav-tabs li:not(.active)').each(function () {
                    $(this).hide();
                });
            }
            else {
                $('.nav-tabs li:not(.active)').each(function () {
                    $(this).show();
                });
            }
        });
    })
</script>
<?php /*






















<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(
				__('Delete'),
				['action' => 'delete', $profile->id],
				['confirm' => __('Are you sure you want to delete # {0}?', $profile->id)]
			)
		?></li>
		<li><?= $this->Html->link(__('List Profiles'), ['action' => 'index']) ?></li>
	</ul>
</div>
<div class="profiles form large-10 medium-9 columns">
	<?= $this->Form->create($profile); ?>
	<fieldset>
		<legend><?= __('Edit Profile') ?></legend>
		<?php
			echo $this->Form->input('title');
			echo $this->Form->input('fname');
			echo $this->Form->input('lname');
			echo $this->Form->input('username');
			echo $this->Form->input('email');
			echo $this->Form->input('password');
			echo $this->Form->input('address');
			echo $this->Form->input('phone');
			echo $this->Form->input('image');
			echo $this->Form->input('admin');
			echo $this->Form->input('super');
		?>
	</fieldset>
	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>
</div>
*/
?>