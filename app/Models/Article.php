<?php
/**
 *  app/Models/Article.php
 *
 * Date-Time: 14.06.21
 * Time: 09:18
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */

namespace App\Models;

use App\Traits\ScopeFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


/**
 * Class Article
 * @package App\Models
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property string $created_at
 */
class Article extends Model
{
    use HasFactory, ScopeFilter;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'articles';

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
            'tag' => [
                'hasParam' => true,
                'scopeMethod' => 'tag'
            ]
        ];
    }

    /**
     *  Get Article Comments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function comments(): BelongsToMany
    {
        return $this->belongsToMany(Comment::class, 'article_comment');
    }

    /**
     *  Get Article Tags
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'article_tag');
    }


    /**
     * @return int
     */
    public function getTotalCommentsAttribute(): int
    {
        return $this->comments()->count();
    }

    /**
     * @param $query
     * @param int $tag
     *
     * @return mixed
     */
    public function scopeTag($query, int $tag)
    {
        return $query->whereHas('tags', function ($query) use ($tag) {
            return $query->where('id', $tag);
        });
    }
}
