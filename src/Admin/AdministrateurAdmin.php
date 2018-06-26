<?php
/**
 * Created by PhpStorm.
 * User: dmadmin
 * Date: 11/05/2018
 * Time: 19:19
 */

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AdministrateurAdmin extends   AbstractAdmin
{

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('nom', TextType::class);
        $formMapper->add('prenom', TextType::class);
        $formMapper->add('password', PasswordType::class);
        $formMapper->add('email', EmailType::class);
        $formMapper->add('telephone', TextType::class);
        $formMapper->add('role', ChoiceType::class, array(
            'choices'  => array(
                'Eleve' => null,
                'Admin' => true,
                'Prof' => false,)
            ));


    }
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('nom');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('nom');
        $listMapper->addIdentifier('prenom');
        $listMapper->addIdentifier('password');
        $listMapper->addIdentifier('email');
        $listMapper->addIdentifier('telephone');
        $listMapper->addIdentifier('role');


    }

}