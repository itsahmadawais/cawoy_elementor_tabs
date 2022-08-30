<div class="cawoy_elementor_header">
    <ul class="cawoy_elementor_items_list">
        <#
            if ( settings.list ) {
                var count = 1;
                _.each ( settings.list, function( item, index ) {#>
                    <li class="" data-cawoy-elementor-tab="{{{ count }}}">
                        <span class="text">
                           {{{item.title}}}
                            </span>
                            <span class="icon">
                                <i class="{{{ item.icon.value }}}"></i>
                            </span>
                        </li>
                <#
                count++;
                });
            }
        #>
    </ul>
</div>