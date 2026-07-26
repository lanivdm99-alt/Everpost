<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import {
    IconArrowRight,
    IconBook2,
    IconBrain,
    IconChartBar,
    IconChecks,
    IconDeviceDesktopAnalytics,
    IconPhoto,
    IconRobot,
    IconSearch,
    IconShoppingBag,
    IconSparkles,
    IconSpeakerphone,
} from '@tabler/icons-vue';
import AppLayout from '@/layouts/AppLayout.vue';

const modules = [
    {
        name: 'BuzzMiner',
        eyebrow: 'Research & intelligence',
        description: 'Discover profitable opportunities using keywords, reviews, competitors, trends and structured web research.',
        icon: IconSearch,
        status: 'Build first',
        href: '/competitors',
        features: ['Opportunity scoring', 'Review intelligence', 'Market research', 'Research workspace'],
    },
    {
        name: 'Everpost',
        eyebrow: 'Content & distribution',
        description: 'Turn validated opportunities into complete campaigns, then schedule and publish them across channels.',
        icon: IconSpeakerphone,
        status: 'In progress',
        href: '/content-studio',
        features: ['Content Studio', 'Campaign builder', 'Publishing calendar', 'Best-time recommendations'],
    },
    {
        name: 'Publishing Studio',
        eyebrow: 'KDP & book production',
        description: 'Research, create and validate books with trim-size, margin, bleed, cover and metadata checks.',
        icon: IconBook2,
        status: 'Next',
        href: '#publishing-roadmap',
        features: ['KDP research', 'Book builder', 'Cover studio', 'Print-ready validator'],
    },
    {
        name: 'Creative Studio',
        eyebrow: 'Brand & media',
        description: 'Create on-brand images, covers, ads, voiceovers and avatar-led videos from one campaign brief.',
        icon: IconPhoto,
        status: 'Planned',
        href: '#creative-roadmap',
        features: ['Brand kits', 'Image generation', 'Voice Studio', 'Avatar Studio'],
    },
    {
        name: 'Commerce OS',
        eyebrow: 'Products & selling',
        description: 'Manage digital products, publishing channels, storefronts and marketplace listings from one catalog.',
        icon: IconShoppingBag,
        status: 'Planned',
        href: '#commerce-roadmap',
        features: ['Product catalog', 'Marketplace listings', 'Storefronts', 'Affiliate offers'],
    },
    {
        name: 'Revenue Hub',
        eyebrow: 'Profit & performance',
        description: 'Unify royalties, sales, ad spend, fees and campaign attribution into real profit reporting.',
        icon: IconChartBar,
        status: 'Planned',
        href: '#revenue-roadmap',
        features: ['Profitability', 'Launch analytics', 'Series read-through', 'Forecasting'],
    },
    {
        name: 'Agent Studio',
        eyebrow: 'AI employees & workflows',
        description: 'Build supervised agents for research, content, customer support, sales and recurring operations.',
        icon: IconRobot,
        status: 'Later phase',
        href: '#agents-roadmap',
        features: ['Research agents', 'Marketing agents', 'Support agents', 'Approval gates'],
    },
    {
        name: 'AI Growth Manager',
        eyebrow: 'Business orchestration',
        description: 'Monitor the full system, explain what changed and prepare the next best actions for approval.',
        icon: IconBrain,
        status: 'Long-term',
        href: '#growth-roadmap',
        features: ['Daily brief', 'Anomaly detection', 'Recommendations', 'Autonomous preparation'],
    },
];

const buildPlan = [
    { phase: '01', title: 'Foundation', items: ['Authentication and profiles', 'Workspace setup', 'Navigation and command center', 'Shared data model'] },
    { phase: '02', title: 'Intelligence MVP', items: ['Research workspace', 'Competitor records', 'Review analysis', 'Opportunity score'] },
    { phase: '03', title: 'Execution MVP', items: ['Campaign builder', 'Content objects', 'Approval workflow', 'Scheduling and publishing'] },
    { phase: '04', title: 'Publishing MVP', items: ['KDP project manager', 'Interior validator', 'Cover validator', 'Launch checklist'] },
    { phase: '05', title: 'Revenue loop', items: ['Platform connections', 'Profit dashboard', 'Campaign annotations', 'AI recommendations'] },
];
</script>

