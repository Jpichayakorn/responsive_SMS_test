<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <form action="connect.php" method="POST">
        <div class="contianer">
            <h1>Responsive_test</h1>
            <div class="input">
                <!-- <div class="box-img">
                    <img src="images/IMG_8840.JPG" class="size_img">
                    </div> -->
                <div id="box-input">
                    <input placeholder="Name" class="input n" type="text" name="firstname">
                </div>
                <div id="box-input">
                    <input placeholder="Lastname" class="input l" type="text" name="lastname">
                </div>
                <div id="box-input">
                    <input placeholder="Email" class="input e" type="email" name="email">
                </div>
                <div id="box-input">
                    <input placeholder="Phon Number" class="input ph" type="number" name="number" autofocus>
                </div>
                <div id="box-mess">
                    <input placeholder="Massage" class="input m" type="message" name="message">
                </div>
            </div>

            <div class="bg-botton">
                <button type="submit" value="submit" class="button">ส่งข้อความ</button>
            </div>
        </div>
    </form>
</body>

</html>
<!-- ================================================ -->

<body>

    <head>
        <title>Sending SMS</title>
    </head>

    <form method="post">
        <label>Mobile NUMBER</label>
        <input type="text" name="mobile" autofocus>
        <br><br>
        <label>Enter Message</label>
        <input type="text" name="message">

        <input type="submit" name="submit">
    </form>
</body>


<?php
if (isset($_POST['submit'])){
    $mobile =$_POST['mobile']; $message = $_POST['message'];

$apiKey = urlencode('7778ed15bc2a8d0baaf6ba20efc1007e');
$sender = urlencode('POPeye');
$numbers = array($mobile);
$message = rawurldecode('today so blue');
$data = array('apiKey' => $apiKey, 'mobile' => $numbers, 
'sender' => $sender, 'message' => $message);

$ch = curl_init('https://api-v2.thaibulksms.com');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
$response = curl_exec($ch);
curl_close($ch);
echo $response; 

}

// $sms = new  \THAIBULKSMS_API\SMS\SMS($apiKey, $apiSecretKey);

// $body = [
//     'msisdn' => $_POST['num'],
//     'message' => $_POST['message'],
// ];
// $res = $sms->sendSMS($body);

// if ($res->httpStatusCode == 201) {
//     echo "Successful";
//     var_dump($res);
// } else {
//     echo "Error";
//     var_dump($res);
// }

// $curl = curl_init();

// curl_setopt_array($curl, [
//     CURLOPT_URL => "https://api-v2.thaibulksms.com/sms",
//     CURLOPT_RETURNTRANSFER => true,
//     CURLOPT_ENCODING => "",
//     CURLOPT_MAXREDIRS => 10,
//     CURLOPT_TIMEOUT => 30,
//     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//     CURLOPT_CUSTOMREQUEST => "POST",
//     CURLOPT_HTTPHEADER => [
//         "Accept: application/json",
//         "Content-Type: application/x-www-form-urlencoded"
//     ],
// ]);

// $response = curl_exec($curl);
// $err = curl_error($curl);

// curl_close($curl);

// if ($err) {
//     echo "cURL Error #:" . $err;
// } else {
//     echo $response;
// }
