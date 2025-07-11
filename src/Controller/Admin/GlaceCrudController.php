<?php

namespace App\Controller\Admin;

use App\Entity\Glace;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class GlaceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Glace::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom'),
            TextField::new('ingredientSpecial'),
        ];
    }
}