<template>
    <AppLayout>
        <Head title="Organized AI OS" />

        <div class="mx-auto flex w-full max-w-7xl flex-col gap-7 px-6 py-8">
            <section class="overflow-hidden rounded-3xl border border-border bg-card shadow-sm">
                <div class="grid gap-8 p-7 lg:grid-cols-[1.25fr_0.75fr] lg:p-10">
                    <div>
                        <div class="inline-flex items-center gap-2 rounded-full border border-violet-200 bg-violet-50 px-3 py-1 text-xs font-semibold text-violet-700 dark:border-violet-900 dark:bg-violet-950/40 dark:text-violet-300">
                            <IconSparkles class="size-4" />
                            Organized AI OS
                        </div>
                        <h1 class="mt-5 max-w-4xl text-4xl font-bold tracking-tight sm:text-5xl">
                            Discover the opportunity. Build the product. Market it. Measure the profit.
                        </h1>
                        <p class="mt-5 max-w-3xl text-base leading-7 text-muted-foreground">
                            One connected operating system for research, content, publishing, commerce, analytics and supervised AI agents. Every result feeds the next decision instead of disappearing into another disconnected tool.
                        </p>
                        <div class="mt-7 flex flex-wrap gap-3">
                            <Link href="/competitors" class="inline-flex items-center gap-2 rounded-xl bg-violet-600 px-5 py-3 text-sm font-semibold text-white hover:bg-violet-700">
                                Start with BuzzMiner
                                <IconArrowRight class="size-4" />
                            </Link>
                            <Link href="/content-studio" class="inline-flex items-center gap-2 rounded-xl border border-border bg-background px-5 py-3 text-sm font-semibold hover:bg-muted">
                                Open Content Studio
                            </Link>
                        </div>
                    </div>

                    <div class="rounded-3xl border border-border bg-muted/35 p-6">
                        <p class="text-xs font-semibold uppercase tracking-[0.2em] text-violet-600">Core operating loop</p>
                        <div class="mt-5 grid gap-3 text-sm">
                            <div v-for="(step, index) in ['Research', 'Opportunity', 'Content', 'Publishing', 'Traffic', 'Revenue', 'Analytics']" :key="step" class="flex items-center gap-3 rounded-2xl border border-border bg-card px-4 py-3">
                                <span class="grid size-8 place-items-center rounded-full bg-violet-100 text-xs font-bold text-violet-700 dark:bg-violet-950 dark:text-violet-300">{{ index + 1 }}</span>
                                <span class="font-semibold">{{ step }}</span>
                                <IconArrowRight v-if="index < 6" class="ml-auto size-4 text-muted-foreground" />
                                <IconChecks v-else class="ml-auto size-4 text-emerald-600" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="mb-5 flex flex-wrap items-end justify-between gap-3">
                    <div>
                        <p class="text-sm font-semibold text-violet-600">Platform architecture</p>
                        <h2 class="mt-1 text-2xl font-bold tracking-tight">Eight connected modules, one shared business brain</h2>
                    </div>
                    <div class="inline-flex items-center gap-2 rounded-xl border border-border bg-card px-3 py-2 text-xs text-muted-foreground">
                        <IconDeviceDesktopAnalytics class="size-4" />
                        Live foundation, staged feature rollout
                    </div>
                </div>

                <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-4">
                    <article v-for="module in modules" :key="module.name" class="group flex min-h-80 flex-col rounded-3xl border border-border bg-card p-6 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                        <div class="flex items-start justify-between gap-3">
                            <div class="grid size-11 place-items-center rounded-2xl bg-violet-100 text-violet-700 dark:bg-violet-950 dark:text-violet-300">
                                <component :is="module.icon" class="size-6" />
                            </div>
                            <span class="rounded-full bg-muted px-2.5 py-1 text-[11px] font-semibold text-muted-foreground">{{ module.status }}</span>
                        </div>
                        <p class="mt-5 text-xs font-semibold uppercase tracking-[0.16em] text-violet-600">{{ module.eyebrow }}</p>
                        <h3 class="mt-2 text-xl font-bold">{{ module.name }}</h3>
                        <p class="mt-3 text-sm leading-6 text-muted-foreground">{{ module.description }}</p>
                        <ul class="mt-5 grid gap-2 text-sm">
                            <li v-for="feature in module.features" :key="feature" class="flex items-center gap-2">
                                <span class="size-1.5 rounded-full bg-violet-500" />
                                {{ feature }}
                            </li>
                        </ul>
                        <Link :href="module.href" class="mt-auto inline-flex items-center gap-2 pt-6 text-sm font-semibold text-violet-600 group-hover:text-violet-700">
                            Open module
                            <IconArrowRight class="size-4" />
                        </Link>
                    </article>
                </div>
            </section>

            <section class="rounded-3xl border border-border bg-card p-7 shadow-sm">
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <div>
                        <p class="text-sm font-semibold text-violet-600">Build sequence</p>
                        <h2 class="mt-1 text-2xl font-bold tracking-tight">From working foundation to closed revenue loop</h2>
                    </div>
                    <div class="rounded-xl bg-emerald-100 px-3 py-2 text-xs font-semibold text-emerald-800 dark:bg-emerald-950/40 dark:text-emerald-300">Phase 1 started</div>
                </div>

                <div class="mt-6 grid gap-4 lg:grid-cols-5">
                    <div v-for="phase in buildPlan" :key="phase.phase" class="rounded-2xl border border-border bg-muted/25 p-5">
                        <p class="text-xs font-bold text-violet-600">PHASE {{ phase.phase }}</p>
                        <h3 class="mt-2 font-bold">{{ phase.title }}</h3>
                        <ul class="mt-4 grid gap-2 text-xs leading-5 text-muted-foreground">
                            <li v-for="item in phase.items" :key="item">• {{ item }}</li>
                        </ul>
                    </div>
                </div>
            </section>

            <section class="grid gap-5 lg:grid-cols-3">
                <div class="rounded-3xl border border-border bg-card p-6 shadow-sm lg:col-span-2">
                    <p class="text-sm font-semibold text-violet-600">What we are building first</p>
                    <h2 class="mt-1 text-xl font-bold">BuzzMiner Research Workspace</h2>
                    <p class="mt-3 text-sm leading-6 text-muted-foreground">
                        The first production slice will capture research, competitors, reviews, keywords and opportunities in one workspace. That gives Everpost verified context to create stronger campaigns later.
                    </p>
                    <div class="mt-5 grid gap-3 sm:grid-cols-2">
                        <div v-for="item in ['Saved research projects', 'Competitor records', 'Review intelligence', 'Opportunity scoring', 'Source and date tracking', 'One-click campaign handoff']" :key="item" class="rounded-xl border border-border bg-muted/30 p-3 text-sm font-medium">{{ item }}</div>
                    </div>
                </div>

                <div class="rounded-3xl border border-violet-200 bg-violet-50 p-6 dark:border-violet-900 dark:bg-violet-950/30">
                    <IconSparkles class="size-7 text-violet-600" />
                    <h2 class="mt-4 text-xl font-bold">Build principle</h2>
                    <p class="mt-3 text-sm leading-6 text-muted-foreground">No blind autopilot. AI researches, drafts and prepares. The user approves consequential actions before publishing, spending or contacting anyone.</p>
                </div>
            </section>
        </div>
    </AppLayout>
</template>
