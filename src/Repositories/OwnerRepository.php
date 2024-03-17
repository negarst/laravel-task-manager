<?php

namespace Negarst\TaskManager\Repositories;

use Negarst\TaskManager\Models\Owner;

class OwnerRepository extends BaseRepository implements OwnerRepositoryInterface
{
    public function __construct(Owner $model)
    {
        parent::__construct($model);
    }

    public function createOrUpdate($id, $email) {
        return $this->model->createOrUpdate(['id' => $id, 'email' => $email]);
    }
}