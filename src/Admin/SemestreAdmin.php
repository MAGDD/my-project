<?php
/**
 * Created by PhpStorm.
 * User: dmadmin
 * Date: 24/06/2018
 * Time: 01:05
 */

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Ecole;
use App\Entity\Cursus;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class SemestreAdmin extends  AbstractAdmin
{

    protected function configureFormFields(FormMapper $formMapper)
    {

        $formMapper->add('nomsemestre', TextType::class);

        $formMapper->add('idecole', EntityType::class ,array(
            'class'=>Ecole::class,
            'choice_label' => 'nomecole',
            'multiple'=>true,
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('u')
                    ->andWhere('u.idecole=  :idecole')
                    ->setParameter('idecole', 1);
            },
        ));
    }
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('nomsemestre');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('idsemestre');
        $listMapper->addIdentifier('nomsemestre');
        $listMapper->addIdentifier('idecole');
    }

}