var webpack = require('webpack');
var extracttext = require('extract-text-webpack-plugin');

module.exports = {
    entry: './src/script.js',
    output: {
        path: 'web/assets',
        filename: 'bundle.js'
    },
    module: {
        loaders: [
            {
                test: /\.css$/,
                loader: extracttext.extract('css-loader')
            },
            {
                test: /\.less$/,
                loader: extracttext.extract('css-loader!less-loader')
            },
            {
                test: /\.(png|woff|woff2|eot|ttf|svg)$/,
                loader: 'url-loader?limit=100000'
            }
        ]
    },
    plugins: [
        new extracttext('bundle.css', { allChunks: false }),
        new webpack.optimize.UglifyJsPlugin()
    ]
};
