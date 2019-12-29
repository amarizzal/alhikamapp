<?php

namespace App\Http\Controllers;

use App\DataTables\JadwalKegiatanDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateJadwalKegiatanRequest;
use App\Http\Requests\UpdateJadwalKegiatanRequest;
use App\Models\Kegiatan;
use App\Repositories\JadwalKegiatanRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class JadwalKegiatanController extends AppBaseController
{
    /** @var  JadwalKegiatanRepository */
    private $jadwalKegiatanRepository;

    public function __construct(JadwalKegiatanRepository $jadwalKegiatanRepo)
    {
        $this->jadwalKegiatanRepository = $jadwalKegiatanRepo;
    }

    /**
     * Display a listing of the JadwalKegiatan.
     *
     * @param JadwalKegiatanDataTable $jadwalKegiatanDataTable
     * @return Response
     */
    public function index(JadwalKegiatanDataTable $jadwalKegiatanDataTable)
    {
        return $jadwalKegiatanDataTable->render('jadwal_kegiatans.index');
    }

    /**
     * Show the form for creating a new JadwalKegiatan.
     *
     * @return Response
     */
    public function create()
    {
        $kegiatan = Kegiatan::select('id', 'name')->pluck('name', 'id');
        return view('jadwal_kegiatans.create', compact('kegiatan'));
    }

    /**
     * Store a newly created JadwalKegiatan in storage.
     *
     * @param CreateJadwalKegiatanRequest $request
     *
     * @return Response
     */
    public function store(CreateJadwalKegiatanRequest $request)
    {
        $input = $request->all();

        $jadwalKegiatan = $this->jadwalKegiatanRepository->create($input);

        Flash::success('Jadwal Kegiatan saved successfully.');

        return redirect(route('jadwalKegiatans.index'));
    }

    /**
     * Display the specified JadwalKegiatan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jadwalKegiatan = $this->jadwalKegiatanRepository->find($id);

        if (empty($jadwalKegiatan)) {
            Flash::error('Jadwal Kegiatan not found');

            return redirect(route('jadwalKegiatans.index'));
        }

        return view('jadwal_kegiatans.show')->with('jadwalKegiatan', $jadwalKegiatan);
    }

    /**
     * Show the form for editing the specified JadwalKegiatan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jadwalKegiatan = $this->jadwalKegiatanRepository->find($id);
        $jadwalKegiatan->tanggal = date('Y-m-d', strtotime($jadwalKegiatan->tanggal));

        if (empty($jadwalKegiatan)) {
            Flash::error('Jadwal Kegiatan not found');

            return redirect(route('jadwalKegiatans.index'));
        }

        $kegiatan = Kegiatan::select('id', 'name')->pluck('name', 'id');

        return view('jadwal_kegiatans.edit')->with(['jadwalKegiatan' => $jadwalKegiatan, 'kegiatan' => $kegiatan]);
    }

    /**
     * Update the specified JadwalKegiatan in storage.
     *
     * @param  int              $id
     * @param UpdateJadwalKegiatanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJadwalKegiatanRequest $request)
    {
        $jadwalKegiatan = $this->jadwalKegiatanRepository->find($id);

        if (empty($jadwalKegiatan)) {
            Flash::error('Jadwal Kegiatan not found');

            return redirect(route('jadwalKegiatans.index'));
        }

        $jadwalKegiatan = $this->jadwalKegiatanRepository->update($request->all(), $id);

        Flash::success('Jadwal Kegiatan updated successfully.');

        return redirect(route('jadwalKegiatans.index'));
    }

    /**
     * Remove the specified JadwalKegiatan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jadwalKegiatan = $this->jadwalKegiatanRepository->find($id);

        if (empty($jadwalKegiatan)) {
            Flash::error('Jadwal Kegiatan not found');

            return redirect(route('jadwalKegiatans.index'));
        }

        $this->jadwalKegiatanRepository->delete($id);

        Flash::success('Jadwal Kegiatan deleted successfully.');

        return redirect(route('jadwalKegiatans.index'));
    }
}
