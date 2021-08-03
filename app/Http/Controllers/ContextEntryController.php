<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContextEntryRequest;
use App\Http\Requests\UpdateContextEntryRequest;
use App\Repositories\ContextEntryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Context;
use App\Models\Country;

class ContextEntryController extends AppBaseController
{
    /** @var  ContextEntryRepository */
    private $contextEntryRepository;

    public function __construct(ContextEntryRepository $contextEntryRepo)
    {
        $this->contextEntryRepository = $contextEntryRepo;
    }

    /**
     * Display a listing of the ContextEntry.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
		$contextEntries = $this->contextEntryRepository->all();
        //$contextEntries = ContextEntry::all();

        return view('context_entries.index')
            ->with('contextEntries', $contextEntries);
    }

    /**
     * Show the form for creating a new ContextEntry.
     *
     * @return Response
     */
    public function create()
    {
		$countries = Country::orderBy('name')->pluck("name", "id"); 
		$contexts = Context::orderBy('slug')->pluck("slug", "id"); 
        return view('context_entries.create', ['countries' => $countries, 'contexts' => $contexts]);
    }

    /**
     * Store a newly created ContextEntry in storage.
     *
     * @param CreateContextEntryRequest $request
     *
     * @return Response
     */
    public function store(CreateContextEntryRequest $request)
    {
        $input = $request->all();

        $contextEntry = $this->contextEntryRepository->create($input);

        Flash::success('Context Entry saved successfully.');

        return redirect(route('contextEntries.index'));
    }

    /**
     * Display the specified ContextEntry.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contextEntry = $this->contextEntryRepository->find($id);

        if (empty($contextEntry)) {
            Flash::error('Context Entry not found');

            return redirect(route('contextEntries.index'));
        }

        return view('context_entries.show')->with('contextEntry', $contextEntry);
    }

    /**
     * Show the form for editing the specified ContextEntry.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
		$countries = Country::orderBy('name')->pluck("name", "id"); 
		$contexts = Context::orderBy('slug')->pluck("slug", "id"); 
        $contextEntry = $this->contextEntryRepository->find($id);

        if (empty($contextEntry)) {
            Flash::error('Context Entry not found');

            return redirect(route('contextEntries.index'));
        }

        return view('context_entries.edit', ['countries' => $countries, 'contexts' => $contexts, 'contextEntry' => $contextEntry]);
    }

    /**
     * Update the specified ContextEntry in storage.
     *
     * @param int $id
     * @param UpdateContextEntryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContextEntryRequest $request)
    {
        $contextEntry = $this->contextEntryRepository->find($id);

        if (empty($contextEntry)) {
            Flash::error('Context Entry not found');

            return redirect(route('contextEntries.index'));
        }

        $contextEntry = $this->contextEntryRepository->update($request->all(), $id);

        Flash::success('Context Entry updated successfully.');

        return redirect(route('contextEntries.index'));
    }

    /**
     * Remove the specified ContextEntry from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contextEntry = $this->contextEntryRepository->find($id);

        if (empty($contextEntry)) {
            Flash::error('Context Entry not found');

            return redirect(route('contextEntries.index'));
        }

        $this->contextEntryRepository->delete($id);

        Flash::success('Context Entry deleted successfully.');

        return redirect(route('contextEntries.index'));
    }
}
