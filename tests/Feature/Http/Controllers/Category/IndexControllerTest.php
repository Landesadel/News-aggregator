<?php

namespace Tests\Feature\Http\Controllers\Category;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexControllerTest extends TestCase
{
    public function testIndexSuccessStatus(): void
    {
        $response = $this->get('/category');

        $response->assertStatus(200);
    }
}
