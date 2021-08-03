<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePurchasingFunctionRequest;
use App\Http\Requests\UpdatePurchasingFunctionRequest;
use App\Repositories\PurchasingFunctionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Country;

class PurchasingFunctionController extends AppBaseController
{
    /** @var  PurchasingFunctionRepository */
    private $purchasingFunctionRepository;

    public function __construct(PurchasingFunctionRepository $purchasingFunctionRepo)
    {
        $this->purchasingFunctionRepository = $purchasingFunctionRepo;
    }

    /**
     * Display a listing of the PurchasingFunction.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $purchasingFunctions = $this->purchasingFunctionRepository->all();

        return view('purchasing_functions.index')
            ->with('purchasingFunctions', $purchasingFunctions);
    }

    /**
     * Show the form for creating a new PurchasingFunction.
     *
     * @return Response
     */
    public function create()
    {
		$countries = Country::orderBy('name')->pluck("name", "id"); 
        return view('purchasing_functions.create', ['countries' => $countries]);
    }

    /**
     * Store a newly created PurchasingFunction in storage.
     *
     * @param CreatePurchasingFunctionRequest $request
     *
     * @return Response
     */
    public function store(CreatePurchasingFunctionRequest $request)
    {
        $input = $request->all();

        $purchasingFunction = $this->purchasingFunctionRepository->create($input);

        Flash::success('Purchasing Function saved successfully.');

        return redirect(route('purchasingFunctions.index'));
    }

    /**
     * Display the specified PurchasingFunction.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $purchasingFunction = $this->purchasingFunctionRepository->find($id);

        if (empty($purchasingFunction)) {
            Flash::error('Purchasing Function not found');

            return redirect(route('purchasingFunctions.index'));
        }

        return view('purchasing_functions.show')->with('purchasingFunction', $purchasingFunction);
    }

    /**
     * Show the form for editing the specified PurchasingFunction.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $purchasingFunction = $this->purchasingFunctionRepository->find($id);

        if (empty($purchasingFunction)) {
            Flash::error('Purchasing Function not found');

            return redirect(route('purchasingFunctions.index'));
        }

        return view('purchasing_functions.edit')->with('purchasingFunction', $purchasingFunction);
    }

    /**
     * Update the specified PurchasingFunction in storage.
     *
     * @param int $id
     * @param UpdatePurchasingFunctionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePurchasingFunctionRequest $request)
    {
        $purchasingFunction = $this->purchasingFunctionRepository->find($id);

        if (empty($purchasingFunction)) {
            Flash::error('Purchasing Function not found');

            return redirect(route('purchasingFunctions.index'));
        }

        $purchasingFunction = $this->purchasingFunctionRepository->update($request->all(), $id);

        Flash::success('Purchasing Function updated successfully.');

        return redirect(route('purchasingFunctions.index'));
    }

    /**
     * Remove the specified PurchasingFunction from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $purchasingFunction = $this->purchasingFunctionRepository->find($id);

        if (empty($purchasingFunction)) {
            Flash::error('Purchasing Function not found');

            return redirect(route('purchasingFunctions.index'));
        }

        $this->purchasingFunctionRepository->delete($id);

        Flash::success('Purchasing Function deleted successfully.');

        return redirect(route('purchasingFunctions.index'));
    }
}
