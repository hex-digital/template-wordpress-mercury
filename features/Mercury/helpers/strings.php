<?php

if (!function_exists('widont')) {
    /**
     * In typesetting, single words on the last line of a paragraph are commonly known as widows, and are considered bad style.
     * widont eliminates the issue of widows by using a non-breaking space to force the last two words of a string onto the same line.
     * If the last word contains hyphens they will be converted to the non-breaking variant instead.
     */
    function widont(string $string = ''): string
    {
        $string = rtrim($string);

        $non_breaking_space = '&nbsp;';
        $non_breaking_dash = '&#8209;';

        $last_space_position = strrpos($string, ' ');
        $last_hyphen_position = strrpos($string, '-');

        $replacement = $non_breaking_space;
        $replacement_position = $last_space_position;

        if (!$last_space_position && !$last_hyphen_position) {
            return $string;
        }

        if ($last_hyphen_position && $last_hyphen_position > $last_space_position) {
            $replacement = $non_breaking_dash;
            $replacement_position = $last_hyphen_position;
        }

        return substr($string, 0, $replacement_position) . $replacement . substr($string, $replacement_position + 1);
    }
}
