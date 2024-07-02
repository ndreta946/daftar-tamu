<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;

class TamuController extends Controller
{
    public function index()
    {
        $daftar = Tamu::all();
        return view('index', compact('daftar'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|max:255',
            'nama' => 'required',
            'tlp' => 'required',
            'alamat' => 'required',
            'keperluan' => 'required',
            'tanggal' => 'required',
        ]);

        Tamu::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'tlp' => $request->tlp,
            'alamat' => $request->alamat,
            'keperluan' => $request->keperluan,
            'tanggal' => $request->tanggal,
            'time_in' => Carbon::now(),
            'petugas' => Auth::guard('petugas')->user()->nama,
        ]);

        return redirect()->route('daftar.index')
            ->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $tamu = Tamu::findOrFail($id);
        return view('edit', compact('tamu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nik' => 'required|max:255',
            'nama' => 'required',
            'tlp' => 'required',
            'alamat' => 'required',
            'keperluan' => 'required',
            'tanggal' => 'required',
        ]);

        $tamu = Tamu::findOrFail($id);
        $tamu->update($request->all());

        return redirect()->route('daftar.index')
            ->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $tamu = Tamu::findOrFail($id);
        $tamu->delete();

        return redirect()->route('daftar.index')
            ->with('success', 'Data Berhasil Dihapus');
    }

    public function setTimeOut($id)
    {
        $tamu = Tamu::findOrFail($id);
        $tamu->update(['time_out' => Carbon::now()]);

        return redirect()->route('daftar.index')
            ->with('success', 'Time Out berhasil diset');
    }

    public function exportPDF(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $daftar = Tamu::whereDate('tanggal', '>=', $startDate)
                      ->whereDate('tanggal', '<=', $endDate)
                      ->get();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml(view('pdf.daftar_pdf', compact('daftar', 'startDate', 'endDate')));
        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();
        return $dompdf->stream('daftar_tamu_'.$startDate.'_to_'.$endDate.'.pdf');
    }
}
