<?php
/**
 * Created by PhpStorm.
 * User: dmadmin
 * Date: 11/05/2018
 * Time: 18:38
 */

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EleveAdmin extends  AbstractAdmin
{

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('nom', TextType::class);
        $formMapper->add('prenom', TextType::class);
        $formMapper->add('password', PasswordType::class);
        $formMapper->add('email', EmailType::class);
        $formMapper->add('telephone', ChoiceType::class);


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


    }
}