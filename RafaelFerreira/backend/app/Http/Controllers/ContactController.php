<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactType;
use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function create(Request $request)
    {
        $request->validate([
                'contact'           => ['required', 'string'],
                'contact_type_id'   => ['required', 'integer'],
                'users_id'          => ['required', 'integer']
        ]);

        $isContactType = ContactType::find($request['contact_type_id']);
        $isUser = User::find($request['users_id']);

        if(!$isContactType){
            return response()->json(['success' => false, 'message' => 'contact_type_id is not found'], 404);
        }

        if(!$isUser){
            return response()->json(['success' => false, 'message' => 'users_id is not found'], 404);
        }


        $model = new Contact();

        $model->contact         = $request['contact'];
        $model->contact_type_id = $request['contact_type_id'];
        $model->users_id        = $request['users_id'];

        $model->save();

        return response()->json(['success' => true, 'message' => 'Successfully added!'], 200);

    }

    public function update(Request $request, $id)
    {
        $model = Contact::find($id);

        if(!$model){
            return response()->json(['success' => false, 'error' => 'contect not found'], 404);
        }

        $request->validate([
                'contact'           => ['required', 'string'],
                'contact_type_id'   => ['required', 'integer'],
                'users_id'          => ['required', 'integer']
        ]);

        $model->contact         = $request['contact'];
        $model->contact_type_id = $request['contact_type_id'];
        $model->users_id        = $request['users_id'];

        $model->save();
        return response()->json(['success' => true, 'message' => 'Successfully updated!'], 200);

    }

    public function delete($id)
    {
        $model = Contact::find($id);

        if(!$model){
            return response()->json(['success' => false, 'error' => 'contact not found'], 404);
        }

        $model->delete();
        return response()->json(['success' => true, 'message' => 'Successfully deleted!'], 200);
    }

    public function getAll($user_id)
    {
        $models = Contact::where('users_id', '=', $user_id)->get();
        return response()->json(['success' => true, 'contacts' => $models]);
    }

    public function getById($id)
    {
        $model = Contact::find($id);

        if(!$model){
            return response()->json(['success' => false, 'error' => 'contact not found'], 404);
        }

        return response()->json(['success' => true, 'contact' => $model->contacts]);
    }
}
