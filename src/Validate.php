<?php

namespace OxMohsen\TgBot;

class Validate
{
    private static $hash = '';

    /**
     * convert init data to `key=value` and sort it `alphabetically`.
     *
     * @param string $initData init data from Telegram (`Telegram.WebApp.initData`)
     *
     * @return string
     */
    private static function convertInitData(string $initData): string
    {
        $initDataArray = explode('&', rawurldecode($initData));
        $needle        = 'hash=';

        foreach ($initDataArray as &$data) {
            if (substr($data, 0, \strlen($needle)) === $needle) {
                self::$hash = substr_replace($data, '', 0, \strlen($needle));
                $data       = null;
            }
        }
        $initDataArray = array_filter($initDataArray);
        sort($initDataArray);

        return implode("\n", $initDataArray);
    }

    /**
     * validate initData to ensure that it is from Telegram.
     *
     * @param string $initData init data from Telegram (`Telegram.WebApp.initData`)
     *
     * @return bool return true if its from Telegram otherwise false
     */
    public static function isSafe(string $initData): bool
    {
        $secretKey = hash_hmac('sha256', Config::BOT_TOKEN, 'WebAppData', true);
        $hash      = bin2hex(hash_hmac('sha256', self::convertInitData($initData), $secretKey, true));

        return strcmp($hash, self::$hash) === 0;
    }
}
