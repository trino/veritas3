<script src="<?php echo $this->request->webroot; ?>js/jquery.easyui.min.js" type="text/javascript"></script>
<?php
    $doc_ext = array('pdf','doc','docx','txt','csv','xls','xlsx');
    if (isset($disabled))
        $is_disabled = 'disabled="disabled"';
    else
        $is_disabled = '';
?>
<?php $settings = $this->requestAction('settings/get_settings'); ?>
<h3 class="page-title">
    Create <?php echo ucfirst($settings->document); ?>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?php echo $this->request->webroot; ?>">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="">Create <?php echo ucfirst($settings->document); ?>
            </a>
        </li>
    </ul>

    <?php
        if (isset($disabled)) { ?>
            <a href="javascript:window.print();" class="floatright btn btn-primary">Print Report</a>

            <a href="" class="floatright btn btn-success">Re-Qualify</a>
            <a href="" class="floatright btn btn-info">Add to Task List</a>
        <?php } ?>

</div>
<div class="row">
    <div class="col-md-12">
        <?php
            $param = $this->request->params['action'];
            $tab = 'nodisplay';
            include("subpages/documents.php");
        ?>
        
    </div>
</div>
</div>


