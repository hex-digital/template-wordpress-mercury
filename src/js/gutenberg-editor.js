/* global wp */
wp.domReady(() => {
  wp.blocks.unregisterBlockStyle('core/button', ['default', 'outline', 'squared', 'fill']);

  wp.blocks.registerBlockStyle('core/button', [
    { name: 'solid', label: 'Solid', isDefault: true },
    { name: 'line', label: 'Underline' },
  ]);

  wp.blocks.registerBlockStyle('core/heading', [
    { name: 'default', label: 'Default', isDefault: true },
    { name: 'stroke', label: 'Stroke' },
  ]);

  wp.blocks.registerBlockStyle('core/spacer', [
    { name: 'tiny', label: 'Tiny', isDefault: true },
    { name: 'small', label: 'Small' },
    { name: 'medium', label: 'Medium' },
    { name: 'large', label: 'Large' },
    { name: 'xlarge', label: 'Extra Large' },
  ]);
});
