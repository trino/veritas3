<?php
$proxyhost = 'https://infosearchsite.com/MEEEEWS/ISBService.svc?wsdl';

$client = new nusoap_client($proxyhost, true, $proxyhost, $proxyport = null, $proxyusername = null, $proxypassword = null);

$client->useHTTPPersistentConnection();

if(true){
//StartOrder


echo $body = '&lt;ProductData&gt;&lt;isb_FN&gt;'.  $driverinfo->fname .'&lt;/isb_FN&gt;&lt;isb_LN&gt;'. $driverinfo->lname.
    '&lt;/isb_LN&gt;&lt;isb_Ref&gt;MEETEST-777&lt;/isb_Ref&gt;&lt;isb_DOL&gt;'. date("Y-m-d") .
    '&lt;/isb_DOL&gt;&lt;isb_Prov&gt;'. $driverinfo->driver_province.'&lt;/isb_Prov&gt;&lt;isb_UserID&gt;'.$driverinfo->id.'&lt;/isb_UserID&gt;&lt;/ProductData&gt;';

echo $urlDecodedStr  = rawurldecode($body);

$soap_xml ='<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
<soap:Body>
<StartOrder xmlns="http://tempuri.org/">
<IntPackage>'.$body.'</IntPackage>
<tp>MEE</tp>
<prod>true</prod>
</StartOrder>
</soap:Body></soap:Envelope>';

$result = $client->call('StartOrder',$soap_xml );

$myArray = explode(',', $result['StartOrderResult']);

$this->requestAction('/documents/save_webservice_ids/' . $orderid . '/'.substr($myArray[0], 4).'/' .substr($myArray[1], 4));

 $ins_id =substr($myArray[0], 4);
 $ebs_id =substr($myArray[1], 4);
//$str2 = substr($str, 4)
}



if(true){
//ProductDetails
//remove ins or  ebs
//Product 79 – INS

$soap_xml ='<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
<soap:Body><ProductDetails xmlns="http://tempuri.org/">'.

'<UID>'.$ins_id.'</UID><productdetails>&lt;ProductData&gt;&lt;isb_FirstName&gt;'. $driverinfo->fname.'&lt;/isb_FirstName&gt;&lt;isb_LastName&gt;'. $driverinfo->lname.'&lt;/isb_LastName&gt;&lt;isb_DriverLicence&gt;'. $driverinfo->driver_license_no.'&lt;/isb_DriverLicence&gt;&lt;isb_USDOT_MC&gt;11&lt;/isb_USDOT_MC&gt;&lt;/ProductData&gt;'

.'</productdetails><productID>79</productID><tp>INS</tp><prod>true</prod></ProductDetails></soap:Body></soap:Envelope>';

$result = $client->call('ProductDetails',$soap_xml );

$r = explode('[', $result['ProductDetailsResult']);
if (isset($r[1])){
$r = explode(']', $r[1]);
}

$this->requestAction('/documents/save_ins_pdi/' . $orderid . '/'.  $r[0]);

debug($result);
}



