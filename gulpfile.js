require('require-dir')('./gulp');

const gulp = require('gulp');
const seq = require('run-sequence');
const argv = require('yargs').argv;
const server = require('./gulp/server.js');

gulp.task('default', ['coffee', 'stylus'], function(){
	if(argv.dev){
		seq('server');

		gulp.watch('resources/assets/stylus/**/*', ['stylus']);
		gulp.watch('resources/assets/coffee/**/*', ['coffee']);
		gulp.watch('resources/views/**/*.php', function(){
			server.reload()
		});
	}
});
