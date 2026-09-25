<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dummy post data
|--------------------------------------------------------------------------
| Later in de cursus vervang je dit array door een Eloquent-query
| (bijv. Post::latest()->get()) zodra er een posts-tabel is.
*/
function blogPosts(): \Illuminate\Support\Collection
{
    $lorem = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt '
        . 'ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation '
        . 'ullamco laboris nisi ut aliquip ex ea commodo consequat.';

    $categories = [
        ['name' => 'Techniques', 'color' => 'blue'],
        ['name' => 'Updates', 'color' => 'red'],
    ];

    $body = '<p>' . $lorem . '</p>'
        . '<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>'
        . '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, '
        . 'totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae '
        . 'dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p>'
        . '<h2 class="font-bold text-lg">Sed quia consequuntur</h2>'
        . '<p>Magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem '
        . 'ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora '
        . 'incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>';

    return collect([1, 2, 3, 4, 5])->map(function ($i) use ($lorem, $categories, $body) {
        return [
            'id' => $i,
            'image' => "illustration-{$i}.png",
            'title' => 'This is a big title and it will look great on two or even three lines. Wooohoo!',
            'excerpt' => $lorem,
            'body' => $body,
            'categories' => $categories,
            'published' => '1 day ago',
        ];
    });
}

Route::get('/', function () {
    return view('index', ['posts' => blogPosts()]);
})->name('home');

Route::get('/post/{id}', function (int $id) {
    $post = blogPosts()->firstWhere('id', $id);

    abort_unless($post, 404);

    return view('post', ['post' => $post]);
})->name('post.show');