if(true){
//ProductDetails
//Product 1 – INS

$soap_xml ='<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
<soap:Body><ProductDetails xmlns="http://tempuri.org/">'.

'<UID>'.$ins_id.'</UID><productdetails>&lt;ProductData&gt;&lt;isb_aucodes&gt;AU03&lt;/isb_aucodes&gt;&lt;isb_FirstName&gt;'. $driverinfo->fname.'&lt;/isb_FirstName&gt;&lt;isb_LastName&gt;'. $driverinfo->lname.'&lt;/isb_LastName&gt;&lt;isb_DOB&gt;12/2/1960&lt;/isb_DOB&gt;&lt;isb_DriverLicence&gt;'. $driverinfo->driver_license_no.'&lt;/isb_DriverLicence&gt;&lt;isb_provToSearch&gt;'. $driverinfo->driver_province.'&lt;/isb_provToSearch&gt;&lt;/ProductData&gt;'

.'</productdetails><productID>1</productID><tp>INS</tp><prod>true</prod></ProductDetails></soap:Body></soap:Envelope>';

$result = $client->call('ProductDetails',$soap_xml );


debug($result);
}



 if(true){
//ProductDetails
//Product 14 – INS

  $soap_xml ='<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
<soap:Body><ProductDetails xmlns="http://tempuri.org/">'.

'<UID>'.$ins_id.'</UID><productdetails>&lt;ProductData&gt;&lt;isb_FirstName&gt;'. $driverinfo->fname.'&lt;/isb_FirstName&gt;&lt;isb_LastName&gt;'. $driverinfo->lname.'&lt;/isb_LastName&gt;&lt;isb_DOB&gt;12/2/1960&lt;/isb_DOB&gt;&lt;isb_aucodes14&gt;AU03&lt;/isb_aucodes14&gt;&lt;isb_CVORType&gt;Commercial Vehicle Operator Record Driver Abstract (on drivers)&lt;/isb_CVORType&gt;&lt;isb_DriverLicence&gt;'. $driverinfo->driver_license_no.'&lt;/isb_DriverLicence&gt;&lt;isb_provToSearch&gt;'. $driverinfo->driver_province.'&lt;/isb_provToSearch&gt;&lt;/ProductData&gt;'
      .'</productdetails><productID>14</productID><tp>INS</tp><prod>true</prod></ProductDetails></soap:Body></soap:Envelope>';

  $result = $client->call('ProductDetails',$soap_xml );


  debug($result);
 }



 if(true){
//ProductDetails
//Product 77 – INS

  $soap_xml ='<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
<soap:Body><ProductDetails xmlns="http://tempuri.org/">'.

'<UID>'.$ins_id.'</UID><productdetails>&lt;ProductData&gt;&lt;isb_FirstName&gt;'. $driverinfo->fname.'&lt;/isb_FirstName&gt;&lt;isb_LastName&gt;'. $driverinfo->lname.'&lt;/isb_LastName&gt;&lt;isb_DOB&gt;12/2/1960&lt;/isb_DOB&gt;&lt;isb_DriverLicence&gt;'. $driverinfo->driver_license_no.'&lt;/isb_DriverLicence&gt;&lt;isb_provToSearch&gt;'. $driverinfo->driver_province.'&lt;/isb_provToSearch&gt;&lt;/ProductData&gt;'
      .'</productdetails><productID>77</productID><tp>INS</tp><prod>true</prod></ProductDetails></soap:Body></soap:Envelope>';

  $result = $client->call('ProductDetails',$soap_xml );


  debug($result);
 }



