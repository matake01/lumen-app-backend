<?php namespace App\Http\Controllers;

use App\Services\MessageService;

use Illuminate\Http\Request as Request;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\Cache;

class MessageController extends Controller
{

    /**
     * The message service instance.
     */
    protected $service;

    /**
     * Create a new controller instance.
     *
     * @param  MessageRepository  $message
     * @return void
     */
    public function __construct(MessageService $service)
    {
        $this->service = $service;

        // $this->middleware('auth');
    }

    /**
     * Create the specified message.
     *
     * @param  Request  $request
     * @return Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Delete the specified message.
     *
     * @param  Request  $request
     * @return Response
     */
    public function delete(Request $request, $id)
    {

    }

    /**
     * Get the specified message.
     *
     * @param  Request  $request
     * @param  string  $id
     * @return Response
     */
    public function get(Request $request, $id)
    {
        $message = $this->service->find($id);

        return response()->json($message);
    }

    /**
     * Update the specified message.
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
