<?php namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\Repositories\Criteria\User\IdOverHundred;

use Illuminate\Http\Request as Request;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{

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

        // $this->middleware('auth');

        // $this->middleware('log', ['only' => [
        //      'fooAction',
        //      'barAction',
        // ]]);

        // $this->middleware('subscribed', ['except' => [
        //      'fooAction',
        //      'barActi  on',
        // ]]);
    }

    /**
     * Get the specified user.
     *
     * @param  Request  $request
     * @param  string  $id
     * @return Response
     */
    public function get(Request $request, $id)
    {
        return "User with id => " . $id;
    }

    /**
     * Get the specified user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function getIdOverHundred(Request $request)
    {
        $criteria = new IdOverHundred();
        $data = $this->user->getByCriteria($criteria)->all();

        return response()->json($data);
    }

    /**
     * Update the specified user.
     *
     * @param  Request  $request
     * @param  string  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }


}
