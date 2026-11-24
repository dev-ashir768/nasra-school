<!-- Reusable component classes (processed by the Tailwind CDN) -->
<style type="text/tailwindcss">
    @layer base {
        html { -webkit-text-size-adjust: 100%; text-rendering: optimizeLegibility; }
        body { @apply text-[15px] leading-[1.75] sm:text-[16px]; }
        h1, h2, h3, h4 { text-wrap: balance; }
        p, li, blockquote { text-wrap: pretty; }
    }

    @layer components {
        .display {
            @apply font-display text-[2.5rem] font-black leading-[1.05] tracking-[-0.02em] text-primary sm:text-[3rem] xl:text-[3.75rem];
        }
        .section-title {
            @apply font-display text-[1.75rem] font-extrabold leading-[1.15] tracking-[-0.02em] text-primary md:text-[2.25rem];
        }
        .title-sm {
            @apply font-display text-[1.375rem] font-extrabold leading-[1.2] tracking-[-0.015em] text-primary md:text-[1.75rem];
        }
        .card-title {
            @apply font-display text-[1.0625rem] font-bold leading-[1.35] text-primary md:text-[1.125rem];
        }
        .lead {
            @apply text-[1.0625rem] leading-[1.7] text-muted md:text-[1.1875rem];
        }
        .body-text {
            @apply leading-[1.75] text-muted;
        }
        .eyebrow {
            @apply inline-flex items-center gap-2 text-xs font-semibold uppercase leading-none tracking-[0.16em] text-primary;
        }
        .stat-number {
            @apply font-display text-[2rem] font-extrabold leading-none tracking-[-0.02em] tabular-nums md:text-[2.25rem];
        }

        .btn {
            @apply inline-flex items-center justify-center gap-2 rounded-lg px-6 py-3 text-sm font-semibold leading-none tracking-[0.01em] transition disabled:cursor-not-allowed disabled:opacity-60;
        }
        .btn-primary {
            @apply bg-primary text-white hover:bg-primary-dark;
        }
        .btn-outline {
            @apply border-2 border-primary text-primary hover:bg-primary hover:text-white;
        }
        .btn-white {
            @apply bg-white text-primary shadow-md hover:bg-accent hover:text-primary-dark;
        }

        .nav-link {
            @apply relative py-2 text-sm font-semibold text-ink/80 transition hover:text-primary;
        }
        .nav-link-active {
            @apply text-primary after:absolute after:inset-x-0 after:-bottom-1 after:h-0.5 after:rounded after:bg-accent;
        }

        .form-label {
            @apply mb-1 block text-sm font-medium text-ink;
        }
        .form-input {
            @apply w-full rounded-lg border border-muted/30 px-4 py-2 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20;
        }

        .brush-word {
            @apply relative isolate inline-block px-2 text-ink;
        }
        .brush-word::before {
            content: '';
            @apply absolute inset-x-0 bottom-[0.15em] -z-10 h-[0.55em] -skew-x-3 rounded-sm bg-accent;
        }
    }
</style>
