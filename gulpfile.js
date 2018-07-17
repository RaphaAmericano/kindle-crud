'use strict';

var gulp = require('gulp');

var browserSync = require('browser-sync').create();



gulp.task('browserSync', function(){
  browserSync.init({
    server: {
      baseDir: './',
      index: 'index.php',
      directory: false
    }
  })
});

gulp.task('watch',['browserSync'], function () {
  gulp.watch('*.php', browserSync.reload);
  gulp.watch('./sass/*.scss', browserSync.reload);
  gulp.watch(['./js/*.js'], browserSync.reload);
});