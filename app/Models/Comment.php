<?php
/**
 *  app/Models/Comment.php
 *
 * Date-Time: 14.06.21
 * Time: 09:19
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */

namespace App\Models;

use App\Traits\ScopeFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Comment
 * @package App\Models
 * @property integer $id
 * @property string $content
 * @property string $created_at
 */
class Comment extends Model
{
    use HasFactory, ScopeFilter;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * @var string
     */
    public $defaultSort = 'created_at';
    /**
     * @var string
     */
    public $defaultOrder = 'desc';

    public function getFilterScopes(): array
    {
        return [
            'article' => [
                'hasParam' => true,
                'scopeMethod' => 'article'
            ]
        ];
    }

    /**
     *  Get Article Comments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class, 'article_comment');
    }

    /**
     * @param $query
     * @param int $article
     *
     * @return mixed
     */
    public function scopeArticle($query, int $article)
    {
        return $query->whereHas('articles', function ($query) use ($article) {
            return $query->where('id', $article);
        });
    }
}
