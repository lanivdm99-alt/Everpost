<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';

const platforms = ['Instagram', 'Facebook', 'X', 'YouTube', 'Twitch'];
const selectedPlatform = ref('Instagram');
const search = ref('');
const period = ref('Last 30 days');

const competitors = ref([
    { name: 'Bright Studio', handle: '@brightstudio', followers: 84200, growth: 8.4, engagement: 5.8, posts: 28, reach: 412000, score: 91 },
    { name: 'Social Spark', handle: '@socialspark', followers: 67100, growth: 5.1, engagement: 4.7, posts: 35, reach: 338000, score: 82 },
    { name: 'Daily Creator', handle: '@dailycreator', followers: 128400, growth: 2.7, engagement: 3.9, posts: 19, reach: 295000, score: 74 },
]);

const filteredCompetitors = computed(() =>
    competitors.value.filter((item) =>
        `${item.name} ${item.handle}`.toLowerCase().includes(search.value.toLowerCase()),
    ),
);

const formatNumber = (value: number) => new Intl.NumberFormat('en-US', { notation: 'compact', maximumFractionDigits: 1 }).format(value);
</script>

<template>
    <AppLayout>
        <Head title="Competitor Intelligence" />

        <div class="mx-auto flex w-full max-w-7xl flex-col gap-7 px-6 py-8">
            <section class="rounded-3xl border border-border bg-gradient-to-br from-slate-950 via-indigo-950 to-violet-900 p-8 text-white shadow-xl">
                <div class="max-w-3xl">
                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-violet-300">Everpost Intelligence</p>
                    <h1 class="mt-3 text-4xl font-bold tracking-tight">Know what works before you post</h1>
                    <p class="mt-4 max-w-2xl text-slate-300">Analyze competitors, compare key metrics, uncover winning content patterns and spot costly mistakes before they reach your own strategy.</p>
                </div>
            </section>

            <section class="grid gap-4 md:grid-cols-4">
                <article v-for="item in [
                    ['Competitors tracked', '3', 'Up to 100 accounts'],
                    ['Average growth', '5.4%', 'Across selected accounts'],
                    ['Top engagement', '5.8%', 'Bright Studio'],
                    ['Opportunities found', '12', 'Content gaps and tactics'],
                ]" :key="item[0]" class="rounded-2xl border border-border bg-card p-5 shadow-sm">
                    <p class="text-sm text-muted-foreground">{{ item[0] }}</p>
                    <p class="mt-2 text-3xl font-bold">{{ item[1] }}</p>
                    <p class="mt-1 text-xs text-muted-foreground">{{ item[2] }}</p>
                </article>
            </section>

            <section class="rounded-3xl border border-border bg-card p-6 shadow-sm">
                <div class="flex flex-wrap items-end justify-between gap-4">
                    <div>
                        <p class="text-sm font-medium text-violet-600">Benchmark builder</p>
                        <h2 class="mt-1 text-2xl font-semibold">Compare accounts side by side</h2>
                    </div>
                    <button class="rounded-xl bg-violet-600 px-5 py-3 text-sm font-semibold text-white hover:bg-violet-700">Add competitor</button>
                </div>

                <div class="mt-6 grid gap-4 md:grid-cols-[1fr_auto_auto]">
                    <input v-model="search" placeholder="Search tracked accounts..." class="rounded-xl border border-input bg-background px-4 py-3 text-sm" />
                    <select v-model="selectedPlatform" class="rounded-xl border border-input bg-background px-4 py-3 text-sm">
                        <option v-for="platform in platforms" :key="platform">{{ platform }}</option>
                    </select>
                    <select v-model="period" class="rounded-xl border border-input bg-background px-4 py-3 text-sm">
                        <option>Last 7 days</option><option>Last 30 days</option><option>Last 90 days</option>
                    </select>
                </div>

                <div class="mt-6 overflow-x-auto">
                    <table class="w-full min-w-[900px] text-left text-sm">
                        <thead class="border-b border-border text-xs uppercase tracking-wide text-muted-foreground">
                            <tr><th class="px-3 py-3">Account</th><th class="px-3 py-3">Followers</th><th class="px-3 py-3">Growth</th><th class="px-3 py-3">Engagement</th><th class="px-3 py-3">Posts</th><th class="px-3 py-3">Reach</th><th class="px-3 py-3">Benchmark</th></tr>
                        </thead>
                        <tbody>
                            <tr v-for="competitor in filteredCompetitors" :key="competitor.handle" class="border-b border-border/70 last:border-0">
                                <td class="px-3 py-4"><p class="font-semibold">{{ competitor.name }}</p><p class="text-xs text-muted-foreground">{{ competitor.handle }}</p></td>
                                <td class="px-3 py-4">{{ formatNumber(competitor.followers) }}</td>
                                <td class="px-3 py-4 font-semibold text-emerald-600">+{{ competitor.growth }}%</td>
                                <td class="px-3 py-4">{{ competitor.engagement }}%</td>
                                <td class="px-3 py-4">{{ competitor.posts }}</td>
                                <td class="px-3 py-4">{{ formatNumber(competitor.reach) }}</td>
                                <td class="px-3 py-4"><span class="rounded-full bg-violet-100 px-3 py-1 font-semibold text-violet-700 dark:bg-violet-950 dark:text-violet-300">{{ competitor.score }}/100</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <section class="grid gap-6 lg:grid-cols-3">
                <article class="rounded-3xl border border-border bg-card p-6 shadow-sm">
                    <p class="text-sm font-medium text-emerald-600">Winning content</p>
                    <h3 class="mt-1 text-xl font-semibold">Formats gaining traction</h3>
                    <div class="mt-5 space-y-4">
                        <div class="rounded-2xl bg-muted p-4"><p class="font-semibold">Step-by-step carousels</p><p class="mt-1 text-sm text-muted-foreground">2.4× more saves than image-only posts.</p></div>
                        <div class="rounded-2xl bg-muted p-4"><p class="font-semibold">Short opinion videos</p><p class="mt-1 text-sm text-muted-foreground">Highest comment rate in this benchmark.</p></div>
                        <div class="rounded-2xl bg-muted p-4"><p class="font-semibold">Proof-led case studies</p><p class="mt-1 text-sm text-muted-foreground">Strongest reach-to-follow conversion.</p></div>
                    </div>
                </article>

                <article class="rounded-3xl border border-border bg-card p-6 shadow-sm">
                    <p class="text-sm font-medium text-violet-600">Effective strategies</p>
                    <h3 class="mt-1 text-xl font-semibold">Tactics worth adapting</h3>
                    <ul class="mt-5 space-y-3 text-sm">
                        <li class="rounded-2xl border border-border p-4"><strong>Series publishing:</strong> repeat a recognizable format weekly.</li>
                        <li class="rounded-2xl border border-border p-4"><strong>Fast follow-up:</strong> answer top comments with new posts.</li>
                        <li class="rounded-2xl border border-border p-4"><strong>Proof first:</strong> lead with a result before explaining the method.</li>
                    </ul>
                </article>

                <article class="rounded-3xl border border-border bg-card p-6 shadow-sm">
                    <p class="text-sm font-medium text-rose-600">Avoid mistakes</p>
                    <h3 class="mt-1 text-xl font-semibold">Patterns hurting performance</h3>
                    <ul class="mt-5 space-y-3 text-sm">
                        <li class="rounded-2xl bg-rose-50 p-4 dark:bg-rose-950/30"><strong>Posting spikes:</strong> long gaps followed by content bursts.</li>
                        <li class="rounded-2xl bg-rose-50 p-4 dark:bg-rose-950/30"><strong>Generic hooks:</strong> high impressions but weak saves and comments.</li>
                        <li class="rounded-2xl bg-rose-50 p-4 dark:bg-rose-950/30"><strong>Format fatigue:</strong> repeating one creative style for too long.</li>
                    </ul>
                </article>
            </section>

            <section class="rounded-3xl border border-border bg-card p-6 shadow-sm">
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <div><p class="text-sm font-medium text-violet-600">AI strategy brief</p><h2 class="mt-1 text-2xl font-semibold">Turn benchmarks into your next actions</h2></div>
                    <button class="rounded-xl border border-violet-500 px-5 py-3 text-sm font-semibold text-violet-700 hover:bg-violet-50 dark:text-violet-300 dark:hover:bg-violet-950">Generate full analysis</button>
                </div>
                <div class="mt-6 grid gap-4 md:grid-cols-2">
                    <div class="rounded-2xl bg-muted p-5"><p class="font-semibold">Opportunity</p><p class="mt-2 text-sm text-muted-foreground">Create a weekly educational carousel using proof in slide one and a reusable checklist in the final slide.</p></div>
                    <div class="rounded-2xl bg-muted p-5"><p class="font-semibold">Recommended experiment</p><p class="mt-2 text-sm text-muted-foreground">Test three hooks against one topic, then compare saves, reach and follower conversion after 72 hours.</p></div>
                </div>
            </section>
        </div>
    </AppLayout>
</template>
