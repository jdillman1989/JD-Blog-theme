var gulp = require('gulp');

var uglify = require('gulp-uglify');

var uglifycss = require('gulp-uglifycss');

var imagemin = require('gulp-imagemin');

gulp.task('default', function () {

	gulp.src('./js/*.js')

	.pipe(uglify())

	.pipe(gulp.dest('./js/min'));

	gulp.src('./sass/*.css')

	.pipe(uglifycss())

	.pipe(gulp.dest('./'));

	gulp.src('./images/*')

	.pipe(imagemin())

	.pipe(gulp.dest('./images'));
});