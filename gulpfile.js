const projectURL = 'localhost:10018'; // Local by Flywheel Project URL

var gulp = require('gulp'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    browserSync = require('browser-sync').create();


function style(){
    return gulp.src('sass/**/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass()).on('error', sass.logError)
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('.'))
    .pipe(browserSync.stream());
}


function watch() {
    browserSync.init({
        proxy: projectURL,
        open: 'true',
    });
    gulp.watch('sass/**/*.scss', style),
    gulp.watch('sass/**/*.scss').on('change',browserSync.reload);
    gulp.watch('*.php').on('change', browserSync.reload);
    gulp.watch('templates/*.php').on('change', browserSync.reload);
    gulp.watch('template-parts/*.php').on('change', browserSync.reload);
}


exports.style = style;
exports.watch = watch;