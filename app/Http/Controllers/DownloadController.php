<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function downloadPDF($filename)
    {
        $file = storage_path('app/public/pdf/' . $filename);
        
        // Check if the file exists
        if (!Storage::exists('public/pdf/' . $filename)) {
            abort(404);
        }
        
        return response()->download($file, $filename);
    }
}