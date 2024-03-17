<?php

namespace Negarst\TaskManager\Repositories;

interface OwnerRepositoryInterface
{
    /**
     * Create or update an owner.
     *
     * @param int $id
     * @param string $email
     * @return \Negarst\TaskManager\Models\Owner
     */
    public function createOrUpdate($id, $email);
}
