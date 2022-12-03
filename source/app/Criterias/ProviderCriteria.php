<?php


namespace App\Criterias;


use App\Contracts\ICriteria;
use App\Entities\User;

/**
 * Class ProviderCriteria
 * @package App\Criterias
 */
abstract class ProviderCriteria implements ICriteria
{
    /**
     * @param array $users
     * @param string $provider
     * @return User[]
     */
    public static function meetCriteria(array $users, $provider): array
    {
        // TODO: Implement meetCriteria() method.
        $filteredUsers=[];
        foreach ($users as $user) {
            if (strtolower($user->getProviderName()) == strtolower($provider))
                $filteredUsers[]= $user;
        }
        return  $filteredUsers;
    }

}
