<?php


namespace App\Entities;


use App\Enums\StatusCodeEnum;

/**
 * Class User
 * @package App\Entities
 */
class User
{

    /**
     * @var int
     */
    private $parentAmount;

    /**
     * @var int
     */
    private $statusCode;

    /**
     * @var string
     */
    private $providerName;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var string
     */
    private $registerationDate;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $parentId;


    /**
     * @return int
     */
    public function getParentAmount(): int
    {
        return $this->parentAmount;
    }

    /**
     * @param int $parentAmount
     */
    public function setParentAmount(int $parentAmount): User
    {
        $this->parentAmount = $parentAmount;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatusCode(): string
    {
        try {
            return StatusCodeEnum::get($this->statusCode);
        }catch (\Exception $exception){
            return  $this->statusCode;
        }
    }

    /**
     * @param int $statusCode
     */
    public function setStatusCode(int $statusCode): User
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): User
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegisterationDate(): string
    {
        return $this->registerationDate;
    }

    /**
     * @param string $registerationDate
     */
    public function setRegisterationDate(string $registerationDate): User
    {
        $this->registerationDate = $registerationDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getParentId(): string
    {
        return $this->parentId;
    }

    /**
     * @param string $parentId
     */
    public function setParentId(string $parentId): User
    {
        $this->parentId = $parentId;
        return $this;
    }

    /**
     * @return string
     */
    public function getProviderName(): string
    {
        return $this->providerName;
    }

    /**
     * @param string $providerName
     */
    public function setProviderName(string $providerName): User
    {
        $this->providerName = $providerName;
        return $this;
    }



}
