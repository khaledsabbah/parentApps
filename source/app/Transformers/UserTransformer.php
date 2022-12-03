<?php


namespace App\Transformers;


use App\Contracts\ITransform;
use App\Entities\User;

/**
 * Class UserTransformer
 * @package App\Transformers
 */
class UserTransformer implements ITransform
{

    /**
     * @param  User[]
     * @return array
     */
    public static function transform($users): array
    {
        // TODO: Implement transform() method.
        $transformerData = [];
        foreach ($users as $user) {
            $transformerData[] = [
                "provider"=>$user->getProviderName(),
                "amount"=>$user->getParentAmount(),
                "currency"=>$user->getCurrency(),
                "email"=>$user->getEmail(),
                "statusCode"=>$user->getStatusCode(),
                "registrationDate"=>$user->getRegisterationDate(),
                "id"=>$user->getParentId(),
            ];
        }

        return $transformerData;
    }

}
