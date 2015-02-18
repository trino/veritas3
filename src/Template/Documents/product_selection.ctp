<h3 class="page-title">
    Place ME Order
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?php echo $this->request->webroot; ?>">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="">Place MEE Order
            </a>
        </li>
    </ul>





    <?php
        /*
            if (isset($disabled)) { ?>
                <a href="javascript:window.print();" class="floatright btn btn-primary">Print Report</a>
                <a href="" class="floatright btn btn-success">Re-Qualify</a>
                <a href="" class="floatright btn btn-info">Add to Task List</a>
            <?php } */
    ?>

</div>



<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-folder-open-o"></i>MEE Order Prerequisites
        </div>
    </div>
    <div class="portlet-body">
        <div class="row">
            <div class="col-md-12">
                <?php include('subpages/profile/info_order2.php'); ?>
            </div>
        </div>


    </div>



</div>
