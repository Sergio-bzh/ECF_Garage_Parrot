<?php

namespace App\Service;

use App\Entity\Schedule;
use Doctrine\ORM\EntityManagerInterface;

class ScheduleService
{
    private array $displaySchedules;
    private array $daysOfWeek = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];

    public function getDisplaySchedules():array
    {
        return $this->displaySchedules;
    }

    public function __Construct(EntityManagerInterface $entityManager)
    {
        $scheduleRepo = $entityManager->getRepository(Schedule::class);
        $extractedSchedules = $scheduleRepo->findAll();

        $morning = array();
        $afternoon = [];

        foreach ($extractedSchedules as $schedule) {
            $bddDayOfWeek = $schedule->getDayOfWeek();

/*          The $index variable keeps the indexNumber from array "$this->daysOfWeek" where the value coming from database was found
            after comparision in "array_search" function and this index is used to initialize both "$morning" and "$afternoon" arrays */
            $index = array_search($bddDayOfWeek, $this->daysOfWeek);
            if ($schedule->getScheduleType() === 'Matin') {
                $morning[$index] = $schedule->getStartTime()->format('H:i') . '/' . $schedule->getEndTime()->format('H:i');
            } else {
                $afternoon[$index] = $schedule->getStartTime()->format('H:i') . '/' . $schedule->getEndTime()->format('H:i');
            }
        }

        foreach ($this->daysOfWeek as $index => $day) {
            if(isset($morning[$index]) && isset($afternoon[$index])){
                $this->displaySchedules[] = "$day : $morning[$index] <=> $afternoon[$index]";
            }
        }
    }
}