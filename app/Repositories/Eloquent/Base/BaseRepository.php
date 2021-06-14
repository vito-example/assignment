<?php
/**
 *  app/Repositories/Eloquent/Base/BaseRepository.php
 *
 * Date-Time: 14.06.21
 * Time: 09:25
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */

namespace App\Repositories\Eloquent\Base;

use App\Exceptions\DataNotFoundException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Class BaseRepository
 * @package App\Repositories\Eloquent\Base
 */
class BaseRepository implements EloquentRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * Class Constructor
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /** Get Data with pagination
     *
     * @param $request
     * @param array $with
     *
     * @return mixed
     */
    public function getData($request, array $with = [])
    {
        $data = $this->model->filter($request);


        $limit = 10;
        if ($request->filled('limit')) {
            $limit = $request['limit'];
        }

        if ($request->filled('paginate')) {
            return $data->limit($limit)->paginate($request['paginate']);
        }


        return $data->limit($limit)->get();
    }

    /**
     * Find model by the given ID
     *
     * @param integer $id
     * @param array $columns
     *
     * @return mixed
     * @throws \App\Exceptions\DataNotFoundException
     */
    public function findOrFail(int $id, array $columns = ['*'])
    {
        $data = $this->model->find($id, $columns);
        if (!$data) {
            throw new DataNotFoundException();
        }
        return $data;
    }
}
