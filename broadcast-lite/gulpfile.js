// including plugins
var fs = require('fs'),
    gulp = require('gulp'),
    minifyCss = require("gulp-clean-css"),
    uglify = require("gulp-uglify"),
    rename = require('gulp-rename'),
    browserSync = require('browser-sync').create(),
    postcss = require('gulp-postcss'),
    pxtorem = require('gulp-pxtorem'),
    autoprefixer = require('gulp-autoprefixer'),
    sass = require('gulp-sass'),
    concat = require('gulp-concat'),
    pump = require('pump');

var pxtoremOptions = {
    replace: true,
    propWhiteList: ['font', 'font-size', 'line-height', 'letter-spacing', 'height', 'width', 'margin', 'padding']
};

var postcssOptions = {
};

/* SCSS Path */
var paths = {
    scss: 'sass/style.scss'
};

var reload = browserSync.reload; // For manual browser reload.

//task
gulp.task('compile-js', function () {
    gulp.src('js/functions/*.js') // path to your file
        .pipe(concat('main.js'))
        .pipe(gulp.dest('js/'))
});

//task
gulp.task('minify-js', function () {
    gulp.src('js/main.js') // path to your file
        .pipe(uglify())
        .pipe(rename('main.min.js'))
        .pipe(browserSync.reload({
          stream: true
        }))
        .pipe(gulp.dest('dist/'));
});

//task
gulp.task('minify-plugins', function () {
    gulp.src('js/plugins.js') // path to your file
        .pipe(uglify())
        .pipe(rename('plugins.min.js'))
        .pipe(browserSync.reload({
          stream: true
        }))
        .pipe(gulp.dest('dist/'));
});

//task
gulp.task('browserSync', function() {
  browserSync.init({
    proxy: 'http://broadcast-lite.local/'
  });
});

/* Sass task */
gulp.task('sass', function () {
  return gulp.src('sass/style.scss')
  .pipe(rename('main.scss'))
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('css/'))
    .pipe(browserSync.reload({
      stream: true
    }));
});

// task
gulp.task('minify-css', function () {
    gulp.src('css/main.css') // path to your file
        .pipe(minifyCss())
        .pipe(pxtorem(pxtoremOptions, postcssOptions))
        .pipe(autoprefixer({
			browsers: ['> 1%', 'IE 9', 'IE 10', 'IE 11', 'iOS 7', 'iOS 6'],
			cascade: false
		}))
        .pipe(rename('main.min.css'))
        .pipe(browserSync.reload({
          stream: true
        }))
        .pipe(gulp.dest('dist/'));
});

gulp.task('watch', ['sass', 'minify-css', 'compile-js', 'minify-js', 'minify-plugins', 'browserSync'], function () {
  gulp.watch('sass/**/*.scss', ['sass']);
  gulp.watch('./sass/style.scss', ['sass']);
  gulp.watch('css/main.css', ['minify-css']);
  gulp.watch('js/functions/*.js', ['minify-js']);
  gulp.watch('js/pluigins.js', ['minify-plugins']);
  gulp.watch('./**/*.php').on('change', browserSync.reload);
});
