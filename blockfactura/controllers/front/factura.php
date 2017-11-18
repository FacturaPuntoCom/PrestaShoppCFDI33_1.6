<?php
/**
* 2016 FACTURA PUNTO COM SAPI de CV
*
* NOTICE OF LICENSE
*
* This source file is subject to License
* It is also available through the world-wide-web at this URL:
* https://factura.com
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to apps@factura.com so we can send you a copy immediately.
*
*  @author    factura.com <app@factura.com>
*  @copyright 2016 FACTURA PUNTO COM
*  @license   https://factura.com
*  International Registered Trademark & Property of factura.com
*/

class BlockfacturaFacturaModuleFrontController extends ModuleFrontController
{
    //public $auth = true;
//  public $authRedirection = 'facturacion';
    public $ssl = true;
    public $hide_left_column = true;

    public function __construct()
    {
        $this->bootstrap = true;

        parent::__construct();
        $this->context = Context::getContext();
    }

    public function initContent()
    {
        parent::initContent();

        $this->context->smarty->assign(
            array(
              'hide_left_column' => $this->hide_left_column,
              'keyapi' => $this->module->keyapi,
              'keysecret' => $this->module->keysecret,
              'encabezado' => $this->module->encabezado,
              'colors' => $this->module->color_fields,
            )
        );

        $this->setTemplate('factura.tpl');
    }

    public function setMedia()
    {
        parent::setMedia();
        $this->addjQuery();
        $this->addJqueryUI('ui.progressbar');
        $this->addJS(_MODULE_DIR_.$this->module->name.'/views/js/progress.js');
        $this->addJS(_MODULE_DIR_.$this->module->name.'/views/js/control.js');
        $this->addJS(_MODULE_DIR_.$this->module->name.'/views/js/sweetalert.min.js');
        $this->addCSS(_MODULE_DIR_.$this->module->name.'/views/css/sweetalert.css');
        $this->addCSS(_MODULE_DIR_.$this->module->name.'/views/css/factura.css');
    }
}
