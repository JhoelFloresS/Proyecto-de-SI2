<?php

namespace App\Models\tenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnviarNotificaion extends Model
{
    public static function enviarNotificaion($token, $title, $body)
    {
        $SERVER_API_KEY = 'AAAAqpLfBLQ:APA91bHv3ScDqlbT3V__n0UuXNPE0_2lcj7WuJV161TyYIjOPE78dYQJ20eU2pzKtuxsCpCrXQUHpbHDVezHGtdgl84ldl8iENaeksaR_TNePK3-GHiiV34GFx2X9QDB2QXOMvLZHhDZ';
        $data = [
            "registration_ids" => [$token],
            "notification" => [
                "title" => $title,
                "body" => $body,
                "content_available" => true,
                "priority" => "high",
            ]
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);
    }
}
