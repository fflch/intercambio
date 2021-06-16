<?php

$aproveitamento = [
    [
        'text' => 'Nova solicitação',
        'url'  =>  config('app.url') . '/pedidos/create',
        'can'  => 'logado'
    ],
];
$menu = [
    [
        'text' => 'Aproveitamento de Créditos',
        'submenu' => $aproveitamento,
        'can' => 'logado'
    ],
    [
        'text' => 'Pedidos',
        'url' => config('app.url') . '/pedidos',
        'can' => 'admin'
    ],
   
];

$right_menu = [
    [
        'text' => '<i class="fas fa-user-secret"></i>',
        'title' => 'Login As',
        'url' => config('app.url') . '/loginas',
        'align' => 'right',
        'can'   => 'admin'
    ],
    [
        'text' => '<i class="fas fa-cogs"></i>',
        'title' => 'Configurações',
        'url' => config('app.url') . '/settings',
        'align' => 'right',
        'can'   => 'admin'
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
