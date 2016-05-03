(function ($) {
    $.fn.shake = function (options) {
        // defaults
        var settings = {
            'shakes': 2,
            'distance': 10,
            'duration': 400
        };
        // merge options
        if (options) {
            $.extend(settings, options);
        }
        // make it so
        var pos;
        var left_pos;
        var win_width;
        return this.each(function () {
            $this = $(this);
            // position if necessary
            pos = $this.css('position');
            left_pos = $this.position();
            win_height = $(window).width();
            if (!pos || pos === 'static') {
                $this.css('position', 'relative');
                console.log('meuh');
            }
            console.log((100 * (Math.round(left_pos.left) + settings.distance * -1) / win_height) + 'vw');
            console.log(left_pos.left);
            // shake it
            for (var x = 1; x <= settings.shakes; x++) {
                $this.animate({ left: (100 * (Math.round(left_pos.left) + settings.distance * -1) / win_height) + 'vw' }, (settings.duration / settings.shakes) / 4)
                .animate({ left: (100 * (Math.round(left_pos.left) + settings.distance) / win_height) + 'vw' }, (settings.duration / settings.shakes) / 2)
                .animate({ left: (100 * Math.round(left_pos.left) / win_height) + 'vw' }, (settings.duration / settings.shakes) / 4);
            }
        });
    };
}(jQuery));