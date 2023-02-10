'use strict';

CKEDITOR.replace('editor');
CKEDITOR.replace('editor1');
CKEDITOR.replace('editor2');
CKEDITOR.replace('editor3');
CKEDITOR.replace('editor4');
CKEDITOR.replace('editor5');
CKEDITOR.replace('editor6');
CKEDITOR.replace('editor7');
CKEDITOR.replace('editor8');
CKEDITOR.replace('editor9');
CKEDITOR.replace('editor10');
CKEDITOR.replace('editor11');

CKEDITOR.instances.editor.on('change', function () {
    let value = this.getData();
    let langVal = JSON.parse(document.getElementById(this.name).previousElementSibling.value);
    let currentLang = document.querySelector('.lang a.active').getAttribute('href');
    langVal[currentLang] = value;
    document.getElementById(this.name).previousElementSibling.value = JSON.stringify(langVal); 

});

CKEDITOR.instances.editor1.on('change', function () {
    let value = this.getData();
    let langVal = JSON.parse(document.getElementById(this.name).previousElementSibling.value);
    let currentLang = document.querySelector('.lang a.active').getAttribute('href');
    langVal[currentLang] = value;
    document.getElementById(this.name).previousElementSibling.value = JSON.stringify(langVal); 
});

CKEDITOR.instances.editor2?.on('change', function () {
    let value = this.getData();
    let langVal = JSON.parse(document.getElementById(this.name).previousElementSibling.value);
    let currentLang = document.querySelector('.lang a.active').getAttribute('href');
    langVal[currentLang] = value;
    document.getElementById(this.name).previousElementSibling.value = JSON.stringify(langVal); 
});

CKEDITOR.instances.editor3.on('change', function () {
    let value = this.getData();
    let langVal = JSON.parse(document.getElementById(this.name).previousElementSibling.value);
    let currentLang = document.querySelector('.lang a.active').getAttribute('href');
    langVal[currentLang] = value;
    document.getElementById(this.name).previousElementSibling.value = JSON.stringify(langVal); 
});
CKEDITOR.instances.editor4.on('change', function () {
    let value = this.getData();
    let langVal = JSON.parse(document.getElementById(this.name).previousElementSibling.value);
    let currentLang = document.querySelector('.lang a.active').getAttribute('href');
    langVal[currentLang] = value;
    document.getElementById(this.name).previousElementSibling.value = JSON.stringify(langVal); 
});
CKEDITOR.instances.editor5.on('change', function () {
    let value = this.getData();
    let langVal = JSON.parse(document.getElementById(this.name).previousElementSibling.value);
    let currentLang = document.querySelector('.lang a.active').getAttribute('href');
    langVal[currentLang] = value;
    document.getElementById(this.name).previousElementSibling.value = JSON.stringify(langVal); 
});

CKEDITOR.instances.editor6.on('change', function () {
    let value = this.getData();
    let langVal = JSON.parse(document.getElementById(this.name).previousElementSibling.value);
    let currentLang = document.querySelector('.lang a.active').getAttribute('href');
    langVal[currentLang] = value;
    document.getElementById(this.name).previousElementSibling.value = JSON.stringify(langVal); 
});

CKEDITOR.instances.editor7.on('change', function () {
    let value = this.getData();
    let langVal = JSON.parse(document.getElementById(this.name).previousElementSibling.value);
    let currentLang = document.querySelector('.lang a.active').getAttribute('href');
    langVal[currentLang] = value;
    document.getElementById(this.name).previousElementSibling.value = JSON.stringify(langVal); 
});
CKEDITOR.instances.editor8.on('change', function () {
    let value = this.getData();
    let langVal = JSON.parse(document.getElementById(this.name).previousElementSibling.value);
    let currentLang = document.querySelector('.lang a.active').getAttribute('href');
    langVal[currentLang] = value;
    document.getElementById(this.name).previousElementSibling.value = JSON.stringify(langVal); 
});

CKEDITOR.instances.editor9.on('change', function () {
    let value = this.getData();
    let langVal = JSON.parse(document.getElementById(this.name).previousElementSibling.value);
    let currentLang = document.querySelector('.lang a.active').getAttribute('href');
    langVal[currentLang] = value;
    document.getElementById(this.name).previousElementSibling.value = JSON.stringify(langVal); 
});

CKEDITOR.instances.editor10.on('change', function () {
    let value = this.getData();
    let langVal = JSON.parse(document.getElementById(this.name).previousElementSibling.value);
    let currentLang = document.querySelector('.lang a.active').getAttribute('href');
    langVal[currentLang] = value;
    document.getElementById(this.name).previousElementSibling.value = JSON.stringify(langVal); 
});

CKEDITOR.instances.editor11.on('change', function () {
    let value = this.getData();
    let langVal = JSON.parse(document.getElementById(this.name).previousElementSibling.value);
    let currentLang = document.querySelector('.lang a.active').getAttribute('href');
    langVal[currentLang] = value;
    document.getElementById(this.name).previousElementSibling.value = JSON.stringify(langVal); 
});