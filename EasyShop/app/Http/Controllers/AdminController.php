<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\products;
use Illuminate\Http\Request;
use Storage;
use App\pro_cat;
use Image;
use App\products_properties;
use App\User;

class AdminController extends Controller {

    public function index() {
      $data = DB::table('orders')
      ->where('orders.status', 'canceled')
      ->get();

      $data2 = DB::table('orders')
      ->where('orders.status', 'approved')
      ->get();

      $data3 = DB::table('orders')
      ->where('orders.status', 'pending')
      ->get();
    return view('admin.index', compact('data', 'data2', 'data3'));
    }

    public function addpro_form(){
      $cat_data = DB::table('pro_cat')->get();

      return view('admin.home', compact('cat_data'));
    }

    public function add_product(Request $request) {
        $this->validate($request, [
            'pro_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pro_name' => 'required',
            'pro_price' => 'required|numeric',
            'pro_info' => 'required',]);

        $file = $request->file('pro_img');

        $filename = time() . '.' . $file->getClientOriginalName();

        $S_path = base_path() . '/public/public/products/small';
        $M_path = base_path() . '/public/public/products/medium';
        $L_path = base_path() . '/public/public/products/large';

        $img = Image::make($file->getRealPath());
        //$img->crop(300, 150, 25, 25);
        $img->resize(100, 100)->save($S_path . '/' . $filename);
        $img->resize(500, 500)->save($M_path . '/' . $filename);
        $img->resize(1000, 1000)->save($L_path . '/' . $filename);

        $products = new products;
        $products->pro_name = $request->pro_name;
        $products->cat_id = $request->cat_id;
        $products->pro_code = $request->pro_code;
        $products->pro_price = $request->pro_price;
        $products->pro_info = $request->pro_info;
        $products->spl_price = $request->spl_price;
        $products->pro_img = $filename;
        $products->save();

        return back()->with('msg', 'Product Successfully Added!');

        //  return redirect()->action('AdminController@index')->with('status', 'Product Uploaded!');
    }

    public function view_products() {

        $Products = DB::table('pro_cat')
        ->rightJoin('products', 'products.cat_id', '=', 'pro_cat.id')
        ->orderBy('products.id', 'DESC')
        ->get(); // now we are fetching all products

        // dd($Products);


        return view('admin.products', compact('Products'));
    }

    public function add_cat() {

        return view('admin.addCat');
    }

    // add cat
    public function catForm(Request $request) {
        $pro_cat = new pro_cat;

        $pro_cat->name = $request->cat_name;
        $pro_cat->p_id = $request->p_id;
        $pro_cat->status = '0'; // by defalt enable
        $pro_cat->save();
        return redirect('/admin/categories')->with('msg-add', 'Category Successfully Added!');
    }

    // edit form for cat
    public function CatEditForm(Request $request) {
        $catid = $request->id;
        $cats = DB::table('pro_cat')
        ->where('id', $catid)
        ->get();
        return view('admin.CatEditForm', compact('cats'));
    }

    //update query to edit cat
    public function editCat(Request $request) {

        $catid = $request->id;
        $catName = $request->cat_name;
        $catP_id = $request->p_id;
        $status = $request->status;
        DB::table('pro_cat')->where('id', $catid)
        ->update(['name' => $catName, 'p_id' => $catP_id, 'status' => $status]);

        return redirect('/admin/categories')->with('msg-udt', 'Category Successfully Updated!');
    }

    public function view_cats() {

        $cats = DB::table('pro_cat')
        ->get();

        return view('admin.categories', compact('cats'));
    }

    public function ProductEditForm($id) {
        //$pro_id = $reqeust->id;
        $Products = DB::table('products')
        ->where('id', '=', $id)
        ->get(); // now we are fetching all products
        return view('admin.editPproducts', compact('Products'));
    }

    public function deleteProduct($id) {
        DB::table('products')
        ->where('id', '=', $id)
        ->delete();
        return back()->with('msg-dlt', 'Product Deleted!');
    }

