const gulp = require('gulp');
const server = require('browser-sync').create();
const argv = require('yargs').argv;
const path = argv.dev ? require('./.server') : '';

gulp.task('server', function(){
	server.init({
		proxy: path,
		ghostMode: false,
		open: false,
		notify: false
	})
});

module.exports = server;
