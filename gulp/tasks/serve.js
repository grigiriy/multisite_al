const gulp = require('gulp');

const styles = require('./styles');
const pug2html = require('./pug2html');
const script = require('./script');

const server = require('browser-sync').create();

module.exports = function serve(cb) {
  server.init({
    server: 'build',
    notify: false,
    open: true,
    cors: true,
  });
  gulp.watch(
    'src/scss/**/*.scss',
    gulp.series(styles, (cb) =>
      gulp.src('build/css').pipe(server.stream()).on('end', cb)
    )
  );
  gulp.watch('src/js/**/*.js', gulp.series(script)).on('change', server.reload);
  gulp.watch('index.pug', gulp.series(pug2html));
  gulp.watch('components/*.html', gulp.series(pug2html));
  gulp.watch('build/*.html').on('change', server.reload);

  gulp.on('change', server.reload);

  return cb();
};
