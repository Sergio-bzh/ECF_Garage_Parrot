<?php

namespace App\Controller\Admin;

use App\Entity\Schedule;
use Doctrine\ORM\Mapping\Id;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class ScheduleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Schedule::class;
    }


    public function configureFields(string $pageName): iterable
    {
//        yield from parent::configureFields(($pageName));


        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('day_of_week', 'Jour de la semaine'),
            TimeField::new('start_time', 'Heure de dégut'),
            TimeField::new('end_time', 'Heure de fin'),
            TextField::new('schedule_type', 'Type d\'horaire'),
            AssociationField::new('garage'),
        ];
    }

}
