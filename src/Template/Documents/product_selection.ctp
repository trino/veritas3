<h3 class="page-title">
    Product Selection
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?php echo $this->request->webroot; ?>">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="">Product Selection
            </a>
        </li>
    </ul>

    <?php
    /*
        if (isset($disabled)) { ?>
            <a href="javascript:window.print();" class="floatright btn btn-primary">Print Report</a>

            <a href="" class="floatright btn btn-success">Re-Qualify</a>
            <a href="" class="floatright btn btn-info">Add to Task List</a>
        <?php } */?>

</div>
<div class="row">
    <div class="col-md-12">
    <?php include('subpages/profile/info_order2.php');?>
    </div>
</div>
<a class="btn blue button-next proceed"
                                       href="<?php echo $this->request->webroot;?>documents/addorder/30">
                                        Proceed <i class="m-icon-swapright m-icon-white"></i>
                                    </a>
                                    <p>&nbsp;</p><p>&nbsp;</p>