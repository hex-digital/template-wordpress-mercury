const path = require('path');

module.exports = {
  root: path.resolve(__dirname, '../.'),

  // Source files
  src: path.resolve(__dirname, '../src'),

  // Production build files
  build: path.resolve(__dirname, '../dist'),

  // Static files that get copied to build folder, without any processing steps
  static: path.resolve(__dirname, '../static'),
};
