<?php
namespace Superbanner\Form\IdentifiableObject\DataHandler;

use PrestaShop\PrestaShop\Core\Form\IdentifiableObject\DataHandler\FormDataHandlerInterface;
use SuperBanner\Model\SuperBanner;

final class SuperBannerFormDataHandler implements FormDataHandlerInterface
{
    /**
     * Create object from form data.
     *
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data)
    {
        $superBannerObjectModel = new SuperBanner();
        $superBannerObjectModel->date_begin = $data['date_begin'];
        $superBannerObjectModel->date_end = $data['date_end'];
        $superBannerObjectModel->save();

        return $superBannerObjectModel->id;
    }

    /**
     * Update object with form data.
     *
     * @param int $id
     * @param array $data
     */
    public function update($id, array $data)
    {
        $superBannerObjectModel = new SuperBanner($id);
        $superBannerObjectModel->date_begin = $data['date_begin'];
        $superBannerObjectModel->date_end = $data['date_end'];
        $superBannerObjectModel->update();
    }
}