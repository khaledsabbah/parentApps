<?php


namespace App\Criterias;


use App\Contracts\ICriteria;

/**
 * Class BalanceCriteria
 * @package App\Criterias
 */
class BalanceCriteria implements ICriteria
{
    /**
     * @param array $users
     * @param array|int $threshold
     * @return array
     */
    public static function meetCriteria(array $users, $threshold= ["min"=>0, "max"=>null]): array
    {
        // TODO: Implement meetCriteria() method.
        $filteredUsers=[];
        foreach ($users as $user) {
            if ($user->getParentAmount() >= $threshold['min'] && $user->getParentAmount() <= $threshold['max'])
                $filteredUsers[]= $user;
        }
        return  $filteredUsers;
    }

}
