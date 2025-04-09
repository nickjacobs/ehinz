var gulp = require('gulp')
    , cleanCss = require("gulp-clean-css")
    , sass = require('gulp-sass')(require('sass'))
    , terser = require('gulp-terser')
    , sourcemaps = require('gulp-sourcemaps')
    , plumber = require('gulp-plumber')
    , notify = require('gulp-notify')
    , gutil = require('gulp-util')
    , concat = require('gulp-concat')
    , rename = require('gulp-rename')
    , order = require("gulp-order")
    ,clone = require('gulp-clone')
    , browserSync = require('browser-sync').create();

var filePath = {
    build_dir: 'public',
    sass:{
        src: 'app/sass/**/*.scss',
        dest: 'public/css/*.css',
        dest_dir: 'public/css'
    },
    js:{
        src: [
            'app/js/**/!(main)*.js',
            'app/js/**/main.js'
        ],
        dest: 'public/javascript/**/*.js',
        dest_dir: 'public/javascript'
    },
    css:{
        src: 'app/css/**/*.css',
        dest: 'public/css/**/*.css',
        dest_dir: 'public/css'
    },
};

// css minify task
gulp.task('css', function () {
    return gulp.src(filePath.css.src)
        .pipe(plumber({ errorHandler: function(err) {
                notify.onError({
                    title: "Gulp error in " + err.plugin,
                    message: err.toString()
                })(err);
                gutil.beep();
            }}))
        .pipe(cleanCss())
        .pipe(gulp.dest(filePath.css.dest_dir))
        .pipe(browserSync.stream());
});

gulp.task('watch-css', ['css'], function () {
    gulp.watch(filePath.css.src, ['css']);
});


gulp.task('sass', function () {
    return gulp.src(filePath.sass.src, { sourcemaps: true })
        .pipe(plumber({
            errorHandler: notify.onError(err => ({
                title: "SASS ERROR",
                message: err.message,
                sound: "Beep"
            }))
        }))
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError)) // 🔥 add .on('error') handler too!
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(filePath.sass.dest_dir))
        .pipe(browserSync.stream({ match: '**/*.css' })); // limit to CSS
});



gulp.task('watch-sass', ['sass'], function () {
    gulp.watch(filePath.sass.src, ['sass']);
});

// js task
gulp.task('js', function () {
    return gulp.src(filePath.js.src)
        .pipe(plumber({ errorHandler: function(err) {
                notify.onError({
                    title: "Gulp error in " + err.plugin,
                    message: err.toString()
                })(err);
                gutil.beep();
            }}))
        .pipe(order([
            'libs/jquery/jquery-3.3.1.js',
            'libs/popper/popper.js',
            'libs/bootstrap/bootstrap.js',
            'main.js'
        ]))
        .pipe(concat('scripts.js'))
        .pipe(gulp.dest(filePath.js.dest_dir))
        .pipe(rename('scripts.min.js'))
        .pipe(terser())
        .pipe(gulp.dest(filePath.js.dest_dir))
        .pipe(browserSync.stream());
});

gulp.task('watch-js', ['js'], function () {
    gulp.watch(filePath.js.src, ['js']);
});

// Watch SilverStripe .ss files (template refresh)
gulp.task('watch-ss', function () {
    gulp.watch('app/templates/**/*.ss').on('change', browserSync.reload);
});

// Serve & full watch
gulp.task('serve', ['sass', 'css', 'js'], function () {

    let domain = 'ehinz.test';

    browserSync.init({
        proxy: `https://${domain}`,
        host: domain,
        https: {
            key: './localhost+2-key.pem',
            cert: './localhost+2.pem'
        },
        port: 3000,
        notify: false,
        open: true
    });


    gulp.watch(filePath.sass.src, ['sass']);
    gulp.watch(filePath.css.src, ['css']);
    gulp.watch(filePath.js.src, ['js']);
    gulp.watch('app/templates/**/*.ss').on('change', browserSync.reload);
});

// build only
gulp.task('build', ['sass', 'css', 'js']);

// default = serve
gulp.task('default', ['serve']);




/*
to install local ssl cert - run this on terminal in the site dir:
mkcert localhost 127.0.0.1 ::1

browserSync.init({
  https: {
    key: './localhost+2-key.pem',
    cert: './localhost+2.pem'
  },
  ...
 */


