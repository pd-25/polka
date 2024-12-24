<?php

namespace App\Http\Controllers\frontend;

use App\Core\category\CategoryInterface;
use App\Core\products\ProductInterface;
use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public $categoryInterface, $productInterface;
    public function __construct(CategoryInterface $categoryInterface, ProductInterface $productInterface)
    {
        $this->categoryInterface = $categoryInterface;
        $this->productInterface = $productInterface;
    }
    public function index()
    {
        return view('frontend.index', [
            'categories' => $this->categoryInterface->fetchAllCategories("DESC"),
            'products' => $this->productInterface->fetchAllProducts("Rand"),
            'topSelling' => $this->productInterface->fetchAllProducts("limit"),
            //fetch here how ever you need
        ]);
    }

    public function aboutUs()
    {
        return view('frontend.aboutus');
    }


    public function certificate()
    {
        return view('frontend.certificate');
    }

    public function contactus()
    {
        return view('frontend.contactus');
    }

    public function account()
    {
        return view('frontend.account');
    }

    public function postcontactus(Request $request)
    {
        $request->validate([
            "first_name" => "required|string",
            "last_name" => "required|string",
            "email" => "required|email",
            "phone" => "required|string",
            "subject" => "required|string",
            "message" => "required|string"
        ]);
        $data = $request->only("first_name", "last_name", "email", "phone", "subject", "message");
        ContactUs::create($data);
        return back()->with("msg", "Your query has been submitted successfully.");
    }
}
