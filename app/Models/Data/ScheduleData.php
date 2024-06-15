<?php

namespace App\Models\Data;


/**
 * ScheduleData data
 * @class
 */
class ScheduleData
{

    /**
     * Schedule Id
     *
     * @var string
     */
    protected string $scheduleId;

    /**
     * Schedule Time
     *
     * @var string
     */
    protected string $scheduleTime;


    /**
     * Schedule State
     *
     * @var string
     */
    protected string $scheduleState;



     /**
     * @return string
     */
    public function getScheduleId(): string
    {
        return $this->scheduleId;
    }

    /**
     * @param  string  $scheduleId
     *
     * @return self
     */
    public function setScheduleId(string $scheduleId): self
    {
        $this->scheduleId = $scheduleId;
        return $this;
    }


    /**
     * @return string
     */
    public function getScheduleTime(): string
    {
        return $this->scheduleTime;
    }

    /**
     * @param  string  $scheduleTime
     *
     * @return self
     */
    public function setScheduleTime(string $scheduleTime): self
    {
        $this->scheduleTime = $scheduleTime;
        return $this;
    }


       /**
     * @return string
     */
    public function getScheduleState(): string
    {
        return $this->scheduleState;
    }

    /**
     * @param  string  $scheduleState
     *
     * @return self
     */
    public function setScheduleState(string $scheduleState): self
    {
        $this->scheduleState = $scheduleState;
        return $this;
    }
}
