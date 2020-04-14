<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\AdminCategoryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Carbon\Carbon;
use App\Repositories\Category\CategoryRepositoryInterface;

class AdminCategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->middleware('auth');
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getOrderBy();

        return view('admin.categories.index', compact('categories'));
    }

    public function getStore()
    {
        return view('admin.categories.form');
    }

    public function store(AdminCategoryRequest $request)
    {
        if ($request->hasFile('avatar')) {
            $extension = $request->avatar->extension();
            $file = $request->avatar;
            $fileName = \Str::slug(Carbon::now().$request->name) . '.' . $extension;
            $file->move('upload', $fileName);
            $avatar = 'upload/'.$fileName;
        }
        else {
            $avatar = 'upload/no-image.png';
        }
        $data = [
            'name' => $request->name,
            'slug' => \Str::slug($request->name),
            'avatar' => $avatar,
        ];

        $this->categoryRepository->create($data);

        return redirect()->route('get.all.categories');
    }

    public function getUpdate($id)
    {
        $category = $this->categoryRepository->find($id);

        return view('admin.categories.form', compact('category'));
    }

    public function postUpdate(AdminCategoryRequest $request, $id)
    {
        $category = $this->categoryRepository->find($id);

        if ($request->hasFile('avatar')) {
            $extension = $request->avatar->extension();
            $file = $request->avatar;
            $fileName = \Str::slug(Carbon::now().$request->name) . '.' . $extension;
            $file->move('upload', $fileName);
            $category->avatar = 'upload/'.$fileName;
        }

        $data = [
            'name' => $request->name,
            'slug' => \Str::slug($request->name),
            'avatar' => $category->avatar,
        ];

        $this->categoryRepository->update($id, $data);

        return redirect()->route('get.all.categories');
    }

    public function getDelete($id)
    {
        $this->categoryRepository->delete($id);

        return redirect()->back();
    }
}