    public function editProduct(Request $request) {

        $proid = $request->id;

        $pro_name = $request->pro_name;
        $cat_id = $request->cat_id;
        $pro_code = $request->pro_code;
        $pro_price = $request->pro_price;
        $pro_info = $request->pro_info;
        $spl_price = $request->spl_price;
        if($request->new_arrival =='NULL'){
          $new_arrival = '1';
        }else {
          $new_arrival = $request->new_arrival;
        }

        DB::table('products')
        ->where('id', $proid)
        ->update([
            'pro_name' => $pro_name,
            'cat_id' => $cat_id,
            'pro_code' => $pro_code,
            'pro_price' => $pro_price,
            'pro_info' => $pro_info,
            'spl_price' => $spl_price,
            'new_arrival' => $new_arrival

        ]);


        return redirect('/admin/products');
        //$Products = DB::table('pro_cat')->rightJoin('products','products.cat_id', '=', 'pro_cat.id')->get(); // now we are fetching all products
        //return view('admin.products', compact('Products'));
    }

    public function ImageEditForm($id) {

        $Products = DB::table('products')
        ->where('id', '=', $id)
        ->get(); // now we are fetching all products
        return view('admin.ImageEditForm', compact('Products'));
    }

    public function editProImage(Request $request) {
        $this->validate($request, [
          'new_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048']);
        $proid = $request->id;

        $file = $request->file('new_image');

        $filename = time() . '.' . $file->getClientOriginalName();

        $S_path = base_path() . '/public/public/products/small';
        $M_path = base_path() . '/public/public/products/medium';
        $L_path = base_path() . '/public/public/products/large';

        $img = Image::make($file->getRealPath());
        //$img->crop(300, 150, 25, 25);
        $img->resize(100, 100)->save($S_path . '/' . $filename);
        $img->resize(500, 500)->save($M_path . '/' . $filename);
        $img->resize(1000, 1000)->save($L_path . '/' . $filename);



       // $file->move($path, $filename);


        DB::table('products')->where('id', $proid)
        ->update(['pro_img' => $filename]);
        return redirect('/admin/ProductEditForm/'.$proid)->with('msg', 'Product Image Successfully Updated!');
        //echo 'done';
        //  $Products = DB::table('products')->get(); // now we are fetching all products
        //  return view('admin.products', compact('Products'));
    }

    //for delete cat
    public function deleteCat($id) {
        DB::table('pro_cat')
        ->where('id', '=', $id)
        ->delete();
        return redirect('/admin/categories')->with('msg-dlt', 'Category Successfully Deleted!');
    }

  public function sumbitProperty(Request $request){

    $properties = new products_properties;
    $properties->pro_id = $request->pro_id;
    $properties->size = $request->size;
    $properties->color = $request->color;
    $properties->p_price = $request->p_price;
    $properties->save();

    return redirect('/admin/ProductEditForm/'.$request->pro_id);

  }

  public function editProperty(Request $request){
         $uptProts = DB::table('products_properties')
          ->where('pro_id', $request->pro_id)
          ->where('id', $request->id)
          ->update($request->except('_token'));
          if($uptProts){
          return back()->with('msg', 'updated');
        }else {
        return back()->with('msg', 'check value again');
      }
  }

    public function addSale(Request $request){
      $salePrice = $request->salePrice;
      $pro_id = $request->pro_id;
      DB::table('products')
      ->where('id', $pro_id)
      ->update(['spl_price' => $salePrice]);
      echo 'added successfully';
    }

    public function addAlt($id){
      $proInfo = DB::table('products')
      ->where('id', $id)
      ->get();
      return view('admin.addAlt', compact('proInfo'));
    }

    public function submitAlt(Request $request){
     $file = $request->file('image');
      $filename  = time() . $file->getClientOriginalName(); // name of file

      $path = base_path() . '/public/img/alt_images';
      $file->move($path,$filename); // save to our local folder
      $proId = $request->pro_id;
      $add_lat = DB::table('alt_images')
      ->insert(['proId' => $proId, 'alt_img' => $filename, 'status' =>0]);
      return back();
    }

