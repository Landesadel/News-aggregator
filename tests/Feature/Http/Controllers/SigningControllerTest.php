<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SigningControllerTest extends TestCase
{
    /**
     * @return void
     */
    public function testIndexSuccessStatus(): void
    {
        $response = $this->get('/signin');

        $response->assertStatus(200);
    }
}
