<?php

namespace App\Exceptions;


/**
 * Class ProviderNotFoundException
 *
 * @package App\Exceptions
 */
/**
 * Class ProviderNotFoundException
 *
 * @package App\Exceptions
 */
class ProviderNotFoundException extends \Exception
{

    /**
     * @var string
     */
    protected  $message="Provider Not Found Exception";
    /**
     * @var string
     */
    protected  $key;
    /**
     * @var string
     */
    protected $type;

    /**
     * ProviderNotFoundException constructor.
     *
     * @param string $key
     * @param string $type
     */
    public function __construct(string $key, string $type)
    {
        $this->type = $type;
        $this->key  = $key;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey(string $key): void
    {
        $this->key = $key;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

}
