<!-- Reusable component classes (processed by the Tailwind CDN) -->
<style type="text/tailwindcss">
    /* ================================================================
       Typography system
       Headings: Libre Baskerville (serif)   Body/UI: Inter (sans)
       Accent:   Kaushan Script (2 short phrases only)

       Scale (mobile -> desktop)
         .display        40 -> 56px  / 1.08  / -0.025em   (one per page, h1)
         .section-title  30 -> 40px  / 1.15  / -0.02em    (h2)
         .title-sm       24 -> 30px  / 1.2   / -0.015em   (h2 inside banners/cards)
         .card-title     17 -> 18px  / 1.35               (h3, card labels)
         .lead           17 -> 19px  / 1.7                (intro paragraphs)
         body            15 -> 16px  / 1.75
         .eyebrow        12px caps   / 0.16em
       ================================================================ */
    @layer base {
        html { -webkit-text-size-adjust: 100%; text-rendering: optimizeLegibility; }
        body { @apply text-[15px] leading-[1.75] sm:text-[16px]; font-feature-settings: "cv11", "ss01"; }
        h1, h2, h3, h4 { text-wrap: balance; }
        p, li, blockquote { text-wrap: pretty; }
        .font-serif { font-feature-settings: "kern", "liga"; }
    }

    @layer components {
        /* ---------- Type ---------- */
        .display {
            @apply font-serif text-[2.5rem] font-bold leading-[1.08] tracking-[-0.025em] text-primary-dark sm:text-[3rem] xl:text-[3.5rem];
        }
        .section-title {
            @apply font-serif text-[1.875rem] font-bold leading-[1.15] tracking-[-0.02em] text-primary-dark md:text-[2.5rem];
        }
        .title-sm {
            @apply font-serif text-[1.5rem] font-bold leading-[1.2] tracking-[-0.015em] md:text-[1.875rem];
        }
        .card-title {
            @apply font-serif text-[1.0625rem] font-bold leading-[1.35] text-primary-dark md:text-[1.125rem];
        }
        .lead {
            @apply text-[1.0625rem] leading-[1.7] text-complement-slate/90 md:text-[1.1875rem];
        }
        .body-text {
            @apply leading-[1.75] text-complement-slate/85;
        }
        .eyebrow {
            @apply inline-flex items-center gap-3 text-xs font-semibold uppercase leading-none tracking-[0.16em] text-primary before:h-0.5 before:w-7 before:rounded-full before:bg-gradient-to-r before:from-gradient-lime before:to-gradient-cyan before:content-[''];
        }
        .stat-number {
            @apply font-serif text-[2rem] font-bold leading-none tracking-[-0.02em] tabular-nums md:text-[2.25rem];
        }

        /* ---------- Buttons ---------- */
        .btn {
            @apply inline-flex items-center justify-center gap-2 rounded-full px-6 py-3 text-sm font-semibold leading-none tracking-[0.01em] transition disabled:cursor-not-allowed disabled:opacity-60;
        }
        .btn-primary {
            @apply bg-primary text-white hover:bg-primary-dark;
        }
        .btn-outline {
            @apply border border-primary-dark text-primary-dark hover:bg-primary-dark hover:text-white;
        }
        .btn-white {
            @apply bg-white text-primary-dark shadow-lg hover:bg-gradient-lime/20;
        }

        /* ---------- Navigation ---------- */
        .nav-link {
            @apply relative py-2 text-sm font-medium text-complement-slate transition hover:text-primary;
        }
        .nav-link-active {
            @apply font-semibold text-primary after:absolute after:inset-x-0 after:-bottom-1 after:h-0.5 after:rounded after:bg-primary;
        }

        /* ---------- Forms ---------- */
        .form-label {
            @apply mb-1 block text-sm font-medium text-complement-slate;
        }
        .form-input {
            @apply w-full rounded-lg border border-complement-gray/40 px-4 py-2 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20;
        }
    }
</style>
