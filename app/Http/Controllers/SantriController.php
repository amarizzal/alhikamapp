<?php

namespace App\Http\Controllers;

use App\DataTables\SantriDataTable;
use App\Http\Requests\CreateSantriRequest;
use App\Http\Requests\UpdateSantriRequest;
use App\Imports\SantriImport;
use App\Models\DendaDetail;
use App\Models\Presensi;
use App\Repositories\DendaRepository;
use App\Repositories\SantriRepository;
use App\Repositories\UserRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Response;

class SantriController extends AppBaseController
{
    /** @var  SantriRepository */
    private $santriRepository;

    /** @var  UserRepository */
    private $usersRepository;

    /** @var  DendaRepository */
    private $dendaRepository;


    public function __construct(SantriRepository $santriRepo, UserRepository $userRepository, DendaRepository $dendaRepository)
    {
        $this->santriRepository = $santriRepo;
        $this->usersRepository = $userRepository;
        $this->dendaRepository = $dendaRepository;
    }

    /**
     * Display a listing of the Santri.
     *
     * @param SantriDataTable $santriDataTable
     * @return Response
     */
    public function index(SantriDataTable $santriDataTable)
    {
        return $santriDataTable->render('santris.index');
    }

    /**
     * Show the form for creating a new Santri.
     *
     * @return Response
     */
    public function create()
    {
        return view('santris.create');
    }

    /**
     * Store a newly created Santri in storage.
     *
     * @param CreateSantriRequest $request
     *
     * @return Response
     */
    public function store(CreateSantriRequest $request)
    {
        $input = $request->all();
        $santri = $this->santriRepository->create($input);


        $users = $this->usersRepository->create([
            'username' => $input['nik'],
            'password' => bcrypt($input['nik']),
            'role_id' => 2
        ]);

        $denda = $this->dendaRepository->create([
            'nik' => $input['nik'],
            'total_denda' => 0,
        ]);

        Flash::success('Santri saved successfully.');

        return redirect(route('santris.index'));
    }

    /**
     * Display the specified Santri.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $santri = $this->santriRepository->find($id);

        if (empty($santri)) {
            Flash::error('Santri not found');

            return redirect(route('santris.index'));
        }

        return view('santris.show')->with('santri', $santri);
    }

    /**
     * Show the form for editing the specified Santri.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $santri = $this->santriRepository->find($id);

        if (empty($santri)) {
            Flash::error('Santri not found');

            return redirect(route('santris.index'));
        }

        return view('santris.edit')->with('santri', $santri);
    }

    /**
     * Update the specified Santri in storage.
     *
     * @param  int              $id
     * @param UpdateSantriRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSantriRequest $request)
    {
        $santri = $this->santriRepository->find($id);

        if (empty($santri)) {
            Flash::error('Santri not found');

            return redirect(route('santris.index'));
        }

        $santri = $this->santriRepository->update($request->all(), $id);

        Flash::success('Santri updated successfully.');

        return redirect(route('santris.index'));
    }

    /**
     * Remove the specified Santri from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $santri = $this->santriRepository->find($id);

            if (empty($santri)) {
                Flash::error('Santri not found');

                return redirect(route('santris.index'));
            }

            $this->santriRepository->delete($id);
            $this->usersRepository->where('username', $santri->nik)->delete();
            Presensi::where('nik', $id)->delete();
            // delete denda
            $denda = $this->dendaRepository->where('nik', $santri->nik)->first();
            DendaDetail::where('denda_id', $denda->id)->delete();
            $denda->delete();

            Flash::success('Santri deleted successfully.');

            DB::commit();

            return redirect(route('santris.index'));
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function uploadExcel(Request $request) {
        try {

            $this->validate($request, [
                'file' => 'required'
            ]);

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                ini_set('max_execution_time', 600);
                Excel::import(new SantriImport(), $file);
            }

            Flash::success('Presensi saved successfully.');

            return redirect(route('santris.index'));

        }catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
