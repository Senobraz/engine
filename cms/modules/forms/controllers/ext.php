<?php
/*
 * Контроллер ext форм
 */

class FormsController_Ext extends Controller_Base
{
    public function access()
    {
        return $this->login();
    }

    public function index()
    {
    }

    public function navigator()
    {
        $val = val('catalog.ext.navigator',
                array(
                    'module'=>'catalog',
                    'title'=>$this->args->title,
                    'top'=>$this->args->top,
                    'param'=>'forms_section'
                ));

        $this->setContent($val);
    }

}

?>
