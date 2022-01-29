<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;
use Storage;
class FileController extends Controller
{
    public function destroy(File $file){
        Storage::delete($file->src);
        $file->delete();
        session()->flash('success', 'Файл успешно удален');
        return back();
    }
}
