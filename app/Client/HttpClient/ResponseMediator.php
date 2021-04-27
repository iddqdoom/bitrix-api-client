<?php

namespace App\Client\HttpClient;

use App\Util\JsonObject;
use Bitrix\Main\Web\HttpClient;
use stdClass;

/**
 * @package App\Client\HttpClient
 */
final class ResponseMediator
{
    /**
     * @param HttpClient $response
     *
     * @return stdClass
     */
    public static function getContent(HttpClient $response): stdClass
    {
        if ($response->getStatus() !== 200) {
            return JsonObject::empty();
        }

        $body = $response->getResult();

        if (empty($body)) {
            return JsonObject::empty();
        }

        return JsonObject::decode($body);
    }
}
