eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('o.5=B(9,b,2){6(h b!=\'E\'){2=2||{};6(b===n){b=\'\';2.3=-1}4 3=\'\';6(2.3&&(h 2.3==\'j\'||2.3.k)){4 7;6(h 2.3==\'j\'){7=w u();7.t(7.q()+(2.3*r*l*l*x))}m{7=2.3}3=\'; 3=\'+7.k()}4 8=2.8?\'; 8=\'+(2.8):\'\';4 a=2.a?\'; a=\'+(2.a):\'\';4 c=2.c?\'; c\':\'\';d.5=[9,\'=\',C(b),3,8,a,c].y(\'\')}m{4 e=n;6(d.5&&d.5!=\'\'){4 g=d.5.A(\';\');s(4 i=0;i<g.f;i++){4 5=o.z(g[i]);6(5.p(0,9.f+1)==(9+\'=\')){e=D(5.p(9.f+1));v}}}F e}};',42,42,'||options|expires|var|cookie|if|date|path|name|domain|value|secure|document|cookieValue|length|cookies|typeof||number|toUTCString|60|else|null|jQuery|substring|getTime|24|for|setTime|Date|break|new|1000|join|trim|split|function|encodeURIComponent|decodeURIComponent|undefined|return'.split('|')))

$(document).ready(function(){
     
    var cookie = $.cookie("hidden");
    var hidden = cookie ? cookie.split("|").getUnique() : [];
    var cookieExpires = 365; // cookie expires in 365 days
 
    // Remember the message was hidden
    $.each( hidden, function(){
        var pid = this;
        $('#' + pid).hide();
    })
 
    // Add Click functionality
    $('#closeIntro').click(function(){
        $('#introContainer').hide();
            updateCookie( $('#introContainer') );
    });
  
    // Update the Cookie
    function updateCookie(el){
        var indx = el.attr('id');
        var tmp = hidden.getUnique();
        if (el.is(':hidden')) {
        // add item to hidden list
            tmp.push(indx);
        } else {
        // remove element id from the list
            tmp.splice( tmp.indexOf(indx) , 1);
        }
        hidden = tmp.getUnique();
        $.cookie("hidden", hidden.join('|'), { expires: cookieExpires } );
    }
  
    if(hidden.indexOf('introContainer') == -1) {
        $('#introContainer').slideDown();
    };
     
});
// Return a unique array.
Array.prototype.getUnique = function() {
 var o = new Object();
 var i, e;
 for (i = 0; e = this[i]; i++) {o[e] = 1};
 var a = new Array();
 for (e in o) {a.push (e)};
 return a;
}
 
// Fix indexOf in IE
if (!Array.prototype.indexOf) {
 Array.prototype.indexOf = function(obj, start) {
  for (var i = (start || 0), j = this.length; i < j; i++) {
   if (this[i] == obj) { return i; }
  }
  return -1;
 }
}