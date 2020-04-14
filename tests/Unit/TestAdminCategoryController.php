<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Models\Category;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Requests\AdminCategoryRequest;
use Symfony\Component\HttpFoundation\ParameterBag;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\RedirectResponse;

class TestAdminCategoryController extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_function_index()
    {
        $controller = new AdminCategoryController(new Category);
        $view = $controller->index();
        $categories = Category::orderBy('id', 'DESC')->paginate(10);

        $this->assertEquals('admin.categories.index', $view->getName());
        $this->assertEquals(['categories' => $categories], $view->getData());
    }

    public function test_function_get_store()
    {
        $controller = new AdminCategoryController(new Category);
        $view = $controller->getStore();

        $this->assertEquals('admin.categories.form', $view->getName());
    }

    public function test_function_store()
    {
        $request = new AdminCategoryRequest();
        $request->headers->set('content-type', 'application/json');
        $data = [
            'name' => 'Hai 33',
            'avatar' => UploadedFile::fake()->image('upload/smile.jpeg'),
        ];
        $request->setJson(new ParameterBag($data));
        $controller = new AdminCategoryController(new Category);
        $response = $controller->store($request);
        dd($response);

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(route('get.all.categories'), $response->headers->get('Location'));
    }

    public function test_function_get_update()
    {
        $controller = new AdminCategoryController(new Category);
        $category = Category::find(10);
        $view = $controller->getUpdate(10);

        $this->assertEquals('admin.categories.form', $view->getName());
        $this->assertEquals(['category' => $category], $view->getData());
    }

    public function test_function_post_update()
    {
        $request = new AdminCategoryRequest();
        $request->headers->set('content-type', 'application/json');
        $data = [
            'name' => 'Gaetano Ledner Edited',
            'avatar' => UploadedFile::fake()->image('avatar.jpg'),
        ];
        $request->setJson(new ParameterBag($data));
        $controller = new AdminCategoryController(new Category);
        $response = $controller->postUpdate($request, 11);

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(route('get.all.categories'), $response->headers->get('Location'));
    }

    public function test_function_get_delete()
    {
        $controller = new AdminCategoryController(new Category);
        $response = $controller->getDelete(54);

        $this->assertInstanceOf(RedirectResponse::class, $response);

    }
}
