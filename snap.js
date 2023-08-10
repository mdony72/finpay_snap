function LoadJsFile(jsPath) {
    var imported = document.createElement('script');
    imported.src = jsPath;
    document.head.appendChild(imported);
}

function LoadCssFile(cssPath) {
    var l = document.createElement('link'); l.rel = 'stylesheet'; l.href = cssPath;
    var h = document.getElementsByTagName('head')[0]; h.parentNode.insertBefore(l, h);
}
var cb = function() {
    LoadCssFile('https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css');
    LoadJsFile('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js');
    LoadJsFile('https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js');
};
var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
if (raf) raf(cb); else window.addEventListener('load', cb);

if(window.location.href.indexOf("checkout") > -1){ alert("your url contains the name checkout");}
function pay({
    request
}) {
    // finpayModal();
    var m1 = $(makeModal());
    document.body.insertAdjacentHTML('beforeend', m1);
    m1.modal('show');
      
    function makeModal() {
        return `<div class="modal fade" tabindex="-1" id="myModal" role="dialog" style="display: none" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-scrollable" style="height: 100%;">
                <div class="modal-content" style="height: 90%;">
                    <div class="modal-body">
                        <iframe src="snap/index.php?request=`+request+`" frameborder="0" allowfullscreen target="_parent" style="width:100%;height:100%;"></iframe>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark w-100" data-bs-dismiss="modal" style="background-color:#14255d">Kembali ke Merchant</button>
                    </div>
                </div>
            </div>
        </div>`;
    }
      

    function finpayModal() {
        var myDialog = document.createElement("dialog");
        document.body.appendChild(myDialog)
        var html = htmlToElement([
            '<div style="width:400px;height:500px;">',
                '<iframe src="snap/index.php" frameborder="0" allowfullscreen target="_parent" style="width:100%;height:100%;"></iframe>',
            '</div>'
        ].join("\n"));
        myDialog.appendChild(html);
        myDialog.showModal();
    }

    function htmlToElement(html) {
        const template = document.createElement('template');
        html = html.trim();
        template.innerHTML = html;
        return template.content.firstChild;
    }

    function htmlToElements(html) {
        const template = document.createElement('template');
        template.innerHTML = html;
        return template.content.childNodes;
    }
}