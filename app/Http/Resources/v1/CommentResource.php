<?php
/**
 *  app/Http/Resources/v1/CommentResource.php
 *
 * Date-Time: 14.06.21
 * Time: 10:20
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class CommentResource
 * @package App\Http\Resources\v1
 */
class CommentResource extends JsonResource
{
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
            'content' => $this->content,
            'created_at' => $this->created_at,
        ];
    }
}
