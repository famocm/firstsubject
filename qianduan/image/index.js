ec.load("ajax");ec.pkg("ec.index");ec.index.clickHref=function(a){window.open(a)};ec.index.sales=function(e){var a=[],b=[],c=[],d=$(e),f="";d.each(function(k,m){var l=$(m),j=l.attr("data-activityId"),h=l.attr("data-skuId"),g=l.attr("data-skuType");if(j>0){a.push(j);b.push(h);c.push(g)}});f="&activityIds="+a.join("&activityIds=")+"&skuIds="+b.join("&skuIds=")+"&types="+c.join("&types=");setTimeout(function(){new ec.ajax().get({url:"/sale/activitySkuInfo.json?_t="+new Date().getTime()+f,timeout:10000,timeoutFunction:function(){location.reload()},successFunction:function(g){if(!g.success){location.reload();return}ec.index.salesCallBack(d,g)}})},500)};ec.index.salesStatus=[];ec.index.salesCallBack=function(h,k){var f,d=[],b=new Date();b.setTime(ec.index.now.parseDate("yyyy-MM-dd HH:mm:ss"));var a=function(i,o){var n=$(o),l=n.attr("data-skutype"),m=$(".channel-button",n);switch(parseInt(i,10)){case 0:m.html("\u9a6c\u4e0a\u5f00\u59cb").attr("title","\u9a6c\u4e0a\u5f00\u59cb");if(l==3||l==4){m.attr("class","channel-button-begin")}break;case 1:if(l==3){m.html("\u53bb\u770b\u770b").attr("title","\u53bb\u770b\u770b")}else{m.html("\u7acb\u5373\u62a2\u8d2d").attr("title","\u7acb\u5373\u62a2\u8d2d")}m.attr("class","channel-button");break;case 2:m.html("\u6d3b\u52a8\u7ed3\u675f").attr("title","\u6d3b\u52a8\u7ed3\u675f");if(l==2||l==3){m.attr("class","channel-button-end")}break}};for(var c=0;c<k.infoList.length;c+=1){f=h[c];d=k.infoList[c];$(".channel-button",f).css("visibility","");if(!d||!d.id){continue}if(d.status==1){if(d.startTime&&d.startTime>=b){d.status=0}if(d.endTime&&d.endTime<=b){d.status=2}}a(d.status,f);if(d.startTime||d.endTime||d.limitAmount>0){$(".p-countdown",f).show()}if(d.limitAmount>0){$(".p-quantity",f).html("\u9650<b>"+d.limitAmount+"</b>\u53f0").show()}var e=parseFloat($(f).attr("data-price"),10);if(d.price>0){if(parseInt(d.price)==d.price){$(".p-sale-price span, .p-price span",f).html((d.price));if(parseInt(e)==e){$(".economize",f).html(e-d.price)}else{$(".economize",f).html((e-d.price).toFixed(2))}}else{$(".p-sale-price span, .p-price span",f).html((d.price).toFixed(2));if(e-d.price==0){$(".economize",f).html("0")}else{$(".economize",f).html((e-d.price).toFixed(2))}}}$(".sale-quantity",f).html(d.saleAmount);if(d.status!=2&&(d.startTime||d.endTime)){var g=($(f).attr("data-block")=="slider")?true:false,j=[];if(d.startTime){j.push(new Date(d.startTime).format("yyyy-MM-dd HH:mm:ss"))}if(d.endTime){j.push(new Date(d.endTime).format("yyyy-MM-dd HH:mm:ss"))}ec.index.salesStatus[c]=d.status;ec.ui.countdown($(".p-time",f),{html:"<b>"+(g?"":"\u5269\u4f59")+"</b><ins><i>{#hours}</i><s></s></ins><em>\u65f6</em><ins><i>{#minutes}</i><s></s></ins><em>\u5206</em><ins><i>{#seconds}</i><s></s></ins><em>\u79d2</em>",now:b,times:j,index:c,callback:function(i){ec.index.salesStatus[i.index]++;a(ec.index.salesStatus[i.index],h[i.index])}})}}};ec.ready(function(){$("#tab-notice,#tab-news").mouseover(function(){$(this).addClass("current").siblings().removeClass("current");$("#"+this.id+"-content").show().siblings().hide()});if(ec.account.isLogin()){$("#cust_login_info").hide()}var a=ec.index.bigAd,f=ec.index.smallAd,p=ec.index.bigadShowTime,l,b,i=function(){var u=b.innerHeight();var t=l.innerHeight();var v=$(".searchBar-form").offset().top-t+u;var s=$(".searchBar-form").innerHeight();$(".autocomplete-w1").parent().hide();l.slideUp(1000,function(){if(f){b.show()}$(".autocomplete-w1").parent().css({top:(v+s+"px")});$(".autocomplete-w1").parent().show();ec.index.floatLayout();ec.index.floatLayout("left")});if(q){clearTimeout(q)}},q;$("#top-banner-block").html(gid("top-banner").value);l=$("#top-banner-max");b=$("#top-banner-min");if(a){l.show();ec.index.floatLayout();ec.index.floatLayout("left");$("#top-banner-max-toggle").click(i);q=setTimeout(i,p)}if(f&&!a){b.show();ec.index.floatLayout();ec.index.floatLayout("left")}if(!f&&!a){ec.index.floatLayout();ec.index.floatLayout("left")}$("body .layout .channel-pro-item").hover(function(){$(this).addClass("pro-info-hover")},function(){$(this).removeClass("pro-info-hover")});ec.index.sales("#main-sale-list .activity-list, #slider-sale-list .activity-list");var h=ec.util.cookie.get("showAds");if("true"!=h){if($("#web_popup_ads").length>0){var g=new Date(),r=g.getHours(),m=g.getMinutes();time=24-r-(m/60);var d=$("#web_popup_ads");var k=$(window).width();var n=$(window).height();var j=d.width();var e=d.height();var o=document.createElement("div");o.className="mask-new";o.style.width=k+"px";o.style.height=n+"px";o.style.background="#000";o.style.position="fixed";o.style.top=0;o.style.left=0;o.style.zIndex=499;o.style.opacity=0.4;o.style.filter="progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";document.body.appendChild(o);$("#web_popup_ads").css({position:"fixed",left:(k/2-j/2)+"px",top:(n/2-e/2)+"px","z-index":9999}).show();$(window).resize(function(){k=$(window).width();n=$(window).height();$("#web_popup_ads").css({left:(k/2-j/2)+"px",top:(n/2-e/2)+"px"})});ec.util.cookie.set("showAds","true",{expires:time/24,domain:".vmall.com"});$("#close_web_popup_ads").click(function(){$("#web_popup_ads").hide();$(".mask-new").remove()});var c=setInterval(function(){$("#close_web_popup_time").html(parseInt($("#close_web_popup_time").html())>0?parseInt($("#close_web_popup_time").html())-1:0)},1000);setTimeout(function(){$("#web_popup_ads").hide();$(".mask-new").remove();clearInterval(c)},5000)}}});ec.index.floatLayout=function(h){var g=$("#event-float-layout");var a=$("#event-float");if(h&&h=="left"){g=$("#event-float-layout-left");a=$("#event-float-left");g.bind("click",function(l){var i=$(l.target);if(i[0].tagName=="A"){i=i.parent()}else{if(i[0].tagName=="P"||i[0].tagName=="IMG"){return}}i.css({background:"#ca151e"}).siblings().css({background:"#444"})})}if(g.length==0){return false}if(g[0]!=undefined&&a[0]!=undefined){var k=g.height();var d=a.offset();var j=d.top;var b=d.left;var f=true;var c=g.offset().top}else{return}if($.browser.msie&&($.browser.version=="7.0")&&($.browser.version=="6.0")){g.hide();f=false}else{if($(window).width()<1420){if(!h){g.css({right:$(window).width()>1250?(1420-$(window).width())/2-60:(1420-$(window).width())-200+"px"})}}$(window).scroll(function(){if(!f){return}var e=$(window).scrollTop();if(e>=c-($(window).height()/2-k)){a.addClass("tool-Fixed").css({top:$(window).height()/2-k+"px"})}else{a.removeClass("tool-Fixed").css({top:"20px",position:""})}})}$(window).resize(function(){if($(window).width()>=1420){if(!h){g.css({right:-105+"px"});a.css({right:"auto",top:$(window).height()/2-k+"px"})}}else{if(!h){g.css({right:$(window).width()>1250?(1420-$(window).width())/2-60:(1420-$(window).width())-200+"px"});a.css({right:"auto",top:$(window).height()/2-k+"px"})}}});if($(window).scrollTop()>0){$(window).trigger("scroll")}};
