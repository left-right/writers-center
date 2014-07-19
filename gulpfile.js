var gulp 		= require('gulp');
var gutil 		= require('gulp-util');
var notify 		= require('gulp-notify');
var sass 		= require('gulp-ruby-sass');
var autoprefix 	= require('gulp-autoprefixer');
var sassDir		= 'app/assets/sass';
var cssDir		= 'public/assets/css';

gulp.task('main-css', function(){
	return gulp.src(sassDir + '/main.sass')
		.pipe(sass({
			style: 'compressed',
	        onError: function(err) {
	            return notify(err);
	        }
		}))
		.pipe(autoprefix('last 3 version'))
		.pipe(gulp.dest(cssDir))
		.pipe(notify('css compiled'));
});

gulp.task('avalon-css', function(){
	return gulp.src(sassDir + '/avalon.sass')
		.pipe(sass({
			style: 'compressed',
	        onError: function(err) {
	            return notify(err);
	        }
		}))
		.pipe(autoprefix('last 3 version'))
		.pipe(gulp.dest(cssDir))
		.pipe(notify('css compiled'));
});

gulp.task('watch', function(){
	gulp.watch(sassDir + '/**/*.sass', ['main-css', 'avalon-css']);
});

gulp.task('default', ['main-css', 'avalon-css', 'watch']);