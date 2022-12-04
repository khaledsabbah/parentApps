<?php


namespace Tests\App\Criterias;


use App\Criterias\BalanceCriteria;
use Tests\TestCase;

/**
 * Class BalanceCriteriaTest
 * @package Tests\Unit\App\Criterias
 */
class BalanceCriteriaTest extends TestCase
{

    public function testUserBalanceThreesholdCriteriaTest()
    {
        $users= $this->hydrateUsersList($this->users, "DataProviderX");

        $min= 0;
        $max=200;
        $filteredUsers= BalanceCriteria::meetCriteria($users, ['min'=>$min, "max"=>$max]);

        $this->assertNotEquals(0, count($filteredUsers),"MockDataProviderX With Min:$min & Max:$max Failed !!");

        foreach ($filteredUsers as $user){
            $this->assertLessThanOrEqual($user->getParentAmount(), $min);
            $this->assertGreaterThanOrEqual($user->getParentAmount(), $max);
        }
    }

}
