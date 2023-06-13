/*! Bootstrap Carousel Swipe jQuery plugin v1.1 | https://github.com/maaaaark/bcSwipe | MIT License */
!function(t){t.fn.bcSwipe=function(e){var n={threshold:50};return e&&t.extend(n,e),this.each(function(){function e(t){1==t.touches.length&&(u=t.touches[0].pageX,c=!0,this.addEventListener("touchmove",o,!1))}function o(e){if(c){var o=e.touches[0].pageX,i=u-o;Math.abs(i)>=n.threshold&&(h(),t(this).carousel(i>0?"next":"prev"))}}function h(){this.removeEventListener("touchmove",o),u=null,c=!1}var u,c=!1;"ontouchstart"in document.documentElement&&this.addEventListener("touchstart",e,!1)}),this}}(jQuery);

$(document).ready(function() {
    $('.carousel').bcSwipe({ threshold: 50 });

    var gsap = window.gsap;

    var shade = $('#shade');
    var popup = $('#popup'), popup2 = null;
    function showPopup(e, img, title, content, footer) {
        $('#popup-pic .popup-pic__image').attr('src', img);
        $('#popup-pic .popup-pic__background img').attr('src', img);
        $('#popup-title').text(title);
        $('#popup-content').html(content);
        $('#popup-footer').html(footer);

        var vw = $(window).width(), 
            vh = $(window).height(), 
            w = vw - vw*0.1, 
            h = vh - vw*0.1;
            
        // max dimensions
        w = vw > 800 ? 800 : w;
        h = vw > 600 ? 600 : h;

        var ml = -w/2, 
            mt = -h/2;

        popup.css({
            width: w+'px',
            height: h+'px',
            display: 'flex'
        });

        var scrollTop = ($('html').scrollTop()) ? $('html').scrollTop() : $('body').scrollTop();
        $('html').addClass('noscroll').css('top',-scrollTop);

        shade.fadeIn(200);

        gsap.fromTo( popup, {
            scale: 0.5,
            left: e.clientX + ml,
            top: e.clientY + mt,
            opacity: 0
        },{
            scale: 1,
            left: window.innerWidth * 0.5 + ml,
            top: window.innerHeight * 0.5 + mt,
            opacity: 1,

            duration: 0.2
        });


        $('#popup-content').scrollTop(0);

        // better performance: wait for popup zoom-in to complete, THEN apply blur
        setTimeout(function() {
            $('#wrapper').css("filter", "blur(2px)");
        }, 200);
    }
    function pushPopup(img, title, content, footer) {
        popup2 = popup.clone(true);
        gsap.set( popup2, {x: document.documentElement.clientWidth})

        $(document.body).append(popup2);
        popup2.find('#popup-pic .popup-pic__image').attr('src', img);
        popup2.find('#popup-title').text(title);
        popup2.find('#popup-content').html(content);
        popup2.find('#popup-footer').html(footer);

        gsap.to( popup2, {x: 0, opacity: 1, duration: 0.4})
        gsap.to( popup, {x: -popup.width(), opacity:0, duration: 0.4})

        popup2.find('#popup-back').show().click(function() {
            gsap.to( popup2, {
                duration: 0.4, 
                x: document.documentElement.clientWidth, 
                onComplete: function() {
                    popup2.remove();
                    popup2 = null;
                }
            });

            gsap.to( popup, { x:0, opacity:1, duration:0.4 });
        });
    };
    $('#shade, #popup-close').click(function() {
        var scrollTop = parseInt($('html').css('top'));
        $('html').removeClass('noscroll');
        $('html,body').scrollTop(-scrollTop);
        shade.fadeOut(300);
        popup.fadeOut(300);
        gsap.set( popup, {x: 0})
        if (popup2) {
            popup2.fadeOut(300, function() {
                popup2.remove();
                popup2 = null;
            });
        }
        $('#wrapper').css("filter", "");
    });

    $('.profilebg').click(function(e) {
        var paragraphs = $(this).data('description').split('\n'), html = '';
        for (var i = 0; i < paragraphs.length; i++) html += '<p>'+paragraphs[i]+'</p>';
        showPopup(e, $(this).data('img'), $(this).data('title'), html, ($(this).data('luname') && $(this).data('luname').length > 0) ? ('Author of: <a href="'+$(this).data('luurl')+'" target="_blank" id="popup-link">'+$(this).data('luname')+'</a>') : '');
    });

    $('.fp-courseinfo, .fp-coursethumb, .morelink').click(function(e) {
        var course = $(this).closest('.fp-coursebox');
        var image = course.data('img');
        var title = course.data('title');
        var description = course.data('description');
        var footer = '<a class="startlink" href="'+course.data('url')+'" target="_blank">Start Learning Unit</a>'
        showPopup(e, image, title, description, footer);

        // .pfoot is added as part of description -- move it to footer
        popup.find('.pfoot').addClass('morelink').prependTo($('#popup-footer'));

        popup.find("[data-author]").click(function() {
            var t = $("[data-title='"+$(this).data('author')+"']");
            var paragraphs = t.data('description').split('\n'), html = '';
            for (var i = 0; i < paragraphs.length; i++) html += '<p>'+paragraphs[i]+'</p>';
            pushPopup(t.data('img'), t.data('title'), html, 'Author of: <a href="'+t.data('luurl')+'" target="_blank" id="popup-link">'+t.data('luname')+'</a>');
        });
        return false;
    });
});

