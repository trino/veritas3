 <?php
                                                $i=0;
                                                foreach($profiles as $r)
                                                {
                                                    //echo $r->username;continue;
                                                    if($i%2==0)
                                                    {
                                                        ?>
                                                        <tr>
                                                        <?php
                                                    }
                                                    ?>
                                                   
                                                    <td>
                                                        <span><input type="checkbox" name="profile_id[]" <?php if(in_array($r->id,$profile)){?>checked="checked"<?php }?> value="<?php echo $r->id; ?>"/></span>
                                                        <span> <?php echo $r->username; ?> </span>
                                                    </td>
                                                <?php
                                                
                                                 if(($i+1)%2==0)
                                                {
                                                 ?>
                                                 </tr>
                                                 <?php
                                                }
                                                
                                                $i++;
                                                }
                                                if(($i+1)%2!=0)
                                                {
                                                    echo "</td></tr>";
                                                }
                                                ?>