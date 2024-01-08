<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\userImageRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    protected $userRepository;
    protected $userImageRepository;

    public function __construct(UserRepository $userRepository, UserImageRepository $userImageRepository)
    {
        $this->userRepository = $userRepository;
        $this->userImageRepository = $userImageRepository;
    }

    public function all() 
    {
        $users = $this->userRepository->all();
        return UserResource::collection($users);
    }

    public function getUsersSortedByImages() 
    {
        $users = $this->userRepository->orderByUserImage()->paginate(100);
        return UserResource::collection($users);
    }

    public function store(UserCreateRequest $request)
    {
        $user = $this->userRepository->create($request->only(['name', 'city']));

        if ($request->images) {
            foreach ($request->images as $image) {
                $imagePath = $image->store('user_images', 'public');
                $data = [
                    'user_id' => $user->id,
                    'image' => $imagePath,
                ];
                $this->userImageRepository->create($data);
            }
        }

        return response()->json(['message' => 'User and UserImage created successfully', 'user' => $user]);
    }
}
