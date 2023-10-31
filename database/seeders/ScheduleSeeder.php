<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = Employee::all();

        foreach ($employees as $employee) {
            $numberOfDays = random_int(1, 7);
            for ($day = 1; $day <= $numberOfDays; $day++) {
                $scheduledDay = Carbon::now()->addDays($numberOfDays);
                $endHour = array_rand([13, 17, 19]);

                Schedule::query()
                    ->updateOrCreate(
                        [
                            'employee_id' => $employee->id,
                            'date' => $scheduledDay->toDateTimeString(),
                            'start_time' => $scheduledDay->createFromTime(9)->toTimeString(),
                            'end_time' => $scheduledDay->createFromTime($endHour)->toTimeString(),
                        ]
                    );
            }

        }
    }
}
