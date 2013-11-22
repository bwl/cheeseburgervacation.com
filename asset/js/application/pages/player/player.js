$(function() {
    var $itemToolTip = $("#itemTooltip");
    var $players = $("#players");
    var $inventory = $('.inventory');
    $inventory.find('.cell').on({
        mouseenter: function(e) {
            var $this = $(this);
            
            // TODO: Set tooltip text for the cell's item
            
            updateTooltipPosition(e.pageX, e.pageY);
        },
        mouseleave: function() {
            $itemToolTip.show().hide();
        },
        mousemove: function(e) {
            var self = this;
            if (e) {
                updateTooltipPosition(e.pageX, e.pageY);
            }
        }
    });

    function updateTooltipPosition(mouseX, mouseY) { 

        var playersWidth = $players.width();
        var toolTipLeft = 0;
        var cellLeft = mouseX - $inventory.offset().left;
        if (cellLeft < playersWidth / 2) {
            toolTipLeft = mouseX + 16;
        } else {
            toolTipLeft = mouseX - $itemToolTip.width() - 16;
        }
        $itemToolTip.show().css({
            left: toolTipLeft - $inventory.offset().left,
            top: mouseY - $inventory.offset().top - 30
        });
    }
});