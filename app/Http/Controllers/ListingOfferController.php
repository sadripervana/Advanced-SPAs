<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Listing;
use Illuminate\Http\Request;
use App\Notifications\OfferMade;

class ListingOfferController extends Controller
{
    public function store(Listing $listing, Request $request)
    {
        $offer = Offer::make(
            $request->validate([
                'amount' => 'required|integer|min:1|max:20000000'
            ])
        );
        $offer->bidder()->associate($request->user());
        $offer = $listing->offers()->save($offer);

        $listing->owner->notify(
            new OfferMade($offer)
        );

        return redirect()->back()->with(
            'success',
            'Offer was made!'
        );
    }
}
