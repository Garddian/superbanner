<?php
/**
 * <ModuleClassName> => SuperBanner
 * <FileName> => Banners.php
 * Format expected: <ModuleClassName><FileName>ModuleFrontController
 */


class SuperbannerBannersModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();
        $this->context->smarty->assign(
            array(
                'banners' => [
                    ['id'=>3,'path'=>'https://www.prestashop.com/sites/default/files/lp_header_1920x475_0.png'],
                    ['id'=>4,'path'=>'https://www.prestashop.com/sites/default/files/lp_psplatform_header.jpg']
                ],
                'superbanner_height' => Configuration::get('SUPERBANNER_HEIGHT'),
                'superbanner_width' => Configuration::get('SUPERBANNER_WIDTH'),
            ));
        $this->setTemplate('module:superbanner/views/templates/front/banners.tpl');
    }

    public function setMedia()
    {
        parent::setMedia();

        $this->registerStylesheet(
            'module-banner-style',
            'modules/'.$this->module->name.'/views/css/banner.css',
            [
                'media' => 'all',
                'priority' => 200,
            ]
        );

        $this->registerJavascript(
            'module-banner-js',
            'modules/'.$this->module->name.'/views/js/banner.js',
            [
                'priority' => 200,
                'attribute' => 'async',
            ]
        );
    }
}