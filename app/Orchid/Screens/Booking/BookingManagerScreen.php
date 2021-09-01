<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Booking;

//use App\Orchid\Layouts\Booking\BookingManagerLayout;

use App\Notifications\BookingAdded;
use Orchid\Platform\Models\Role;
use Orchid\Platform\Models\User;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Alert;


class BookingManagerScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Booking Screen';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Booking Description';

    /**
     * @var string
     */
    public $permission = 'platform.main.bookingmanager';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'roles' => Role::filters()->defaultSort('id', 'desc')->paginate(),
        ];
    }
    public function BookingNotify()
    {
        
        alert('New Booking Flash');
        $user = User::find(2);
        $user->notify(new BookingAdded);
        
        
        return;
    }
    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): array
    {
        return [
            Button::make(__('New Booking'))
                ->icon('event')
                ->method('BookingNotify'),
        ];
    }
/**
     * Views.
     *
     * @throws \Throwable
     *
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): array
    {
        return [
    Layout::rows([

        Group::make([
            DateTimer::make('appointment.pickday')
                ->title('Pick Day')
                ->required()
                ->allowInput()
                ->format('d-m-Y')
                ->enableTime(false),
            Button::make(__('Select'))
                ->icon('event')
                ->method('BookingNotify'),

        ]),


    ])->title('Check Bookings for Day'),
        ];
    }
}
