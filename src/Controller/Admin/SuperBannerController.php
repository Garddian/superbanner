<?php
namespace Superbanner\Controller\Admin;

use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use PrestaShop\PrestaShop\Core\Grid\Search\SearchCriteria;

use SuperBanner\Model\SuperBanner;

class SuperBannerController extends FrameworkBundleAdminController
{
    /**
     *
     *
     * @param Request $request
     *
     * @return Response
     */
    public function listAction(Request $request){

        $gridFactory = $this->container->get('superbanner.grid.banner_grid');
        $emptySearchCriteria = new SearchCriteria([],1);

        $superbannerGrid = $gridFactory->getGrid($emptySearchCriteria);
        return $this->render('@Modules/superbanner/views/templates/admin/list.html.twig', [
            'layoutHeaderToolbarBtn' => $this->getToolbarButtons(),
            'superBannerGrid' => $this->presentGrid($superbannerGrid),
        ]);
    }

    public function editAction(Request $request,$id_superbanner){
        $superbannerFormBuilder = $this->get('superbanner.form.builder.superbanner_form_builder');
        $superbannerForm = $superbannerFormBuilder->getFormFor($id_superbanner);

        $superbannerForm->handleRequest($request);

        $superbannerFormHandler = $this->get('superbanner.form.handler.superbanner_form_handler');
        $result = $superbannerFormHandler->handleFor($id_superbanner,$superbannerForm);

        if (null !== $result->getIdentifiableObjectId()) {
            $this->addFlash('success', $this->trans('Successful creation.', 'Admin.Notifications.Success'));

            return $this->redirectToRoute('admin_superbanner_list');
        }

        return $this->render('@Modules/superbanner/views/templates/admin/form.html.twig', [
            'superbannerForm' => $superbannerForm->createView(),
        ]);
    }

    public function createAction(Request $request){
        $superbannerFormBuilder = $this->get('superbanner.form.builder.superbanner_form_builder');
        $superbannerForm = $superbannerFormBuilder->getForm();

        $superbannerForm->handleRequest($request);

        $superbannerFormHandler = $this->get('superbanner.form.handler.superbanner_form_handler');
        $result = $superbannerFormHandler->handle($superbannerForm);

        if (null !== $result->getIdentifiableObjectId()) {
            $this->addFlash('success', $this->trans('Successful creation.', 'Admin.Notifications.Success'));

            return $this->redirectToRoute('admin_superbanner_list');
        }

        return $this->render('@Modules/superbanner/views/templates/admin/form.html.twig', [
            'superbannerForm' => $superbannerForm->createView(),
        ]);
    }

    public function deleteAction(Request $request,$id_superbanner){


       echo 'ocucou';
    }

    private function getToolbarButtons()
    {
        return [
            'add' => [
                'href' => $this->generateUrl('admin_superbanner_create'),
                'desc' => $this->trans('New Super Banner', 'Modules.Superbanner.Admin'),
                'icon' => 'add_circle_outline',
            ],
        ];
    }
}