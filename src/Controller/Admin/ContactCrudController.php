<?php

namespace App\Controller\Admin;

use App\Entity\Contact;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ContactCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Contact::class;
    }


    public function configureFields(string $pageName): iterable
    {
//        yield from parent::configureFields($pageName);
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('last_name', 'Nom');
        yield TextField::new('first_name', 'Prénom');
        yield EmailField::new('email');
        yield TextField::new('phone_number', 'Téléphone');
        yield TextField::new('subject', 'Sujet');
        yield TextareaField::new('message');
        yield AssociationField::new('garage');

        /*
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];*/
    }

    public function configureCrud(Crud $crud): Crud
    {
//        return parent::configureCrud($crud);
        return $crud
            ->setEntityLabelInPlural('Demande de contact')
            ->setEntityLabelInSingular('Contact')
            ->setPageTitle('edit', 'Ajouter une demande de contact')
            ;
    }
}
