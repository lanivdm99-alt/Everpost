<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';

interface PlatformTiming {
    name: string;
    bestTimes: string[];
}

const props = defineProps<{ platforms: PlatformTiming[] }>();

const goal = ref('Grow engagement');
const topic = ref('');
const tone = ref('Confident');
const selectedPlatforms = ref(['Instagram', 'Facebook', 'LinkedIn']);

const generatedPreview = computed(() => {
    const subject = topic.value.trim() || 'your next campaign';
    return `A strong ${tone.value.toLowerCase()} campaign about ${subject}, adapted for ${selectedPlatforms.value.join(', ')}.`;
});

const togglePlatform = (platform: string) => {
    selectedPlatforms.value = selectedPlatforms.value.includes(platform)
        ? selectedPlatforms.value.filter((item) => item !== platform)
        : [...selectedPlatforms.value, platform];
};
</script>

<template>
    <AppLayout>
        <Head title="Everpost AI Content Studio" />

        <div class="mx-auto flex w-full max-w-7xl flex-col gap-8 px-6 py-8">
            <section class="overflow-hidden rounded-3xl border border-border bg-gradient-to-br from-violet-950 via-slate-950 to-slate-900 p-8 text-white shadow-xl">
                <div class="max-w-3xl">
                    <p class="mb-3 text-sm font-semibold uppercase tracking-[0.24em] text-violet-300">Everpost</p>
                    <h1 class="text-4xl font-bold tracking-tight sm:text-5xl">Create once. Publish everywhere.</h1>
                    <p class="mt-4 max-w-2xl text-base leading-7 text-slate-300">
                        Your AI content team for ideas, captions, campaigns, repurposing, scheduling and performance improvement.
                    </p>
                    <div class="mt-6 flex flex-wrap gap-3">
                        <Link href="/posts/create" class="rounded-xl bg-white px-5 py-3 text-sm font-semibold text-slate-950 transition hover:bg-violet-100">
                            Create a post
                        </Link>
                        <Link href="/calendar" class="rounded-xl border border-white/20 px-5 py-3 text-sm font-semibold text-white transition hover:bg-white/10">
                            Open calendar
                        </Link>
                    </div>
                </div>
            </section>

            <section class="grid gap-6 lg:grid-cols-[1.15fr_0.85fr]">
                <div class="rounded-3xl border border-border bg-card p-6 shadow-sm">
                    <div class="mb-6">
                        <p class="text-sm font-medium text-violet-600">AI Campaign Builder</p>
                        <h2 class="mt-1 text-2xl font-semibold">Turn one idea into a complete campaign</h2>
                    </div>

                    <div class="grid gap-5">
                        <label class="grid gap-2">
                            <span class="text-sm font-medium">What are you promoting?</span>
                            <textarea v-model="topic" rows="4" placeholder="Describe your product, offer, announcement or content idea..." class="rounded-2xl border border-input bg-background px-4 py-3 text-sm outline-none ring-offset-background transition focus:ring-2 focus:ring-violet-500" />
                        </label>

                        <div class="grid gap-4 sm:grid-cols-2">
                            <label class="grid gap-2">
                                <span class="text-sm font-medium">Goal</span>
                                <select v-model="goal" class="rounded-xl border border-input bg-background px-3 py-3 text-sm">
                                    <option>Grow engagement</option>
                                    <option>Generate leads</option>
                                    <option>Drive sales</option>
                                    <option>Build authority</option>
                                    <option>Grow followers</option>
                                </select>
                            </label>
                            <label class="grid gap-2">
                                <span class="text-sm font-medium">Tone</span>
                                <select v-model="tone" class="rounded-xl border border-input bg-background px-3 py-3 text-sm">
                                    <option>Confident</option>
                                    <option>Friendly</option>
                                    <option>Professional</option>
                                    <option>Playful</option>
                                    <option>Luxury</option>
                                </select>
                            </label>
                        </div>

                        <div>
                            <span class="text-sm font-medium">Platforms</span>
                            <div class="mt-3 flex flex-wrap gap-2">
                                <button v-for="platform in platforms" :key="platform.name" type="button" @click="togglePlatform(platform.name)" class="rounded-full border px-4 py-2 text-sm font-medium transition" :class="selectedPlatforms.includes(platform.name) ? 'border-violet-600 bg-violet-600 text-white' : 'border-border bg-background hover:border-violet-400'">
                                    {{ platform.name }}
                                </button>
                            </div>
                        </div>

                        <div class="rounded-2xl border border-violet-200 bg-violet-50 p-5 text-slate-900 dark:border-violet-900 dark:bg-violet-950/30 dark:text-slate-100">
                            <p class="text-xs font-semibold uppercase tracking-wider text-violet-600">Campaign preview</p>
                            <p class="mt-2 text-sm leading-6">{{ generatedPreview }}</p>
                            <p class="mt-3 text-xs text-muted-foreground">Goal: {{ goal }} · Includes hooks, captions, hashtags, visual direction and posting schedule.</p>
                        </div>

                        <Link href="/posts/create" class="inline-flex justify-center rounded-xl bg-violet-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-violet-700">
                            Generate campaign
                        </Link>
                    </div>
                </div>

                <div class="grid gap-6">
                    <div class="rounded-3xl border border-border bg-card p-6 shadow-sm">
                        <p class="text-sm font-medium text-violet-600">Content tools</p>
                        <div class="mt-4 grid gap-3 sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2">
                            <Link v-for="tool in ['Caption Writer', 'Hook Generator', 'Carousel Builder', 'Content Repurposer', 'Hashtag Assistant', 'Video Script Writer']" :key="tool" href="/posts/create" class="rounded-2xl border border-border p-4 text-sm font-semibold transition hover:-translate-y-0.5 hover:border-violet-400 hover:shadow-md">
                                {{ tool }}
                            </Link>
                        </div>
                    </div>

                    <div class="rounded-3xl border border-border bg-card p-6 shadow-sm">
                        <p class="text-sm font-medium text-violet-600">This week</p>
                        <div class="mt-4 grid grid-cols-3 gap-3 text-center">
                            <div class="rounded-2xl bg-muted p-4"><p class="text-2xl font-bold">0</p><p class="text-xs text-muted-foreground">Drafts</p></div>
                            <div class="rounded-2xl bg-muted p-4"><p class="text-2xl font-bold">0</p><p class="text-xs text-muted-foreground">Scheduled</p></div>
                            <div class="rounded-2xl bg-muted p-4"><p class="text-2xl font-bold">0</p><p class="text-xs text-muted-foreground">Published</p></div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="rounded-3xl border border-border bg-card p-6 shadow-sm">
                <div class="mb-5 flex flex-wrap items-end justify-between gap-3">
                    <div>
                        <p class="text-sm font-medium text-violet-600">Peak Post Planner</p>
                        <h2 class="mt-1 text-2xl font-semibold">Best times to post</h2>
                    </div>
                    <p class="text-sm text-muted-foreground">Starter recommendations shown in South African time.</p>
                </div>
                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    <article v-for="platform in platforms" :key="platform.name" class="rounded-2xl border border-border p-5">
                        <h3 class="font-semibold">{{ platform.name }}</h3>
                        <ul class="mt-3 space-y-2 text-sm text-muted-foreground">
                            <li v-for="time in platform.bestTimes" :key="time" class="rounded-lg bg-muted px-3 py-2">{{ time }}</li>
                        </ul>
                    </article>
                </div>
            </section>
        </div>
    </AppLayout>
</template>
