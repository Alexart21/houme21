window.yii=(function($){var pub={reloadableScripts:[],clickableSelector:'a, button, input[type="submit"], input[type="button"], input[type="reset"], '+'input[type="image"]',changeableSelector:'select, input, textarea',getCsrfParam:function(){return $('meta[name=csrf-param]').attr('content');},getCsrfToken:function(){return $('meta[name=csrf-token]').attr('content');},setCsrfToken:function(name,value){$('meta[name=csrf-param]').attr('content',name);$('meta[name=csrf-token]').attr('content',value);},refreshCsrfToken:function(){var token=pub.getCsrfToken();if(token){$('form input[name="'+pub.getCsrfParam()+'"]').val(token);}},confirm:function(message,ok,cancel){if(window.confirm(message)){!ok||ok();}else{!cancel||cancel();}},handleAction:function($e,event){var $form=$e.attr('data-form')?$('#'+$e.attr('data-form')):$e.closest('form'),method=!$e.data('method')&&$form?$form.attr('method'):$e.data('method'),action=$e.attr('href'),isValidAction=action&&action!=='#',params=$e.data('params'),areValidParams=params&&$.isPlainObject(params),pjax=$e.data('pjax'),usePjax=pjax!==undefined&&pjax!==0&&$.support.pjax,pjaxContainer,pjaxOptions={};if(usePjax){pjaxContainer=$e.data('pjax-container');if(pjaxContainer===undefined||!pjaxContainer.length){pjaxContainer=$e.closest('[data-pjax-container]').attr('id')?('#'+$e.closest('[data-pjax-container]').attr('id')):'';}
if(!pjaxContainer.length){pjaxContainer='body';}
pjaxOptions={container:pjaxContainer,push:!!$e.data('pjax-push-state'),replace:!!$e.data('pjax-replace-state'),scrollTo:$e.data('pjax-scrollto'),pushRedirect:$e.data('pjax-push-redirect'),replaceRedirect:$e.data('pjax-replace-redirect'),skipOuterContainers:$e.data('pjax-skip-outer-containers'),timeout:$e.data('pjax-timeout'),originalEvent:event,originalTarget:$e};}
if(method===undefined){if(isValidAction){usePjax?$.pjax.click(event,pjaxOptions):window.location.assign(action);}else if($e.is(':submit')&&$form.length){if(usePjax){$form.on('submit',function(e){$.pjax.submit(e,pjaxOptions);});}
$form.trigger('submit');}
return;}
var oldMethod,oldAction,newForm=!$form.length;if(!newForm){oldMethod=$form.attr('method');$form.attr('method',method);if(isValidAction){oldAction=$form.attr('action');$form.attr('action',action);}}else{if(!isValidAction){action=pub.getCurrentUrl();}
$form=$('<form/>',{method:method,action:action});var target=$e.attr('target');if(target){$form.attr('target',target);}
if(!/(get|post)/i.test(method)){$form.append($('<input/>',{name:'_method',value:method,type:'hidden'}));method='post';$form.attr('method',method);}
if(/post/i.test(method)){var csrfParam=pub.getCsrfParam();if(csrfParam){$form.append($('<input/>',{name:csrfParam,value:pub.getCsrfToken(),type:'hidden'}));}}
$form.hide().appendTo('body');}
var activeFormData=$form.data('yiiActiveForm');if(activeFormData){activeFormData.submitObject=$e;}
if(areValidParams){$.each(params,function(name,value){$form.append($('<input/>').attr({name:name,value:value,type:'hidden'}));});}
if(usePjax){$form.on('submit',function(e){$.pjax.submit(e,pjaxOptions);});}
$form.trigger('submit');$.when($form.data('yiiSubmitFinalizePromise')).done(function(){if(newForm){$form.remove();return;}
if(oldAction!==undefined){$form.attr('action',oldAction);}
$form.attr('method',oldMethod);if(areValidParams){$.each(params,function(name){$('input[name="'+name+'"]',$form).remove();});}});},getQueryParams:function(url){var pos=url.indexOf('?');if(pos<0){return{};}
var pairs=$.grep(url.substring(pos+1).split('#')[0].split('&'),function(value){return value!=='';});var params={};for(var i=0,len=pairs.length;i<len;i++){var pair=pairs[i].split('=');var name=decodeURIComponent(pair[0].replace(/\+/g,'%20'));var value=decodeURIComponent(pair[1].replace(/\+/g,'%20'));if(!name.length){continue;}
if(params[name]===undefined){params[name]=value||'';}else{if(!$.isArray(params[name])){params[name]=[params[name]];}
params[name].push(value||'');}}
return params;},initModule:function(module){if(module.isActive!==undefined&&!module.isActive){return;}
if($.isFunction(module.init)){module.init();}
$.each(module,function(){if($.isPlainObject(this)){pub.initModule(this);}});},init:function(){initCsrfHandler();initRedirectHandler();initAssetFilters();initDataMethods();},getBaseCurrentUrl:function(){return window.location.protocol+'//'+window.location.host;},getCurrentUrl:function(){return window.location.href;}};function initCsrfHandler(){$.ajaxPrefilter(function(options,originalOptions,xhr){if(!options.crossDomain&&pub.getCsrfParam()){xhr.setRequestHeader('X-CSRF-Token',pub.getCsrfToken());}});pub.refreshCsrfToken();}
function initRedirectHandler(){$(document).ajaxComplete(function(event,xhr){var url=xhr&&xhr.getResponseHeader('X-Redirect');if(url){window.location.assign(url);}});}
function initAssetFilters(){var loadedScripts={};$('script[src]').each(function(){var url=getAbsoluteUrl(this.src);loadedScripts[url]=true;});$.ajaxPrefilter('script',function(options,originalOptions,xhr){if(options.dataType=='jsonp'){return;}
var url=getAbsoluteUrl(options.url),forbiddenRepeatedLoad=loadedScripts[url]===true&&!isReloadableAsset(url),cleanupRunning=loadedScripts[url]!==undefined&&loadedScripts[url]['xhrDone']===true;if(forbiddenRepeatedLoad||cleanupRunning){xhr.abort();return;}
if(loadedScripts[url]===undefined||loadedScripts[url]===true){loadedScripts[url]={xhrList:[],xhrDone:false};}
xhr.done(function(data,textStatus,jqXHR){if(loadedScripts[jqXHR.yiiUrl]['xhrDone']===true){return;}
loadedScripts[jqXHR.yiiUrl]['xhrDone']=true;for(var i=0,len=loadedScripts[jqXHR.yiiUrl]['xhrList'].length;i<len;i++){var singleXhr=loadedScripts[jqXHR.yiiUrl]['xhrList'][i];if(singleXhr&&singleXhr.readyState!==XMLHttpRequest.DONE){singleXhr.abort();}}
loadedScripts[jqXHR.yiiUrl]=true;}).fail(function(jqXHR,textStatus){if(textStatus==='abort'){return;}
delete loadedScripts[jqXHR.yiiUrl]['xhrList'][jqXHR.yiiIndex];var allFailed=true;for(var i=0,len=loadedScripts[jqXHR.yiiUrl]['xhrList'].length;i<len;i++){if(loadedScripts[jqXHR.yiiUrl]['xhrList'][i]){allFailed=false;}}
if(allFailed){delete loadedScripts[jqXHR.yiiUrl];}});xhr.yiiIndex=loadedScripts[url]['xhrList'].length;xhr.yiiUrl=url;loadedScripts[url]['xhrList'][xhr.yiiIndex]=xhr;});$(document).ajaxComplete(function(){var styleSheets=[];$('link[rel=stylesheet]').each(function(){var url=getAbsoluteUrl(this.href);if(isReloadableAsset(url)){return;}
$.inArray(url,styleSheets)===-1?styleSheets.push(url):$(this).remove();});});}
function initDataMethods(){var handler=function(event){var $this=$(this),method=$this.data('method'),message=$this.data('confirm'),form=$this.data('form');if(method===undefined&&message===undefined&&form===undefined){return true;}
if(message!==undefined){$.proxy(pub.confirm,this)(message,function(){pub.handleAction($this,event);});}else{pub.handleAction($this,event);}
event.stopImmediatePropagation();return false;};$(document).on('click.yii',pub.clickableSelector,handler).on('change.yii',pub.changeableSelector,handler);}
function isReloadableAsset(url){for(var i=0;i<pub.reloadableScripts.length;i++){var rule=getAbsoluteUrl(pub.reloadableScripts[i]);var match=new RegExp("^"+escapeRegExp(rule).split('\\*').join('.+')+"$").test(url);if(match===true){return true;}}
return false;}
function escapeRegExp(str){return str.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g,"\\$&");}
function getAbsoluteUrl(url){return url.charAt(0)==='/'?pub.getBaseCurrentUrl()+url:url;}
return pub;})(window.jQuery);window.jQuery(function(){window.yii.initModule(window.yii);});;(function($){$.fn.yiiGridView=function(method){if(methods[method]){return methods[method].apply(this,Array.prototype.slice.call(arguments,1));}else if(typeof method==='object'||!method){return methods.init.apply(this,arguments);}else{$.error('Method '+method+' does not exist in jQuery.yiiGridView');return false;}};var defaults={filterUrl:undefined,filterSelector:undefined};var gridData={};var gridEvents={beforeFilter:'beforeFilter',afterFilter:'afterFilter'};var gridEventHandlers={};var methods={init:function(options){return this.each(function(){var $e=$(this);var settings=$.extend({},defaults,options||{});var id=$e.attr('id');if(gridData[id]===undefined){gridData[id]={};}
gridData[id]=$.extend(gridData[id],{settings:settings});var filterEvents='change.yiiGridView keydown.yiiGridView';var enterPressed=false;initEventHandler($e,'filter',filterEvents,settings.filterSelector,function(event){if(event.type==='keydown'){if(event.keyCode!==13){return;}else{enterPressed=true;}}else{if(enterPressed){enterPressed=false;return;}}
methods.applyFilter.apply($e);return false;});});},applyFilter:function(){var $grid=$(this);var settings=gridData[$grid.attr('id')].settings;var data={};$.each($(settings.filterSelector).serializeArray(),function(){if(!(this.name in data)){data[this.name]=[];}
data[this.name].push(this.value);});var namesInFilter=Object.keys(data);$.each(yii.getQueryParams(settings.filterUrl),function(name,value){if(namesInFilter.indexOf(name)===-1&&namesInFilter.indexOf(name.replace(/\[\d*\]$/,''))===-1){if(!$.isArray(value)){value=[value];}
if(!(name in data)){data[name]=value;}else{$.each(value,function(i,val){if($.inArray(val,data[name])){data[name].push(val);}});}}});var pos=settings.filterUrl.indexOf('?');var url=pos<0?settings.filterUrl:settings.filterUrl.substring(0,pos);var hashPos=settings.filterUrl.indexOf('#');if(pos>=0&&hashPos>=0){url+=settings.filterUrl.substring(hashPos);}
$grid.find('form.gridview-filter-form').remove();var $form=$('<form/>',{action:url,method:'get','class':'gridview-filter-form',style:'display:none','data-pjax':''}).appendTo($grid);$.each(data,function(name,values){$.each(values,function(index,value){$form.append($('<input/>').attr({type:'hidden',name:name,value:value}));});});var event=$.Event(gridEvents.beforeFilter);$grid.trigger(event);if(event.result===false){return;}
$form.submit();$grid.trigger(gridEvents.afterFilter);},setSelectionColumn:function(options){var $grid=$(this);var id=$(this).attr('id');if(gridData[id]===undefined){gridData[id]={};}
gridData[id].selectionColumn=options.name;if(!options.multiple||!options.checkAll){return;}
var checkAll="#"+id+" input[name='"+options.checkAll+"']";var inputs=options['class']?"input."+options['class']:"input[name='"+options.name+"']";var inputsEnabled="#"+id+" "+inputs+":enabled";initEventHandler($grid,'checkAllRows','click.yiiGridView',checkAll,function(){$grid.find(inputs+":enabled").prop('checked',this.checked);});initEventHandler($grid,'checkRow','click.yiiGridView',inputsEnabled,function(){var all=$grid.find(inputs).length==$grid.find(inputs+":checked").length;$grid.find("input[name='"+options.checkAll+"']").prop('checked',all);});},getSelectedRows:function(){var $grid=$(this);var data=gridData[$grid.attr('id')];var keys=[];if(data.selectionColumn){$grid.find("input[name='"+data.selectionColumn+"']:checked").each(function(){keys.push($(this).parent().closest('tr').data('key'));});}
return keys;},destroy:function(){var events=['.yiiGridView',gridEvents.beforeFilter,gridEvents.afterFilter].join(' ');this.off(events);var id=$(this).attr('id');$.each(gridEventHandlers[id],function(type,data){$(document).off(data.event,data.selector);});delete gridData[id];return this;},data:function(){var id=$(this).attr('id');return gridData[id];}};function initEventHandler($gridView,type,event,selector,callback){var id=$gridView.attr('id');var prevHandler=gridEventHandlers[id];if(prevHandler!==undefined&&prevHandler[type]!==undefined){var data=prevHandler[type];$(document).off(data.event,data.selector);}
if(prevHandler===undefined){gridEventHandlers[id]={};}
$(document).on(event,selector,callback);gridEventHandlers[id][type]={event:event,selector:selector};}})(window.jQuery);;
/*!
 * Copyright 2012, Chris Wanstrath
 * Released under the MIT License
 * https://github.com/defunkt/jquery-pjax
 */
