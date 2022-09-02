<?php

namespace App\Classe;

use Mailjet\Client;
use Mailjet\Resources;

class MailSend

{
    private $api_key = '0b1cbb298d0da2eb092147e0d14b736e';
    private $api_key_secret = '3a68ccab20909b4d542b7eccfdb931f6';

    public function send($to_email, $to_name, $subject, $content)
    {
        $mj = new Client($this->api_key, $this->api_key_secret, true, ['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "yasmine.radouani@outlook.fr",
                        'Name' => "La Boutique Française"
                    ],
                    'To' => [
                        [
                            'Email' => $to_email,
                            'Name' => $to_name
                        ]
                    ],
                    'TemplateID' => 4167237,
                    'TemplateLanguage' => true,
                    'Subject' => $subject,
                    'Variables' => json_decode('{
                        "content": $content
                      }', true)
                ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        $response->success() && dd($response->getData());
    }
}
