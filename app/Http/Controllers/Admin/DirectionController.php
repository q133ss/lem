<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Direction;
use Illuminate\Support\Str;
use App\Models\File;
use Storage;
use App\Models\DirectionsBlock;

class DirectionController extends Controller
{
    public function index(Request $request){
        $this->authorize('view-direction');
        $directions = Direction::latest()->paginate(50);
        return view('admin.directions.index', compact('directions'));
    }
    public function create(){
        $this->authorize('view-direction');
        return view('admin.directions.create');
    }
    public function store(Request $request){
        $this->authorize('view-direction');
        $default = config('translatable.fallback_locale');
        $request->validate([
            "name.$default" => 'required',
            "name.*"    => 'nullable|string|max:70',
            'photo' => 'nullable|image'
        ]);
        $names = $request->name;
        $previews = $request->preview_text;
        $details = $request->detail_text;
        $data['slug'] = Str::slug($names[$default], '-');
        $data['active'] = $request->has('active');
        if($request->hasfile('photo')){
            $data['photo'] = '/storage/'.$request->file('photo')->store('directions', 'public');
        }
        $direction = Direction::create($data);

        foreach(config('translatable.langs') as $key => $lang){
            $direction->setTranslation('name', $key, trim($names[$key]));
            $direction->setTranslation('preview_text', $key, trim($previews[$key]));
            $direction->setTranslation('detail_text', $key, trim($details[$key]));
        }

        if($request->hasfile('photo_page')){
            $direction->photo_page = '/storage/'.$request->file('photo_page')->store('directions', 'public');
        }

        $direction->save();

        // Blocks
        $DirectionsBlock = new DirectionsBlock();
        $DirectionsBlock->direction_id = $direction->id;

        $DirectionsBlock->block1 = $request->block1;
        $DirectionsBlock->block2 = $request->block2;
        $DirectionsBlock->block3 = $request->block3;
        $DirectionsBlock->block4 = $request->block4;

        if($request->block4_img != NULL){
            $DirectionsBlock->block4_img = '/storage/'.$request->file('block4_img')->store('directions', 'public');
        }
        $DirectionsBlock->save();

        session()->flash('success', 'Запись успешно создана');

        if($request->hasfile('icon')){
            $fix = Direction::find($direction->id);
            $fix->icon = '/storage/'.$request->file('icon')->store('directions', 'public');
            $fix->save();
        }

        return redirect()->route('admin.directions.index');
    }
    public function show(Request $request, $slug){
        $direction = Direction::where('slug', $slug)->firstOrFail();
        return view('direction', compact('direction'));
    }
    public function edit(Direction $direction){
        $this->authorize('view-direction');
        return view('admin.directions.edit', compact('direction'));
    }
    public function update(Request $request, Direction $direction){
        $this->authorize('view-direction');
        $default = config('translatable.fallback_locale');
        $request->validate([
            "name.$default" => 'required',
            "name.*"    => 'nullable|string|max:70',
            'photo' => 'nullable|image',
        ]);
        $names = $request->name;
        $previews = $request->preview_text;
        $details = $request->detail_text;
        $data['slug'] = Str::slug($names[$default], '-');
        $data['active'] = $request->has('active');
        if(($request->has('del_photo') && $direction->photo) || $request->hasFile('photo')){
            Storage::delete($direction->photo);
            $data['photo'] = NULL;
        }
        if($request->hasFile('photo')){
            $data['photo'] = '/storage/'.$request->file('photo')->store('directions', 'public');
        }
        $direction->update($data);
        foreach(config('translatable.langs') as $key => $lang){
            $direction->setTranslation('name', $key, trim($names[$key]));
            $direction->setTranslation('preview_text', $key, trim($previews[$key]));
            $direction->setTranslation('detail_text', $key, trim($details[$key]));
        }

        if($request->hasfile('photo_page')){
            $direction->photo_page = '/storage/'.$request->file('photo_page')->store('directions', 'public');
        }

        $direction->save();

        // Blocks
        $DirectionsBlock = DirectionsBlock::find($direction->id);

        $DirectionsBlock->block1 = $request->block1;
        $DirectionsBlock->block2 = $request->block2;
        $DirectionsBlock->block3 = $request->block3;
        $DirectionsBlock->block4 = $request->block4;

        if($request->block4_img != NULL){
            $DirectionsBlock->block4_img = '/storage/'.$request->file('block4_img')->store('directions', 'public');
        }

        $DirectionsBlock->save();

        session()->flash('success', 'Запись успешно изменена');
        return back();
    }
    public function destroy(Direction $direction){
        $this->authorize('view-direction');
        if($direction->photo) Storage::delete($direction->photo);
        $direction->delete();
        session()->flash('success', 'Запись успешно удалена');
        return redirect()->route('admin.directions.index');
    }
}
