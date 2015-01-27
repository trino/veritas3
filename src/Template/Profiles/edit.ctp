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

        #tab_1_4, #tab_1_7 {
            display: block !important;
        }

        #tab_1_4, #tab_1_7 {
            visibility: visible !important;
        }

        #tab_1_4 *, #tab_1_7 * {
            visibility: visible !important;
        }
    }

</style>


<?php
    if (isset($disabled))
        $is_disabled = 'disabled="disabled"';
    else
        $is_disabled = '';
    if (isset($profile))
        $p = $profile;
?>

<?php $settings = $this->requestAction('settings/get_settings'); ?>

<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<!-- BEGIN STYLE CUSTOMIZER -->
<div class="theme-panel hidden-xs hidden-sm">
    <!--<div class="toggler">
    </div>
    <div class="toggler-close">
    </div>-->
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
<?php  $param = $this->request->params['action'];
    switch ($param) {
        case 'add':
            $param2 = 'Create';
            break;
        case 'view':
            $param2 = 'View';
            break;
        case 'edit':
            $param2 = 'Edit';
            break;
    }

?>


<!-- END STYLE CUSTOMIZER -->
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    <?php echo $param2 . ' ' . ucfirst($settings->profile); ?>
</h3>

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?php echo $this->request->webroot; ?>">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href=""><?php echo $param2 . ' ' . ucfirst($settings->profile); ?></a>
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
                    <?php if (isset($p->image) && $p->image!= "") { ?>
                        <img
                             src="<?php echo $this->request->webroot; ?>img/profile/<?php echo $p->image ?>" class="img-responsive" alt="" id="clientpic" />

                    <?php } else {
                        ?>
                        <img src="<?php echo $this->request->webroot; ?>img/profile/default.png" class="img-responsive" id="clientpic"
                             alt=""/>
                    <?php
                    }
                    ?>
                    <?php if(isset($id)&&!(isset($disabled))){?>
                    <center>
                    <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail22">Add/Edit Image</label>
                    <div class="input-icon">
                    <a class="btn btn-xs  btn-success" href="javascript:void(0)" id="clientimg">
                    <i class="fa fa-image"></i>
                      Add/Edit Image
                    </a>

                    </div>
                    </div>
                    </center>
                    <?php }?>

                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        <?php if (isset($p->fname)) echo ucwords($p->fname . ' ' . $p->lname); ?>
                    </div>
                    <div class="profile-usertitle-job">
                        <?php if (isset($p->isb_id)) { ?>Reference Number: <?php echo $p->isb_id; ?><?php } ?>
                    </div>
                </div>

            </div>

            <?php if ($this->request->params['action'] == 'edit' &&($this->request->session()->read("Profile.super") ||($this->request->session()->read("Profile.admin")==1 || $this->request->session()->read("Profile.profile_type")==2 ))) {
                //&& $this->request->session()->read("Profile.id")==$id
                ?>
                <div class="portlet box blue scrolldiv">
                    <div class="portlet-title">
                        <div class="caption">Assign to client</div>
                    </div>
                    <div class="portlet-body">
                        <input type="text" id="searchClient" onkeyup="searchClient()" class="form-control" />
                        <table class="table" id="clientTable">
                            <?php

                                $clients = $this->requestAction('/clients/getAllClient/');
                                $count = 0;
                                if ($clients)
                                    foreach ($clients as $o)
                                    {
                                        $pro_ids = explode(",",$o->profile_id);
                                        ?>

                                        <tr>
                                            <td><input type="checkbox" value="<?php echo $o->id; ?>" class="addclientz" <?php if(in_array($id,$pro_ids)){echo "checked";}?> /> <?php echo $o->company_name; ?></td>
                                        </tr>

                                    <?php
                                    }
                            ?>

                        </table>

                        <div class="clearfix"></div>

                    </div>
                </div>
            <?php } ?>
            <!-- END PORTLET MAIN -->
            <?php
            if($this->request->params['action'] != 'add')
            {


                ?>


            <div class="cleafix">&nbsp;</div>













                <div class="portlet box green scrolldiv" style="overflow: hidden; width: auto; height: 250px;">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-pencil"></i>Recruiter Notes
                            </div>

                        </div>
                        <div class="portlet-body">
                            <?php include('subpages/documents/recruiter_notes.php'); ?>
                        </div>
                    </div>

            <?php









             }
             ?>
             
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
                                    class="caption-subject font-blue-madison bold"><?php echo ucfirst($settings->profile); ?> Manager</span>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1_1" data-toggle="tab">Settings</a>
                                </li>
                                <?php
                                    if ($this->request['action'] != 'add') {

                                        if ($this->request->session()->read('Profile.admin') && $this->request->session()->read('Profile.id')==$id) {
                                            ?>

                                                <li>
                                                    <a href="#tab_1_4" data-toggle="tab">Display</a>
                                                </li>
                                            <?php if ($this->request->session()->read('Profile.super')) {?>
                                                <li>
                                                    <a href="#tab_1_5" data-toggle="tab">Logos</a>
                                                </li>

                                                <li>
                                                    <a href="#tab_1_6" data-toggle="tab">Pages</a>
                                                </li>
                                            <?php
                                            }
                                            }
                                            ?>
                                            <?php  if ($this->request->session()->read('Profile.admin'))
                                            {?>
                                            <li>
                                                <a href="#tab_1_7" data-toggle="tab">Permissions</a>
                                            </li>

                                        <?php
                                            }
                                        }

                                ?>
                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <!-- PERSONAL INFO TAB -->
                                <div class="tab-pane active" id="tab_1_1">
                                    <input type="hidden" name="user_id" value="<?php echo ""; ?>"/>
                                    <?php include('subpages/profile/info.php'); ?>
                                </div>
                                <!-- END PERSONAL INFO TAB -->
                                <!-- CHANGE AVATAR TAB -->

                                    <?php
                                    if ($this->request['action'] != 'add') {
                                        ?>

                                        <div class="tab-pane" id="tab_1_4">
                                            <?php include('subpages/profile/display.php'); ?>
                                        </div>
                                        <div class="tab-pane" id="tab_1_5">
                                            <?php include('subpages/profile/logo.php'); ?>
                                        </div>

                                        <div class="tab-pane" id="tab_1_6">
                                            <?php include('subpages/profile/page.php'); ?>
                                        </div>

                                        <div class="tab-pane" id="tab_1_7">
                                            <?php include('subpages/profile/block.php'); ?>
                                        </div>

                                    <?php } ?>
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


