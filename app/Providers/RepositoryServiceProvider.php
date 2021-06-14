<?php
/**
 *  app/Providers/RepositoryServiceProvider.php
 *
 * Date-Time: 14.06.21
 * Time: 09:27
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */

namespace App\Providers;

use App\Repositories\ArticleRepositoryInterface;
use App\Repositories\CommentRepositoryInterface;
use App\Repositories\Eloquent\ArticleRepository;
use App\Repositories\Eloquent\Base\BaseRepository;
use App\Repositories\Eloquent\Base\EloquentRepositoryInterface;
use App\Repositories\Eloquent\CommentRepository;
use App\Repositories\Eloquent\TagRepository;
use App\Repositories\TagRepositoryInterface;
use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoryServiceProvider
 * @package App\Providers
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(ArticleRepositoryInterface::class,ArticleRepository::class);
        $this->app->bind(CommentRepositoryInterface::class,CommentRepository::class);
        $this->app->bind(TagRepositoryInterface::class,TagRepository::class);
    }
}
