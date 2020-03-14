<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAcceptRequestSpecialistsRequest;
use App\Http\Requests\UpdateAcceptRequestSpecialistsRequest;
use App\Repositories\AcceptRequestSpecialistsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class AcceptRequestSpecialistsController extends AppBaseController
{
    /** @var  AcceptRequestSpecialistsRepository */
    private $acceptRequestSpecialistsRepository;

    public function __construct(AcceptRequestSpecialistsRepository $acceptRequestSpecialistsRepo)
    {
        $this->acceptRequestSpecialistsRepository = $acceptRequestSpecialistsRepo;
    }

    /**
     * Display a listing of the AcceptRequestSpecialists.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $acceptRequestSpecialists = $this->acceptRequestSpecialistsRepository->all();

        return view('accept_request_specialists.index')
            ->with('acceptRequestSpecialists', $acceptRequestSpecialists);
    }

    /**
     * Show the form for creating a new AcceptRequestSpecialists.
     *
     * @return Response
     */
    public function create()
    {
        return view('accept_request_specialists.create');
    }

    /**
     * Store a newly created AcceptRequestSpecialists in storage.
     *
     * @param CreateAcceptRequestSpecialistsRequest $request
     *
     * @return Response
     */
    public function store(CreateAcceptRequestSpecialistsRequest $request)
    {
        $input = $request->all();

        $acceptRequestSpecialists = $this->acceptRequestSpecialistsRepository->create($input);

        Flash::success('Accept Request Specialists saved successfully.');

        return redirect(route('acceptRequestSpecialists.index'));
    }

    /**
     * Display the specified AcceptRequestSpecialists.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $acceptRequestSpecialists = $this->acceptRequestSpecialistsRepository->find($id);

        if (empty($acceptRequestSpecialists)) {
            Flash::error('Accept Request Specialists not found');

            return redirect(route('acceptRequestSpecialists.index'));
        }

        return view('accept_request_specialists.show')->with('acceptRequestSpecialists', $acceptRequestSpecialists);
    }

    /**
     * Show the form for editing the specified AcceptRequestSpecialists.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $acceptRequestSpecialists = $this->acceptRequestSpecialistsRepository->find($id);

        if (empty($acceptRequestSpecialists)) {
            Flash::error('Accept Request Specialists not found');

            return redirect(route('acceptRequestSpecialists.index'));
        }

        return view('accept_request_specialists.edit')->with('acceptRequestSpecialists', $acceptRequestSpecialists);
    }

    /**
     * Update the specified AcceptRequestSpecialists in storage.
     *
     * @param int $id
     * @param UpdateAcceptRequestSpecialistsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAcceptRequestSpecialistsRequest $request)
    {
        $acceptRequestSpecialists = $this->acceptRequestSpecialistsRepository->find($id);

        if (empty($acceptRequestSpecialists)) {
            Flash::error('Accept Request Specialists not found');

            return redirect(route('acceptRequestSpecialists.index'));
        }

        $acceptRequestSpecialists = $this->acceptRequestSpecialistsRepository->update($request->all(), $id);

        Flash::success('Accept Request Specialists updated successfully.');

        return redirect(route('acceptRequestSpecialists.index'));
    }

    /**
     * Remove the specified AcceptRequestSpecialists from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $acceptRequestSpecialists = $this->acceptRequestSpecialistsRepository->find($id);

        if (empty($acceptRequestSpecialists)) {
            Flash::error('Accept Request Specialists not found');

            return redirect(route('acceptRequestSpecialists.index'));
        }

        $this->acceptRequestSpecialistsRepository->delete($id);

        Flash::success('Accept Request Specialists deleted successfully.');

        return redirect(route('acceptRequestSpecialists.index'));
    }
}
