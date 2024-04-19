<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ImageRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //Вывод страницы продуктов в админке
    public function index()
    {
        $images=Image::orderBy('product_id')->paginate(6);//макс кол-во товаров отображаемых на странице
        // $products = Product::get();
        return view('auth.images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    //Показ формы создания продукта
    public function create()
    {     $products= Product::get();//найти все категории
        return view('auth.images.form', compact('products'));//передать все категории через compuct
    }

    /**
     * Store a newly created resource in storage.
     */
    //Создание ресурса
    public function store(ImageRequest $request)
    {

        // $path = $request->file('image')->store('products');
        //добаваляем путь к файлу,
        //используем реквест, и тип файла по имени, в форме у нас указывает name='image'-название поля
        //, далее указываем место хранения в storage
        $params = $request->all();//пердаем в реквесте все параметры полученные
        // $params['image'] = $path;//путь параметра картинки
        unset($params['image']);
        if ($request->has('image')) {
            $params['image'] = $request->file('image')->store('images');
        }
        Image::create($params);//передаем в параметры в create
        return redirect()->route('images.index');
    }

    /**
     * Display the specified resource.
     */
    //открытие страницы с описанием продукта
    public function show(Image $image)
    {
        return view('auth.images.show', compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     */
       //отвечает за отображение формы для редактирования
    //форма редактирования записи
    //предназначен для отображения формы для применения изменений
    public function edit(Image $image)
    {     $products= Product::get();
        return view('auth.images.form',compact('image', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
     //обработка обновления редактируемой записи
    //используется для установки применения изменений
    public function update(ImageRequest $request, Image $image)
    {
         //Storage::delete($prodct->image);//выбирать между этим или нижним делитом,
        // в зависсимоти от наличия картинки ранее

        // Storage::delete('image');//удаление предидущей картинки(чтобы не было мусора в сторадж) картинки
        // $path = $request->file('image')->store('products');
        $params = $request->all();
        // $params['image'] = $path;
        unset($params['image']);//снимает параметр
        if ($request->has('image')) {//если есть параметр, при заполнении, то сохраняется
            Storage::delete('image');
            $params['image'] = $request->file('image')->store('images');
        }


        $image->update($params);//обновление параметров продукта
        return redirect()->route('images.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    //удаление записи
    public function destroy(Image $image)
    {
        $image->delete();
        return to_route('images.index');
    }
}
