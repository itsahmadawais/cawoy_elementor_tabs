<?php

class CawoyTabsWidget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'cawoy_tabs_widget';
    }

    public function get_title()
    {
        return esc_html__('Tabs Content', 'cawoy_elementor');
    }

    public function get_icon()
    {
        return 'eicon-menu-bar';
    }

    public function get_categories()
    {
        return ['basic'];
    }

    public function get_keywords()
    {
        return ['cawoy', 'tabs'];
    }

    public function get_script_depends()
    {

        wp_register_script('cawoy_elementor_script', CAWOY_ELEMENTOR_URL . 'assets/script/script.js', ['jquery']);

        return [
            'cawoy_elementor_script',
        ];
    }

    public function get_style_depends()
    {

        wp_register_style('cawoy_elementor_style', CAWOY_ELEMENTOR_URL . 'assets/style/style.css');

        return [
            'cawoy_elementor_style',
        ];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Tabs Content', 'cawoy_elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'list',
            [
                'label' => esc_html__('Tabs List', 'cawoy_elementor'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'title',
                        'label' => esc_html__('Title', 'cawoy_elementor'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'placeholder' => esc_html__('Tab Title', 'cawoy_elementor'),
                        'default' => esc_html__('Tab Title', 'cawoy_elementor'),
                    ],
                    [
                        'name' => 'icon',
                        'label' => esc_html__('Icon', 'cawoy_elementor'),
                        'type' => \Elementor\Controls_Manager::ICONS,
                        'default' => [
                            'value' => 'fas fa-circle',
                            'library' => 'fa-solid',
                        ],
                    ],
                    [
                        'name' => 'picture',
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'label' => esc_html__('Choose Image', 'cawoy_elementor'),
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name' => 'heading',
                        'label' => esc_html__('Section Heading', 'cawoy_elementor'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'placeholder' => esc_html__('Section Heading', 'cawoy_elementor'),
                        'default' => esc_html__('Section Heading', 'cawoy_elementor'),
                    ],
                    [
                        'name' => 'content',
                        'label' => esc_html__('Section Content', 'cawoy_elementor'),
                        'type' => \Elementor\Controls_Manager::WYSIWYG,
                        'placeholder' => esc_html__('Section Heading', 'cawoy_elementor'),
                    ],
                    [
                        'name' => 'buttontext',
                        'label' => esc_html__('Button Text', 'cawoy_elementor'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'placeholder' => esc_html__('Button Text', 'cawoy_elementor'),
                    ],
                    [
                        'name' => 'buttonurl',
                        'label' => esc_html__('Button URL', 'cawoy_elementor'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'placeholder' => esc_html__('Button URL', 'cawoy_elementor'),
                        'default' => esc_html__('#', 'cawoy_elementor'),
                    ],
                ],

                'default' => [
                    [
                        'text' => esc_html__('List Item #1', 'plugin-name'),
                        'link' => 'https://elementor.com/',
                    ],
                    [
                        'text' => esc_html__('List Item #2', 'plugin-name'),
                        'link' => 'https://elementor.com/',
                    ],
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_timer',
            [
                'label' => esc_html__('Timer Setting', 'cawoy_elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'timer',
            [
                'label' => esc_html__('Timer(milliseconds)', 'cawoy_elementor'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'placeholder' => esc_html__('Time in milliseconds', 'cawoy_elementor'),
                'default' => esc_html__('30000', 'cawoy_elementor'),
            ]
        );

        $this->end_controls_section();

        $this->add_style_tabs();
    }
    /**
     * Add Tabs and Controls for Style
     */
    private function add_style_tabs()
    {
        /** Style Controls */

        //Tab Style Control
        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__('Tab Style', 'cawoy_elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'style_tabs'
        );
        $this->normal_tab_style();
        $this->active_tab_style();
        $this->hover_tab_style();
        $this->end_controls_tabs();



        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{ WRAPPER }} .cawoy_elementor_items_list li .text',
            ]
        );
        $this->end_controls_section();
        // End Tab Style Control


        //Tab Content Style
        $this->start_controls_section(
            'section_content_style',
            [
                'label' => esc_html__('Content Style', 'cawoy_elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_tab_content_style();
        $this->start_controls_tabs(
            'style_button'
        );
        $this->add_button_style();
        $this->add_button_hover_style();
        $this->end_controls_tabs();

        $this->end_controls_section();
        // End Tab Content Style



        //Tab Timer Setting
        $this->start_controls_section(
            'section_timer_style',
            [
                'label' => esc_html__('Timer Colors', 'cawoy_elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_timer_style_controls();
        $this->end_controls_section();
        //End Tab Timer Setting

        /**
         * End Style Controls
         */
    }

    /**
     * Tab Normal Style
     */

    private function normal_tab_style()
    {
        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__('Normal', 'cawoy_elementor'),
            ]
        );

        $this->add_control(
            'tab_text_color',
            [
                'label' => esc_html__('Text Color', 'cawoy_elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{ WRAPPER }} .cawoy_elementor_items_list li .item' => 'color: {{VALUE}}',
                ],
            ],
        );

        $this->add_control(
            'tab_background_color',
            [
                'label' => esc_html__('Background Color', 'cawoy_elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{ WRAPPER }} .cawoy_elementor_items_list li' => 'background-color: {{VALUE}}',
                ],
            ],
        );

        $this->add_control(
            'tab_icon_color',
            [
                'label' => esc_html__('Icon Color', 'cawoy_elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{ WRAPPER }} .cawoy_elementor_items_list li .icon' => 'color: {{VALUE}}',
                ],
            ],
        );

        $this->end_controls_tab();
    }

    /**
     * Tab Active Style
     */

    private function active_tab_style()
    {

        $this->start_controls_tab(
            'style_active_tab',
            [
                'label' => esc_html__('Active', 'cawoy_elementor'),
            ]
        );
        $this->add_control(
            'tab_active_text_color',
            [
                'label' => esc_html__('Text Color', 'cawoy_elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{ WRAPPER }} .cawoy_elementor_items_list li.active' => 'color: {{VALUE}}',
                ],
            ],
        );
        $this->add_control(
            'tab_active_background_color',
            [
                'label' => esc_html__('Background Color', 'cawoy_elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{ WRAPPER }} .cawoy_elementor_items_list li.active' => 'background-color: {{VALUE}}',
                    '{{ WRAPPER }} .cawoy_elementor_items_list li.active::after' => 'border-top-color: {{VALUE}} !important',
                ],
            ],
        );

        $this->add_control(
            'tab_active_icon_color',
            [
                'label' => esc_html__('Icon Color', 'cawoy_elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{ WRAPPER }} .cawoy_elementor_items_list li.active .icon' => 'color: {{VALUE}}',
                ],
            ],
        );
        $this->end_controls_tab();
    }
    /**
     * Tab Hover Style
     */

    private function hover_tab_style()
    {

        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__('Hover', 'cawoy_elementor'),
            ]
        );

        $this->add_control(
            'tab_hover_text_color',
            [
                'label' => esc_html__('Text Color', 'cawoy_elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{ WRAPPER }} .cawoy_elementor_items_list li:hover' => 'color: {{VALUE}}',
                ],
            ],
        );

        $this->add_control(
            'tab_hover_background_color',
            [
                'label' => esc_html__('Background Color', 'cawoy_elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{ WRAPPER }} .cawoy_elementor_items_list li:hover' => 'background-color: {{VALUE}}',
                ],
            ],
        );

        $this->add_control(
            'tab_hover_icon_color',
            [
                'label' => esc_html__('Icon Color', 'cawoy_elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{ WRAPPER }} .cawoy_elementor_items_list li:hover .icon i' => 'color: {{VALUE}}',
                ],
            ],
        );

        $this->end_controls_tab();
    }
    /**
     * Tab Content Style
     */

    private function add_tab_content_style()
    {
        $this->add_control(
            'tab_content_title_color',
            [
                'label' => esc_html__('Heading Color', 'cawoy_elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{ WRAPPER }} .cawoy_elementor_items_list li:hover .icon' => 'color: {{VALUE}}',
                ],
            ],
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tab_content_section_title_typography',
                'label' => esc_html__('Title Typography', 'cawoy_elementor'),
                'selector' => '{{ WRAPPER }} .cawoy_tabs_content .cawoy_tab .cawoy_tab_content_container .heading',
            ]
        );
        $this->add_control(
            'tab_content_color',
            [
                'label' => esc_html__('Content Color', 'cawoy_elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{ WRAPPER }} .cawoy_tabs_content .cawoy_tab .cawoy_tab_content_container .content' => 'color: {{VALUE}}',
                ],
            ],
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tab_content_section_typography',
                'selector' => '{{ WRAPPER }} .cawoy_tabs_content .cawoy_tab .cawoy_tab_content_container .content',
            ]
        );
        $this->add_control(
            'tab_content_image_width',
            [
                'label' => esc_html__('Image Width(%)', 'cawoy_elementor'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => esc_html__('100', 'cawoy_elementor'),
                'placeholder' => esc_html__('100', 'cawoy_elementor'),
                'selectors' => [
                    '{{ WRAPPER }}}  .cawoy_tab_image_container .cawoy_tab_image' => 'width: {{VALUE}}% !important'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tab_content_container_btn_typography',
                'label' => esc_html('Button Typography', 'cawoy_elementor'),
                'selector' => '{{ WRAPPER }} .cawoy_tabs_content .cawoy_tab .cawoy_tab_content_container .cawoy_tab_content_btn',
            ]
        );
    }
    /**
     * Button Style Normal Tabs
     */

    private function add_button_style()
    {
        $this->start_controls_tab(
            'style_button_normal_tab',
            [
                'label' => esc_html__('Normal', 'cawoy_elementor'),
            ]
        );
        $this->add_control(
            'btn_normal_text_color',
            [
                'label' => esc_html__('Text Color', 'cawoy_elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{ WRAPPER }} .cawoy_tabs_content .cawoy_tab .cawoy_tab_content_container .cawoy_tab_content_btn' => 'color: {{VALUE}}',
                ],
            ],
        );
        $this->add_control(
            'btn_normal_background_color',
            [
                'label' => esc_html__('Background Color', 'cawoy_elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{ WRAPPER }} .cawoy_tabs_content .cawoy_tab .cawoy_tab_content_container .cawoy_tab_content_btn' => 'background-color: {{VALUE}}',
                ],
            ],
        );
        $this->end_controls_tab();
    }
    /**
     * Button Style Hover Tabs
     */

    private function add_button_hover_style()
    {
        $this->start_controls_tab(
            'style_button_hover_tab',
            [
                'label' => esc_html__('Hover', 'cawoy_elementor'),
            ]
        );
        $this->add_control(
            'btn_hover_text_color',
            [
                'label' => esc_html__('Text Color', 'cawoy_elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{ WRAPPER }} .cawoy_tabs_content .cawoy_tab .cawoy_tab_content_container .cawoy_tab_content_btn:hover' => 'color: {{VALUE}}',
                ],
            ],
        );
        $this->add_control(
            'btn_hover_background_color',
            [
                'label' => esc_html__('Background Color', 'cawoy_elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{ WRAPPER }} .cawoy_tabs_content .cawoy_tab .cawoy_tab_content_container .cawoy_tab_content_cta :hover' => 'background-color: {{VALUE}}',
                ],
            ],
        );
        $this->end_controls_tab();
    }

    /**
     * Add Timer Color Setting Tabs
     */
    private function add_timer_style_controls()
    {
        $this->add_control(
            'tab_timer_background_color',
            [
                'label' => esc_html__('Background Color', 'cawoy_elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{ WRAPPER }} .cawoy_elementor_items_list li .timer' => 'background-color: {{VALUE}}',
                ],
            ],
        );
        $this->add_control(
            'tab_timer_progressbar_color',
            [
                'label' => esc_html__('Progressbar Color', 'cawoy_elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{ WRAPPER }} .cawoy_elementor_items_list li.active .timer .progress' => 'background-color: {{VALUE}}',
                ],
            ],
        );
    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
    ?>
        <div class='cawoy_elementor_tab'>
            <?php
            require CAWOY_ELEMENTOR_DIR . 'widgets/tabs-widget/header.php';
            require CAWOY_ELEMENTOR_DIR . 'widgets/tabs-widget/content.php';
            ?>
        </div>
    <?php
    }

    protected function content_template() {
        require CAWOY_ELEMENTOR_DIR.'widgets/tabs-widget/header-content-preview.php';
        require CAWOY_ELEMENTOR_DIR.'widgets/tabs-widget/content-preview.php';
    }
}
