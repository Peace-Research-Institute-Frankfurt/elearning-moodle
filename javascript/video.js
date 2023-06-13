/*global Modernizr, $ */

// /**
//  * Reponsive and gracefully degrading header video
//    More info on http://zerosixthree.se/create-a-responsive-header-video-with-graceful-degradation/
//  * -----------------------------------------------------------------------------
//  */
'use strict';

var HeaderVideo = function(settings) {
    if (settings.element.length === 0) {
        return;
    }
    this.init(settings);
};

HeaderVideo.prototype.init = function(settings) {
    this.$element = $(settings.element);
    this.settings = settings;
    this.videoDetails = this.getVideoDetails();

    $(this.settings.closeTrigger).hide();
    this.bindUIActions();

    if(this.videoDetails.teaser && Modernizr.video && !Modernizr.touch) {
        this.appendTeaserVideo();
    }
};

HeaderVideo.prototype.bindUIActions = function() {
    var that = this;
    $(this.settings.playTrigger).on('click', function(e) {
        e.preventDefault();
        that.appendIframe();
    });
    $(this.settings.closeTrigger).on('click', function(e){
        e.preventDefault();
        that.removeVideo();
    });
};

HeaderVideo.prototype.appendVideo = function() {
    //var html = '<iframe id="header-video__video-element" src="'+this.videoDetails.videoURL+'?rel=0&amp;hd=1&autohide=1&showinfo=0&autoplay=1&enablejsapi=1&origin=*" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
    var source = this.videoDetails.videoURL;
    var html = '<video id="header-video__video-element" autoplay="true" loop="false" id="header-video__teaser-video" class="header-video__teaser-video"><source src="'+source+'.mp4" type="video/mp4"></video>';
    $(this.settings.playTrigger).fadeOut();
    $(this.settings.closeTrigger).fadeIn();
    this.$element.append(html);
};

HeaderVideo.prototype.appendIframe = function() {
    var html = '<iframe id="header-video__video-element" src="'+this.videoDetails.videoURL+'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
    $(this.settings.playTrigger).fadeOut();
    $("#header-infobox").fadeOut();
    $("#main-facts").fadeOut();
    $(this.settings.media).fadeOut();
    $(this.settings.closeTrigger).fadeIn();
    this.$element.append(html);
  
    var element = this.$element;
    this.height = element.height();
    var windowWidth = $(window).width();
    var windowHeight = $(window).height();
    var height = windowHeight < windowWidth * this.videoDetails.videoRatio ? Math.ceil(windowHeight) : Math.ceil(windowWidth * this.videoDetails.videoRatio);
    this.$element.animate({height: height+"px"}, 1000);
    
    $('html').toggleClass('no-sticky-navbar', true);
    $(window).trigger('scroll');
    $('html, body').animate({ scrollTop: this.$element.offset().top }, 1000);
    $('#header-video__teaser-video').fadeOut(1000);
};

HeaderVideo.prototype.removeVideo = function() {
    $(this.settings.playTrigger).fadeIn();
    $("#header-infobox").fadeIn();
    $("#main-facts").fadeIn();
    $(this.settings.media).fadeIn();
    $(this.settings.closeTrigger).fadeOut();
    this.$element.find('#header-video__video-element').remove();
  
    var element = this.$element;
    element.animate({height: this.height+"px"}, function() { element.css("height", ""); });
  
    $('html').toggleClass('no-sticky-navbar', false);
    $(window).trigger('scroll');
    $('#header-video__teaser-video').fadeIn(1000);
};

HeaderVideo.prototype.appendTeaserVideo = function() {
    var source = this.videoDetails.teaser;
    var html = '<video autoplay="true" loop="true" muted id="header-video__teaser-video" class="header-video__teaser-video"><source src="'+source+'.mp4" type="video/mp4"></video>';
    this.$element.append(html);
};

HeaderVideo.prototype.getVideoDetails = function() {
    var mediaElement = $(this.settings.media);

    return {
        videoURL: mediaElement.attr('data-video-URL'),
        teaser: mediaElement.attr('data-teaser'),
        videoRatio: mediaElement.attr('data-video-ratio')
    };
};
