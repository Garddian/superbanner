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
            'superBannerGrid' => $this->presentGrid($superbannerGrid),
        ]);
    }

    public function editAction(Request $request){
        return $this->render('@Modules/superbanner/views/templates/admin/list.html.twig', [
            'text' => 'edit !!!',
        ]);
    }
}