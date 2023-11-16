<?php

namespace App\Controller\Admin;

use App\Entity\Vehicle;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class VehicleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vehicle::class;
    }


    public function configureFields(string $pageName): iterable
    {
//      I had catched here the parameters in order to avoid hard-setting the basePath
//      J'avais récupèré ici les paramètres et j'évite de définir en dur le basePath
//        $vichMappingParams = $this->getParameter('vich_uploader.mappings');
//        $vehicleImagePath = $vichMappingParams['vehicles']['uri_prefix'];

//        yield from parent::configureFields($pageName);
        yield IdField::new('id')->hideOnForm();
        yield NumberField::new('kilometers', 'Kilomètrage');
        yield NumberField::new('price', 'Prix');
        yield TextareaField::new('description')->hideOnIndex();
        yield DateField::new('registration_date', 'Mise en circulation');
        yield TextField::new('vehicle_name', 'Nom du véhicule');

        yield TextareaField::new('imageFile', 'Fichier de l\'image')->setFormType(VichImageType::class)->hideOnIndex();
//        yield ImageField::new('imageName', 'Photo chargée')->setUploadDir('./assets/images/vehicles')->hideOnIndex();
        yield ImageField::new('imageName', 'Photo')->setBasePath('./build/images/vehicles')->hideOnForm();
//        yield ImageField::new('imageName', 'Photo')->setBasePath($vehicleImagePath)->hideOnForm();

        yield AssociationField::new('model', 'Modèle');
        yield AssociationField::new('garage');
        yield AssociationField::new('options');
        yield AssociationField::new('images');
        /*
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];*/
    }
}
