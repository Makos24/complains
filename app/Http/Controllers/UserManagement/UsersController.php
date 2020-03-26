<?php

namespace App\Http\Controllers\UserManagement;

use App\Entities\Department;
use App\Entities\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Mekaeil\LaravelUserManagement\Http\Controllers\Admin\UsersController as UserManager;

class UsersController extends UserManager
{
    /*
    |--------------------------------------------------------------------------
    |   USERS CONTROLLER FOR OVERWRITE IF YOU WANT
    |--------------------------------------------------------------------------
    |   All of the functions we have commented below, if you want to overwrite
    |   any of them you can uncomment it and write your code. It's important
    |   to know the repositories in below are available for work with it. 
    */

    public function index()
    {
        // $users          = $this->userRepository->all();
        $users = User::withTrashed()->get();
    // dd($users);
    $roles = Role::all();
        $departments = Department::all();

        return view('user-management.user.index', compact('users', 'roles', 'departments'));
    }

    public function create()
    {
        $roles       = Role::all();
        $departments = Department::all();

        return view('user-management.user.create', compact('roles', 'departments'));
    }

    // public function edit($ID)
    // {
    //     if ($user = $this->userRepository->find($ID)) {
    //         $roles              = $this->roleRepository->all();
    //         $departments        = $this->departmentRepository->all();
    //         $userHasRoles       = $user->roles ? array_column(json_decode($user->roles, true), 'id') : [];
    //         $userHasDepartments = $user->departments ? array_column(json_decode($user->departments, true), 'id') : [];

    //         return view('user-management.user.edit', compact('roles', 'departments', 'user', 'userHasRoles', 'userHasDepartments'));
    //     }

    //     return redirect()->back()->with('message', [
    //         'type'  => 'danger',
    //         'text'  => 'This user does not exist!',
    //     ]);
    // }

    // public function store(StoreUser $request)
    // {
    //     $user = $this->userRepository->store([
    //         'name'    => $request->name,
    //         'email'         => $request->email,
    //         'username'        => $request->username,
    //         'status'        => $request->status ?? 'pending',
    //         'password'      => bcrypt($request->password)
    //     ]);

    //     $roles       = $request->roles       ?? [];
    //     $departments = $request->departments ?? [];

    //     $this->roleRepository->setRoleToMember($user, $roles);
    //     $this->departmentRepository->attachDepartment($user, $departments);

    //     return redirect()->route('admin.user_management.user.index')->with('message', [
    //         'type'   => 'success',
    //         'text'   => 'َUser created successfully!'
    //     ]);
    // }

    // public function update(int $ID, UpdateUser $request)
    // {

    //     if ($user = $this->userRepository->find($ID)) {
    //         $this->userRepository->update($ID, [
    //             'name'    => $request->first_name,
    //             'email'         => $request->email,
    //             'status'        => $request->status,
    //             'username'        => $request->username,
    //         ]);

    //         $roles       = $request->roles       ?? [];

    //         $departments = $request->departments ?? [];
    //         if (count($departments) == 1 && $departments[0] == null) {
    //             $departments = [];
    //         }
    //         //// IF WE WANT TO CHANGE PASSWORD
    //         ////////////////////////////////////////////////////////////
    //         if ($request->password) {
    //             $this->userRepository->update($ID, [
    //                 'password'       => bcrypt($request->password)
    //             ]);
    //         }
    //         ////////////////////////////////////////////////////////////

    //         $this->roleRepository->syncRoleToUser($user, $roles);
    //         $this->departmentRepository->syncDepartments($user, $departments);

    //         return redirect()->route('admin.user_management.user.index')->with('message', [
    //             'type'   => 'success',
    //             'text'   => 'َUser updated successfully!'
    //         ]);
    //     }

    //     return redirect()->back()->with('message', [
    //         'type'  => 'danger',
    //         'text'  => 'This user does not exist!',
    //     ]);
    // }

    public function delete($ID)
    {
        if ($user = $this->userRepository->find($ID)) {
            //// soft delete
            $this->userRepository->update($ID, [
                'status'    => 'deleted'
            ]);
            $user->delete();

            return redirect()->route('admin.user_management.user.index')->with('message', [
                'type'   => 'warning',
                'text'   => 'User Deleted successfully!'
            ]);
        }

        return redirect()->back()->with('message', [
            'type'  => 'danger',
            'text'  => 'This user does not exist!',
        ]);
    }

    public function restoreBackUser(int $ID)
    {

        if ($this->userRepository->restoreUser($ID)) {
            $user = $this->userRepository->update($ID, [
                'status'    => 'accepted',
            ]);

            return redirect()->route('admin.user_management.user.index')->with('message', [
                'type'   => 'success',
                'text'   => 'User restored successfully!'
            ]);
        }

        return redirect()->back()->with('message', [
            'type'  => 'danger',
            'text'  => 'This user does not exist!',
        ]);
    }
}
