var gulp = require('gulp'),
    less = require('gulp-less'),
    cssmin = require('gulp-cssmin'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    autoprefixer = require('gulp-autoprefixer'),
    sourcemaps = require('gulp-sourcemaps');

gulp.task('less', function() {
    return gulp.src('./less/style.less')
        .pipe(sourcemaps.init())
            .pipe(less().on('error', function(err) {
                console.log(err);
            }))
            .pipe(autoprefixer({
                browsers: ['last 2 versions'],
                cascade: false
            }))
            .pipe(cssmin().on('error', function(err) {
                console.log(err);
            }))
            .pipe(rename({
                suffix: '.min'
            }))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./public/assets/build/'));
});

var jsFiles = [
        './node_modules/jquery/dist/jquery.js',
        './node_modules/bxslider/dist/jquery.bxslider.js',
        './node_modules/slick-carousel/slick/slick.js',
        './node_modules/@fancyapps/fancybox/dist/jquery.fancybox.js',
        './node_modules/jquery-mask-plugin/dist/jquery.mask.js',
        './node_modules/flatpickr/dist/flatpickr.js',
        './node_modules/flatpickr/dist/l10n/ru.js',
        './node_modules/tippy.js/dist/tippy.js',
        './node_modules/spin.js/spin.js',
        './node_modules/spin.js/jquery.spin.js',
        './js/components/**/*.js',
        './js/scripts.js'
    ],
    jsDest = './public/assets/build/';

gulp.task('scripts', function() {
    return gulp.src(jsFiles)
        .pipe(sourcemaps.init())
            .pipe(concat('scripts.js'))
            .pipe(gulp.dest(jsDest))
            .pipe(rename('scripts.min.js'))
            .pipe(uglify())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(jsDest));
});

gulp.task('default', ['less', 'scripts'], function() {
    gulp.watch('./less/**/*.less', ['less']);
    gulp.watch('./js/**/*.js', ['scripts']);
});