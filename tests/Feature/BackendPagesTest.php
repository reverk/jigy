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

class BackendPagesTest extends TestCase
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
        $this->secondUser->assignRole('writer');

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
            'thumbnail_image' => 'static/images/default_thumbpng.jpg'
        ]);
    }

    /**
     * Tests as a super-admin user.
     *
     * @return void
     */
    public function testDashboardInterfaceAsSuperAdmin()
    {
        $this->initData();

        $this->post('/login', [
            'email' => $this->superAdmin->email,
            'password' => 'password',
        ])->assertStatus(302);

        $this->get('/dashboard')
            ->assertSee($this->superAdmin->name)
            ->assertSee('Create Article')
            ->assertSee('Articles')
            ->assertSee('All Articles')
            ->assertSee('Tags')
            ->assertSee('Categories')
            ->assertSee('Users')
            ->assertSee('Settings')
            ->assertSee('Stats');
    }

    /**
     * Tests as a regular user.
     *
     * @return void
     */
    public function testDashboardInterfaceAsWriter()
    {
        $this->initData();

        $this->post('/login', [
            'email' => $this->secondUser->email,
            'password' => 'password',
        ])->assertStatus(302);

        $this->get('/dashboard')
            ->assertSee($this->secondUser->name)
            ->assertSee('Create Article')
            ->assertSee('Articles')
            ->assertSee('Settings')
            ->assertSee('Stats')
            ->assertDontSee('All Articles')
            ->assertDontSee('Tags')
            ->assertDontSee('Categories')
            ->assertDontSee('Users');
    }
}
