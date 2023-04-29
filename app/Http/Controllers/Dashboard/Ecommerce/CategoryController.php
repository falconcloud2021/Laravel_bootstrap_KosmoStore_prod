<?php

namespace App\Http\Controllers\Dashboard\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\Ecommerce\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
	/**
     * Display a table of the categories resource.
	 * Show the form for New Category creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categoriesListAdd()
    {
    	$categoriesList = Category::latest()->get();
		$catArchivedList = Category::onlyTrashed()->get();
		return view('dashboard.ecommerce.rank.category.category-add-list',compact('categoriesList', 'catArchivedList'));

    }

	/**
     * Display a table of the categories resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categoriesChartList()
    {
    	$categoriesChart = Category::latest()->get();
    	return view('dashboard.ecommerce.rank.category.category-chart-list',compact('categoriesChart'));

    }

	/**
     * Display a table of the categories resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categoriesGridDetail()
    {
    	$categoriesGrid = Category::latest()->get();
    	return view('dashboard.ecommerce.rank.category.category-grid-detail',compact('categoriesGrid'));

    }

	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCategory(Request $request)
    {
    	$request->validate([
    		'category_name_ua' => 'required|unique:categories|min:2|max:56',
            'category_name_ru' => 'required|unique:categories|min:2|max:56',
			'category_icon' => 'required',
    		'category_description_ua' => 'required|max:1000',
            'category_description_ru' => 'required|max:1000',
    		
    	],[
    		'category_name_ua.required' => 'Будь ласка введіть назву Категорії!',
            'category_name_ua.unique' => 'Введена вами назва Категорії не є унікальною. Введіть іншу назву!',
    		'category_name_ua.min' => 'Введена вами назва Категорії коротша двох символів. Введіть назву довшу ніж два символи!',
            'category_name_ua.max' => 'Введена вами назва Категорії довша ніж 56 символів. Введіть назву коротшу ніж 56 символів!',
            'category_name_ru.required' => 'Будь ласка введіть назву Категорії!',
            'category_name_ru.unique' => 'Введена вами назва Категорії не є унікальною. Введіть іншу назву!',
    		'category_name_ru.min' => 'Введена вами назва Категорії коротша двох символів. Введіть назву довшу ніж два символи!',
            'category_name_ru.max' => 'Введена вами назва Категорії довша ніж 56 символів. Введіть назву коротшу ніж 56 символів!',
			'category_icon.required' => 'Будь ласка додайте "Логотип" Категорії!',
            'category_description_ua.required' => 'Будь ласка введіть короткий опис Категорії українською!',
            'category_description_ua.max' => 'Введена вами назва Категорії довша ніж 1000 символів. Введіть назву коротшу ніж 1000 символів!',
            'category_description_ru.required' => 'Будь ласка введіть короткий опис Категорії на російській мові!',
            'category_description_ru.max' => 'Введена вами назва Категорії довша ніж 1000 символів. Введіть назву коротшу ніж 1000 символів!',
            
    	]);

    	$image = $request->file('category_icon');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(140,140)->save('upload/ecommerce/rank/category/'.$name_gen);
    	$save_url = 'upload/ecommerce/rank/category/'.$name_gen;

		Category::insert([
			'category_name_ua' => $request->category_name_ua,
            'category_name_ru' => $request->category_name_ru,
			'category_slug_ua' => strtolower(str_replace(' ', '-',$request->category_name_ua)),
            'category_slug_ru' => strtolower(str_replace(' ', '-',$request->category_name_ru)),
			'category_icon' => $save_url,
			'category_description_ua' => $request->category_description_ua,
			'category_description_ru' => $request->category_description_ru,
			'category_touches' => '0',
			'category_rated' => '0',
			'created_at' => Carbon::now(),
			// 'created_by' = $request->user()->id;
        	// 'updated_by' = $request->user()->id;

    	]);

	    $notification = array(
			'message' => 'Нову Категорію було успішно додано до бази даних!',
			'alert-type' => 'success'
		);
		return redirect()->back()->with($notification);

    } // end "storeCategory" method 

	/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editCategory($id)
	{
    	$categoryEdit = Category::findOrFail($id);
    	return view('dashboard.ecommerce.rank.category.category-edit-form',compact('categoryEdit'));

    }

	 /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function updateCategory(Request $request)
	{  	
    	$request->validate([
    		'category_name_ua' => 'required|min:2|max:56',
            'category_name_ru' => 'required|min:2|max:56',
			// 'category_icon' => 'required',
    		'category_description_ua' => 'required|max:1000',
            'category_description_ru' => 'required|max:1000',
    		
    	],[
    		'category_name_ua.required' => 'Будь ласка введіть назву Категорії!',
    		'category_name_ua.min' => 'Введена вами назва Категорії коротша двох символів. Введіть назву довшу ніж два символи!',
            'category_name_ua.max' => 'Введена вами назва Категорії довша ніж 56 символів. Введіть назву коротшу ніж 56 символів!',
            'category_name_ru.required' => 'Будь ласка введіть назву Категорії!',
    		'category_name_ru.min' => 'Введена вами назва Категорії коротша двох символів. Введіть назву довшу ніж два символи!',
            'category_name_ru.max' => 'Введена вами назва Категорії довша ніж 56 символів. Введіть назву коротшу ніж 56 символів!',
			// 'category_icon.required' => 'Будь ласка додайте "Логотип" Категорії!',
            'category_description_ua.required' => 'Будь ласка введіть короткий опис Категорії українською!',
            'category_description_ua.max' => 'Введена вами назва Категорії довша ніж 1000 символів. Введіть назву коротшу ніж 1000 символів!',
            'category_description_ru.required' => 'Будь ласка введіть короткий опис Категорії на російській мові!',
            'category_description_ru.max' => 'Введена вами назва Категорії довша ніж 1000 символів. Введіть назву коротшу ніж 1000 символів!',
            
    	]);

		$category_id = $request->id;
    	$old_icon = $request->old_icon;

    	if ($request->file('category_icon')) {

			// unlink($old_icon);
			if (file_exists($old_icon)) {
				unlink($old_icon);
			}
			$image = $request->file('category_icon');
			$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
			Image::make($image)->resize(140,140)->save('upload/ecommerce/rank/category/'.$name_gen);
			$save_url = 'upload/ecommerce/rank/category/'.$name_gen;

			// if (file_exists($old_icon)) {
			// 	unlink($old_icon);
			// }

			Category::findOrFail($category_id)->update([
				'category_name_ua' => $request->category_name_ua,
                'category_name_ru' => $request->category_name_ru,
				'category_slug_ua' => strtolower(str_replace(' ', '-',$request->category_name_ua)),
                'category_slug_ru' => strtolower(str_replace(' ', '-',$request->category_name_ru)),
				'category_icon ' => $save_url,
				'category_description_ua' => $request->category_description_ua,
				'category_description_ru' => $request->category_description_ru,
				'updated_at' => Carbon::now(),

    		]);

			$notification = array(
				'message' => 'Картка Категорії успішно редаговано зі зміною "Іконки".',
				'alert-type' => 'primary'
			);
			return redirect()->route('categories.list-add')->with($notification);

    	} else {

			Category::findOrFail($category_id)->update([
			'category_name_ua' => $request->category_name_ua,
            'category_name_ru' => $request->category_name_ru,
			'category_slug_ua' => strtolower(str_replace(' ', '-',$request->category_name_ua)),
            'category_slug_ru' => strtolower(str_replace(' ', '-',$request->category_name_ru)),
			'category_description_ua' => $request->category_description_ua,
			'category_description_ru' => $request->category_description_ru,
			'updated_at' => Carbon::now(),
			
			]);

			$notification = array(
				'message' => 'Картка Категорії успішно редаговано без зміни "Іконки".',
				'alert-type' => 'info'
			); 
			return redirect()->route('categories.list-add')->with($notification);

			} // end else 

    } // end "updateCategory" method 

    public function archiveCategory($id)
	{	
		Category::findOrFail($id)->delete();

		$notification = array(
			'message' => 'Категорію було переміщено до архіву!',
			'alert-type' => 'warning'
		);
		return redirect()->back()->with($notification);

    } // end "archiveCategory" method 

	public function restoreCategory($id)
	{
    	$category = Category::onlyTrashed()->findOrFail($id);
		if(!empty($category)) {
			$category->restore();
		}
    
		$notification = array(
			'message' => 'Категорію було успішно відновлено та додано до основного списку!',
			'alert-type' => 'success'
		);
		return redirect()->back()->with($notification);

    } // end "restoreCategory" method

	public function deleteCategory($id)
	{	
		$category = Category::onlyTrashed()->findOrFail($id);
		if(!empty($category)) {
			$category->forceDelete();
		}
    
		$notification = array(
			'message' => 'Категорію було видалено з бази даних!',
			'alert-type' => 'warning'
		);
		return redirect()->back()->with($notification);

    } // end "deleteCategory" method

	
}

