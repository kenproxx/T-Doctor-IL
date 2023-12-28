<?php

namespace App\Http\Controllers;

use App\Models\BookingResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DownloadController extends Controller
{
    public function getDownload()
    {
        $file = public_path('files/demo_prescriptions.xlsx');

        $headers = [
            'Content-Type' => 'application/xlsx',
        ];

        return Response::download($file, 'demo_prescriptions.xlsx', $headers);
    }

    public function downloadFile($id)
    {
        $result = BookingResult::find($id);
        $path = $result->prescriptions;

        $file = public_path($path);

        $headers = [
            'Content-Type' => 'application/xlsx',
        ];

        return Response::download($file, 'update_prescriptions.xlsx', $headers);
    }
}
