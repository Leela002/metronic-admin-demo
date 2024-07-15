<?php

namespace App\Exports;

use App\Models\Customer;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomersExport
{
    public function exportData(Request $request)
    {
        try {
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Define the headings
            $headings = [
                'ID',
                'First Name',
                'Last Name',
                'Contact',
                'Email',
                'Gender',
                'Blood Group',
                'DOB',
                'Created At',
                'Created By',
                'Updated At',
                'Updated By',
            ];

            // Set the headings to the first row
            $sheet->fromArray($headings, null, 'A1');

            // Fetch the data from the database
            $customers = Customer::withoutTrashed()->get();

            // Fill data into the spreadsheet
            $rowNumber = 2; // Start from the second row
            foreach ($customers as $customer) {
                $sheet->setCellValue('A' . $rowNumber, $customer->id);
                $sheet->setCellValue('B' . $rowNumber, $customer->first_name);
                $sheet->setCellValue('C' . $rowNumber, $customer->last_name);
                $sheet->setCellValue('D' . $rowNumber, $customer->contact);
                $sheet->setCellValue('E' . $rowNumber, $customer->email);
                $sheet->setCellValue('F' . $rowNumber, $customer->gender);
                $sheet->setCellValue('G' . $rowNumber, $customer->blood_group);
                $sheet->setCellValue('H' . $rowNumber, $customer->dob);
                $sheet->setCellValue('I' . $rowNumber, $customer->created_at);
                $sheet->setCellValue('J' . $rowNumber, $customer->created_by);
                if($customer->created_at == $customer->updated_at){
                    $sheet->setCellValue('K' . $rowNumber, ' ');
                }elseif($customer->updated_by == null){
                    $sheet->setCellValue('K' . $rowNumber, ' ');
                }else{
                    $sheet->setCellValue('K' . $rowNumber, $customer->updated_at);
                }
                $sheet->setCellValue('L' . $rowNumber, $customer->updated_by);
                $rowNumber++;
            }

            // Style the headings
            $sheet->getStyle('A1:L1')->getFont()->setBold(true);
            $sheet->getStyle('A1:L1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('A1:L1')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');

            // Auto-size columns for each column
            foreach (range('A', 'L') as $columnID) {
                $sheet->getColumnDimension($columnID)->setAutoSize(true);
            }

            // Write the spreadsheet to a file
            $writer = new Xlsx($spreadsheet);
            $fileName = 'customers_export_' . date('Ymd_His') . '.xlsx';
            $filePath = storage_path('app/public/' . $fileName);
            $writer->save($filePath);

            return response()->download($filePath)->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            Log::error('Error exporting customers: ' . $e->getMessage());
            return response()->json(['error' => 'Error occurred while exporting data.'], 500);
        }
    }
}
