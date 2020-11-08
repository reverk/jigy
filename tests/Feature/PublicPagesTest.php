<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if index page has these contents.
     *
     * @return void
     */
    public function testMainPageContents()
    {
        $this->get('/')->assertSee(config('app.name'))
            ->assertSee('Home')
            ->assertSee('Gallery')
            ->assertSee('About')
            ->assertSee('Search')
            ->assertSee('Login');
    }

    /*
     * Test if search works.
     *
     * @return void
     * */
    public function testSearch()
    {
        $this->get('/search', [
            'name' => 'Testing',
        ])->assertOk();
    }
}