    public function users(){

      $usersData = DB::table('users')
      ->orderBy('id', 'DESC')
      ->get();
      return view('admin.users',compact('usersData', $usersData));
    }
      
    public function banUser(Request $request){
      $userId = $request->userID;
      $ban_val = $request->ban_val;

      $upd_role = DB::table('users')->where('id',$userId)
      ->update(['isBan' =>$ban_val]);

      if($upd_role){
        echo "Updated Successfully";
      }
    }
    public function addUser() {
      return view('admin.addUser');
    }
    public function add_user(Request $request){
      $this->validate($request, [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
        'phone' => 'required|numeric|digits:11',
        'password' => 'required|min:6',
      ]);

      $user = new User;
      $user->name = $request->name;
      $user->email = $request->email;
      $user->phone = $request->phone;
      
      $user->password = Hash::make($request->password);
      $user->admin = $request->admin;
      $user->save();

      return redirect('/admin/users')->with('msg-add', 'User Successfully Added!');
    }

    public function userEditForm($id) {
      $users = DB::table('users')
      ->where('id', '=', $id)
      ->get(); 
        return view('admin.userEditForm', compact('users', $users));
    }
    public function editUser(Request $request){

        $this->validate($request, [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|numeric|digits:11',
        'password' => 'required|min:6',
      ]);
        // dd($request->name);
        $user_id = $request->id;
        $user_name = $request->name;
        $user_email = $request->email;
        $user_phone = $request->phone;
        $user_password = Hash::make($request->password);
        $user_admin = $request->admin;
        

        DB::table('users')
        ->where('id', $user_id)
        ->update([
            'name' => $user_name,
            'email' => $user_email,
            'phone' => $user_phone,
            'password' => $user_password,
            'admin' => $user_admin,
        ]);

        return redirect('/admin/users')->with('msg', 'User Successfully Updated');
    }

    public function deleteUser($id){
      $users = DB::table('users')
      ->where('id', '=', $id)
      ->delete(); 
      return redirect('/admin/users')->with('msg-dlt', 'User Successfully Deleted');
    }

    // public function import_products(Request $request){
    //   $this->validate($request,[
    //     'file' => 'required|mimes:csv,txt'
    //   ]);

    //   if(($handle = fopen($_FILES['file']['tmp_name'],"r")) !== FALSE){
    //     fgetcsv($handle); // remove first row of excel file such as product name,price,code

    //     while(($data = fgetcsv($handle,1000,",")) !==FALSE){

    //     $addPro =  DB::table('products')->insert([
    //         'pro_name' => $data[0],
    //         'pro_code' => $data[1],
    //         'pro_info' => $data[2],
    //         'pro_img' => $data[3],
    //         'pro_price' => $data[4],
    //         'cat_id' => $data[5],
    //         'stock' => '10',
    //         'new_arrival' => '0',
    //         'spl_price' => '0',
    //         'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
    //         'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
    //        ]);
    //       return back();
    //     }
    //   }

    // }

    public function pending_orders() {

      $data = DB::table('orders')
      ->leftJoin('users', 'users.id', '=', 'orders.user_id')
      ->select('users.*', 'orders.*')
      ->where('orders.status', 'pending')
      ->orderBy('orders.created_at', 'DESC')
      ->get();
      // ->groupBy('created_at');
        // dd($data);
      return view('admin.pending_orders', compact('data'));
    }

    public function proPreview($id) {
      $data = DB::table('orders_products')
      ->leftJoin('orders', 'orders.id', '=', 'orders_products.orders_id')
      ->leftJoin('products', 'products.id', '=', 'orders_products.products_id')
      ->leftJoin('address', 'address.user_id', '=', 'orders.user_id')
      ->leftJoin('users', 'users.id', '=', 'orders.user_id')
      ->leftJoin('locations', 'locations.id', '=', 'address.address_id')
      ->leftJoin('provinces', 'provinces.id', '=', 'locations.province_id')
      ->select('users.*', 'address.*', 'products.*','locations.*','provinces.name', 'orders_products.*', 'orders.*')
      ->where('orders_products.orders_id', $id)
      ->get();

      // dd($data);
      return view('admin.product_view', compact('data'));
    }

