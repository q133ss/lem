<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
class RoleController extends Controller
{
    public function index(){
        $this->authorize('view-role');
        $roles = Role::paginate(50);
        return view('admin.roles.index', compact('roles'));
    }
    public function create(){
        $this->authorize('create-role');
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }
    public function edit(Role $role){
        $this->authorize('view-role');
        if($role->id == 1) abort(403);
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }
    public function store(Request $request){
        $this->authorize('create-role');
        $request->validate([
            'name' => 'required|string|max:255'
        ]);
        $permissions = $request->permissions ? array_keys($request->permissions) : [];
        $role = Role::create($request->only('name'));
        $role->permissions()->sync($permissions);
        session()->flash('success', 'Новая роль успешно добавлена');
        return redirect()->route('admin.roles.index');
    }
    public function update(Request $request, Role $role){
        $this->authorize('view-role');
        if($role->id == 1) abort(403);
        $request->validate([
            'name' => 'required|string|max:255'
        ]);
        $permissions = $request->permissions ? array_keys($request->permissions) : [];
        $role->update($request->only('name'));
        $role->permissions()->sync($permissions);
        session()->flash('success', 'Роль успешно изменена');
        return back();
    }
    public function destroy(Role $role){
        $this->authorize('view-role');
        if($role->id == 1) abort(403);
        $role->delete();
        session()->flash('success', 'Роль успешно удалена');
        return redirect()->route('admin.roles.index');
    }
}
