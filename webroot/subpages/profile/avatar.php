<p>
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                        richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                        brunch. Food truck quinoa nesciunt laborum eiusmod.
                                    </p>
                                <form role="form" action="" method="post">
                                    <div class="form-group">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <img
                                                    <?php if(isset($p->image)){?>
                                                    src="<?php echo $this->request->webroot; ?>img/profile/<?php echo $p->image; ?>"
                                                    <?php
                                                     } 
                                                     else {?>
                                                    src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"
                                                    <?php } ?>
                                                    alt=""/>
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"
                                                 style="max-width: 200px; max-height: 150px;">
                                            </div>
                                            <div>
																<span class="btn default btn-file">
																<span class="fileinput-new">
																Select image </span>
																<span class="fileinput-exists">
																Change </span>
																<input type="file" name="...">
																</span>
                                                <a href="#" class="btn default fileinput-exists"
                                                   data-dismiss="fileinput">
                                                    Remove </a>
                                            </div>
                                        </div>


                                    </div>
                                </form>