<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //Вывод страницы продуктов в админке
    public function index()
    {
        $products=Product::paginate(6);//макс кол-во товаров отображаемых на странице
        //$products = Product::get();
        return view('auth.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    //Показ формы создания продукта
    public function create()
    {     $categories= Category::get();//найти все категории
        return view('auth.products.form', compact('categories'));//передать все категории через compuct
    }

    /**
     * Store a newly created resource in storage.
     */
    //Создание ресурса
    public function store(ProductRequest $request)
    {


        // $path = $request->file('image')->store('products');
        //добаваляем путь к файлу,
        //используем реквест, и тип файла по имени, в форме у нас указывает name='image'-название поля
        //, далее указываем место хранения в storage
        $params = $request->all();//пердаем в реквесте все параметры полученные
        // $params['image'] = $path;//путь параметра картинки
        unset($params['image']);
        if ($request->has('image')) {
            $params['image'] = $request->file('image')->store('products');
        }
        Product::create($params);//передаем в параметры в create
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    //открытие страницы с описанием продукта
    public function show(Product $product)
    {
        return view('auth.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
       //отвечает за отображение формы для редактирования
    //форма редактирования записи
    //предназначен для отображения формы для применения изменений
    public function edit(Product $product)
    {     $categories= Category::get();
        return view('auth.products.form',compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
     //обработка обновления редактируемой записи
    //используется для установки применения изменений
    public function update(ProductRequest $request, Product $product)
    {

        $params = $request->all();
        // $params['image'] = $path;
        unset($params['image']);//снимает параметр
        if ($request->has('image')) {//если есть параметр, при заполнении, то сохраняется
            Storage::delete('image');
            $params['image'] = $request->file('image')->store('products');
        }
        foreach (['new', 'hit', 'recommend'] as $fieldName) {//перебор по имени поля, если поле с именем нот иссет(не задано)
            //то приравнивает 0
            if (!isset($params[$fieldName])) {
                $params[$fieldName] = 0;
            }
        }

        $product->update($params);//обновление параметров продукта
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    //удаление записи
    public function destroy(Product $product)
    {
        $product->images()->delete();
        $product->delete();
        return to_route('products.index');
    }
}
