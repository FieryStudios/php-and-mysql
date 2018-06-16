var gulp = require('gulp');
var concat = require('gulp-concat');
var sass = require('gulp-sass');
var minifyCss = require('gulp-clean-css');
var rename = require('gulp-rename');

var paths = {
  sass: ['./public/styles/sass/*.scss']
};

gulp.task('sass', function(done) {
  gulp.src(paths.sass)
    .pipe(sass({errLogToConsole: true}))
    .pipe(gulp.dest('./public/styles/css/'))
    .pipe(minifyCss())
    .pipe(rename({ extname: '.min.css' }))
    .pipe(gulp.dest('./public/styles/css/'))
    .on('end', done)});


gulp.task('watch', function() {
  gulp.watch(paths.sass, ['sass']);
});


gulp.task('default', ['watch']);