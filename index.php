<?php echo head(array('bodyid'=>'home')); ?>

<?php if (get_theme_option('Homepage Text')): ?>
<section class="intro"><?php echo get_theme_option('Homepage Text'); ?></section>
<?php endif; ?>

<div id="featured">
    <?php if (get_theme_option('Display Featured Item') !== '0'): ?>
    <!-- Featured Item -->
    <div id="featured-item">
        <h2><?php echo __('Featured'); ?></h2>
        <?php echo random_featured_items(1); ?>
    </div><!--end featured-item-->
    <?php endif; ?>

    <?php if (get_theme_option('Display Featured Collection') !== '0'): ?>
    <!-- Featured Collection -->
    <div id="featured-collection">
        <h2><?php echo __('Featured'); ?></h2>
        <?php echo random_featured_collection(); ?>
    </div><!-- end featured collection -->
    <?php endif; ?>

    <?php if ((get_theme_option('Display Featured Exhibit') !== '0')
            && plugin_is_active('ExhibitBuilder')
            && function_exists('exhibit_builder_display_random_featured_exhibit')): ?>
    <!-- Featured Exhibit -->
    <div class="featured-exhibit">
    <h2><?php echo __('Featured'); ?></h2>
    <?php echo exhibit_builder_display_random_featured_exhibit(); ?>
    </div>
    <?php endif; ?>
    
    <?php if (get_theme_option('homepage_text_two')): ?>
    <div class="home-text"><?php echo get_theme_option('homepage_text_two'); ?></div>
    <?php endif; ?>
    
</div> <!-- End Primary Column -->

<?php
$recentItems = get_theme_option('Homepage Recent Items');
if ($recentItems === null || $recentItems === ''):
    $recentItems = 3;
else:
    $recentItems = (int) $recentItems;
endif;
if ($recentItems):
?>
<div id="recent-items">
    <h2><?php echo __('Recently Added Items'); ?></h2>
    <?php echo recent_items($recentItems); ?>
    <p class="view-items-link"><a href="<?php echo html_escape(url('items')); ?>"><?php echo __('View All Items'); ?></a></p>
</div><!--end recent-items -->
<?php endif; ?>

<?php fire_plugin_hook('public_home', array('view' => $this)); ?>

<?php echo foot(); ?>
