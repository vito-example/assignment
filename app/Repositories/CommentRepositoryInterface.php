<?php
/**
 *  app/Repositories/CommentRepositoryInterface.php
 *
 * Date-Time: 14.06.21
 * Time: 10:27
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Repositories;


use App\Http\Requests\v1\CommentRequest;

/**
 * Interface CommentRepositoryInterface
 * @package App\Repositories
 */
interface CommentRepositoryInterface
{
    /**
     * @param \App\Http\Requests\v1\CommentRequest $request
     * @param array $with
     *
     * @return mixed
     */
    public function getData(CommentRequest $request,array $with = []);

    /**
     * @param integer $id
     * @param array $columns
     */
    public function findOrFail(int $id, array $columns = ['*']);
}
