<?php

namespace pingdecopong\SampleBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SystemUserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', 'hidden', array(
                'label' => 'id',
            ))
            ->add('displayName', 'text', array(
                'label' => 'ユーザ名',
                'required' => true,
                'max_length' => 50,
            ))
            ->add('displayNameKana', 'text', array(
                'label' => 'ユーザ名（カナ）',
                'required' => true,
                'max_length' => 50,
            ))
            ->add('nickName', 'textarea', array(
                'label' => '略称',
                'required' => true,
            ))
            ->add('company', 'choice', array(
                'label' => '会社',
                'required' => false,
                'choices' => array(
                    '1' => 'company1',
                    '2' => 'company2',
                ),
                'attr' => array(
                    'onChange' => 'javascript:changeCompany();',
                ),
            ))
            ->add('department', 'choice', array(
                'label' => '部署',
                'required' => false,
                'choices' => array(
                    '1' => 'department1',
                    '2' => 'department2',
                ),
                'expanded' => false,
                'multiple' => true,
            ))
            ->add('mailAddress', 'text', array(
                'label' => 'メールアドレス',
                'required' => true,
                'max_length' => 100,
            ))
            ->add('systemRoleId', 'integer', array(
                'label' => '権限番号',
                'required' => true,
            ))
            ->add('createDatetime', 'datetime', array(
                'label' => '登録日時',
                'required' => true,
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'pingdecopong\SampleBundle\Form\SystemUserFormModel',
        ));
    }

    public function getName()
    {
        return 'systemuser';
    }
}