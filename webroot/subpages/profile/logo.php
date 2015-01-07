

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
                                            <div class="portlet solid blue  ">

                                                <div class="portlet-body">

                                                    <form action="<?php echo $this->request->webroot; ?>logos"
                                                          method="post" class="form-inline" role="form">


                                                        <?php foreach ($logos as $logo) { ?>




<div class="col-md-4 margin-top-20">
<div class="form-group" style="height:100px;">
<input type="radio" value="<?php echo $logo->id; ?>" name="logo" <?php echo ($logo->active == '1') ? "checked='checked'" : ""; ?>/>
<img style="max-width:90%;" src="<?php echo $this->request->webroot; ?>img/logos/<?php echo $logo->logo; ?>" />
</div>
</div>




                                                        <?php } ?>

                                                        <div class="clearfix"></div>


                                                        <input type="submit" class="btn btn-success" value="submit" name="submit"/>
                                                    </form>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="subtab_1_2">
                                            <div class="portlet solid blue ">

                                                <div class="portlet-body">

                                                    <form action="<?php echo $this->request->webroot; ?>logos/secondary"
                                                          method="post" class="form-inline" role="form">
                                                        <?php foreach ($logos1 as $logo) { 
                                                            
                                                                                                                        ?>


                                                            <div class="col-md-4 margin-top-20">
                                                                <div class="form-group" style="height:100px;">
<input type="radio" value="<?php echo $logo->id; ?>" name="logo" <?php echo ($logo->active == '1') ? "checked='checked'" : ""; ?> />
<img style="max-width:90%;" src="<?php echo $this->request->webroot; ?>img/logos/<?php echo $logo->logo; ?>"             />
</div>
</div>




                                                        <?php } ?>

                                                        <div class="clearfix"></div>

                                                        <input type="submit" class="btn btn-success" value="submit"
                                                               name="submit"/>
                                                    </form>


                                                </div>
                                            </div>
                                        </div>

                                    </div>