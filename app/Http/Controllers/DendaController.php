<?php

namespace App\Http\Controllers;

use App\DataTables\DendaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDendaRequest;
use App\Http\Requests\UpdateDendaRequest;
use App\Models\Denda;
use App\Models\Kegiatan;
use App\Repositories\DendaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Matrix\Builder;
use Response;

class DendaController extends AppBaseController
{
    /** @var  DendaRepository */
    private $dendaRepository;

    public function __construct(DendaRepository $dendaRepo)
    {
        $this->dendaRepository = $dendaRepo;
    }

    /**
     * Display a listing of the Denda.
     *
     * @param DendaDataTable $dendaDataTable
     * @return Response
     */
    public function index(DendaDataTable $dendaDataTable)
    {
//        $denda = Denda::with(['santri', 'last_denda_detail'])->take(3)->get()->toArray();
//        dd($denda);
        return $dendaDataTable->render('dendas.index');
    }

    /**
     * Show the form for creating a new Denda.
     *
     * @return Response
     */
    public function create()
    {
        return view('dendas.create');
    }

    /**
     * Store a newly created Denda in storage.
     *
     * @param CreateDendaRequest $request
     *
     * @return Response
     */
    public function store(CreateDendaRequest $request)
    {
        $input = $request->all();

        $denda = $this->dendaRepository->create($input);

        Flash::success('Denda saved successfully.');

        return redirect(route('dendas.index'));
    }

    /**
     * Display the specified Denda.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $denda = Denda::with(['denda_detail.jadwalKegiatan.kegiatan','santri', 'presensi' => function($query) use($id) {
            $query->select(['izin', 'nik'])->where('nik', $id);
            }])
            ->whereHas('denda_detail', function ($query) use ($id) {
                $query->where('nik', $id);
            })->first();
//        dd($denda);

        if (empty($denda)) {
            Flash::error('santri tidak memiliki denda');

            return redirect(route('dendas.index'));
        }
        $kegiatan = Kegiatan::all();
        return view('dendas.show')->with(['denda' => $denda, 'kegiatan' => $kegiatan]);
    }

    /**
     * Show the form for editing the specified Denda.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $denda = $this->dendaRepository->find($id);

        if (empty($denda)) {
            Flash::error('Denda not found');

            return redirect(route('dendas.index'));
        }

        return view('dendas.edit')->with('denda', $denda);
    }

    /**
     * Update the specified Denda in storage.
     *
     * @param  int              $id
     * @param UpdateDendaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDendaRequest $request)
    {
        $denda = $this->dendaRepository->find($id);

        if (empty($denda)) {
            Flash::error('Denda not found');

            return redirect(route('dendas.index'));
        }

        $denda = $this->dendaRepository->update($request->all(), $id);

        Flash::success('Denda updated successfully.');

        return redirect(route('dendas.index'));
    }

    /**
     * Remove the specified Denda from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $denda = $this->dendaRepository->find($id);

        if (empty($denda)) {
            Flash::error('Denda not found');

            return redirect(route('dendas.index'));
        }

        $this->dendaRepository->delete($id);

        Flash::success('Denda deleted successfully.');

        return redirect(route('dendas.index'));
    }
}
