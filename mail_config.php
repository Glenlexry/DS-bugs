<?php

/******************************************
*          Mailgun cURL - PHP             *
*       By  :  rudiliucs1@gmail.com       *
*        Copyright © 2017 Rudi Liu        *
*******************************************/

/*
INFO:
Please install cURL with your curent php version ( sudo apt-get install php5-curl | sudo apt-get install php7.1-curl | sudo apt-get install php-curl )
success return = Array ( [id] => <20180112032629.1.803756E0B80E41EC@mailgun.digitalsymphony.it> [message] => Queued. Thank you. ) 
error return Array ( [message] => 'to' parameter is not a valid address. please check documentation ) 
*/

define('MAILGUN_URL', 'https://api.mailgun.net/v3/mailgun.digitalsymphony.it');
define('MAILGUN_KEY', 'key-209fafdb3f82b711dacad0da033f7e58'); 
define('EMAIL_FROM', 'postmaster@mailgun.digitalsymphony.it'); 
define('REPLY_To', 'barista@digitalsymphony.it'); 
define('FROM_NAME', 'Digital Symphony Sdn Bhd'); 



function sendmailbymailgun($mailto,$subject,$html,$text,$tag){
    $array_data = array(
		'from'=> FROM_NAME .'<'.EMAIL_FROM.'>',
		'to'=>$mailto,
		'subject'=>$subject,
		'html'=>$html,
		'text'=>$text,
		'o:tracking'=>'yes',
		'o:tracking-clicks'=>'yes',
		'o:tracking-opens'=>'yes',
		'o:tag'=>$tag,
		'h:Reply-To'=>REPLY_To
    );

    $session = curl_init(MAILGUN_URL.'/messages');
    curl_setopt($session, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  	curl_setopt($session, CURLOPT_USERPWD, 'api:'.MAILGUN_KEY);
    curl_setopt($session, CURLOPT_POST, true);
    curl_setopt($session, CURLOPT_POSTFIELDS, $array_data);
    curl_setopt($session, CURLOPT_HEADER, false);
    curl_setopt($session, CURLOPT_ENCODING, 'UTF-8');
    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($session);
    curl_close($session);
    $results = json_decode($response, true);
    return $results;
}

?>