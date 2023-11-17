<?php

namespace App\Controller\Admin;

use App\Entity\Image;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Image::class;
    }



    public function configureFields(string $pageName): iterable
    {
        yield from parent::configureFields($pageName);
        yield TextField::new('title', 'Nom de l\'image');
        yield AssociationField::new('vehicle', 'Véhicule');
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
            ->setEntityLabelInPlural('Images')
            ->setEntityLabelInSingular('Image')
            ->setPageTitle('new', 'Ajouter image')
            ->setPageTitle('edit', 'Ajouter image');
    }
}
