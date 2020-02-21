<?php

namespace App\Repositories;

use App\Entities\Users\User;

interface UserRepositoryInterface
{
    public function __construct(User $users);

   public function auth();

	public function getAll();
	
	public function get($id);
	
	public function store(array $data);
	
	public function update($id, array $data);
	
	public function destroy($id);
}