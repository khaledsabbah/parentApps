<?php


namespace App\Criterias;


use App\Contracts\ICriteria;
use App\Entities\User;

/**
 * Class StatusCodeCriteria
 * @package App\Criterias
 */
abstract class StatusCodeCriteria implements ICriteria
{
    /**
     * @param array $users
     * @param string $statusCode
     * @return User[]
     */
    public static function meetCriteria(array $users, $statusCode): array
    {
        // TODO: Implement meetCriteria() method.
        $filteredUsers=[];
        foreach ($users as $user) {
            if (strtolower($user->getStatusCode()) == strtolower($statusCode))
                $filteredUsers[]= $user;
        }
        return  $filteredUsers;
    }

}
