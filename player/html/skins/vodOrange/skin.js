(function(a){a.SewisePlayerSkin={version:"1.0.0"};a.SewisePlayer=a.SewisePlayer||{}})(window);(function(a){a.SewisePlayer.IVodPlayer=a.SewisePlayer.IVodPlayer||{play:function(){},pause:function(){},stop:function(){},seek:function(){},changeClarity:function(){},setVolume:function(){},toPlay:function(){},duration:function(){},playTime:function(){},type:function(){},showTextTip:function(){},hideTextTip:function(){},muted:function(){}}})(window);(function(a){a.SewisePlayerSkin.IVodSkin=a.SewisePlayerSkin.IVodSkin||{player:function(){},started:function(){},paused:function(){},stopped:function(){},seeking:function(){},buffering:function(){},bufferProgress:function(){},loadedProgress:function(){},loadedOpen:function(){},loadedComplete:function(){},programTitle:function(){},duration:function(){},playTime:function(){},startTime:function(){},loadSpeed:function(){},initialClarity:function(){},lang:function(){},logo:function(){},timeUpdate:function(){},
volume:function(){},clarityButton:function(){},timeDisplay:function(){},controlBarDisplay:function(){},topBarDisplay:function(){},customStrings:function(){},customDatas:function(){},fullScreen:function(){},noramlScreen:function(){},initialAds:function(){},initialStatistics:function(){}}})(window);(function(){SewisePlayerSkin.Utils={stringer:{time2FigFill:function(a){var b,a=Math.floor(a);10>a?b="0"+a:b=""+a;return b},secondsToHMS:function(a){if(!(0>a)){var b=this.time2FigFill(Math.floor(a/3600)),c=this.time2FigFill(a/60%60),a=this.time2FigFill(a%60);return b+":"+c+":"+a}},secondsToMS:function(a){if(!(0>a)){var b=this.time2FigFill(a/60),a=this.time2FigFill(a%60);return b+":"+a}},dateToTimeString:function(a){var b;b=a?a:new Date;var a=b.getFullYear(),c=b.getMonth()+1,j=b.getDate(),d=this.time2FigFill(b.getHours()),
f=this.time2FigFill(b.getMinutes());b=this.time2FigFill(b.getSeconds());return a+"-"+c+"-"+j+" "+d+":"+f+":"+b},dateToTimeStr14:function(a){var b=a.getFullYear(),c=this.time2FigFill(a.getMonth()+1),j=this.time2FigFill(a.getDate()),d=this.time2FigFill(a.getHours()),f=this.time2FigFill(a.getMinutes()),a=this.time2FigFill(a.getSeconds());return b+c+j+d+f+a},dateToStrHMS:function(a){var b=this.time2FigFill(a.getHours()),c=this.time2FigFill(a.getMinutes()),a=this.time2FigFill(a.getSeconds());return b+
":"+c+":"+a},dateToYMD:function(a){var b=a.getFullYear(),c=this.time2FigFill(a.getMonth()+1),a=this.time2FigFill(a.getUTCDate());return b+"-"+c+"-"+a},hmsToDate:function(a){var a=a.split(":"),b=new Date;b.setHours(a[0]?a[0]:0,a[1]?a[1]:0,a[2]?a[2]:0);return b}},language:{zh_cn:{stop:"\u505c\u6b62\u64ad\u653e",pause:"\u6682\u505c",play:"\u64ad\u653e",fullScreen:"\u5168\u5c4f",normalScreen:"\u6062\u590d",soundOn:"\u6253\u5f00\u58f0\u97f3",soundOff:"\u5173\u95ed\u58f0\u97f3",clarity:"\u6e05\u6670\u5ea6",
titleTip:"\u6b63\u5728\u64ad\u653e\uff1a",claritySetting:"\u6e05\u6670\u5ea6\u8bbe\u7f6e",clarityOk:"\u786e\u5b9a",clarityCancel:"\u53d6\u6d88",backToLive:"\u56de\u5230\u76f4\u64ad",loading:"\u7f13\u51b2",subtitles:"\u5b57\u5e55","default":"\u9ed8\u8ba4"},en_us:{stop:"Stop",pause:"Pause",play:"Play",fullScreen:"Full Screen",normalScreen:"Normal Screen",soundOn:"Sound On",soundOff:"Sound Off",clarity:"Clarity",titleTip:"Playing: ",claritySetting:"Definition Setting",clarityOk:"OK",clarityCancel:"Cancel",
backToLive:"Back To Live",loading:"Loading",subtitles:"Subtitles","default":"Default"},lang:{},init:function(a){switch(a){case "en_US":this.lang=this.en_us;break;case "zh_CN":this.lang=this.zh_cn;break;default:this.lang=this.zh_cn}},getString:function(a){return this.lang[a]}}}})();(function(a){SewisePlayerSkin.BannersAds=function(b,c){function j(){F=SewisePlayerSkin.Utils.stringer.dateToYMD(new Date);m=c[F]||c["0000-00-00"];n=0;if(void 0!=m)A=m.length}function d(){for(var a=(new Date).getTime(),b=0;b<A;b++){var c=SewisePlayerSkin.Utils.stringer.hmsToDate(m[b].time).getTime();if(b<A-1){var u=SewisePlayerSkin.Utils.stringer.hmsToDate(m[b+1].time).getTime();if(a>c&&a<u){n=b;i(n);break}}else if(a>c){n=b;i(n);break}}}function f(){var a=(new Date).getTime();if(n<A-1){var b=SewisePlayerSkin.Utils.stringer.hmsToDate(m[n+
1].time).getTime();a>b&&(n++,i(n))}else SewisePlayerSkin.Utils.stringer.dateToYMD(new Date)!=F&&(j(),d())}function i(a){q=m[a].ads[0].picurl;g=m[a].ads[1].picurl;""==q&&""==g||(""==q&&""!=g?q=g:""!=q&&""==g&&(g=q),B.attr("src",q),u.attr("src",g))}var h=a(' <div style="position:absolute; display:table; width:100%; height:100%;"><div style="display:table-cell; text-align:left; vertical-align:middle;"><img style="pointer-events:auto; cursor:pointer; width: auto; height: auto;"></div></div> ');h.appendTo(b);
var B=h.find("img"),h=a(' <div style="position:absolute; display:table; width:100%; height:100%;"><div style="display:table-cell; text-align:right; vertical-align:middle;"><img style="pointer-events:auto; cursor:pointer; width: auto; height: auto;"></div></div> ');h.appendTo(b);var u=h.find("img"),q,g,F,m,n,A;j();void 0!=m&&(1==A&&""==m[0].time?i(0):(d(),setInterval(f,1E4)),B.click(function(a){a.originalEvent.stopPropagation();a=m[n].ads[0].link_url;window.openAdsLink&&"function"==typeof window.openAdsLink?
window.openAdsLink(a):window.open(a,"_blank")}),u.click(function(a){a.originalEvent.stopPropagation();a=m[n].ads[1].link_url;window.openAdsLink&&"function"==typeof window.openAdsLink?window.openAdsLink(a):window.open(a,"_blank")}))}})(window.jQuery);(function(a){SewisePlayerSkin.AdsContainer=function(b,c){var j=b.$container,d=b.$sewisePlayerUi,f=c.banners;if(f){var i=a("<div class='sewise-player-ads-banner'></div>");i.css({position:"absolute",width:"100%",height:"100%",left:"0px",top:"0px",overflow:"hidden","pointer-events":"none"});i.appendTo(j);d.css("z-index",1);SewisePlayerSkin.BannersAds(i,f)}}})(window.jQuery);(function(a){SewisePlayerSkin.Statistics=function(b){function c(b){var c=b["request-url"],f=b["request-data"];setInterval(function(){a.ajax({type:"post",async:!1,dataType:"json",url:c,data:f,success:function(){},error:function(){console.log("play count ajax request fail!")}})},b["request-data"].intervallen?b["request-data"].intervallen:1E4)}(b=b.playCount)&&c(b)}})(window.jQuery);(function(a){SewisePlayerSkin.ElementObject=function(){this.$sewisePlayerUi=a(".sewise-player-ui");this.$container=this.$sewisePlayerUi.parent();this.$video=this.$container.find("video").get(0);this.$controlbar=this.$sewisePlayerUi.find(".controlbar");this.$playBtn=this.$sewisePlayerUi.find(".controlbar-btns-play");this.$pauseBtn=this.$sewisePlayerUi.find(".controlbar-btns-pause");this.$stopBtn=this.$sewisePlayerUi.find(".controlbar-btns-stop");this.$fullscreenBtn=this.$sewisePlayerUi.find(".controlbar-btns-fullscreen");
this.$normalscreenBtn=this.$sewisePlayerUi.find(".controlbar-btns-normalscreen");this.$soundopenBtn=this.$sewisePlayerUi.find(".controlbar-btns-soundopen");this.$soundcloseBtn=this.$sewisePlayerUi.find(".controlbar-btns-soundclose");this.$volumelineVolume=this.$sewisePlayerUi.find(".controlbar-volumeline-volume");this.$volumelineDragger=this.$sewisePlayerUi.find(".controlbar-volumeline-dragger");this.$volumelinePoint=this.$sewisePlayerUi.find(".controlbar-volumeline-point");this.$playtime=this.$sewisePlayerUi.find(".controlbar-playtime");
this.$controlBarProgress=this.$sewisePlayerUi.find(".controlbar-progress");this.$progressPlayedLine=this.$sewisePlayerUi.find(".controlbar-progress-playedline");this.$progressPlayedPoint=this.$sewisePlayerUi.find(".controlbar-progress-playpoint");this.$progressLoadedLine=this.$sewisePlayerUi.find(".controlbar-progress-loadedline");this.$progressSeekLine=this.$sewisePlayerUi.find(".controlbar-progress-seekline");this.$logo=this.$sewisePlayerUi.find(".logo");this.$logoIcon=this.$sewisePlayerUi.find(".logo-icon");
this.$topbar=this.$sewisePlayerUi.find(".topbar");this.$programTip=this.$sewisePlayerUi.find(".topbar-program-tip");this.$programTitle=this.$sewisePlayerUi.find(".topbar-program-title");this.$topbarClock=this.$sewisePlayerUi.find(".topbar-clock");this.$buffer=this.$sewisePlayerUi.find(".buffer");this.$bufferTip=this.$sewisePlayerUi.find(".buffer-text-tip");this.$bigPlayBtn=this.$sewisePlayerUi.find(".big-play-btn");this.defStageWidth=this.$container.width();this.defStageHeight=this.$container.height();
this.defLeftValue=parseInt(this.$container.css("left"));this.defTopValue=parseInt(this.$container.css("top"));this.defOffsetX=this.$container.get(0).getBoundingClientRect().left;this.defOffsetY=this.$container.get(0).getBoundingClientRect().top;this.defOverflow=a("body").css("overflow")}})(window.jQuery);(function(a){SewisePlayerSkin.ElementLayout=function(b){var c=b.$container,j=b.$controlBarProgress,d=b.$playtime,f=b.defStageWidth,i=b.defLeftValue,h=b.defTopValue,B=b.defOffsetX,u=b.defOffsetY,q=b.defOverflow,g=parseInt(f)-265;0>g&&(g+=d.width(),d.hide());j.css("width",g);this.fullScreen=function(b){if("not-support"==b){a("body").css("overflow","hidden");var b=a(window).width(),f=a(window).height();c.css("width",b);c.css("height",f);b=a(document).scrollLeft();f=a(document).scrollTop();parseInt(a("body").css("margin-left"));
var g=parseInt(a("body").css("margin-top")),f=h-u+f-g+"px";c.css("left",i-B+b+"px");c.css("top",f)}else c.css("width","100%"),c.css("height","100%");b=parseInt(c.width())-265;0>b?(b+=d.width(),d.hide()):d.show();j.css("width",b)};this.normalScreen=function(){c.css("width","100%");c.css("height","100%");c.css("left",i);c.css("top",h);a("body").css("overflow",q);g=parseInt(f)-265;0>g?(g+=d.width(),d.hide()):d.show();j.css("width",g)};this.resize=function(){f=c.width();c.height();g=parseInt(f)-265;0>
g?(g+=d.width(),d.hide()):d.show();j.css("width",g)}}})(window.jQuery);(function(){SewisePlayerSkin.LogoBox=function(a){var b=a.$logoIcon;b.click(function(a){a.originalEvent.stopPropagation()});var c="http://www.sewise.com/";this.setLogo=function(a){b.css("background","url("+a+") 0px 0px no-repeat");b.attr("href",c)};this.setLink=function(a){c=a;b.attr("href",c)}}})(window.jQuery);(function(){SewisePlayerSkin.TopBar=function(a){var b=a.$topbar,c=a.$programTip,j=a.$programTitle,d=a.$topbarClock;setInterval(function(){var a=SewisePlayerSkin.Utils.stringer.dateToTimeString();d.text(a)},1E3);this.setTitle=function(a){j.text(a)};this.show=function(){b.css("visibility","visible")};this.hide=function(){b.css("visibility","hidden")};this.hide2=function(){b.hide()};this.initLanguage=function(){var a=SewisePlayerSkin.Utils.language.getString("titleTip");c.text(a)}}})(window.jQuery);(function(a){SewisePlayerSkin.ControlBar=function(b,c,j){function d(){!1==ca&&(G.css("visibility","visible"),j.show(),ca=!0,D=setTimeout(h,da))}function f(){0!=D&&(clearTimeout(D),D=0)}function i(){0==D&&(D=setTimeout(h,da))}function h(){G.css("visibility","hidden");j.hide();ca=!1}function B(a){a=o+(a.pageX-H);0<a&&a<v&&(w.css("width",a),r.css("left",a-N/2))}function u(b){x.unbind("mousemove",B);a(document).unbind("mouseup",u);V=b.pageX;H!=V&&(o=w.width(),I=o/v,k.seek(I*J));O=!1}function q(a){e=a.originalEvent;
1==e.targetTouches.length&&(e.preventDefault(),a=o+(e.targetTouches[0].pageX-H),0<a&&a<v&&(w.css("width",a),r.css("left",a-N/2)))}function g(a){e=a.originalEvent;r.unbind("touchmove",q);r.unbind("touchend",g);if(1==e.changedTouches.length)V=e.changedTouches[0].pageX,H!=V&&(o=w.width(),I=o/v,k.seek(I*J));O=!1}function F(a){a=l+(a.pageX-K);0<a&&a<s&&(t.css("width",a),p.css("left",a-E/2))}function m(b){x.unbind("mousemove",F);a(document).unbind("mouseup",m);W=b.pageX;K!=W&&(l=t.width(),y=l/s,k.setVolume(y),
U())}function n(a){e=a.originalEvent;1==e.targetTouches.length&&(e.preventDefault(),a=l+(e.targetTouches[0].pageX-K),0<a&&a<s&&(t.css("width",a),p.css("left",a-E/2)))}function A(a){e=a.originalEvent;p.unbind("touchmove",n);p.unbind("touchend",A);if(1==e.changedTouches.length)W=e.changedTouches[0].pageX,K!=W&&(l=t.width(),y=l/s,k.setVolume(y),U())}function T(){null!=document.fullscreenElement||null!=document.msFullscreenElement||null!=document.mozFullScreenElement||null!=document.webkitFullscreenElement?
c.fullScreen():c.normalScreen();z.timeUpdate(C)}function ba(){c.resize();z.timeUpdate(C)}function ga(){c.fullScreen("not-support");z.timeUpdate(C)}function U(){0<y?(k.muted(!1),P.show(),L.hide()):(k.muted(!0),P.hide(),L.show())}var x=b.$container,X=b.$video,G=b.$controlbar,Y=b.$playBtn,Q=b.$pauseBtn,ja=b.$stopBtn,Z=b.$fullscreenBtn,R=b.$normalscreenBtn,P=b.$soundopenBtn,L=b.$soundcloseBtn,t=b.$volumelineVolume,S=b.$volumelineDragger,p=b.$volumelinePoint,ka=b.$playtime,w=b.$progressPlayedLine,r=b.$progressPlayedPoint,
la=b.$progressLoadedLine,M=b.$progressSeekLine,ea=b.$buffer,ma=b.$bufferTip,$=b.$bigPlayBtn,z=this,k,fa="normal",J=0.1,C=0,ha="00:00:00",ia="00:00:00",N=0,O=!1,H=0,V=0,o=0,v=0,I=0,ca=!0,E=0,s=0,l=0,y=0,K=0,W=0,aa=!1,D,da=5E3,N=r.width(),v=M.width(),E=p.width(),s=S.width();Q.hide();R.hide();L.hide();ea.hide();D=setTimeout(h,da);a(X).css("pointer-events","none");x.click(function(){x.mousemove();aa?k.pause():k.play()});x.dblclick(function(){"normal"==fa?z.fullScreen():z.noramlScreen()});x.bind({mousemove:d,
touchmove:d});G.bind({mouseover:f,touchstart:f});G.bind({mouseout:i,touchend:i});G.click(function(a){a.originalEvent.stopPropagation()});Y.click(function(){k.play()});Q.click(function(){k.pause()});ja.click(function(){k.stop()});$.click(function(a){a.originalEvent.stopPropagation();k.play()});Z.click(function(){z.fullScreen()});R.click(function(){z.noramlScreen()});P.click(function(){k.muted(!0);P.hide();L.show();t.css("width",0);p.css("left",-E/2)});L.click(function(){k.muted(!1);P.show();L.hide();
t.css("width",l);p.css("left",l-E/2)});M.mousedown(function(a){o=a.pageX-a.target.getBoundingClientRect().left;v=M.width();w.css("width",o);r.css("left",o-N/2);I=o/v;k.seek(I*J)});r.mousedown(function(b){this.blur();O=!0;H=b.pageX;o=w.width();v=M.width();x.bind("mousemove",B);a(document).bind("mouseup",u)});r.bind("touchstart",function(a){e=a.originalEvent;r.blur();a=e.targetTouches[0];O=!0;H=a.pageX;o=w.width();v=M.width();r.bind("touchmove",q);r.bind("touchend",g)});S.mousedown(function(a){l=a.pageX-
a.target.getBoundingClientRect().left;s=S.width();t.css("width",l);p.css("left",l-E/2);y=l/s;k.setVolume(y);U()});p.mousedown(function(b){this.blur();K=b.pageX;l=t.width();s=S.width();x.bind("mousemove",F);a(document).bind("mouseup",m)});p.bind("touchstart",function(a){e=a.originalEvent;p.blur();K=e.targetTouches[0].pageX;l=t.width();s=S.width();p.bind("touchmove",n);p.bind("touchend",A)});document.addEventListener("fullscreenchange",T);document.addEventListener("MSFullscreenChange",T);document.addEventListener("mozfullscreenchange",
T);document.addEventListener("webkitfullscreenchange",T);a(window).bind("resize",ba);this.setPlayer=function(a){k=a};this.started=function(){Y.hide();Q.show();$.hide();aa=!0};this.paused=function(){Y.show();Q.hide();$.show();aa=!1};this.stopped=function(){Y.show();Q.hide();$.show();aa=!1};this.setDuration=function(a){J=Infinity!=a?a:3600;1<a&&(ia=SewisePlayerSkin.Utils.stringer.secondsToMS(J))};this.timeUpdate=function(a){if(void 0==a||Infinity==a)a=0;C=a;ha=SewisePlayerSkin.Utils.stringer.secondsToMS(C);
ka.text(ha+"/"+ia);O||(o=C/J*(M.width()-N),w.css("width",o),a=w.width(),r.css("left",a))};this.loadProgress=function(a){la.css("width",100*a+"%")};this.initVolume=function(a){y=a;l=s*y;t.css("width",l);p.css("left",l-E/2);U()};this.hide2=function(){G.hide()};this.fullScreen=function(){Z.hide();R.show();var b=x.get(0);a(window).unbind("resize",ba);b.requestFullscreen?b.requestFullscreen():b.msRequestFullscreen?b.msRequestFullscreen():b.mozRequestFullScreen?b.mozRequestFullScreen():b.webkitRequestFullscreen?
b.webkitRequestFullscreen():X.webkitEnterFullscreen?(X.play(),X.webkitEnterFullscreen(),Z.show(),R.hide()):(c.fullScreen("not-support"),z.timeUpdate(C),a(window).bind("resize",ga));fa="full"};this.noramlScreen=function(){Z.show();R.hide();document.exitFullscreen?document.exitFullscreen():document.msExitFullscreen?document.msExitFullscreen():document.mozCancelFullScreen?document.mozCancelFullScreen():document.webkitCancelFullScreen?document.webkitCancelFullScreen():(c.normalScreen(),z.timeUpdate(C),
a(window).unbind("resize",ga));fa="normal";a(window).bind("resize",ba)};this.showBuffer=function(){ea.show()};this.hideBuffer=function(){ea.hide()};this.initLanguage=function(){var a=SewisePlayerSkin.Utils.language.getString("loading");ma.text(a)}}})(window.jQuery);(function(a,b){b(document).ready(function(){var a=SewisePlayer.IVodPlayer,b=new SewisePlayerSkin.ElementObject,d=new SewisePlayerSkin.ElementLayout(b),f=new SewisePlayerSkin.LogoBox(b),i=new SewisePlayerSkin.TopBar(b),h=new SewisePlayerSkin.ControlBar(b,d,i);SewisePlayerSkin.IVodSkin.player=function(b){a=b;h.setPlayer(a)};SewisePlayerSkin.IVodSkin.started=function(){h.started()};SewisePlayerSkin.IVodSkin.paused=function(){h.paused()};SewisePlayerSkin.IVodSkin.stopped=function(){h.stopped()};SewisePlayerSkin.IVodSkin.duration=
function(a){h.setDuration(a)};SewisePlayerSkin.IVodSkin.timeUpdate=function(a){h.timeUpdate(a)};SewisePlayerSkin.IVodSkin.loadedProgress=function(a){h.loadProgress(a)};SewisePlayerSkin.IVodSkin.loadedOpen=function(){h.showBuffer()};SewisePlayerSkin.IVodSkin.loadedComplete=function(){h.hideBuffer()};SewisePlayerSkin.IVodSkin.programTitle=function(a){i.setTitle(a)};SewisePlayerSkin.IVodSkin.logo=function(a){f.setLogo(a)};SewisePlayerSkin.IVodSkin.volume=function(a){h.initVolume(a)};SewisePlayerSkin.IVodSkin.initialClarity=
function(){};SewisePlayerSkin.IVodSkin.clarityButton=function(){};SewisePlayerSkin.IVodSkin.timeDisplay=function(){};SewisePlayerSkin.IVodSkin.controlBarDisplay=function(a){"enable"!=a&&h.hide2()};SewisePlayerSkin.IVodSkin.topBarDisplay=function(a){"enable"!=a&&i.hide2()};SewisePlayerSkin.IVodSkin.customStrings=function(){};SewisePlayerSkin.IVodSkin.customDatas=function(a){a&&a.logoLink&&f.setLink(a.logoLink)};SewisePlayerSkin.IVodSkin.fullScreen=function(){h.fullScreen()};SewisePlayerSkin.IVodSkin.noramlScreen=
function(){h.noramlScreen()};SewisePlayerSkin.IVodSkin.initialAds=function(a){a&&SewisePlayerSkin.AdsContainer(b,a)};SewisePlayerSkin.IVodSkin.initialStatistics=function(a){a&&SewisePlayerSkin.Statistics(a)};SewisePlayerSkin.IVodSkin.lang=function(a){SewisePlayerSkin.Utils.language.init(a);h.initLanguage();i.initLanguage()};try{SewisePlayer.CommandDispatcher.dispatchEvent({type:SewisePlayer.Events.PLAYER_SKIN_LOADED,playerSkin:SewisePlayerSkin.IVodSkin})}catch(B){console.log("No Main Player")}})})(window,
window.jQuery);
