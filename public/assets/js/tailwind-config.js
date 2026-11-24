/**
 * Tailwind CDN config — Nasra poster brand
 */
tailwind.config = {
    theme: {
        container: {
            center: true,
            padding: { DEFAULT: '1rem', lg: '2rem', xl: '3rem' },
        },
        extend: {
            colors: {
                primary: {
                    DEFAULT: '#004D26',
                    light:   '#0A6B3A',
                    dark:    '#00331A',
                },
                accent: {
                    DEFAULT: '#FFCC00',
                    dark:    '#E6B800',
                },
                ink:    '#111111',
                muted:  '#5C5C5C',
                surface: {
                    DEFAULT: '#FFFFFF',
                    soft:    '#FAFAF7',
                },
            },
            fontFamily: {
                sans:    ['"Source Sans 3"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                display: ['Montserrat', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                script:  ['Caveat', 'cursive'],
            },
        },
    },
};
