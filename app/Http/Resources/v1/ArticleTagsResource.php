<?php
/**
 *  app/Http/Resources/v1/ArticleTagsResource.php
 *
 * Date-Time: 14.06.21
 * Time: 09:39
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Http\Resources\v1;

use App\Models\Tag;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ArticleTagsResource
 * @package App\Http\Resources\v1
 */
class ArticleTagsResource extends JsonResource
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = Tag::class;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title
        ];
    }


}
