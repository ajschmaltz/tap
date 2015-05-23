(function(i){var e=/iPhone/i,n=/iPod/i,o=/iPad/i,t=/(?=.*\bAndroid\b)(?=.*\bMobile\b)/i,r=/Android/i,d=/BlackBerry/i,s=/Opera Mini/i,a=/IEMobile/i,b=/(?=.*\bFirefox\b)(?=.*\bMobile\b)/i,h=RegExp("(?:Nexus 7|BNTV250|Kindle Fire|Silk|GT-P1000)","i"),c=function(i,e){return i.test(e)},l=function(i){var l=i||navigator.userAgent;this.apple={phone:c(e,l),ipod:c(n,l),tablet:c(o,l),device:c(e,l)||c(n,l)||c(o,l)},this.android={phone:c(t,l),tablet:!c(t,l)&&c(r,l),device:c(t,l)||c(r,l)},this.other={blackberry:c(d,l),opera:c(s,l),windows:c(a,l),firefox:c(b,l),device:c(d,l)||c(s,l)||c(a,l)||c(b,l)},this.seven_inch=c(h,l),this.any=this.apple.device||this.android.device||this.other.device||this.seven_inch},v=i.isMobile=new l;v.Class=l})(window);
(function () {

    if (! isMobile.apple.phone || isMobile.android.phone || isMobile.seven_inch) {
        var tqJs = document.querySelector('#tq_js');
        var formId = tqJs.dataset.form_id;
        if (!document.getElementById('tq_css'))
        {
            var head  = document.getElementsByTagName('head')[0];
            var link  = document.createElement('link');
            link.id   = 'tq_css';
            link.rel  = 'stylesheet';
            link.type = 'text/css';
            link.href = '/style.css';
            link.media = 'all';
            head.appendChild(link);
        }
        var leadLink = document.createElement('a');
        leadLink.id = "tq_link";
        leadLink.href = "http://tap.app/form/" + formId;
        var text = document.createTextNode('Creating Div Element')
        var el = document.getElementsByTagName('body') [0];
        leadLink.appendChild(text)
        el.appendChild(leadLink);
    }
})();