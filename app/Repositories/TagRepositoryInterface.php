<?php
/**
 *  app/Repositories/TagRepositoryInterface.php
 *
 * Date-Time: 14.06.21
 * Time: 10:40
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Repositories;


use App\Http\Requests\v1\ArticleRequest;
use App\Http\Requests\v1\TagRequest;

/**
 * Interface TagRepositoryInterface
 * @package App\Repositories
 */
interface TagRepositoryInterface
{
    /**
     * @param \App\Http\Requests\v1\TagRequest $request
     * @param array $with
     */
    public function getData(TagRequest $request, array $with = []);

    /**
     * @param integer $id
     * @param array $columns
     */
    public function findOrFail(int $id, array $columns = ['*']);
}
