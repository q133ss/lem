<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vacancy;
class VacancyController extends Controller
{
    public function index(){
        $vacancies = Vacancy::latest()->get();
        return view('vacancies.index', compact('vacancies'));
    }
}
