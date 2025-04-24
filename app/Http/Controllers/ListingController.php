<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller; //important for the construct method to work

class ListingController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }

    public function index(Request $request)
    {
        $filters = $request->only([
            'priceFrom',
            'priceTo',
            'beds',
            'baths',
            'areaFrom',
            'areaTo'
        ]);

        return inertia(
            'Listing/Index',
            [
                'filters' => $filters,
                'listings' => Listing::mostRecent()
                    ->filter($filters)
                    ->paginate(10)
                    ->withQueryString()
            ]
        );
    }



    /**
     * Display the specified resource.
     */
    public function show(Listing  $listing)
    {
        // if(Auth::user()->cannot('view', $listing)){
        //     return redirect()->route('listing.index')->with('error', 'You are not allowed to view this listing.');
        // }

        // $this->authorize('view', $listing);

        return inertia('Listing/Show', [
            'listing' => $listing
        ]);
    }



}
