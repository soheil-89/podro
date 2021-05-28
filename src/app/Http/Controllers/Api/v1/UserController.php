<?php


namespace App\Http\Controllers\Api\v1;


use App\Http\Requests\v1\ConfirmUserRequest;
use App\Http\Requests\v1\RegisterRequest;
use App\Http\Requests\v1\UserListRequest;
use App\Http\Resources\v1\RegisterResource;
use App\Http\Resources\v1\UserConfirmResource;
use App\Models\User;

/**
 * Class UserController
 * @package App\Http\Controllers\Api\v1
 */
class UserController extends Controller
{
    /**
     * @param RegisterRequest $request
     * @return RegisterResource
     */
    public function register(RegisterRequest $request)
    {
        $input = $request->only("email", "password", "full_name");
        $user = User::create($input);
        return new RegisterResource($user);
    }

    /**
     * @param UserListRequest $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(UserListRequest $request)
    {
        $input = $request->only("user_id", "user_type", "parent", "status", "email", "password", "full_name");
        $user = new User;
        foreach ($input as $key => $val) {
            $user = $user->where($key, 'like', $val . "%");
        }
        return UserConfirmResource::collection($user->paginate($this->pageCount));

    }

    /**
     * @param ConfirmUserRequest $request
     * @return UserConfirmResource
     */
    public function confirm(ConfirmUserRequest $request)
    {
        $input = $request->only("user_id", "user_type", "parent", "status");
        $user = User::find($input["user_id"]);
        $user->update($input);
        return new UserConfirmResource($user);
    }

}
