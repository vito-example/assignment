<?php
/**
 *  app/Repositories/ArticleRepositoryInterface.php
 *
 * Date-Time: 14.06.21
 * Time: 09:43
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Repositories;


use App\Http\Requests\v1\ArticleRequest;

/**
 * Interface DepartmentRepositoryInterface
 * @package App\Repositories
 */
interface ArticleRepositoryInterface
{
    /**
     * @param \App\Http\Requests\v1\ArticleRequest $request
     * @param array $with
     */
    public function getData(ArticleRequest $request, array $with = []);

    /**
     * @param integer $id
     * @param array $columns
     */
    public function findOrFail(int $id, array $columns = ['*']);
}
