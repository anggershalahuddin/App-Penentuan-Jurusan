<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadTemplateController extends Controller
{
    public function downloadTemplate()
    {
        $filePath = public_path('files/template.xlsx');
        return response()->download($filePath);
    }
}