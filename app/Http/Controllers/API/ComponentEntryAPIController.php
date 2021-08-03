<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateComponentEntryAPIRequest;
use App\Http\Requests\API\UpdateComponentEntryAPIRequest;
use App\Models\ComponentEntry;
use App\Repositories\ComponentEntryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ComponentEntryController
 * @package App\Http\Controllers\API
 */

class ComponentEntryAPIController extends AppBaseController
{
    /** @var  ComponentEntryRepository */
    private $componentEntryRepository;

    public function __construct(ComponentEntryRepository $componentEntryRepo)
    {
        $this->componentEntryRepository = $componentEntryRepo;
    }

    /**
     * Display a listing of the ComponentEntry.
     * GET|HEAD /componentEntries
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $componentEntries = $this->componentEntryRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($componentEntries->toArray(), 'Component Entries retrieved successfully');
    }

    /**
     * Store a newly created ComponentEntry in storage.
     * POST /componentEntries
     *
     * @param CreateComponentEntryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateComponentEntryAPIRequest $request)
    {
        $input = $request->all();

        $componentEntry = $this->componentEntryRepository->create($input);

        return $this->sendResponse($componentEntry->toArray(), 'Component Entry saved successfully');
    }

    /**
     * Display the specified ComponentEntry.
     * GET|HEAD /componentEntries/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ComponentEntry $componentEntry */
        $componentEntry = $this->componentEntryRepository->find($id);

        if (empty($componentEntry)) {
            return $this->sendError('Component Entry not found');
        }

        return $this->sendResponse($componentEntry->toArray(), 'Component Entry retrieved successfully');
    }

    /**
     * Update the specified ComponentEntry in storage.
     * PUT/PATCH /componentEntries/{id}
     *
     * @param int $id
     * @param UpdateComponentEntryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateComponentEntryAPIRequest $request)
    {
        $input = $request->all();

        /** @var ComponentEntry $componentEntry */
        $componentEntry = $this->componentEntryRepository->find($id);

        if (empty($componentEntry)) {
            return $this->sendError('Component Entry not found');
        }

        $componentEntry = $this->componentEntryRepository->update($input, $id);

        return $this->sendResponse($componentEntry->toArray(), 'ComponentEntry updated successfully');
    }

    /**
     * Remove the specified ComponentEntry from storage.
     * DELETE /componentEntries/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ComponentEntry $componentEntry */
        $componentEntry = $this->componentEntryRepository->find($id);

        if (empty($componentEntry)) {
            return $this->sendError('Component Entry not found');
        }

        $componentEntry->delete();

        return $this->sendSuccess('Component Entry deleted successfully');
    }
}
