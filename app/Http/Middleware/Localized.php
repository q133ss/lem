<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App;
use View;
use Carbon\Carbon;
class Localized
{
    public function handle(Request $request, Closure $next)
    {
        $lang = $request->segment(1);
        $langs = config('translatable.langs');
        if(!in_array($lang, array_keys($langs))){
            $lang = session()->get('lang', config('translatable.fallback_locale'));
            $segments = implode('/', $request->segments());
            $path = '/' . $lang . '/' . $segments;
            return redirect($path);
        }else{
            session(['lang' => $lang]);
        }
        App::setlocale($lang);
        Carbon::setLocale($lang);
        View::share('lang', $lang);
        View::share('langs', $langs);
        return $next($request);
    }
}
