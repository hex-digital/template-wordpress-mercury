const Captaincss = require('@captaincss/captaincss');
const { pxToRem: pxToRemHelper } = require('@captaincss/captaincss/helpers');
const GutenbergPalette = require('./tools/tailwind/gutenberg-palette');

const baseFontSize = 16;
const pxToRem = (px) => pxToRemHelper(px, baseFontSize);

module.exports = {
  prefix: 'u-',
  purge: {
    content: ['./**/*.php', './src/**/*.js', './src/**/*.svg', './src/scss/purge-whitelist.scss'],
    options: {
      safelist: {
        standard: getCSSWhitelistPatterns(),
      },
    },
  },
  plugins: [Captaincss, GutenbergPalette],
  captain: {
    prefix: {
      objects: 'o-',
      components: 'c-',
    },
  },
  theme: {
    extend: {
      spacing: {
        '4xl': pxToRem(16),
        '5xl': pxToRem(24),
        9: pxToRem(40),
        11: pxToRem(46),
        36: pxToRem(140),
      },
    },
    skipLink: (theme) => ({
      styles: {
        backgroundColor: theme('colors.white'),
      },
    }),
    screens: {
      // Mobile
      xs: '440px', // Small screen
      sm: '640px', // Tablet
      md: '880px', // Desktop small
      lg: '1180px', // Desktop
      xl: '1500px', // Desktop Large
    },
    boxShadow: {
      DEFAULT: '0px 1px 2px rgba(0,0,0, 0.2)',
    },
    transitionTimingFunction: {
      'in-sine': 'cubic-bezier(0.47, 0, 0.75, 0.72)',
    },
    fontSize: {
      xxs: pxToRem(12),
      xs: pxToRem(14),
      sm: pxToRem(16),
      base: pxToRem(18),
      md: pxToRem(19),
      lg: pxToRem(21),
      xl: pxToRem(22),
      '2xl': pxToRem(27),
      '3xl': pxToRem(28),
      '4xl': pxToRem(34),
      '5xl': pxToRem(40),
      '6xl': pxToRem(42),
      '7xl': pxToRem(56),
      '8xl': pxToRem(80),
      '9xl': pxToRem(120),
    },
    fontFamily: {
      title: [
        'Hind Madurai',
        '-apple-system',
        'BlinkMacSystemFont',
        '"Segoe UI"',
        'Roboto',
        '"Helvetica Neue"',
        'Arial',
        '"Noto Sans"',
        'sans-serif',
      ],
      body: [
        'Work Sans',
        '-apple-system',
        'BlinkMacSystemFont',
        '"Segoe UI"',
        'Roboto',
        '"Helvetica Neue"',
        'Arial',
        '"Noto Sans"',
        'sans-serif',
      ],
    },
    colors: {
      transparent: 'transparent',
      current: 'currentColor',
      black: '#000',
      white: '#fff',

      grey: {
        200: '#333',
        300: '#828282',
        400: '#bdbdbd',
        500: '#e5e2de',
        600: '#f1eee8',
        700: '#f5f2ec',
        800: '#faf7f2',
      },

      blue: {
        300: '#2e6ba6',
        500: '#479ad6',
        700: '#c1d3e5',
      },

      green: {
        300: '#6bab45',
        500: '#a0dd83',
        700: '#d3e6c8',
      },

      'green-lime': '#d1f521',
      'pink-ruby': '#eb4a6e',
      'blue-turquoise': '#0fc9ff',
      'purple-amethyst': '#a35cde',
      'red-cinnabar': '#e53d3d',
      'green-shamrock': '#59de9e',

      'pink-mauvelous': '#f28ab2',
      'blue-midnight': '#0f215e',
      'orange-flamingo': '#f55c42',
      'orange-peach': '#ffa800',
      'blue-viking': '#5cc2d1',
      'yellow-turbo': '#ffe300',
    },
    letterSpacing: {
      tightest: '-.075em',
      tighter: '-.05em',
      tight: '-.025em',
      normal: '0',
      small: '.025em',
      medium: '.05em',
      wide: '.08em',
      wider: '.1em',
      widest: '.25em',
    },
    zIndex: {
      background: '-1',
      base: '0',
      navbar: '10',
      modal: '15',
    },
    wrapper: (theme) => ({
      padding: {
        /* [1] Largest breakpoint padding should match the two values added to max-width of the wrapper, to get the correct width */
        default: theme('spacing.4xl'),
        sm: theme('spacing.5xl'),
        lg: theme('spacing.11') /* [1] */,
      },
      maxWidth: {
        default: `calc(1440px + theme('spacing.11') + theme('spacing.11'))` /* [1] */,
      },
    }),
    frame: {
      ratios: {
        square: '1:1',
        '16:9': '16:9',
        golden: '1.618:1',
      },
    },
  },
};

/**
 * List of RegExp patterns for PurgeCSS
 * @returns {RegExp[]}
 */
function getCSSWhitelistPatterns() {
  return [
    /^home(-.*)?$/,
    /^blog(-.*)?$/,
    /^archive(-.*)?$/,
    /^date(-.*)?$/,
    /^error404(-.*)?$/,
    /^admin-bar(-.*)?$/,
    /^search(-.*)?$/,
    /^nav(-.*)?$/,
    /^wp(-.*)?$/,
    /^screen(-.*)?$/,
    /^navigation(-.*)?$/,
    /^(.*)-template(-.*)?$/,
    /^(.*)?-?single(-.*)?$/,
    /^postid-(.*)?$/,
    /^post-(.*)?$/,
    /^attachmentid-(.*)?$/,
    /^attachment(-.*)?$/,
    /^page(-.*)?$/,
    /^(post-type-)?archive(-.*)?$/,
    /^author(-.*)?$/,
    /^category(-.*)?$/,
    /^tag(-.*)?$/,
    /^menu(-.*)?$/,
    /^tags(-.*)?$/,
    /^tax-(.*)?$/,
    /^term-(.*)?$/,
    /^date-(.*)?$/,
    /^(.*)?-?paged(-.*)?$/,
    /^depth(-.*)?$/,
    /^children(-.*)?$/,

    /c-btn(--.*)?$/,

    // Gutenberg styles
    /^has(-.*)?$/,
    /^is(-.*)?$/,
    /^acf(-.*)?$/,
  ];
}
