var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
//var sftp = require('gulp-sftp');
//var ftp = require('vinyl-ftp');


gulp.task('default', ['watch']);


gulp.task('sass', function() {
	return gulp.src('theme/library/scss/main.scss')
		.pipe(sourcemaps.init())
			.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
		.pipe(sourcemaps.write())
		.pipe(autoprefixer({browsers: ['last 2 versions'], cascade: false}))
		.pipe(gulp.dest('theme/library/css'));
});


//gulp.task('ftp', function() {
//	var conn = ftp.create({
//		host: '',
//		user: '',
//		pass: ''
//	});
//	
//	var globs = [
//		'theme/**/*'
//	];
//	
//	return gulp.src(globs, {base: 'theme', buffer: false})
//		.pipe(conn.newer('public_html/wp-content/themes/THEME'))
//		.pipe(conn.dest('public_html/wp-content/themes/THEME'));
//});
//
//
//gulp.task('sftp', function () {
//	return gulp.src('theme/library/css/main.css')
//		.pipe(sftp({
//			host: '',
//			user: '',
//			pass: '',
//			auth: 'key',
//			remotePath: 'public_html/wp-content/themes/THEME'
//		}));
//});


gulp.task('watch', function() {
	gulp.watch('theme/library/scss/**/*.scss', ['sass']);
	
//	var conn = ftp.create({
//		host: '',
//		user: '',
//		pass: ''
//	});
//	
//	var time;
//	
//	gulp.watch(['theme/**/*', '!theme/library/scss/**/*'])
//		.on('change', function(event) {
//			time = new Date();
//			console.log('['+('0'+time.getHours()).slice(-2)+':'+('0'+time.getMinutes()).slice(-2)+':'+('0'+time.getSeconds()).slice(-2)+'] --- Uploading: "' + event.path + '", ' + event.type);
//			
//			return gulp.src([event.path], {base: 'theme', buffer: false})
//				.pipe(conn.newer('public_html/wp-content/themes/THEME'))
//				.pipe(conn.dest('public_html/wp-content/themes/THEME'));
//	});
//	
//	gulp.watch(['plugins/**/*'])
//		.on('change', function(event) {
//			time = new Date();
//			console.log('['+('0'+time.getHours()).slice(-2)+':'+('0'+time.getMinutes()).slice(-2)+':'+('0'+time.getSeconds()).slice(-2)+'] --- Uploading: "' + event.path + '", ' + event.type);
//			
//			return gulp.src([event.path], {base: 'plugins', buffer: false})
//				.pipe(conn.newer('public_html/wp-content/plugins'))
//				.pipe(conn.dest('public_html/wp-content/plugins'));
//	});
});
