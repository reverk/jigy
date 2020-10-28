<?php

namespace Tests\Feature;

use App\Article;
use App\Category;
use App\Tag;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use UserRoleSeeder;

class RouteTest extends TestCase
{
    use RefreshDatabase;

    private $superAdmin;
    private $secondUser;
    private $tag;
    private $category;
    private $article;

    /**
     * Initialize data for this test.
     *
     * @return void
     */
    public function initData()
    {
        Artisan::call('db:seed', [
            '--class' => UserRoleSeeder::class,
            '--force' => true
        ]);

        $this->superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'super-admin@testing.com',
            'password' => Hash::make('password'),
        ]);
        $this->superAdmin->assignRole('super-admin');

        $this->secondUser = User::create([
            'name' => 'User 2',
            'email' => 'user2@testing.com',
            'password' => Hash::make('password'),
        ]);

        $this->tag = Tag::create([
            'user_id' => $this->superAdmin->id,
            'name' => 'tag1',
        ]);

        $this->category = Category::create([
            'user_id' => $this->superAdmin->id,
            'name' => 'cat1',
        ]);

        $this->article = Article::create([
            'user_id' => $this->superAdmin->id,
            'title' => 'PHPUnit Testing',
            'excerpt' => 'Sample test text',
            'body' => 'Lorem Ipsum',
            'category_id' => $this->category->id,
            'thumbnail_image' => 'static/images/default_thumbpng.png'
        ]);
    }

    /**
     * Test any publicly accessible routes.
     *
     * @return void
     */
    public function testPublicRoutes()
    {
        $this->initData();

        $urls = [
            '/',
            '/login',
            '/gallery',
            '/tag/' . $this->tag->slug,
            '/category/' . $this->category->slug,
            '/article/' . $this->article->slug,
            '/venue/' . $this->article->is_outside,
            '/password/reset',
        ];

        foreach ($urls as $url) {
            $this->get($url)->assertOk();
        }
    }

    /**
     * Test any authenticated routes.
     *
     * @return void
     */
    public function testBackendRoutes()
    {
        $this->initData();

        $this
            ->post('/login', [
                'email' => $this->superAdmin->email,
                'password' => 'password',
            ])
            ->assertStatus(302); // Expect redirect after logging in.



        $uris = [
            '/dashboard',
            '/dashboard/profile',

            '/dashboard/articles/all',
            '/dashboard/articles/create',
            '/dashboard/articles/edit/' . $this->article->slug,

            '/dashboard/taxonomy',
            '/dashboard/tag/create',
            '/dashboard/tag/edit/' . $this->tag->slug,
            '/dashboard/category/create',
            '/dashboard/category/edit/' . $this->category->slug,

            '/dashboard/users',
            '/dashboard/users/create',
            '/dashboard/users/edit/' . $this->secondUser->id,
        ];

        foreach ($uris as $uri) {
             $this->get($uri)->assertOk();
        }
    }
}
