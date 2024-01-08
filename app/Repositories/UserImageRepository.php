<?php

namespace App\Repositories;

use App\Models\userImage;
use Illuminate\Config\Repository;

class userImageRepository extends Repository
{
    public $userImage;
    public function __construct(userImage $userImage)
    {
        $this->userImage = $userImage;
    }

    public function find($id)
    {
        return $this->userImage->find($id);
    }

    public function create(array $data)
    {
        return $this->userImage->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->userImage->find($id)->update($data);
    }

    public function delete($id)
    {
        if(empty($id)) {
            return false;
        }

        return $this->userImage->where('id', $id)->update(['is_deleted' => 1]);
    }
}