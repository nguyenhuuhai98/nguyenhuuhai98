<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Follows;
use Illuminate\Support\Facades\View;;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\Course\CourseRepositoryInterface::class,
            \App\Repositories\Course\CourseEloquentRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Category\CategoryRepositoryInterface::class,
            \App\Repositories\Category\CategoryEloquentRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Lession\LessionRepositoryInterface::class,
            \App\Repositories\Lession\LessionEloquentRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Test\TestRepositoryInterface::class,
            \App\Repositories\Test\TestEloquentRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Question\QuestionRepositoryInterface::class,
            \App\Repositories\Question\QuestionEloquentRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Answer\AnswerRepositoryInterface::class,
            \App\Repositories\Answer\AnswerEloquentRepository::class
        );

        $this->app->singleton(
            \App\Repositories\User\UserRepositoryInterface::class,
            \App\Repositories\User\UserEloquentRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Activity\ActivityRepositoryInterface::class,
            \App\Repositories\Activity\ActivityEloquentRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Word\WordRepositoryInterface::class,
            \App\Repositories\Word\WordEloquentRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Notification\NotificationRepositoryInterface::class,
            \App\Repositories\Notification\NotificationEloquentRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categories = Category::all();

        View::share('categories', $categories);
    }
}
