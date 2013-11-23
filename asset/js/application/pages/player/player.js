$(function() {
    var $itemToolTip = $("#itemTooltip");
    var $itemToolTipInn = $itemToolTip.find(".inn");
    var $players = $("#players");
    var $inventory = $('.inventory');
    
    $inventory.find('.cell').on({
        mouseenter: function(e) {
            var $this = $(this);
            
            var $detail = $this.find(".detail").html();
            if ($detail && $detail != "") {
                $itemToolTipInn.html($detail);
                $itemToolTip.addClass("active");
                updateTooltipPosition(e.pageX, e.pageY);
            }
            
        },
        mouseleave: function() {
            $itemToolTip.removeClass("active");
            $itemToolTip.show().hide();
        },
        mousemove: function(e) {
            var self = this;
            if (e && $itemToolTip.hasClass("active")) {
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