<?php

namespace App\WidgetsBuilder\Widgets;
use App\PageBuilder\Traits\LanguageFallbackForPageBuilder;
use App\WidgetsBuilder\WidgetBase;
use App\PageBuilder\Fields\Textarea;
use App\PageBuilder\Fields\Image;
use App\PageBuilder\Fields\IconPicker;
use App\PageBuilder\Fields\Repeater;
use App\PageBuilder\Helpers\RepeaterField;

class AboutUsWidgetCustome extends WidgetBase
{
    use LanguageFallbackForPageBuilder;

    public function admin_render()
    {
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();
        $widget_saved_values = $this->get_settings();

        $output .= Textarea::get([
            'name' => 'description',
            'label' => __('Description'),
            'value' => $widget_saved_values['description'] ?? null,
        ]);
        $output .= Image::get([
            'name' => 'image',
            'label' => __('Site Logo'),
            'value' => $widget_saved_values['image'] ?? null,
            'dimensions' => '173x41'
        ]);
         //repeater
         $output .= Repeater::get([
            'settings' => $widget_saved_values,
            'id' => 'contact_page_contact_info_01',
            'fields' => [
                [
                    'type' => RepeaterField::ICON_PICKER,
                    'name' => 'icon',
                    'label' => __('Icon')
                ],
                [
                    'type' => RepeaterField::TEXT,
                    'name' => 'url',
                    'label' => __('Url')
                ],
            ]
        ]);


        $output .= $this->admin_form_submit_button();
        $output .= $this->admin_form_end();
        $output .= $this->admin_form_after();

        return $output;
    }

    public function frontend_render()
    {
        $settings = $this->get_settings();
        $description = purify_html($settings['description']);
        $route = route('homepage');
        $logo = render_image_markup_by_attachment_id($settings['image']);

        $repeater_data = $settings['contact_page_contact_info_01'];
        $social_icon_markup = '';

        foreach ($repeater_data['icon_'] as $key => $icon) {
            $icon = $icon;
            $url = $repeater_data['url_'][$key];
            $social_icon_markup.= <<<SOCIALICON
            <li class="lists">
                <a class="facebook" href="{$url}"> <i class="{$icon} text-white"></i> </a>
            </li>

SOCIALICON;
    }
   
   return <<<HTML
   <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="footer-widget widget ">
            <div class="about_us_widget">
                <a href="{$route}" class="footer-logo">{$logo}</a>
            </div>
            <div class="footer-inner">
                <p class="footer-para text-white">{$description}</p>
                <div class="footer-socials">
                    <ul class="footer-social-list text-white">
                        {$social_icon_markup}
                    </ul>
                </div>
            </div>

        </div>  
    </div>
HTML;
    }

    public function widget_title()
    {
        return __('About Us Custome');
    }

}