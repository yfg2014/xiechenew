﻿(function(){function h(){i.style.display="none"}function q(){for(var a=j.childNodes,b=0;b<a.length;b++)a[b].className="ml"}function B(a){return function(){b.blur();r(a,null);k?(sug_zhida(),document.sug_form.submit(),document.sug_form.action="http://www.cheyisou.com/post.aspx",document.sug_form.method="get",k=!1):sug_So();h()}}function v(){if(s)return!1;if(!("object"!=typeof f||"undefined"==typeof f.s)){var a=document.createElement("ul");a.id="sug_t";for(var c=0;c<f.s.length;c++){var d=document.createElement("li");
a.appendChild(d);d.onmouseover=function(){q();this.className="current";t=!0};d.onmouseout=q;d.onmousedown=function(a){u=!0;if(!w)return a.stopPropagation(),!1};d.onclick=B(c);var e=f.s[c].split("|")[0];1<f.s[c].split("|").length?(d.innerHTML=0==e.indexOf(b.value)?b.value+"<strong>"+e.substring(b.value.length)+"</strong> - \u9891\u9053>>":e+" - \u9891\u9053>>",d.className="ml_l"):d.innerHTML=0==e.indexOf(b.value)?b.value+"<strong>"+e.substring(b.value.length)+"</strong>":e}i.innerHTML="";i.appendChild(a);
i.style.display="block";j=document.getElementById("sug_t");g=-1;l=""}}function r(a){b.value=f.s[a].split("|")[0];1<f.s[a].split("|").length?(x.value=f.s[a].split("|")[1],k=!0):(x.value="",k=!1)}function C(){var a=!0,c=b.value;if("undefined"!=typeof j&&null!=j)for(var d=j.childNodes,e=0;e<d.length;e++)"current"==d[e].className&&c==d[e].innerHTML.replace(/<[^>]*>/g,"")&&!t&&(a=!1);a&&!o&&(m&&document.body.removeChild(m),m=document.createElement("script"),a="http://59.151.102.96/sug0107.php?k="+encodeURIComponent(b.value)+
"&st="+document.getElementById("sug_datatype").value+"&ac=sug&d="+(new Date).getTime(),"undefined"!=typeof document.getElementById("sug_encoding").value&&(a+="&en="+document.getElementById("sug_encoding").value),m.src=a,document.body.appendChild(m))}function D(){var a=b.value;a==y&&""!=a&&a!=l?0==p&&(p=setTimeout(C,100)):(clearTimeout(p),p=0,y=a,""==a&&h(),l!=b.value&&(l=""))}function z(){"none"!=i.style.display&&setTimeout(function(){h();null!=f&&(v(f),b.focus())},100)}var j=null,i=document.getElementById("sug"),
b=document.getElementById("sug_txt_keyword"),x=document.getElementById("sug_hidurl"),f,m=null,o=!1,t=!1,u=!1,g=-1,k=!1,w=-1!=navigator.userAgent.indexOf("MSIE")&&!window.opera;navigator.userAgent.indexOf("AppleWebKit/");var E=-1<navigator.userAgent.indexOf("Gecko")&&-1==navigator.userAgent.indexOf("KHTML"),n=0,s=!1,A="\u5927\u4f17,\u73b0\u4ee3,\u96ea\u4f5b\u5170,\u522b\u514b,\u4e30\u7530,\u65e5\u4ea7".split(",");b.focus();b.onfocus=function(){b.value="";s=!1};b.onblur=function(){if(""==b.value){var a=
Math.round(Math.random()*(A.length-1));b.value=A[a]}s=!0};window.bitauto={sug:function(a){"object"==typeof a&&"undefined"!=typeof a.s&&"undefined"!=typeof a.s[0]?(f=a,b==document.activeElement&&v()):(h(),f={})},init:function(){l=b.value;setInterval(D,10)}};var y="",l,p=0;b.onkeydown=function(a){a=a||window.event;o=!1;var c;13==a.keyCode&&(k?sug_zhida():sug_redirect(),h());if(38==a.keyCode||40==a.keyCode)if(t=!1,"none"!=i.style.display){var d=j.childNodes,e=d.length;for(c=0;c<e;c++)if("current"==d[c].className){g=
c;break}q();38==a.keyCode&&(0==g?(b.value=f.q,g=-1,o=!0):(-1==g&&(g=e),c=d[--g],c.className="current",r(g)));40==a.keyCode&&(g==e-1?(b.value=f.q,g=-1,o=!0):(c=d[++g],c.className="current",r(g)));w||a.preventDefault()}};document.onmousedown=function(a){a=a||window.event;a=a.target||a.srcElement;if(a!=b){for(;a=a.parentNode;)if(a==i||a==b)return;0==n&&(n=setTimeout(h,200));h()}};window.onresize=function(){"undefined"!=typeof n&&0!=n&&clearTimeout(n);z()};document.onkeydown=function(a){E&&(a=a||window.event,
a.ctrlKey&&(61==a.keyCode||107==a.keyCode||109==a.keyCode||96==a.keyCode||48==a.keyCode)&&z())};b.onbeforedeactivate=function(){u&&(window.event.cancelBubble=!0,u=window.event.returnValue=!1)};b.setAttribute("autocomplete","off")})();String.prototype.trimAll=function(){return this.replace(/(^\s*)|(\s*)|(\s*$)/g,"")};function sug_So(){BSearchRGo();document.sug_form.action="http://www.cheyisou.com/post.aspx";document.sug_form.method="get";document.sug_form.submit()}
function sug_redirect(){BSearchRGo();document.sug_form.action="http://www.cheyisou.com/post.aspx";document.sug_form.method="get"}function sug_zhida(){document.sug_form.action=document.getElementById("sug_hidurl").value;document.sug_form.method="post"}function BSearchRGo(){"undefined"==typeof sug_flagID&&(sug_flagID="-100");(new Image).src="http://www.cheyisou.com/rl.aspx?kw="+document.getElementById("sug_txt_keyword").value+"&bc=-2&ct="+sug_flagID+"&ts="+(new Date).getTime()};