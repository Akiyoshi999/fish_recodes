<?php

namespace Tests\Feature\Http;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Recode;

class RecodeTest extends TestCase
{
    // use RefreshDatabase;

    // public function setUp(): void
    // {
    //     parent::setUp();
    //     Recode::factory()->count(12)->create();
    // }
    /**
     * @dataProvider providerParams
     */
    public function testRecode01($id)
    {
        $response = $this->get("/recode/{$id}");
        $response->assertStatus(200);
    }

    /**
     * 正常なID
     * @return array
     */
    public function providerParams()
    {
        return [
            [1],
            [2],
        ];
    }
    /**
     * @dataProvider providerErrorParams
     */
    public function testRecode02($id)
    {
        $response = $this->get("/recode/{$id}");
        $response->assertStatus(302);
        $response->assertRedirect("/");
    }

    /**
     * 不正なID
     * @return array
     */
    public function providerErrorParams()
    {
        return [
            [99],
            ["aaa"],
        ];
    }
}