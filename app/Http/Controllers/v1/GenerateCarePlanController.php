<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\ReportResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use PDF;

class GenerateCarePlanController extends Controller
{

    public function generatePDF()
    {
        $patient = auth()->user()->patient;

        $allergens = $patient->allergens->pluck('name')->toArray();
        $severities = $patient->allergenPatients->pluck('severity')->toArray();

        $data = [
            'title' => 'Hello, PDF!',
            'name' => 'Name ' . $patient->user->name,
            'allergens' => $allergens,
            'severities' => $severities,
        ];

        $pdf = PDF::loadView('pdf.document', $data);

        $disk = 'public'; // Use the 'public' disk
        $directory = 'pdfs';
        $pdfPath = $directory . '/document.pdf';
        Storage::disk($disk)->put($pdfPath, $pdf->output());

        // Generate the URL for the saved PDF
        $pdfUrl = Storage::disk($disk)->url($pdfPath);

        return $this->return_api(true, Response::HTTP_OK, null, new ReportResource($pdfUrl), null, null);
    }
}
