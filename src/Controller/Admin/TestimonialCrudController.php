<?php

namespace App\Controller\Admin;

use App\Entity\Testimonial;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;


class TestimonialCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Testimonial::class;
    }

    public function configureFields(string $pageName): iterable
    {
//        yield from parent::configureFields($pageName);
        yield IdField::new('id')
            ->hideOnForm();
        yield TextField::new('user_name', 'Nom');
        yield TextareaField::new('content', 'Contenu');
//        yield NumberField::new('score', 'Note');
        yield ChoiceField::new('score', 'Note')->setChoices([
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5'
        ])->renderExpanded();
        yield BooleanField::new('is_approved', 'Validé')->renderAsSwitch();
        yield AssociationField::new('garage', 'Selectionnez le garage');

        /*
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];*/
    }


    public function configureCrud(Crud $crud): Crud
    {


//      the labels used to refer to this entity in titles, buttons, etc.
        return $crud
//            ->setEntityLabelInPlural('Commentaires')
            ->setEntityLabelInSingular('Commentaire')
            ->setPageTitle('index', 'Commentaires')
            ->setPageTitle('new', 'Créer commentaire')
            ->setPageTitle('edit', 'Modifier commentaire')
            ;
    }

}
