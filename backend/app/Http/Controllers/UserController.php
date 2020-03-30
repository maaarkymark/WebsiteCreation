<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request as Request;

class UserController extends Controller
{
    /**
     * Creates a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        // Passes all methods through the auth middleware except those listed
        $this->middleware('auth', ['except' => [
            'index',
            'find'
        ]]);
    }

    /**
     * List users
     *
     * The results can be filtered via request parameters
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request) {

        $users = User::query();
        $results = $users->get();
        return response()->json($results);
    }

    /**
     * Retrieves a user by id
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function find(Request $request, $id) {
        $user = User::find($id);
        return response()->json($user);
    }

    /**
     * Creates a user based on request values
     *
     * Certain properties are protected from mass assignment via the model's `$fillable` property
     *
     * @param Request $request
     * @return string JSON containing the user if the request succeeds or the errors by field if it fails
     */
    public function create(Request $request) {
        $user = User::create($request->all());

        // Validate
        if($user->isValid()) {
            return response()->json($user);
        } else {
            return response()->json($user->getErrors());
        }
    }

    /**
     * Updates a user based on request values
     *
     * Certain properties are protected from mass assignment via the model's `$fillable` property
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id) {
        $user = User::where('id', $id)
            ->update($request->all());
        return response()->json($user);
    }

}
