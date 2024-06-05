<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OrderRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class OrderCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        if (!backpack_user()->can('View Orders')) {
            abort(403, 'Access denied');
        }

        if (!backpack_user()->can('Manage Orders')) {
            $this->crud->denyAccess(['create', 'delete', 'update']);
        }
        CRUD::setModel(\App\Models\Order::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/order');
        CRUD::setEntityNameStrings('order', 'orders');
    }

    protected function setupListOperation()
    {
        CRUD::setFromDb();

        $this->crud->addColumn('customer_id',[
            'label' => "Customer",
            'type' => "relationship",
            'name' => 'customer_id',
            'entity' => 'customer',
            'attribute' => "name",
            'model' => 'App\Models\Customer'
        ]);
        $this->crud->setColumnDetails('customer_id',[
            'label' => "Customer",
            'type' => "relationship",
            'name' => 'customer_id',
            'entity' => 'customer',
            'attribute' => "name",
            'model' => 'App\Models\Customer'
        ]);
        $this->crud->addColumn('country_id',[
            'label' => "Country",
            'type' => "relationship",
            'name' => 'country_id',
            'entity' => 'country',
            'attribute' => "name",
            'model' => 'App\Models\Country'
        ]);
        $this->crud->setColumnDetails('country_id',[
            'label' => "Country",
            'type' => "relationship",
            'name' => 'country_id',
            'entity' => 'country',
            'attribute' => "name",
            'model' => 'App\Models\Country'
        ]);
        $this->crud->addColumn('state_id',[
            'label' => "State",
            'type' => "relationship",
            'name' => 'state_id',
            'entity' => 'state',
            'attribute' => "name",
            'model' => 'App\Models\State'
        ]);
        $this->crud->setColumnDetails('state_id',[
            'label' => "State",
            'type' => "relationship",
            'name' => 'state_id',
            'entity' => 'state',
            'attribute' => "name",
            'model' => 'App\Models\State'
        ]);
        $this->crud->addColumn('city_id',[
            'label' => "City",
            'type' => "relationship",
            'name' => 'city_id',
            'entity' => 'city',
            'attribute' => "name",
            'model' => 'App\Models\City'
        ]);
        $this->crud->setColumnDetails('city_id',[
            'label' => "City",
            'type' => "relationship",
            'name' => 'city_id',
            'entity' => 'city',
            'attribute' => "name",
            'model' => 'App\Models\City'
        ]);
        $this->crud->addColumn('shipping_company_id',[
            'label' => "Shipping Company",
            'type' => "relationship",
            'name' => 'shipping_company_id',
            'entity' => 'shippingCompany',
            'attribute' => "name",
            'model' => 'App\Models\ShippingCompany'
        ]);
        $this->crud->setColumnDetails('shipping_company_id',[
            'label' => "Shipping Company",
            'type' => "relationship",
            'name' => 'shipping_company_id',
            'entity' => 'shippingCompany',
            'attribute' => "name",
            'model' => 'App\Models\ShippingCompany'
        ]);
        $this->crud->addColumn('order_status_id',[
            'label' => "Order Status",
            'type' => "relationship",
            'name' => 'order_status_id',
            'entity' => 'orderStatus',
            'attribute' => "name",
            'model' => 'App\Models\OrderStatus'
        ]);
        $this->crud->setColumnDetails('order_status_id',[
            'label' => "Order Status",
            'type' => "relationship",
            'name' => 'order_status_id',
            'entity' => 'orderStatus',
            'attribute' => "name",
            'model' => 'App\Models\OrderStatus'
        ]);
        $this->crud->addColumn('coupon_id',[
            'label' => "Coupon",
            'type' => "relationship",
            'name' => 'coupon_id',
            'entity' => 'coupon',
            'attribute' => "name",
            'model' => 'App\Models\Coupon'
        ]);
        $this->crud->setColumnDetails('coupon_id',[
            'label' => "Coupon",
            'type' => "relationship",
            'name' => 'coupon_id',
            'entity' => 'coupon',
            'attribute' => "name",
            'model' => 'App\Models\Coupon'
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(OrderRequest::class);
        CRUD::setFromDb();

        $this->crud->addField([
            'label' => "Customer",
            'type' => "relationship",
            'name' => 'customer_id',
            'entity' => 'customer',
            'attribute' => "name",
            'model' => 'App\Models\Customer'
        ]);
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
        $this->crud->addField([
            'label' => "City",
            'type' => "relationship",
            'name' => 'city_id',
            'entity' => 'city',
            'attribute' => "name",
            'model' => 'App\Models\City'
        ]);
        $this->crud->addField([
            'label' => "Shipping Company",
            'type' => "relationship",
            'name' => 'shipping_company_id',
            'entity' => 'shippingCompany',
            'attribute' => "name",
            'model' => 'App\Models\ShippingCompany'
        ]);
        $this->crud->addField([
            'label' => "Order Status",
            'type' => "relationship",
            'name' => 'order_status_id',
            'entity' => 'orderStatus',
            'attribute' => "name",
            'model' => 'App\Models\OrderStatus'
        ]);
        $this->crud->addField([
            'label' => "Coupon",
            'type' => "relationship",
            'name' => 'coupon_id',
            'entity' => 'coupon',
            'attribute' => "name",
            'model' => 'App\Models\Coupon'
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
