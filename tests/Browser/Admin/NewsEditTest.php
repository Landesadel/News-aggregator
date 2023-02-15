<?php

namespace Tests\Browser\Admin;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NewsEditTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_visit_edit_form(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/3/edit')
            ->assertSee('Edit News');
        });
    }

    /**
     * A Dusk test example.
     */
    public function test_news_edit(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('admin.news.edit', ['news' => 3]))
                ->type('title', 'Test text')
                ->press('Add+')
                ->assertPathIs(route('admin.news.update'));
        });
    }
}
