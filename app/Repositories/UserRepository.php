<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Config\Repository;

class UserRepository extends Repository
{
    public $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function all()
    {
        return $this->user->all();
    }

    public function orderByUserImage()
    {
        return $this->user
            ->withCount('images')
            ->orderByDesc('images_count');
    }

    public function find($id)
    {
        return $this->user->find($id);
    }

    public function create(array $data)
    {
        return $this->user->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->user->find($id)->update($data);
    }

    public function delete($id)
    {
        if(empty($id)) {
            return false;
        }

        return $this->user->where('id', $id)->update(['is_deleted' => 1]);
    }
}