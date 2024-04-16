<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //Вывод страницы  категорий в админке
    public function index()
    {
         //берем категории из модели Категории
        $categories=Category::paginate(5);
       return view('auth.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    //Показ формы создания категории
    public function create()
    {
        return view('auth.categories.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    //Создание ресурса
    public function store(CategoryRequest $request)
    {
        //для валидации

        //$path = $request->file('image')->store('categories');//добаваляем путь к файлу,
        //используем реквест, и тип файла по имени, в форме у нас указывает name='image'-название поля
        //, далее указываем место хранения в storage

        $params = $request->all();//передаем в реквесте все параметры полученные
        //$params['image'] = $path;//путь параметра картинки
        unset($params['image']);//снимает параметр
        if ($request->has('image')) {
            //если есть параметр, при заполнении, то сохраняется
            $params['image'] = $request->file('image')->store('categories');
        }
        Category::create($params);//передаем в параметры в create
        return redirect()->route('categories.index');
  }


    /**
     * Display the specified resource.
     */
    //открытие страницы с описанием категории
    public function show(Category $category)
    {
        return view('auth.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    //отвечает за отображение формы для редактирования
    //форма редактирования записи
    //предназначен для отображения формы для применения изменений
    public function edit(Category $category)
    {
        return view('auth.categories.form', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    //обработка обновления редактируемой записи
    //используется для установки применения изменений
    public function update(CategoryRequest $request, Category $category)
    {
        //$category->update($request->all());//сохраняет все данные
        // Storage::delete($category->image);//выбирать между этим или нижним делитом,
        // в зависсимоти от наличия картинки ранее
        //Storage::delete('image');//удаление предидущей картинки(чтобы не было мусора в сторадж) картинки
        // $path = $request->file('image')->store('categories');
        $params = $request->all();
        //$params['image'] = $path;
        unset($params['image']);
        if ($request->has('image')) {
            Storage::delete('image');
            $params['image'] = $request->file('image')->store('categories');
        }
        $category->update($params);//обновление параметров категории
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    //удаление записи
    public function destroy(Category $category)
    {
        $category->products()->delete();
        $category->delete();//удаляет категории
        return to_route('categories.index');
    }
}
