<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\DokumenPelamar;
use App\Models\Lowongan;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LowonganKerjaController extends Controller
{
    public function index()
    {
        try {
            $user = Auth::user();
            if ($user) {
                $id_user = $user->id;

                return view('lowongan.lowongan_kerja', [

                    'lowongans' => Lowongan::all(),

                    'departemens' => Lowongan::rightJoin('departemen', 'lowongan.id_departemen', '=', 'departemen.id_departemen')
                        ->select(DB::raw('count(lowongan.nama_lowongan) as total_lowongan, departemen.id_departemen as id_departemen, nama_departemen, kode_departemen'))
                        ->groupBy('departemen.id_departemen')
                        ->get(),

                    'lowonganOpen' => Lowongan::join('departemen', 'lowongan.id_departemen', '=', 'departemen.id_departemen')
                        ->select(DB::raw('lowongan.id, lowongan.id_departemen, departemen.nama_departemen, nama_lowongan, slug, lowongan.tipe_lowongan, deskripsi, lowongan.created_at, lowongan.updated_at'))
                        ->where('closed', '=', 'false')
                        ->get(),

                    'lowonganClosed' => Lowongan::join('departemen', 'lowongan.id_departemen', '=', 'departemen.id_departemen')
                        ->select(DB::raw('lowongan.id, lowongan.id_departemen, departemen.nama_departemen, nama_lowongan, slug, lowongan.tipe_lowongan, deskripsi, lowongan.created_at, lowongan.updated_at'))
                        ->where('closed', '=', 'true')
                        ->get(),

                    'users' => User::where('id', auth()->user()->id)->get(),

                    'title' => 'Lowongan Kerja'

                    // 'profils' => Profil::where('user_id', '=', $id_user)->get(),
                ]);
            } else {
                return view('main.index', [

                    'lowongan' => Lowongan::all(),

                    'departemens' => Lowongan::rightJoin('departemen', 'lowongan.id_departemen', '=', 'departemen.id_departemen')
                        ->select(DB::raw('count(lowongan.nama_lowongan) as total_lowongan, departemen.id_departemen as id_departemen, nama_departemen, kode_departemen'))
                        ->groupBy('departemen.id_departemen')
                        ->get(),

                    'lowonganOpen' => Lowongan::join('departemen', 'lowongan.id_departemen', '=', 'departemen.id_departemen')
                        ->select(DB::raw('lowongan.id, lowongan.id_departemen, departemen.nama_departemen, nama_lowongan, slug, tipe_lowongan, deskripsi, lowongan.created_at, lowongan.updated_at'))
                        ->where('closed', '=', 'false')
                        ->get(),

                    'lowonganClosed' => Lowongan::join('departemen', 'lowongan.id_departemen', '=', 'departemen.id_departemen')
                        ->select(DB::raw('lowongan.id, lowongan.id_departemen, departemen.nama_departemen, nama_lowongan, slug, tipe_lowongan, deskripsi, lowongan.created_at, lowongan.updated_at'))
                        ->where('closed', '=', 'true')
                        ->get(),

                    'users' => User::where('id', auth()->user()->id)->get(),

                    'title' => 'Lowongan Kerja'

                ]);
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function show(Lowongan $lowongan)
    {

        return view('lowongan.detail_lowongan_kerja', [
            "lowongan" => $lowongan,
            "departemen" => Departemen::where('id_departemen', $lowongan->id_departemen),
            // "profils" => Profil::where('user_id',auth()->user()->id)->get(),
            "users" => User::where('id', auth()->user()->id)->get(),
            "title" => "Detail Lowongan Kerja"
        ]);
    }

    public function upload(Request $request)
    {
        dd($request);
        $request->validate([
            'id_pelamar' => 'required',
            'surat_lamaran' => 'mimes:pdf|max:2048'
        ]);


        $file = $request->file('surat_lamaran');
        $path = $file->getRealPath();
        $nama_file = $file->getClientOriginalName();

        DokumenPelamar::create([
            'nama' => $nama_file,
            'dokumen' => $path,
        ]);

        return redirect('/lowongan-kerja')->with('success add document', 'Dokumen sudah dikirim');
    }
}
