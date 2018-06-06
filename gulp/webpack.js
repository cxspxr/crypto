const gulp = require('gulp');
const rename = require('gulp-rename');
const server = require('./server.js');
const argv = require('yargs').argv;
const webpack = require('webpack');
const rupture = require('rupture');
const autoprefixer = require('autoprefixer');
const path = require('path');
const UglifyJSPlugin = require('uglifyjs-webpack-plugin');

var plugins = {
    production: [
        new webpack.LoaderOptionsPlugin({
            minimize: true
        }),
        new UglifyJSPlugin
    ],
    development: [

    ]
}

var coffeePath = '../resources/assets/coffee/';

var env = argv.dev ? 'development' : 'production';

var webpackCommonConfig = {
    resolve: {
        extensions: ['.coffee', '.vue', '.js'],
        modules: [
            'resources/assets/coffee',
            'node_modules',
        ],
        alias: {
            Components: path.resolve(__dirname, coffeePath + 'components/'),
            Mixins: path.resolve(__dirname, coffeePath + 'utils/mixins/'),
            Utils: path.resolve(__dirname, coffeePath + 'utils/'),
            Portal: path.resolve(__dirname, coffeePath + 'app/portal/components/'),
            Front: path.resolve(__dirname, coffeePath + 'app/front/components/')
        }
    },
    plugins: plugins[env].concat([
        new webpack.optimize.CommonsChunkPlugin({name:'common'})
    ]),
    module: {
        rules: [
            {
                test: /\.coffee$/,
                use: [
                    {
                        loader: 'babel-loader',
                        options: {
                            presets: ['env']
                        }
                    },
                    'coffee-loader'
                ]
            },
            {
                test: /\.vue$/, loader: 'vue-loader',
                options: {
                    postcss: [autoprefixer()]
                }
            }
        ]
    },
    devtool: argv.dev ? 'cheap-inline-source-map' : false
};

var webpackCallback = function(err, stats) {
    console.log(stats.toString({
        colors: true,
        modules: false
    }));

    server.reload();
};

gulp.task('coffee', function(){
    webpack(
        Object.assign(webpackCommonConfig, {
            entry: {
                index: 'app/front/home/Home'
            },
            output: {
                filename: '[name].js',
                path: path.resolve(__dirname, '../public/js')
            },
        })
    , webpackCallback);

    if (!argv.dev || argv.admin) {
        webpack(
            Object.assign(webpackCommonConfig, {
                entry: {
                    dashboard: 'admin/dashboard'
                },
                output: {
                    filename: 'admin-[name].js',
                    path: path.resolve(__dirname, '../public/js')
                },
            })
        , webpackCallback);
    }
});
