
$api_key = '';
$mail_gun_url = '';

function mailman2 ($email,$sub,$html,$username,$from ,$fromname)
{  

  $from=$fromname.' <'.$from.'>';

  $to=$username.' <'.$email.'>';
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  curl_setopt($ch, CURLOPT_USERPWD, $api_key);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
  curl_setopt($ch, CURLOPT_URL,$mail_gun_url);
  curl_setopt($ch, CURLOPT_POSTFIELDS, 
    array('from' => $from,
      'to' => $to,
      'subject' => $sub,
      'html' => $html
      ));



  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
}
