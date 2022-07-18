//list Dependences
const {src, dest, watch, series} = require('gulp');
var sass = require('gulp-sass')(require('sass'));
const prefix = require('gulp-autoprefixer');
const minify = require('gulp-clean-css');
const terser = require('gulp-terser');
const imagemin = require('gulp-imagemin');
const imagewebp = require('gulp-webp');


//Create Functions

//SCSS
function compilescss(){
    return src('wp-content/themes/testingwhiz/scss/*.scss')
    .pipe(sass())
    .pipe(prefix())
    .pipe(minify())
    .pipe(dest('wp-content/themes/testingwhiz/dist/css'))
}
//css
function minifycss(){
    return src('wp-content/themes/testingwhiz/css/*.css')
    .pipe(prefix())
    .pipe(minify())
    .pipe(dest('wp-content/themes/testingwhiz/dist/css'))
}

//js Min
function jsmin(){
    return src('wp-content/themes/testingwhiz/js/*.js')
    .pipe(terser())
    .pipe(dest('wp-content/themes/testingwhiz/dist/js'))
}

//Optmize
function optimizeim(){
    return src('wp-content/themes/testingwhiz/images/*.{jpg, png}')
    .pipe(imagemin([imagemin.mozjpeg({quality:50, progressive: true}), imagemin.optipng({optimizationLevel: 2})]))
    .pipe(dest('wp-content/themes/testingwhiz/dist/images'))
}

//webp images

function webpImage() {
    return src('wp-content/themes/testingwhiz/images/*.{jpg, png}')
    .pipe(imagewebp())
    .pipe(dest('wp-content/themes/testingwhiz/dist/images'))
}

//create watch task
function watchTask(){
    watch('wp-content/themes/testingwhiz/scss/*.scss', compilescss);
    watch('wp-content/themes/testingwhiz/css/*.css', minifycss);
    watch('wp-content/themes/testingwhiz/js/*.js', jsmin);
    watch('wp-content/themes/testingwhiz/images/*.{jpg, png}', optimizeim);
    watch('wp-content/themes/testingwhiz/dist/images/*.{jpg, png}', webpImage);
}

//Defult gulp

exports.default = series(
    compilescss,
    minifycss,
    jsmin,
    optimizeim,
    webpImage,
    watchTask
);