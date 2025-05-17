<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CKEditorUploadController extends Controller
{
    public function upload(Request $request)
    {
        try {
            \Log::info('Upload Request:', $request->all());
            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $filename = time().'_'.$file->getClientOriginalName();
                $destination = storage_path('app/public/uploads');
                // پوشه را اگر نبود بساز
                if (!is_dir($destination)) {
                    mkdir($destination, 0777, true);
                }
                $file->move($destination, $filename);
                \Log::info('File moved to:', [$destination . '/' . $filename]);
                $url = asset('storage/uploads/'.$filename);
                return response()->json(['url' => $url]);
            }
            \Log::error('No file uploaded');
            return response()->json(['error' => 'No file uploaded.'], 400);
        } catch (\Exception $e) {
            \Log::error('Upload Error: '.$e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
