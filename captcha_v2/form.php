<?php
    $captcha;
    
    if(isset($_POST['g-recaptcha-response'])){
      $captcha=$_POST['g-recaptcha-response'];
    }
    if(!$captcha){
      echo '<h2>Please check the the captcha form.</h2>';
      exit;
    }
    $secretKey = "6Ld18bAdAAAAAHpb3XXzRmoyhc-ifFfAZFDlLT2X";
    $ip = $_SERVER['REMOTE_ADDR'];
    // post request to server
    $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
    $response = file_get_contents($url);
    $responseKeys = json_decode($response,true);
    // should return JSON with success as true
    if($responseKeys["success"]) {
            echo '<h2>Thanks for posting comment</h2>';
            header('Location:http://google.com');
            exit;
    } else {
            echo '<h2>You are spammer ! Get the @$%K out</h2>';
    }
?>
