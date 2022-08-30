<div class="cawoy_elementor_header" data-timer="<?php echo $settings['timer'] ?? '3000'; ?>">
    <ul class="cawoy_elementor_items_list">
        <?php $count=1; ?>
        <?php foreach ( $settings['list'] as $index => $item ) : ?>
            <li class="<?php echo $count<=1? 'active' : ''; ?>" data-cawoy-elementor-tab="<?php echo $count; ?>">
                <div class="item">
                    <span class="text">
                        <?php echo $item['title'] ?>
                    </span>
                    <span class="icon">
                        <i class="<?php echo $item['icon']['value']; ?>"></i>
                    </span>
                </div>
                <div class="timer">
                    <div class="progress"></div>
                </div>
            </li>
            <?php $count++; ?>
        <?php endforeach; ?>
    </ul>
</div>