<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Booking;

#use Orchid\Platform\Models\User;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Persona;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use App\Models\Bookings;

class BookingListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'bookings';

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('Date', __('Date'))
                ->sort()
                ->render(function (Bookings $Bookings) {
                    return $Bookings->Date;
                }),
            TD::make('Time', __('Timeslot'))
                ->sort()
                ->render(function (Bookings $Bookings) {
                    return $Bookings->Time;
                }),
            TD::make('Name', __('Name'))
                ->sort()
                ->cantHide()
                #->filter(TD::FILTER_TEXT)
                ->render(function (Bookings $bookings) {
                    return $bookings->FirstName . " ". $bookings->LastName;
                }),
            TD::make('Vehicle', __('Vehicle Reg'))
                ->sort()
                ->render(function (Bookings $Bookings) {
                    return $Bookings->registrationNumber;
                }),
            TD::make('PhoneNumber', __('PhoneNumber'))
                ->sort()
                ->render(function (Bookings $Bookings) {
                    return $Bookings->PhoneNumber;
                }),
            TD::make('Email', __('Email'))
                ->sort()
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->render(function (Bookings $bookings) {
                    return $bookings->Email;
                }),
        ];
    }
}
