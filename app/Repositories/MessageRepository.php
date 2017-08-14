<?php namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Eloquent\Repository;

use Illuminate\Support\Facades\Cache;

class MessageRepository extends Repository {

    /**
     * The Cache expiration time
     *
     * @var Carbon
     */
    const expirationTime = 10;

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return 'App\Models\Message';
    }

    /**
     * @param array $columns
     * @return mixed
     */
    public function all($columns = array('*')) {
        return Cache::remember('messages.all', MessageRepository::expirationTime, function () use ($columns) {
                return parent::all($columns);
            }
        );
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data) {
        $message = parent::create($data);

        if (is_null($message))
          throw new RepositoryException("Class {$this->model()} failed to persist");

        Cache::put('messages.' . $message->id, $message, MessageRepository::expirationTime);

        return $message;
    }

    /**
     * @param array $data
     * @param $id
     * @param string $attribute
     * @return mixed
     */
    public function update(array $data, $id, $attribute = "id") {
        $affectedRows = $this->update($data, $id, $attribute);

        if ($affectedRows > 0)
        {
          $message = parent::findBy($attribute, $id);

          if (isset($message))
            Cache::put('messages.' . $message->id, $message, MessageRepository::expirationTime);
        }

        return $affectedRows;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id) {
        Cache::forget('messages.' . $id);

        return parent::destroy($id);
    }

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = array('*')) {
        return Cache::remember(
            'messages.' . $id,
            MessageRepository::expirationTime,
            function() use ($id, $columns) {
                return parent::find($id, $columns);
            }
        );
    }

}
