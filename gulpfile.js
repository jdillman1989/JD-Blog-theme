'use strict';

var gulp = require('gulp');
var uglify = require('gulp-uglify');
var sass = require('gulp-sass');

gulp.task('default', function () {
  gulp.src('./scripts/*.js')
  .pipe(uglify())
  .pipe(gulp.dest('./wp-content/themes/jadle/js'));

  gulp.src('./styles/**/*.scss')
  .pipe(sass().on('error', sass.logError))
  .pipe(gulp.dest('./wp-content/themes/jadle/sass'));
});