<?php
/**
 * Created by PhpStorm.
 * User: zhulinjie
 * Date: 2017/3/31
 * Time: 16:22
 */

namespace App\Mailer;
use Mail;

class Mailer
{
    protected $url = 'http://api.sendcloud.net/apiv2/mail/sendtemplate';

    /**
     * @param $user
     * @param $subject
     * @param $view
     * @param array $data
     * @return string
     */
    protected function sendTo($user, $subject, $view, $data = [])
    {
        $vars = json_encode(['to' => [$user->email], 'sub' => $data]);
        $param = [
            'apiUser'            => env('SENDCLOUD_API_USER'), # 使用api_user和api_key进行验证
            'apiKey'             => env('SENDCLOUD_API_KEY'),
            'from'               => env('MAIL_FROM_ADDRESS'),  # 发信人，用正确邮件地址替代
            'fromName'           => env('MAIL_FROM_NAME'),
            'xsmtpapi'           => $vars,
            'subject'            => $subject,
            'templateInvokeName' => $view,
            'respEmailId'        => 'true'
        ];
        $sendData = http_build_query($param);
        $options = [
            'http' => [
                'method'  => 'POST',
                'header'  => 'Content-Type: application/x-www-form-urlencoded',
                'content' => $sendData
            ]
        ];
        $context = stream_context_create($options);

        return file_get_contents($this->url, FILE_TEXT, $context);
    }
}