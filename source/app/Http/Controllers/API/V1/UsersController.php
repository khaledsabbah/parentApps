<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\ApiController;
use App\Http\Requests\FilterUsersListRequest;
use App\Services\UserService;
use App\Transformers\UserTransformer;

class UsersController extends ApiController
{

    protected $userService;

    /**
     * UsersController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(FilterUsersListRequest $request)
    {
        $users= $this->userService
            ->getProvidersData(config('dataProviders'))
            ->applyFilters($request)
            ->getUsers();
        return $this->respond(['users'=>UserTransformer::transform($users)]);
    }
}
