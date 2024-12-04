<?php

namespace App\Http\Controllers\Api;

use App\Events\UserCreatedEvent;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'birthday' => 'nullable|date',
            'start_date' => 'nullable|date',
            'position' => 'nullable',
            'salary' => 'nullable|integer',
            'password' => 'required|min:8',
        ]);

        $user = User::query()->create($data);

        UserCreatedEvent::dispatch($user);

        return $user;
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
