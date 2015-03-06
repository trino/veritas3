<?php

    $proxyhost = 'https://infosearchsite.com/MEEWS/ISBService.svc?wsdl';
    $client = new nusoap_client($proxyhost, true, $proxyhost, $proxyport = null, $proxyusername = null, $proxypassword = null);
    $client->useHTTPPersistentConnection();

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $startorder1 = true;

    $productdetails79 = false;
    $productdetails1 = false;
    $productdetails14 = false;
    $productdetails77 = false;
    $productdetails78 = false;

    $productdetailsebs1603 = false;
    $productdetailsebs1627 = false;
    $productdetailsebs1650 = false;

    $uploadbinaryconsent_1603 = false;
    $uploadbinaryemployment_1627 = false;
    $uploadbinaryeducation_1650 = false;

    $upload_additional = false;

    if ($startorder1) {

        $user_id234 = $this->Session->read('Profile.isb_id');
        if (isset($user_id234) && $user_id234 != "") {
            $user_id234 = $this->Session->read('Profile.isb_id');
        } else {
            $user_id234 = '22552';
        }

if($_SERVER['SERVER_NAME'] != "www.isbmeereports.com") {
    $user_id234 = '22552';
   echo $_SERVER['SERVER_NAME'];
}

        $body = '&lt;ProductData&gt;&lt;isb_FN&gt;' . $driverinfo->fname . '&lt;/isb_FN&gt;&lt;isb_LN&gt;' . $driverinfo->lname .
            '&lt;/isb_LN&gt;&lt;isb_Ref&gt;MEETEST-777&lt;/isb_Ref&gt;&lt;isb_DOL&gt;' . date("Y-m-d") .
            '&lt;/isb_DOL&gt;&lt;isb_Prov&gt;' . $driverinfo->driver_province . '&lt;/isb_Prov&gt;&lt;isb_UserID&gt;' . $user_id234 . '&lt;/isb_UserID&gt;&lt;/ProductData&gt;';

        $soap_xml = '<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
<soap:Body><StartOrder xmlns="http://tempuri.org/"><IntPackage>'
            . $body .
            '</IntPackage><tp>'.$ordertype.'</tp><prod>true</prod></StartOrder></soap:Body></soap:Envelope>';

        $result = $client->call('StartOrder', $soap_xml);
        debug($result);

        $myArray = explode(',', $result['StartOrderResult']);

        $ins_id = substr($myArray[0], 4);
        $ebs_id = substr($myArray[1], 4);

        $this->requestAction('orders/save_webservice_ids/' . $orderid . '/' . $ins_id . '/' . $ebs_id);

    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    if ($productdetails79) {  //this product only goes with mee order, (bright planet)

        $soap_xml = '<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
<soap:Body><ProductDetails xmlns="http://tempuri.org/">' .

            '<UID>' . $ins_id . '</UID><productdetails>&lt;ProductData&gt;&lt;isb_FirstName&gt;' . $driverinfo->fname . '&lt;/isb_FirstName&gt;&lt;isb_LastName&gt;' . $driverinfo->lname . '&lt;/isb_LastName&gt;&lt;isb_DriverLicence&gt;' . $driverinfo->driver_license_no . '&lt;/isb_DriverLicence&gt;&lt;isb_USDOT_MC&gt;11&lt;/isb_USDOT_MC&gt;&lt;/ProductData&gt;'
            . '</productdetails><productID>79</productID><tp>INS</tp><prod>true</prod></ProductDetails></soap:Body></soap:Envelope>';
        $result = $client->call('ProductDetails', $soap_xml);

        $r = explode('[', $result['ProductDetailsResult']);
        if (isset($r[1])) {
            $r = explode(']', $r[1]);
        }
        $pdi = $r[0];
        $this->requestAction('orders/save_pdi/' . $orderid . '/' . $pdi . '/ins_79');
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if ($productdetails1) { // MVR

        $soap_xml = '<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
<soap:Body><ProductDetails xmlns="http://tempuri.org/">' . '<UID>' . $ins_id . '</UID><productdetails>&lt;ProductData&gt;&lt;isb_aucodes&gt;AU03&lt;/isb_aucodes&gt;&lt;isb_FirstName&gt;' . $driverinfo->fname . '&lt;/isb_FirstName&gt;&lt;isb_LastName&gt;' . $driverinfo->lname . '&lt;/isb_LastName&gt;&lt;isb_DOB&gt;' . $driverinfo->dob . '&lt;/isb_DOB&gt;&lt;isb_DriverLicence&gt;' . $driverinfo->driver_license_no . '&lt;/isb_DriverLicence&gt;&lt;isb_provToSearch&gt;' . $driverinfo->driver_province . '&lt;/isb_provToSearch&gt;&lt;/ProductData&gt;' . '</productdetails><productID>1</productID><tp>INS</tp><prod>true</prod></ProductDetails></soap:Body></soap:Envelope>';

        $result = $client->call('ProductDetails', $soap_xml);
        $r = explode('[', $result['ProductDetailsResult']);
        if (isset($r[1])) {
            $r = explode(']', $r[1]);
        }

        $pdi = $r[0];

        $this->requestAction('orders/save_pdi/' . $orderid . '/' . $pdi . '/ins_1');

    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if ($productdetails14) { //CVOR

        $soap_xml = '<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
<soap:Body><ProductDetails xmlns="http://tempuri.org/">' .

            '<UID>' . $ins_id . '</UID><productdetails>&lt;ProductData&gt;&lt;isb_FirstName&gt;' . $driverinfo->fname . '&lt;/isb_FirstName&gt;&lt;isb_LastName&gt;' . $driverinfo->lname . '&lt;/isb_LastName&gt;&lt;isb_DOB&gt;' . $driverinfo->dob . '&lt;/isb_DOB&gt;&lt;isb_aucodes14&gt;AU03&lt;/isb_aucodes14&gt;&lt;isb_CVORType&gt;Commercial Vehicle Operator Record Driver Abstract (on drivers)&lt;/isb_CVORType&gt;&lt;isb_DriverLicence&gt;' . $driverinfo->driver_license_no . '&lt;/isb_DriverLicence&gt;&lt;isb_provToSearch&gt;' . $driverinfo->driver_province . '&lt;/isb_provToSearch&gt;&lt;/ProductData&gt;' . '</productdetails><productID>14</productID><tp>INS</tp><prod>true</prod></ProductDetails></soap:Body></soap:Envelope>';

        $result = $client->call('ProductDetails', $soap_xml);
        //get between
        $r = explode('[', $result['ProductDetailsResult']);
        if (isset($r[1])) {
            $r = explode(']', $r[1]);
        }

        $pdi = $r[0];

        $this->requestAction('orders/save_pdi/' . $orderid . '/' . $pdi . '/ins_14');
        debug($result);
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if ($productdetails77) { // Pre-employment Screening Program Report

        $soap_xml = '<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
<soap:Body><ProductDetails xmlns="http://tempuri.org/">' .

            '<UID>' . $ins_id . '</UID><productdetails>&lt;ProductData&gt;&lt;isb_FirstName&gt;' . $driverinfo->fname . '&lt;/isb_FirstName&gt;&lt;isb_LastName&gt;' . $driverinfo->lname . '&lt;/isb_LastName&gt;&lt;isb_DOB&gt;' . $driverinfo->dob . '&lt;/isb_DOB&gt;&lt;isb_DriverLicence&gt;' . $driverinfo->driver_license_no . '&lt;/isb_DriverLicence&gt;&lt;isb_provToSearch&gt;' . $driverinfo->driver_province . '&lt;/isb_provToSearch&gt;&lt;/ProductData&gt;' . '</productdetails><productID>77</productID><tp>INS</tp><prod>true</prod></ProductDetails></soap:Body></soap:Envelope>';

        $result = $client->call('ProductDetails', $soap_xml);
        //get between
        $r = explode('[', $result['ProductDetailsResult']);
        if (isset($r[1])) {
            $r = explode(']', $r[1]);
        }
        $pdi = $r[0];

        $this->requestAction('orders/save_pdi/' . $orderid . '/' . $pdi . '/ins_77');
        debug($result);
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if ($productdetails78) { //transclick

        if (isset($driverinfo->email) && $driverinfo->email != "") {
        } else {
            $driverinfo->email = "test@isbmee.com";
        }

        $soap_xml = '<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
<soap:Body><ProductDetails xmlns="http://tempuri.org/">' . '<UID>' . $ins_id . '</UID><productdetails>&lt;ProductData&gt;&lt;isb_FirstName&gt;' . $driverinfo->fname . '&lt;/isb_FirstName&gt;&lt;isb_LastName&gt;' . $driverinfo->lname . '&lt;/isb_LastName&gt;&lt;isb_provToSearch&gt;' . $driverinfo->driver_province . '&lt;/isb_provToSearch&gt;&lt;isb_Email&gt;' . $driverinfo->email . '&lt;/isb_Email&gt;&lt;/ProductData&gt;' . '</productdetails><productID>78</productID><tp>INS</tp><prod>true</prod></ProductDetails></soap:Body></soap:Envelope>';

        $result = $client->call('ProductDetails', $soap_xml);
        //get between
        $r = explode('[', $result['ProductDetailsResult']);
        if (isset($r[1])) {
            $r = explode(']', $r[1]);
        }

        $pdi = $r[0];

        $this->requestAction('orders/save_pdi/' . $orderid . '/' . $pdi . '/ins_78');
        debug($result);
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if ($productdetailsebs1650) { // Certification

        $soap_xml = '<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
<soap:Body><ProductDetails xmlns="http://tempuri.org/">' . '<UID>' . $ebs_id . '</UID><productdetails>&lt;ProductData&gt;&lt;isb_appfirstname&gt;a1aaq2bernard&lt;/isb_appfirstname&gt;&lt;isb_appsurname&gt;1q2naaormington&lt;/isb_appsurname&gt;&lt;isb_provToSearch&gt;' . $driverinfo->driver_province . '&lt;/isb_provToSearch&gt;&lt;isb_DOB&gt;' . $driverinfo->dob . '&lt;/isb_DOB&gt;&lt;/ProductData&gt;' . '</productdetails><productID>1650</productID><tp>EBS</tp><prod>true</prod></ProductDetails></soap:Body></soap:Envelope>';

        $result = $client->call('ProductDetails', $soap_xml);
        //get between
        $r = explode('[', $result['ProductDetailsResult']);
        if (isset($r[1])) {
            $r = explode(']', $r[1]);
        }

        $pdi = $r[0];
        $pdi_1650 = $r[0];

        $this->requestAction('orders/save_pdi/' . $orderid . '/' . $pdi . '/ebs_1650');
        debug($result);
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if ($productdetailsebs1627) { //LOE

        $soap_xml = '<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
<soap:Body><ProductDetails xmlns="http://tempuri.org/">' . '<UID>' . $ebs_id . '</UID><productdetails>&lt;ProductData&gt;&lt;isb_appfirstname&gt;a1qaa2bernard&lt;/isb_appfirstname&gt;&lt;isb_appsurname&gt;12noaarmington&lt;/isb_appsurname&gt;&lt;isb_provToSearch&gt;' . $driverinfo->driver_province . '&lt;/isb_provToSearch&gt;&lt;isb_DOB&gt;' . $driverinfo->dob . '&lt;/isb_DOB&gt;&lt;/ProductData&gt;' . '</productdetails><productID>1627</productID><tp>EBS</tp><prod>true</prod></ProductDetails></soap:Body></soap:Envelope>';

        $result = $client->call('ProductDetails', $soap_xml);
        //get between
        $r = explode('[', $result['ProductDetailsResult']);
        if (isset($r[1])) {
            $r = explode(']', $r[1]);
        }

        $pdi = $r[0];
        $pdi_1627 = $r[0];

        $this->requestAction('orders/save_pdi/' . $orderid . '/' . $pdi . '/ebs_1627');
        debug($result);
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if ($productdetailsebs1603) { //Premium check

        $soap_xml = '<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
<soap:Body><ProductDetails xmlns="http://tempuri.org/">' . '<UID>' . $ebs_id . '</UID><productdetails>&lt;ProductData&gt;&lt;isb_appothername&gt;a1aaaaq2normington&lt;/isb_appothername &gt;&lt;isb_DOB&gt;' . $driverinfo->dob . '&lt;/isb_DOB&gt;&lt;isb_Sex&gt;Male&lt;/isb_Sex&gt;&lt;/ProductData&gt;' . '</productdetails><productID>1603</productID><tp>EBS</tp><prod>true</prod></ProductDetails></soap:Body></soap:Envelope>';

        $result = $client->call('ProductDetails', $soap_xml);
        //get between
        $r = explode('[', $result['ProductDetailsResult']);
        if (isset($r[1])) {
            $r = explode(']', $r[1]);
        }

        $pdi = $r[0];
        $pdi_1603 = $r[0];

        $this->requestAction('orders/save_pdi/' . $orderid . '/' . $pdi . '/ebs_1603');
        debug($result);
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    if ($uploadbinaryconsent_1603) {

        $pdf_content = '';
        $pdf_decoded = base64_decode($pdf_content);
        $pdf = file_get_contents('orders/order_' . $orderid . '/Consent_Form.pdf');
        $body = base64_encode($pdf);
        //      echo $urlDecodedStr = rawurldecode($body);
        $soap_xml = '<?xml version="1.0" encoding="utf-8"?><soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema"><soap:Body><UploadBinaryFile xmlns="http://tempuri.org/">' . '<UID>' . $ebs_id . '</UID><PDI>' . $pdi_1603 . '</PDI><FileData>' . $body . '</FileData><productID>1603</productID><Filename>Consent_Form.pdf</Filename><FileType>ConsentForm</FileType><tp>EBS</tp><prod>true</prod></UploadBinaryFile></soap:Body></soap:Envelope>';
        $result = $client->call('UploadBinaryFile', $soap_xml);

        debug($result);

    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if ($uploadbinaryemployment_1627) {

        $pdf_content = '';
        $pdf_decoded = base64_decode($pdf_content);
        $pdf = file_get_contents('orders/order_' . $orderid . '/Employment_Form.pdf');
        $body = base64_encode($pdf);
        //     echo $urlDecodedStr = rawurldecode($body);
        $soap_xml = '<?xml version="1.0" encoding="utf-8"?><soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema"><soap:Body><UploadBinaryFile xmlns="http://tempuri.org/">' . '<UID>' . $ebs_id . '</UID><PDI>' . $pdi_1627 . '</PDI><FileData>' . $body . '</FileData><productID>1627</productID><Filename>Employment_Form.pdf</Filename><FileType>ConsentForm</FileType><tp>EBS</tp><prod>true</prod></UploadBinaryFile></soap:Body></soap:Envelope>';
        $result = $client->call('UploadBinaryFile', $soap_xml);

        debug($result);

    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if ($uploadbinaryeducation_1650) {

        $pdf_content = '';
        $pdf_decoded = base64_decode($pdf_content);
        // $pdf = file_get_contents(APP . "../webroot/orders/order_" . $order->id . '/Education_Form.pdf');
        $pdf = file_get_contents('orders/order_' . $orderid . '/Education_Form.pdf');
        $body = base64_encode($pdf);
        //    echo $urlDecodedStr = rawurldecode($body);
        $soap_xml = '<?xml version="1.0" encoding="utf-8"?><soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema"><soap:Body><UploadBinaryFile xmlns="http://tempuri.org/">' . '<UID>' . $ebs_id . '</UID><PDI>' . $pdi_1650 . '</PDI><FileData>' . $body . '</FileData><productID>1650</productID><Filename>Education_Form.pdf</Filename><FileType>ConsentForm</FileType><tp>EBS</tp><prod>true</prod></UploadBinaryFile></soap:Body></soap:Envelope>';
        $result = $client->call('UploadBinaryFile', $soap_xml);

        debug($result);

    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // debug($consent_form_attachments);
    /*
    foreach ($consent_form_attachments as $d) {
    if (isset($d->attach_doc) && $d->attach_doc != "") {

    if ($upload_additional) {

    echo $body = base64_encode($pdf);

    $soap_xml = '<?xml version="1.0" encoding="utf-8"?><soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema"><soap:Body><UploadBinaryFile xmlns="http://tempuri.org/">' . '<UID>' . $ebs_id . '</UID><PDI>' . $pdi_1603 . '</PDI><FileData>' . $body . '</FileData><productID>1603</productID><Filename>Consent_Form.pdf</Filename><FileType>ConsentForm</FileType><tp>EBS</tp><prod>true</prod></UploadBinaryFile></soap:Body></soap:Envelope>';

    $result = $client->call('UploadBinaryFile', $soap_xml);
    debug($result);

    }
    }
    */
    //////change   echo $pdf = file_get_contents('attachments/' . $d->attach_doc);
    // debug($consent_form_attachments);

    if ($upload_additional) {

        //    debug($prescreening['attach_doc']); //null
        //   debug($driverapplication['da_at']);
        //   debug($roadtest['de_at']);
        //  debug($consent['con_at']);
        //  debug($employee['att']);
        //  debug($education['att']);

        foreach ($prescreening['attach_doc'] as $d) {
            if ($d->attachment) {
                echo($d->attachment);

                $sendit = file_get_contents('attachments/' . $d->attachment);
                echo $body = base64_encode($sendit);

                $soap_xml = '<?xml version="1.0" encoding="utf-8"?><soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema"><soap:Body><UploadBinaryFile xmlns="http://tempuri.org/">' . '<UID>' . $ebs_id . '</UID><PDI>' . $pdi_1603 . '</PDI><FileData>' . $body . '</FileData><productID>111</productID><Filename>Consent_Form.pdf</Filename><FileType>Attachment</FileType><tp>EBS</tp><prod>true</prod></UploadBinaryFile></soap:Body></soap:Envelope>';

                $result = $client->call('UploadBinaryFile', $soap_xml);
                debug($result);

            }
        }

        echo "<br>";

        foreach ($driverapplication['da_at'] as $d) {
            if ($d->attachment) {
                echo($d->attachment);

                $sendit = file_get_contents('attachments/' . $d->attachment);
                echo $body = base64_encode($sendit);

                $soap_xml = '<?xml version="1.0" encoding="utf-8"?><soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema"><soap:Body><UploadBinaryFile xmlns="http://tempuri.org/">' . '<UID>' . $ebs_id . '</UID><PDI>' . $pdi_1603 . '</PDI><FileData>' . $body . '</FileData><productID>1603</productID><Filename>Consent_Form.pdf</Filename><FileType>Attachment</FileType><tp>EBS</tp><prod>true</prod></UploadBinaryFile></soap:Body></soap:Envelope>';

                $result = $client->call('UploadBinaryFile', $soap_xml);
                debug($result);

            }
        }
        echo "<br>";

        foreach ($roadtest['de_at'] as $d) {
            if ($d->attachment) {
                echo($d->attachment);

                $sendit = file_get_contents('attachments/' . $d->attachment);
                echo $body = base64_encode($sendit);

                $soap_xml = '<?xml version="1.0" encoding="utf-8"?><soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema"><soap:Body><UploadBinaryFile xmlns="http://tempuri.org/">' . '<UID>' . $ebs_id . '</UID><PDI>' . $pdi_1603 . '</PDI><FileData>' . $body . '</FileData><productID>1603</productID><Filename>Consent_Form.pdf</Filename><FileType>Attachment</FileType><tp>EBS</tp><prod>true</prod></UploadBinaryFile></soap:Body></soap:Envelope>';

                $result = $client->call('UploadBinaryFile', $soap_xml);
                debug($result);

            }
        }
        echo "<br>";

        foreach ($consent['con_at'] as $d) {
            if ($d->attachment) {
                echo($d->attachment);

                $sendit = file_get_contents('attachments/' . $d->attachment);
                echo $body = base64_encode($sendit);

                $soap_xml = '<?xml version="1.0" encoding="utf-8"?><soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema"><soap:Body><UploadBinaryFile xmlns="http://tempuri.org/">' . '<UID>' . $ebs_id . '</UID><PDI>' . $pdi_1603 . '</PDI><FileData>' . $body . '</FileData><productID>1603</productID><Filename>Consent_Form.pdf</Filename><FileType>Attachment</FileType><tp>EBS</tp><prod>true</prod></UploadBinaryFile></soap:Body></soap:Envelope>';

                $result = $client->call('UploadBinaryFile', $soap_xml);
                debug($result);

            }
        }
        echo "<br>";

        foreach ($employee['att'] as $d) {
            if ($d->attachment) {
                echo($d->attachment);

                $sendit = file_get_contents('attachments/' . $d->attachment);
                echo $body = base64_encode($sendit);

                $soap_xml = '<?xml version="1.0" encoding="utf-8"?><soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema"><soap:Body><UploadBinaryFile xmlns="http://tempuri.org/">' . '<UID>' . $ebs_id . '</UID><PDI>' . $pdi_1603 . '</PDI><FileData>' . $body . '</FileData><productID>1603</productID><Filename>Consent_Form.pdf</Filename><FileType>Attachment</FileType><tp>EBS</tp><prod>true</prod></UploadBinaryFile></soap:Body></soap:Envelope>';

                $result = $client->call('UploadBinaryFile', $soap_xml);
                debug($result);

            }
        }

        echo "<br>";

        foreach ($education['att'] as $d) {
            if ($d->attachment) {
                echo($d->attachment);

                $sendit = file_get_contents('attachments/' . $d->attachment);
                echo $body = base64_encode($sendit);

                $soap_xml = '<?xml version="1.0" encoding="utf-8"?><soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema"><soap:Body><UploadBinaryFile xmlns="http://tempuri.org/">' . '<UID>' . $ebs_id . '</UID><PDI>' . $pdi_1603 . '</PDI><FileData>' . $body . '</FileData><productID>1603</productID><Filename>Consent_Form.pdf</Filename><FileType>Attachment</FileType><tp>EBS</tp><prod>true</prod></UploadBinaryFile></soap:Body></soap:Envelope>';

                $result = $client->call('UploadBinaryFile', $soap_xml);
                debug($result);

            }
        }
        die();
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

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