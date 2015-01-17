<table width="100%">
    <tr>
        <td><b>Surname</b> : <?php echo $detail['consent']->last_name;?></td>
        <td><b>First name</b> : <?php echo $detail['consent']->first_name;?></td>
     </tr>
     <tr>
        <td><b>Middle name</b> : <?php echo $detail['consent']->mid_name;?></td>
        <td><b>Previous surname(s) or maiden name(s)</b> : <?php echo $detail['consent']->previous_last_name;?></td>
     </tr>
     <tr>
        <td><b>Place of birth</b> : <?php echo $detail['consent']->place_birth_country;?></td>
        <td><b>Date of birth</b> : <?php echo $detail['consent']->birth_date;?></td>
     </tr>   
     <tr>
        <td><b>Sex</b> : <?php echo $detail['consent']->sex;?></td>
        <td><b>Phone number</b> : <?php echo $detail['consent']->phone;?></td>
     </tr>
     <tr>
        <td colspan="2"><b>Current address</b> : <?php echo $detail['consent']->current_street_address.', '.$detail['consent']->current_apt_unit.', '.$detail['consent']->current_city.', '.$detail['consent']->current_province.', '.$detail['consent']->current_postal_code;?></td>
     </tr>
     <tr>
        <td colspan="2"><b>Previous address</b> : <?php echo $detail['consent']->previous_street_address.', '.$detail['consent']->previous_apt_unit.', '.$detail['consent']->previous_city.', '.$detail['consent']->previous_province.', '.$detail['consent']->previous_postal_code;?></td>
     </tr>
     <tr>
        <td><b>Aliases</b> : <?php echo $detail['consent']->aliases;?></td>
        <td><b>Drivers License Number</b> : <?php echo $detail['consent']->driver_license_number;?></td>
     </tr>
     <tr>
        <td><b>Province (Driver's License was issued)</b> : <?php echo $detail['consent']->driver_license_issued;?></td>
        <td><b>Applicants Email</b> : <?php echo $detail['consent']->applicants_email;?></td>
     </tr>
     <tr>
        <td colspan="2">
            <p>I hereby consent to the search of the following:</p>
            <ul>
            <li>Driver Record/ Abstract - Please specify Province or State (Region where Driver's License Issued)</li>
            <li>Insurance History - Please specify Province or State (Region where Driver's License Issued)</li>
            <li>Employment Verifications </li>
            <li>TransClick (Aptitude Test)</li>
            </ul>
            <p>I hereby consent to a criminal record search (Adult) through both the: </p>
            <ul>
            <li>Local Police Records which includes Police Information Portal (PIP) Firearms Interest Person (FIP) and Niche RMS</li>
            <li>RCMP National Repository of Criminal Records which will be conducted based on name(s), date of birth and declared criminal record (as per Section 9.6.4 of the CCRTIS Dissemination policy)</li>
            </ul>
        </td>
        
     </tr>
     <tr>
        <td colspan="2">
            <h4>*Authorization to Release Clearance Report or Any Police Information</h4>
            <p>I certify that the information I have supplied is correct and true to the best of my knowledge. I consent to the release of a Criminal Record or any Criminal Information to ISB Canada and its partners, and to the Organization Requesting Search named below and its designated agents and/or partners. All data is subject to provincial, state, and federal privacy legislation.</p>
            <p>The criminal record search will be performed by a police service. I hereby release and forever discharge all members and employees of the Processing Police Service from any and all actions, claims and demands for damages, loss or injury howsoever arising which may hereafter be sustained by myself or as a result of the disclosure of information by the Processing Police Service to ISB Canada and its partners.</p>
            <p>*I hereby release and forever discharge all agents from any claims, actions demands for damages, injury or loss which may arise as a result of the disclosure of information by any of the information sources including but not limited to the Credit Bureau or Department of Motor Vehicles to the designated agents and/or their partners and representatives. </p>
            <p>*I am aware and I give consent that the records named above may be transmitted electronically or in hard copy within Canada and to the country from where the search was requested as indicated below. By signing this waiver, I acknowledge full understanding of the content on this consent form.</p>
        </td>
        
     </tr>
     <tr>
        <td colspan="2">
            Applicant's Signature- by signing this form you agree and consent to the terms and release of information listed on this form : <?php echo $detail['consent']->applicant_signature_agree;?>
        </td>
        
     </tr>
     <tr>
        <td><b>Company Name Requesting Search</b> : <?php echo $detail['consent']->company_name_requesting;?></td>
        <td><b>Printed Name of Company Witness</b> : <?php echo $detail['consent']->printed_name_company_witness;?></td>
     </tr>
     <tr>
        <td colspan="2"><b>Company Location (Country)</b> : <?php echo $detail['consent']->company_location;?></td>
        <!--<td><b>Signature of Company Witness</b> : <?php echo $detail['consent']->signature_company_witness;?></td>-->
     </tr>
     <tr>
        <td colspan="2">
            <strong>Declaration of Criminal Record</strong><br />
            * When declaration is submitted, it must be accompanied by the Consent for the Release of Police Information form.<br />
            PART 1 - DECLARATION OF CRIMINAL RECORD (if applicable) - Completed by Applicant
        </td>
     </tr>
     <tr>
        <td><b>Surname</b> : <?php echo $detail['consent']->criminal_surname;?></td>
        <td><b>Given Name</b> : <?php echo $detail['consent']->criminal_given_name;?></td>
     </tr>
     <tr>
        <td><b>Sex</b> : <?php echo $detail['consent']->criminal_sex;?></td>
        <td><b>Date of Birth</b> : <?php echo $detail['consent']->criminal_date_birth;?></td>
     </tr>
     <tr>
        <td colspan="2"><b>Current Address</b> : <?php echo $detail['consent']->criminal_current_address.', '.$detail['consent']->criminal_current_province.', '.$detail['consent']->criminal_current_postal_code;?></td>
     </tr>
     
     <tr>
        <!--<td><b>Signature of applicant</b> : <?php echo $detail['consent']->criminal_signature_applicant;?></td>-->
        <td colspan="2"><b>Date</b> : <?php echo $detail['consent']->criminal_date;?></td>
     </tr>
     <tr>
        <td colspan="2">
            <strong>DECLARATION OF CRIMINAL RECORD</strong>
            <ul>
            <li>does not constitute a Certified Criminal Record by the RCMP</li>
            <li>may not contain all criminal record convictions.</li>
            </ul>
            <strong>DO NOT DECLARE THE FOLLOWING:</strong>
            <ul>
            <li>Absolute discharges or Conditional discharges, pursuant to the Criminal Code, section 730.</li>
            <li>Any charges for which you have received a Pardon, pursuant to the Criminal Records Act.</li>
            <li>Any offences while you were a "young person" (twelve years old but less than eighteen years old), pursuant to the Youth Criminal Justice Act.</li>
            <li>Any charges for which you were not convicted, for example, charges that were withdrawn, dismissed, etc.</li>
            <li>Any provincial or municipal offences.</li>
            <li>Any charges dealt with outside of Canada.</li>
            </ul>
            <strong>NOTE:</strong>
            <p>A Certified Criminal Record can only be issued based on the submission of fingerprints to the RCMP National Repository of Criminal Records.</p>
        </td>
     </tr>
     <tr>
        <td colspan="2">
            <table style="width: 100%;">
                <tr><td><strong>Offence</strong></td><td><strong>Date of Sentence</strong></td><td><strong>Location</strong></td></tr>
                <?php
                //var_dump($cri);die();
                if($cri)
                {
                    foreach($cri as $criminal)
                    {
                        ?>
                        <tr><td><?php echo $criminal->offence;?></td><td><?php echo $criminal->date_of_sentence;?></td><td><?php echo $criminal->location;?></td></tr>
                        <?php
                    }                    
                }
                ?>
                
            </table>
        </td>
     </tr>
     
    
</table>
<br />
<strong>Attachments</strong>
<p>&nbsp;</p>
<?php
if($_SERVER['SERVER_NAME']='localhost')
$initials = 'http://localhost';
else
$initials = 'http://isbmee.com';
if($att)
{
    foreach($att as $a)
    {
        ?>
        <img src="<?php echo $initials.$this->request->webroot;?>attachments/<?php echo $a->attach_doc;?>" /><br /><br />
        <?php
    }
}
?>
<p>
<strong>Signature of Driver</strong><br />
<?php if(isset($detail['consent']) && $detail['consent']->criminal_signature_applicant){?><img src="<?php echo $this->request->webroot.'canvas/'.$detail['consent']->criminal_signature_applicant;?>" style="max-width: 100%;" /><?php }?>
</p>
<p>
<strong>Signature of Company Witness</strong><br />
<?php if(isset($detail['consent']) && $detail['consent']->signature_company_witness){?><img src="<?php echo $this->request->webroot.'canvas/'.$detail['consent']->signature_company_witness;?>" style="max-width: 100%;" /><?php }?>
</p>