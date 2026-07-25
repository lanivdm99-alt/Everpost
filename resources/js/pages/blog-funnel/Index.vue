<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';

const topic = ref('');
const selectedGoal = ref('Sell a digital product');
const connectedInbox = ref(false);
const inboxFilter = ref('Priority');

const funnelSteps = [
    { title: 'Pinterest Discovery', description: 'Generate keyword-led pins, boards, titles and descriptions.' },
    { title: 'Blog Content', description: 'Create pillar articles, supporting posts and internal links.' },
    { title: 'Lead Capture', description: 'Offer a checklist, template, quiz or mini guide in exchange for email.' },
    { title: 'Email Nurture', description: 'Send a welcome sequence, educational emails and relevant offers.' },
    { title: 'Conversion', description: 'Move subscribers to the correct product, booking or sales page.' },
    { title: 'Learning Loop', description: 'Track the pin, article, email and offer that produced the result.' },
];

const preview = computed(() => topic.value.trim() || 'Your next product or campaign');

const sampleMessages = [
    { sender: 'New subscriber', subject: 'Downloaded your morning routine checklist', label: 'Lead', priority: 'High' },
    { sender: 'Potential customer', subject: 'Question about the printable bundle', label: 'Sales', priority: 'High' },
    { sender: 'Pinterest update', subject: 'Three pins are gaining saves', label: 'Performance', priority: 'Medium' },
    { sender: 'Everpost AI', subject: 'Draft follow-up ready for review', label: 'Draft ready', priority: 'Medium' },
];
</script>

