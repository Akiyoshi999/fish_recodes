<?php

namespace Tests\Feature\Http;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCase01()
    {
        $response = $this->get('/recode/create');
        $response->assertStatus(200);
    }

    /**
     * メソッドが不正
     * @return void
     */
    public function testCreate02()
    {
        $response = $this->post('/recode/create');
        $response->assertStatus(405);
    }
}