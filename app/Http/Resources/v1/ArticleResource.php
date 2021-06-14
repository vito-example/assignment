<?php
/**
 *  app/Http/Resources/v1/ArticleResource.php
 *
 * Date-Time: 14.06.21
 * Time: 09:32
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ArticleResource
 * @package App\Http\Resources\v1
 */
class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
              'id' => $this->id,
            'title' => $this->title,
            'created_at' => $this->created_at,
            'comment_count' => $this->total_comments,
            'tags' => new ArticleTagsCollection($this->tags)
        ];
    }
}
