// Load frame in the Docs
$(document).ready(function () {
    $('a','.md-content').each(function () {
        $(this).attr('target','_blank');
    });
});

// Chatra widget
(function(d, w, c) {
    w.ChatraID = 'de92EMe5e2YEPcdJ3';
    var s = d.createElement('script');
    w[c] = w[c] || function() {
        (w[c].q = w[c].q || []).push(arguments);
    };
    s.async = true;
    s.src = (d.location.protocol === 'https:' ? 'https:': 'http:')
    + '//call.chatra.io/chatra.js';
    if (d.head) d.head.appendChild(s);
})(document, window, 'Chatra');