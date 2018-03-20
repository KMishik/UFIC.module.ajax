const gulp	= require('gulp');
const sass	= require('gulp-sass');
const browserSync	= require('browser-sync').create();


gulp.task('sass', function() {
	return gulp.src('assets/src/scss/**/*.+(scss|sass)')// Gets all files ending with .scss and .sass in app/scss and children dirs
		   .pipe(sass()) // Convert Sass to CSS with gulp-sass
		   .on('error', console.log)		
		   .pipe(gulp.dest('assets/css/'))
		   .pipe(browserSync.reload({stream: true}))
});

gulp.task('browserSync', function() {
	browserSync.init(
	{
		proxy: "dev.ufaras.ru/contacts/",
		notify: false
	});
});

gulp.task('watch', ['browserSync', 'sass'], function() {
  gulp.watch('assets/src/scss/**/*.+(scss|sass)', ['sass']);
});

gulp.task('default',['watch']);

