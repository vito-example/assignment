<?php
/**
 *  app/Repositories/Eloquent/TagRepository.php
 *
 * Date-Time: 14.06.21
 * Time: 10:42
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */

namespace App\Repositories\Eloquent;

use App\Models\Comment;
use App\Models\Tag;
use App\Repositories\Eloquent\Base\BaseRepository;
use App\Repositories\TagRepositoryInterface;

/**
 * Class TagRepository
 * @package App\Repositories\Eloquent
 */
class TagRepository extends BaseRepository implements TagRepositoryInterface
{
    /**
     * TagRepository constructor.
     *
     * @param \App\Models\Tag $model
     */
    public function __construct(Tag $model)
    {
        parent::__construct($model);
    }

}