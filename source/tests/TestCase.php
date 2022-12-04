<?php

namespace Tests;

use App\Hydrators\UserHydrator;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\MockData\UsersMockData;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public $users = [];

    public function setUp(): void
    {
        parent::setUp();
        $this->users = UsersMockData::mockProvider();
    }

    /**
     * @return array
     */
    public function getUsers(): array
    {
        return $this->users;
    }

    /**
     * @param array $users
     */
    public function setUsers(array $users): void
    {
        $this->users = $users;
    }

    public function hydrateUser($user, $providerName = '')
    {
        return UserHydrator::hydrate($user, UsersMockData::getProviderObjKeys($providerName))
            ->setProviderName($providerName);
    }

    public function hydrateUsersList($users, $providerName = '')
    {
        $hydratedUsers = [];
        foreach ($users as $user) {
            $hydratedUsers[] = UserHydrator::hydrate($user, UsersMockData::getProviderObjKeys($providerName))
                ->setProviderName($providerName);
        }
        return $hydratedUsers;
    }

}
