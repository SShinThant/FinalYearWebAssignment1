<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cafe;
use Illuminate\Support\Facades\Validator;

class CafeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

        public function get_coffees() {
        $coffees = Cafe::get();
        return response()->json([
            'message'=>'Cafe_List',
            'status'=>'success',
            'coffees'=> $coffees
        ]);
    }
    
            public function update_coffees($id, Request $request) {
            $request->validate ([
                'name'=> 'required|string|max:255',
                'description' => 'required|string|max:255'
            ]);
            $coffees=Cafe::find($id);
            $coffees->name=$request->name;
            $coffees->description=$request->description;
            $coffees->save();

            return response()->json([
                'message'=>'Cafe updated',
                'data'=>$coffees
            ]);
        }

        public function create_coffees(Request $request) {
        $coffees = new Cafe();
        Cafe::create([
            'name'=> $request->name,
            'description'=> $request->description
        ]);

        return response()->json([
            'message'=>'Cafe',
            'status'=>'success',
            'coffee'=>$coffees
        ]);

        
        
        }

        public function delete_coffees($id) {
            $coffee = Cafe::find($id);
            $coffee->delete();

            return response()->json([
                'message'=> "Deleted"
            ]);
        }

    ////////////////////////////

        public function UpdateTheForm(Cafe $coffee, Request $request) {
        $incomingFields = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        

        $coffee->update($incomingFields);
        return redirect('/cafe');
    }

    public function showUpdateForm(Cafe $coffee) {
        return view('updateform', ['coffee' => $coffee]);
    }

    public function DeleteItem(Cafe $coffee) {
        $coffee->delete();

        return redirect('/cafe');
    }
    
    public function index()
    {
        //$coffees = Cafe::paginate(5);
        
        $coffees = Cafe::get();
        return view('cafe',[
            'premium_coffee'=>'JAVA',
            'coffees' => $coffees
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $incomingFields = $request->validate([
            'name' => 'required',
            'description' => 'required'
         ]);

        

        // $coffee->update($incomingFields);
        // return redirect('/cafe');


        // $validator = Validator::make($request->all(), [
        //     'name' => 'required',
        //     'description' => 'required',
        // ]);
        
        // if ($validator->fails()) {
        //     return redirect()->route('coffee.index')
        //         ->with('error', 'Validation failed')
        //         ->withErrors($validator)
        //         ->withInput();
        // }





        $newCoffee = new Cafe;
        $newCoffee->name = $request->name;
        $newCoffee->description = $request->description;
        $newCoffee->save();
        return redirect('/cafe')->with('status','Item Created Sucessfully');
        // return redirect()->route('coffee.index')
        //     ->with('success', 'Coffee Created');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $coffees = Cafe::find($id);
        // return view('cafe.edit')->with('coffees', $coffees);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $request->validate([
        //     'name'=> 'required|string|max:255',
        //     'description'=>'required'
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cafe::destroy($id);
        // return redirect('/cafe')->with('flash_message', 'Item Deleted!');
    }
}
