<?php


namespace Tests\MockData\Providers;


class MockDataProviderY
{
    CONST OBJ_KEYS= [
        'amount' => 'balance',
        'currency' => 'currency',
        'p_email' => 'email',
        'status_code' => 'status',
        'reg_date' => 'created_at',
        'parent_id' => 'id'
    ];
    CONST RESPONSE = '{
                          "data": [
                                {
                                    "balance":300,
                                    "currency":"AED",
                                    "email":"parent2@parent.eu",
                                    "status":100,
                                    "created_at": "22/12/2018",
                                    "id": "4fc2-a8d1"
                                }
                            ]
                      }';
}
