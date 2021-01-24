<?php

namespace Tests\Feature\Http;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

// class DeleteTest extends TestCase
// {
//     /**
//      * A basic feature test example.
//      *
//      * @return void
//      */
//     public function testExample()
//     {
//         $response = $this->get('/');

//         $response->assertStatus(200);
//     }
// }
// class DeleteHttpStatusTest extends TestCase
// {
//     use RefreshDatabase;

//     public function setUp(): void
//     {
//         parent::setUp();
//         Recode::factory()->count(12)->create();
//     }

//     /**
//      * 正常系　
//      * @dataProvider provParams
//      * @return void
//      */
//     public function testDelete01($id)
//     {
//         $response = $this->post("/recode/delete/{$id}");
//         $response->assertStatus(302);
//         $response->assertRedirect("/");
//     }

//     /**
//      * 異常系 メソッドが不正
//      * @dataProvider provParams
//      * @return 
//      */
//     public function testEdit02($id)
//     {
//         $response = $this->get("/recode/delete/{$id}");
//         $response->assertStatus(405);
//     }

//     /**
//      * @return array
//      */
//     public function provParams()
//     {
//         return [
//             [1],
//         ];
//     }
// }