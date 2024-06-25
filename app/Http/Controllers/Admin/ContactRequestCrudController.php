<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ContactRequestRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class ContactRequestCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('View Contact Requests')) {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Contact Requests')) {
            $this->crud->denyAccess(['create', 'delete', 'update']);
        }
        CRUD::setModel(\App\Models\ContactRequest::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/contact-request');
        CRUD::setEntityNameStrings('contact request', 'contact requests');
    }

    protected function setupListOperation()
    {
        CRUD::setFromDb();
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(ContactRequestRequest::class);
        CRUD::setFromDb();
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
