<?php


namespace App\Contracts;


/**
 * Interface ICriteria
 * @package App\Contracts
 */
interface ICriteria
{
    const SORT_ASECENDING = 1;
    const SORT_DESECENDING = 0;

    /**
     * @param array $users
     * @param @Var $threshold
     * @return array
     */
    public static function meetCriteria(array $users, $threshold): array;
}
