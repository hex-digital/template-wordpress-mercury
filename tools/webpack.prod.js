const { merge } = require('webpack-merge');
const common = require('./webpack.common.js');

const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
const ImageMinimizerPlugin = require('image-minimizer-webpack-plugin');

module.exports = merge(common, {
  // Set the mode to development or production. See: https://webpack.js.org/configuration/mode/
  mode: 'production',

  // Control how source maps are generated. See: https://webpack.js.org/configuration/devtool/
  devtool: false, // Use 'hidden-source-map' when we integrate Sentry error logging. Use 'source-map' if we eventually deploy the source maps to a server behind authentication, to enable browser devtools to utilise it

  // Where webpack outputs the assets and bundles. See: https://webpack.js.org/configuration/output/
  output: {
    filename: 'js/[name].[contenthash].bundle.js',
  },

  // Customize the webpack build process. See: https://webpack.js.org/configuration/plugins/
  plugins: [
    new ImageMinimizerPlugin({
      minimizerOptions: {
        // Lossless optimization with custom option
        // Feel free to experiment with options for better result for you
        plugins: [
          ['gifsicle', { interlaced: true }],
          ['mozjpeg', { quality: 60, progressive: true }],
          ['pngquant', { optimizationLevel: 5 }],
          ['svgo', { plugins: [{ removeViewBox: false }] }],
        ],
      },
    }),
  ],

  // Determine how modules within the project are treated. See: https://webpack.js.org/configuration/module/
  module: {
    rules: [
      {
        test: /\.(scss|css)$/,
        use: [
          {
            loader: MiniCssExtractPlugin.loader,
            options: { publicPath: '../' },
          },
          { loader: 'css-loader', options: { importLoaders: 2 } },
          {
            loader: 'postcss-loader',
            options: {
              postcssOptions: {
                ident: 'postcss', // Needs an identity in order to use 'require' in the plugins. See: https://webpack.js.org/guides/asset-modules/
                plugins: [require('tailwindcss'), require('autoprefixer')],
              },
            },
          },
          'sass-loader',
        ],
      },
    ],
  },

  // See: https://webpack.js.org/configuration/optimization/
  optimization: {
    minimize: true,
    minimizer: [`...`, new CssMinimizerPlugin()],

    // Once your build outputs multiple chunks, this option will ensure they share the webpack runtime
    // instead of having their own. This also helps with long-term caching, since the chunks will only
    // change when actual code changes, not the webpack runtime.
    runtimeChunk: {
      name: 'runtime',
    },

    moduleIds: 'deterministic', // Which algorithm to use when choosing hash IDs. See: https://webpack.js.org/configuration/optimization/#optimizationmoduleids

    splitChunks: {
      cacheGroups: {
        vendor: {
          test: /[\\/]node_modules[\\/]/,
          name: 'vendor',
          chunks: 'all',
        },
      },
    },
  },
  performance: {
    hints: false,
    maxEntrypointSize: 512000,
    maxAssetSize: 512000,
  },
});
