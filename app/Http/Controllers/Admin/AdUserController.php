<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdUserController extends Controller
{
    public function index(Request $request) 
    {
        $search = $request->search ? $request->search : '';

        $users = User::orderBy('id', 'ASC')
                    ->when($search != '', function ($q) use ($search) {
                        return $q->where('name', 'LIKE', '%'.$search.'%');
                    })
                    ->paginate(20);

        $users = $users->appends([
            'search'   => $request->input('search', ''),
        ]);

        return view('admin.users.index')
                ->with('users', $users)
                ->with('search', $search);
    }

    public function edit(Request $request)
    {
        $users = User::where('id', $request->id)->first();

        return view('admin.users.edit')->with('users', $users);

    }

    public function update(Request $request, $id)
    {
        $user_data    = User::where('id', $id)->first();
        $user_name    = $request->name ?? $user_data->name;
        $roles        = $request->roles ?? $user_data->roles;

        $user = User::where('id', $id)
                    ->update([
                        'name'  => $user_name,
                        'roles' => $roles
                    ]);

        if ($user !== 1) {
            return response()->json(['message' => 'fail to update'], 400);
        }

        return redirect()->intended('admin/users')
            ->withSuccess('You have Successfully updated users');

    }

    public function delete(Request $request)
    {
        $user = User::where('id', $request->id)->delete();
        return redirect()->intended('admin/users')->withSuccess('You have Successfully deleted User' .$request->id );
    }
}
