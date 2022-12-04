<?php


namespace Tests\App\Controllers\API\V1;


use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

/**
 * Class UsersControllerTest
 * @package Tests\App\Controllers\API\V1
 */
class UsersControllerTest  extends TestCase
{
    public function testIndexMethodTest(){
        $this->call("GET","/api/v1/users")
            ->assertOk()
            ->assertJson(fn (AssertableJson $json) =>
            $json->has('users')
                ->missing('message')
            )
            ->assertJsonPath("users.0.email","parent1@parent.eu");
    }
}
