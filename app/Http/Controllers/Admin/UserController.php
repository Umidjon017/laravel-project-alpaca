<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateUserFormRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();

        return view('admin.users.index', compact('user'));
    }

    public function edit(User $user): View
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserFormRequest $request, User $user)
    {
        $user->update($request->all());

        return redirect()->route('admin.users.index')->with('success', 'User information edited successfully!');
    }
}
