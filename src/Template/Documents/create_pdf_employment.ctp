 <?php
 //debug($att);die();
ob_start();
require_once('tcpdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator('ISBMEE');
$pdf->SetAuthor($this->request->session()->read('Profile.username'));
$pdf->SetTitle('Employment Verification Form');
$pdf->SetSubject('Orders');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
//echo PDF_FONT_MONOSPACED;die();
//$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Employment Verification Form '.$detail['consent']->order_id, 'by '.$this->request->session()->read('Profile.username'), array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 10, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print
if($_SERVER['SERVER_NAME']='localhost')
$initials = 'http://localhost';
else
$initials = 'http://isbmee.com';
//$html = file_get_contents($initials.$this->request->webroot.'pdfs/getEmployment/'.$detail['consent']->order_id);
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
                if(isset($detail['consent']) && $detail['consent'])
                {
                    
                    foreach($detail['consent'] as $emp)
                    {
                            $pdf->Cell(80, 5, 'Company Name');
                            $pdf->TextField('company_name', 50, 5,array(),array('v'=>$emp->company_name, 'dv'=>$emp->company_name));
                            $pdf->Ln(6);
                            
                            $pdf->Cell(80, 5, 'Address');
                            $pdf->TextField('address', 50, 5,array(),array('v'=>$emp->address, 'dv'=>$emp->address));
                            $pdf->Ln(6);
                        
                            $pdf->Cell(80, 5, 'City');
                            $pdf->TextField('city', 50, 5,array(),array('v'=>$emp->city, 'dv'=>$emp->city));
                            $pdf->Ln(6);
                            
                            $pdf->Cell(80, 5, 'State/Province');
                            $pdf->TextField('state_province', 50, 5,array(),array('v'=>$emp->state_province, 'dv'=>$emp->state_province));
                            $pdf->Ln(6);   
                               
                            $pdf->Cell(80, 5, 'Country');
                            $pdf->TextField('country', 50, 5,array(),array('v'=>$emp->country, 'dv'=>$emp->country));
                            $pdf->Ln(6);  
                            
                            $pdf->Cell(80, 5, 'Supervisor\'s Name');
                            $pdf->TextField('supervisor_name', 50, 5,array(),array('v'=>$emp->supervisor_name, 'dv'=>$emp->supervisor_name));
                            $pdf->Ln(6);
                            
                            $pdf->Cell(80, 5, 'Phone #');
                            $pdf->TextField('supervisor_phone', 50, 5,array(),array('v'=>$emp->supervisor_phone, 'dv'=>$emp->supervisor_phone));
                            $pdf->Ln(6);
                            
                            $pdf->Cell(80, 5, 'Supervisor\'s Email');
                            $pdf->TextField('supervisor_email', 50, 5,array(),array('v'=>$emp->supervisor_email, 'dv'=>$emp->supervisor_email));
                            $pdf->Ln(6);
                            
                            $pdf->Cell(80, 5, 'Secondary Email');
                            $pdf->TextField('supervisor_secondary_email', 50, 5,array(),array('v'=>$emp->supervisor_secondary_email, 'dv'=>$emp->supervisor_secondary_email));
                            $pdf->Ln(6);
                            
                            $pdf->Cell(80, 5, 'Employment Start Date');
                            $pdf->TextField('employment_start_date', 50, 5,array(),array('v'=>$emp->employment_start_date, 'dv'=>$emp->employment_start_date));
                            $pdf->Ln(6);
                            
                            $pdf->Cell(80, 5, 'Employment End Date');
                            $pdf->TextField('employment_end_date', 50, 5,array(),array('v'=>$emp->employment_end_date, 'dv'=>$emp->employment_start_date));
                            $pdf->Ln(6);
                            
                            $pdf->Cell(80, 5, 'Employment End Date');
                            $pdf->TextField('employment_end_date', 50, 5,array(),array('v'=>$emp->employment_end_date, 'dv'=>$emp->employment_start_date));
                            $pdf->Ln(6);
                            
                            $pdf->Cell(80, 5, 'Claims with this Employer');
                            $pdf->TextField('claims_with_employer', 50, 5,array(),array('v'=>($emp->claims_with_employer==1)?"Yes":"No", 'dv'=>($emp->claims_with_employer==1)?"Yes":"No"));
                            $pdf->Ln(6);   
                            
                            $pdf->Cell(80, 5, 'Date Claims Occured');
                            $pdf->TextField('claims_recovery_date', 50, 5,array(),array('v'=>$emp->claims_recovery_date, 'dv'=>$emp->claims_recovery_date));
                            $pdf->Ln(6); 
                            
                            $pdf->Cell(80, 5, 'Employment history confirmed by (Verifier Use Only)');
                            $pdf->TextField('emploment_history_confirm_verify_use', 50, 5,array(),array('v'=>$emp->emploment_history_confirm_verify_use, 'dv'=>$emp->emploment_history_confirm_verify_use));
                            $pdf->Ln(6);  
                            
                            $pdf->Cell(80, 5, 'US DOT MC/MX#');
                            $pdf->TextField('us_dot', 50, 5,array(),array('v'=>$emp->us_dot, 'dv'=>$emp->us_dot));
                            $pdf->Ln(6); 
                            
                            $pdf->Cell(80, 5, 'Signature');
                            $pdf->TextField('signature', 50, 5,array(),array('v'=>$emp->signature, 'dv'=>$emp->signature));
                            $pdf->Ln(6); 
                            
                            $pdf->Cell(80, 5, 'Date');
                            $pdf->TextField('signature_datetime', 50, 5,array(),array('v'=>$emp->signature_datetime, 'dv'=>$emp->signature_datetime));
                            $pdf->Ln(6);
                             
                            $equipment_vans = ['','Vans','Reefers','Super B\'s','Straight Truck'];
                            $pdf->Cell(80, 5, 'Equipment Operated');
                            $pdf->TextField('equipment_vans', 50, 5,array(),array('v'=>$equipment_vans[$emp->equipment_vans], 'dv'=>$equipment_vans[$emp->equipment_vans]));
                            $pdf->Ln(6); 
                            
                            
                            $driving_experince_local = ['','Local','Canada','Canada : Rocky Mountains','USA'];
                            $pdf->Cell(80, 5, 'Driving Experience');
                            $pdf->TextField('driving_experince_local', 50, 5,array(),array('v'=>$driving_experince_local[$emp->driving_experince_local], 'dv'=>$driving_experince_local[$emp->driving_experince_local]));
                            $pdf->Ln(6);   
               
                    }
                    
                }
                
               $attach = "<br/><br/><strong>Attachments</strong>
                <br/>
                ";
if($_SERVER['SERVER_NAME']='localhost')
                $initials = 'http://localhost';
                else
                $initials = 'http://isbmee.com';
                
                if($att)
                {
                    foreach($att as $a)
                    {
                    
                        $attach = $attach."<p><img src=\"".$initials.$this->request->webroot."attachments/".$a->attach_doc."\" /><br /></p>";
                    }
                }



// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
ob_end_clean();
$pdf->Output('EmplyomentForm'.rand(100000000,999999999).'.pdf', 'F');

//============================================================+
// END OF FILE
//============================================================+
