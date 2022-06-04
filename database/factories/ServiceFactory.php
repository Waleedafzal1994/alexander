<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'user_id' => 1,
            'category_id' => 1,
            'category_type_id' => 1,
            'active' => 1,
            'price' => 5,
            'monday_from' => '00:00:00',
            'tuesday_from' => '00:00:00',
            'wednesday_from' => '00:00:00',
            'thursday_from' => '00:00:00',
            'friday_from' => '00:00:00',
            'saturday_from' => '00:00:00',
            'sunday_from' => '00:00:00',
            'monday_to' => '23:59:59',
            'tuesday_to' => '23:59:59',
            'wednesday_to' => '23:59:59',
            'thursday_to' => '23:59:59',
            'friday_to' => '23:59:59',
            'saturday_to' => '23:59:59',
            'sunday_to' => '23:59:59'
        ];
    }
}
