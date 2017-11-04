<?php namespace App\Services;

use App\Repositories\MessageRepository;

use Log;
use Exception;

class MessageService {

    /**
     * The message repository instance.
     */
    protected $message;

    public function __construct(MessageRepository $message)
    {
        $this->message = $message;
    }

    public function find($id)
    {
        app('sentry')->captureMessage("Testar lite");

        return $this->message->skipCriteria()->find($id);
    }

}
