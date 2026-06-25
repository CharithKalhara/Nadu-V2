<?php

namespace App\Http\Controllers;

use App\Models\Nadu;
use Mpdf\Mpdf;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;

class ReportController extends Controller
{
    private function createMpdf()
    {
        $defaultConfig = (new ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];

        $defaultFontConfig = (new FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];

        return new Mpdf([
            'format' => 'A4',

            'fontDir' => array_merge($fontDirs, [
                public_path('fonts'),
            ]),

            'fontdata' => $fontData + [
                'iskoola' => [
                    'R' => 'Iskoola Pota Regular.ttf',
                    'useOTL' => 0xFF,
                ],
            ],

            'default_font' => 'iskoola',
        ]);
    }

    public function index()
    {
        ini_set('memory_limit', '1024M');
        set_time_limit(300);

        $data = Nadu::select(
            'id',
            'year',
            'thiraka_no',
            'samithiya',
            'recieved_date',
            'nadu_no'
        )->get();

        $html = view('reports.nadu-report', [
            'data' => $data,
            'title' => 'නඩු දත්ත වාර්තාව',
        ])->render();

        $mpdf = $this->createMpdf();
        $mpdf->WriteHTML($html);

        return response($mpdf->Output('', 'S'))
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="nadu-report.pdf"');
    }

    public function usaviGatha()
    {
        ini_set('memory_limit', '1024M');
        set_time_limit(300);

        $data = Nadu::select(
                'id',
                'year',
                'thiraka_no',
                'samithiya',
                'recieved_date',
                'nadu_no'
            )
            ->whereNull('nadu_no')
            ->orWhere('nadu_no', '')
            ->get();

        $html = view('reports.usavi-gatha-report', [
            'data' => $data,
            'title' => 'උසාවි ගත කිරීමට ඇති නඩු වාර්තාව',
        ])->render();

        $mpdf = $this->createMpdf();
        $mpdf->WriteHTML($html);

        return response($mpdf->Output('', 'S'))
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="usavi-gatha-kirimata-athi-nadu-report.pdf"');
    }
}