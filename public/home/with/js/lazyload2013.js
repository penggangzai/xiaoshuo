//onerror = function () { ; return true; }
var myLazyLoad = function () {
    this.ignore = "";
    this.oldScr = [];
    this.ImgOjb = [];
    this.callbackP = [];
    this.callbackF = [];
    this.getImgObj = function () {
        var imgs = document.getElementsByTagName("img");
        for (var i = 0; i < imgs.length; i++) {
            this.ImgOjb.push(imgs[i]);
            this.oldScr.push(imgs[i].src);
            if (this.ignore.indexOf(imgs[i].src) == -1) {
                imgs[i].src = "";
            }
        }
    };

    this.getP = function (obj, oPos) {
        var pos = 0;
        if (!oPos) {
            oPos = 0;
        }
        pos = oPos;
        try {
            if (obj.offsetParent) {
                pos += this.getP(obj.offsetParent, obj.offsetTop);
            }
        } catch (e) { }
        return pos;
    };

    this.init = function () {
        this.getImgObj();
        this.onSroll();
    };
    this.onSroll = function () {

        var imgs = this.ImgOjb;
        var y_1 = document.body.scrollTop || document.documentElement.scrollTop;
        var clienh = document.documentElement.clientHeight;

        for (var i = 0; i < imgs.length; i++) {
            if (this.getP(imgs[i]) <= (y_1 + clienh)) {
                if (imgs[i].src != this.oldScr[i]) {
                    imgs[i].src = this.oldScr[i];
                }
            }
        }
        try {
            if (this.callbackP.length > 0) {
                for (var i = 0; i < this.callbackP.length; i++) {
                    if ((y_1 + clienh) > parseInt(this.callbackP[i])) {
                        eval(this.callbackF[i]);
                        this.callbackP.splice(i, 1);
                        this.callbackF.splice(i, 1);
                    }
                }
            }
        } catch (e) { }
    }
}


var lazyload = new myLazyLoad();
lazyload.init();

window.onscroll = function () {
    lazyload.onSroll();
}

