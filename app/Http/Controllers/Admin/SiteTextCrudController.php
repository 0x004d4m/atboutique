<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SiteTextRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class SiteTextCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('View Site Texts')) {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Site Texts')) {
            $this->crud->denyAccess(['create', 'delete', 'update']);
        }
        CRUD::setModel(\App\Models\SiteText::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/site-text');
        CRUD::setEntityNameStrings('site text', 'site texts');
    }

    protected function setupListOperation()
    {
        CRUD::setFromDb();
        CRUD::column('image')->type('image');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(SiteTextRequest::class);
        CRUD::setFromDb();
        CRUD::field('image')->type('image');
        CRUD::field('description')->type('CKEditor');
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
