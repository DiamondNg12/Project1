<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use Flasher\Toastr\Laravel\Facade\Toastr;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //code here
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = $request->all();
        $view = view('role-permission.form-role')->render();
        return response()->json(['data' =>  $view, 'status'=> true]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $roles = Role::all();
            $role_id_by_name_array = [];
            $permission_id_by_name_array = [];
            foreach ($roles as $role) {
                $role_id_by_name_array[$role->name] = $role->id;
            }
            $permissions = Permission::all();
            foreach ($permissions as $permission) {
                $permission_id_by_name_array[$permission->name] = $permission->id;
            }
            
            foreach ($request->permission as $permission_name => $role_name_array) {
                foreach ($role_name_array as $role_name) {
                    $role_id = $role_id_by_name_array[$role_name];
                    $permission_id = $permission_id_by_name_array[$permission_name];
                    $role = Role::find($role_id);
                    $permission = Permission::find($permission_id);
                    if ($role && $permission) {
                        $role->givePermissionTo($permission);
                        Toastr::success("Role: $role_name has been given permission: $permission_name", 'Success');
                    } elseif (!$role) {
                        Toastr::error("Role: $role not found", 'Error');
                    } elseif (!$permission) {
                        Toastr::error("Permission: $permission not found", 'Error');
                    }
                }
            }
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::error($e->getMessage(), 'Error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //code here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //code here
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //code here
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       //code here
    }
}
