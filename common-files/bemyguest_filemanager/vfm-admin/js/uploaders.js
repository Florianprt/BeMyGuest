/*
* MIT Licensed
* http://www.23developer.com/opensource
* http://github.com/23/resumable.js
* Steffen Tiedemann Christensen, steffen@23company.com
*/
(function(){"use strict";var e=function(t){function u(e,t){var n=this;n.opts={};n.getOpt=e.getOpt;n._prevProgress=0;n.resumableObj=e;n.file=t;n.fileName=t.fileName||t.name;n.size=t.size;n.relativePath=t.webkitRelativePath||n.fileName;n.uniqueIdentifier=r.generateUniqueIdentifier(t);n._pause=false;n.container="";var i=false;var s=function(e,t){switch(e){case"progress":n.resumableObj.fire("fileProgress",n);break;case"error":n.abort();i=true;n.chunks=[];n.resumableObj.fire("fileError",n,t);break;case"success":if(i)return;n.resumableObj.fire("fileProgress",n);if(n.isComplete()){n.resumableObj.fire("fileSuccess",n,t)}break;case"retry":n.resumableObj.fire("fileRetry",n);break}};n.chunks=[];n.abort=function(){var e=0;r.each(n.chunks,function(t){if(t.status()=="uploading"){t.abort();e++}});if(e>0)n.resumableObj.fire("fileProgress",n)};n.cancel=function(){var e=n.chunks;n.chunks=[];r.each(e,function(e){if(e.status()=="uploading"){e.abort();n.resumableObj.uploadNextChunk()}});n.resumableObj.removeFile(n);n.resumableObj.fire("fileProgress",n)};n.retry=function(){n.bootstrap();var e=false;n.resumableObj.on("chunkingComplete",function(){if(!e)n.resumableObj.upload();e=true})};n.bootstrap=function(){n.abort();i=false;n.chunks=[];n._prevProgress=0;var e=n.getOpt("forceChunkSize")?Math.ceil:Math.floor;var t=Math.max(e(n.file.size/n.getOpt("chunkSize")),1);for(var r=0;r<t;r++){(function(e){window.setTimeout(function(){n.chunks.push(new a(n.resumableObj,n,e,s));n.resumableObj.fire("chunkingProgress",n,e/t)},0)})(r)}window.setTimeout(function(){n.resumableObj.fire("chunkingComplete",n)},0)};n.progress=function(){if(i)return 1;var e=0;var t=false;r.each(n.chunks,function(n){if(n.status()=="error")t=true;e+=n.progress(true)});e=t?1:e>.999?1:e;e=Math.max(n._prevProgress,e);n._prevProgress=e;return e};n.isUploading=function(){var e=false;r.each(n.chunks,function(t){if(t.status()=="uploading"){e=true;return false}});return e};n.isComplete=function(){var e=false;r.each(n.chunks,function(t){var n=t.status();if(n=="pending"||n=="uploading"||t.preprocessState===1){e=true;return false}});return!e};n.pause=function(e){if(typeof e==="undefined"){n._pause=n._pause?false:true}else{n._pause=e}};n.isPaused=function(){return n._pause};n.resumableObj.fire("chunkingStart",n);n.bootstrap();return this}function a(e,t,n,i){var s=this;s.opts={};s.getOpt=e.getOpt;s.resumableObj=e;s.fileObj=t;s.fileObjSize=t.size;s.fileObjType=t.file.type;s.offset=n;s.callback=i;s.lastProgressCallback=new Date;s.tested=false;s.retries=0;s.pendingRetry=false;s.preprocessState=0;var o=s.getOpt("chunkSize");s.loaded=0;s.startByte=s.offset*o;s.endByte=Math.min(s.fileObjSize,(s.offset+1)*o);if(s.fileObjSize-s.endByte<o&&!s.getOpt("forceChunkSize")){s.endByte=s.fileObjSize}s.xhr=null;s.test=function(){s.xhr=new XMLHttpRequest;var e=function(e){s.tested=true;var t=s.status();if(t=="success"){s.callback(t,s.message());s.resumableObj.uploadNextChunk()}else{s.send()}};s.xhr.addEventListener("load",e,false);s.xhr.addEventListener("error",e,false);var t=[];var n=s.getOpt("query");if(typeof n=="function")n=n(s.fileObj,s);r.each(n,function(e,n){t.push([encodeURIComponent(e),encodeURIComponent(n)].join("="))});t.push(["resumableChunkNumber",encodeURIComponent(s.offset+1)].join("="));t.push(["resumableChunkSize",encodeURIComponent(s.getOpt("chunkSize"))].join("="));t.push(["resumableCurrentChunkSize",encodeURIComponent(s.endByte-s.startByte)].join("="));t.push(["resumableTotalSize",encodeURIComponent(s.fileObjSize)].join("="));t.push(["resumableType",encodeURIComponent(s.fileObjType)].join("="));t.push(["resumableIdentifier",encodeURIComponent(s.fileObj.uniqueIdentifier)].join("="));t.push(["resumableFilename",encodeURIComponent(s.fileObj.fileName)].join("="));t.push(["resumableRelativePath",encodeURIComponent(s.fileObj.relativePath)].join("="));s.xhr.open("GET",r.getTarget(t));s.xhr.timeout=s.getOpt("xhrTimeout");s.xhr.withCredentials=s.getOpt("withCredentials");r.each(s.getOpt("headers"),function(e,t){s.xhr.setRequestHeader(e,t)});s.xhr.send(null)};s.preprocessFinished=function(){s.preprocessState=2;s.send()};s.send=function(){var e=s.getOpt("preprocess");if(typeof e==="function"){switch(s.preprocessState){case 0:e(s);s.preprocessState=1;return;case 1:return;case 2:break}}if(s.getOpt("testChunks")&&!s.tested){s.test();return}s.xhr=new XMLHttpRequest;s.xhr.upload.addEventListener("progress",function(e){if(new Date-s.lastProgressCallback>s.getOpt("throttleProgressCallbacks")*1e3){s.callback("progress");s.lastProgressCallback=new Date}s.loaded=e.loaded||0},false);s.loaded=0;s.pendingRetry=false;s.callback("progress");var t=function(e){var t=s.status();if(t=="success"||t=="error"){s.callback(t,s.message());s.resumableObj.uploadNextChunk()}else{s.callback("retry",s.message());s.abort();s.retries++;var n=s.getOpt("chunkRetryInterval");if(n!==undefined){s.pendingRetry=true;setTimeout(s.send,n)}else{s.send()}}};s.xhr.addEventListener("load",t,false);s.xhr.addEventListener("error",t,false);var n={resumableChunkNumber:s.offset+1,resumableChunkSize:s.getOpt("chunkSize"),resumableCurrentChunkSize:s.endByte-s.startByte,resumableTotalSize:s.fileObjSize,resumableType:s.fileObjType,resumableIdentifier:s.fileObj.uniqueIdentifier,resumableFilename:s.fileObj.fileName,resumableRelativePath:s.fileObj.relativePath,resumableTotalChunks:s.fileObj.chunks.length};var i=s.getOpt("query");if(typeof i=="function")i=i(s.fileObj,s);r.each(i,function(e,t){n[e]=t});var o=s.fileObj.file.slice?"slice":s.fileObj.file.mozSlice?"mozSlice":s.fileObj.file.webkitSlice?"webkitSlice":"slice",u=s.fileObj.file[o](s.startByte,s.endByte),a=null,f=s.getOpt("target");if(s.getOpt("method")==="octet"){a=u;var l=[];r.each(n,function(e,t){l.push([encodeURIComponent(e),encodeURIComponent(t)].join("="))});f=r.getTarget(l)}else{a=new FormData;r.each(n,function(e,t){a.append(e,t)});a.append(s.getOpt("fileParameterName"),u)}s.xhr.open("POST",f);s.xhr.timeout=s.getOpt("xhrTimeout");s.xhr.withCredentials=s.getOpt("withCredentials");r.each(s.getOpt("headers"),function(e,t){s.xhr.setRequestHeader(e,t)});s.xhr.send(a)};s.abort=function(){if(s.xhr)s.xhr.abort();s.xhr=null};s.status=function(){if(s.pendingRetry){return"uploading"}else if(!s.xhr){return"pending"}else if(s.xhr.readyState<4){return"uploading"}else{if(s.xhr.status==200){return"success"}else if(r.contains(s.getOpt("permanentErrors"),s.xhr.status)||s.retries>=s.getOpt("maxChunkRetries")){return"error"}else{s.abort();return"pending"}}};s.message=function(){return s.xhr?s.xhr.responseText:""};s.progress=function(e){if(typeof e==="undefined")e=false;var t=e?(s.endByte-s.startByte)/s.fileObjSize:1;if(s.pendingRetry)return 0;var n=s.status();switch(n){case"success":case"error":return 1*t;case"pending":return 0*t;default:return s.loaded/(s.endByte-s.startByte)*t}};return this}if(!(this instanceof e)){return new e(t)}this.version=1;this.support=typeof File!=="undefined"&&typeof Blob!=="undefined"&&typeof FileList!=="undefined"&&(!!Blob.prototype.webkitSlice||!!Blob.prototype.mozSlice||!!Blob.prototype.slice||false);if(!this.support)return false;var n=this;n.files=[];n.defaults={chunkSize:1*1024*1024,forceChunkSize:false,simultaneousUploads:3,fileParameterName:"file",throttleProgressCallbacks:.5,query:{},headers:{},preprocess:null,method:"multipart",prioritizeFirstAndLastChunk:false,target:"/",testChunks:true,generateUniqueIdentifier:null,maxChunkRetries:undefined,chunkRetryInterval:undefined,permanentErrors:[404,415,500,501],maxFiles:undefined,withCredentials:false,xhrTimeout:0,maxFilesErrorCallback:function(e,t){var r=n.getOpt("maxFiles");alert("Please upload "+r+" file"+(r===1?"":"s")+" at a time.")},minFileSize:1,minFileSizeErrorCallback:function(e,t){alert(e.fileName||e.name+" is too small, please upload files larger than "+r.formatSize(n.getOpt("minFileSize"))+".")},maxFileSize:undefined,maxFileSizeErrorCallback:function(e,t){alert(e.fileName||e.name+" is too large, please upload files less than "+r.formatSize(n.getOpt("maxFileSize"))+".")},fileType:[],fileTypeErrorCallback:function(e,t){alert(e.fileName||e.name+" has type not allowed, please upload files of type "+n.getOpt("fileType")+".")}};n.opts=t||{};n.getOpt=function(t){var n=this;if(t instanceof Array){var i={};r.each(t,function(e){i[e]=n.getOpt(e)});return i}if(n instanceof a){if(typeof n.opts[t]!=="undefined"){return n.opts[t]}else{n=n.fileObj}}if(n instanceof u){if(typeof n.opts[t]!=="undefined"){return n.opts[t]}else{n=n.resumableObj}}if(n instanceof e){if(typeof n.opts[t]!=="undefined"){return n.opts[t]}else{return n.defaults[t]}}};n.events=[];n.on=function(e,t){n.events.push(e.toLowerCase(),t)};n.fire=function(){var e=[];for(var t=0;t<arguments.length;t++)e.push(arguments[t]);var r=e[0].toLowerCase();for(var t=0;t<=n.events.length;t+=2){if(n.events[t]==r)n.events[t+1].apply(n,e.slice(1));if(n.events[t]=="catchall")n.events[t+1].apply(null,e)}if(r=="fileerror")n.fire("error",e[2],e[1]);if(r=="fileprogress")n.fire("progress")};var r={stopEvent:function(e){e.stopPropagation();e.preventDefault()},each:function(e,t){if(typeof e.length!=="undefined"){for(var n=0;n<e.length;n++){if(t(e[n])===false)return}}else{for(n in e){if(t(n,e[n])===false)return}}},generateUniqueIdentifier:function(e){var t=n.getOpt("generateUniqueIdentifier");if(typeof t==="function"){return t(e)}var r=e.webkitRelativePath||e.fileName||e.name;var i=e.size;return i+"-"+r.replace(/[^0-9a-zA-Z_-]/img,"")},contains:function(e,t){var n=false;r.each(e,function(e){if(e==t){n=true;return false}return true});return n},formatSize:function(e){if(e<1024){return e+" bytes"}else if(e<1024*1024){return(e/1024).toFixed(0)+" KB"}else if(e<1024*1024*1024){return(e/1024/1024).toFixed(1)+" MB"}else{return(e/1024/1024/1024).toFixed(1)+" GB"}},getTarget:function(e){var t=n.getOpt("target");if(t.indexOf("?")<0){t+="?"}else{t+="&"}return t+e.join("&")}};var i=function(e){r.stopEvent(e);o(e.dataTransfer.files,e)};var s=function(e){e.preventDefault()};var o=function(e,t){var i=0;var s=n.getOpt(["maxFiles","minFileSize","maxFileSize","maxFilesErrorCallback","minFileSizeErrorCallback","maxFileSizeErrorCallback","fileType","fileTypeErrorCallback"]);if(typeof s.maxFiles!=="undefined"&&s.maxFiles<e.length+n.files.length){if(s.maxFiles===1&&n.files.length===1&&e.length===1){n.removeFile(n.files[0])}else{s.maxFilesErrorCallback(e,i++);return false}}var o=[];r.each(e,function(e){var a=e.name.split(".");var f=a[a.length-1].toLowerCase();if(s.fileType.length>0&&!r.contains(s.fileType,f)){s.fileTypeErrorCallback(e,i++);return false}if(typeof s.minFileSize!=="undefined"&&e.size<s.minFileSize){s.minFileSizeErrorCallback(e,i++);return false}if(typeof s.maxFileSize!=="undefined"&&e.size>s.maxFileSize){s.maxFileSizeErrorCallback(e,i++);return false}if(!n.getFromUniqueIdentifier(r.generateUniqueIdentifier(e))){(function(){var r=new u(n,e);window.setTimeout(function(){n.files.push(r);o.push(r);r.container=typeof t!="undefined"?t.srcElement:null;n.fire("fileAdded",r,t)},0)})()}});window.setTimeout(function(){n.fire("filesAdded",o)},0)};n.uploadNextChunk=function(){var e=false;if(n.getOpt("prioritizeFirstAndLastChunk")){r.each(n.files,function(t){if(t.chunks.length&&t.chunks[0].status()=="pending"&&t.chunks[0].preprocessState===0){t.chunks[0].send();e=true;return false}if(t.chunks.length>1&&t.chunks[t.chunks.length-1].status()=="pending"&&t.chunks[t.chunks.length-1].preprocessState===0){t.chunks[t.chunks.length-1].send();e=true;return false}});if(e)return true}r.each(n.files,function(t){if(t.isPaused()===false){r.each(t.chunks,function(t){if(t.status()=="pending"&&t.preprocessState===0){t.send();e=true;return false}})}if(e)return false});if(e)return true;var t=false;r.each(n.files,function(e){if(!e.isComplete()){t=true;return false}});if(!t){n.fire("complete")}return false};n.assignBrowse=function(e,t){if(typeof e.length=="undefined")e=[e];r.each(e,function(e){var r;if(e.tagName==="INPUT"&&e.type==="file"){r=e}else{r=document.createElement("input");r.setAttribute("type","file");r.style.display="none";e.addEventListener("click",function(){r.style.opacity=0;r.style.display="block";r.focus();r.click();r.style.display="none"},false);e.appendChild(r)}var i=n.getOpt("maxFiles");if(typeof i==="undefined"||i!=1){r.setAttribute("multiple","multiple")}else{r.removeAttribute("multiple")}if(t){r.setAttribute("webkitdirectory","webkitdirectory")}else{r.removeAttribute("webkitdirectory")}r.addEventListener("change",function(e){o(e.target.files,e);e.target.value=""},false)})};n.assignDrop=function(e){if(typeof e.length=="undefined")e=[e];r.each(e,function(e){e.addEventListener("dragover",s,false);e.addEventListener("drop",i,false)})};n.unAssignDrop=function(e){if(typeof e.length=="undefined")e=[e];r.each(e,function(e){e.removeEventListener("dragover",s);e.removeEventListener("drop",i)})};n.isUploading=function(){var e=false;r.each(n.files,function(t){if(t.isUploading()){e=true;return false}});return e};n.upload=function(){if(n.isUploading())return;n.fire("uploadStart");for(var e=1;e<=n.getOpt("simultaneousUploads");e++){n.uploadNextChunk()}};n.pause=function(){r.each(n.files,function(e){e.abort()});n.fire("pause")};n.cancel=function(){for(var e=n.files.length-1;e>=0;e--){n.files[e].cancel()}n.fire("cancel")};n.progress=function(){var e=0;var t=0;r.each(n.files,function(n){e+=n.progress()*n.size;t+=n.size});return t>0?e/t:0};n.addFile=function(e,t){o([e],t)};n.removeFile=function(e){for(var t=n.files.length-1;t>=0;t--){if(n.files[t]===e){n.files.splice(t,1)}}};n.getFromUniqueIdentifier=function(e){var t=false;r.each(n.files,function(n){if(n.uniqueIdentifier==e)t=n});return t};n.getSize=function(){var e=0;r.each(n.files,function(t){e+=t.size});return e};return this};if(typeof module!="undefined"){module.exports=e}else if(typeof define==="function"&&define.amd){define(function(){return e})}else{window.Resumable=e}})();
/*
* jQuery Form Plugin; v20140218
* http://jquery.malsup.com/form/
* Copyright (c) 2014 M. Alsup; Dual licensed: MIT/GPL
* https://github.com/malsup/form#copyright-and-license
*/
;!function(a){"use strict";"function"==typeof define&&define.amd?define(["jquery"],a):a("undefined"!=typeof jQuery?jQuery:window.Zepto)}(function(a){"use strict";function b(b){var c=b.data;b.isDefaultPrevented()||(b.preventDefault(),a(b.target).ajaxSubmit(c))}function c(b){var c=b.target,d=a(c);if(!d.is("[type=submit],[type=image]")){var e=d.closest("[type=submit]");if(0===e.length)return;c=e[0]}var f=this;if(f.clk=c,"image"==c.type)if(void 0!==b.offsetX)f.clk_x=b.offsetX,f.clk_y=b.offsetY;else if("function"==typeof a.fn.offset){var g=d.offset();f.clk_x=b.pageX-g.left,f.clk_y=b.pageY-g.top}else f.clk_x=b.pageX-c.offsetLeft,f.clk_y=b.pageY-c.offsetTop;setTimeout(function(){f.clk=f.clk_x=f.clk_y=null},100)}function d(){if(a.fn.ajaxSubmit.debug){var b="[jquery.form] "+Array.prototype.join.call(arguments,"");window.console&&window.console.log?window.console.log(b):window.opera&&window.opera.postError&&window.opera.postError(b)}}var e={};e.fileapi=void 0!==a("<input type='file'/>").get(0).files,e.formdata=void 0!==window.FormData;var f=!!a.fn.prop;a.fn.attr2=function(){if(!f)return this.attr.apply(this,arguments);var a=this.prop.apply(this,arguments);return a&&a.jquery||"string"==typeof a?a:this.attr.apply(this,arguments)},a.fn.ajaxSubmit=function(b){function c(c){var d,e,f=a.param(c,b.traditional).split("&"),g=f.length,h=[];for(d=0;g>d;d++)f[d]=f[d].replace(/\+/g," "),e=f[d].split("="),h.push([decodeURIComponent(e[0]),decodeURIComponent(e[1])]);return h}function g(d){for(var e=new FormData,f=0;f<d.length;f++)e.append(d[f].name,d[f].value);if(b.extraData){var g=c(b.extraData);for(f=0;f<g.length;f++)g[f]&&e.append(g[f][0],g[f][1])}b.data=null;var h=a.extend(!0,{},a.ajaxSettings,b,{contentType:!1,processData:!1,cache:!1,type:i||"POST"});b.uploadProgress&&(h.xhr=function(){var c=a.ajaxSettings.xhr();return c.upload&&c.upload.addEventListener("progress",function(a){var c=0,d=a.loaded||a.position,e=a.total;a.lengthComputable&&(c=Math.ceil(d/e*100)),b.uploadProgress(a,d,e,c)},!1),c}),h.data=null;var j=h.beforeSend;return h.beforeSend=function(a,c){c.data=b.formData?b.formData:e,j&&j.call(this,a,c)},a.ajax(h)}function h(c){function e(a){var b=null;try{a.contentWindow&&(b=a.contentWindow.document)}catch(c){d("cannot get iframe.contentWindow document: "+c)}if(b)return b;try{b=a.contentDocument?a.contentDocument:a.document}catch(c){d("cannot get iframe.contentDocument: "+c),b=a.document}return b}function g(){function b(){try{var a=e(r).readyState;d("state = "+a),a&&"uninitialized"==a.toLowerCase()&&setTimeout(b,50)}catch(c){d("Server abort: ",c," (",c.name,")"),h(A),w&&clearTimeout(w),w=void 0}}var c=l.attr2("target"),f=l.attr2("action"),g="multipart/form-data",j=l.attr("enctype")||l.attr("encoding")||g;x.setAttribute("target",o),(!i||/post/i.test(i))&&x.setAttribute("method","POST"),f!=m.url&&x.setAttribute("action",m.url),m.skipEncodingOverride||i&&!/post/i.test(i)||l.attr({encoding:"multipart/form-data",enctype:"multipart/form-data"}),m.timeout&&(w=setTimeout(function(){v=!0,h(z)},m.timeout));var k=[];try{if(m.extraData)for(var n in m.extraData)m.extraData.hasOwnProperty(n)&&(a.isPlainObject(m.extraData[n])&&m.extraData[n].hasOwnProperty("name")&&m.extraData[n].hasOwnProperty("value")?k.push(a('<input type="hidden" name="'+m.extraData[n].name+'">').val(m.extraData[n].value).appendTo(x)[0]):k.push(a('<input type="hidden" name="'+n+'">').val(m.extraData[n]).appendTo(x)[0]));m.iframeTarget||q.appendTo("body"),r.attachEvent?r.attachEvent("onload",h):r.addEventListener("load",h,!1),setTimeout(b,15);try{x.submit()}catch(p){var s=document.createElement("form").submit;s.apply(x)}}finally{x.setAttribute("action",f),x.setAttribute("enctype",j),c?x.setAttribute("target",c):l.removeAttr("target"),a(k).remove()}}function h(b){if(!s.aborted&&!F){if(E=e(r),E||(d("cannot access response document"),b=A),b===z&&s)return s.abort("timeout"),y.reject(s,"timeout"),void 0;if(b==A&&s)return s.abort("server abort"),y.reject(s,"error","server abort"),void 0;if(E&&E.location.href!=m.iframeSrc||v){r.detachEvent?r.detachEvent("onload",h):r.removeEventListener("load",h,!1);var c,f="success";try{if(v)throw"timeout";var g="xml"==m.dataType||E.XMLDocument||a.isXMLDoc(E);if(d("isXml="+g),!g&&window.opera&&(null===E.body||!E.body.innerHTML)&&--G)return d("requeing onLoad callback, DOM not available"),setTimeout(h,250),void 0;var i=E.body?E.body:E.documentElement;s.responseText=i?i.innerHTML:null,s.responseXML=E.XMLDocument?E.XMLDocument:E,g&&(m.dataType="xml"),s.getResponseHeader=function(a){var b={"content-type":m.dataType};return b[a.toLowerCase()]},i&&(s.status=Number(i.getAttribute("status"))||s.status,s.statusText=i.getAttribute("statusText")||s.statusText);var j=(m.dataType||"").toLowerCase(),k=/(json|script|text)/.test(j);if(k||m.textarea){var l=E.getElementsByTagName("textarea")[0];if(l)s.responseText=l.value,s.status=Number(l.getAttribute("status"))||s.status,s.statusText=l.getAttribute("statusText")||s.statusText;else if(k){var o=E.getElementsByTagName("pre")[0],p=E.getElementsByTagName("body")[0];o?s.responseText=o.textContent?o.textContent:o.innerText:p&&(s.responseText=p.textContent?p.textContent:p.innerText)}}else"xml"==j&&!s.responseXML&&s.responseText&&(s.responseXML=H(s.responseText));try{D=J(s,j,m)}catch(t){f="parsererror",s.error=c=t||f}}catch(t){d("error caught: ",t),f="error",s.error=c=t||f}s.aborted&&(d("upload aborted"),f=null),s.status&&(f=s.status>=200&&s.status<300||304===s.status?"success":"error"),"success"===f?(m.success&&m.success.call(m.context,D,"success",s),y.resolve(s.responseText,"success",s),n&&a.event.trigger("ajaxSuccess",[s,m])):f&&(void 0===c&&(c=s.statusText),m.error&&m.error.call(m.context,s,f,c),y.reject(s,"error",c),n&&a.event.trigger("ajaxError",[s,m,c])),n&&a.event.trigger("ajaxComplete",[s,m]),n&&!--a.active&&a.event.trigger("ajaxStop"),m.complete&&m.complete.call(m.context,s,f),F=!0,m.timeout&&clearTimeout(w),setTimeout(function(){m.iframeTarget?q.attr("src",m.iframeSrc):q.remove(),s.responseXML=null},100)}}}var j,k,m,n,o,q,r,s,t,u,v,w,x=l[0],y=a.Deferred();if(y.abort=function(a){s.abort(a)},c)for(k=0;k<p.length;k++)j=a(p[k]),f?j.prop("disabled",!1):j.removeAttr("disabled");if(m=a.extend(!0,{},a.ajaxSettings,b),m.context=m.context||m,o="jqFormIO"+(new Date).getTime(),m.iframeTarget?(q=a(m.iframeTarget),u=q.attr2("name"),u?o=u:q.attr2("name",o)):(q=a('<iframe name="'+o+'" src="'+m.iframeSrc+'" />'),q.css({position:"absolute",top:"-1000px",left:"-1000px"})),r=q[0],s={aborted:0,responseText:null,responseXML:null,status:0,statusText:"n/a",getAllResponseHeaders:function(){},getResponseHeader:function(){},setRequestHeader:function(){},abort:function(b){var c="timeout"===b?"timeout":"aborted";d("aborting upload... "+c),this.aborted=1;try{r.contentWindow.document.execCommand&&r.contentWindow.document.execCommand("Stop")}catch(e){}q.attr("src",m.iframeSrc),s.error=c,m.error&&m.error.call(m.context,s,c,b),n&&a.event.trigger("ajaxError",[s,m,c]),m.complete&&m.complete.call(m.context,s,c)}},n=m.global,n&&0===a.active++&&a.event.trigger("ajaxStart"),n&&a.event.trigger("ajaxSend",[s,m]),m.beforeSend&&m.beforeSend.call(m.context,s,m)===!1)return m.global&&a.active--,y.reject(),y;if(s.aborted)return y.reject(),y;t=x.clk,t&&(u=t.name,u&&!t.disabled&&(m.extraData=m.extraData||{},m.extraData[u]=t.value,"image"==t.type&&(m.extraData[u+".x"]=x.clk_x,m.extraData[u+".y"]=x.clk_y)));var z=1,A=2,B=a("meta[name=csrf-token]").attr("content"),C=a("meta[name=csrf-param]").attr("content");C&&B&&(m.extraData=m.extraData||{},m.extraData[C]=B),m.forceSync?g():setTimeout(g,10);var D,E,F,G=50,H=a.parseXML||function(a,b){return window.ActiveXObject?(b=new ActiveXObject("Microsoft.XMLDOM"),b.async="false",b.loadXML(a)):b=(new DOMParser).parseFromString(a,"text/xml"),b&&b.documentElement&&"parsererror"!=b.documentElement.nodeName?b:null},I=a.parseJSON||function(a){return window.eval("("+a+")")},J=function(b,c,d){var e=b.getResponseHeader("content-type")||"",f="xml"===c||!c&&e.indexOf("xml")>=0,g=f?b.responseXML:b.responseText;return f&&"parsererror"===g.documentElement.nodeName&&a.error&&a.error("parsererror"),d&&d.dataFilter&&(g=d.dataFilter(g,c)),"string"==typeof g&&("json"===c||!c&&e.indexOf("json")>=0?g=I(g):("script"===c||!c&&e.indexOf("javascript")>=0)&&a.globalEval(g)),g};return y}if(!this.length)return d("ajaxSubmit: skipping submit process - no element selected"),this;var i,j,k,l=this;"function"==typeof b?b={success:b}:void 0===b&&(b={}),i=b.type||this.attr2("method"),j=b.url||this.attr2("action"),k="string"==typeof j?a.trim(j):"",k=k||window.location.href||"",k&&(k=(k.match(/^([^#]+)/)||[])[1]),b=a.extend(!0,{url:k,success:a.ajaxSettings.success,type:i||a.ajaxSettings.type,iframeSrc:/^https/i.test(window.location.href||"")?"javascript:false":"about:blank"},b);var m={};if(this.trigger("form-pre-serialize",[this,b,m]),m.veto)return d("ajaxSubmit: submit vetoed via form-pre-serialize trigger"),this;if(b.beforeSerialize&&b.beforeSerialize(this,b)===!1)return d("ajaxSubmit: submit aborted via beforeSerialize callback"),this;var n=b.traditional;void 0===n&&(n=a.ajaxSettings.traditional);var o,p=[],q=this.formToArray(b.semantic,p);if(b.data&&(b.extraData=b.data,o=a.param(b.data,n)),b.beforeSubmit&&b.beforeSubmit(q,this,b)===!1)return d("ajaxSubmit: submit aborted via beforeSubmit callback"),this;if(this.trigger("form-submit-validate",[q,this,b,m]),m.veto)return d("ajaxSubmit: submit vetoed via form-submit-validate trigger"),this;var r=a.param(q,n);o&&(r=r?r+"&"+o:o),"GET"==b.type.toUpperCase()?(b.url+=(b.url.indexOf("?")>=0?"&":"?")+r,b.data=null):b.data=r;var s=[];if(b.resetForm&&s.push(function(){l.resetForm()}),b.clearForm&&s.push(function(){l.clearForm(b.includeHidden)}),!b.dataType&&b.target){var t=b.success||function(){};s.push(function(c){var d=b.replaceTarget?"replaceWith":"html";a(b.target)[d](c).each(t,arguments)})}else b.success&&s.push(b.success);if(b.success=function(a,c,d){for(var e=b.context||this,f=0,g=s.length;g>f;f++)s[f].apply(e,[a,c,d||l,l])},b.error){var u=b.error;b.error=function(a,c,d){var e=b.context||this;u.apply(e,[a,c,d,l])}}if(b.complete){var v=b.complete;b.complete=function(a,c){var d=b.context||this;v.apply(d,[a,c,l])}}var w=a("input[type=file]:enabled",this).filter(function(){return""!==a(this).val()}),x=w.length>0,y="multipart/form-data",z=l.attr("enctype")==y||l.attr("encoding")==y,A=e.fileapi&&e.formdata;d("fileAPI :"+A);var B,C=(x||z)&&!A;b.iframe!==!1&&(b.iframe||C)?b.closeKeepAlive?a.get(b.closeKeepAlive,function(){B=h(q)}):B=h(q):B=(x||z)&&A?g(q):a.ajax(b),l.removeData("jqxhr").data("jqxhr",B);for(var D=0;D<p.length;D++)p[D]=null;return this.trigger("form-submit-notify",[this,b]),this},a.fn.ajaxForm=function(e){if(e=e||{},e.delegation=e.delegation&&a.isFunction(a.fn.on),!e.delegation&&0===this.length){var f={s:this.selector,c:this.context};return!a.isReady&&f.s?(d("DOM not ready, queuing ajaxForm"),a(function(){a(f.s,f.c).ajaxForm(e)}),this):(d("terminating; zero elements found by selector"+(a.isReady?"":" (DOM not ready)")),this)}return e.delegation?(a(document).off("submit.form-plugin",this.selector,b).off("click.form-plugin",this.selector,c).on("submit.form-plugin",this.selector,e,b).on("click.form-plugin",this.selector,e,c),this):this.ajaxFormUnbind().bind("submit.form-plugin",e,b).bind("click.form-plugin",e,c)},a.fn.ajaxFormUnbind=function(){return this.unbind("submit.form-plugin click.form-plugin")},a.fn.formToArray=function(b,c){var d=[];if(0===this.length)return d;var f,g=this[0],h=this.attr("id"),i=b?g.getElementsByTagName("*"):g.elements;if(i&&!/MSIE 8/.test(navigator.userAgent)&&(i=a(i).get()),h&&(f=a(":input[form="+h+"]").get(),f.length&&(i=(i||[]).concat(f))),!i||!i.length)return d;var j,k,l,m,n,o,p;for(j=0,o=i.length;o>j;j++)if(n=i[j],l=n.name,l&&!n.disabled)if(b&&g.clk&&"image"==n.type)g.clk==n&&(d.push({name:l,value:a(n).val(),type:n.type}),d.push({name:l+".x",value:g.clk_x},{name:l+".y",value:g.clk_y}));else if(m=a.fieldValue(n,!0),m&&m.constructor==Array)for(c&&c.push(n),k=0,p=m.length;p>k;k++)d.push({name:l,value:m[k]});else if(e.fileapi&&"file"==n.type){c&&c.push(n);var q=n.files;if(q.length)for(k=0;k<q.length;k++)d.push({name:l,value:q[k],type:n.type});else d.push({name:l,value:"",type:n.type})}else null!==m&&"undefined"!=typeof m&&(c&&c.push(n),d.push({name:l,value:m,type:n.type,required:n.required}));if(!b&&g.clk){var r=a(g.clk),s=r[0];l=s.name,l&&!s.disabled&&"image"==s.type&&(d.push({name:l,value:r.val()}),d.push({name:l+".x",value:g.clk_x},{name:l+".y",value:g.clk_y}))}return d},a.fn.formSerialize=function(b){return a.param(this.formToArray(b))},a.fn.fieldSerialize=function(b){var c=[];return this.each(function(){var d=this.name;if(d){var e=a.fieldValue(this,b);if(e&&e.constructor==Array)for(var f=0,g=e.length;g>f;f++)c.push({name:d,value:e[f]});else null!==e&&"undefined"!=typeof e&&c.push({name:this.name,value:e})}}),a.param(c)},a.fn.fieldValue=function(b){for(var c=[],d=0,e=this.length;e>d;d++){var f=this[d],g=a.fieldValue(f,b);null===g||"undefined"==typeof g||g.constructor==Array&&!g.length||(g.constructor==Array?a.merge(c,g):c.push(g))}return c},a.fieldValue=function(b,c){var d=b.name,e=b.type,f=b.tagName.toLowerCase();if(void 0===c&&(c=!0),c&&(!d||b.disabled||"reset"==e||"button"==e||("checkbox"==e||"radio"==e)&&!b.checked||("submit"==e||"image"==e)&&b.form&&b.form.clk!=b||"select"==f&&-1==b.selectedIndex))return null;if("select"==f){var g=b.selectedIndex;if(0>g)return null;for(var h=[],i=b.options,j="select-one"==e,k=j?g+1:i.length,l=j?g:0;k>l;l++){var m=i[l];if(m.selected){var n=m.value;if(n||(n=m.attributes&&m.attributes.value&&!m.attributes.value.specified?m.text:m.value),j)return n;h.push(n)}}return h}return a(b).val()},a.fn.clearForm=function(b){return this.each(function(){a("input,select,textarea",this).clearFields(b)})},a.fn.clearFields=a.fn.clearInputs=function(b){var c=/^(?:color|date|datetime|email|month|number|password|range|search|tel|text|time|url|week)$/i;return this.each(function(){var d=this.type,e=this.tagName.toLowerCase();c.test(d)||"textarea"==e?this.value="":"checkbox"==d||"radio"==d?this.checked=!1:"select"==e?this.selectedIndex=-1:"file"==d?/MSIE/.test(navigator.userAgent)?a(this).replaceWith(a(this).clone(!0)):a(this).val(""):b&&(b===!0&&/hidden/.test(d)||"string"==typeof b&&a(this).is(b))&&(this.value="")})},a.fn.resetForm=function(){return this.each(function(){("function"==typeof this.reset||"object"==typeof this.reset&&!this.reset.nodeType)&&this.reset()})},a.fn.enable=function(a){return void 0===a&&(a=!0),this.each(function(){this.disabled=!a})},a.fn.selected=function(b){return void 0===b&&(b=!0),this.each(function(){var c=this.type;if("checkbox"==c||"radio"==c)this.checked=b;else if("option"==this.tagName.toLowerCase()){var d=a(this).parent("select");b&&d[0]&&"select-one"==d[0].type&&d.find("option").selected(!1),this.selected=b}})},a.fn.ajaxSubmit.debug=!1});