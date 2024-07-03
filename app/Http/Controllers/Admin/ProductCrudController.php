<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class ProductCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('View Products')) {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Products')) {
            $this->crud->denyAccess(['create', 'delete', 'update']);
        }
        CRUD::setModel(\App\Models\Product::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/product');
        CRUD::setEntityNameStrings('product', 'products');
    }

    protected function setupListOperation()
    {
        CRUD::setFromDb();
        $this->crud->addColumn('category_id', [
            'label' => "Category",
            'type' => "relationship",
            'name' => 'category_id',
            'entity' => 'category',
            'attribute' => "name",
            'model' => 'App\Models\Category'
        ]);
        $this->crud->setColumnDetails('category_id', [
            'label' => "Category",
            'type' => "relationship",
            'name' => 'category_id',
            'entity' => 'category',
            'attribute' => "name",
            'model' => 'App\Models\Category'
        ]);
        $this->crud->addColumn([
            'name' => 'images',
            'label' => 'Images',
            'type' => 'image',
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(ProductRequest::class);
        CRUD::setFromDb();
        $this->crud->addField([
            'label' => "Category",
            'type' => "relationship",
            'name' => 'category_id',
            'entity' => 'category',
            'attribute' => "name",
            'model' => 'App\Models\Category'
        ]);
        $this->crud->addField([
            'name' => 'images',
            'label' => 'Images',
            'type' => 'upload_multiple',
            'upload' => true,
            'disk' => 'public',
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $this->setupListOperation();
    }
}
