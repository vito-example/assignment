<?php
/**
 *  app/Http/Controllers/Api/ArticleController.php
 *
 * Date-Time: 14.06.21
 * Time: 09:30
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\ArticleRequest;
use App\Http\Requests\v1\CommentRequest;
use App\Http\Resources\v1\ArticleCollection;
use App\Http\Resources\v1\CommentCollection;
use App\Models\Article;
use App\Repositories\ArticleRepositoryInterface;
use App\Repositories\CommentRepositoryInterface;
use Illuminate\Http\Request;

/**
 * Class ArticleController
 * @package App\Http\Controllers\Api
 */
class ArticleController extends Controller
{

    /**
     * @var \App\Repositories\ArticleRepositoryInterface
     */
    private $articleRepository;
    /**
     * @var \App\Repositories\CommentRepositoryInterface
     */
    private $commentRepository;

    /**
     * ArticleController constructor.
     *
     * @param \App\Repositories\ArticleRepositoryInterface $articleRepository
     * @param \App\Repositories\CommentRepositoryInterface $commentRepository
     */
    public function __construct(ArticleRepositoryInterface $articleRepository, CommentRepositoryInterface $commentRepository)
    {
        $this->articleRepository = $articleRepository;
        $this->commentRepository = $commentRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\Requests\v1\ArticleRequest $request
     *
     * @return \App\Http\Resources\v1\ArticleCollection
     */
    public function index(ArticleRequest $request): ArticleCollection
    {
        return new ArticleCollection($this->articleRepository->getData($request));
    }

    /**
     * Show Article comments -> If article does not exist auto 404.
     *
     * @param \App\Http\Requests\v1\CommentRequest $request
     * @param int $id
     *
     * @return \App\Http\Resources\v1\CommentCollection
     */
    public function showArticleComments(CommentRequest $request,int $id): CommentCollection
    {
        // Check if not exist throw exception
        $this->articleRepository->findOrFail($id);

        $request->merge([
            'article' => $id
        ]);

        return new CommentCollection($this->commentRepository->getData($request));
    }
}
