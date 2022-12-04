<?php


namespace App\DataProviders;


class DataProviderY extends AbstractDataProvider
{
    const API_URL = "Y.json";

    const JSON_RESPONSE_PARENT_KEY="data";

    const OBJ_KEYS = [
        'amount' => 'balance',
        'currency' => 'currency',
        'p_email' => 'email',
        'status_code' => 'status',
        'reg_date' => 'created_at',
        'parent_id' => 'id'
    ];


}
