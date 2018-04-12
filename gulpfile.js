const gulp	= require('gulp');
const sass	= require('gulp-sass');
const ts 		= require('gulp-typescript');
const browserSync	= require('browser-sync').create();


gulp.task('sass', function() {
	return gulp.src('assets/src/scss/**/*.+(scss|sass)')// Gets all files ending with .scss and .sass in app/scss and children dirs
		   .pipe(sass()) // Convert Sass to CSS with gulp-sass
		   .on('error', console.log)		
		   .pipe(gulp.dest('assets/css/'))
		   .pipe(browserSync.reload({stream: true}))
});

gulp.task('typescript', () => {
			( () => gulp.src('assets/src/tsc/*.ts')
			  	.pipe(ts())
				.pipe(gulp.dest('assets/js/'))
			)();		
});

gulp.task('browserSync', function() {
	browserSync.init(
	{
		proxy: "dev.ufaras.ru",
		notify: false
	});
});

gulp.task('watch', ['sass','typescript','browserSync'], function() {
  gulp.watch('assets/src/scss/**/*.+(scss|sass)', ['sass']);
 	gulp.watch('assets/src/tsc/*.ts', ['typescript']);
 	gulp.watch(['assets/css/**/*.css', 'assets/js/**/*.js'], browserSync.reload);
});

gulp.task('default',['watch']);

