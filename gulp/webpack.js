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
            Front: path.resolve(__dirname, coffeePath + 'app/front/components/'),
            Common: path.resolve(__dirname, coffeePath + 'app/common')
        }
    },
    plugins: plugins[env],
    node: {
        fs: 'empty',
        net: 'empty',
        tls: 'empty'
    },
    mode: env,
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
    devtool: argv.dev ? 'cheap-inline-source-map' : false,
    optimization: {
        splitChunks: {
            cacheGroups: {
                commons: {
                    test: /[\\/]node_modules[\\/]/,
                    name: "common",
                    chunks: "all"
                }
            }
        }
    }
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
                home: 'app/front/Home',
                front: 'app/front/Front',
                portal: 'app/portal/Portal',
                commons: 'app/common/Common',
                sell: 'app/portal/Sell',
                dashboard: 'app/portal/Dashboard'
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
                    dashboard: 'admin/Dashboard',
                    common: 'admin/Admin'
                },
                output: {
                    filename: 'admin-[name].js',
                    path: path.resolve(__dirname, '../public/js')
                },
            })
        , webpackCallback);
    }
});
