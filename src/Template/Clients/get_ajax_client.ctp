<tbody>
<?php

                                
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
                            </tbody>