'use strict';
var gulp         = require('gulp');
var sass         = require('gulp-sass');
var uglify       = require('gulp-uglify');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');



// minify sass
gulp.task('sass', function () {
  return gulp.src('scss/**/*.scss')
  	.pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer({
        browsers: ['last 2 versions'],
        cascade: false
    }))
    .pipe(sourcemaps.write('./maps'))
    .pipe(gulp.dest('./css'));
});

//Watch file
gulp.task('watch', function(){
    gulp.watch('scss/**/*.scss',['sass']);
})

// Default task
gulp.task('default', ['sass','watch']);