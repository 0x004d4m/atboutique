<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ColorRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class ColorCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('View Colors')) {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Colors')) {
            $this->crud->denyAccess(['create', 'delete', 'update']);
        }
        CRUD::setModel(\App\Models\Color::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/color');
        CRUD::setEntityNameStrings('color', 'colors');
    }

    protected function setupListOperation()
    {
        CRUD::setFromDb();
        $this->crud->addColumn('hex', [
            'name'  => 'hex',
            'type'  => 'color',
            'showColorHex' => true
        ]);
        $this->crud->setColumnDetails('hex', [
            'name'  => 'hex',
            'type'  => 'color',
            'showColorHex' => true
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(ColorRequest::class);
        CRUD::setFromDb();
        CRUD::field([
            'name'  => 'hex',
            'type'  => 'color',
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
