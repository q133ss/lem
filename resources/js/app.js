require('./bootstrap');

window.Vue = require('vue').default;
 const files = require.context('./', true, /\.vue$/i)
 files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

const app = new Vue({
    el: '#app',
});

window.onload = function(){
    window.onload = function(){
        tinymce.init({
            selector: '.editor',
            menubar:false,
            statusbar: false,
            height: 500,
            media_live_embeds: true,
            media_poster: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste imagetools wordcount'
            ],
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | fullscreen',
        });
    }
}