<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum')->only(['index', 'show', 'update', 'destroy']);
    }

    public function index()
    {
        $user = User::paginate(15);
        return UserResource::collection($user);
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($request->input('password'));

        if (User::create($data)) {
            return new UserResource($data);
        };
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        return new UserResource($user);
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $user = User::findOrFail($id);

        if ($user->update($data)) {
            return new UserResource($data);
        }
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->delete()) {
            return new UserResource($user);
        }
    }
}
