<H3 class="page-title">Settings</H3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="/veritas3">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="">Settings</a>
        </li>
    </ul>
</div>


<link href="<?php echo $this->request->webroot; ?>assets/admin/pages/css/profile.css" rel="stylesheet"
      type="text/css"/> <!--REQUIRED-->
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

<div class="clearfix"></div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->



<div class="portlet paddingless">
    <div class="portlet-title line" style="display:none;">
        <div class="caption caption-md">
            <i class="icon-globe theme-font hide"></i>
                                <span
                                    class="caption-subject font-blue-madison bold"><?php echo ucfirst($settings->profile); ?>
                                    Manager</span>
        </div>
    </div>

    <div class="portlet-body">

        <!--BEGIN TABS-->
        <div class="tabbable tabbable-custom">
            <ul class="nav nav-tabs">
                <?php
                if ($this->request['action'] != 'add') {

                    if ($this->request->session()->read('Profile.admin') && $this->request->session()->read('Profile.super')) { ?>
                            <li class="active">
                                <a href="#tab_1_5" data-toggle="tab">Logo</a>
                            </li>

                            <li>
                                <a href="#tab_1_6" data-toggle="tab">Pages</a>
                            </li>
                            <li>
                                <a href="#tab_1_8" data-toggle="tab">Display</a>
                            </li>
                             <li>
                                <a href="#tab_1_10" data-toggle="tab">Products</a>
                            </li>
                            <li>
                                <a href="#tab_1_11" data-toggle="tab">Profile Types</a>
                            </li>
                            <li>
                                <a href="#tab_1_12" data-toggle="tab">Client Types</a>
                            </li>
                             <li>
                                <a href="#tab_1_9" data-toggle="tab">Clear Data</a>
                            </li>
                            <li>
                                <a href="#tab_1_13" data-toggle="tab">Add / Edit Sub documents</a>
                            </li>
                        <?php
                        }
                }

                ?>
            </ul>


            <div class="tab-content">
                <?php
                if ($this->request['action'] != 'add') {
                    ?>


                    <div class="tab-pane active" id="tab_1_5">
                        <?php include('subpages/profile/logo.php'); ?>
                    </div>

                    <div class="tab-pane" id="tab_1_6">
                        <?php //include('subpages/profile/page.php'); ?>
                    </div>
                    <div class="tab-pane" id="tab_1_8">
                        <?php include('subpages/profile/client_setting.php'); ?>
                    </div>
                    <div class="tab-pane" id="tab_1_10">
                        <?php include('subpages/profile/products.php'); ?>
                    </div>
                     <div class="tab-pane" id="tab_1_11">
                        <?php include('subpages/profile/profile_types.php'); ?>
                    </div>
                     <div class="tab-pane" id="tab_1_12">
                        <?php include('subpages/profile/client_types.php'); ?>
                    </div>
                    <div class="tab-pane" id="tab_1_9">
                        <a href="javascript:void(0)" class="btn btn-danger" id="cleardata">Clear Data</a>
                        <div class="margin-top-10 alert alert-success display-hide cleardata_flash" style="display: none;">
                           Data Successfully Cleared.
                                                    <button class="close" data-close="alert"></button>
                                                   
                        </div>
                    </div>
                    <?php
                          if(isset($_GET['activedisplay']))
                          {
                            ?>
                            <div class="tab-pane active"  id="tab_1_13">
                            <?php
                          }
                          else
                          {
                            ?>
                            <div class="tab-pane"  id="tab_1_13">
                          <?php
                          }
                          ?>
                          <div class="col-md-6" style="text-align: right;">
                                <a href="#" class="btn btn-success" onclick="$('#sub_add').toggle(150);">Add New SubDocument</a>
                                <div class="col-md-12" id="sub_add" style="display: none;margin:10px 0;padding:0">
                                    <div class="col-md-10" style="text-align: right;padding:0;">
                                        <input type="text" placeholder="Sub-Document title" class="form-control subdocname" />
                                        <span class="error passerror flashSubDoc"
                                          style="display: none;">Subdocument name already exists</span>
                                        <span class="error passerror flashSubDoc1"
                                          style="display: none;">Please enter a subdocument name.</span>
                                    </div>
                                        <input type="hidden" class="clien_id" value="<?php echo $client->id; ?>" />
                                    <div class="col-md-2" style="text-align: right;padding:0;">
                                        <a class="btn btn-primary addsubdoc" href="javascript:void(0)">Add</a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        <?php
                        }
                         ?>
                         <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>





