<?php

namespace App\Client\Entity;

use ReflectionClass;
use ReflectionProperty;
use function property_exists;
use function strtoupper;

/**
 * @package App\Client\Entity
 */
abstract class AbstractEntity
{
    /**
     * @param null $parameters
     */
    public function __construct($parameters = null)
    {
        if ($parameters === null) {
            return;
        }

        if (is_object($parameters)) {
            $parameters = get_object_vars($parameters);
        }

        $this->build($parameters);
    }

    /**
     * @param array $parameters
     */
    public function build(array $parameters): void
    {
        foreach ($parameters as $property => $value) {
            if (property_exists($this, $property)) {
                $this->$property = $value;
            }
        }
    }
}
