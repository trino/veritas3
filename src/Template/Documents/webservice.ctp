<?php

    include('subpages/soap/nusoap.php');
    $proxyhost = 'https://infosearchsite.com/MEEWS/ISBService.svc?wsdl';

    $client = new nusoap_client($proxyhost, true, $proxyhost, $proxyport = null, $proxyusername = null, $proxypassword = null);

    if (!$callfunction) {
//  $callfunction = "startorder";
//    $callfunction = "productdetails";
        $callfunction = "uploadbinary";
    } else {

    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $err = $client->getError();
    if ($err) {
     //   echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
    }

 //    echo '<h2>Debug</h2><pre>' . htmlspecialchars($client->getDebug(), ENT_QUOTES) . '</pre>';
    $client->clearDebug();
    $client->useHTTPPersistentConnection();

    /****************************************************************************/


    if ($callfunction == "startorder") {
//StartOrder

        $body = '&lt;ProductData&gt;&lt;isb_FN&gt;MEE FirstName&lt;/isb_FN&gt;&lt;isb_LN&gt;MEE LastName&lt;/isb_LN&gt;&lt;isb_Ref&gt;MEETEST-777&lt;/isb_Ref&gt;&lt;isb_DOL&gt;2015-01-07&lt;/isb_DOL&gt;&lt;isb_Prov&gt;ON&lt;/isb_Prov&gt;&lt;isb_UserID&gt;22435&lt;/isb_UserID&gt;&lt;/ProductData&gt;';
  //      echo $urlDecodedStr = rawurldecode($body);

        $soap_xml = '<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
<soap:Body>
<StartOrder xmlns="http://tempuri.org/"><IntPackage>'
            . $body .
            '</IntPackage>
<tp>MEE</tp>
<prod>true</prod>
</StartOrder>
</soap:Body></soap:Envelope>';
        $result = $client->call('StartOrder', $soap_xml);
    }

    /****************************************************************************/

    if ($callfunction == "productdetails") {
//ProductDetails //remove ins or  ebs

        $body = '<UID>9A5991AC-CFB6-43E9-9CA0-FB9865B58584</UID>
<productdetails>&lt;ProductData&gt;&lt;isb_FirstName&gt;8be3rnard&lt;/isb_FirstName&gt;&lt;isb_LastName&gt;8nor3mington&lt;/isb_LastName&gt;&lt;isb_DriverLicence&gt;N6617-08503-01202&lt;/isb_DriverLicence&gt;&lt;isb_USDOT_MC&gt;11&lt;/isb_USDOT_MC&gt;&lt;/ProductData&gt;';
      //  echo $urlDecodedStr = rawurldecode($body);

        $soap_xml = '<?xml version="1.0" encoding="utf-8"?><soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema"><soap:Body>
<ProductDetails xmlns="http://tempuri.org/">'
            . $body . '
</productdetails><productID>79</productID><tp>INS</tp><prod>true</prod>
</ProductDetails></soap:Body></soap:Envelope>';
        $result = $client->call('ProductDetails', $soap_xml);

    }

    /****************************************************************************/

    if ($callfunction == "uploadbinary") {
        //UploadBinary //265

        $pdf_content = '';
        $pdf_decoded = base64_decode($pdf_content);

        $pdf = file_get_contents('img/test.pdf');
        // fwrite ($pdf,$pdf_decoded);
        $pdf = base64_encode($pdf);
       // echo $pdf;
        // fclose ($pdf);

        $body = $pdf;

//        echo $urlDecodedStr = rawurldecode($body);

        $soap_xml = '<?xml version="1.0" encoding="utf-8"?><soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
<soap:Body><UploadBinaryFile xmlns="http://tempuri.org/">
<UID>9A5991AC-CFB6-43E9-9CA0-FB9865B58584</UID><PDI>267</PDI><FileData>'
            . $body .
            '</FileData><productID>160</productID>
<Filename>test.pdf</Filename><FileType>ConsentForm</FileType><tp>INS</tp><prod>true</prod></UploadBinaryFile></soap:Body>
</soap:Envelope>';

        $result = $client->call('UploadBinaryFile', $soap_xml);
    }
    /****************************************************************************/

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
*/
//    echo '<h2>Request</h2><pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
    echo '<h2>Response</h2><pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
  //  echo '<h2>Debug</h2><pre>' . htmlspecialchars($client->getDebug(), ENT_QUOTES) . '</pre>';

    $client->clearDebug();




?>


