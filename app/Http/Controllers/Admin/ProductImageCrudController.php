<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductImageRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class ProductImageCrudController extends CrudController
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
        CRUD::setModel(\App\Models\ProductImage::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/product-image');
        CRUD::setEntityNameStrings('product image', 'product images');
    }

    protected function setupListOperation()
    {
        CRUD::setFromDb();
        $this->crud->addColumn('product_id', [
            'label' => "Product",
            'type' => "relationship",
            'name' => 'product_id',
            'entity' => 'product',
            'attribute' => "name",
            'model' => 'App\Models\Product'
        ]);
        $this->crud->setColumnDetails('product_id', [
            'label' => "Product",
            'type' => "relationship",
            'name' => 'product_id',
            'entity' => 'product',
            'attribute' => "name",
            'model' => 'App\Models\Product'
        ]);
        CRUD::column('image')->type('image');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(ProductImageRequest::class);
        CRUD::setFromDb();
        $this->crud->addField([
            'label' => "Product",
            'type' => "relationship",
            'name' => 'product_id',
            'entity' => 'product',
            'attribute' => "name",
            'model' => 'App\Models\Product'
        ]);
        CRUD::field('image')->type('image');
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
