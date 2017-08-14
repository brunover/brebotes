// Include gulp
var gulp = require('gulp'); 

// Include Our Plugins
var less    = require('gulp-less');
var uglify  = require('gulp-uglify');
var rename  = require('gulp-rename');
var cssmin  = require('gulp-cssmin');


gulp.task('less', function() {
    return gulp.src('src/style.less')
        .pipe(rename('style.min.css'))
        .pipe(less())
        .pipe(cssmin())
        .pipe(gulp.dest('./css'))
});


gulp.task('scripts', function() {
    return gulp.src('src/script.js')
        .pipe(rename('script.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./js'));
});

// Watch Files For Changes
gulp.task('watch', function() { // 
    gulp.watch('src/script.js', ['scripts']);
    gulp.watch('src/*.less', ['less']);
});

// Default Task
gulp.task('default', ['watch']);
