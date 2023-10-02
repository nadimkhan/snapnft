var gulp = require('gulp');
var postcss = require('gulp-postcss');
var tailwindcss = require('tailwindcss');
var autoprefixer = require('autoprefixer');

gulp.task('css', function () {
    return gulp.src('./css/tailwind.css')
        .pipe(postcss([
            tailwindcss,
            autoprefixer
        ]))
        .pipe(gulp.dest('./'));
});

gulp.task('watch', function () {
    gulp.watch(['./css/*.css', './*.php', './templates/*.php', './library/functions/*.php', './tailwind.config.js'], gulp.series('css'));
});
