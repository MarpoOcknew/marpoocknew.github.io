const gulp = require('gulp');
const sass = require('gulp-sass');
const babelify = require('babelify');
const browserify = require('browserify')
const source = require('vinyl-source-stream');
const buffer = require('vinyl-buffer');
const uglify = require('gulp-uglify');
const cssnano = require('gulp-cssnano');
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');

function scss() {
    return gulp
        .src('assets/scss/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(postcss([ autoprefixer() ]))
        .pipe(cssnano({ zindex: false }))
        .pipe(gulp.dest('dist/css'));
};

function javascript() {
    return browserify({
                entries: 'assets/javascript/app.js',
                transform: [babelify.configure({ presets: ['@babel/preset-env'] })]
            })
            .bundle()
            .pipe(source('bundle.js'))
            .pipe(buffer())
            .pipe(uglify())
            .pipe(gulp.dest('dist/js/'));
};

function watch() {
    gulp.watch('assets/scss/**/*', scss);
    gulp.watch('assets/javascript/**', javascript);
};

// gulp.task('default', [scss, javascript]);

exports.scss = scss;
exports.javascript = javascript;
exports.watch = watch;
