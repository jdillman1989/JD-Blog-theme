var gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    uglify = require('gulp-uglify'),
    newer = require('gulp-newer'),
    globbing = require('gulp-css-globbing'),
    cmq = require('gulp-combine-mq'),

// ROOT TASKS // ---------------------------------------------------------
// Main style task
gulp.task('css', function() {
  return gulp.src('styles/application.scss')
    .pipe(globbing({extensions: '.scss'}))
    .pipe(sass())
    .on('error', handleError)
    .pipe(cmq()) // combine all @media queries into the page base
    .pipe(autoprefixer({cascade: false})) // auto prefix
    .pipe(gulp.dest('wp-content/themes/jadle/assets/css'));
});

// Main Javascript task
gulp.task('js', function() {
  return gulp.src('scripts/**/*.js')
    .pipe(newer('wp-content/themes/jadle/assets/js'))
    .pipe(uglify())
    .on('error', handleError)
    .pipe(gulp.dest('wp-content/themes/jadle/assets/js'));
});

// FUNCTIONS // ----------------------------------------------------
// Initial start function
gulp.task('start', function() {
  gulp.start('js', 'css');
});

// Default function
gulp.task('default', ['start']);

// Error reporting function
function handleError(err) {
  console.log(err.toString());
  this.emit('end');
}