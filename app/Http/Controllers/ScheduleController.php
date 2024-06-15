<?php

namespace App\Http\Controllers;

use App\Models\Data\ScheduleData;
use App\Http\Requests\ScheduleRequest;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Services\ScheduleService;

class ScheduleController extends Controller
{
    protected $scheduleService;

    public function __construct(ScheduleService $scheduleService)
    {
        $this->scheduleService = $scheduleService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = $this->scheduleService->getAllSchedules();
        return response()->json($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSchedule(ScheduleRequest $request)
    {
        $scheduleData = new ScheduleData();
        $scheduleData
            ->setScheduleTime($request->time)
            ->setScheduleState($request->state);


        $result = $this->scheduleService->createSchedule($scheduleData);

        // Devolver la película creada en la respuesta
        return response()->json(['schedule' => $result], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function showSchedule($id)
    {
        $result = $this->scheduleService->getScheduleById($id);
        return response()->json($result);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */

    public function updateSchedule(ScheduleRequest $request, $id)
    {
        // Validación de datos
        $scheduleData = new ScheduleData();
        $scheduleData
            ->setScheduleId($id)
            ->setScheduleTime($request->time)
            ->setScheduleState($request->state);




        $result = $this->scheduleService->updateSchedule($scheduleData);

        // Devolver la película creada en la respuesta
        return response()->json(['schedule' => $result], 201);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroySchedule($id)
    {
        $result = $this->scheduleService->deleteSchedule($id);

        return response()->json([
            'mensaje' => '¡Registro eliminado correctamente!',
            'data' => $result
        ]);
    }


    public function createMovieSchedule(Request $request)
    {

        $scheduleData = new ScheduleData();
        $scheduleData
            ->setScheduleTime($request->time)
            ->setScheduleState($request->state);

        $result = $this->scheduleService->createMovieSchedule($scheduleData, $request->movie_id);

        return response()->json(['schedule' => $result], 201);
    }
}
