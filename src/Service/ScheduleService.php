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

/*          La variable $index conserve le "indexNumber" du tableau "$this->daysofWeek" où afin de le comparer avec la valeur récupérée
            par la fonction "array_search" sur les données venant de la BDD, puis cette valeur est utilisée pour initialiser les
            tableaux "$morging" et $afternoon
*/
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