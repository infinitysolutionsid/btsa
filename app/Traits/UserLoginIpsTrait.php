<?php

namespace App\Traits;

use Illuminate\Filesystem\Cache;

class UserLoginIpsTrait
{
    public static function lastloginIps($request, $MemberModel, $lass_than)
    {
        $login_ips = $MemberModel->last_login;
        $time_of_login = time();
        if (!$login_ips) {
            $ips = array();
            $ips[] = $request->ip() . '-' . $time_of_login;
            $login_ips = json_encode($ips);
        } else {
            $login_ips = json_decode($login_ips, true);
            if (count($login_ips) < $lass_than) {
                $login_ips[] = $request->ip() . '-' . $time_of_login;
                $login_ips = json_encode($login_ips);
            } else {
                $splice = \array_splice($login_ips, 1);
                $splice[] = $request->ip() . '-' . $time_of_login;
                $login_ips = json_encode($splice);
            }
        }
        $MemberModel->update(['last_login' => $login_ips]);
    }
}
