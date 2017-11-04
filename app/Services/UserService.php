<?php namespace App\Services;

use App\Repositories\UserRepository;
use App\Repositories\Criteria\User\IdOverHundred;

class UserService {

    /**
     * The user repository instance.
     */
    protected $user;

    /**
     * Create a new controller instance.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function find($id) {
        $criteria = new IdOverHundred();

        $data = $this->user->getByCriteria($criteria)->all();
    #    $data = $this->user->skipCriteria()->find($id);

        return $data;
    }

}
