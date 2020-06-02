<?php

namespace App\Repository\Eloquent;

use App\User;
use App\Repository\UserRepositoryInterface;
use Illuminate\Support\Collection;
use App\Events\NewUserRegisteredEvent;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
   public function __construct(User $model)
   {
       parent::__construct($model);
   }


   public function all()
   {
       return $this->model->all();
   }
   public function withRelations($id, $relation){
       $user = $this->model->where("id", $id)->with($relation)->first();
       return $user->$relation;
   }

   public function with($relations)
   {
       return $this->model->with($relations)->get();
   }

   public function findByEmail($email) {
       return $this->model->whereEmail($email)->first();
   }

    public function update($id, $request)
    {
        $user = $this->model->findOrFail($id);
        $user->password = $request->password;
        return $user->save();
    }
   public function createUser($user){
       $u = $this->model->create($user);
       foreach (range(1, 10) as $i) {
           event(new NewUserRegisteredEvent($u));
       }

   }


}
