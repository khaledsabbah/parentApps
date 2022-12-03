<?php

namespace App\Contracts;


/**
 * Interface IFactory
 *
 * @package App\Contracts
 */
interface IFactory
{
    /**
     * DEFAULT PROVIDER NAMESPACE
     */
    const DATA_PROVIDERS_NAMESPACE ="App\DataProviders\\";

    /**
     * @param string $providerName
     * @param string $nameSpace
     * @return mixed
     */
    static function Instantiate(string $providerName, string $nameSpace=''):IDataProvider;
}
