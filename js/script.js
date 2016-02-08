var isLoaded = false;
var imgLoaded;

/* Preview image chargée */
var loadFile = function(event, id) {

    var imgStr = '#' + id + '';
    var imgId = document.getElementById(id);
    imgId.src = URL.createObjectURL(event.target.files[0]);

    if(imgLoaded !== imgId){
        /*Resizer l'image aux bonnes dimensions*/   
        $(imgStr).cropimg({
            maxContainerWidth:  200,
            resultWidth:        300,
            resultHeight:       200,
            inputPrefix:        'ci-',
            zoomStep:           20,
            showBtnTips:        true,
            btnTipsFadeTime:    100,
            textBtnTipZoomIn:   'Zoom in',
            textBtnTipZoomOut:  'Zoom out',
            textBtnTipRTW:      'Resize to container width',
            textBtnTipRTH:      'Resize to container height',
            textBtnTipFPTL:     'Move image to Top Left Corner',
            textBtnTipFPTC:     'Move image to Top Center',
            textBtnTipFPTR:     'Move image to Top Right Corner',
            textBtnTipFPCL:     'Move image to Center Left',
            textBtnTipFPCC:     'Move image to Center of container',
            textBtnTipFPCR:     'Move image to Center Right',
            textBtnTipFPBL:     'Move image to Bottom Left Corner',
            textBtnTipFPBC:     'Move image to Bottom Center', 
            textBtnTipFPBR:     'Move image to Bottom Right Corner',
        });  
    }
        imgLoaded = imgId;
};



















