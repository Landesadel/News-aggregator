<?php

namespace Tests\Feature\Http\Controllers\News;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddNewsControllerTest extends TestCase
{
    public function testIndexSuccessStatus(): void
    {
        $response = $this->get('/add');

        $response->assertStatus(200);
    }
}
