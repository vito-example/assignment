<?php
/**
 *  app/Http/Resources/v1/CommentCollection.php
 *
 * Date-Time: 14.06.21
 * Time: 10:20
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class CommentCollection
 * @package App\Http\Resources\v1
 */
class CommentCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(
                function ($comment) {
                    return new CommentResource($comment);
                })
        ];
    }
}
