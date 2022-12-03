<?php


namespace App\Contracts;


/**
 * Interface IDataProvider
 * @package App\Contracts
 */
interface IDataProvider
{
    /**
     * @return mixed
     */
    public function getProviderData();

    /**
     * @return array
     */
    public function mockProviderResponse(): array;
}
