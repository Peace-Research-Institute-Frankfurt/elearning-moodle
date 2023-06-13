 $(function(){

											$( "table" ).wrap(function(){
													var ctab_obj = $(this);
												 if(ctab_obj.parent('div').hasClass('no-overflow'))
													{
															 
													}else{
														  return "<div class='no-overflow'></div>";
														}
													
													});

 });

$(document).ready(function() {
    // Sticky navbar
    function stickyNavbar() {
        if ($('html').hasClass('noscroll')) return;
        if ($(window).scrollTop() > 142 && document.documentElement.clientWidth > 979 && !$('html').hasClass('no-sticky-navbar')) {
            $('.header-main-menubar').addClass('navbar-fixed');
        } else {
            $('.header-main-menubar').removeClass('navbar-fixed');
        }
    }
    $(window).scroll(stickyNavbar);
    stickyNavbar();
});
