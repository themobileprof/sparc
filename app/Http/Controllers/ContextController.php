<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContextRequest;
use App\Http\Requests\UpdateContextRequest;
use App\Repositories\ContextRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ContextController extends AppBaseController
{
    /** @var  ContextRepository */
    private $contextRepository;

    public function __construct(ContextRepository $contextRepo)
    {
        $this->contextRepository = $contextRepo;
    }

    /**
     * Display a listing of the Context.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $contexts = $this->contextRepository->all();

        return view('contexts.index')
            ->with('contexts', $contexts);
    }

    /**
     * Show the form for creating a new Context.
     *
     * @return Response
     */
    public function create()
    {
        return view('contexts.create');
    }

    /**
     * Store a newly created Context in storage.
     *
     * @param CreateContextRequest $request
     *
     * @return Response
     */
    public function store(CreateContextRequest $request)
    {
        $input = $request->all();

        $context = $this->contextRepository->create($input);

        Flash::success('Context saved successfully.');

        return redirect(route('contexts.index'));
    }

    /**
     * Display the specified Context.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $context = $this->contextRepository->find($id);

        if (empty($context)) {
            Flash::error('Context not found');

            return redirect(route('contexts.index'));
        }

        return view('contexts.show')->with('context', $context);
    }

    /**
     * Show the form for editing the specified Context.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $context = $this->contextRepository->find($id);

        if (empty($context)) {
            Flash::error('Context not found');

            return redirect(route('contexts.index'));
        }

        return view('contexts.edit')->with('context', $context);
    }

    /**
     * Update the specified Context in storage.
     *
     * @param int $id
     * @param UpdateContextRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContextRequest $request)
    {
        $context = $this->contextRepository->find($id);

        if (empty($context)) {
            Flash::error('Context not found');

            return redirect(route('contexts.index'));
        }

        $context = $this->contextRepository->update($request->all(), $id);

        Flash::success('Context updated successfully.');

        return redirect(route('contexts.index'));
    }

    /**
     * Remove the specified Context from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $context = $this->contextRepository->find($id);

        if (empty($context)) {
            Flash::error('Context not found');

            return redirect(route('contexts.index'));
        }

        $this->contextRepository->delete($id);

        Flash::success('Context deleted successfully.');

        return redirect(route('contexts.index'));
    }
}
