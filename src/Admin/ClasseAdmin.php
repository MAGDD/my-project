<?php
/**
 * Created by PhpStorm.
 * User: dmadmin
 * Date: 11/05/2018
 * Time: 17:15
 */

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Ecole;
use Doctrine\ORM\EntityRepository;

class ClasseAdmin  extends  AbstractAdmin
{

    protected function configureFormFields(FormMapper $formMapper)
    {

        $formMapper->add('nomclasse', TextType::class);

        $formMapper->add('idecole', EntityType::class ,array(
            'class'=>Ecole::class
             ,'choice_label' => 'nomecole',
             'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('u')
                    ->andWhere('u.idecole=  :idecole')
                    ->setParameter('idecole', 1);
            },

        ));

    }
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('nomclasse');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('idclasse');
        $listMapper->addIdentifier('nomclasse');
    }


    // ...

}