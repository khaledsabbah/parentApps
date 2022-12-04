<?php

namespace Tests\MockData;


use Tests\MockData\Providers\MockDataProviderX;
use Tests\MockData\Providers\MockDataProviderY;

abstract class UsersMockData implements IMockProviders
{
    public static function mockProvider($provider=MockDataProviderX::class): array
    {
        // TODO: Implement mockProvider() method.
        return json_decode($provider::RESPONSE, true)['data'];
    }

    public static function mockProvidersList(): array
    {
        // TODO: Implement mockProvidersList() method.
        $dataProviderX = json_decode(MockDataProviderX::RESPONSE, true)['data'];
        $dataProviderY = json_decode(MockDataProviderY::RESPONSE, true)['data'];
        return  array_merge($dataProviderX, $dataProviderY);
    }


    public static function getProviderObjKeys($providers)
    {
        switch ($providers){
            case "MockDataProviderY":
                return MockDataProviderY::OBJ_KEYS;

            case "MockDataProviderX":
            default:
                return MockDataProviderX::OBJ_KEYS;
        }
    }
}
