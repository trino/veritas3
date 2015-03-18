<?php
/*
$imagick = new Imagick();
$fonts = $imagick->queryFonts();
foreach($fonts as $font) {
    echo $font;
}*/


function imageCreateFromAny($filepath) {
    $type = exif_imagetype($filepath); // [] if you don't have exif you could use getImageSize()
    $allowedTypes = array(
        1,  // [] gif
        2,  // [] jpg
        3,  // [] png
        6   // [] bmp
    );
    if (!in_array($type, $allowedTypes)) { return false; }
    switch ($type) {
        case 1 :
            $im = imageCreateFromGif($filepath);
            break;
        case 2 :
            $im = imageCreateFromJpeg($filepath);
            break;
        case 3 :
            $im = imageCreateFromPng($filepath);
            break;
        case 6 :
            $im = imageCreateFromBmp($filepath);
            break;
    }
    return $im;
}
function clean($data, $datatype=0){
    if (is_object($data)){
        switch($datatype) {
            case 0:
                $data->Description = clean($data->Description);
                $data->Name = clean($data->Name);
                $data->Attachments = clean($data->Attachments);
                $data->image = clean($data->image);
                return $data;
                break;
            case 1:
                $data->Question = clean($data->Question);
                $data->Picture = clean($data->Picture);
                $data->Choice0 = clean($data->Choice0);
                $data->Choice1 = clean($data->Choice1);
                $data->Choice2 = clean($data->Choice2);
                $data->Choice3 = clean($data->Choice3);
                $data->Choice4 = clean($data->Choice4);
                $data->Choice5 = clean($data->Choice5);
                return $data;
                break;
        }
    }
    if (substr($data,0,1)== '"' && substr($data,-1) == '"'){$data = substr($data,1, strlen($data)-2);}
    $data = str_replace("\\r\\n", "\r\n", trim($data)) ;
    return $data;
}
$quiz = clean($quiz);
//debug($user);
//debug($quiz);

$path = getcwd() . "/img/certificates/";
$image = imageCreateFromAny($path . "certificate.jpg");
if($image){
    $black  = imagecolorallocate($image, 0, 0, 0);

    //$font = imageloadfont($path . "font.fon");
    //imagestring($image,  $font, 5, 5,ucfirst($user->fname) . " " . ucfirst($user->lname) . " " . $quiz->Name , $black);
    $font = 'arial.ttf';
    imagettftext($image, 20, 0, 10, 20, $black, $font, ucfirst($user->fname) . " " . ucfirst($user->lname) . " " . $quiz->Name);

    imagejpeg($image, $path . "certificate_" . $user->id . ".jpg");
    echo "<img width='100%' src='" . $this->request->webroot . "/img/certificates/certificate_" . $user->id . ".jpg'>";
} else {
    echo "Load image failed";
}
?>