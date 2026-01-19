(function($) {
    "use strict";

    var pxl_widget_tabs_handler = function($scope, $) {
        $scope.find(".pxl-tabs.tab-effect-slide .pxl-item--title").on("click", function(e) {
            e.preventDefault();
            var target = $(this).data("target");
            var parent = $(this).parents(".pxl-tabs");
            parent.find(".pxl-tabs--content .pxl-item--content").slideUp(300);
            parent.find(".pxl-tabs--title .pxl-item--title").removeClass('active');
            $(this).addClass("active");
            $(target).slideDown(300);
            
            $(this).removeClass('item-pre');
            parent.find(".pxl-item--title").removeClass('item-pre item-next');
            var previousSpan = $(this).prev('.pxl-item--title');
            var nextSpan = $(this).next('.pxl-item--title');
            if (previousSpan.length > 0) {
                previousSpan.addClass('item-pre');
            }
            if (nextSpan.length > 0) {
                nextSpan.addClass('item-next');
            }
        });

        $scope.find(".pxl-tabs.tab-effect-fade .pxl-item--title").on("click", function(e) {
            e.preventDefault();
            var target = $(this).data("target");
            var parent = $(this).parents(".pxl-tabs");
            parent.find(".pxl-tabs--content .pxl-item--content").removeClass("active");
            parent.find(".pxl-tabs--title .pxl-item--title").removeClass('active');
            $(this).addClass("active");
            $(target).addClass("active");
            parent.find(".pxl-item--title").removeClass('item-pre item-next');
            var previousSpan = $(this).prev('.pxl-item--title');
            var nextSpan = $(this).next('.pxl-item--title');
            if (previousSpan.length > 0) {
                previousSpan.addClass('item-pre');
            }
            if (nextSpan.length > 0) {
                nextSpan.addClass('item-next');
            }
        });
    };

    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/pxl_tabs.default', pxl_widget_tabs_handler);
    });

})(jQuery);
