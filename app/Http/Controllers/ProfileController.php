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

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        return view('dashboard.profile.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @return RedirectResponse
     * @throws \Exception
     */
    public function update($id)
    {
        request()->validate([
            'name' => 'max:32',
            'email' => 'email',
            'password' => 'confirmed|min:6',
            'avatar' => 'image'
        ]);

        $user = User::findOrFail($id);
        $user->update(request()->all());

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
        return redirect()->route('dashboard.profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        request()->session()->flash('alert-success', 'Account has been deleted.');
        return redirect()->route('index');
    }
}
