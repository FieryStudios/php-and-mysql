var gulp = require('gulp');
var concat = require('gulp-concat');
var sass = require('gulp-sass');
var minifyCss = require('gulp-clean-css');
var rename = require('gulp-rename');

var paths = {
  sass: ['./styles/sass*.scss']
};

gulp.task('sass', function(done) {
  gulp.src(paths.sass)
    .pipe(sass())
    .pipe(gulp.dest('./styles/css/'))
    .pipe(minifyCss({
      keepSpecialComments: 0
    }))
    .pipe(rename({ extname: '.min.css' }))
    .pipe(gulp.dest('./styles/css/'))
    .on('end', done);
});


gulp.task('watch', function() {
  gulp.watch(paths.sass, ['sass']);
});


gulp.task('default', ['watch']);