<?php
/**
 *  app/Models/Tag.php
 *
 * Date-Time: 14.06.21
 * Time: 09:20
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Models;

use App\Traits\ScopeFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Tag
 * @package App\Models
 * @property integer $id
 * @property string $title
 */
class Tag extends Model
{
    use HasFactory, ScopeFilter;

    /**
     * @var string
     */
    public $defaultSort = 'id';
    /**
     * @var string
     */
    public $defaultOrder = 'desc';

    public function getFilterScopes(): array
    {
        return [

        ];
    }

    /**
     *  Get Tag Articles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class, 'article_tag');
    }

    /**
     * @return int
     */
    public function getTotalArticlesAttribute(): int
    {
        return $this->articles()->count();
    }
}
