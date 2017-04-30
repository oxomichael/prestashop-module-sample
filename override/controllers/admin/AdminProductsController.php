<?php

class AdminProductsController extends AdminProductsControllerCore
{
    public function __construct() 
    {
        parent::__construct();
        
        $id_shop = Shop::isFeatureActive() && Shop::getContext() == Shop::CONTEXT_SHOP? (int)$this->context->shop->id : 'a.id_shop_default';
        
        // Modification SQL nombre de commentaires
        $this->_select .= ', (SELECT COUNT(`id_product`)
    		FROM `'._DB_PREFIX_.'mymod_comment`
    		WHERE `id_shop` = '.$id_shop.' AND `id_product` = a.`id_product`) AS comments';
        
        // Ajout de la colonne pour le nombre des commentaires        
        $this->fields_list['comments'] = array(
            'title' => $this->l('Nb Comments'),
            'align' => 'center',
            'class' => 'fixed-width-xs',
            'type' => 'int'
        );
                
    }
    
    
}