<script>


    function initiate_ajax_upload(button_id) {
        var button = $('#' + button_id), interval;
        new AjaxUpload(button, {
            action: "<?php echo $this->request->webroot;?>profiles/upload_img/<?php if(isset($id))echo $id;?>",
            name: 'myfile',
            onSubmit: function (file, ext) {
                button.text('Uploading');
                this.disable();
                interval = window.setInterval(function () {
                    var text = button.text();
                    if (text.length < 13) {
                        button.text(text + '.');
                    } else {
                        button.text('Uploading');
                    }
                }, 200);
            },
            onComplete: function (file, response) {
                button.html('<i class="fa fa-image"></i> Add/Edit Image');
                window.clearInterval(interval);
                this.enable();
                $("#clientpic").attr("src", '<?php echo $this->request->webroot;?>img/profile/' + response);
                $('#client_img').val(response);
            }
        });
    }
    $(function () {
        
        $('#cleardata').click(function(){
            $(this).attr("disabled","disabled");
            var dn = confirm("Confirm Clear Database Data.");
            if(dn == true)
            {
                $.ajax({
                    url:"<?php echo $this->request->webroot;?>profiles/cleardb",
                    type:"post",
                    success:function(msg){
                            $('#cleardata').removeAttr("disabled");
                            if(msg =='Cleared')
                            $(".cleardata_flash").show();
                    }
                });
            }
            
        });
        <?php
        if(isset($id))
        {
         ?>
            initiate_ajax_upload('clientimg');
            $('.addclientz').click(function () {
                var client_id = $(this).val();
                var addclient = "";
                var msg = '';
                var nameId = 'msg_' + $(this).val();
                if ($(this).is(':checked')) {
                    addclient = '1';
                    msg = '<span class="msg" style="color:#45B6AF">Added</span>';
                }
                else {
                    addclient = '0';
                    msg = '<span class="msg" style="color:red">Removed</span>';
                }
    
                $.ajax({
                    type: "post",
                    data: "client_id=" + client_id + "&add=" + addclient + "&user_id=" +<?php echo $id;?>,
                    url: "<?php echo $this->request->webroot;?>clients/addprofile",
                    success: function () {
                        $('.' + nameId).html(msg);
                    }
                })
            });
        <?php
         }
         else
         {?>
            $('.addclientz').click(function () {
                var nameId = 'msg_' + $(this).val();
                var client_id = "";
                var msg = '';
                $('.addclientz').each(function () {
                    if ($(this).is(':checked')) {
                        msg = '<span class="msg" style="color:#45B6AF">Added</span>';
                        client_id = client_id + "," + $(this).val();
                    }
                    else {
                        msg = '<span class="msg" style="color:red">Removed</span>';
                    }
                });
    
                client_id = client_id.substr(1, length.client_id);
                $('.client_profile_id').val(client_id);
                $('.' + nameId).html(msg);
    
            });
        <?php
        }
        ?>
        $('#save_client_p1').click(function () {

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
                },
            });
        });

    });
</script>

<script>
    <?php
    if($this->request->params['action']=='edit')
    {
        ?>

        function searchClient() {
            var key = $('#searchClient').val();
            $('#clientTable').html('<tbody><tr><td><img src="<?php echo $this->request->webroot;?>assets/admin/layout/img/ajax-loading.gif"/></td></tr></tbody>');
            $.ajax({
                url: '<?php echo $this->request->webroot;?>clients/getAjaxClient/<?php echo $id;?>',
                data: 'key=' + key,
                type: 'get',
                success: function (res) {
                    $('#clientTable').html(res);
                }
            });
        }
    <?php
    }
    else
    {
    ?>
        function searchClient() {
            var key = $('#searchClient').val();
            $('#clientTable').html('<tbody><tr><td><img src="<?php echo $this->request->webroot;?>assets/admin/layout/img/ajax-loading.gif"/></td></tr></tbody>');
            $.ajax({
                url: '<?php echo $this->request->webroot;?>clients/getAjaxClient',
                data: 'key=' + key,
                type: 'get',
                success: function (res) {
                    $('#clientTable').html(res);
                }
            });
        }
    <?php
    }
    ?>
    $(function () {
        $('.scrolldiv').slimScroll({
            height: '250px'
        });

    });
</script>
<style>
    .portlet-body {
        min-height: 250px !important;
    }
</style>

