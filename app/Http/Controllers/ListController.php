<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Lists;
use Carbon\Carbon;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = Lists::orderBy('order', 'desc')->get();
        return response()->json(['success' => true, 'message'=> "List users listed successfully.", 'lists' => $lists]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:250',
            'birth_date' => 'required',
            'address' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'message'=>$validator->errors()]);
        }
        // Use name as unique due to name display in listng...
        if (Lists::where('name',$request->name)->count() > 0) {
            return response()->json(['success' => false, 'message'=>'List user is already registred.']);
         }
        $birth_date = date('Y-m-d', strtotime($request->birth_date));
        $age = Carbon::parse($birth_date)->age;
        $ListPlus = Lists::orderBy('order', 'desc')->first();
        $order = ($ListPlus) ? $ListPlus->order+1 : 1;
        $list = Lists::create([
            'name' => $request->name,
            'birth_date' => $birth_date,
            'age' => $age,
            'order'=> $order,
            'address' => $request->address
        ]);
        return response()->json(['success' => true, 'message'=> "List user created successfully.", 'list' => $list]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = "Oops something broken! Please try again.";
        $success = false;
        $list = Lists::find($id);
        if($list){
            $success = true;
            $message = "list user details.";
        }

        return response()->json(['success'=> $success,'message' => $message, 'list' => $list]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $message = "Oops something broken! Please try again.";
        $success = false;
        $list = ($request->points != null) ? Lists::find($id) : [];
        /* equals to 1 define parameter point = 1(addition) from api url request to identify addition action OR point = 2(subtraction) in points in update...*/
        if($list){
            if($request->points == 1){
                $list->points++;
            }
            if($list->points > 0 && $request->points == 2){
                $list->points--;
            }
            $list->save();
            $Lists = GenerateOrder(); // Call function for update order...
            $message = "List user points updated successfully.";
            $success = true;
        }
        return response()->json(['success'=> $success,'message' => $message, 'Lists' => $list]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = "Oops something broken! Please try again.";
        $success = false;
        $list = Lists::find($id);
        if($list){
            $list->deleted_at = now();
            $list->save();
            GenerateOrder(); // Call function for update order...
            $success = true;
            $message = "List user deleted successfully.";
        }

        return response()->json(['success'=> $success,'message' => $message]);
    }
}
