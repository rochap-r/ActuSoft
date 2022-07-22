<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminRolesController extends Controller
{
    private $rules=['name'=>'required | unique:roles,name'];

    public function index()
    {
        return view('admin_dashboard.roles.index',[
            'roles'=>Role::paginate(20),
        ]);
    }


    public function create()
    {
        return view('admin_dashboard.roles.create',[
            'permissions'=>Permission::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated=$request->validate($this->rules);
        //recuperation de permissions
        $permissions=$request->permissions;

        //creation du role et attachement des permissions
        $role=Role::create($validated);
        $role->permissions()->sync($permissions);
        return redirect()->route('admin.roles.index')->with('success','Le role a été créé avec succès!');
    }


    public function edit(Role $role)
    {
        return view('admin_dashboard.roles.edit',[
            'role'=>$role,
            'permissions'=>Permission::all()
        ]);
    }

    public function update(Request $request, Role $role)
    {
        // on ignore le role comme il est unique
        $this->rules['name']=['required',Rule::unique('roles')->ignore($role)];
        $validated=$request->validate($this->rules);
        //recuperation de data
        $permissions=$request->permissions;

        //creation du role et attachment des permissions
        $role->update($validated);
        $role->permissions()->sync($permissions);
        return redirect()->route('admin.roles.edit',$role)->with('success','Le role a été mis à jour avec succès!');
    }


    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')->with('success','Le role a été supprimé avec succès!');
    }
}
