const plugin = require('tailwindcss/plugin');
const flattenColorPalette = require('tailwindcss/lib/util/flattenColorPalette').default;
const toColorValue = require('tailwindcss/lib/util/toColorValue').default;
const withAlphaVariable = require('tailwindcss/lib/util/withAlphaVariable').default;

module.exports = plugin(function ({ addUtilities, theme, e, corePlugins }) {
  const textColors = flattenColorPalette(theme('textColor'));
  const backgroundColors = flattenColorPalette(theme('backgroundColor'));

  const getTextProperties = (value) => {
    if (corePlugins('textOpacity')) {
      return withAlphaVariable({
        color: value,
        property: 'color',
        variable: '--tw-text-opacity',
      });
    }

    return { color: toColorValue(value) };
  };

  const getBgProperties = (value) => {
    if (corePlugins('backgroundOpacity')) {
      return withAlphaVariable({
        color: value,
        property: 'background-color',
        variable: '--tw-bg-opacity',
      });
    }

    return { 'background-color': toColorValue(value) };
  };

  const utilities = [];

  for (const [colorName, colorValue] of Object.entries(textColors)) {
    utilities.push({
      [`.${e(`has-${colorName}-color`)}`]: getTextProperties(colorValue),
    });
    utilities.push({
      [`.${e(`has-${colorName}-color`)}.is-style-stroke`]: {
        '-webkit-text-stroke-color': colorValue,
      },
    });
  }

  for (const [colorName, colorValue] of Object.entries(backgroundColors)) {
    utilities.push({
      [`.${e(`has-${colorName}-background-color`)}`]: getBgProperties(colorValue),
    });
  }

  addUtilities(utilities, { respectPrefix: false });
});
