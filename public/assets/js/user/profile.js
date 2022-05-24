(function($) {
    $('#video').bind('contextmenu',function() { return false; });

    var player = new MediaElementPlayer('video', {
        pluginPath: 'https://cdn.jsdelivr.net/npm/mediaelement@4.2.16/build/',
        shimScriptAccess: 'always',
        iconSprite:'/mejs-controls.svg',
        videoWidth: -1,
        videoHeight: -1,
        startVolume: 0.8,
        enableAutosize:true,
        loop:false,
        timeFormat:'mm:ss',
        alwaysShowHours:false,
        showTimecodeFrameCount:false,
        framesPerSecond: 30,
        autosizeProgress:true,
        alwaysShowControls:false,
        clickToPlayPause:true,
        iPadUseNativeControls:false,
        iPhoneUseNativeControls:false,
        AndroidUseNativeControls:false,
        stretching: 'auto',
    });

})(jQuery);