    public function approveOrder($id) {
      DB::table('orders')->where('id', '=', $id)->update(['status' => 'approved']);
      return back()->with('msg-apr', 'Successfully Approved!');
    }
    public function approved_orders() {
      $data = DB::table('orders')
      ->leftJoin('users', 'users.id', '=', 'orders.user_id')
      ->select('users.*', 'orders.*')
      ->where('orders.status', 'approved')
      ->orderBy('orders.created_at', 'DESC')
      ->get();
      // ->groupBy('created_at');
        // dd($data);
      return view('admin.approved_orders', compact('data'));
    }

    public function printOrder($id) {
      $data = DB::table('orders_products')
      ->leftJoin('orders', 'orders.id', '=', 'orders_products.orders_id')
      ->leftJoin('products', 'products.id', '=', 'orders_products.products_id')
      ->leftJoin('address', 'address.user_id', '=', 'orders.user_id')
      ->leftJoin('users', 'users.id', '=', 'orders.user_id')
      ->leftJoin('locations', 'locations.id', '=', 'address.address_id')
      ->leftJoin('provinces', 'provinces.id', '=', 'locations.province_id')
      ->select('users.*', 'address.*', 'products.*','locations.*','provinces.name', 'orders_products.*', 'orders.*')
      ->where('orders_products.orders_id', $id)
      ->get();
      return view('admin.print_orders', compact('data'));
    }

    public function cancelOrder($id) {
      DB::table('orders')->where('id', '=', $id)
      ->update(['status' => 'canceled']);
      return back()->with('msg-cnl', 'Successfully Canceled!');
    }

    public function canceled_orders() {
      $data = DB::table('orders')
      ->leftJoin('users', 'users.id', '=', 'orders.user_id')
      ->select('users.*', 'orders.*')
      ->where('orders.status', 'canceled')
      ->orderBy('orders.created_at', 'DESC')
      ->get();
      return view('admin.canceled_orders', compact('data'));
    }

    public function deleteOrder($id) {
      DB::table('orders')
      ->where('id', '=', $id)
      ->delete();
      DB::table('orders_products')
      ->where('orders_id', '=', $id)
      ->delete();
      // orders_products::deleteOrderFields($id);

      return back()->with('msg-dlt', 'Successfully Deleted!');
    }

    public function sales() {
      // dd(\Carbon\Carbon::today()->toDateTimeString());
      $sales = DB::table('orders_products')
      ->leftJoin('products', 'products.id', '=', 'orders_products.products_id')
      ->leftJoin('orders', 'orders.id', '=', 'orders_products.orders_id')
      ->select('products.*', 'orders.created_at', 'orders_products.*')
      ->where('orders.created_at', '>=', \Carbon\Carbon::today()->startOfDay())
      ->where('orders.created_at', '<=', \Carbon\Carbon::today()->endOfDay())
      ->get();
      // dd($sales);
      return view('admin.sales', compact('sales'));
    }

    public function profile() {
      $profile = DB::table('users')
      ->where('id', '=', Auth::user()->id)
      ->get();
      return view('admin.profile', compact('profile'));
    }

    public function editProfile(Request $request) {
      $this->validate($request, [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|numeric|digits:11',
      ]);
        // dd($request->name);
        $user_id = $request->id;
        $user_name = $request->name;
        $user_email = $request->email;
        $user_phone = $request->phone;
        

        DB::table('users')
        ->where('id', $user_id)
        ->update([
            'name' => $request->name,
            'email' => $user_email,
            'phone' => $user_phone,
        ]);

        return back()->with('msg', 'Profile Successfully Updated!');
    }

    public function updatePassword(Request $request) {
      $oldPassword = $request->oldPassword;
        $newPassword = $request->newPassword;


        if(!Hash::check($oldPassword, Auth::user()->password)){
          return back()->with('msg', 'Password Does Not Match The In The Record'); //when user enter wrong password as current password

        }else{
            $request->user()->fill(['password' => Hash::make($newPassword)])->save(); //updating password into user table
           return back()->with('msg', 'Password Updated');
        }
    }


}
