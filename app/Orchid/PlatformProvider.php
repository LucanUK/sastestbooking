<?php

namespace App\Orchid;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use Orchid\Support\Color;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * @param Dashboard $dashboard
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * @return Menu[]
     */
    public function registerMainMenu(): array
    {
        return [
            

            Menu::make('Booking Manager')
                ->icon('calendar')
                ->route('platform.main.bookingmanager')
                ->permission('platform.main.bookingmanager'),
            Menu::make('DVLA Vehicle Lookup')
                ->icon('magnifier')
                ->route('platform.main.vehiclelookup')
                ->divider()
                ->permission('platform.main.vehiclelookup'),

            Menu::make('Access Management')
                ->icon('lock')
                ->list([
                Menu::make(__('Users'))
                    ->icon('user')
                    ->route('platform.systems.users')
                    ->permission('platform.systems.users'),
                Menu::make(__('Roles'))
                    ->icon('lock')
                    ->route('platform.systems.roles')
                    ->permission('platform.systems.roles'),
                    ])
                ->divider()
                ->permission('platform.systems.access'),
                
            Menu::make('Examples')
                ->icon('code')
                ->title('Examples Section')
                ->list([
                    Menu::make('Example screen')
                ->icon('monitor')
                ->route('platform.example')
                
                ->badge(function () {
                    return 6;
                }),
                    Menu::make('Sub element item 1')->icon('bag'),
                    Menu::make('Sub element item 2')->icon('heart'),
                

            Menu::make('Basic Elements')
                ->title('Form controls')
                ->icon('note')
                ->route('platform.example.fields'),

            Menu::make('Advanced Elements')
                ->icon('briefcase')
                ->route('platform.example.advanced'),

            Menu::make('Text Editors')
                ->icon('list')
                ->route('platform.example.editors'),

            Menu::make('Overview layouts')
                ->title('Layouts')
                ->icon('layers')
                ->route('platform.example.layouts'),

            Menu::make('Chart tools')
                ->icon('bar-chart')
                ->route('platform.example.charts'),

            Menu::make('Cards')
                ->icon('grid')
                ->route('platform.example.cards')
                ->divider(),
                
            ])
            ->permission('platform.main.examples'),
        ];
    }

    /**
     * @return Menu[]
     */
    public function registerProfileMenu(): array
    {
        return [
            Menu::make('Profile')
                ->route('platform.profile')
                ->icon('user'),
        ];
    }

    /**
     * @return ItemPermission[]
     */
    public function registerPermissions(): array
    {
        return [
            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users'))
                ->addPermission('platform.systems.access', __('Access Management')),
            ItemPermission::group(__('Main'))
                ->addPermission('platform.main.examples', __('Examples')),
            ItemPermission::group(__('Manager'))
                ->addPermission('platform.main.bookingmanager', __('Booking Manager'))
                ->addPermission('platform.main.vehiclelookup', __('Vehicle Lookup'))

                
        ];
    }

    /**
     * @return string[]
     */
    public function registerSearchModels(): array
    {
        return [
            // ...Models
            // \App\Models\User::class
        ];
    }
}
