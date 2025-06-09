<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Middleware\SuperAdminMiddleware;

class DataUserController extends Controller
{


    public function index()
    {
        if (request()->ajax()) {
            $query = User::query();

            return DataTables::of($query)
                ->addColumn('action', function ($user) {
                    return '
            <a class="block w-full px-2 py-1 mb-1 text-xs text-center text-white transition duration-500 bg-blue-500 border border-blue-500 rounded-md select-none ease hover:bg-blue-600 focus:outline-none focus:shadow-outline"
                href="' . route('admin.datauser.edit', $user->id) . '">
                Edit
            </a>';
                })
                ->editColumn('roles', function ($user) {
                    return '<span class="px-2 py-1 text-xs font-semibold leading-tight text-' .
                        ($user->roles === User::ROLE_SUPER_ADMIN ? 'red' : ($user->roles === User::ROLE_ADMIN ? 'blue' : 'gray')) .
                        '-700 bg-' .
                        ($user->roles === User::ROLE_SUPER_ADMIN ? 'red' : ($user->roles === User::ROLE_ADMIN ? 'blue' : 'gray')) .
                        '-100 rounded-full">' .
                        $user->roles . '</span>';
                })
                ->editColumn('status_user', function ($user) {
                    return '<span class="px-2 py-1 text-xs font-semibold leading-tight text-' .
                        ($user->status_user === 'aktif' ? 'green' : 'red') .  // Changed to lowercase
                        '-700 bg-' .
                        ($user->status_user === 'aktif' ? 'green' : 'red') .  // Changed to lowercase
                        '-100 rounded-full">' .
                        strtoupper($user->status_user) . '</span>';  // Display as uppercase but compare with lowercase
                })
                ->rawColumns(['action', 'roles', 'status_user'])
                ->make();
        }

        return view('admin.datauser.index');
    }

    public function edit(User $user)
    {
        // Prevent editing of SUPER_ADMIN by other SUPER_ADMIN
        if ($user->isSuperAdmin() && auth()->user()->id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        return view('admin.datauser.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Prevent editing of SUPER_ADMIN by other SUPER_ADMIN
        if ($user->isSuperAdmin() && auth()->user()->id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'roles' => 'required|in:USER,ADMIN,SUPER_ADMIN',
            'status_user' => 'required|in:aktif,non-aktif'  // Changed to lowercase
        ]);

        // Prevent downgrading own SUPER_ADMIN role
        if ($user->id === auth()->user()->id && $request->roles !== User::ROLE_SUPER_ADMIN) {
            return redirect()->back()->withErrors(['roles' => 'You cannot remove your own SUPER_ADMIN role.']);
        }

        $user->update($validated);

        return redirect()->route('admin.datauser.index')->with('success', 'User updated successfully!');
    }
}
