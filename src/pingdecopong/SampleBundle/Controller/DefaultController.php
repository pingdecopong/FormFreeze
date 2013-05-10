<?php

namespace pingdecopong\SampleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use pingdecopong\SampleBundle\Form\SystemUserFormModel;
use pingdecopong\SampleBundle\Form\SystemUserFormType;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * 新規作成　入力フォーム
     *
     * @Route("/new", name="systemuser_new")
     * @Template()
     */
    public function newAction(Request $request)
    {
        $formModel = new SystemUserFormModel();
        $formType = new SystemUserFormType();
        $form = $this->createForm($formType, $formModel, array('validation_groups' => array('nonValidation')));

        if($request->isMethod('POST')){
            $form->bind($request);
        }

        return array(
            'entity' => $formModel,
            'form' => $form->createView(),
        );
    }

    /**
     * 新規作成　確認画面
     * @Route("/newconfirm", name="systemuser_new_confirm")
     * @Method("POST")
     * @Template()
     */
    public function newConfirmAction(Request $request)
    {
        $formModel = new SystemUserFormModel();
        $formType = new SystemUserFormType();
//        $form = $this->createForm($formType, $formModel, array('freeze' => true));

        /* @var $builder \Symfony\Component\Form\FormBuilderInterface */
        $builder = $this->get('form.factory')->createBuilder($formType, $formModel);
        $form = $builder->getForm();
        $form->bind($request);

        if($form->isValid()){

//            $a = $form['imgFile']->getData();

            $builder->setAttribute('freeze', true);
            $form = $builder->getForm();

            return array(
                'entity' => $formModel,
                'form' => $form->createView(),
            );

        }

        return $this->render('pingdecopongSampleBundle:Default:new.html.twig',
            array(
                'entity' => $formModel,
                'form' => $form->createView()
            ));
    }

    /**
     * 新規作成　実行
     *
     * @Route("/newcreate", name="systemuser_new_create")
     * @Method("POST")
     * @Template()
     */
    public function newCreateAction(Request $request)
    {
        $formModel = new SystemUserFormModel();
        $formType = new SystemUserFormType();
        $form = $this->createForm($formType, $formModel);
        $form->bind($request);

        if($form->isValid()){

            //処理実行

            return $this->redirect($this->generateUrl('systemuser_new_end'));
        }

        return array();
    }

    /**
     * 新規作成　完了
     *
     * @Route("/newend", name="systemuser_new_end")
     * @Template()
     */
    public function newEndAction()
    {
        return array();
    }
}
