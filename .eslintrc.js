module.exports = {
  root: true,
  env: {
    browser: true,
    commonjs: true,
    es2021: true,
    jquery: true,
  },
  extends: ['eslint:recommended', 'plugin:prettier/recommended'],
  parserOptions: {
    ecmaVersion: 12,
    sourceType: 'module',
  },
  rules: {
    'prettier/prettier': 'warn',
  },
  ignorePatterns: ['dist/**/*', 'node_modules/**/*', 'vendor/**/*'],
};
