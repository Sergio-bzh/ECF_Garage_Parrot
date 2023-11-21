<?php

namespace App\Controller\Admin;

use App\Entity\Image;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Image::class;
    }



    public function configureFields(string $pageName): iterable
    {
        $vichMapping = $this->getParameter('vich_uploader.mappings');
//        dd($vichMapping);
        $imagePath = $vichMapping['vehicle_images']['uri_prefix'];
//        dd($imagePath);
//        yield from parent::configureFields($pageName);
        yield AssociationField::new('vehicle', 'Véhicule');
        yield TextField::new('title', 'Nom de l\'image');

        yield TextareaField::new('imageFile', 'Photo du véhicule')
            ->setFormType(VichImageType::class)
            ->hideOnIndex();
        yield ImageField::new('imageName', 'Nom de l\'image')
            ->setBasePath($imagePath)
            ->hideOnForm();
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
