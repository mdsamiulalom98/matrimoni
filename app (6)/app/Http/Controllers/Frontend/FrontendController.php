<?php

namespace App\Http\Controllers\Frontend;

use shurjopayv2\ShurjopayLaravelPackage8\Http\Controllers\ShurjopayController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Childcategory;
use App\Models\Product;
use App\Models\District;
use App\Models\CreatePage;
use App\Models\Campaign;
use App\Models\Banner;
use App\Models\CouponCode;
use App\Models\ShippingCharge;
use App\Models\Customer;
use App\Models\OrderDetails;
use App\Models\ProductVariable;
use App\Models\Payment;
use App\Models\Order;
use App\Models\Review;
use App\Models\Brand;
use App\Models\Monthname;
use App\Models\Education;
use App\Models\Religion;
use App\Models\Profession;
use App\Models\Country;
use App\Models\Division;
use App\Models\Upazila;
use App\Models\Member;
use App\Models\FavoriteMember;
use App\Models\ProposalRequest;
use App\Models\MemberView;
use App\Models\Appointment;
use Cache;
use DB;
use Log;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Banner::where(['status' => 1, 'category_id' => 1])
            ->select('id', 'image', 'link')
            ->get();

        $sliderrightads = Banner::where(['status' => 1, 'category_id' => 1])
            ->select('id', 'image', 'link')
            ->limit(1)
            ->first();

        $hotdeal_top = Product::where(['status' => 1, 'topsale' => 1])
            ->orderBy('id', 'DESC')
            ->select('id', 'name', 'slug', 'new_price', 'old_price', 'type', 'category_id')
            ->withCount('variable')
            ->limit(12)
            ->get();

        $homecategory = Category::where(['front_view' => 1, 'status' => 1])
            ->select('id', 'name', 'slug', 'front_view', 'status')
            ->orderBy('id', 'ASC')
            ->get();

        $brands = Brand::where(['status' => 1])
            ->orderBy('id', 'ASC')
            ->get();

        $months = Monthname::all();
        $religions = Religion::where('status', 1)->get();
        $educations = Education::where('status', 1)->get();
        $professions = Profession::where('status', 1)->get();
        $countries = Country::where('status', 1)->get();
        $divisions = Division::where('status', 1)->get();
        $districts = District::where('status', 1)->get();
        $upazilas = Upazila::where('status', 1)->get();
        return view('frontEnd.layouts.pages.index', compact('sliders', 'hotdeal_top', 'homecategory', 'sliderrightads', 'brands', 'months', 'religions', 'educations', 'professions', 'countries', 'divisions', 'districts', 'upazilas'));

    }

    public function category($slug, Request $request)
    {
        $category = Category::where(['slug' => $slug, 'status' => 1])->first();
        $products = Product::where(['status' => 1, 'category_id' => $category->id])
            ->select('id', 'name', 'slug', 'new_price', 'old_price', 'type', 'category_id')->withCount('variable');
        if ($request->sort == 1) {
            $products = $products->orderBy('created_at', 'desc');
        } elseif ($request->sort == 2) {
            $products = $products->orderBy('created_at', 'asc');
        } elseif ($request->sort == 3) {
            $products = $products->orderBy('new_price', 'desc');
        } elseif ($request->sort == 4) {
            $products = $products->orderBy('new_price', 'asc');
        } elseif ($request->sort == 5) {
            $products = $products->orderBy('name', 'asc');
        } elseif ($request->sort == 6) {
            $products = $products->orderBy('name', 'desc');
        } else {
            $products = $products->latest();
        }
        $products = $products->paginate(30)->withQueryString();
        return view('frontEnd.layouts.pages.category', compact('category', 'products'));
    }

    public function subcategory($slug, Request $request)
    {
        $subcategory = Subcategory::where(['slug' => $slug, 'status' => 1])->first();
        $products = Product::where(['status' => 1, 'subcategory_id' => $subcategory->id])
            ->select('id', 'name', 'slug', 'new_price', 'old_price', 'type', 'category_id', 'subcategory_id')->withCount('variable');
        // return $request->sort;
        if ($request->sort == 1) {
            $products = $products->orderBy('created_at', 'desc');
        } elseif ($request->sort == 2) {
            $products = $products->orderBy('created_at', 'asc');
        } elseif ($request->sort == 3) {
            $products = $products->orderBy('new_price', 'desc');
        } elseif ($request->sort == 4) {
            $products = $products->orderBy('new_price', 'asc');
        } elseif ($request->sort == 5) {
            $products = $products->orderBy('name', 'asc');
        } elseif ($request->sort == 6) {
            $products = $products->orderBy('name', 'desc');
        } else {
            $products = $products->latest();
        }

        $products = $products->paginate(30)->withQueryString();

        return view('frontEnd.layouts.pages.subcategory', compact('subcategory', 'products'));
    }

    public function products($slug, Request $request)
    {
        $childcategory = Childcategory::where(['slug' => $slug, 'status' => 1])->first();
        $products = Product::where(['status' => 1, 'childcategory_id' => $childcategory->id])->with('category')
            ->select('id', 'name', 'slug', 'new_price', 'old_price', 'type', 'category_id', 'subcategory_id', 'childcategory_id')->withCount('variable');

        if ($request->sort == 1) {
            $products = $products->orderBy('created_at', 'desc');
        } elseif ($request->sort == 2) {
            $products = $products->orderBy('created_at', 'asc');
        } elseif ($request->sort == 3) {
            $products = $products->orderBy('new_price', 'desc');
        } elseif ($request->sort == 4) {
            $products = $products->orderBy('new_price', 'asc');
        } elseif ($request->sort == 5) {
            $products = $products->orderBy('name', 'asc');
        } elseif ($request->sort == 6) {
            $products = $products->orderBy('name', 'desc');
        } else {
            $products = $products->latest();
        }

        $products = $products->paginate(30)->withQueryString();

        return view('frontEnd.layouts.pages.childcategory', compact('childcategory', 'products'));
    }

    public function searchMember() {
        return view('frontEnd.layouts.pages.search');
    }

    public function affiliate_policy() {
        return view('frontEnd.layouts.pages.affiliate_policy');
    }

    public function notification() {
        return view('frontEnd.layouts.pages.notification');
    }

    public function getAppointment() {
        return view('frontEnd.layouts.pages.appointment');
    }
    
    public function storeAppointment(Request $request) {
        $store                     = new Appointment();
        $store->name               = $request->name;
        $store->phone              = $request->phone;
        $store->email              = $request->email;
        $store->preferred_date     = $request->date;
        $store->preferred_time     = $request->time;
        $store->message            = $request->message;
        $store->address            = $request->address;
        $store->status             = 'pending';
        $store->save();
        Toastr::success('Appointment Stored Successfully');
        return redirect()->back();
    }

    public function getUpazilas(Request $request)
    {
        $upazilas = Upazila::where('district_id', $request->id)->select('id', 'name')->get();
        return response()->json($upazilas);
    }

    public function members(Request $request)
    {
        $members = Member::where(['publish' => 1]);
        if (Auth::guard('member')->check()) {
            $members = $members->where('id', '!=', Auth::guard('member')->user()->id);
        }
        if ($request->age_min && $request->age_max) {
            $members = $members->whereHas('memberinfo', function ($query) use ($request) {
                $query->whereBetween('age', [$request->age_min, $request->age_max]);
            });
        }
        if ($request->religion) {
            $members = $members->whereHas('memberinfo', function ($query) use ($request) {
                $query->where('religion_id', $request->religion);
            });
        }
        if ($request->district) {
            $members = $members->whereHas('memberlocation', function ($query) use ($request) {
                $query->where('present_district', $request->district);
            });
        }
        if ($request->gender) {
            $members = $members->where(function ($query) use ($request) {
                switch ($request->gender) {
                    case 'bride':
                        $query->where('gender', 2);
                        break;
                    case 'groom':
                        $query->where('gender', 1);
                        break;
                    default:
                        // Handle unexpected gender values if needed
                        break;
                }
            });
        }


        $members = $members->limit(18)->get();
        // return $members;

        $months = Monthname::all();
        $religions = Religion::where('status', 1)->get();
        $educations = Education::where('status', 1)->get();
        $professions = Profession::where('status', 1)->get();
        $countries = Country::where('status', 1)->get();
        $divisions = Division::where('status', 1)->get();
        $districts = District::where('status', 1)->get();
        $upazilas = Upazila::where('status', 1)->get();
        // return $divisions;
        return view('frontEnd.layouts.pages.members', compact('members', 'months', 'religions', 'educations', 'professions', 'countries', 'divisions', 'districts', 'upazilas'));
    }

    public function packages()
    {
        $products = Product::where(['status' => 1])->limit(10)->get();

        return view('frontEnd.layouts.pages.packages', compact('products'));
    }
    public function joinAgent()
    {
        $products = Product::where(['status' => 1])->limit(10)->get();

        return view('frontEnd.layouts.pages.agentform', compact('products'));
    }
    public function aboutUs()
    {
        return view('frontEnd.layouts.pages.about');
    }

    public function bestdeals(Request $request)
    {

        $products = Product::where(['status' => 1, 'topsale' => 1])
            ->orderBy('id', 'DESC')
            ->select('id', 'name', 'slug', 'new_price', 'old_price', 'type')
            ->withCount('variable');

        if ($request->sort == 1) {
            $products = $products->orderBy('created_at', 'desc');
        } elseif ($request->sort == 2) {
            $products = $products->orderBy('created_at', 'asc');
        } elseif ($request->sort == 3) {
            $products = $products->orderBy('new_price', 'desc');
        } elseif ($request->sort == 4) {
            $products = $products->orderBy('new_price', 'asc');
        } elseif ($request->sort == 5) {
            $products = $products->orderBy('name', 'asc');
        } elseif ($request->sort == 6) {
            $products = $products->orderBy('name', 'desc');
        } else {
            $products = $products->latest();
        }
        $products = $products->paginate(30)->withQueryString();

        return view('frontEnd.layouts.pages.bestdeals', compact('products'));
    }


    public function details($id)
    {
        $details = Member::where(['id' => $id, 'status' => 1])
            ->firstOrFail();

        $memberId = Auth::guard('member')->user()->id;
        $memberIds = Session::get('memberIds', []);
        if (!in_array($memberId, $memberIds)) {
            $memberIds[] = $memberId;
            Session::put('memberIds', $memberIds);
        }
        // Check if the view already exists
        $alreadyViewed = MemberView::where('member_id', $memberId)->where('view_id', $id)->exists();
    
        if (!$alreadyViewed) {
            // Store new view
            MemberView::create([
                'member_id' => $memberId,
                'view_id' => $id,
            ]);
        }
        return view('frontEnd.member.details', compact('details'));
    }

    

  
    public function livesearch(Request $request)
    {
        $products = Product::select('id', 'name', 'slug', 'new_price', 'old_price', 'type')
            ->withCount('variable')
            ->where('status', 1)
            ->with('image');
        if ($request->keyword) {
            $products = $products->where('name', 'LIKE', '%' . $request->keyword . "%");
        }
        if ($request->category) {
            $products = $products->where('category_id', $request->category);
        }
        $products = $products->get();

        if (empty($request->category) && empty($request->keyword)) {
            $products = [];
        }
        return view('frontEnd.layouts.ajax.search', compact('products'));
    }
    public function search(Request $request)
    {
        $products = Product::select('id', 'name', 'slug', 'new_price', 'old_price', 'type')
            ->withCount('variable')
            ->where('status', 1)
            ->with('image');
        if ($request->keyword) {
            $products = $products->where('name', 'LIKE', '%' . $request->keyword . "%");
        }
        if ($request->category) {
            $products = $products->where('category_id', $request->category);
        }
        $products = $products->paginate(36);
        $keyword = $request->keyword;
        return view('frontEnd.layouts.pages.search', compact('products', 'keyword'));
    }


    public function shipping_charge(Request $request)
    {
        if ($request->id == NULL) {
            Session::put('shipping', 0);
        } else {
            $shipping = ShippingCharge::where(['id' => $request->id])->first();
            Session::put('shipping', $shipping->amount);
        }
        if ($request->campaign == 1) {
            $data = Cart::instance('shopping')->content();
            return view('frontEnd.layouts.ajax.cart_camp', compact('data'));
        }
        return view('frontEnd.layouts.ajax.cart');
    }


    public function contact(Request $request)
    {
        return view('frontEnd.layouts.pages.contact');
    }

    public function page($slug)
    {
        $page = CreatePage::where('slug', $slug)->firstOrFail();
        return view('frontEnd.layouts.pages.page', compact('page'));
    }
    public function districts(Request $request)
    {
        $areas = District::where(['district' => $request->id])->pluck('name', 'id');
        return response()->json($areas);
    }
    public function campaign($slug, Request $request)
    {

        $campaign = Campaign::where('slug', $slug)->with('images')->first();
        $product = Product::select('id', 'name', 'slug', 'new_price', 'old_price', 'purchase_price', 'type', 'stock')->where(['id' => $campaign->product_id])->first();
        $productcolors = ProductVariable::where('product_id', $campaign->product_id)->where('stock', '>', 0)
            ->whereNotNull('color')
            ->select('color')
            ->distinct()
            ->get();

        $productsizes = ProductVariable::where('product_id', $campaign->product_id)->where('stock', '>', 0)
            ->whereNotNull('size')
            ->select('size')
            ->distinct()
            ->get();

        Cart::instance('shopping')->destroy();

        $var_product = ProductVariable::where(['product_id' => $campaign->product_id])->first();
        if ($product->type == 0) {
            $purchase_price = $var_product ? $var_product->purchase_price : 0;
            $old_price = $var_product ? $var_product->old_price : 0;
            $new_price = $var_product ? $var_product->new_price : 0;
            $stock = $var_product ? $var_product->stock : 0;
        } else {
            $purchase_price = $product->purchase_price;
            $old_price = $product->old_price;
            $new_price = $product->new_price;
            $stock = $product->stock;
        }

        $qty = 1;
        $cartitem = Cart::instance('shopping')->content()->where('id', $product->id)->first();

        Cart::instance('shopping')->add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $qty,
            'weight' => 1,
            'price' => $new_price,
            'options' => [
                'slug' => $product->slug,
                'image' => $product->image->image,
                'old_price' => $new_price,
                'purchase_price' => $purchase_price,
                'product_size' => $request->product_size,
                'product_color' => $request->product_color,
                'type' => $product->type
            ],
        ]);
        $shippingcharge = ShippingCharge::where('status', 1)->get();
        $select_charge = ShippingCharge::where('status', 1)->first();
        Session::put('shipping', $select_charge->amount);
        return view('frontEnd.layouts.pages.campaign.campaign' . $campaign->template, compact('campaign', 'productsizes', 'productcolors', 'shippingcharge', 'old_price', 'new_price'));


    }
    

    public function payment_success(Request $request)
    {
        $order_id = $request->order_id;
        $shurjopay_service = new ShurjopayController();
        $json = $shurjopay_service->verify($order_id);
        $data = json_decode($json);

        if ($data[0]->sp_code != 1000) {
            Toastr::error('Your payment failed, try again', 'Oops!');
            if ($data[0]->value1 == 'customer_payment') {
                return redirect()->route('home');
            } else {
                return redirect()->route('home');
            }
        }

        if ($data[0]->value1 == 'customer_payment') {

            $customer = Customer::find(Auth::guard('customer')->user()->id);

            // order data save
            $order = new Order();
            $order->invoice_id = $data[0]->id;
            $order->amount = $data[0]->amount;
            $order->customer_id = Auth::guard('customer')->user()->id;
            $order->order_status = $data[0]->bank_status;
            $order->save();

            // payment data save
            $payment = new Payment();
            $payment->order_id = $order->id;
            $payment->customer_id = Auth::guard('customer')->user()->id;
            $payment->payment_method = 'shurjopay';
            $payment->amount = $order->amount;
            $payment->trx_id = $data[0]->bank_trx_id;
            $payment->sender_number = $data[0]->phone_no;
            $payment->payment_status = 'paid';
            $payment->save();
            // order details data save
            foreach (Cart::instance('shopping')->content() as $cart) {
                $order_details = new OrderDetails();
                $order_details->order_id = $order->id;
                $order_details->product_id = $cart->id;
                $order_details->product_name = $cart->name;
                $order_details->purchase_price = $cart->options->purchase_price;
                $order_details->sale_price = $cart->price;
                $order_details->qty = $cart->qty;
                $order_details->save();
            }

            Cart::instance('shopping')->destroy();
            Toastr::error('Thanks, Your payment send successfully', 'Success!');
            return redirect()->route('home');
        }

        Toastr::error('Something wrong, please try agian', 'Error!');
        return redirect()->route('home');
    }
    public function payment_cancel(Request $request)
    {
        $order_id = $request->order_id;
        $shurjopay_service = new ShurjopayController();
        $json = $shurjopay_service->verify($order_id);
        $data = json_decode($json);

        Toastr::error('Your payment cancelled', 'Cancelled!');
        if ($data[0]->sp_code != 1000) {
            if ($data[0]->value1 == 'customer_payment') {
                return redirect()->route('home');
            } else {
                return redirect()->route('home');
            }
        }
    }




    // DB::listen(function ($query) {
    //     Log::channel('test_log')->info('===== started db query ========================================');
    //     Log::channel('test_log')->info(json_encode([
    //         'sql' => $query->sql,
    //         'time' => $query->time . ' ms',
    //         'bindings' => $query->bindings,
    //         'connection' => $query->connection,
    //         'connectionName' => $query->connectionName,
    //     ]));
    // });
    public function login()
    {
        return view('frontEnd.member.login');
    }

    public function register()
    {
        $months = Monthname::all();
        $religions = Religion::where('status', 1)->get();
        $educations = Education::where('status', 1)->get();
        $professions = Profession::where('status', 1)->get();
        $countries = Country::where('status', 1)->get();
        $divisions = Division::where('status', 1)->get();
        $districts = District::where('status', 1)->get();
        $upazilas = Upazila::where('status', 1)->get();
        return view('frontEnd.member.register',compact('months', 'religions', 'educations', 'professions', 'countries', 'divisions', 'districts', 'upazilas'));
    }

    public function agent_login()
    {
        return view('frontEnd.agent.login');
    }
    public function register_online()
    {
        $months = Monthname::all();
        $religions = Religion::where('status', 1)->get();
        $educations = Education::where('status', 1)->get();
        $professions = Profession::where('status', 1)->get();
        $countries = Country::where('status', 1)->get();
        $divisions = Division::where('status', 1)->get();
        $districts = District::where('status', 1)->get();
        $upazilas = Upazila::where('status', 1)->get();
        return view('frontEnd.member.registerOnline', compact('months', 'religions', 'educations', 'professions', 'countries', 'divisions', 'districts', 'upazilas'));
    }

    public function register_ofline()
    {
        $months = Monthname::all();
        $religions = Religion::where('status', 1)->get();
        $educations = Education::where('status', 1)->get();
        $professions = Profession::where('status', 1)->get();
        $countries = Country::where('status', 1)->get();
        $divisions = Division::where('status', 1)->get();
        $districts = District::where('status', 1)->get();
        $upazilas = Upazila::where('status', 1)->get();
        return view('frontEnd.member.registerOfline', compact('months', 'religions', 'educations', 'professions', 'countries', 'divisions', 'districts', 'upazilas'));
    }
    public function recentlyViews()
    {
        $memberId = Auth::guard('member')->user()->id;
        $memberIds = MemberView::where('member_id', $memberId)->pluck('view_id')->toArray();
        $members = Member::whereIn('id', $memberIds)->where('publish', 1)->orderBy('id', 'desc')->get();
        // return $members;
        return view('frontEnd.layouts.pages.recentlyViews', compact('members'));
    }
    public function myProfileViews()
    {
        $memberId = Auth::guard('member')->user()->id;
        $memberIds = MemberView::where('view_id', $memberId)->pluck('view_id')->toArray();
        $members = Member::whereIn('id', $memberIds)->where('publish', 1)->orderBy('id', 'desc')->get();
        // return $members;
        return view('frontEnd.layouts.pages.myProfileViews', compact('members'));
    }
    
    public function favorites() {
        $favorites = FavoriteMember::where('member_id', Auth::guard('member')->user()->id)
            ->pluck('favorite_id')
            ->toArray();

        $members = Member::where(['publish' => 1])->whereIn('id', $favorites);
        if (Auth::guard('member')->check()) {
            $members = $members->where('id', '!=', Auth::guard('member')->user()->id);
        }

        $members = $members->limit(18)->get();
        // return $members;
        
        return view('frontEnd.layouts.pages.favorite', compact('members'));
    
    }    
    public function proposals() {
        $proposals = ProposalRequest::where('sender_id', Auth::guard('member')->user()->id)
            ->pluck('receiver_id')
            ->toArray();
        $members = Member::where(['publish' => 1])->whereIn('id', $proposals);
        if (Auth::guard('member')->check()) {
            $members = $members->where('id', '!=', Auth::guard('member')->user()->id);
        }

        $members = $members->limit(18)->get();
        // return $members;
        
        return view('frontEnd.layouts.pages.proposal', compact('members'));
    }
    public function user_login(Request $request)
    {
        $request->validate([
            'phone' => 'required|digits:11',
            'password' => 'required',
        ]);
        $isAgent = $request->has('is_agent'); // Checkbox check

        $guard = $isAgent ? 'agent' : 'member';
        $model = $isAgent ? \App\Models\Agent::class : \App\Models\Member::class;
        $user = $model::where('phone', $request->phone)->first();

        if ($user) {
            if ($user->status != 1) {
                Toastr::success('আপনার অ্যাকাউন্ট স্থগিত করা হয়েছে');
                Session::put('phoneverify', $user->phone);
                $redirectRoute = $isAgent ? 'agent.account' : 'members';
                return redirect()->route($redirectRoute);
            } else {
                $credentials = ['phone' => $request->phone, 'password' => $request->password];
                
                if (Auth::guard($guard)->attempt($credentials)) {
                    Toastr::success('আপনি লগিন সফল হয়েছে');
                    if (Cart::instance('wishlist')->count() > 0) {
                        return redirect()->route('wishlist');
                    }
                    $redirectRoute = $isAgent ? 'agent.account' : 'members';
                    return redirect()->route($redirectRoute);
                } else {
                    Toastr::error('ভুল পাসওয়ার্ড !');
                    return redirect()->back();
                }
            }
        } else {
            Toastr::error('আপনার কোন একাউন্ট নেই');
            return redirect()->back();
        }
    }
    
}
