jQuery(document).ready(function($){
    var progress = 0;
    var timer_time = $(".cawoy_elementor_header").data("timer") ?? 30;
    var timer;
    var tabs_count = $(".cawoy_elementor_items_list li").length;
    var current_tab = 1;

    function updateProgressbar(){
        $(".cawoy_elementor_items_list li.active .timer .progress").css('width',`${progress}%`);
        if(progress == 100){
            if(current_tab<tabs_count){
                current_tab++;
            }
            else{
                current_tab=1;
            }
            $(".cawoy_elementor_items_list li[data-cawoy-elementor-tab='"+current_tab+"']").click();
            progress=0;
            
        }
        progress++;
    }
    

    //Addd active to the first list item
    function setupSettings(){
        $(".cawoy_elementor_items_list li[data-cawoy-elementor-tab='"+current_tab+"']").addClass("active");
        $(".cawoy_elementor_items_list li[data-cawoy-elementor-tab='"+current_tab+"'] .timer .progress").css('width','0');
        $(".cawoy_elementor_tab").find(".cawoy_tab[data-cawoy-elementor-tab='"+current_tab+"']").addClass("active");
        progress=0;
        timer=setInterval(updateProgressbar, timer_time);
    }
    setupSettings();
    
    $(".cawoy_elementor_items_list li").click(function(){
        $(".cawoy_elementor_items_list").closest(".cawoy_elementor_header").find(".cawoy_elementor_items_list li .timer .progress").css('width','0');
        $(".cawoy_elementor_items_list").closest(".cawoy_elementor_header").find(".cawoy_elementor_items_list li").removeClass("active");
        $(this).addClass("active");
        current_tab = $(this).data("cawoy-elementor-tab");
        progress=1;
        
        
        $(this).closest(".cawoy_elementor_tab").find(".cawoy_tab").removeClass("active");
        $(this).closest(".cawoy_elementor_tab").find(".cawoy_tab[data-cawoy-elementor-tab='"+current_tab+"']").addClass("active");
    });
});