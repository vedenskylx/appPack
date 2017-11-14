<?php
/**
 * Created by PhpStorm.
 * User: lexgorbachev
 * Date: 13.11.17
 * Time: 18:20
 */

namespace app;


class Page extends  Main
{
    public function Run()
    {
        $fenom = new \Fenom(new \Fenom\Provider(__DIR__ .'/../views/frontend'));

        $fenom->setCompileDir(__DIR__ .'/../'.$this->data['settings']['cache_folder']);
        $this->data['settings']['page'] = 'Главная';

        $data = (array)$this->data;

        $fenom->display("pages/main.tpl", $data);

    }
}