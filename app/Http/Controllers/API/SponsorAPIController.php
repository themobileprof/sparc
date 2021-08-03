<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSponsorAPIRequest;
use App\Http\Requests\API\UpdateSponsorAPIRequest;
use App\Models\Sponsor;
use App\Repositories\SponsorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SponsorController
 * @package App\Http\Controllers\API
 */

class SponsorAPIController extends AppBaseController
{
    /** @var  SponsorRepository */
    private $sponsorRepository;

    public function __construct(SponsorRepository $sponsorRepo)
    {
        $this->sponsorRepository = $sponsorRepo;
    }

    /**
     * Display a listing of the Sponsor.
     * GET|HEAD /sponsors
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $sponsors = $this->sponsorRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($sponsors->toArray(), 'Sponsors retrieved successfully');
    }

    /**
     * Store a newly created Sponsor in storage.
     * POST /sponsors
     *
     * @param CreateSponsorAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSponsorAPIRequest $request)
    {
        $input = $request->all();

        $sponsor = $this->sponsorRepository->create($input);

        return $this->sendResponse($sponsor->toArray(), 'Sponsor saved successfully');
    }

    /**
     * Display the specified Sponsor.
     * GET|HEAD /sponsors/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Sponsor $sponsor */
        $sponsor = $this->sponsorRepository->find($id);

        if (empty($sponsor)) {
            return $this->sendError('Sponsor not found');
        }

        return $this->sendResponse($sponsor->toArray(), 'Sponsor retrieved successfully');
    }

    /**
     * Update the specified Sponsor in storage.
     * PUT/PATCH /sponsors/{id}
     *
     * @param int $id
     * @param UpdateSponsorAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSponsorAPIRequest $request)
    {
        $input = $request->all();

        /** @var Sponsor $sponsor */
        $sponsor = $this->sponsorRepository->find($id);

        if (empty($sponsor)) {
            return $this->sendError('Sponsor not found');
        }

        $sponsor = $this->sponsorRepository->update($input, $id);

        return $this->sendResponse($sponsor->toArray(), 'Sponsor updated successfully');
    }

    /**
     * Remove the specified Sponsor from storage.
     * DELETE /sponsors/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Sponsor $sponsor */
        $sponsor = $this->sponsorRepository->find($id);

        if (empty($sponsor)) {
            return $this->sendError('Sponsor not found');
        }

        $sponsor->delete();

        return $this->sendSuccess('Sponsor deleted successfully');
    }
}
