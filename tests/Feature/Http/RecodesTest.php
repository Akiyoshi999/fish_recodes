<?php

namespace Tests\Feature\Http;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RecodesTest extends TestCase
{
    /**
     * 正常系
     *
     * @return void
     */
    public function testRecodes01()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        echo $response;
        $response->assertSee("a");
    }

    /**
     * 異常系　メソッドが不正
     *
     * @return void
     */
    public function testRecodes02()
    {
        $response = $this->post('/');
        $response->assertStatus(405);
    }
}