<?php
namespace Superbanner\Form\IdentifiableObject\DataProvider;

use PrestaShop\PrestaShop\Core\Form\IdentifiableObject\DataProvider\FormDataProviderInterface;
use SuperBanner\Model\SuperBanner;

final class SuperBannerFormDataProvider implements FormDataProviderInterface
{
    /**
     * Get form data for given object with given id.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function getData($superbannerId)
    {
        $superbannerObjectModel = new SuperBanner($superbannerId);

        // check that the element exists in db
        if (empty($superbannerObjectModel->id)) {
            throw new PrestaShopObjectNotFoundException('Object not found');
        }

        return [
            'id' => $superbannerObjectModel->id_superbanner,
            'date_begin' => $superbannerObjectModel->date_begin,
            'date_end' => $superbannerObjectModel->date_end,
        ];
    }

    public function getDefaultData()
    {
        return [
            'id' => null,
            'date_begin' => '0000-00-00 00:00:00',
            'date_end' => '0000-00-00 00:00:00',
        ];
    }

}
