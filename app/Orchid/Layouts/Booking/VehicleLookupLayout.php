<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Booking;

use Orchid\Platform\Models\Role;
use App\Models\VehicleLookup;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Label;
use Orchid\Screen\Fields\Group;

class VehicleLookupLayout extends Rows
{
    /**
     * @var string
     */
//    public $target = 'vehicles';

     /**
     * Views.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Group::make([
            label::make('vehicles.registrationNumber')
                ->title(__('Registration'))
                ->placeholder(__('registrationNumber')),
            label::make('vehicles.make')
                ->title(__('Make'))
                ->placeholder(__('make')),
            label::make('vehicles.model')
                ->title(__('Model'))
                ->placeholder(__('model')),
            label::make('vehicles.colour')
                ->title(__('Colour'))
                ->placeholder(__('Colour')),
            label::make('vehicles.yearOfManufacture')
                ->title(__('Year Of Manu.'))
                ->placeholder(__('Year Of Manu.')),
            
            ]),
            Group::make([
                label::make('vehicles.fuelType')
                    ->title(__('Fuel'))
                    ->placeholder(__('Fuel')),
                label::make('vehicles.engineCapacity')
                    ->title(__('Engine Size'))
                    ->placeholder(__('Engine Size')),
                label::make('vehicles.wheelplan')
                    ->title(__('Wheel Plan'))
                    ->placeholder(__('Wheel Plan')),
                ]),
            Group::make([
            label::make('vehicles.motStatus')
                ->title(__('MOT Status'))
                ->placeholder(__('MOT Status')),
            label::make('vehicles.motExpiryDate')
                ->title(__('MOT Expiry'))
                ->placeholder(__('MOT Expiry')),
            label::make('vehicles.taxStatus')
                ->title(__('Tax Status'))
                ->placeholder(__('Tax Status')),
            label::make('vehicles.taxDueDate')
                ->title(__('Tax Due'))
                ->placeholder(__('Tax Due')),
            ]),
        ];
    }
}
