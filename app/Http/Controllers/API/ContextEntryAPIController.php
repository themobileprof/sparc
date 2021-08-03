<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateContextEntryAPIRequest;
use App\Http\Requests\API\UpdateContextEntryAPIRequest;
use App\Models\ContextEntry;
use App\Repositories\ContextEntryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ContextEntryController
 * @package App\Http\Controllers\API
 */

class ContextEntryAPIController extends AppBaseController
{
    /** @var  ContextEntryRepository */
    private $contextEntryRepository;

    public function __construct(ContextEntryRepository $contextEntryRepo)
    {
        $this->contextEntryRepository = $contextEntryRepo;
    }

    /**
     * Display a listing of the ContextEntry.
     * GET|HEAD /contextEntries
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $contextEntries = $this->contextEntryRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($contextEntries->toArray(), 'Context Entries retrieved successfully');
    }

    /**
     * Store a newly created ContextEntry in storage.
     * POST /contextEntries
     *
     * @param CreateContextEntryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateContextEntryAPIRequest $request)
    {
        $input = $request->all();

        $contextEntry = $this->contextEntryRepository->create($input);

        return $this->sendResponse($contextEntry->toArray(), 'Context Entry saved successfully');
    }

    /**
     * Display the specified ContextEntry.
     * GET|HEAD /contextEntries/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ContextEntry $contextEntry */
        $contextEntry = $this->contextEntryRepository->find($id);

        if (empty($contextEntry)) {
            return $this->sendError('Context Entry not found');
        }

        return $this->sendResponse($contextEntry->toArray(), 'Context Entry retrieved successfully');
    }

    /**
     * Update the specified ContextEntry in storage.
     * PUT/PATCH /contextEntries/{id}
     *
     * @param int $id
     * @param UpdateContextEntryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContextEntryAPIRequest $request)
    {
        $input = $request->all();

        /** @var ContextEntry $contextEntry */
        $contextEntry = $this->contextEntryRepository->find($id);

        if (empty($contextEntry)) {
            return $this->sendError('Context Entry not found');
        }

        $contextEntry = $this->contextEntryRepository->update($input, $id);

        return $this->sendResponse($contextEntry->toArray(), 'ContextEntry updated successfully');
    }

    /**
     * Remove the specified ContextEntry from storage.
     * DELETE /contextEntries/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ContextEntry $contextEntry */
        $contextEntry = $this->contextEntryRepository->find($id);

        if (empty($contextEntry)) {
            return $this->sendError('Context Entry not found');
        }

        $contextEntry->delete();

        return $this->sendSuccess('Context Entry deleted successfully');
    }
}
