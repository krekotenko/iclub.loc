const path = require('path');
const webpack = require('webpack');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
// const SpriteLoaderPlugin = require('svg-sprite-loader/plugin');
const autoprefixer = require('autoprefixer');
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");
const UglifyJsPlugin = require("uglifyjs-webpack-plugin");

const devMode = process.env.NODE_ENV == 'development';
const pathToPublic = './catalog/view/theme/iclub/javascript'

module.exports = {
    entry: './dev/index.js',

    output: {
        filename: 'bundle.js',    
        path: path.resolve(__dirname, pathToPublic),
        hotUpdateChunkFilename: 'hot/hot-update.js',
        hotUpdateMainFilename: 'hot/hot-update.json',
    }, 

    devtool: devMode ? 'inline-source-map' : false,

    watch: devMode,

    optimization: {
        minimizer: [ new UglifyJsPlugin(), new OptimizeCSSAssetsPlugin() ]
    },

    module: {
        rules: [
            {
                test: /\.js$/, 
                exclude: /(node_modules)/,
                loader: "babel-loader",
                options:{
                    presets:["@babel/preset-env"]
                }
            },
            { 
                test: /\.(sass|scss|css)$/,
                use: [                 
                    MiniCssExtractPlugin.loader,                
                    { loader: 'css-loader', options: { url: false } },  
                    {
                        loader: 'postcss-loader',
                        options: {
                            plugins: [
                                autoprefixer({
                                    browsers:['ie >= 8', 'last 15 version']
                                })
                            ],
                        }
                    },                 
                    "sass-loader",                    
                ],
            },
            // {
            //     test: /\.svg$/,
            //     use: [
            //         {
            //             loader: 'svg-sprite-loader',
            //             options: {
            //                 extract: true,
            //                 spriteFilename: 'svg/sprite.html'
            //             }
            //         },
            //         'svgo-loader'
            //     ]
            // },
            {
                test: require.resolve('jquery'),
                use: [
                    {
                        loader: 'expose-loader',
                        options: 'jQuery'
                    },
                    {
                        loader: 'expose-loader',
                        options: '$'
                    }
                ]
            }
        ]
    },

    plugins: [

        new webpack.ProvidePlugin({
            $: "jquery",
            jQuery: "jquery",
            "window.jQuery": "jquery"
        }),

        new MiniCssExtractPlugin({
            filename: "../stylesheet/style.css"            
        }),

        // new SpriteLoaderPlugin({
        //     plainSprite: true,
        //     spriteAttrs: {
        //       id: 'sprite-svg'
        //     }
        // })
    ]    
};