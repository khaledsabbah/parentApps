<?php

namespace App\Factory;


use App\Contracts\IDataProvider;
use App\Contracts\IFactory;
use App\Exceptions\ProviderNotFoundException;

/**
 * Class AbstractProviderFactory
 *
 * @package App\Factory
 */
abstract class AbstractProviderFactory implements IFactory
{

    /**
     * @param string $providerName
     * @param string $nameSpace
     * @return mixed
     * @throws ProviderNotFoundException
     */
    static function Instantiate(string $providerName, string $nameSpace = ''):IDataProvider
    {
        // TODO: Implement Instantiate() method.
        $service= self::DATA_PROVIDERS_NAMESPACE. ucfirst($providerName);
        if( class_exists($service) ){
            return new $service();
        }
        throw  new ProviderNotFoundException($providerName,"Provider" );
    }
}
