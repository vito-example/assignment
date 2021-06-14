<?php
/**
 *  app/Http/Controllers/v1/TagController.php
 *
 * Date-Time: 14.06.21
 * Time: 10:44
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\ArticleRequest;
use App\Http\Requests\v1\TagRequest;
use App\Http\Resources\v1\ArticleCollection;
use App\Http\Resources\v1\TagCollection;
use App\Models\Tag;
use App\Repositories\ArticleRepositoryInterface;
use App\Repositories\TagRepositoryInterface;
use Illuminate\Http\Request;

/**
 * Class TagController
 * @package App\Http\Controllers\v1
 */
class TagController extends Controller
{

    /**
     * @var \App\Repositories\TagRepositoryInterface
     */
    private $tagRepository;
    /**
     * @var \App\Repositories\ArticleRepositoryInterface
     */
    private $articleRepository;

    public function __construct(TagRepositoryInterface $tagRepository, ArticleRepositoryInterface $articleRepository)
    {
        $this->tagRepository = $tagRepository;
        $this->articleRepository = $articleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\Requests\v1\TagRequest $request
     *
     * @return \App\Http\Resources\v1\TagCollection
     */
    public function index(TagRequest $request): TagCollection
    {
        return new TagCollection($this->tagRepository->getData($request));
    }

    /**
     * Show tag articles -> If tag does not exist auto 404.
     *
     * @param \App\Http\Requests\v1\ArticleRequest $request
     * @param int $id
     *
     * @return \App\Http\Resources\v1\ArticleCollection
     */
    public function showTagArticles(ArticleRequest $request, int $id): ArticleCollection
    {
        // Check if not exist throw exception
        $this->tagRepository->findOrFail($id);

        $request->merge([
            'tag' => $id
        ]);

        return new ArticleCollection($this->articleRepository->getData($request));
    }
}
