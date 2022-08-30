<div class="cawoy_tabs_content">
    <?php $count=1; ?>
    <?php foreach ( $settings['list'] as $index => $item ) : ?>
        <div class="cawoy_tab <?php echo $count<=1? 'active' : ''; ?>" data-cawoy-elementor-tab="<?php echo $count; ?>">
            <div class="cawoy_tab_content_container">
                <h3 class="heading"><?php echo $item['heading']; ?></h3>
                <div class="content">
                    <?php echo $item['content']; ?>
                </div>
                <?php if(isset($item['buttontext']) && !empty($item['buttontext'])) : ?>
                <div class="cawoy_tab_content_cta">
                    <a href="<?php echo $item['buttonurl']; ?>" class="cawoy_tab_content_btn">
                        <?php echo $item['buttontext']; ?>
                    </a>
                </div>
                <?php endif; ?>
            </div>
            <div class="cawoy_tab_image_container">
                <img class="cawoy_tab_image" src="<?php echo $item['picture']['url']; ?>" alt="">
            </div>
        </div>
        
        <?php $count++; ?>
    <?php endforeach; ?>
</div>