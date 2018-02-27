
<?php

if ($_SERVER['REQUEST_METHOD'] != "POST")
  {
    print 'You cannot run this script from the command line.<br> You are redirected to enquiry page in 2 seconds';
    print "<meta http-equiv=\"refresh\" content=\"2;url=registration-form.php\">";
    exit();
  }

      $hotelName = trim($_POST['name']);
      $email = trim($_POST['email']);
      $contact_no = trim($_POST['contact_no']);
      $amount = trim($_POST['amount']);
      $invoice = trim($_POST['company']);

      $hotelName = str_replace(' ', '%20', $hotelName);
      $invoice = str_replace(' ', '%20', $invoice);
      $email = str_replace(' ', '%20', $email);
      $contact_no = str_replace(' ', '%20', $contact_no);
      $amount = str_replace(' ', '%20', $amount);

$authToken = "";
$apikey = "c3cd435b5cc4a3d9dbc6aa5d6997b15ee6bd44e0";
$channelId = "5";
$url = "http://app.axisrooms.com/api/be/invoicePayment?hotelName=$hotelName&name=$hotelName&mobile=$contact_no&email=$email&amount=$amount&invoice=$invoice";
$postData = "{}";

$context = stream_context_create(array(
   'http' => array(
       'method' => 'POST',
       'header' => "Authorization: {$authToken}\r\n".
           "Content-Type: application/json\r\n".
           "apikey: {$apikey}\r\n".
           "channelid: {$channelId}\r\n",
       'content' => json_encode($postData)
   )
));

$response = file_get_contents($url, FALSE, $context);
$json = json_decode($response,true);
header('location: '.$json['payment_URL'].'');
?>
