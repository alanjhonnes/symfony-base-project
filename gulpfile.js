var gulp = require('gulp'),
    notify = require('gulp-notify'),
    phpspec = require('gulp-phpspec'),
    watch = require('gulp-watch'),
    plumber = require('gulp-plumber'),
    batch = require('gulp-batch');

gulp.task('phpspec', function(){
    var options = {
        debug:true,
        formatter: 'pretty'
    };
    gulp.src('spec/**/*.php')
        .pipe(phpspec('vendor/bin/phpspec', options))
        .on('error', notify.onError({
            title: 'PHPSpec testing failed'
        }));
});

gulp.task('watch', function(){
    gulp.src('spec/**/*.php')
        .pipe(watch(['spec/**/*.php', 'src/**/*.php'], batch(
            function(events, done){
                gulp.start('phpspec', done) ;
            }
        )))
        .pipe(plumber())
});