<template>
    <AppLayout>
        <Head title="Pinterest Blog Funnel" />

        <div class="mx-auto flex w-full max-w-7xl flex-col gap-8 px-6 py-8">
            <section class="overflow-hidden rounded-3xl border border-border bg-gradient-to-br from-rose-950 via-slate-950 to-indigo-950 p-8 text-white shadow-xl">
                <div class="max-w-4xl">
                    <p class="text-sm font-semibold uppercase tracking-[0.24em] text-rose-300">Everpost Growth Engine</p>
                    <h1 class="mt-3 text-4xl font-bold tracking-tight sm:text-5xl">Pinterest traffic. Blog trust. Email sales.</h1>
                    <p class="mt-4 max-w-3xl text-base leading-7 text-slate-300">
                        Build the full journey from discovery to conversion, then manage every lead, reply and follow-up from one AI-native inbox.
                    </p>
                </div>
            </section>

            <section class="grid gap-6 lg:grid-cols-[1.15fr_0.85fr]">
                <div class="rounded-3xl border border-border bg-card p-6 shadow-sm">
                    <p class="text-sm font-medium text-rose-600">One-click funnel builder</p>
                    <h2 class="mt-1 text-2xl font-semibold">Create the complete campaign</h2>

                    <div class="mt-6 grid gap-5">
                        <label class="grid gap-2">
                            <span class="text-sm font-medium">Product, offer or topic</span>
                            <textarea v-model="topic" rows="4" placeholder="Example: ADHD mom morning routine kit" class="rounded-2xl border border-input bg-background px-4 py-3 text-sm outline-none focus:ring-2 focus:ring-rose-500" />
                        </label>

                        <label class="grid gap-2">
                            <span class="text-sm font-medium">Primary goal</span>
                            <select v-model="selectedGoal" class="rounded-xl border border-input bg-background px-3 py-3 text-sm">
                                <option>Sell a digital product</option>
                                <option>Grow an email list</option>
                                <option>Generate qualified leads</option>
                                <option>Book consultations</option>
                                <option>Grow blog traffic</option>
                            </select>
                        </label>

                        <div class="rounded-2xl border border-rose-200 bg-rose-50 p-5 text-slate-900 dark:border-rose-900 dark:bg-rose-950/30 dark:text-slate-100">
                            <p class="text-xs font-semibold uppercase tracking-wider text-rose-600">Campaign preview</p>
                            <p class="mt-2 font-semibold">{{ preview }}</p>
                            <p class="mt-2 text-sm text-muted-foreground">Everpost will prepare a keyword cluster, pillar article, supporting posts, lead magnet, landing page, email sequence, Pinterest creatives and tracking plan.</p>
                        </div>

                        <button type="button" class="rounded-xl bg-rose-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-rose-700">
                            Build complete funnel
                        </button>
                    </div>
                </div>

                <div class="rounded-3xl border border-border bg-card p-6 shadow-sm">
                    <p class="text-sm font-medium text-indigo-600">Funnel output</p>
                    <div class="mt-4 grid gap-3">
                        <div v-for="item in ['1 pillar blog article', '3 supporting articles', '20 Pinterest pin concepts', '1 lead magnet', '1 landing page', '5-email nurture sequence', '30-day publishing plan', 'End-to-end attribution']" :key="item" class="rounded-2xl border border-border px-4 py-3 text-sm font-medium">
                            {{ item }}
                        </div>
                    </div>
                </div>
            </section>

            <section class="rounded-3xl border border-border bg-card p-6 shadow-sm">
                <div class="mb-6">
                    <p class="text-sm font-medium text-rose-600">Funnel map</p>
                    <h2 class="mt-1 text-2xl font-semibold">From pin to purchase</h2>
                </div>
                <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                    <article v-for="(step, index) in funnelSteps" :key="step.title" class="rounded-2xl border border-border p-5">
                        <div class="flex h-9 w-9 items-center justify-center rounded-full bg-rose-100 text-sm font-bold text-rose-700 dark:bg-rose-950 dark:text-rose-300">{{ index + 1 }}</div>
                        <h3 class="mt-4 font-semibold">{{ step.title }}</h3>
                        <p class="mt-2 text-sm leading-6 text-muted-foreground">{{ step.description }}</p>
                    </article>
                </div>
            </section>

            <section class="grid gap-6 lg:grid-cols-[0.75fr_1.25fr]">
                <div class="rounded-3xl border border-border bg-card p-6 shadow-sm">
                    <p class="text-sm font-medium text-indigo-600">AI-native inbox</p>
                    <h2 class="mt-1 text-2xl font-semibold">Your funnel replies, under control</h2>
                    <p class="mt-3 text-sm leading-6 text-muted-foreground">Connect Gmail or Outlook to categorize leads, prioritize conversations, draft replies in your voice and surface follow-ups automatically.</p>

                    <div class="mt-5 grid gap-3">
                        <div v-for="feature in ['Auto labels and split inboxes', 'Priority and sales-intent detection', 'AI replies in your brand voice', 'Automatic follow-up reminders', 'Ask across inbox and campaign data', 'Calendar-aware scheduling replies']" :key="feature" class="rounded-2xl bg-muted px-4 py-3 text-sm font-medium">
                            {{ feature }}
                        </div>
                    </div>

                    <button type="button" @click="connectedInbox = !connectedInbox" class="mt-5 w-full rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-indigo-700">
                        {{ connectedInbox ? 'Inbox connection ready' : 'Connect Gmail or Outlook' }}
                    </button>
                </div>

                <div class="rounded-3xl border border-border bg-card p-6 shadow-sm">
                    <div class="flex flex-wrap items-center justify-between gap-3">
                        <div>
                            <p class="text-sm font-medium text-indigo-600">Unified funnel inbox</p>
                            <h2 class="mt-1 text-2xl font-semibold">Review what matters first</h2>
                        </div>
                        <select v-model="inboxFilter" class="rounded-xl border border-input bg-background px-3 py-2 text-sm">
                            <option>Priority</option>
                            <option>Sales</option>
                            <option>Leads</option>
                            <option>Draft ready</option>
                            <option>Performance</option>
                        </select>
                    </div>

                    <div class="mt-5 grid gap-3">
                        <article v-for="message in sampleMessages" :key="message.subject" class="flex flex-wrap items-center justify-between gap-4 rounded-2xl border border-border p-4">
                            <div>
                                <p class="text-xs font-medium text-muted-foreground">{{ message.sender }}</p>
                                <h3 class="mt-1 font-semibold">{{ message.subject }}</h3>
                                <div class="mt-2 flex gap-2 text-xs">
                                    <span class="rounded-full bg-muted px-2.5 py-1">{{ message.label }}</span>
                                    <span class="rounded-full bg-muted px-2.5 py-1">{{ message.priority }}</span>
                                </div>
                            </div>
                            <button type="button" class="rounded-xl border border-border px-4 py-2 text-sm font-semibold hover:border-indigo-400">Review draft</button>
                        </article>
                    </div>
                </div>
            </section>

            <section class="rounded-3xl border border-border bg-card p-6 shadow-sm">
                <p class="text-sm font-medium text-emerald-600">End-to-end measurement</p>
                <h2 class="mt-1 text-2xl font-semibold">Know exactly what produced the sale</h2>
                <div class="mt-5 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    <div v-for="metric in [{ label: 'Pinterest clicks', value: '0' }, { label: 'Blog opt-ins', value: '0' }, { label: 'Email replies', value: '0' }, { label: 'Conversions', value: '0' }]" :key="metric.label" class="rounded-2xl bg-muted p-5">
                        <p class="text-3xl font-bold">{{ metric.value }}</p>
                        <p class="mt-1 text-sm text-muted-foreground">{{ metric.label }}</p>
                    </div>
                </div>
            </section>
        </div>
    </AppLayout>
</template>
