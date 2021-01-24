<?php

namespace Tests\Feature\Http;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreTest extends TestCase
{
    /**
     * 正常系　
     * @dataProvider provParams
     * @return void
     */
    public function testStore01($input)
    {
        $response = $this->post('/recode/store', [
            'user' => $input['user'],
            'date' => $input['date'],
            'place' => $input['place'],
            'weather' => $input['weather'],
            'tide' => $input['tide'],
            'temperature' => $input['temperature'],
            'fish' => $input['fish'],
            'length' => $input['length'],
            'comment' => $input['comment'],
        ]);
        $response->assertStatus(302);
        $response->assertRedirect("/");
    }
    public function provParams()
    {
        return [
            [
                array(
                    "user" => "テスト太郎",
                    "date" => "2020-12-20",
                    "place" => "北海道",
                    "weather" => "晴れ",
                    "tide" => "大潮",
                    "temperature" => "15",
                    "fish" => "シーバス",
                    "length" => "41",
                    "comment" => "テスト内容",
                )
            ],
        ];
    }

    /**
     * 異常系 メソッドが不正
     * @return 
     */
    public function testStore02()
    {
        $response = $this->get("/recode/store");
        $response->assertRedirect("/");
    }
}