<?php

namespace Tests\Feature;

use App\Article;
use App\Category;
use App\Tag;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use UserRoleSeeder;

class CsvTest extends TestCase
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
     * A basic feature test example.
     *
     * @return void
     */
    public function testCsvImports()
    {
        $header = 'Name,Email';
        $row1 = 'CSVImport1,name1@testing.com';
        $row2 = 'CSVImport2,name2@testing.com';
        $content = implode("\n", [$header, $row1, $row2]);

        $this->initData();

        $this->actingAs($this->superAdmin)->post('/dashboard/users/import/csv', [
                'import_file' => UploadedFile::fake()->createWithContent('test.csv', $content)]
        )->assertRedirect();

        $this->get('dashboard/users')->assertSee('Import Success!')->assertSee('CSVImport1');
    }
}
