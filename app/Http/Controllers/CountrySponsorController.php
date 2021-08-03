<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCountrySponsorRequest;
use App\Http\Requests\UpdateCountrySponsorRequest;
use App\Repositories\CountrySponsorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Country;
use App\Models\Sponsor;

class CountrySponsorController extends AppBaseController
{
    /** @var  CountrySponsorRepository */
    private $countrySponsorRepository;

    public function __construct(CountrySponsorRepository $countrySponsorRepo)
    {
        $this->countrySponsorRepository = $countrySponsorRepo;
    }

    /**
     * Display a listing of the CountrySponsor.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
		// redirect home to countries home
		return redirect(route('countries.index'));

        $countrySponsors = $this->countrySponsorRepository->all();
        return view('country_sponsors.index')
            ->with('countrySponsors', $countrySponsors);
    }

    /**
     * Show the form for creating a new CountrySponsor.
     *
     * @return Response
     */
    public function create()
    {
		$countries = Country::orderBy('name')->pluck('name','id');
		$sponsors = Sponsor::orderBy('name')->pluck('name','id');
        return view('country_sponsors.create', ['countries' => $countries, 'sponsors' => $sponsors]);
    }

    /**
     * Store a newly created CountrySponsor in storage.
     *
     * @param CreateCountrySponsorRequest $request
     *
     * @return Response
     */
    public function store(CreateCountrySponsorRequest $request)
    {
        $input = $request->all();

        $countrySponsor = $this->countrySponsorRepository->create($input);

        Flash::success('Country Sponsor saved successfully.');

        return redirect(route('countrySponsors.index'));
    }

    /**
     * Display the specified CountrySponsor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $countrySponsor = $this->countrySponsorRepository->find($id);

        if (empty($countrySponsor)) {
            Flash::error('Country Sponsor not found');

            return redirect(route('countrySponsors.index'));
        }

        return view('country_sponsors.show')->with('countrySponsor', $countrySponsor);
    }

    /**
     * Show the form for editing the specified CountrySponsor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
		$countries = Country::orderBy('name')->pluck('name','id');
		$sponsors = Sponsor::orderBy('name')->pluck('name','id');
        $countrySponsor = $this->countrySponsorRepository->find($id);

        if (empty($countrySponsor)) {
            Flash::error('Country Sponsor not found');

            return redirect(route('countrySponsors.index'));
        }

        return view('country_sponsors.edit',['countries' => $countries, 'sponsors' => $sponsors, 'countrySponsor' => $countrySponsor]);
    }

    /**
     * Update the specified CountrySponsor in storage.
     *
     * @param int $id
     * @param UpdateCountrySponsorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCountrySponsorRequest $request)
    {
        $countrySponsor = $this->countrySponsorRepository->find($id);

        if (empty($countrySponsor)) {
            Flash::error('Country Sponsor not found');

            return redirect(route('countrySponsors.index'));
        }

        $countrySponsor = $this->countrySponsorRepository->update($request->all(), $id);

        Flash::success('Country Sponsor updated successfully.');

        return redirect(route('countrySponsors.index'));
    }

    /**
     * Remove the specified CountrySponsor from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $countrySponsor = $this->countrySponsorRepository->find($id);

        if (empty($countrySponsor)) {
            Flash::error('Country Sponsor not found');

            return redirect(route('countrySponsors.index'));
        }

        $this->countrySponsorRepository->delete($id);

        Flash::success('Country Sponsor deleted successfully.');

        return redirect(route('countrySponsors.index'));
    }
}