function initiate_ajax_upload(button_id){
var button = $('#'+button_id), interval;
new AjaxUpload(button,{
    action: "<?php echo $this->request->webroot;?>profiles/upload_img/<?php if(isset($id))echo $id;?>",
    name: 'myfile',
    onSubmit : function(file, ext){
        button.text('Uploading');
        this.disable();
        interval = window.setInterval(function(){
            var text = button.text();
            if (text.length < 13){
                button.text(text + '.');
            } else {
                button.text('Uploading');
            }
        }, 200);
    },
    onComplete: function(file, response){
        button.html('<i class="fa fa-image"></i> Add/Edit Image');
            window.clearInterval(interval);
            this.enable();
            $("#clientpic").attr("src",'<?php echo $this->request->webroot;?>img/profile/'+response);
            $('#client_img').val(response);
            //$('.flashimg').show();
            }
    });
}
                $(function(){

                                        <?php
                                        if(isset($id))
                                        {

                                            ?>

                                        initiate_ajax_upload('clientimg');
                                       $('.addclientz').click(function(){
                                        var client_id = $(this).val();
                                        var addclient ="";
                                        if($(this).is(':checked'))
                                        {
                                           addclient='1';
                                        }
                                        else
                                            addclient='0';

                                        $.ajax({
                                            type: "post",
                                            data: "client_id="+client_id+"&add="+addclient+"&user_id="+<?php echo $id;?>,
                                            url: "<?php echo $this->request->webroot;?>clients/addprofile",
                                            success: function(msg){
                                                //alert(msg);
                                            }
                                        })
                                    });
                                       <?php
                                        }
                                        ?>
                                       $('#save_client_p1').click(function(){
                                        $('#save_client_p1').text('Saving..');

        $("#pass_form").validate({
            rules: {
                password: {
                    required: true
                },
                retype_password: {
                    required: true,
                    equalTo: "#password"
                }
            },
            messages: {
                password: "Please enter password",
                retype_password: "Password do not match"
            },
            submitHandler: function () {
                $('#pass_form').submit();
            }
        });
    });
    });
</script>

<script>
<?php
if($this->request->params['action']=='edit')
{
    ?>

function searchClient()
{
    var key = $('#searchClient').val();
    $('#clientTable').html('<tbody><tr><td><img src="<?php echo $this->request->webroot;?>assets/admin/layout/img/ajax-loading.gif"/></td></tr></tbody>');
    $.ajax({
        url:'<?php echo $this->request->webroot;?>clients/getAjaxClient/<?php echo $id;?>',
        data:'key='+key,
        type:'get',
        success:function(res){
            $('#clientTable').html(res);
        }
    });
}
<?php
}
?>
$(function(){
    $('.scrolldiv').slimScroll({
        height: '250px'
    });

});
</script>
<style>
.portlet-body{ min-height: 250px!important;}
</style>