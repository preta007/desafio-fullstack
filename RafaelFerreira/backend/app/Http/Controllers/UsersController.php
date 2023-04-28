<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function create(Request $request)
    {

        $request->validate([
                'name'      => ['required', 'string'],
                'email'     => ['required', 'email', 'unique:users,email'],
                'password'  => ['required', 'string'],
                'zip_code'  => ['required', 'integer'],
                'address'   => ['required', 'string'],
                'district'  => ['required', 'string'],
                'city'      => ['required', 'string'],
                'state'     => ['required', 'string', 'max:2'],
        ]);



        $model = new User();

        $model->name        = $request['name'];
        $model->email       = $request['email'];
        $model->password    = Hash::make($request['password']);
        $model->zip_code    = $request['zip_code'];
        $model->address     = $request['address'];
        $model->district    = $request['district'];
        $model->city        = $request['city'];
        $model->state       = $request['state'];

        $model->save();

        return response()->json(['success' => true, 'message' => 'Successfully added!'], 200);

    }

    public function update(Request $request, $id)
    {

        $model = User::find($id);

        if(!$model){
            return response()->json(['success' => false, 'error' => 'user not found'], 404);
        }

        //\Illuminate\Validation\Rule::unique(User::class)->ignore($id)
        $request->validate([
                'name'      => ['required', 'string'],
                'email'     => ['required', 'email', 'unique:users,email,' . $id],
                //'password'  => ['required', 'string'],
                'zip_code'  => ['required', 'integer'],
                'address'   => ['required', 'string'],
                'district'  => ['required', 'string'],
                'city'      => ['required', 'string'],
                'state'     => ['required', 'string', 'max:2'],
        ]);

        $model->name        = $request['name'];
        $model->email       = $request['email'];

        if(isset($request['password'])){
            $model->password = Hash::make($request['password']);
        }

        $model->zip_code    = $request['zip_code'];
        $model->address     = $request['address'];
        $model->district    = $request['district'];
        $model->city        = $request['city'];
        $model->state       = $request['state'];

        $model->save();

        return response()->json(['success' => true, 'message' => 'Successfully updated!'], 200);
    }

    public function delete($id)
    {
        $model = User::find($id);

        if(!$model){
            return response()->json(['success' => false, 'error' => 'user not found'], 404);
        }

        $model->delete();
        return response()->json(['success' => true, 'message' => 'Successfully deleted!'], 200);

    }

    public function getAll()
    {
        $models = User::all();
        return response()->json(['success' => true, 'users' => $models]);
    }

    public function getById($id)
    {
        $model = User::find($id);

        if(!$model){
            return response()->json(['success' => false, 'error' => 'user not found'], 404);
        }

        $model->contacts;
        return response()->json(['success' => true, 'user' => $model], 200);
    }
}
