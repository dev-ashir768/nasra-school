/**
 * Tailwind CDN config - loaded right after the Tailwind CDN script
 *
 * Nasra School brand palette - use only these colours.
 *   bg-primary, text-primary-dark, from-gradient-green to-gradient-cyan, text-accent-rust ...
 */
tailwind.config = {
    theme: {
        container: {
            center: true,
            padding: { DEFAULT: '1rem', lg: '2rem', xl: '3rem' },
        },
        extend: {
            colors: {
                // Primary brand greens
                primary: {
                    DEFAULT: '#0D6616',
                    light:   '#466857',
                    dark:    '#162716',
                },
                // Approved gradient palette
                gradient: {
                    purple: '#3F188D',
                    green:  '#067640',
                    plum:   '#2F043B',
                    night:  '#021906',
                    forest: '#041B08',
                    cyan:   '#0097B2',
                    lime:   '#7ED957',
                    moss:   '#2B4723',
                    leaf:   '#177B12',
                },
                // Complementary colours
                complement: {
                    slate: '#2C3333',
                    gray:  '#737373',
                    navy:  '#172333',
                },
                // Accent colours
                accent: {
                    rust: '#84260A',
                    navy: '#0D1B64',
                    ink:  '#172333',
                },
            },
            fontFamily: {
                sans:   ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                serif:  ['"Libre Baskerville"', 'Georgia', 'serif'],
                script: ['"Kaushan Script"', 'cursive'],
            },
        },
    },
};
