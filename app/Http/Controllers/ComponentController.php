<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateComponentRequest;
use App\Http\Requests\UpdateComponentRequest;
use App\Repositories\ComponentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ComponentController extends AppBaseController
{
    /** @var  ComponentRepository */
    private $componentRepository;

    public function __construct(ComponentRepository $componentRepo)
    {
        $this->componentRepository = $componentRepo;
    }

    /**
     * Display a listing of the Component.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $components = $this->componentRepository->all();

        return view('components.index')
            ->with('components', $components);
    }

    /**
     * Show the form for creating a new Component.
     *
     * @return Response
     */
    public function create()
    {
        return view('components.create');
    }

    /**
     * Store a newly created Component in storage.
     *
     * @param CreateComponentRequest $request
     *
     * @return Response
     */
    public function store(CreateComponentRequest $request)
    {
        $input = $request->all();

        $component = $this->componentRepository->create($input);

        Flash::success('Component saved successfully.');

        return redirect(route('components.index'));
    }

    /**
     * Display the specified Component.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $component = $this->componentRepository->find($id);

        if (empty($component)) {
            Flash::error('Component not found');

            return redirect(route('components.index'));
        }

        return view('components.show')->with('component', $component);
    }

    /**
     * Show the form for editing the specified Component.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $component = $this->componentRepository->find($id);

        if (empty($component)) {
            Flash::error('Component not found');

            return redirect(route('components.index'));
        }

        return view('components.edit')->with('component', $component);
    }

    /**
     * Update the specified Component in storage.
     *
     * @param int $id
     * @param UpdateComponentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateComponentRequest $request)
    {
        $component = $this->componentRepository->find($id);

        if (empty($component)) {
            Flash::error('Component not found');

            return redirect(route('components.index'));
        }

        $component = $this->componentRepository->update($request->all(), $id);

        Flash::success('Component updated successfully.');

        return redirect(route('components.index'));
    }

    /**
     * Remove the specified Component from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $component = $this->componentRepository->find($id);

        if (empty($component)) {
            Flash::error('Component not found');

            return redirect(route('components.index'));
        }

        $this->componentRepository->delete($id);

        Flash::success('Component deleted successfully.');

        return redirect(route('components.index'));
    }
}
