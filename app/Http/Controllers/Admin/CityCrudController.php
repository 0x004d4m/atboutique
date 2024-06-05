<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CityRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class CityCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('View Cities')) {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Cities')) {
            $this->crud->denyAccess(['create', 'delete', 'update']);
        }
        CRUD::setModel(\App\Models\City::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/city');
        CRUD::setEntityNameStrings('city', 'cities');
    }

    protected function setupListOperation()
    {
        CRUD::setFromDb();
        $this->crud->addColumn('country_id',[
            'label' => "Country",
            'type' => "select",
            'name' => 'country_id',
            'entity' => 'country',
            'attribute' => "name",
            'model' => 'App\Models\Country'
        ]);
        $this->crud->setColumnDetails('country_id',[
            'label' => "Country",
            'type' => "select",
            'name' => 'country_id',
            'entity' => 'country',
            'attribute' => "name",
            'model' => 'App\Models\Country'
        ]);
        $this->crud->addColumn('state_id', [
            'label' => "State",
            'type' => "select",
            'name' => 'state_id',
            'entity' => 'state',
            'attribute' => "name",
            'model' => 'App\Models\State'
        ]);
        $this->crud->setColumnDetails('state_id', [
            'label' => "State",
            'type' => "select",
            'name' => 'state_id',
            'entity' => 'state',
            'attribute' => "name",
            'model' => 'App\Models\State'
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(CityRequest::class);
        CRUD::setFromDb();
        $this->crud->addField([
            'label' => "Country",
            'type' => "relationship",
            'name' => 'country_id',
            'entity' => 'country',
            'attribute' => "name",
            'model' => 'App\Models\Country'
        ]);
        $this->crud->addField([
            'label' => "State",
            'type' => "relationship",
            'name' => 'state_id',
            'entity' => 'state',
            'attribute' => "name",
            'model' => 'App\Models\State'
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
