<?php
/**
 *  app/Http/Resources/v1/TagCollection.php
 *
 * Date-Time: 14.06.21
 * Time: 10:43
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class TagCollection
 * @package App\Http\Resources\v1
 */
class TagCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'data' => $this->collection->map(
                function ($tag) {
                    return new TagResource($tag);
                })
        ];    }
}
