<?php
/**
 *  app/Http/Resources/v1/TagResource.php
 *
 * Date-Time: 14.06.21
 * Time: 10:43
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class TagResource
 * @package App\Http\Resources\v1
 */
class TagResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'article_count' => $this->total_articles
        ];
    }
}
