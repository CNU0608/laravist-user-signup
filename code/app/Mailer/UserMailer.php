<?php
/**
 * Created by PhpStorm.
 * User: zhulinjie
 * Date: 2017/3/31
 * Time: 16:58
 */

namespace App\Mailer;


class UserMailer extends Mailer
{
    /**
     * @param $user
     */
    public function welcome($user)
    {
        // subject的设置需要跟SendCould上邮件标题一致
        $subject = 'welcome 邮箱确认';
        $view = 'welcome';
        $data = ['%name%' => [$user->name],'%token%' => [str_random(40)]];
        $this->sendTo($user, $subject, $view, $data);
    }
}