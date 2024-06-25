<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SliderRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class SliderCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('View Sliders')) {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Sliders')) {
            $this->crud->denyAccess(['create', 'delete', 'update']);
        }
        CRUD::setModel(\App\Models\Slider::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/slider');
        CRUD::setEntityNameStrings('slider', 'sliders');
    }

    protected function setupListOperation()
    {
        CRUD::setFromDb();
        CRUD::column('image')->type('image');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(SliderRequest::class);
        CRUD::setFromDb();
        CRUD::field('image')->type('image');
        CRUD::field([
            'name'        => 'animation',
            'label'       => "Animation",
            'type'        => 'select_from_array',
            'options'     => ["fadeInDown" => "fadeInDown", "fadeInUp" => "fadeInUp", "zoomIn" => "zoomIn", "rollIn" => "rollIn", "lightSpeedIn" => "lightSpeedIn", "slideInUp" => "slideInUp", "rotateInDownLeft" => "rotateInDownLeft", "rotateInUpRight" => "rotateInUpRight", "rotateIn" => "rotateIn"],
            'allows_null' => false,
            'default'     => 'one',
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
