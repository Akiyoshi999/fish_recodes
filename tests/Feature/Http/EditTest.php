<?php

namespace Tests\Feature\Http;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Recode;
use Tests\TestCase;

class EditTest extends TestCase
{
    // use RefreshDatabase;

    // public function setUp(): void
    // {
    //     parent::setUp();
    //     Recode::factory()->count(12)->create();
    // }
    /**
     * 正常系　
     * @dataProvider provParams
     * @return void
     */
    public function testEdit01($id)
    {
        $response = $this->get("/recode/edit/{$id}");
        $response->assertStatus(200);
    }

    /**
     * 異常系 メソッドが不正
     * @dataProvider provParams
     * @return 
     */
    public function testEdit02($id)
    {
        $response = $this->post("/recode/edit/{$id}");
        $response->assertStatus(405);
    }

    /**
     * @return array
     */
    public function provParams()
    {
        return [
            [1],
        ];
    }
}