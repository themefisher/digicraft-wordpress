var gulp = require('gulp'),
	sass=require('gulp-ruby-sass'),
	uglify = require('gulp-uglify'),
	sourcemaps = require('gulp-sourcemaps');
;


gulp.task('styles', function() {
	return sass('scss/style.scss')
  	.on('error',console.error.bind(console))
  	.pipe(gulp.dest('css'));

});

// SASS Watch
gulp.task('watch',function(){
	gulp.watch('scss/**/*.scss',['styles']);
	gulp.src('scss/**/*.scss')
    
});




gulp.task('default',['styles']);