if(true){
//ProductDetails
//Product 78 – INS

$soap_xml ='<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
<soap:Body><ProductDetails xmlns="http://tempuri.org/">'.

'<UID>'.$ins_id.'</UID><productdetails>&lt;ProductData&gt;&lt;isb_FirstName&gt;'. $driverinfo->fname.'&lt;/isb_FirstName&gt;&lt;isb_LastName&gt;'. $driverinfo->lname.'&lt;/isb_LastName&gt;&lt;isb_provToSearch&gt;'. $driverinfo->driver_province.'&lt;/isb_provToSearch&gt;&lt;isb_Email&gt;hsidhu@isbc.ca&lt;/isb_Email&gt;&lt;/ProductData&gt;'
.'</productdetails><productID>78</productID><tp>INS</tp><prod>true</prod></ProductDetails></soap:Body></soap:Envelope>';

$result = $client->call('ProductDetails',$soap_xml );


debug($result);
}











 /////////ebs





 if(true){
//ProductDetails
//Product 1650 -  EBS -  education

  $soap_xml ='<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
<soap:Body><ProductDetails xmlns="http://tempuri.org/">'.
'<UID>'.$ebs_id.'</UID><productdetails>&lt;ProductData&gt;&lt;isb_appfirstname&gt;a1aaq2bernard&lt;/isb_appfirstname&gt;&lt;isb_appsurname&gt;1q2naaormington&lt;/isb_appsurname&gt;&lt;isb_provToSearch&gt;'. $driverinfo->driver_province.'&lt;/isb_provToSearch&gt;&lt;isb_DOB&gt;12/2/1961&lt;/isb_DOB&gt;&lt;/ProductData&gt;'
      .'</productdetails><productID>1650</productID><tp>EBS</tp><prod>true</prod></ProductDetails></soap:Body></soap:Envelope>';


  $result = $client->call('ProductDetails',$soap_xml );

  $r = explode('[', $result['ProductDetailsResult']);
  if (isset($r[1])){
   $r = explode(']', $r[1]);
  }

  $this->requestAction('/documents/save_ebs_pdi/' . $orderid . '/'.  $r[0]);

  debug($result);
 }







 if(true){
//ProductDetails
//Product 1627 – EBS – employment Verification

  $soap_xml ='<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
<soap:Body><ProductDetails xmlns="http://tempuri.org/">'.
      '<UID>'.$ebs_id.'</UID><productdetails>&lt;ProductData&gt;&lt;isb_appfirstname&gt;a1qaa2bernard&lt;/isb_appfirstname&gt;&lt;isb_appsurname&gt;12noaarmington&lt;/isb_appsurname&gt;&lt;isb_provToSearch&gt;'. $driverinfo->driver_province.'&lt;/isb_provToSearch&gt;&lt;isb_DOB&gt;12/2/1974&lt;/isb_DOB&gt;&lt;/ProductData&gt;'
      .'</productdetails><productID>1627</productID><tp>EBS</tp><prod>true</prod></ProductDetails></soap:Body></soap:Envelope>';

  $result = $client->call('ProductDetails',$soap_xml );


  debug($result);
 }








 if(true){
//ProductDetails
//Product 1603 – EBS -  consent form with id

  $soap_xml ='<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
<soap:Body><ProductDetails xmlns="http://tempuri.org/">'.
 '<UID>'.$ebs_id.'</UID><productdetails>&lt;ProductData&gt;&lt;isb_appothername&gt;a1aaaaq2normington&lt;/isb_appothername &gt;&lt;isb_DOB&gt;12/2/1953&lt;/isb_DOB&gt;&lt;isb_Sex&gt;Male&lt;/isb_Sex&gt;&lt;/ProductData&gt;'
       .'</productdetails><productID>1603</productID><tp>EBS</tp><prod>true</prod></ProductDetails></soap:Body></soap:Envelope>';

  $result = $client->call('ProductDetails',$soap_xml );


  debug($result);
 }
















 if(true){
//UploadBinary
//265

  $pdf_content = '';
  $pdf_decoded = base64_decode ($pdf_content);
  $pdf = file_get_contents('a1.pdf');
  $body = base64_encode($pdf);
  echo $urlDecodedStr  = rawurldecode($body);
  $soap_xml ='<?xml version="1.0" encoding="utf-8"?><soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema"><soap:Body><UploadBinaryFile xmlns="http://tempuri.org/">'.
  '<UID>'.$ebs_id.'</UID><PDI>269</PDI><FileData>'.$body.'</FileData><productID>1650</productID><Filename>test.pdf</Filename><FileType>ConsentForm</FileType><tp>INS</tp><prod>true</prod></UploadBinaryFile></soap:Body></soap:Envelope>';
  $result = $client->call('UploadBinaryFile',$soap_xml );

 }
















/*
if ($client->fault) {
echo '<h2>Fault</h2><pre>';
print_r($result);
echo '</pre>';
} else {
$err = $client->getError();
if ($err) {
echo '<h2>Error</h2><pre>' . $err . '</pre>';
} else {
echo '<h2>Result</h2><pre>';
print_r($result);
echo '</pre>';
}
}

echo '<h2>Request</h2><pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2><pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
echo '<h2>Debug</h2><pre>' . htmlspecialchars($client->getDebug(), ENT_QUOTES) . '</pre>';

$client->clearDebug();
*/
?>
