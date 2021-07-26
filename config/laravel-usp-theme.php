<?php

$menu = [
    [
        'text' => 'Nova solicitação',
        'url'  =>  config('app.url') . '/pedidos/create',
        'can'  => 'grad'
    ],
    [
        'text' => 'Pedidos',
        'url' => config('app.url') . '/pedidos',
        'can' => 'admin'
    ],
    [
        'text' => 'Meus Pedidos',
        'url' => config('app.url') . '/meus_pedidos',
        'can' => 'grad'
    ],
    [
        'text' => 'Alterações dos países',
        'url' => config('app.url') . '/country',
        'can' => 'admin',
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
    [
        'text' => '<i class="fas fa-hard-hat"></i>',
        'title' => 'Logs',
        'target' => '_blank',
        'url' => config('app.url') . '/logs',
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
