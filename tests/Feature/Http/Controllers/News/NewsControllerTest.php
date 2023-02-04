<?php

namespace Tests\Feature\Http\Controllers\News;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    public function testIndexSuccessStatus(): void
    {
        $response = $this->get(route('news', ['category' => 'storyTest']));

        $response->assertStatus(200);
    }

    public function testShowSuccessStatus(): void
    {
        $response = $this->get(route('article', ['id' => 2, 'category' => 'test']));

        $response->assertStatus(200);
    }
}
