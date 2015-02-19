
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box yellow">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-clipboard"></i>
                        List Orders
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="clearfix"></div>
                    <div class="table-responsive">
                        <table class="table table-condensed table-striped table-bordered table-hover dataTable no-footer">
                            <thead>
                            <tr class="sorting">
                                <th><a href="/veritas3/documents/orderslist?sort=orders.title&amp;direction=asc">Title</a></th>
                                <th><a href="/veritas3/documents/orderslist?sort=created&amp;direction=asc">Created</a></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $getOrders = $this->requestAction('profiles/getOrders/'.$id);

                            $found=false;
                            foreach($getOrders as $g ) { $found=true; ?>

                                <tr class="even" role="row">
                                    <td><?php echo $g->id; ?></td>

                                    <td><input type="checkbox" id="<?php echo $g->id; ?>"><?php echo $g->created; ?></td>

                                </tr>
                            <?php }
                            if (!$found) {
                            echo '<tr class="even" role="row"><td colspan="2" align="center">No orders found</td></tr></tr>';
                            }

                            ?>
                            </tbody>
                        </table>

                    </div>
                    <div id="sample_2_paginate" class="dataTables_paginate paging_simple_numbers">
                        <ul class="pagination sorting">
                            <li class="prev disabled"><a href="">&lt; previous</a></li> <li class="next disabled"><a href="">next &gt;</a></li>                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
