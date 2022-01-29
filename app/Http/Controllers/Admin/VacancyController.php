<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vacancy;
use Storage;
class VacancyController extends Controller
{
    public function index(Request $request){
        $this->authorize('view-vacancy');
        $vacancies = Vacancy::latest()->paginate(50);
        return view('admin.vacancies.index', compact('vacancies'));
    }
    public function create(){
        $this->authorize('view-vacancy');
        return view('admin.vacancies.create');
    }
    public function store(Request $request){
        $this->authorize('view-vacancy');
        $default = config('translatable.fallback_locale');
        $request->validate([
            "name.$default" => 'required',
            "name.*"    => 'nullable|string|max:255',
            'photo' => 'nullable|image'
        ]);
        $names = $request->name;
        $details = $request->detail_text;
        $data['active'] = $request->has('active');
        if($request->hasfile('photo')){
            $data['photo'] = $request->file('photo')->store('vacancies');
        }
        $vacancy = Vacancy::create($data);
        foreach(config('translatable.langs') as $key => $lang){
            $vacancy->setTranslation('name', $key, trim($names[$key]));
            $vacancy->setTranslation('detail_text', $key, trim($details[$key]));
        }
        $vacancy->save();
        session()->flash('success', 'Запись успешно создана');
        return redirect()->route('admin.vacancies.index');
    }
    public function show(Request $request, $slug){
        $vacancy = Vacancy::where('slug', $slug)->firstOrFail();
        return view('vacancy', compact('vacancy'));
    }
    public function edit(Vacancy $vacancy){
        $this->authorize('view-vacancy');
        return view('admin.vacancies.edit', compact('vacancy'));
    }
    public function update(Request $request, Vacancy $vacancy){
        $this->authorize('view-vacancy');
        $default = config('translatable.fallback_locale');
        $request->validate([
            "name.$default" => 'required',
            "name.*"    => 'nullable|string|max:255',
            'photo' => 'nullable|image',
        ]);
        $names = $request->name;
        $details = $request->detail_text;
        $data['active'] = $request->has('active');
        if(($request->has('del_photo') && $vacancy->photo) || $request->hasFile('photo')){
            Storage::delete($vacancy->photo);
            $data['photo'] = NULL;
        }
        if($request->hasFile('photo')){
            $data['photo'] = $request->file('photo')->store('vacancies');
        }
        $vacancy->update($data);
        foreach(config('translatable.langs') as $key => $lang){
            $vacancy->setTranslation('name', $key, trim($names[$key]));
            $vacancy->setTranslation('detail_text', $key, trim($details[$key]));
        }
        $vacancy->save();
        session()->flash('success', 'Запись успешно изменена');
        return back();
    }
    public function destroy(Vacancy $vacancy){
        $this->authorize('view-vacancy');
        if($vacancy->photo) Storage::delete($vacancy->photo);
        $vacancy->delete();
        session()->flash('success', 'Запись успешно удалена');
        return redirect()->route('admin.vacancies.index');
    }
}
