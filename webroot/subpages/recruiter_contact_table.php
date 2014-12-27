<?php 
$recruiter = $this->requestAction('Profiles/getRecruiter');
$contact =  $this->requestAction('Profiles/getContact');
?>

<table class="table table-striped table-bordered table-advance table-hover">
                                                <thead><tr><th colspan="2">Add Recruiters</th></tr></thead> 
                                                             
                                                <?php
                                                $i=0;
                                                $j=0;
                                                foreach($recruiter as $r)
                                                {
                                                    if($i%2==0)
                                                    {
                                                        ?>
                                                        <tr>
                                                        <?php
                                                    }
                                                    ?>
                                                   
                                                    <td>
                                                        <span><input type="checkbox" name="recruiter_id[]" value="<?php echo $r->id; ?>" <?php if(in_array($r->id,$recruit_id)){?>checked="checked"<?php } ?> /></span>
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
                                                
                                            </table>

<table class="table table-striped table-bordered table-advance table-hover">
                                                <thead><tr><th colspan="2">Add Contacts</th></tr></thead>             
                                                <?php
                                                $i=0;
                                                foreach($contact as $r)
                                                {
                                                    if($i%2==0)
                                                    {
                                                        ?>
                                                        <tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <td>
                                                        <span><input type="checkbox" name="contact_id[]" value="<?php echo $r->id; ?>" <?php if(in_array($r->id,$cont_id)){?>checked="checked"<?php } ?> /></span>
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
                                            </table>
