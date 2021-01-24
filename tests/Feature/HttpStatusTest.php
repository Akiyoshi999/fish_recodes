<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabaseState;
use App\Models\Recode;
use Tests\TestCase;


// class RecodeHttpStatusTest extends TestCase
// {
//     use RefreshDatabase;

//     public function setUp(): void
//     {
//         parent::setUp();
//         Recode::factory()->count(12)->create();
//     }
//     /**
//      * @dataProvider providerParams
//      */
//     public function testRecode01($id)
//     {
//         $response = $this->get("/recode/{$id}");
//         $response->assertStatus(200);
//     }

//     /**
//      * 正常なID
//      * @return array
//      */
//     public function providerParams()
//     {
//         return [
//             [1],
//             [2],
//         ];
//     }
//     /**
//      * @dataProvider providerErrorParams
//      */
//     public function testRecode02($id)
//     {
//         $response = $this->get("/recode/{$id}");
//         $response->assertStatus(302);
//         $response->assertRedirect("/");
//     }

//     /**
//      * 不正なID
//      * @return array
//      */
//     public function providerErrorParams()
//     {
//         return [
//             [99],
//             ["aaa"],
//         ];
//     }
// }

// class RecodesHttpStatusTest extends TestCase
// {
//     /**
//      * 正常系
//      *
//      * @return void
//      */
//     public function testRecodes01()
//     {
//         $response = $this->get('/');
//         $response->assertStatus(200);
//     }

//     /**
//      * 異常系　メソッドが不正
//      *
//      * @return void
//      */
//     public function testRecodes02()
//     {
//         $response = $this->post('/');
//         $response->assertStatus(405);
//     }
// }

// class StoreHttpStatusTest extends TestCase
// {
//     /**
//      * 正常系　
//      * @dataProvider provParams
//      * @return void
//      */
//     public function testStore01($input)
//     {
//         $response = $this->post('/recode/store', [
//             'user' => $input['user'],
//             'date' => $input['date'],
//             'place' => $input['place'],
//             'weather' => $input['weather'],
//             'tide' => $input['tide'],
//             'temperature' => $input['temperature'],
//             'fish' => $input['fish'],
//             'length' => $input['length'],
//             'comment' => $input['comment'],
//         ]);
//         $response->assertStatus(302);
//         $response->assertRedirect("/");
//     }
//     public function provParams()
//     {
//         return [
//             [
//                 array(
//                     "user" => "テスト太郎",
//                     "date" => "2020-12-20",
//                     "place" => "北海道",
//                     "weather" => "晴れ",
//                     "tide" => "大潮",
//                     "temperature" => "15",
//                     "fish" => "シーバス",
//                     "length" => "41",
//                     "comment" => "テスト内容",
//                 )
//             ],
//         ];
//     }

//     /**
//      * 異常系 メソッドが不正
//      * @return 
//      */
//     public function testStore02()
//     {
//         $response = $this->get("/recode/store");
//         $response->assertRedirect("/");
//     }
// }



// class EditHttpStatusTest extends TestCase
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
//     public function testEdit01($id)
//     {
//         $response = $this->get("/recode/edit/{$id}");
//         $response->assertStatus(200);
//     }

//     /**
//      * 異常系 メソッドが不正
//      * @dataProvider provParams
//      * @return 
//      */
//     public function testEdit02($id)
//     {
//         $response = $this->post("/recode/edit/{$id}");
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


// class UpdateHttpStatusTest extends TestCase
// {
//     /**
//      * 正常系　
//      * @dataProvider provParams
//      * @return void
//      */
//     public function testUpdate01($input)
//     {
//         $response = $this->post('/recode/store', [
//             'id' => $input['id'],
//             'user' => $input['user'],
//             'date' => $input['date'],
//             'place' => $input['place'],
//             'weather' => $input['weather'],
//             'tide' => $input['tide'],
//             'temperature' => $input['temperature'],
//             'fish' => $input['fish'],
//             'length' => $input['length'],
//             'comment' => $input['comment'],
//         ]);
//         $response->assertStatus(302);
//         $response->assertRedirect("/");
//     }
//     public function provParams()
//     {
//         return [
//             [
//                 array(
//                     "id" => 1,
//                     "user" => "太郎",
//                     "date" => "2020-12-20",
//                     "place" => "北海道",
//                     "weather" => "晴れ",
//                     "tide" => "大潮",
//                     "temperature" => "15",
//                     "fish" => "シーバス",
//                     "length" => "41",
//                     "comment" => "テスト内容",
//                 )
//             ],
//         ];
//     }

//     /**
//      * 異常系 メソッドが不正
//      * @return 
//      */
//     public function testUpdate02()
//     {
//         $response = $this->get("/recode/store");
//         $response->assertRedirect("/");
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