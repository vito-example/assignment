<?php
/**
 *  app/Repositories/Eloquent/CommentRepository.php
 *
 * Date-Time: 14.06.21
 * Time: 10:27
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */

namespace App\Repositories\Eloquent;

use App\Models\Article;
use App\Models\Comment;
use App\Repositories\ArticleRepositoryInterface;
use App\Repositories\CommentRepositoryInterface;
use App\Repositories\Eloquent\Base\BaseRepository;

/**
 * Class CommentRepository
 * @package App\Repositories\Eloquent
 */
class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{
    /**
     * CommentRepository constructor.
     *
     * @param \App\Models\Comment $model
     */
    public function __construct(Comment $model)
    {
        parent::__construct($model);
    }

}