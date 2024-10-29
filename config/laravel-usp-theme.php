<?php

$pedidos = [
    [
        'text' => 'Reaproveitamento de créditos',
        'url'  =>  config('app.url') . '/pedidos/create',
        'can'  => 'grad'
    ],
];

$menu = [
    [
        'text' => 'Nova solicitação',
        'submenu' => $pedidos,
        'can'  => 'grad'
    ],
    [
        'text' => 'Pedidos',
        'url' => config('app.url') . '/pedidos',
        'can' => 'admin',
        'submenu' => [
                [
                    'text' => 'Pedidos',
                    'url' => config('app.url') . '/pedidos',
                    'can' => 'admin',
                ],
                [
                    'text' => 'Relatórios para Aprovação',
                    'url' => config('app.url') . '/relatorios',
                    'can' => 'admin',
                ]
            ]
        ],
    [
        'text' => 'Meus Pedidos',
        'url' => config('app.url') . '/meus_pedidos',
        'can' => 'grad'
    ],
    [
        'text' => 'Países',
        'url' => config('app.url') . '/country',
        'can' => 'admin',
    ],
    [
        'text' => 'Meus Pareceres',
        'url' => config('app.url') . '/docente',
        'can' => 'docente',
    ],
    [
        'text' => 'Relatórios',
        'url' => config('app.url') . '/relatorios/aprovados',
    ],
    [
        'text' => 'Serviço de Graduação',
        'url' => config('app.url') . '/sg',
        'can' => 'sg',
    ],
    [
        'text' => 'Comissão de Graduação',
        'url' => config('app.url') . '/cg',
        'can' => 'cg',
    ],
];

$right_menu = [
    [
        'key' => 'senhaunica-socialite',
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
    'skin' => env('USP_THEME_SKIN', 'fflch'),
    'app_url' => config('app.url'),
    'logout_method' => 'POST',
    'logout_url' => config('app.url') . '/logout',
    'login_url' => config('app.url') . '/login',
    'menu' => $menu,
    'right_menu' => $right_menu,
];
