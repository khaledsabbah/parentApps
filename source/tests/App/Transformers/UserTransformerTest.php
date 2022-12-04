<?php


namespace Tests\App\Transformers;


use App\Transformers\UserTransformer;
use Tests\TestCase;

class UserTransformerTest extends TestCase
{

    public function testUserTransform()
    {
        $hydratedUsers = UserTransformer::transform($this->hydrateUsersList($this->users, "DataProviderX"));
        $this->assertIsArray($hydratedUsers);
        foreach ($hydratedUsers as $hydratedUser){
            $this->assertArrayHasKey('provider', $hydratedUser);
            $this->assertArrayHasKey('amount', $hydratedUser);
            $this->assertArrayHasKey('currency', $hydratedUser);
            $this->assertArrayHasKey('email', $hydratedUser);
            $this->assertArrayHasKey('statusCode', $hydratedUser);
            $this->assertArrayHasKey('registrationDate', $hydratedUser);
            $this->assertArrayHasKey('id', $hydratedUser);
        }
    }
}
