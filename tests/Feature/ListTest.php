<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Lists;
use Tests\TestCase;

class ListTest extends TestCase
{
    /**
     * A basic feature List example.
     * first of checking whole list...
     * @return void
     */
    public function test_lists()
    {
        $response = $this->get(route('lists.index'));
        $response->assertStatus(200);
    }
    /**
     * A basic feature List store example.
     * test for add into database
     * @return void
     */
    public function test_list_store()
    {
        if (Lists::where('name', 'Abs Test')->count() > 0) {
            $response->assertStatus(208);
        }
        $ListPlus = Lists::orderBy('order', 'desc')->first();
        $order = ($ListPlus) ? $ListPlus->order+1 : 1;
        $response = $this->post(route('lists.store'),[
            'name' => 'Abs Test',
            'birth_date' => '1995-05-06',
            'age' => 28,
            'order'=> $order,
            'address' => 'alberta, canada'
        ]);
        $response->assertStatus(200);
    }
     /**
     * A basic feature List show example.
     * test for show of each list user from database
     * @return void
     */
    public function test_list_each_user()
    {
        $response = $this->get(route('lists.show', 1));
        $response->assertStatus(200);
    }
     /**
     * A basic feature List update points example.
     * test for show of each list user from database
     * @return void
     */
    public function test_list_points_add_sub_update()
    {
        $list = Lists::first();
        $point = 1; // could be change in 2 as per need of adding or subtracting...
        if($point == 1){
            $pointsRes = $this->put(route('lists.update', $list->id, ['points' => 1]),[
                'points' => $list->points+1
            ]);
        }
        if($list->points > 0 && $point == 2){
            $pointsRes = $this->put(route('lists.update', $list->id, ['points' => 2]),[
                'points' => $list->points-1
            ]);
        }
        $lists = Lists::orderBy('points', 'desc')->orderBy('created_at', 'desc')->get();
        foreach($lists as $k => $list){
            $list->order = $k+1;
            $list->save();
        }
        $response = $this->get(route('lists.index'));
        $response->assertStatus(200);
    }
     /**
     * A basic feature List delete example.
     * test for delete of each list user from database
     * @return void
     */
    public function test_delete_list(){
        $ListPlus = Lists::orderBy('order', 'desc')->first();
        $order = ($ListPlus) ? $ListPlus->order+1 : 1;
        $listsCreate = $this->post(route('lists.store'),[
            'name' => 'Abs Test',
            'birth_date' => '1995-05-06',
            'age' => 28,
            'order' => $order,
            'address' => 'alberta, canada'
        ]);
        $list = Lists::first();
        $response = $this->delete(route('lists.destroy', $list->id));
        $this->assertEquals(0, Lists::count());
    }
}
