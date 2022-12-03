<?php


namespace App\Services;


use App\Criterias\BalanceCriteria;
use App\Criterias\ProviderCriteria;
use App\Criterias\StatusCodeCriteria;
use App\Factory\AbstractProviderFactory;

/**
 * Class UserService
 * @package App\Services
 */
class UserService
{
    private $users = [];

    /**
     * @return array
     */
    public function getUsers(): array
    {
        return $this->users;
    }

    /**
     * @param array $users
     * @return UserService
     */
    public function setUsers(array $users): UserService
    {
        $this->users = $users;
        return  $this;
    }


    public function getProvidersData(array $providers): UserService
    {
        foreach ($providers as $provider) {
            $this->users = array_merge($this->users, AbstractProviderFactory::Instantiate($provider)->mockProviderResponse());
        }
        return $this;
    }

    public function applyFilters($request): UserService
    {
        if ($request->filled("balanceMin"))
            $this->users= BalanceCriteria::meetCriteria($this->users, $threshold= ["min"=>$request->balanceMin, "max"=>$request->balanceMax]);

        if ($request->filled("provider"))
            $this->users= ProviderCriteria::meetCriteria($this->users, $request->provider);

        if ($request->filled("statusCode"))
            $this->users= StatusCodeCriteria::meetCriteria($this->users, $request->statusCode);

        return $this;
    }


}
