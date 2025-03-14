<?php

namespace App\Http\Controllers;

use App\Models\Aktivitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Elibyy\TCPDF\TCPDF;

class AktivitasController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'USER')->get();
        return view('form', compact('users'));
    }

    public function show($id)
    {
        $aktivitas = Aktivitas::findOrFail($id);
        return view('aktivitass.show', compact('aktivitas'));
    }

    public function create()
    {
        return view('aktivitass.create');
    }

    public function store(Request $request)
    {
        $id_tim = DB::table('keanggotaan')->where('nip_anggota', $request->nip)->pluck('id_tim');
        $request = $request->merge([
            'detail_aktivitas' => '',
            'issue' => '',
            'solusi' => '',
            'status' => 'belum',
            'id_tim' => $id_tim[0],
        ]);

        $validated = $request->validate([
            'nama_aktivitas' => 'required|string|max:255',
            'instruksi_aktivitas' => 'required|string',
            'tanggal' => 'required|date',
            'nip' => 'required|string',
            'detail_aktivitas' => 'nullable',
            'issue' => 'nullable',
            'solusi' => 'nullable',
            'status' => 'required',
            'id_tim' => 'required'
        ]);

        Aktivitas::create($validated);
        return redirect()->route('home');
    }

    public function edit($id)
    {
        $aktivitas = Aktivitas::findOrFail($id);
        return view('ubah', compact('aktivitas'));
    }

    public function update(Request $request, $id)
    {
        $aktivitas = Aktivitas::findOrFail($id);
        $aktivitas->update($request->all());
        return redirect()->route('home');
    }

    public function destroy($id)
    {
        $aktivitas = Aktivitas::findOrFail($id);
        $aktivitas->delete();
        return redirect()->route('home');
    }
    
    public function updateStatus(Request $request)
    {
        $status = Aktivitas::where('id', $request->id)->pluck('status');
        $newStatus = '';
        if($status[0]=="belum"){
            $newStatus = "selesai";
        }else{
            $newStatus = "belum";
        }
        $aktivitas = Aktivitas::where('id', $request->id);
        $aktivitas->update(['status'=>$newStatus]);
        return back();
    }

    public function generatePdf(Request $request)
    {
        $id_tim = DB::table('keanggotaan')->where('nip_anggota', Auth::user()->nip)->pluck('id_tim');

        $items = DB::table('aktivitas')
            ->join('users', 'aktivitas.nip', '=', 'users.nip')
            ->join('tim', 'aktivitas.id_tim', '=', 'tim.id')
            ->join('keanggotaan', 'users.nip', '=', 'keanggotaan.nip_anggota')
            ->orderBy('tanggal', 'asc');
    
        if ($request->searchInput != '') {
            $items = $items->where('nama_aktivitas','like', '%'.$request->searchInput.'%')->orWhere('instruksi_aktivitas', 'like', '%'.$request->searchInput.'%');
        }

        if ($request->dateFilter != '') {
            $items = $items->where('tanggal', $request->dateFilter);
        }

        if ($request->statusFilter != 'Status') {
            $items = $items->where('status', strtolower($request->statusFilter));
        }

        if (Auth::user()->role=='USER') {
            $items = $items->where('keanggotaan.id_tim', $id_tim);
        }
        
        $items = $items->get();
        
        $pdf = new TCPDF('L', 'mm', 'Letter', true, 'UTF-8', false);

        $pdf->AddPage('L');

        $pdf->Image(public_path('assets/images/logos/logobpkp.png'), 10, 5, 40, 20);
        $pdf->SetFont('helvetica', 'B', 16);
        $pdf->SetXY(40, 15);
        $pdf->Cell(0, 0, 'Report Aktivitas Harian', 0, 1, 'C');
        
        $pdf->Ln(10);
        
        $pdf->SetFont('helvetica', '', 10);
        
        // Start HTML table
        $html = '<table border="1" cellpadding="5" cellspacing="0" width="100%">';
        $html .= '<thead>';
        $html .= '<tr>';
        $html .= '<th width="25px">No</th>';
        $html .= '<th>Tanggal</th>';
        $html .= '<th>Judul Aktivitas</th>';
        $html .= '<th>Instruksi Aktivitas</th>';
        $html .= '<th width="140px">Detail Aktivitas</th>';
        $html .= '<th>Issue</th>';
        $html .= '<th>Solusi</th>';
        $html .= '<th>User</th>';
        $html .= '<th>Status</th>';
        $html .= '<th>Tim</th>';
        $html .= '</tr>';
        $html .= '</thead>';
        $html .= '<tbody>';
        
        $counter = 1;
        foreach ($items as $item) {
            $html .= '<tr>';
            $html .= '<td width="25px" align="center">' . $counter . '</td>';
            $html .= '<td align="center">' . \Carbon\Carbon::parse($item->tanggal)->locale(app()->getLocale())->isoFormat('DD/MM/YYYY') . '</td>';
            $html .= '<td>' . $item->nama_aktivitas . '</td>';
            $html .= '<td>' . $item->instruksi_aktivitas . '</td>';
            $html .= '<td width="140px">' . $item->detail_aktivitas . '</td>';
            $html .= '<td>' . $item->issue . '</td>';
            $html .= '<td>' . $item->solusi . '</td>';
            $html .= '<td>' . $item->name . '</td>';
            $html .= '<td>' . ucfirst($item->status) . '</td>';
            $html .= '<td>' . $item->nama_tim . '</td>';
            $html .= '</tr>';
            $counter++;
        }
        
        $html .= '</tbody>';
        $html .= '</table>';
        
        // Output the HTML content to PDF
        $pdf->writeHTML($html, true, false, false, false, '');
        return response($pdf->Output('Report - Aplikasi Aktivitas Harian BPKP.pdf', 'I'));
    }
    
}
