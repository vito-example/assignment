<?php
/**
 *  app/Repositories/Eloquent/ArticleRepository.php
 *
 * Date-Time: 14.06.21
 * Time: 09:44
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */

namespace App\Repositories\Eloquent;

use App\Models\Article;
use App\Repositories\ArticleRepositoryInterface;
use App\Repositories\Eloquent\Base\BaseRepository;

/**
 * Class DepartmentRepository
 * @package App\Repositories\Eloquent
 */
class ArticleRepository extends BaseRepository implements ArticleRepositoryInterface
{
    /**
     * ArticleRepository constructor.
     *
     * @param \App\Models\Article $model
     */
    public function __construct(Article $model)
    {
        parent::__construct($model);
    }

}