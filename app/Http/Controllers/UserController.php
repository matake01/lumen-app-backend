<?php namespace App\Http\Controllers;

use App\Services\UserService;

use Illuminate\Http\Request as Request;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{

    /**
     * The user service instance.
     */
    protected $service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserService $service)
    {
        $this->service = $service;

        // $this->middleware('auth');
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
        $user = $this->service->find($id);

        return response()->json($user);
    }

}
