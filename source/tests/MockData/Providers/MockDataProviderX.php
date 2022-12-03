<?php


namespace Tests\Providers;


class MockDataProviderX
{
    CONST OBJ_KEYS= [
        'amount' => 'parentAmount',
        'currency' => 'Currency',
        'p_email' => 'parentEmail',
        'status_code' => 'statusCode',
        'reg_date' => 'registerationDate',
        'parent_id' => 'parentIdentification'
    ];

    CONST RESPONSE = '{
                          "data": [
                                {
                                    "parentAmount":200,
                                    "Currency":"USD",
                                    "parentEmail":"parent1@parent.eu",
                                    "statusCode":1,
                                    "registerationDate": "2018-11-30",
                                    "parentIdentification": "d3d29d70-1d25-11e3-8591-034165a3a613"
                                }
                            ]
                      }';
}
