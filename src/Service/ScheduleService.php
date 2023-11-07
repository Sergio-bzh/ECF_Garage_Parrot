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
            $index = array_search($bddDayOfWeek, $this->daysOfWeek);
            if ($schedule->getScheduleType() === 'Matin') {
                $morning[$index] = $schedule->getStartTime()->format('H:i') . '/' . $schedule->getEndTime()->format('H:i');
            } else {
                $afternoon[$index] = $schedule->getStartTime()->format('H:i') . '/' . $schedule->getEndTime()->format('H:i');
            }
        }

        foreach ($this->daysOfWeek as $index => $day) {
//            echo "Day: $day\n";
//            echo "Morning: " . $morning[$index] . "\n";
//            echo "Afternoon: " . $afternoon[$index] . "\n", "<br>";
            $this->displaySchedules[] = "$day : $morning[$index] <=> $afternoon[$index]";
        }
    }
}