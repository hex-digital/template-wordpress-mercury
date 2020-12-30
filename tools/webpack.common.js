const paths = require('./paths');

const webpack = require('webpack');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const AssetsPlugin = require('assets-webpack-plugin');

module.exports = {
  // Where webpack looks to start building the bundle. See: https://webpack.js.org/configuration/entry-context/
  entry: {
    main: [paths.src + '/js/index.js', paths.src + '/scss/main.scss'],
    gutenberg: [paths.src + '/js/gutenberg-editor.js', paths.src + '/scss/gutenberg-editor-styles.scss'],
    'login-branding': [paths.src + '/scss/login-branding.scss'],
    // customizer: './src/customizer.js' // TODO: Left here as a reminder in case we need it later. Use it or lose it.
  },

  // Where webpack outputs the assets and bundles. See: https://webpack.js.org/configuration/output/
  output: {
    path: paths.build,
    filename: 'js/[name].[contenthash].bundle.js',
    publicPath: '/',
    assetModuleFilename: 'assets/[name].[contenthash][ext]',
  },

  // Customize the webpack build process
  plugins: [
    new webpack.ProgressPlugin(),

    // Removes/cleans build folders and unused assets when rebuilding. See: https://www.npmjs.com/package/clean-webpack-plugin
    new CleanWebpackPlugin({ cleanAfterEveryBuildPatterns: ['!fonts/*', '!images/*'] }),

    new AssetsPlugin({
      path: paths.build,
      filename: 'manifest.json',
    }),

    // Extracts CSS into separate files
    // Note: style-loader is for development, MiniCssExtractPlugin is for production
    new MiniCssExtractPlugin({
      filename: 'styles/[name].[contenthash].css',
      chunkFilename: '[id].css',
    }),
  ],

  // Determine how modules within the project are treated. See: https://webpack.js.org/configuration/module/
  module: {
    rules: [
      { test: /\.jsx?$/, exclude: /node_modules/, use: ['babel-loader'] },

      // Images: Copy image files to build folder, or inline if less than 8kb. See: https://webpack.js.org/guides/asset-modules/
      {
        test: /\.(?:ico|gif|png|jpg|jpeg|svg)$/i,
        type: 'asset',
        generator: { filename: 'images/[name].[contenthash][ext]' },
      },
      {
        test: /icons\/.*\.(?:svg)$/i,
        type: 'asset',
        generator: { filename: 'icons/[name].[contenthash][ext]' },
      },

      // Fonts and SVGs: See: https://webpack.js.org/guides/asset-modules/
      // TODO: SVG icon system
      {
        test: /fonts\/.*\.(woff(2)?|eot|ttf|otf|svg)/,
        type: 'asset',
        generator: { filename: 'fonts/[name].[contenthash][ext]' },
      },
    ],
  },
};
