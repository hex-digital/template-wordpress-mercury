require('dotenv').config();

const { merge } = require('webpack-merge');
const common = require('./webpack.common.js');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

module.exports = merge(common, {
  // Set the mode to development or production. See: https://webpack.js.org/configuration/mode/
  mode: 'development',

  // Control how source maps are generated. See: https://webpack.js.org/configuration/devtool/
  devtool: 'eval-cheap-source-map',

  // Control how Webpack cache's generated modules, e.g. images. See: https://webpack.js.org/configuration/other-options/#cache
  // cache: {
  //   type: 'filesystem',
  // },

  // See: https://webpack.js.org/configuration/plugins/
  plugins: [
    new BrowserSyncPlugin({
      proxy: process.env.BROWSER_SYNC_PROXY || 'localhost',
      notify: false,
      files: ['./**/*.php', 'src/**/*.js', 'src/**/*.scss'],
    }),
  ],

  module: {
    rules: [
      {
        enforce: 'pre',
        exclude: /node_modules/,
        test: /\.jsx$/,
        loader: 'eslint-loader',
      },
      {
        // Create a css bundle from our scss and css files
        test: /\.(scss|css)$/,
        use: [
          {
            loader: MiniCssExtractPlugin.loader,
            options: { publicPath: '../' },
          },
          { loader: 'css-loader', options: { sourceMap: true, importLoaders: 1 } }, // See: https://webpack.js.org/loaders/css-loader/
          {
            // See: https://www.npmjs.com/package/postcss-loader
            loader: 'postcss-loader',
            options: {
              sourceMap: true,
              postcssOptions: {
                ident: 'postcss', // Needs an identity in order to use 'require' in the plugins. See: https://webpack.js.org/guides/asset-modules/
                plugins: [require('tailwindcss'), require('autoprefixer')],
              },
            },
          },
          { loader: 'sass-loader', options: { sourceMap: true } }, // See: https://webpack.js.org/loaders/sass-loader/
        ],
      },
    ],
  },
});
