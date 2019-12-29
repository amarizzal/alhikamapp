<?php

namespace App\Http\Controllers;

use App\Models\Komplain;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class UserSantriController extends Controller
{
    public function index() {
        $user = auth()->guard('admins')->user();
        return view('client.index', compact('user'));
    }

    public function pengumuman() {
        $pengumuman = Pengumuman::whereMonth('tanggal', date('m'))
            ->whereYear('tanggal', date('Y'))->orderBy('tanggal', 'desc')->get();
        return view('client.pengumuman.index', compact('pengumuman'));
    }

    public function komplain() {
        $user = auth()->guard('admins')->user();
        $komplain = Komplain::where('santri_id', $user->username)->paginate(10);
        return view('client.komplain.index', compact('komplain'));
    }

    public function komplainStore(Request $request) {
        $this->validate($request, [
            'isi' => 'required'
        ]);

        Komplain::create([
            'isi' => $request->isi,
            'santri_id' => auth()->guard('admins')->user()->username,
            'status' => 2
        ]);

        Flash::success('Komplain saved successfully.');

        return redirect()->back();
    }
}
