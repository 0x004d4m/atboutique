<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

@if(backpack_user()->can('View Authentication'))
<x-backpack::menu-dropdown title="Authentication" icon="la la-group">
    <x-backpack::menu-dropdown-item title="Users" icon="la la-user" :link="backpack_url('user')" />
    <x-backpack::menu-dropdown-item title="Roles" icon="la la-group" :link="backpack_url('role')" />
    <x-backpack::menu-dropdown-item title="Permissions" icon="la la-key" :link="backpack_url('permission')" />
</x-backpack::menu-dropdown>
@endif

@if(backpack_user()->can('View Translations'))
<x-backpack::menu-dropdown title="Translations" icon="la la-globe">
    {{-- <x-backpack::menu-dropdown-item title="Languages" icon="la la-flag-checkered" :link="backpack_url('language')" /> --}}
    <x-backpack::menu-dropdown-item title="Site texts" icon="la la-language" :link="backpack_url('language/texts')" />
</x-backpack::menu-dropdown>
@endif

@if(backpack_user()->can('View Sliders') || backpack_user()->can('View Site Texts') || backpack_user()->can('View Contacts') || backpack_user()->can('View Socials') || backpack_user()->can('View News Letters') || backpack_user()->can('View Faqs'))
<x-backpack::menu-dropdown title="Site" icon="la la-desktop">
    @if(backpack_user()->can('View Sliders'))
        <x-backpack::menu-item title="Sliders" icon="la la-images" :link="backpack_url('slider')" />
    @endif
    @if(backpack_user()->can('View Site Texts'))
        <x-backpack::menu-item title="Site texts" icon="la la-align-center" :link="backpack_url('site-text')" />
    @endif
    @if(backpack_user()->can('View Contacts'))
        <x-backpack::menu-item title="Contacts" icon="la la-phone" :link="backpack_url('contact')" />
    @endif
    @if(backpack_user()->can('View Socials'))
        <x-backpack::menu-item title="Socials" icon="la la-facebook-f" :link="backpack_url('social')" />
    @endif
    @if(backpack_user()->can('View News Letters'))
        <x-backpack::menu-item title="News letters" icon="la la-envelope-square" :link="backpack_url('news-letter')" />
    @endif
    @if(backpack_user()->can('View Faqs'))
        <x-backpack::menu-item title="Faqs" icon="la la-question-circle" :link="backpack_url('faq')" />
    @endif
</x-backpack::menu-dropdown>
@endif

@if(backpack_user()->can('View Countries') || backpack_user()->can('View States') || backpack_user()->can('View Colors') || backpack_user()->can('View Sizes') || backpack_user()->can('View Categories') || backpack_user()->can('View Shipping Companies') || backpack_user()->can('View Order Statuses'))
<x-backpack::menu-dropdown title="Settings" icon="la la-cogs">
    @if(backpack_user()->can('View Countries'))
        <x-backpack::menu-item title="Countries" icon="la la-city" :link="backpack_url('country')" />
    @endif
    @if(backpack_user()->can('View States'))
        <x-backpack::menu-item title="States" icon="la la-building" :link="backpack_url('state')" />
    @endif
    @if(backpack_user()->can('View Colors'))
        <x-backpack::menu-item title="Colors" icon="la la-palette" :link="backpack_url('color')" />
    @endif
    @if(backpack_user()->can('View Sizes'))
        <x-backpack::menu-item title="Sizes" icon="la la-arrows-alt" :link="backpack_url('size')" />
    @endif
    @if(backpack_user()->can('View Categories'))
        <x-backpack::menu-item title="Categories" icon="las la-tags" :link="backpack_url('category')" />
    @endif
    @if(backpack_user()->can('View Shipping Companies'))
        <x-backpack::menu-item title="Shipping companies" icon="la la-shipping-fast" :link="backpack_url('shipping-company')" />
    @endif
    @if(backpack_user()->can('View Order Statuses'))
        <x-backpack::menu-item title="Order statuses" icon="la la-luggage-cart" :link="backpack_url('order-status')" />
    @endif
</x-backpack::menu-dropdown>
@endif

@if(backpack_user()->can('View Coupons'))
    <x-backpack::menu-item title="Coupons" icon="la la-percent" :link="backpack_url('coupon')" />
@endif

@if(backpack_user()->can('View Products'))
    <x-backpack::menu-item title="Products" icon="la la-shopping-cart" :link="backpack_url('product')" />
@endif

@if(backpack_user()->can('View Products'))
    <x-backpack::menu-item title="Product images" icon="la la-image" :link="backpack_url('product-image')" />
@endif

@if(backpack_user()->can('View Customers'))
    <x-backpack::menu-item title="Customers" icon="la la-user" :link="backpack_url('customer')" />
@endif

@if(backpack_user()->can('View Contact Requests'))
    <x-backpack::menu-item title="Contact requests" icon="la la-paper-plane" :link="backpack_url('contact-request')" />
@endif

@if(backpack_user()->can('View Orders'))
    <x-backpack::menu-item title="Orders" icon="la la-luggage-cart" :link="backpack_url('order')" />
@endif