(function($){function fnPjax(selector,container,options){options=optionsFor(container,options)
var handler=function(event){var opts=options
if(!opts.container){opts=$.extend({history:true},options)
opts.container=$(this).attr('data-pjax')}
handleClick(event,opts)}
$(selector).removeClass('data-pjax');return this.off('click.pjax',selector,handler).on('click.pjax',selector,handler);}
function handleClick(event,container,options){options=optionsFor(container,options)
var link=event.currentTarget
var $link=$(link)
if(parseInt($link.data('pjax'))===0){return}
if(link.tagName.toUpperCase()!=='A')
throw"$.fn.pjax or $.pjax.click requires an anchor element"
if(event.which>1||event.metaKey||event.ctrlKey||event.shiftKey||event.altKey)
return
if(location.protocol!==link.protocol||location.hostname!==link.hostname)
return
if(link.href.indexOf('#')>-1&&stripHash(link)==stripHash(location))
return
if(event.isDefaultPrevented())
return
var defaults={url:link.href,container:$link.attr('data-pjax'),target:link}
var opts=$.extend({},defaults,options)
var clickEvent=$.Event('pjax:click')
$link.trigger(clickEvent,[opts])
if(!clickEvent.isDefaultPrevented()){pjax(opts)
event.preventDefault()
$link.trigger('pjax:clicked',[opts])}}
function handleSubmit(event,container,options){if(event.result===false)
return false;options=optionsFor(container,options)
var form=event.currentTarget
var $form=$(form)
if(form.tagName.toUpperCase()!=='FORM')
throw"$.pjax.submit requires a form element"
var defaults={type:($form.attr('method')||'GET').toUpperCase(),url:$form.attr('action'),container:$form.attr('data-pjax'),target:form}
if(defaults.type!=='GET'&&window.FormData!==undefined){defaults.data=new FormData(form)
defaults.processData=false
defaults.contentType=false}else{if($form.find(':file').length){return}
defaults.data=$form.serializeArray()}
pjax($.extend({},defaults,options))
event.preventDefault()}
function pjax(options){options=$.extend(true,{},$.ajaxSettings,pjax.defaults,options)
if($.isFunction(options.url)){options.url=options.url()}
var hash=parseURL(options.url).hash
var containerType=$.type(options.container)
if(containerType!=='string'){throw"expected string value for 'container' option; got "+containerType}
var context=options.context=$(options.container)
if(!context.length){throw"the container selector '"+options.container+"' did not match anything"}
if(!options.data)options.data={}
if($.isArray(options.data)){options.data=$.grep(options.data,function(obj){return'_pjax'!==obj.name})
options.data.push({name:'_pjax',value:options.container})}else{options.data._pjax=options.container}
function fire(type,args,props){if(!props)props={}
props.relatedTarget=options.target
var event=$.Event(type,props)
context.trigger(event,args)
return!event.isDefaultPrevented()}
var timeoutTimer
options.beforeSend=function(xhr,settings){if(settings.type!=='GET'){settings.timeout=0}
xhr.setRequestHeader('X-PJAX','true')
xhr.setRequestHeader('X-PJAX-Container',options.container)
if(settings.ieRedirectCompatibility){var ua=window.navigator.userAgent
if(ua.indexOf('MSIE ')>0||ua.indexOf('Trident/')>0||ua.indexOf('Edge/')>0){xhr.setRequestHeader('X-Ie-Redirect-Compatibility','true')}}
if(!fire('pjax:beforeSend',[xhr,settings]))
return false
if(settings.timeout>0){timeoutTimer=setTimeout(function(){if(fire('pjax:timeout',[xhr,options]))
xhr.abort('timeout')},settings.timeout)
settings.timeout=0}
var url=parseURL(settings.url)
if(hash)url.hash=hash
options.requestUrl=stripInternalParams(url)}
options.complete=function(xhr,textStatus){if(timeoutTimer)
clearTimeout(timeoutTimer)
fire('pjax:complete',[xhr,textStatus,options])
fire('pjax:end',[xhr,options])}
options.error=function(xhr,textStatus,errorThrown){var container=extractContainer("",xhr,options)
var redirect=xhr.status>=301&&xhr.status<=303
var allowed=redirect||fire('pjax:error',[xhr,textStatus,errorThrown,options])
if(redirect||options.type=='GET'&&textStatus!=='abort'&&allowed){if(options.replaceRedirect){locationReplace(container.url)}else if(options.pushRedirect){window.history.pushState(null,"",container.url)
window.location.replace(container.url)}}}
options.success=function(data,status,xhr){var previousState=pjax.state
var currentVersion=typeof $.pjax.defaults.version==='function'?$.pjax.defaults.version():$.pjax.defaults.version
var latestVersion=xhr.getResponseHeader('X-PJAX-Version')
var container=extractContainer(data,xhr,options)
var url=parseURL(container.url)
if(hash){url.hash=hash
container.url=url.href}
if(currentVersion&&latestVersion&&currentVersion!==latestVersion){locationReplace(container.url)
return}
if(!container.contents){locationReplace(container.url)
return}
pjax.state={id:options.id||uniqueId(),url:container.url,title:container.title,container:options.container,fragment:options.fragment,timeout:options.timeout,cache:options.cache}
if(options.history&&(options.push||options.replace)){window.history.replaceState(pjax.state,container.title,container.url)}
var blurFocus=$.contains(context,document.activeElement)
if(blurFocus){try{document.activeElement.blur()}catch(e){}}
if(container.title)document.title=container.title
fire('pjax:beforeReplace',[container.contents,options],{state:pjax.state,previousState:previousState})
context.html(container.contents)
var autofocusEl=context.find('input[autofocus], textarea[autofocus]').last()[0]
if(autofocusEl&&document.activeElement!==autofocusEl){autofocusEl.focus()}
executeScriptTags(container.scripts,context)
loadLinkTags(container.links)
if(typeof options.scrollTo==='function'){var scrollTo=options.scrollTo(context,hash)}else{var scrollTo=options.scrollTo
if(hash||true===scrollTo){var name=decodeURIComponent(hash.slice(1))
var target=true===scrollTo?context:(document.getElementById(name)||document.getElementsByName(name)[0])
if(target)scrollTo=$(target).offset().top}}
if(typeof options.scrollOffset==='function')
var scrollOffset=options.scrollOffset(scrollTo)
else
var scrollOffset=options.scrollOffset
if(typeof scrollTo==='number'){scrollTo=scrollTo+scrollOffset;if(scrollTo<0)scrollTo=0
$(window).scrollTop(scrollTo)}
fire('pjax:success',[data,status,xhr,options])}
if(!pjax.state){pjax.state={id:uniqueId(),url:window.location.href,title:document.title,container:options.container,fragment:options.fragment,timeout:options.timeout,cache:options.cache}
if(options.history)
window.history.replaceState(pjax.state,document.title)}
if(pjax.xhr&&pjax.xhr.readyState<4&&pjax.options.skipOuterContainers){return}
abortXHR(pjax.xhr)
pjax.options=options
var xhr=pjax.xhr=$.ajax(options)
if(xhr.readyState>0){if(options.history&&(options.push&&!options.replace)){cachePush(pjax.state.id,[options.container,cloneContents(context)])
window.history.pushState(null,"",options.requestUrl)}
fire('pjax:start',[xhr,options])
fire('pjax:send',[xhr,options])}
return pjax.xhr}
function pjaxReload(container,options){var defaults={url:window.location.href,push:false,replace:true,scrollTo:false}
return pjax($.extend(defaults,optionsFor(container,options)))}
function locationReplace(url){if(!pjax.options.history)return
window.history.replaceState(null,"",pjax.state.url)
window.location.replace(url)}
var initialPop=true
var initialURL=window.location.href
var initialState=window.history.state
if(initialState&&initialState.container){pjax.state=initialState}
if('state'in window.history){initialPop=false}
function onPjaxPopstate(event){if(!initialPop){abortXHR(pjax.xhr)}
var previousState=pjax.state
var state=event.state
var direction
if(state&&state.container){if(initialPop&&initialURL==state.url)return
if(previousState){if(previousState.id===state.id)return
direction=previousState.id<state.id?'forward':'back'}
var cache=cacheMapping[state.id]||[]
var containerSelector=cache[0]||state.container
var container=$(containerSelector),contents=cache[1]
if(container.length){var options={id:state.id,url:state.url,container:containerSelector,push:false,fragment:state.fragment,timeout:state.timeout,cache:state.cache,scrollTo:false}
if(previousState&&options.cache){cachePop(direction,previousState.id,[containerSelector,cloneContents(container)])}
var popstateEvent=$.Event('pjax:popstate',{state:state,direction:direction})
container.trigger(popstateEvent)
if(contents){container.trigger('pjax:start',[null,options])
pjax.state=state
if(state.title)document.title=state.title
var beforeReplaceEvent=$.Event('pjax:beforeReplace',{state:state,previousState:previousState})
container.trigger(beforeReplaceEvent,[contents,options])
container.html(contents)
container.trigger('pjax:end',[null,options])}else{pjax(options)}
container[0].offsetHeight}else{locationReplace(location.href)}}
initialPop=false}
function fallbackPjax(options){var url=$.isFunction(options.url)?options.url():options.url,method=options.type?options.type.toUpperCase():'GET'
var form=$('<form>',{method:method==='GET'?'GET':'POST',action:url,style:'display:none'})
if(method!=='GET'&&method!=='POST'){form.append($('<input>',{type:'hidden',name:'_method',value:method.toLowerCase()}))}
var data=options.data
if(typeof data==='string'){$.each(data.split('&'),function(index,value){var pair=value.split('=')
form.append($('<input>',{type:'hidden',name:pair[0],value:pair[1]}))})}else if($.isArray(data)){$.each(data,function(index,value){form.append($('<input>',{type:'hidden',name:value.name,value:value.value}))})}else if(typeof data==='object'){var key
for(key in data)
form.append($('<input>',{type:'hidden',name:key,value:data[key]}))}
$(document.body).append(form)
form.submit()}
function abortXHR(xhr){if(xhr&&xhr.readyState<4){xhr.onreadystatechange=$.noop
xhr.abort()}}
function uniqueId(){return(new Date).getTime()}
function cloneContents(container){var cloned=container.clone()
cloned.find('script').each(function(){if(!this.src)$._data(this,'globalEval',false)})
return cloned.contents()}
function stripInternalParams(url){url.search=url.search.replace(/([?&])(_pjax|_)=[^&]*/g,'').replace(/^&/,'')
return url.href.replace(/\?($|#)/,'$1')}
function parseURL(url){var a=document.createElement('a')
a.href=url
return a}
function stripHash(location){return location.href.replace(/#.*/,'')}
function optionsFor(container,options){if(container&&options){options=$.extend({},options)
options.container=container
return options}else if($.isPlainObject(container)){return container}else{return{container:container}}}
function findAll(elems,selector){return elems.filter(selector).add(elems.find(selector))}
function parseHTML(html){return $.parseHTML(html,document,true)}
function extractContainer(data,xhr,options){var obj={},fullDocument=/<html/i.test(data)
var serverUrl=xhr.getResponseHeader('X-PJAX-URL')
obj.url=serverUrl?stripInternalParams(parseURL(serverUrl)):options.requestUrl
var $head,$body
if(fullDocument){$body=$(parseHTML(data.match(/<body[^>]*>([\s\S.]*)<\/body>/i)[0]))
var head=data.match(/<head[^>]*>([\s\S.]*)<\/head>/i)
$head=head!=null?$(parseHTML(head[0])):$body}else{$head=$body=$(parseHTML(data))}
if($body.length===0)
return obj
obj.title=findAll($head,'title').last().text()
if(options.fragment){var $fragment=$body
if(options.fragment!=='body'){$fragment=findAll($fragment,options.fragment).first()}
if($fragment.length){obj.contents=options.fragment==='body'?$fragment:$fragment.contents()
if(!obj.title)
obj.title=$fragment.attr('title')||$fragment.data('title')}}else if(!fullDocument){obj.contents=$body}
if(obj.contents){obj.contents=obj.contents.not(function(){return $(this).is('title')})
obj.contents.find('title').remove()
obj.scripts=findAll(obj.contents,'script').remove()
obj.contents=obj.contents.not(obj.scripts)
obj.links=findAll(obj.contents,'link[href]').remove()
obj.contents=obj.contents.not(obj.links)}
if(obj.title)obj.title=$.trim(obj.title)
return obj}
function executeScriptTags(scripts,context){if(!scripts)return
var existingScripts=$('script[src]')
var cb=function(next){var src=this.src
var matchedScripts=existingScripts.filter(function(){return this.src===src})
if(matchedScripts.length){next()
return}
if(src){$.getScript(src).done(next).fail(next)
document.head.appendChild(this)}else{context.append(this)
next()}}
var i=0
var next=function(){if(i>=scripts.length){return}
var script=scripts[i]
i++
cb.call(script,next)}
next()}
function loadLinkTags(links){if(!links)return
var existingLinks=$('link[href]')
links.each(function(){var href=this.href,alreadyLoadedLinks=existingLinks.filter(function(){return this.href===href})
if(alreadyLoadedLinks.length)return
document.head.appendChild(this)})}
var cacheMapping={}
var cacheForwardStack=[]
var cacheBackStack=[]
function cachePush(id,value){if(!pjax.options.cache){return}
cacheMapping[id]=value
cacheBackStack.push(id)
trimCacheStack(cacheForwardStack,0)
trimCacheStack(cacheBackStack,pjax.defaults.maxCacheLength)}
function cachePop(direction,id,value){var pushStack,popStack
cacheMapping[id]=value
if(direction==='forward'){pushStack=cacheBackStack
popStack=cacheForwardStack}else{pushStack=cacheForwardStack
popStack=cacheBackStack}
pushStack.push(id)
id=popStack.pop()
if(id)delete cacheMapping[id]
trimCacheStack(pushStack,pjax.defaults.maxCacheLength)}
function trimCacheStack(stack,length){while(stack.length>length)
delete cacheMapping[stack.shift()]}
function findVersion(){return $('meta').filter(function(){var name=$(this).attr('http-equiv')
return name&&name.toUpperCase()==='X-PJAX-VERSION'}).attr('content')}
function enable(){$.fn.pjax=fnPjax
$.pjax=pjax
$.pjax.enable=$.noop
$.pjax.disable=disable
$.pjax.click=handleClick
$.pjax.submit=handleSubmit
$.pjax.reload=pjaxReload
$.pjax.defaults={history:true,cache:true,timeout:650,push:true,replace:false,type:'GET',dataType:'html',scrollTo:0,scrollOffset:0,maxCacheLength:20,version:findVersion,pushRedirect:false,replaceRedirect:true,skipOuterContainers:false,ieRedirectCompatibility:true}
$(window).on('popstate.pjax',onPjaxPopstate)}
function disable(){$.fn.pjax=function(){return this}
$.pjax=fallbackPjax
$.pjax.enable=enable
$.pjax.disable=$.noop
$.pjax.click=$.noop
$.pjax.submit=$.noop
$.pjax.reload=function(){window.location.reload()}
$(window).off('popstate.pjax',onPjaxPopstate)}
if($.event.props&&$.inArray('state',$.event.props)<0){$.event.props.push('state')}else if(!('state'in $.Event.prototype)){$.event.addProp('state')}
$.support.pjax=window.history&&window.history.pushState&&window.history.replaceState&&!navigator.userAgent.match(/((iPod|iPhone|iPad).+\bOS\s+[1-4]\D|WebApps\/.+CFNetwork)/)
if($.support.pjax){enable()}else{disable()}})(jQuery);;