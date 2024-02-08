<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NSProductAttribute; // Ensure this matches your actual model namespace and name
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Log;

class LabelController extends Controller
{
    public function showFilterForm()
    {
        // Method to show the filter form
        return view('labels.filter_form');
    }

    public function generatePDF(Request $request)
    {
        try {
        // Validate the request data
        $validatedData = $request->validate([
            'page_size' => 'required|in:A4,Letter',
            'labels_width' => 'required|numeric',
            'labels_height' => 'required|numeric',
            'orientation' => 'required|in:Portrait,Landscape',
            'apply_range' => 'sometimes|accepted',
            'start_position' => 'required_with:apply_range|numeric|min:1',
            'end_position' => 'required_with:apply_range|numeric|min:1',
        ]);

        $query = NSProductAttribute::query();

        // Adjust the query if a range is applied
        if ($request->filled('apply_range')) {
            $query->whereHas('product', function ($query) use ($validatedData) {
                $query->whereBetween('id', [$validatedData['start_position'], $validatedData['end_position']]);
            });
        }

        $labels = $query->get();

        if ($labels->isEmpty()) {
            return back()->withErrors('No labels found for the given range.');
        }

        // Optionally, update labels as printed. Uncomment if needed.
        // NSProductAttribute::whereIn('id', $labels->pluck('id'))->update(['printed' => true]);

        $data = [
            'page_size' => $validatedData['page_size'],
            'labels_width' => $validatedData['labels_width'],
            'labels_height' => $validatedData['labels_height'],
            'orientation' => $validatedData['orientation'],
            'labels' => $labels,
        ];

        $pdf = \PDF::loadView('labels.pdf', $data);

        Log::info('PDF generated successfully.');


        return $pdf->download('labels.pdf');
    } catch (\Exception $e) {
        // Log error message
        Log::error('Error generating PDF: ' . $e->getMessage());

        // Handle the exception (e.g., return an error response)
        return back()->withErrors('An error occurred while generating the PDF.');
    }
    }
}
