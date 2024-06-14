  <?php

use App\Events\BlogCreatedEvent;
use Appsorigin\Plots\Models\Blog;
  use Appsorigin\Plots\Models\Project;
  use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('posts', function () {

    $result = \Illuminate\Support\Facades\Process::run('dh -f');

    dump( $result->output());

    \Illuminate\Support\Facades\Process::run('service nginx restart -S');

    foreach (\App\Models\Page::all() as $page)
    {
        event(new \App\Events\PageCreatedEvent($page));

    }


    foreach (Project::all() as $project)
    {
        event(new BlogCreatedEvent($project));

    }



    foreach (\Appsorigin\Blog\Models\Blog::all() as $blog)
    {
        event(new BlogCreatedEvent($blog));

    }


    foreach (\Appsorigin\Teams\Models\CompanyTeam::all() as $team)
    {
        event(new BlogCreatedEvent($team));

    }


});
