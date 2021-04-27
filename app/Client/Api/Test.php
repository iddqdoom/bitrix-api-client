<?php

namespace App\Client\Api;

use App\Client\Client;
use App\Client\Entity\Test as TestEntity;
use stdClass;
use function array_map;
use function sprintf;

/**
 * @package App\Client\Api
 */
final class Test extends AbstractApi
{
    /**
     * @param int $id
     * @return TestEntity
     */
    public function getById(int $id): TestEntity
    {
        $body = [
            'content' => [
                'objects' => [
                    [
                        'object' => [
                            'id' => $id,
                        ],
                    ],
                ],
            ],
        ];

        $tests = $this->post(self::prepareUri('uri'), $body);

        $constructionObject = $tests->content->construction_objects[0] ?? new stdClass();

        return new TestEntity($constructionObject);
    }

    /**
     * Подготовить URI запроса.
     *
     * @param string $uri
     *
     * @return string
     */
    private static function prepareUri(string $uri): string
    {
        return sprintf('%s%s', Client::BASE_URL, $uri);
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        $body = [
            'content' => new stdClass(),
        ];

        $tests = $this->post(self::prepareUri('Information_of_SB'), $body);

        $constructionObjects = $tests->content->construction_objects ?? new stdClass();

        return array_map(function ($test) {
            return new TestEntity($test);
        }, $constructionObjects);
    }
}
