<?php


namespace App\Hydrators;


use App\Contracts\IHydrate;
use App\Entities\User;

/**
 * Class UserHydrator
 * @package App\Hydrators
 */
class UserHydrator implements IHydrate
{
    /**
     * @param array $data
     * @param array|null $objKeys
     * @return User|mixed
     */
    public static function hydrate(array $data, array $objKeys = [])
    {
        // TODO: Implement hydrate() method.
        $user = new User();
        return $user->setParentAmount($data[$objKeys["amount"]])
            ->setEmail($data[$objKeys["p_email"]])
            ->setCurrency($data[$objKeys["currency"]])
            ->setParentId($data[$objKeys["parent_id"]])
            ->setStatusCode($data[$objKeys["status_code"]])
            ->setRegisterationDate($data[$objKeys["reg_date"]]);
    }

}
