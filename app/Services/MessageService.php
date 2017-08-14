<?php namespace App\Services;

use App\Repositories\MessageRepository;

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
        return $this->message->skipCriteria()->find($id);
    }

}
