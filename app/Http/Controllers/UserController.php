<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('image_count', 'desc')->paginate();
        return view('users.index', compact('users'));
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('message', 'User deleted successfully');
    }
}
