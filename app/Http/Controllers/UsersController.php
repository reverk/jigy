<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        return view('dashboard.users.index', [
            'users' => User::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        return view('dashboard.users.form', [
            'name' => 'Create user',
            'action' => 'Create user',
            'role' => Role::latest()->pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return RedirectResponse
     */
    public function store()
    {
        request()->validate([
            'name' => 'required|max:32',
            'email' => 'email',
            'password' => 'confirmed|min:6',
            'avatar' => 'image',
            'role' => 'required'
        ]);

        $user = new User([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
        ]);

        if (request('avatar') != null) {
            $user->avatar = 'storage/' . request('avatar')->store('avatar');
        } else {
            $user->avatar = 'static/images/user.png';
        }

        $user->assignRole(request('role'));

        $user->save();

        request()->session()->flash('alert-success', 'User added!');
        return redirect()->route('dashboard.users');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|Response|View
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('dashboard.users.form', [
            'name' => 'Edit user',
            'action' => 'Save changes',
            'user' => $user,
            'role' => Role::latest()->pluck('name', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function update($id)
    {
        request()->validate([
            'name' => 'required|max:32',
            'email' => 'required|email',
            'password' => 'nullable|confirmed|min:6',
            'avatar' => 'image',
            'role' => 'required'
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'name' => request('name'),
        ]);

        $user->syncRoles(request('role'));

        if (request('email') != null) {
            $user->email = request('email');
            $user->email_verified_at = null;
            $user->sendEmailVerificationNotification();
        }

        if (request('password') != null) {
            $user->password = Hash::make(request('password'));
        }

        if (request('avatar') != null) {
            $path = str_replace('storage/', '', $user->getRawOriginal('avatar'));
            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
            $user->avatar = 'storage/' . request('avatar')->store('avatar');
        }

        $user->save();

        request()->session()->flash('alert-success', 'Profile updated!');
        return redirect()->route('dashboard.users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        request()->session()->flash('alert-success', 'Account has been deleted.');
        return redirect()->route('dashboard.users');
    }
}
