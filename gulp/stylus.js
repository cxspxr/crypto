const gulp = require('gulp');
const server = require('./server.js');
const rupture = require('rupture');
const stylus = require('gulp-stylus');
const sourcemaps = require('gulp-sourcemaps');
const autoprefixer = require('gulp-autoprefixer');
const rename = require('gulp-rename');
const seq = require('run-sequence');
const gulpif = require('gulp-if');
const argv = require('yargs').argv;
const notifier = require('node-notifier');

const conf = {
	compress: !argv.dev,
	use: [rupture()]
}

function onError (e) {
	console.log(e.message);
	notifier.notify({
		title: 'stylus error',
		message: e.message + e.filename
	})
}

gulp.task('stylus', function(){
	gulp.src('resources/assets/stylus/main.styl')
		.pipe(gulpif(argv.dev, sourcemaps.init()))
		.pipe(stylus(conf).on('error', onError))
		.pipe(autoprefixer())
		.pipe(rename('style.css'))
		.pipe(gulpif(argv.dev, sourcemaps.write()))
		.pipe(gulp.dest('public/css'))
		.pipe(gulpif(argv.dev, server.stream()));
        
    gulp.src('resources/assets/stylus/admin/main.styl')
		.pipe(gulpif(argv.dev, sourcemaps.init()))
		.pipe(stylus(conf).on('error', onError))
		.pipe(autoprefixer())
		.pipe(rename('admin.css'))
		.pipe(gulpif(argv.dev, sourcemaps.write()))
		.pipe(gulp.dest('public/css'))
		.pipe(gulpif(argv.dev, server.stream()));
})
