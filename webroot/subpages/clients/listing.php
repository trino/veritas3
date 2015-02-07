<div class="row">

    <div class="col-md-12">
        <div class="portlet box grey-salsa">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>
                    <?php echo ucfirst($settings->client); ?>s Listing
                </div>
            </div>
            <div class="portlet-body">
                <?php

                    //if ($this->request->params['controller'] == 'clients') {
                ?>

                <div class="chat-form">
                    <form action="<?php echo $this->request->webroot; ?>clients/search" method="get">
                        <div class="col-md-12" style="padding-left:0;" align="left">
                            <input class="form-control input-inline" name="search" type="search"
                                   placeholder="Search for <?php echo ucfirst($settings->client); ?>s"
                                   value="<?php if (isset($search_text)) echo $search_text; ?>"
                                   aria-controls="sample_1"/>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>
                <?php
                    // }
                ?>
                <div class="table-scrollable">
                    <table class="table table-hover  table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('id') ?></th>
                            <th><?= $this->Paginator->sort('image') ?></th>
                            <th><?= $this->Paginator->sort('company_name') ?></th>
                            <th><?= $this->Paginator->sort('description') ?></th>
                           
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $profile_id = $this->request->session()->read('Profile.id');
                            count($client);
                            foreach ($client as $clients):
                                //print_r($clients);
                                $profiles = explode(",", $clients->profile_id);
                                
                                if (in_array($profile_id, $profiles) || $this->request->session()->read('Profile.super')=='1') {
                                    //echo $this->request->session()->read('Profile.super');
                                    ?>


                                    <tr>
                                        <td><?= $this->Number->format($clients->id) ?></td>
                                        <td>


                                            <?php
                                                if (isset($clients->image) && $clients->image) {
                                                    ?>
                                                    <img class="img-responsive" style="max-width:180px;" id="clientpic"
                                                         alt=""
                                                         src="<?php echo $this->request->webroot; ?>img/jobs/<?php echo $clients->image; ?>"/>
                                                <?php
                                                } else {
                                                    ?>
                                                    <img class="img-responsive" style="max-width:180px;" id="clientpic"
                                                         alt=""
                                                         src="<?php echo $this->request->webroot; ?>img/logos/MEELogo.png"/>
                                                <?php
                                                }
                                            ?>


                                        </td>
                                        <td><?= h($clients->company_name) ?></td>
                                        <td style="max-width: 350px;"><?= h($clients->description) ?></td>
                                        
                                        <td class="actions  util-btn-margin-bottom-5">


                                            <?php
                                                if ($sidebar->client_list == '1') {
                                                    ?>
                                                    <a class="btn btn-info"
                                                       href="<?php echo $this->request->webroot; ?>clients/edit/<?php echo $clients->id; ?>?view">View</a>
                                                <?php
                                                }
                                                if ($sidebar->client_edit == '1') {
                                                    echo $this->Html->link(__('Edit'), ['controller' => 'clients', 'action' => 'edit', $clients->id], ['class' => 'btn btn-primary']);
                                                }
                                                if ($sidebar->client_delete == '1') { ?>
                                                    <a href="<?php echo $this->request->webroot;?>clients/delete/<?php echo $clients->id;?>"
                                                       onclick="return confirm('Are you sure you want to delete?');"
                                                       class="btn btn-danger">Delete</a>
                                                <?php }


                                                if ($sidebar->document_create == '1') {
                                                    echo $this->Html->link(__('Create ' . ucfirst($settings->document)), ['controller' => 'documents', 'action' => 'add', $clients->id], ['class' => 'btn btn-success']);
                                                }

                                                if ($sidebar->orders_create == '1') {
                                                    echo $this->Html->link(__('Create Order'), ['controller' => 'documents', 'action' => 'addorder', $clients->id], ['class' => 'btn btn-warning']);
                                                }

                                                if ($sidebar->orders_list == '1') {
                                                    echo $this->Html->link(__('View Orders'), ['controller' => 'documents', 'action' => 'index/?client_id=', $clients->id], ['class' => 'btn btn-warning']);
                                                }



                                            ?>
                                        </td>
                                    </tr>

                                <?php
                                } // endif
                            endforeach;

                        ?>
                        </tbody>
                    </table>

                </div>


                <div id="sample_2_paginate" class="dataTables_paginate paging_simple_numbers">


                    <ul class="pagination">
                        <?= $this->Paginator->prev('< ' . __('previous')); ?>
                        <?= $this->Paginator->numbers(); ?>
                        <?= $this->Paginator->next(__('next') . ' >'); ?>
                    </ul>

                </div>
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