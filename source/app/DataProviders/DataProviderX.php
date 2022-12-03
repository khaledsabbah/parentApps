<?php


namespace App\DataProviders;


class DataProviderX extends AbstractDataProvider
{

    const API_URL = "providers/X.json";

    const JSON_RESPONSE_PARENT_KEY="data";

    const OBJ_KEYS = [
        'amount' => 'parentAmount',
        'currency' => 'Currency',
        'p_email' => 'parentEmail',
        'status_code' => 'statusCode',
        'reg_date' => 'registerationDate',
        'parent_id' => 'parentIdentification'
    ];

}
