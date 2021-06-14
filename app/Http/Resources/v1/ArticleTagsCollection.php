<?php
/**
 *  app/Http/Resources/v1/ArticleTagsCollection.php
 *
 * Date-Time: 14.06.21
 * Time: 09:38
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class ArticleTagsCollection
 * @package App\Http\Resources\v1
 */
class ArticleTagsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Support\Collection
     */
    public function toArray($request): \Illuminate\Support\Collection
    {
        return $this->collection->map(
            function ($tag) {
                return new ArticleTagsResource($tag);
            }
        );
    }
}
