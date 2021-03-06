<?php

namespace NikolayS93\MediaBlocks;

if ( ! defined( 'ABSPATH' ) )
  exit; // disable direct access

$Responsive = array(
    array(
        'id'        => 'responsive',
        'label'     => __('Responsive', DOMAIN),
        'desc'      => __('Use Owl Carousel on not desktop-only website', DOMAIN),
        'type'      => 'checkbox',
        'default'   => get_theme_mod( 'responsive' ) ? 'on' : '',
        'data-show' => 'itemsDesktop, itemsDesktopSmall, itemsTablet, itemsMobile',
    ),
    array(
        'id' => 'items',
        'label' => __('Items', DOMAIN),
        'desc' => __('The number of items you want to see on the screen.', DOMAIN),
        'type' => 'number',
        'default' => 5,
    ),
    array(
        'id' => 'itemsDesktop',
        'label' => __('Items Desktop', DOMAIN),
        'desc' => __('The number of items on desktop resolutions (1199px)', DOMAIN),
        'default' => 4,
        'type' => 'number',
    ),
    array(
        'id' => 'itemsDesktopSmall',
        'label' => __('Items Desktop Small', DOMAIN),
        'desc' => __('The number of items on small desktop resolutions (979px)', DOMAIN),
        'default' => 3,
        'type' => 'number'
    ),
    array(
        'id' => 'itemsTablet',
        'label' => __('Items Tablet', DOMAIN),
        'desc' => __('The number of items on tablet resolutions (768px)', DOMAIN),
        'default' => 2,
        'type' => 'number'
    ),
    array(
        'id' => 'itemsMobile',
        'label' => __('Items Mobile', DOMAIN),
        'desc' => __('The number of items on mobile resolutions (479px)', DOMAIN),
        'default' => 1,
        'type' => 'number',
    ),
);
$autoPlay   = array(
    array(
        'id' => 'autoPlay' ,
        'label' => __('Auto Play', DOMAIN),
        'desc' => __('Change to any integrer for example autoPlay : 5000 to play every 5 seconds, or 0 to disable autoPlay.', DOMAIN),
        'default' => 4000,
        'type' => 'number'
    ),
    array(
        'id' => 'stopOnHover' ,
        'label' => __('Stop On Hover', DOMAIN),
        'desc' => __('Stop autoplay on mouse hover', DOMAIN),
        'type' => 'checkbox',
        'default' => 'on'
    )
);
$Pagination = array(
    array(
        'id'        => 'pagination',
        'label'     => __('Pagination', DOMAIN),
        'desc'      => __('Display pagination.', DOMAIN),
        'default'   => 'on',
        'type'      => 'checkbox',
        'data-show' => 'paginationNumbers, paginationSpeed'
    ),
    array(
        'id'    => 'paginationNumbers',
        'label' => __('Pagination Numbers', DOMAIN),
        'desc'  => __('Show numbers inside pagination buttons', DOMAIN),
        'type'  => 'checkbox',
    ),
    array(
        'id'      => 'paginationSpeed',
        'label'   => __('Pagination Speed', DOMAIN),
        'desc'    => __('Pagination speed in milliseconds.', DOMAIN),
        'default' => 800,
        'type'    => 'number',
    )
);
$Navigation = array(
    array(
        'id'        => 'navigation',
        'label'     => __('Navigation', DOMAIN),
        'desc'      => __('Display "next" and "prev" buttons.', DOMAIN),
        'type'      => 'checkbox',
        'data-show' => 'navigationTextNext, navigationTextPrev'
    ),
    array(
        'id'      => 'navigationTextPrev',
        'label'   => __('Navigation "Prev"', DOMAIN),
        'desc'    => __('Text on "Prev" button', DOMAIN),
        'default' => 'Prev',
        'type'    => 'text',
    ),
    array(
        'id'      => 'navigationTextNext',
        'label'   => __('Navigation "Next"', DOMAIN),
        'desc'    => __('Text on "Next" button', DOMAIN),
        'default' => 'Next',
        'type'    => 'text',
    ),
    array(
        'id'        => 'rewindNav',
        'label'     => __('Rewind', DOMAIN),
        'desc'      => __('Slide to first item.', DOMAIN),
        'type'      => 'checkbox',
        'default'   => 'on',
        'data-show' => 'rewindSpeed',
    ),
    array(
        'id'      => 'rewindSpeed',
        'label'   => __('Rewind Speed', DOMAIN),
        'desc'    => __('Rewind speed in milliseconds.', DOMAIN),
        'default' => 1000,
        'type'    => 'number',
    )
);
$advanced   = array(
    array(
        'id'    => 'scrollPerPage',
        'label' => __('Scroll per Page', DOMAIN),
        'desc'  => __('Scroll per page not per item. This affect next/prev buttons and mouse/touch dragging.', DOMAIN),
        'type'  => 'checkbox',
    ),
    array(
        'id'    => 'autoHeight',
        'label' => __('Auto Height', DOMAIN),
        'desc'  => __('Add height to owl-wrapper-outer so you can use diffrent heights on slides. Use it only for one item per page setting.', DOMAIN),
        'type'  => 'checkbox',
    ),
    array(
        // exclude from sync
        'id'    => 'addClassActive',
        'label' => __('Add Class Active', DOMAIN),
        'desc'  => __('Add "active" classes on visible items. Works with any numbers of items on screen.', DOMAIN),
        'type'  => 'checkbox',
    ),
    array(
        'id'      => 'mouseDrag',
        'label'   => __('Mouse Drag', DOMAIN),
        'desc'    => __('Turn on mouse events.', DOMAIN),
        'type'    => 'checkbox',
        'default' => 'on',
    ),
    array(
        'id'      => 'touchDrag',
        'label'   => __('Touch Drag', DOMAIN),
        'desc'    => __('Turn on touch events.', DOMAIN),
        'type'    => 'checkbox',
        'default' => 'on',
    ),
    array(
        'id'      => 'dragBeforeAnimFinish',
        'label'   => __('Drag Before Animation Finishes', DOMAIN),
        'desc'    => __('Ignore whether a transition is done (only dragging).', DOMAIN),
        'type'    => 'checkbox',
        'default' => 'on',
    ),
);

