<?php
header('Content-type: text/plain');
if(isset($_POST['phone']) && isset($_POST['message']))
{
    $apiToken = "5267112690:AAGoGgLjXAmCNPSTP-EILcTb5Nv5Qaxana4";
    $phone = $_POST['phone'];
    $text = $_POST['message'];

    if(strlen($phone) > 5 && strlen($text) > 5){
        $data = [
//            'chat_id' => '307211011', // den
            'chat_id' => '392698082', // jen
            'text' => 'Телефон: ' . $phone . ' Сообщение:' . $text
        ];
        $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );
        http_response_code(200);

        echo json_encode([
            'message' => $_POST['message']
        ]);
    } else {
        http_response_code(411);
        echo json_encode([
            'message' => $_POST['message']
        ]);
    }

}else{
   http_response_code(200);
    echo json_encode([
        'message' => $_POST['message']
    ]);
}

