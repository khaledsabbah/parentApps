<?php

namespace Tests;

use App\Hydrators\UserHydrator;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\MockData\UsersMockData;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $objKeys = [
        'amount' => 'parentAmount',
        'currency' => 'Currency',
        'p_email' => 'parentEmail',
        'status_code' => 'statusCode',
        'reg_date' => 'registerationDate',
        'parent_id' => 'parentIdentification'
    ];

    use CreatesApplication;

    public $users = [];

    public function setUp(): void
    {
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
        return UserHydrator::hydrate($user, $this->objKeys)
            ->setProviderName($providerName);
    }

    public function hydrateUsersList($users, $providerName = '')
    {
        $hydratedUsers = [];
        foreach ($users as $user) {
            $hydratedUsers[] = UserHydrator::hydrate($user, $this->objKeys)
                ->setProviderName($providerName);
        }
        return $hydratedUsers;
    }

}