switch ($main_type) {
    // case 'slider':
    //   $settings = array_merge( $autoPlay, $Pagination, $Navigation, $advanced );
    //   $settings[] = array(
    //     'id' => 'singleItem',
    //     'type' => 'hidden',
    //     'value' => 'on'
    //     );
    //   break;

    // case 'sync-slider':
    //   $settings = array_merge( $Responsive, $autoPlay, $Pagination, $Navigation, $advanced );
    //   break;

    default: // 'carousel'
      $settings = array_merge( $Responsive, $autoPlay, $Pagination, $Navigation, $advanced );
      break;
}
// $id, $label, $type, $value - required

return $settings;

// todo: aditional options
// lazy load
    // 'lazyLoad' => array(
    //     'label' => __('Lazy Load', DOMAIN),
    //     'desc' => __('Delays loading of images. Images outside of viewport won\'t be loaded before user scrolls to them. Great for mobile devices to speed up page loadings. ', DOMAIN),
    //     'default' => false,
    //     'type' => 'checkbox',
    //     'type' => 'bool'
    // ),
    // 'lazyFollow' => array(
    //     'label' => __('Lazy Follow', DOMAIN),
    //     'desc' => __('When pagination used, it skips loading the images from pages that got skipped. It only loads the images that get displayed in viewport. If set to false, all images get loaded when pagination used. It is a sub setting of the lazy load function.', DOMAIN),
    //     'default' => false,
    //     'type' => 'checkbox',
    //     'type' => 'bool'
    // ),

    // 'responsiveRefreshRate' => array(
    //     'label' => __('Responsive Refresh Rate', DOMAIN),
    //     'desc' => __('Check window width changes every X ms for responsive actions', DOMAIN),
    //     'default' => 200,
    //     'type' => 'text',
    //     'type' => 'number'
    // ),

    // 'itemsScaleUp' => array(
    //     'label' => __('Item Scale Up', DOMAIN),
    //     'desc' => __('Option to not stretch items when it is less than the supplied items.', DOMAIN),
    //     'default' => false,
    //     'type' => 'checkbox',
    //     'type' => 'bool'
    // ),

    // CSS Styles
    // baseClass : "owl-carousel",
    // theme : "owl-theme",
 
    // //Lazy load
    // lazyLoad : false,
    // lazyFollow : true,
    // lazyEffect : "fade",