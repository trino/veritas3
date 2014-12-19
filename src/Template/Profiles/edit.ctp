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
                                if (!isset($disabled) || !($this->request->session()->read('Profile.admin'))) {
                                    ?>

                                    <li>
                                        <a href="#tab_1_2" data-toggle="tab">Picture</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_3" data-toggle="tab">Password</a>
                                    </li>
                                <?php
                                }
                                if($this->request->session()->read('Profile.admin'))
                                {
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
                                
                                    <?php
                                } 
                                ?>
                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <!-- PERSONAL INFO TAB -->
                                <div class="tab-pane active" id="tab_1_1">
                                    <?php include('subpages/profile/info.php');?>
                                </div>
                                <!-- END PERSONAL INFO TAB -->
                                <!-- CHANGE AVATAR TAB -->
                                <div class="tab-pane" id="tab_1_2">
                                    
                                    <?php include('subpages/profile/avatar.php');?>
                                </div>
                                <!-- END CHANGE AVATAR TAB -->
                                <!-- CHANGE PASSWORD TAB -->
                                <div class="tab-pane" id="tab_1_3">
                                    <?php include('subpages/profile/password.php');?>
                                </div>
                                <!-- END CHANGE PASSWORD TAB -->
                                <!-- PRIVACY SETTINGS TAB -->
                                <div class="tab-pane" id="tab_1_4">
                                    <?php include('subpages/profile/display.php');?>
                                </div>
                                <div class="tab-pane" id="tab_1_5">
                                    <?php include('subpages/profile/logo.php');?>
                                </div>


                                <div class="tab-pane" id="tab_1_6">
                                    <?php include('subpages/profile/page.php');?>
                                </div>
                                <!-- END PRIVACY SETTINGS TAB -->


                                <!-- PRIVACY SETTINGS TAB -->
                                <div class="tab-pane" id="tab_1_7">
                                    <?php include('subpages/profile/block.php');?>
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