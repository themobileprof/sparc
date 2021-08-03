<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePurchasingFunctionAPIRequest;
use App\Http\Requests\API\UpdatePurchasingFunctionAPIRequest;
use App\Models\PurchasingFunction;
use App\Repositories\PurchasingFunctionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PurchasingFunctionController
 * @package App\Http\Controllers\API
 */

class PurchasingFunctionAPIController extends AppBaseController
{
    /** @var  PurchasingFunctionRepository */
    private $purchasingFunctionRepository;

    public function __construct(PurchasingFunctionRepository $purchasingFunctionRepo)
    {
        $this->purchasingFunctionRepository = $purchasingFunctionRepo;
    }

    /**
     * Display a listing of the PurchasingFunction.
     * GET|HEAD /purchasingFunctions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $purchasingFunctions = $this->purchasingFunctionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($purchasingFunctions->toArray(), 'Purchasing Functions retrieved successfully');
    }

    /**
     * Store a newly created PurchasingFunction in storage.
     * POST /purchasingFunctions
     *
     * @param CreatePurchasingFunctionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePurchasingFunctionAPIRequest $request)
    {
        $input = $request->all();

        $purchasingFunction = $this->purchasingFunctionRepository->create($input);

        return $this->sendResponse($purchasingFunction->toArray(), 'Purchasing Function saved successfully');
    }

    /**
     * Display the specified PurchasingFunction.
     * GET|HEAD /purchasingFunctions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PurchasingFunction $purchasingFunction */
        $purchasingFunction = $this->purchasingFunctionRepository->find($id);

        if (empty($purchasingFunction)) {
            return $this->sendError('Purchasing Function not found');
        }

        return $this->sendResponse($purchasingFunction->toArray(), 'Purchasing Function retrieved successfully');
    }

    /**
     * Update the specified PurchasingFunction in storage.
     * PUT/PATCH /purchasingFunctions/{id}
     *
     * @param int $id
     * @param UpdatePurchasingFunctionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePurchasingFunctionAPIRequest $request)
    {
        $input = $request->all();

        /** @var PurchasingFunction $purchasingFunction */
        $purchasingFunction = $this->purchasingFunctionRepository->find($id);

        if (empty($purchasingFunction)) {
            return $this->sendError('Purchasing Function not found');
        }

        $purchasingFunction = $this->purchasingFunctionRepository->update($input, $id);

        return $this->sendResponse($purchasingFunction->toArray(), 'PurchasingFunction updated successfully');
    }

    /**
     * Remove the specified PurchasingFunction from storage.
     * DELETE /purchasingFunctions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PurchasingFunction $purchasingFunction */
        $purchasingFunction = $this->purchasingFunctionRepository->find($id);

        if (empty($purchasingFunction)) {
            return $this->sendError('Purchasing Function not found');
        }

        $purchasingFunction->delete();

        return $this->sendSuccess('Purchasing Function deleted successfully');
    }
}
