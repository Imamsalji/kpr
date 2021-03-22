<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{Pinjaman,Detailkpr};

class DetaildataController extends Controller
{
    public function getAngsuranKe()
    {
        return view('admin.detaildata.angsuranke.index');
    }
    public function getPokok()
    {
        return view('admin.detaildata.pokok.index');
    }
    public function getBunga()
    {
        return view('admin.detaildata.bunga.index');
    }
    public function getBesarAngsuran()
    {
        return view('admin.detaildata.besarangsuran.index');
    }
    public function getSisaAngsuran()
    {
        return view('admin.detaildata.sisaangsuran.index');
    }
    public function getindex($approve)
    {
        if ($approve == 'approve') {
            $pinjams = Detailkpr::where('status', 1)->orderBy('id', 'ASC')->paginate(20);
            return view('admin.datapinjaman.approve.index', compact('pinjams'));
        }
        if ($approve == 'pending') {
            $pinjams = Detailkpr::where('status', 0)->orderBy('id', 'ASC')->paginate(20);
            return view('admin.datapinjaman.pending.index', compact('pinjams'));
        }
    }

    public function show($id)
    {
        $kpr = Detailkpr::find($id);
        return view('admin.datapinjaman.approve.show',compact('kpr'));
    }

    public function statusupdate($id)
    {
        $pinjam = Pinjaman::findOrFail($id);
        $pinjam->update([
            'status' => 1
        ]);
        return back();
    }
    public function statusdecline($id)
    {
        $pinjam = Pinjaman::findOrFail($id);
        $pinjam->update([
            'status' => 0
        ]);
        return back();
    }
    public function cari($id)
    {
        $id = Pinjaman::with(['user'])->where('nama', 'Admin')->get();
        return view('admin.datapinjaman.approve.index', compact('pinjams'));
    }
}
