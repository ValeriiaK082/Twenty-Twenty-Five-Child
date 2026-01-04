const { src, dest, watch, series, parallel } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cleanCSS = require('gulp-clean-css');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const sourcemaps = require('gulp-sourcemaps');
const plumber = require('gulp-plumber');

/* Paths */
const paths = {
    scss: 'resources/scss/**/*.scss',
    js: 'resources/js/**/*.js',
    cssDest: 'assets/css',
    jsDest: 'assets/js'
};

/* SCSS */
function styles() {
    return src(paths.scss)
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(postcss([autoprefixer()]))
        .pipe(cleanCSS())
        .pipe(sourcemaps.write('.'))
        .pipe(dest(paths.cssDest));
}

/* JS */
function scripts() {
    return src(paths.js)
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(concat('scripts.js'))
        .pipe(uglify())
        .pipe(sourcemaps.write('.'))
        .pipe(dest(paths.jsDest));
}


/* Watch only */
function watchFiles() {
    watch(paths.scss, styles);
    watch(paths.js, scripts);
}

/* Exports */
exports.styles = styles;
exports.scripts = scripts;
exports.watch = series(
    parallel(styles, scripts),
    watchFiles
);
