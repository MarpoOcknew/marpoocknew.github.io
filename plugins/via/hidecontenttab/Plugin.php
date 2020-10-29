<?php namespace via\HideContentTab;

use \Illuminate\Support\Facades\Event;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    public function boot() {
        Event::listen('backend.form.extendFields', function($widget) {
            if (!$widget->getController() instanceof \RainLab\Pages\Controllers\Index) {
                return;
            }

            if (!$widget->model instanceof \RainLab\Pages\Classes\Page) {
                return;
            }

            $tabs = $widget->getTabs();
            foreach( $tabs->secondary->fields as $name => $field ) {
                if($name == 'rainlab.pages::lang.editor.content'){
                    unset($tabs->secondary->fields[$name]);
                }
            }

            $tabs->primary->stretch = NULL;
        });
    }
}
