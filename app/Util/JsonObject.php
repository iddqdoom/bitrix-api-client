<?php

namespace App\Util;

use RuntimeException;
use stdClass;

/**
 * @package App\Util
 */
final class JsonObject
{
    /**
     * Создать пустой объект PHP.
     *
     * @return stdClass
     */
    public static function empty(): stdClass
    {
        return new stdClass();
    }

    /**
     * Расшифровать строку JSON в объект PHP.
     *
     * @param string $json
     *
     * @return stdClass
     * @throws RuntimeException
     *
     */
    public static function decode(string $json): stdClass
    {
        $data = json_decode($json);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new RuntimeException(sprintf('json_decode error: %s', json_last_error_msg()));
        }

        if (!$data instanceof stdClass) {
            throw new RuntimeException('json_decode error: Expected JSON of type object');
        }

        return $data;
    }

    /**
     * Преобразовать массив PHP в строку JSON.
     *
     * @param array $value
     *
     * @return string
     * @throws RuntimeException
     *
     */
    public static function encode(array $value): string
    {
        $json = json_encode($value);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new RuntimeException(sprintf('json_encode error: %s', json_last_error_msg()));
        }

        return $json;
    }
}
