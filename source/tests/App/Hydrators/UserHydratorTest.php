<?php


namespace Tests\App\Hydrators;


use App\Entities\User;
use Tests\TestCase;

class UserHydratorTest extends TestCase
{

    public function testUserHydrate()
    {
        $users= $this->hydrateUsersList($this->users, "DataProviderX");
        foreach ($users as $user) {
            $this->assertIsObject($user);
            $this->assertInstanceOf(User::class, $user);
            $this->assertObjectHasAttribute("parentAmount", $user);
        }
    }

}
