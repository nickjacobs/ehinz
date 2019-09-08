'use strict';

// Include gulp
var gulp = require('gulp');
var livereload = require('gulp-livereload');
var cleanCSS = require('gulp-clean-css');
var rename = require('gulp-rename');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
//var lodash = require('gulp-lodash');
var babel = require("gulp-babel");
//var postcss = require('gulp-postcss');
//var autoprefixer = require('autoprefixer');


// Config file
var config = require('./gulp_config.json')

// Auto load all required plugins
var $ = require('gulp-load-plugins')({
	pattern: '*',
	scope: 'dependencies',
	rename: {
		'jshint': 'jshintCore',
		'jshint-stylish': 'stylish',
	}
});

// Messages data for notify to display
var messages = {
	error: function(err) {
		$.notify.onError({
			title: config.messages.error.title,
			message: config.messages.error.message,
		}) (err);

		this.emit('end');
	},
	success: {
		title: config.messages.success.title,
		message: config.messages.success.message,
		onLast: true
	}
}





  //script paths
var jsFiles = [
      'public/javascript/jquery/jquery-3.3.1.js',
      'public/javascript/popper/popper.js',
      'public/javascript/bootstrap/bootstrap.js',
      //'public/javascript/flickity.js',
      // 'public/javascript/slick.js',
      // 'public/javascript/smoothscroll.js',
      // 'public/javascript/jquery.cycle2.min.js',
      // 'node_modules/aos/dist/aos.js',
      // 'public/javascript/jquery.matchheight.js',
      // 'public/javascript/ajaxchimp.js',
      // 'public/javascript/jquery-modal-video.js',


      'public/javascript/main.js'
    ],
jsDest = 'public/javascript';

gulp.task('scripts', function() {
  return gulp.src(jsFiles)
      .pipe(babel())
      .pipe(concat('scripts.js'))
      .pipe(gulp.dest(jsDest))
      .pipe(rename('scripts.min.js'))
      .pipe(uglify().on('error', console.error))
      .pipe(gulp.dest(jsDest))
      .pipe(livereload());

});

gulp.task('sass', function() {
  	return gulp.src(config.sass.src)
  		.pipe($.plumber({
  			errorHandler: messages.error
  		}))
  		.pipe($.sass(config.sass.config))
  		.pipe($.autoprefixer({
  			browsers: config.sass.autoprefixer
  		}))
  		.pipe(gulp.dest(config.sass.destination))
  		.pipe($.notify(messages.success))
      .pipe(livereload());
  });

gulp.task('minify-css', function() {
return gulp.src(config.css.src)
  .pipe(cleanCSS())
  .pipe(rename({
    suffix: '.min'
  }))
  .pipe(gulp.dest(config.css.dest));
});


 gulp.task('watch', function() {

  	livereload.listen();

  	gulp.watch(config.sass.src, ['sass']);
    gulp.watch(jsFiles, ['scripts']);
    gulp.watch(config.css.src, ['minify-css']);
    gulp.watch('app/templates/**/*.ss').on('change', livereload.changed);


  });



gulp.task('default', ['scripts', 'sass', 'minify-css', 'watch']);
gulp.task('build', ['scripts', 'sass', 'minify-css']);

