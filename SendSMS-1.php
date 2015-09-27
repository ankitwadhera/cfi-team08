<?php
$str = '';
for($i=7;$i>0;$i--){
    $str = $str.chr(rand(97,122)); 
    /*  The above line concatenates one character at a time for
        seven iterations within the ASCII range mentioned.
        So, we get a seven characters random OTP comprising of
        all small alphabets. 
    */
}
$body = 'DMR Login: Your one time password is : '.$str;
$user='vijayhac';
$sender_id= 'WEBSMS';           // sender id
$pwd='932460';
$mob_no = $_POST['mob_no'];    //'919619779118';      //Repients number
               //your account password
$msg=$body;       //your message


$str = trim(str_replace(' ', '%20', $msg )); // to replace the space in message with  ‘%20’
$url="http://login.smsgatewayhub.com/smsapi/pushsms.aspx?user={$user}&pwd={$pwd}&to={$mob_no}&sid={$sender_id}&msg={$str}&fl=0";
// create a new cURL resource
$ch = curl_init();
// set URL and other appropriate options
$test = curl_setopt($ch, CURLOPT_URL,$url);
// grab URL and pass it to the browser
$test1=curl_exec($ch);
// close cURL resource, and free up system resources
curl_close($ch);


// $query = mysql_query("UPDATE user_login SET OTP={$password} WHERE username = {$mob_no}");
// $qry_run = mysql_query($query);
header("Location:/CFI/DMR-Registration.html");
exit;   
?>