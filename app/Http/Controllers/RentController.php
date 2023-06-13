<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\History;
use App\Models\Rents;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RentController extends Controller
{
    public function index() {
        $rents = Rents::all();
        $user = User::all();
        $car = Cars::all();
        return view('panel.rents.rents',compact('rents','user','car'));
    }

    public function create() {
        $user = User::all();
        $cars = Cars::all();
        return view('panel.rents.create',compact('user','cars'));
    }

    public function store(Request $request){
        // $validator = Validator::make($request->all,[
        //     'users_id' => 'required',
        //     'cars_id' => 'required',
        //     'accessor1' => 'required',
        //     'accessor2' => 'required',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        Rents::create([
            'users_id' => $request->users_id,
            'cars_id' => $request->cars_id,
            'accessor1' => $request->accessor1,
            'accessor2' => $request->accessor2,
        ]);

        $cars_id = Cars::where('id',$request->cars_id);
        $cars_id->update([
            'status' => 'rent',
        ]);

        return redirect()->route('rent.index');
    }

    public function edit($id){
        $data = Rents::find($id);
        $user = User::all();
        $car = Cars::all();
        return view('panel.rents.edit',compact('data','user','car'));
    }

    public function update(Request $request,$id){
        $data = Rents::find($id);
        if ($request->in) {
            Cars::find($request->cars_id)->update([
                'status' => 'ready',
            ]);

            History::create([
                'users_id' => $request->users_id,
                'cars_id' => $request->cars_id,
                'accessor1' => $request->accessor1,
                'accessor2' => $request->accessor2,
                'out' => $request->out,
                'in' => $request->in,
            ]);

            $data->update([
                'users_id' => $request->users_id,
                'cars_id' => $request->cars_id,
                'accessor1' => $request->accessor1,
                'accessor2' => $request->accessor2,
                'status1' => $request->status1,
                'status2' => $request->status2,
                'out' => $request->out,
                'in' => $request->in,
            ]);
        }
        else{
            $data->update([
                'users_id' => $request->users_id,
                'cars_id' => $request->cars_id,
                'accessor1' => $request->accessor1,
                'accessor2' => $request->accessor2,
                'status1' => $request->status1,
                'status2' => $request->status2,
                'out' => $request->out,
            ]);
        }

        return redirect()->route('rent.index');
    }

    public function destroy($id){
        $data = Rents::find($id);
        Cars::find($data->cars_id)->update([
            'status' => 'ready',
        ]);

        $data->delete();

        return redirect()->route('rent.index');
    }
}
