<?php namespace App\Http\Controllers\Api;

use App\Services\MessageService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request as Request;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\Cache;

use Log;

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
    }

    /**
     * Create the specified message.
     *
     * @param  Request  $request
     * @return Response
     */
    public function create(Request $request)
    {
      Log::debug('Create message');

    }

    /**
     * Delete the specified message.
     *
     * @param  Request  $request
     * @return Response
     */
    public function delete(Request $request, $id)
    {
      Log::debug('Delete message');

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
        Log::debug('Get message');

        $message = $this->service->find($id);

        return response()->json($message);
    }

    /**
     * Get all messages.
     *
     * @param  Request  $request
     * @param  string  $id
     * @return Response
     */
    public function getAll(Request $request, $id)
    {
        Log::debug('Get all messages');

        return response()->json(array('test' => 1, 2, 3));
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
        Log::debug('Update message');

        //
    }


}
