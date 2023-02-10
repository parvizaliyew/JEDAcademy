'use strict';

let langs = document.querySelectorAll('.lang a');
let translates = document.querySelectorAll('.translate .form-control');

translates.forEach(translate => {
    translate.addEventListener('input', function () {
        let langVal = JSON.parse(translate.previousElementSibling.value);
        let currentLang = document.querySelector('.lang a.active').getAttribute('href');
        langVal[currentLang] = translate.value;
        translate.previousElementSibling.value = JSON.stringify(langVal);
    });
});

langs.forEach(lang => {
    lang.addEventListener('click', function (e) {
        e.preventDefault();
        let lan = lang.getAttribute('href');
        if (document.getElementById('editor')) {
            let editor = JSON.parse(document.getElementById('editor').previousElementSibling.value);
            CKEDITOR.instances.editor.setData(editor[lan]);
        }
        if (document.getElementById('editor1')) {
            let editor1 = JSON.parse(document.getElementById('editor1').previousElementSibling.value);
            CKEDITOR.instances.editor1.setData(editor1[lan]);
        }
        if (document.getElementById('editor2')) {
            let editor2 = JSON.parse(document.getElementById('editor2').previousElementSibling.value);
            CKEDITOR.instances.editor2.setData(editor2[lan]);
        }
        if (document.getElementById('editor3')) {
            let editor3 = JSON.parse(document.getElementById('editor3').previousElementSibling.value);
            CKEDITOR.instances.editor3.setData(editor3[lan]);
        }
        if (document.getElementById('editor4')) {
            let editor4 = JSON.parse(document.getElementById('editor4').previousElementSibling.value);
            CKEDITOR.instances.editor4.setData(editor4[lan]);
        }
        if (document.getElementById('editor5')) {
            let editor5 = JSON.parse(document.getElementById('editor5').previousElementSibling.value);
            CKEDITOR.instances.editor5.setData(editor5[lan]);
        }
         if (document.getElementById('editor6')) {
            let editor6 = JSON.parse(document.getElementById('editor6').previousElementSibling.value);
            CKEDITOR.instances.editor6.setData(editor6[lan]);
        } if (document.getElementById('editor7')) {
            let editor7 = JSON.parse(document.getElementById('editor7').previousElementSibling.value);
            CKEDITOR.instances.editor7.setData(editor7[lan]);
        } if (document.getElementById('editor8')) {
            let editor8 = JSON.parse(document.getElementById('editor8').previousElementSibling.value);
            CKEDITOR.instances.editor8.setData(editor8[lan]);
        } if (document.getElementById('editor9')) {
            let editor9 = JSON.parse(document.getElementById('editor9').previousElementSibling.value);
            CKEDITOR.instances.editor9.setData(editor9[lan]);
        }
         if (document.getElementById('editor10')) {
            let editor10 = JSON.parse(document.getElementById('editor10').previousElementSibling.value);
            CKEDITOR.instances.editor10.setData(editor10[lan]);
        } if (document.getElementById('editor11')) {
            let editor11 = JSON.parse(document.getElementById('editor11').previousElementSibling.value);
            CKEDITOR.instances.editor11.setData(editor11[lan]);
        }
        clearInputs(lan);
        removeActives();
        lang.classList.add('active');
    });
});

const removeActives = () => {
    langs.forEach(lang => {
        lang.classList.remove('active');
    })
}

const clearInputs = (lang) => {
    translates.forEach(translate => {
        translate.value = JSON.parse(translate.previousElementSibling.value)[lang];
    })
}
