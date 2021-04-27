<?php

namespace App\Client\Api;

use App\Client\Client;
use App\Client\HttpClient\ResponseMediator;
use Bitrix\Main\Web\HttpClient;
use stdClass;
use function json_encode;

/**
 * @package App\Client\Api
 */
abstract class AbstractApi
{
    /**
     * Экземляр клиента.
     *
     * @var Client
     */
    private $client;

    /**
     * Создать новый экземляр API.
     *
     * @param Client $client
     *
     * @return void
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Отправить запрос POST.
     */
    protected function post(string $uri, array $params = []): stdClass
    {
        $body = json_encode($params);

        $client = $this->client->getHttpClient();

        if ($body) {
            $client->setHeader('Content-Type', 'application/json; charset=utf-8');
        }

        $client->query(HttpClient::HTTP_POST, $uri, $body);

        return ResponseMediator::getContent($client);
    }
}
