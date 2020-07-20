const gulp = require('gulp');
const plumber = require('gulp-plumber');
const pug = require('gulp-pug');
const pugLinter = require('gulp-pug-linter');
const htmlValidator = require('gulp-w3c-html-validator');

module.exports = function pug2html() {
  return gulp
    .src('index.pug')
    .pipe(plumber())
    .pipe(pugLinter({ reporter: 'default' }))
    .pipe(pug())
    .pipe(htmlValidator())
    .pipe(gulp.dest('build'));
};
