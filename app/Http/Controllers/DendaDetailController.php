<?php

namespace App\Http\Controllers;

use App\DataTables\DendaDetailDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDendaDetailRequest;
use App\Http\Requests\UpdateDendaDetailRequest;
use App\Models\Denda;
use App\Repositories\DendaDetailRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;

class DendaDetailController extends AppBaseController
{
    /** @var  DendaDetailRepository */
    private $dendaDetailRepository;

    public function __construct(DendaDetailRepository $dendaDetailRepo)
    {
        $this->dendaDetailRepository = $dendaDetailRepo;
    }

    /**
     * Display a listing of the DendaDetail.
     *
     * @param DendaDetailDataTable $dendaDetailDataTable
     * @return Response
     */
    public function index(DendaDetailDataTable $dendaDetailDataTable)
    {
        return $dendaDetailDataTable->render('denda_details.index');
    }

    /**
     * Show the form for creating a new DendaDetail.
     *
     * @return Response
     */
    public function create()
    {
        return view('denda_details.create');
    }

    /**
     * Store a newly created DendaDetail in storage.
     *
     * @param CreateDendaDetailRequest $request
     *
     * @return Response
     */
    public function store(CreateDendaDetailRequest $request)
    {
        $input = $request->all();

        $dendaDetail = $this->dendaDetailRepository->create($input);

        Flash::success('Denda Detail saved successfully.');

        return redirect(route('dendaDetails.index'));
    }

    /**
     * Display the specified DendaDetail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dendaDetail = $this->dendaDetailRepository->find($id);

        if (empty($dendaDetail)) {
            Flash::error('Denda Detail not found');

            return redirect(route('dendaDetails.index'));
        }

        return view('denda_details.show')->with('dendaDetail', $dendaDetail);
    }

    /**
     * Show the form for editing the specified DendaDetail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dendaDetail = $this->dendaDetailRepository->find($id);

        if (empty($dendaDetail)) {
            Flash::error('Denda Detail not found');

            return redirect(route('dendaDetails.index'));
        }

        return view('denda_details.edit')->with('dendaDetail', $dendaDetail);
    }

    /**
     * Update the specified DendaDetail in storage.
     ** @param  int              $nik
     * @param  int              $id
     * @param UpdateDendaDetailRequest $request
     *
     * @return Response
     */
    public function update($nik, $id, Request $request)
    {
        try {
            DB::beginTransaction();

            $dendaDetail = $this->dendaDetailRepository->with(['jadwalkegiatan.kegiatan'])->find($id);

            $denda = Denda::find($dendaDetail->denda_id);
            if ($request->status == 1) {
                $newDenda = ($denda->total_denda - $dendaDetail->jadwalkegiatan->kegiatan->harga_denda);
            }
            else if ($request->status == 0) {
                $newDenda = ($denda->total_denda + $dendaDetail->jadwalkegiatan->kegiatan->harga_denda);
            }
            $denda->update([
                'total_denda' => $newDenda
            ]);

            if (empty($dendaDetail)) {
                Flash::error('Denda Detail not found');

                return redirect(route('dendaDetails.index'));
            }

            $dendaDetail = $this->dendaDetailRepository->update($request->all(), $id);

            Flash::success('Denda Detail updated successfully.');

            DB::commit();

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified DendaDetail from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dendaDetail = $this->dendaDetailRepository->find($id);

        if (empty($dendaDetail)) {
            Flash::error('Denda Detail not found');

            return redirect(route('dendaDetails.index'));
        }

        $this->dendaDetailRepository->delete($id);

        Flash::success('Denda Detail deleted successfully.');

        return redirect(route('dendaDetails.index'));
    }
}
