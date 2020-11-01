<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Booking;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_Review;
use App\Models\Product_Size;
use DB;

class ProductController extends Controller
{
    public function getCategories(Request $request){

        $data = $request->all();
        $limit = isset($data['category_limit']) ? $data['category_limit'] : 6;

        $categories = Category::paginate($limit);

        return response()->json(['categories'=>$categories]);

    }//end of getCategories

    public function getProduct(Request $request){

        $data = $request->all();
        $product_id = isset($data['product_id']) ? $data['product_id'] : 0;

        $product = Product::where('id',$product_id)->first();

        if(!empty($product)){

            $transformProduct = $this->stransformProduct($product);

            return response()->json(['status'=>'success','product'=>$transformProduct]);
        }else{
            return response()->json(['status'=>'error',
            'masg'=>'Product not found.','product'=>null]);
        }

    }//end of getProduct

    private function stransformProduct ($product)
    {

        $result =  $this->getProdcutRating($product['id']);
        return [
            'id'        => $product['id'],
            'name'        => $product['name'],
            'price_per_month'        => $product['price_per_month'],
            'currency'        => $product['currency'],
            'price_36_month'        => $product['price_36_month'],
            'refundable_deposit'        => $product['refundable_deposit'],
            'category_id'        => $product['category_id'],
            'image'        => $product['image'],
            'size'=> Product_Size::where('product_id',$product['id'])->get(['id','size']),
            'rating'=>$result['ratings'],
            'reviews'=>$result['total_records'],
            'star_rating'=>round($result['product_rating'],1),
            'total_booking'=>Booking::where('product_id',$product['id'])->count(),
        ];
    }//end of stransform

    public function getProdcutRating($product_id){
        $result = null;

        $orders = DB::table('product_reviews')
                ->select('product_reviews.id','product_reviews.product_id'
                , DB::raw('SUM(product_reviews.rating) as ratings')
                ,DB::raw('count(product_reviews.id) as total_records')
                ,DB::raw('SUM(product_reviews.rating)/COUNT(product_reviews.id) as product_rating'))
                ->where('product_reviews.product_id',$product_id)
                ->groupBy('product_id')
                ->get();

        if(count($orders) > 0){
            $result['ratings'] = $orders[0]->ratings;
            $result['total_records'] = $orders[0]->total_records;
            $result['product_rating'] = $orders[0]->product_rating;

        }

        return $result;

    }//end of get product rating

    public function searchProducts(Request $request){

        $data = $request->all();
        $name = isset($data['search_name']) ? $data['search_name'] : null;

        $products = Product::where('name', 'like', '%' . $name . '%')->get();

        return response()->json(['products'=>$products]);

    }//end of searchProducts

    public function bookProduct(Request $request){

        $data = $request->all();
        $product_id = isset($data['product_id']) ? $data['product_id'] : 0;
        $data['price_per_month'] = isset($data['price']) ? $data['price'] : 0;

        $products = Booking::create($data);

        return response()->json(['status'=>'success','masg'=>'Successfull booked the product']);

    }//end of bookProduct

    public function trendingProduct(Request $request){

        $data = $request->all();
        $trending_products = array();

        $products = Product::select(DB::raw('products.*, count(*) as `aggregate`'))
        ->join('bookings', 'products.id', '=', 'bookings.product_id')
        ->groupBy('products.id')
        ->orderBy('aggregate', 'desc')
        ->get();

        $products = Product::get();

        foreach($products as $key=>$product){
            $trending_products[] = $this->stransformProduct($product);
        }//end of loop

        $key = 'total_booking';
        usort($trending_products,function ($a, $b){
            return $a['total_booking'] < $b['total_booking'] ? 1 : -1;
        });

        return response()->json(['products'=>$trending_products]);
    }//end of trendingProduct

    public function product_sort($a, $b){
        return $a->total_booking > $b->total_booking;
    }//end of product_sort
}
