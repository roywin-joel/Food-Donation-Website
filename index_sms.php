<?php
    use Twilio\Rest\Client;
    require __DIR__ . '/vendor/autoload.php';



    // Your Account SID and Auth Token from twilio.com/console
$sid = 'ACf555799810fa3d9cb29b73e622726a26';
$token = 'dc4dabedb11ff6e9b0bf5d914e39836d';
$client = new Client($sid, $token);
    // Use the client to do fun stuff like send text messages!
$message=$client->messages->create(
    // the number you'd like to send the message to
    '+919482319594',
    [
        // A Twilio phone number you purchased at twilio.com/console
        'from' => '+17243903387',
        // the body of the text message you'd like to send
        'body' => 'roywin@gmail.com is willing to donate rattion for ur NGO'
    ]
);

if($message){
    echo $message;
}else{
    echo "something went wrong";
}
    
header('Location: index.html');


?>



