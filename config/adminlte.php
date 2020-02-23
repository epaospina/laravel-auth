<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.
    |
    */

    'title' => 'MC vehiculos',

    'title_prefix' => '',

    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want. The logo has also a mini
    | variant, used for the mini side bar. Make it 3 letters or so
    |
    */

    'logo' => '<b>MC</b> vehiculos',

    'logo_mini' => '<b>MC</b> V',

    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin colors:
    | blue, black, purple, yellow, red, and green. Each skin also has a
    | light variant: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'blue',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar
    |
    */

    'layout' => null,

    /*
    |--------------------------------------------------------------------------
    | Collapse Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we choose and option to be able to start with a collapsed side
    | bar. To adjust your sidebar layout simply set this  either true
    | this is compatible with layouts except top-nav layout option
    |
    */

    'collapse_sidebar' => false,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs. The
    | logout URL automatically sends a POST request in Laravel 5.3 or higher.
    | You can set the request to a GET or POST with logout_method.
    | Set register_url to null if you don't want a register link.
    |
    */

    'dashboard_url' => '',

    'logout_url' => 'logout',

    'logout_method' => null,

    'login_url' => 'login',

    'register_url' => 'register',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and a URL. You can also specify an icon from Font
    | Awesome. A string instead of an array represents a header in sidebar
    | layout. The 'can' is a filter on Laravel's built in Gate functionality.
    */
    'menu' => [
            'CLIENTES',
                [
                    'text' => 'add_customer',
                    'url'  => 'load-orders/create',
                    'icon' => 'fas fa-user-plus'
                ],
                [
                    'text' => 'Facturas',
                    'url'  => 'clients/',
                    'icon' => 'fas fa-user-plus'
                ],
                [
                    'text' => 'Lista de clientes',
                    'url'  => 'load-orders',
                    'icon' => 'fas fa-user-plus'
                ],
                [
                    'text' => 'Coches pendientes',
                    'url'  => 'load-orders/cars-pending',
                    'icon' => 'fas fa-user-plus'
                ],
                [
                    'text' => 'Coches recogidos',
                    'url'  => 'load-orders/cars-old-load',
                    'icon' => 'fas fa-user-plus'
                ],
        [
            'text'    => 'Lista de paises',
            'icon'    => 'fas fa-fw fa-share',
            'submenu' => [
                [
                    'text' => 'Nacionales',
                    'url'  => 'load-orders/list-by-country/1',
                    'icon' => 'fas fa-user-plus'
                ],
                [
                    'text' => 'Alemania',
                    'url'  => 'load-orders/list-by-country/2',
                    'icon' => 'fas fa-user-plus'
                ],
                [
                    'text' => 'Austria',
                    'url'  => 'load-orders/list-by-country/3',
                    'icon' => 'fas fa-user-plus'
                ],
                [
                    'text' => 'Bélgica',
                    'url'  => 'load-orders/list-by-country/4',
                    'icon' => 'fas fa-user-plus'
                ],
                [
                    'text' => 'Bulgaria',
                    'url'  => 'load-orders/list-by-country/5',
                    'icon' => 'fas fa-user-plus'
                ],
                /*[
                    'text' => 'Croacia',
                    'url'  => 'users/create',
                    'icon' => 'fas fa-user-plus'
                ],
                [
                    'text' => 'Dinamarca',
                    'url'  => 'users/create',
                    'icon' => 'fas fa-user-plus'
                ],
                [
                    'text' => 'Estonia',
                    'url'  => 'users/create',
                    'icon' => 'fas fa-user-plus'
                ],*/
                [
                    'text' => 'Francia',
                    'url'  => 'load-orders/list-by-country/6',
                    'icon' => 'fas fa-user-plus'
                ],
                [
                    'text' => 'Holanda',
                    'url'  => 'load-orders/list-by-country/7',
                    'icon' => 'fas fa-user-plus'
                ],
                [
                    'text' => 'Italia',
                    'url'  => 'load-orders/list-by-country/8',
                    'icon' => 'fas fa-user-plus'
                ],
                [
                    'text' => 'Portugal',
                    'url'  => 'load-orders/list-by-country/9',
                    'icon' => 'fas fa-user-plus'
                ],
                [
                    'text' => 'Grecia',
                    'url'  => 'load-orders/list-by-country/10',
                    'icon' => 'fas fa-user-plus'
                ],
                [
                    'text' => 'Hungría',
                    'url'  => 'load-orders/list-by-country/11',
                    'icon' => 'fas fa-user-plus'
                ],
                [
                    'text' => 'Polonia',
                    'url'  => 'load-orders/list-by-country/12',
                    'icon' => 'fas fa-user-plus'
                ],
                [
                    'text' => 'Rumania',
                    'url'  => 'load-orders/list-by-country/13',
                    'icon' => 'fas fa-user-plus'
                ],
                /*[
                    'text' => 'Eslovaquia',
                    'url'  => 'users/create',
                    'icon' => 'fas fa-user-plus'
                ],
                [
                    'text' => 'Eslovenia',
                    'url'  => 'users/create',
                    'icon' => 'fas fa-user-plus'
                ],*/
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Configure which JavaScript plugins should be included. At this moment,
    | DataTables, Select2, Chartjs and SweetAlert are added out-of-the-box,
    | including the Javascript and CSS files from a CDN via script and link tag.
    | Plugin Name, active status and files array (even empty) are required.
    | Files, when added, need to have type (js or css), asset (true or false) and location (string).
    | When asset is set to true, the location will be output using asset() function.
    |
    */

    'plugins' => [
        [
            'name' => 'Datatables',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.css',
                ],
            ],
        ],
        [
            'name' => 'Select2',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        [
            'name' => 'Chartjs',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        [
            'name' => 'Sweetalert2',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//unpkg.com/sweetalert/dist/sweetalert.min.js',
                ],
            ],
        ],
        [
            'name' => 'Pace',
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],
];
