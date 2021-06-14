<?php
/**
 *  app/Repositories/Eloquent/Base/EloquentRepositoryInterface.php
 *
 * Date-Time: 14.06.21
 * Time: 09:26
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Repositories\Eloquent\Base;


/**
 * Interface EloquentRepositoryInterface
 * @package App\Repositories\Eloquent\Base
 */
interface EloquentRepositoryInterface
{

    /**
     * @param $request
     * @param array $with
     *
     * @return mixed
     */
    public function getData($request, array $with = []);

    /**
     * @param integer $id
     * @param array $columns
     */
    public function findOrFail(int $id, array $columns = ['*']);
}
