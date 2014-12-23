<?php 
$recruiter = $this->requestAction('Profiles/getRecruiter');
$contact =  $this->requestAction('Profiles/getContact');
?>
<table class="table table-striped table-bordered table-advance table-hover">
                                                <thead><tr><th colspan="2">Add Recruiters</th></tr></thead> 
                                                <tr>             
                                                <?php
                                                $i=0;
                                                foreach($recruiter as $r)
                                                {
                                                    ?>
                                                   
                                                    <td>
                                                        <div class="checker">
                                                        <span><input type="checkbox" name="<?php //echo $recruiter_id[];?>"/></span>
                                                        </div>
                                                        <span> <?php echo $r->username; ?> </span>
                                                    
                                                <?php
                                                 if(($i+1)%2==0)
                                                {
                                                   echo '</td><td>';
                                                }
                                                else 
                                                echo '</td></tr><tr>';
                                                $i++;
                                                }
                                                ?>
                                                </tr>
                                            </table>

<table class="table table-striped table-bordered table-advance table-hover">
                                                <thead><tr><th colspan="2">Add Contacts</th></tr></thead>             
                                                <?php
                                                $i=0;
                                                foreach($contact as $r)
                                                {
                                                    ?>
                                                    
                                                <tr>
                                                    <td>
                                                        <div class="checker">
                                                        <span><input type="checkbox" name="canView_contracts"/></span>
                                                        </div>
                                                        <span> <?php echo $r->username; ?> </span>
                                                    </td>
                                                    
                                                <?php
                                                 if(($i+1)%2==0)
                                                {
                                                   ?>
                                                   <td>
                                                        <div class="checker">
                                                        <span><input type="checkbox" name="canView_contracts"/></span>
                                                        </div>
                                                        <span> <?php echo $r->username; ?> </span>
                                                    </td>
                                                   <?php
                                                }
                                                $i++;
                                                }
                                                ?>
                                                </tr>
                                            </table>