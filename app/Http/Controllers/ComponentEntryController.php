<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateComponentEntryRequest;
use App\Http\Requests\UpdateComponentEntryRequest;
use App\Repositories\ComponentEntryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Country;
use App\Models\Component;

class ComponentEntryController extends AppBaseController
{
    /** @var  ComponentEntryRepository */
    private $componentEntryRepository;

    public function __construct(ComponentEntryRepository $componentEntryRepo)
    {
        $this->componentEntryRepository = $componentEntryRepo;
    }

    /**
     * Display a listing of the ComponentEntry.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $componentEntries = $this->componentEntryRepository->all();

        return view('component_entries.index')
            ->with('componentEntries', $componentEntries);
    }

    /**
     * Show the form for creating a new ComponentEntry.
     *
     * @return Response
     */
    public function create()
    {
		$countries = Country::orderBy('name')->pluck('name','id');
		$components = Component::orderBy('component')->pluck('component','id');
        return view('component_entries.create', ['countries' => $countries, 'components' => $components]);
    }

    /**
     * Store a newly created ComponentEntry in storage.
     *
     * @param CreateComponentEntryRequest $request
     *
     * @return Response
     */
    public function store(CreateComponentEntryRequest $request)
    {
        $input = $request->all();

        $componentEntry = $this->componentEntryRepository->create($input);

        Flash::success('Component Entry saved successfully.');

        return redirect(route('componentEntries.index'));
    }

    /**
     * Display the specified ComponentEntry.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $componentEntry = $this->componentEntryRepository->find($id);

        if (empty($componentEntry)) {
            Flash::error('Component Entry not found');

            return redirect(route('componentEntries.index'));
        }

        return view('component_entries.show')->with('componentEntry', $componentEntry);
    }

    /**
     * Show the form for editing the specified ComponentEntry.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
		$countries = Country::orderBy('name')->pluck("name", "id"); 
		$components = Component::orderBy('component')->pluck('component','id');
        $componentEntry = $this->componentEntryRepository->find($id);

        if (empty($componentEntry)) {
            Flash::error('Component Entry not found');

            return redirect(route('componentEntries.index'));
        }

        return view('component_entries.edit', ['countries' => $countries, 'components' => $components, 'componentEntry' => $componentEntry]);
    }

    /**
     * Update the specified ComponentEntry in storage.
     *
     * @param int $id
     * @param UpdateComponentEntryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateComponentEntryRequest $request)
    {
        $componentEntry = $this->componentEntryRepository->find($id);

        if (empty($componentEntry)) {
            Flash::error('Component Entry not found');

            return redirect(route('componentEntries.index'));
        }

        $componentEntry = $this->componentEntryRepository->update($request->all(), $id);

        Flash::success('Component Entry updated successfully.');

        return redirect(route('componentEntries.index'));
    }

    /**
     * Remove the specified ComponentEntry from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $componentEntry = $this->componentEntryRepository->find($id);

        if (empty($componentEntry)) {
            Flash::error('Component Entry not found');

            return redirect(route('componentEntries.index'));
        }

        $this->componentEntryRepository->delete($id);

        Flash::success('Component Entry deleted successfully.');

        return redirect(route('componentEntries.index'));
    }
}
