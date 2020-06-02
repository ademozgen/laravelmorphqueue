<?php
namespace App\Repository;

use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
   public function all();
   public function with($relation);
   public function update($id, $data);
}
