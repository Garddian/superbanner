<?php

// To blocked when the file it's execute without Prestashop's context
if (!defined('_PS_VERSION_')) {
    exit;
}
use PrestaShop\PrestaShop\Adapter\SymfonyContainer;

class superbanner extends Module
{
    public $tabs = [
        [
            'name' => 'test banner', // One name for all langs
            'class_name' => 'AdminSuperBanner',
            'visible' => true,
            'parent_class_name' => 'ShopParameters',
            'route_name'=>'admin_superbanner_list',
        ],
    ];

    public function __construct()
    {
        $this->name = 'superbanner';
        $this->tab = 'themes';
        $this->version = '1.0.0';
        $this->author = 'me';
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
        $this->need_instance = 0;
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->trans('Pro mega Super Banner');
        $this->description = $this->trans('The best banner\'s module');

        // Confirm uninstall
        $this->confirmUninstall = $this->trans('Are you sure you want to uninstall this module? All data will be delete !');
    }

    public function install()
    {
        $installed = parent::install() && $this->registerHook('displayHome');
        if($installed)
        {

            Db::getInstance()->execute(
                'CREATE TABLE `' . _DB_PREFIX_ . 'superbanner` (
`id_superbanner` INT NOT NULL,
`date_begin` DATE NOT NULL,
`date_end` DATE NOT NULL,
PRIMARY KEY (`id_superbanner`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;'
            );

            Configuration::updateValue('SUPERBANNER_PATH','/modules/superbanner');
            Configuration::updateValue('SUPERBANNER_HEIGHT','50px');
            Configuration::updateValue('SUPERBANNER_WIDTH','500px');
        }

        return $installed;
    }



    public function getContent(){


        if(Tools::getIsset('submitConfiguration'))
        {
            Configuration::updateValue('SUPERBANNER_PATH',Tools::getValue('superbanner_path'));
            Configuration::updateValue('SUPERBANNER_HEIGHT',Tools::getValue('superbanner_height'));
            Configuration::updateValue('SUPERBANNER_WIDTH',Tools::getValue('superbanner_width'));
        }
        $router = SymfonyContainer::getInstance()->get('router');

        $this->context->smarty->assign(array(
            'superbanner_path' => Configuration::get('SUPERBANNER_PATH'),
            'superbanner_height' => Configuration::get('SUPERBANNER_HEIGHT'),
            'superbanner_width' => Configuration::get('SUPERBANNER_WIDTH'),
        ));

        return $this->display(__FILE__, 'views/templates/admin/configuration.tpl');
    }

    public function hookDisplayHome()
    {
        $this->context->smarty->assign(array(
            'superbanner_link' => $this->context->link->getModuleLink('superbanner', 'banners'),
            'superbanner_path' => Configuration::get('SUPERBANNER_PATH'),
            'superbanner_height' => Configuration::get('SUPERBANNER_HEIGHT'),
            'superbanner_width' => Configuration::get('SUPERBANNER_WIDTH'),
        ));
        return $this->display(__FILE__,'views/templates/hook/home.tpl');
    }

}
