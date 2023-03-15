<?php

namespace Laravel\Jetstream\Http\Livewire;

use Livewire\Component;

class NavigationMenu extends Component
{
    /**
     * The component's listeners.
     *
     * @var array
     */
    public $menuItems = [
        [
            'name' => 'Área Privada',
            'link' => '/',
            'dropdown' => [
                [
                    'name' => 'Gestiona tu floristería',
                    'link' => '/dashboard',
                ],
                [
                    'name' => 'Información societaria',
                    'link' => '/informacion-societaria',
                ],
                [
                    'name' => 'Directorio asociados',
                    'link' => '/directorio-asociados',
                ],             
                [
                    'name' => 'Descuentos',
                    'link' => '/descuentos',
                ],                
                [
                    'name' => 'Descargas',
                    'link' => '/descargas',
                ],                
                [
                    'name' => 'Galería',
                    'link' => '/galeria',
                ],
                [
                    'name' => 'Revista AEFI',
                    'link' => '/revista',
                ],
            ],
        ],
        [
            'name' => 'Florista Directo',
            'link' => '/',
            'dropdown' => null,
        ],
    ];
    protected $listeners = [
        'refresh-navigation-menu' => '$refresh',
    ];

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('navigation-menu');
    }
}
