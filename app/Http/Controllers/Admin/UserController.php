<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Post;
use Storage;
class UserController extends Controller
{
    public function index(){
        $this->authorize('view-user', User::class);
        $users = User::latest()->paginate(50);
        return view('admin.users.index', compact('users'));
    }
    public function getData(){
        return User::select(['id', 'name'])->get();
    }
    public function getStats(Request $request){
        $year = $request->year;
        $status = $request->status;
        $posts = Post::whereYear('updated_at', $year)->whereNotNull($status)->select([$status, 'updated_at'])->get();
        $data = [];
        foreach($posts as $post){
            if(!isset($data[$post->{$status}])) $data[$post->{$status}] = [];
            if(!isset($data[$post->{$status}][$post->updated_at->format('n')]))  $data[$post->{$status}][$post->updated_at->format('n')] = 0;
            $data[$post->{$status}][$post->updated_at->format('n')] ++;
        }
        return $data;
    }
    public function create(){
        $this->authorize('create-user', User::class);
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }
    public function edit(User $user){
        $this->authorize('view-user', User::class);
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }
    public function store(Request $request){
        $this->authorize('create-user', User::class);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|max:255',
            'role_id' => 'required'
        ]);
        $data = $request->only(['name', 'email', 'role_id']);
        $data['password'] = bcrypt($request->password);
        $data['active'] = $request->has('active');
        if($request->hasFile('photo')){
            $data['photo'] = $request->file('photo')->store('photos');
        }
        $user = User::create($data);
        auth()->user()->log('Добавлен пользователь '. $user->name);
        session()->flash('success', 'Пользователь успешно добавлен');
        return redirect()->route('admin.users.index');
    }
    public function update(Request $request, User $user){
        $this->authorize('update-user', User::class);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|max:255|unique:users,id,' . $user->id,
            'password' => 'nullable|string|max:255',
            'role_id' => 'required'
        ]);
        $data = $request->only(['name', 'email', 'role_id']);
        if($request->password) $data['password'] = bcrypt($request->password);
        $data['active'] = $request->has('active');
        if($request->hasFile('photo')){
            if($user->photo) Storage::delete($user->photo);
            $data['photo'] = $request->file('photo')->store('photos');
        }
        $user->update($data);
        auth()->user()->log('Обновлен пользователь '. $user->name);
        session()->flash('success', 'Данные пользователя успешно изменены');
        return back();
    }
    public function destroy(User $user){
        if($user->id == 1){
            session()->flash('danger', 'Запрещено удалять администратора');    
            return back();
        }
        if($user->photo) Storage::delete($user->photo);
        $user->delete();
        auth()->user()->log('Удален пользователь '. $user->name);
        session()->flash('success', 'Пользователь успешно удален');
        return redirect()->route('admin.users.index');
    }
}
