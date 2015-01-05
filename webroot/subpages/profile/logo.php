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
                                                        Choose Primary Logo
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
                                                       Choose Secondary Logo
                                                    </div>

                                                </div>
                                                <div class="portlet-body">

                                                    <form action="<?php echo $this->request->webroot; ?>logos/secondary"
                                                          method="post" class="form-inline" role="form">
                                                        <?php foreach ($logos1 as $logo) { 
                                                            
                                                                                                                        ?>
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