<?php

namespace App\Controller\Admin;

use App\Entity\Testimonial;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class TestimonialCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Testimonial::class;
    }


    public function configureFields(string $pageName): iterable
    {
//        yield from parent::configureFields($pageName);
        yield NumberField::new('id')
            ->hideOnForm();
        yield TextField::new('user_name');
        yield TextareaField::new('content');
        yield NumberField::new('score');
        yield Field::new('is_approved');
        yield AssociationField::new('garage');

        /*
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];*/
    }

}
