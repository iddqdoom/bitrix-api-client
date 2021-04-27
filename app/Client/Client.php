<?php

namespace App\Client;

use App\Client\Api\Decision;
use Bitrix\Main\Config\Option;
use Bitrix\Main\Web\HttpClient;

/**
 * @package App\Client
 */
class Client
{
    /**
     * Базовый URL-адрес по умолчанию.
     *
     * @var string
     */
    const BASE_URL = 'http://127.0.0.1/';

    public function decision(): Decision
    {
        return new Decision($this);
    }

    /**
     * Получить HTTP-клиент.
     */
    public function getHttpClient(): HttpClient
    {
        return new HttpClient();
    }
}
