<?php

namespace App\Http\Controllers;

use App\DataTables\KomplainDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateKomplainRequest;
use App\Http\Requests\UpdateKomplainRequest;
use App\Repositories\KomplainRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class KomplainController extends AppBaseController
{
    /** @var  KomplainRepository */
    private $komplainRepository;

    public function __construct(KomplainRepository $komplainRepo)
    {
        $this->komplainRepository = $komplainRepo;
    }

    /**
     * Display a listing of the Komplain.
     *
     * @param KomplainDataTable $komplainDataTable
     * @return Response
     */
    public function index(KomplainDataTable $komplainDataTable)
    {
        return $komplainDataTable->render('komplains.index');
    }

    /**
     * Show the form for creating a new Komplain.
     *
     * @return Response
     */
    public function create()
    {
        return view('komplains.create');
    }

    /**
     * Store a newly created Komplain in storage.
     *
     * @param CreateKomplainRequest $request
     *
     * @return Response
     */
    public function store(CreateKomplainRequest $request)
    {
        $input = $request->all();

        $komplain = $this->komplainRepository->create($input);

        Flash::success('Komplain saved successfully.');

        return redirect(route('komplains.index'));
    }

    /**
     * Display the specified Komplain.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $komplain = $this->komplainRepository->find($id);

        if (empty($komplain)) {
            Flash::error('Komplain not found');

            return redirect(route('komplains.index'));
        }

        return view('komplains.show')->with('komplain', $komplain);
    }

    /**
     * Show the form for editing the specified Komplain.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $komplain = $this->komplainRepository->with(['santri'])->find($id);

        if (empty($komplain)) {
            Flash::error('Komplain not found');

            return redirect(route('komplains.index'));
        }

        return view('komplains.edit')->with('komplain', $komplain);
    }

    /**
     * Update the specified Komplain in storage.
     *
     * @param  int              $id
     * @param UpdateKomplainRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKomplainRequest $request)
    {
        $komplain = $this->komplainRepository->find($id);

        if (empty($komplain)) {
            Flash::error('Komplain not found');

            return redirect(route('komplains.index'));
        }

        $komplain = $this->komplainRepository->update($request->all(), $id);

        Flash::success('Komplain updated successfully.');

        return redirect(route('komplains.index'));
    }

    /**
     * Remove the specified Komplain from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $komplain = $this->komplainRepository->find($id);

        if (empty($komplain)) {
            Flash::error('Komplain not found');

            return redirect(route('komplains.index'));
        }

        $this->komplainRepository->delete($id);

        Flash::success('Komplain deleted successfully.');

        return redirect(route('komplains.index'));
    }
}
