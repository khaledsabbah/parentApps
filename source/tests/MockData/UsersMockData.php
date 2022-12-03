<?php

namespace Tests\MockData;

use App\Entities\User;
use Tests\Providers\MockDataProviderX;
use Tests\Providers\MockDataProviderY;

abstract class UsersMockData implements IMockProviders
{
    public static function mockProvider($provider=MockDataProviderX::class): array
    {
        // TODO: Implement mockAdvertiser() method.
        return $hotels= json_decode($provider::RESPONSE, true)['data'];
    }

    public static function mockProvidersList(): array
    {
        // TODO: Implement mockAdvertisersList() method.
        $dataProviderX = json_decode(MockDataProviderX::RESPONSE, true)['data'];
        $dataProviderY = json_decode(MockDataProviderY::RESPONSE, true)['data'];
        return  array_merge($dataProviderX, $dataProviderY);
    }
}
