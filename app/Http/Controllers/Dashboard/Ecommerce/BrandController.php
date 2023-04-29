<?php

namespace App\Http\Controllers\Dashboard\Ecommerce;

use App\Models\Ecommerce\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
	/**
     * Display a table of the Brands resource.
	 * Show the form for New Brand creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function brandsListAdd()
    {
    	$brandsList = Brand::latest()->get();
		$brandArchivedList = Brand::onlyTrashed()->get();
    	return view('dashboard.ecommerce.brand.brand-add-list',compact('brandsList', 'brandArchivedList'));

    }

	/**
     * Display a table of the Brands resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function brandsChartList()
    {
    	$brandsChart = Brand::latest()->get();
    	return view('dashboard.ecommerce.brand.brand-chart-list',compact('brandsChart'));

    }

	/**
     * Display a table of the Brands resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function brandsGridDetail()
    {
    	$brandsGrid = Brand::latest()->get();
    	return view('dashboard.ecommerce.brand.brand-grid-detail',compact('brandsGrid'));

    }

	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeBrand(Request $request)
    {
    	$request->validate([
    		'brand_name' => 'required|unique:brands|min:2|max:56',
			'brand_logo' => 'required',
    		'brand_description_ua' => 'required|max:1000',
            'brand_description_ru' => 'required|max:1000',
    		
    	],[
    		'brand_name.required' => 'Будь ласка введіть назву Бренду!',
            'brand_name.unique' => 'Введена вами назва Бренду не є унікальною. Введіть іншу назву!',
    		'brand_name.min' => 'Введена вами назва Бренду коротша двох символів. Введіть назву довшу ніж два символи!',
            'brand_name.max' => 'Введена вами назва Бренду довша ніж 56 символів. Введіть назву коротшу ніж 56 символів!',
			'brand_logo.required' => 'Будь ласка додайте "Логотип" Бренду!',
            'brand_description_ua.required' => 'Будь ласка введіть короткий опис Бренду українською!',
            'brand_description_ua.max' => 'Введена вами назва Бренду довша ніж 1000 символів. Введіть назву коротшу ніж 1000 символів!',
            'brand_description_ru.required' => 'Будь ласка введіть короткий опис Бренду на російській мові!',
            'brand_description_ru.max' => 'Введена вами назва Бренду довша ніж 1000 символів. Введіть назву коротшу ніж 1000 символів!',
            
    	]);

    	$image = $request->file('brand_logo');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(100,100)->save('upload/ecommerce/brand/'.$name_gen);
    	$save_url = 'upload/ecommerce/brand/'.$name_gen;

		Brand::insert([
			'brand_name' => $request->brand_name,
			'brand_slug' => strtolower(str_replace(' ', '-',$request->brand_name)),
			'brand_logo' => $save_url,
			'brand_description_ua' => $request->brand_description_ua,
			'brand_description_ru' => $request->brand_description_ru,
			'brand_touches' => '0',
			'brand_rated' => '0',
			'created_at' => Carbon::now(),

    	]);

	    $notification = array(
			'message' => 'Новий Бренд було успішно додано до бази даних!',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end "storeBrand" method 

	/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editBrand($id)
	{
    	$brandEdit = Brand::findOrFail($id);
    	return view('dashboard.ecommerce.brand.brand-edit-form',compact('brandEdit'));

    }

	 /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function updateBrand(Request $request)
	{  	
    	$request->validate([
    		'brand_name' => 'required|min:2|max:56',
			// 'brand_logo' => 'required',
    		'brand_description_ua' => 'required|max:1000',
            'brand_description_ru' => 'required|max:1000',
    		
    	],[
    		'brand_name.required' => 'Будь ласка введіть назву Бренду!',
    		'brand_name.min' => 'Введена вами назва Бренду коротша двох символів. Введіть назву довшу ніж два символи!',
            'brand_name.max' => 'Введена вами назва Бренду довша ніж 56 символів. Введіть назву коротшу ніж 56 символів!',
			// 'brand_logo.required' => 'Будь ласка додайте "Логотип" Бренду!',
            'brand_description_ua.required' => 'Будь ласка введіть короткий опис Бренду українською!',
            'brand_description_ua.max' => 'Введена вами назва Бренду довша ніж 1000 символів. Введіть назву коротшу ніж 1000 символів!',
            'brand_description_ru.required' => 'Будь ласка введіть короткий опис Бренду на російській мові!',
            'brand_description_ru.max' => 'Введена вами назва Бренду довша ніж 1000 символів. Введіть назву коротшу ніж 1000 символів!',
            
    	]);

		$brand_id = $request->id;
    	$old_logo = $request->old_logo;

		// dd($old_logo);

    	if ($request->file('brand_logo')) {
	
			$image = $request->file('brand_logo');
			$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
			Image::make($image)->resize(300,400)->save('upload/ecommerce/brand/'.$name_gen);
			$save_url = 'upload/ecommerce/brand/'.$name_gen;

			if(file_exists($old_logo)){
				unlink($old_logo);
			}

			Brand::findOrFail($brand_id)->update([
				'brand_name' => $request->brand_name,
				'brand_slug' => strtolower(str_replace(' ', '-',$request->brand_name)),
				'brand_logo ' => $save_url,
				'brand_description_ua' => $request->brand_description_ua,
				'brand_description_ru' => $request->brand_description_ru,
				'updated_at' => Carbon::now(),

    		]);

			$notification = array(
				'message' => 'Картка Бренда успішно редаговано зі зміною "Логотипа".',
				'alert-type' => 'primary'
			);

			return redirect()->route('brands.list-add')->with($notification);

    	} else {

			Brand::findOrFail($brand_id)->update([
			'brand_name' => $request->brand_name,
			'brand_slug' => strtolower(str_replace(' ', '-',$request->brand_name)),
			'brand_description_ua' => $request->brand_description_ua,
			'brand_description_ru' => $request->brand_description_ru,
			'updated_at' => Carbon::now(),
			
			]);

			$notification = array(
				'message' => 'Картка Бренда успішно редаговано без зміни "Логотипа".',
				'alert-type' => 'info'
			);

			return redirect()->route('brands.list-add')->with($notification);

			} // end else 

    } // end "updateBrand" method 

    public function archiveBrand($id)
	{	
		Brand::findOrFail($id)->delete();

		$notification = array(
			'message' => 'Категорію було переміщено до архіву!',
			'alert-type' => 'warning'
		);
		return redirect()->back()->with($notification);

    } // end "archiveBrand" method 

	public function restoreBrand($id)
	{
    	$brand = Brand::onlyTrashed()->findOrFail($id);
		if(!empty($brand)) {
			$brand->restore();
		}
    
		$notification = array(
			'message' => 'Категорію було успішно відновлено та додано до основного списку!',
			'alert-type' => 'success'
		);
		return redirect()->back()->with($notification);

    } // end "restoreBrand" method

	public function deleteBrand($id)
	{	
		$brand = Brand::onlyTrashed()->findOrFail($id);
		if(!empty($brand)) {
			$brand->forceDelete();
		}
    
		$notification = array(
			'message' => 'Категорію було видалено з бази даних!',
			'alert-type' => 'warning'
		);
		return redirect()->back()->with($notification);

    } // end "deleteBrand" method
}
