<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\ScheduleService;
use App\Models\Data\ScheduleData;

class ScheduleServiceTest extends TestCase
{
    protected $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = $this->app->make(ScheduleService::class);
    }

    /**
     * @test
     */
    public function createSchedule()
    {
        $scheduleData = new ScheduleData();
        $scheduleData
            ->setScheduleTime("04:45")
            ->setScheduleState(true);


        $result = $this->service->createSchedule($scheduleData);
        $this->assertTrue($result);
    }

    /**
     * @test
     */

     public function createMovieSchedule()
     {
         $scheduleData = new ScheduleData();
         $scheduleData
             ->setScheduleId(2)
             ->setScheduleTime("12:12")
             ->setScheduleState(true);

             $result = $this->service->createMovieSchedule($scheduleData,2);

             $this->assertStringContainsString("Schedule created and linked to movie.", $result->getData()->message);
     }

    /**
     * @test
     */
    public function getAllSchedules()
    {
        $result = $this->service->getAllSchedules();
        $expectedKeys = ['time', 'state'];
        $this->assertArrayHasKeys($expectedKeys, $result->toArray()[0]);
    }

    /**
     * @test
     */
    public function getScheduleById()
    {
        $result = $this->service->getScheduleById(2);
        $expectedKeys = ['time', 'state'];

        $this->assertArrayHasKeys($expectedKeys, $result->toArray());
    }

    /**
     * @test
     */

    public function updateSchedule()
    {
        $scheduleData = new ScheduleData();
        $scheduleData
            ->setScheduleId(2)
            ->setScheduleTime("04:45")
            ->setScheduleState(true);

        $result = $this->service->updateSchedule($scheduleData);

        $expectedKeys = ['id', 'time', 'state', 'created_at', 'updated_at'];

        $this->assertArrayHasKeys($expectedKeys, $result->toArray());
    }



    /**
     * @test
     */
    public function deleteSchedule()
    {
        $result = $this->service->deleteSchedule(1);
        $this->assertNull($result);
    }



    // Custom assertion method
    protected function assertArrayHasKeys(array $keys, array $array)
    {
        foreach ($keys as $key) {
            $this->assertArrayHasKey($key, $array);
        }
    }
}
