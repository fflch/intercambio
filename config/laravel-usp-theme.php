<?php

$submenu1 = [
    [
        'type' => 'header',
        'text' => 'Cadastros',
    ],
    [
        'text' => 'Discente',
        'url' => config('app.url') . '/Discente',
    ],
    [
        'text' => 'DiscenteOpt',
        'url' => config('app.url') . '/DiscenteOpt',
        
    ],
   
];

$submenu2 = [
    [
        'text' => 'Discente',
        'url' => config('app.url') . '/Discente',
    ],
    [
        'text' => 'DiscenteOpt',
        'url' => config('app.url') . '/DiscenteOpt',
        
    ],
];
$menu = [
    [
        'text' => '<i class="fas fa-home"></i> Item 1',
        'url' => config('app.url') . '/item1',
    ],
    [
        'text' => 'Item 2',
        'url' => config('app.url') . '/item2',
        'can' => '',
    ],
    [
        'text' => 'Item 3',
        'url' => config('app.url') . '/item3',
        'can' => 'admin',
    ],
    [
        'text' => 'SubMenu1',
        'submenu' => $submenu1,
    ],
    [
        'text' => 'SubMenu2',
        'submenu' => $submenu2,
        'can' => 'admin',
    ],
];

$right_menu = [
    [
        'text' => '<i class="fas fa-cog"></i>',
        'title' => 'Configurações',
        'target' => '_blank',
        'url' => config('app.url') . '/item1',
        'align' => 'right',
    ],
];

# dashboard_url renomeado para app_url
# USPTHEME_SKIN deve ser colocado no .env da aplicação 

return [
    'title' => config('app.name'),
    'skin' => env('USP_THEME_SKIN', 'uspdev'),
    'app_url' => config('app.url'),
    'logout_method' => 'POST',
    'logout_url' => config('app.url') . '/logout',
    'login_url' => config('app.url') . '/login',
    'menu' => $menu,
    'right_menu' => $right_menu,
];
