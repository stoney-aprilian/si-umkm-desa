<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController extends Controller
{

    public function index(Request $request): View
    {
        $keyword = trim(
            $request->input('q')
        );


        $umkms = collect();

        $products = collect();

        $categories = collect();



        if ($keyword) {


            $umkms = Umkm::query()

                ->approved()

                ->active()

                ->search($keyword)

                ->with([
                    'category:id,name',
                ])

                ->latest()

                ->take(10)

                ->get();




            $products = Product::query()

                ->active()

                ->search($keyword)

                ->with([
                    'umkm:id,business_name,slug',
                ])

                ->latest()

                ->take(10)

                ->get();




            $categories = Category::query()

                ->active()

                ->search($keyword)

                ->latest()

                ->take(10)

                ->get();
        }



        return view(
            'admin.search.index',
            compact(
                'keyword',
                'umkms',
                'products',
                'categories'
            )
        );
    }
}
