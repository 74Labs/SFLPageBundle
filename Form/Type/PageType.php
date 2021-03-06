<?php 
namespace SFL\PageBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PageType extends AbstractType
{

    public function buildForm (FormBuilderInterface $builder, array $options)
    {
        $builder->add('url', 'text', array('disabled' => true));
        $builder->add('title');
        $builder->add('layout', 'text', array('required' => false));
        $builder->add('published', 'checkbox', array('required' => false));
        $builder->add('content', 'textarea');
    }

    public function setDefaultOptions (OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
                'data_class' => 'SFL\PageBundle\Entity\Page'
        ));
    }

    public function getName ()
    {
        return 'page';
    }
}