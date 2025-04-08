$(function(){var r=$("#document-Status"),o=$("#document-Pause"),m=$("#document-Resume"),u=$("#document-Elapsed"),c=$("#document-Destroy"),d=$("#document-Init");if(r.length){var s=5e3;$(document).on("idle.idleTimer",function(t,e,a){r.val(function(i,l){return l+"Idle @ "+moment().format()+` 
`}).removeClass("alert-success").addClass("alert-warning")}),$(document).on("active.idleTimer",function(t,e,a,i){r.val(function(l,I){return I+"Active ["+i.type+"] ["+i.target.nodeName+"] @ "+moment().format()+` 
`}).addClass("alert-success").removeClass("alert-warning")}),o.on("click",function(){return $(document).idleTimer("pause"),r.val(function(t,e){return e+"Paused @ "+moment().format()+` 
`}),$(this).blur(),!1}),m.on("click",function(){return $(document).idleTimer("resume"),r.val(function(t,e){return e+"Resumed @ "+moment().format()+` 
`}),$(this).blur(),!1}),u.on("click",function(){return r.val(function(t,e){return e+"Elapsed (since becoming active): "+$(document).idleTimer("getElapsedTime")+` 
`}),$(this).blur(),!1}),c.on("click",function(){return $(document).idleTimer("destroy"),r.val(function(t,e){return e+"Destroyed: @ "+moment().format()+` 
`}).removeClass("alert-success").removeClass("alert-warning"),$(this).blur(),!1}),d.on("click",function(){return $(document).idleTimer({timeout:s}),r.val(function(t,e){return e+"Init: @ "+moment().format()+` 
`}),$(document).idleTimer("isIdle")?r.removeClass("alert-success").addClass("alert-warning"):r.addClass("alert-success").removeClass("alert-warning"),$(this).blur(),!1}),r.val(""),$(document).idleTimer(s),$(document).idleTimer("isIdle")?r.val(function(t,e){return e+"Initial Idle State @ "+moment().format()+` 
`}).removeClass("alert-success").addClass("alert-warning"):r.val(function(t,e){return e+"Initial Active State @ "+moment().format()+` 
`}).addClass("alert-success").removeClass("alert-warning")}var n=$("#element-Status"),v=$("#element-Reset"),f=$("#element-Remaining"),C=$("#element-LastActive"),g=$("#element-State");if(n.length){var T=3e3;n.on("idle.idleTimer",function(t,e,a){t.stopPropagation(),n.val(function(i,l){return l+"Idle @ "+moment().format()+` 
`}).removeClass("alert-success").addClass("alert-warning")}),n.on("active.idleTimer",function(t){t.stopPropagation(),n.val(function(e,a){return a+"Active @ "+moment().format()+` 
`}).addClass("alert-success").removeClass("alert-warning")}),v.on("click",function(){return n.idleTimer("reset").val(function(t,e){return e+"Reset @ "+moment().format()+` 
`}),$("#element-Status").idleTimer("isIdle")?n.removeClass("alert-success").addClass("alert-warning"):n.addClass("alert-success").removeClass("alert-warning"),$(this).blur(),!1}),f.on("click",function(){return n.val(function(t,e){return e+"Remaining: "+n.idleTimer("getRemainingTime")+` 
`}),$(this).blur(),!1}),C.on("click",function(){return n.val(function(t,e){return e+"LastActive: "+n.idleTimer("getLastActiveTime")+` 
`}),$(this).blur(),!1}),g.on("click",function(){return n.val(function(t,e){return e+"State: "+($("#element-Status").idleTimer("isIdle")?"idle":"active")+` 
`}),$(this).blur(),!1}),n.val("").idleTimer(T),n.idleTimer("isIdle")?n.val(function(t,e){return e+"Initial Idle @ "+moment().format()+` 
`}).removeClass("alert-success").addClass("alert-warning"):n.val(function(t,e){return e+"Initial Active @ "+moment().format()+` 
`}).addClass("alert-success").removeClass("alert-warning")}});
