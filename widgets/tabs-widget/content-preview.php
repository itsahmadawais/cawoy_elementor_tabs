<div class="cawoy_tabs_content">
    <# var count = 1; #>
    <# if(settings.list){#>
    <# _.each(settings.list, function(item,index){ #>
        <# 
            var tab_class='cawoy_tab';
            if(count<=1){
                tab_class='cawoy_tab active';
            }
        #>
        <div class="{{{ tab_class }}}" data-cawoy-elementor-tab="{{{ count }}}">
            <div class="cawoy_tab_content_container">
                <h3 class="heading">{{{ item.heading }}}</h3>
                <div class="content">
                    {{{ item.content }}}
                </div>
                <# if(item.buttontext && item.buttonurl){#>
                <div class="cawoy_tab_content_cta">
                    <a href="{{{ item.buttonurl }}}" class="cawoy_tab_content_btn">
                        {{{ item.buttontext }}}
                    </a>
                </div>
                <# } #>
            </div>
            <div class="cawoy_tab_image_container">
                <img class="cawoy_tab_image" src="{{{ item.picture.url }}}" alt="">
            </div>
        </div>
        
        <# count=count+1; #>
    <# }); #>
    <# } #>
</div>