<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';

const routes = ['Original', 'Repurpose', 'Rewrite', 'Research + Ideate'];
const lifecycle = ['Captured', 'Idea review', 'Brief ready', 'Drafting', 'Verification', 'Draft review', 'Approved', 'Scheduler ready', 'Scheduled', 'Published', '24h feedback', '72h feedback', 'Learned'];
const rubric = [
    'Saves the reader a future task',
    'Includes proof',
    'Gives a reusable takeaway',
    'Has a specific audience and job-to-be-done',
    'Works without the creator present',
    'Has a strong visual or screenshot',
];

const route = ref('Original');
const state = ref('Captured');
const title = ref('');
const thesis = ref('');
const reader = ref('');
const proof = ref('');
const angle = ref('');
const constraints = ref('');
const voiceAnchors = ref('');
const risks = ref('');
const openLoops = ref('');
const scores = ref<Record<string, number>>(Object.fromEntries(rubric.map((item) => [item, 0])));

const total = computed(() => Object.values(scores.value).reduce((sum, value) => sum + Number(value), 0));
const verdict = computed(() => total.value >= 8 ? 'Ready for review' : 'Fix the weakest row and re-score');
</script>

<template>
    <AppLayout>
        <Head title="Everpost Content OS" />
        <div class="mx-auto flex w-full max-w-7xl flex-col gap-7 px-6 py-8">
            <section class="rounded-3xl border border-border bg-card p-7 shadow-sm">
                <div class="flex flex-wrap items-start justify-between gap-4">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-violet-600">Everpost Content OS</p>
                        <h1 class="mt-2 text-3xl font-bold tracking-tight">Every content idea becomes a managed content object</h1>
                        <p class="mt-3 max-w-3xl text-sm leading-6 text-muted-foreground">Move each idea through strategy, briefing, drafting, verification, approval, scheduling and feedback. AI accelerates the work, but nothing publishes unedited.</p>
                    </div>
                    <Link href="/content-studio" class="rounded-xl bg-violet-600 px-4 py-3 text-sm font-semibold text-white hover:bg-violet-700">Back to Content Studio</Link>
                </div>
            </section>

            <section class="rounded-3xl border border-border bg-card p-6 shadow-sm">
                <div class="mb-4 flex flex-wrap items-center justify-between gap-3">
                    <h2 class="text-xl font-semibold">Content lifecycle</h2>
                    <select v-model="state" class="rounded-xl border border-input bg-background px-3 py-2 text-sm">
                        <option v-for="item in lifecycle" :key="item">{{ item }}</option>
                    </select>
                </div>
                <div class="flex gap-2 overflow-x-auto pb-2">
                    <div v-for="item in lifecycle" :key="item" class="min-w-32 rounded-xl border px-3 py-3 text-center text-xs font-medium" :class="item === state ? 'border-violet-600 bg-violet-600 text-white' : 'border-border bg-muted/40 text-muted-foreground'">{{ item }}</div>
                </div>
            </section>

            <section class="grid gap-6 lg:grid-cols-[1fr_0.8fr]">
                <div class="rounded-3xl border border-border bg-card p-6 shadow-sm">
                    <h2 class="text-xl font-semibold">Writer context packet</h2>
                    <p class="mt-1 text-sm text-muted-foreground">Only pass the writer the context this specific post needs.</p>
                    <div class="mt-5 grid gap-4">
                        <label class="grid gap-2"><span class="text-sm font-medium">Content title</span><input v-model="title" class="rounded-xl border border-input bg-background px-3 py-3 text-sm" placeholder="Working title" /></label>
                        <div class="grid gap-4 sm:grid-cols-2">
                            <label class="grid gap-2"><span class="text-sm font-medium">Route</span><select v-model="route" class="rounded-xl border border-input bg-background px-3 py-3 text-sm"><option v-for="item in routes" :key="item">{{ item }}</option></select></label>
                            <label class="grid gap-2"><span class="text-sm font-medium">Current state</span><input :value="state" disabled class="rounded-xl border border-input bg-muted px-3 py-3 text-sm" /></label>
                        </div>
                        <label class="grid gap-2"><span class="text-sm font-medium">Thesis</span><textarea v-model="thesis" rows="2" class="rounded-xl border border-input bg-background px-3 py-3 text-sm" placeholder="One sentence the post must prove" /></label>
                        <label class="grid gap-2"><span class="text-sm font-medium">Reader</span><textarea v-model="reader" rows="2" class="rounded-xl border border-input bg-background px-3 py-3 text-sm" placeholder="The specific person who should save it" /></label>
                        <label class="grid gap-2"><span class="text-sm font-medium">Proof</span><textarea v-model="proof" rows="3" class="rounded-xl border border-input bg-background px-3 py-3 text-sm" placeholder="Numbers, screenshots, stories and named examples allowed" /></label>
                        <label class="grid gap-2"><span class="text-sm font-medium">Angle</span><textarea v-model="angle" rows="2" class="rounded-xl border border-input bg-background px-3 py-3 text-sm" placeholder="Unexpected framing" /></label>
                        <label class="grid gap-2"><span class="text-sm font-medium">Constraints</span><textarea v-model="constraints" rows="2" class="rounded-xl border border-input bg-background px-3 py-3 text-sm" placeholder="Format, length, tone and banned phrases" /></label>
                        <label class="grid gap-2"><span class="text-sm font-medium">Voice anchors</span><textarea v-model="voiceAnchors" rows="3" class="rounded-xl border border-input bg-background px-3 py-3 text-sm" placeholder="Two or three lines that sound exactly like the creator" /></label>
                        <label class="grid gap-2"><span class="text-sm font-medium">Risks</span><textarea v-model="risks" rows="2" class="rounded-xl border border-input bg-background px-3 py-3 text-sm" placeholder="What would make this sound generic, fake or cringe" /></label>
                        <label class="grid gap-2"><span class="text-sm font-medium">Open loops</span><textarea v-model="openLoops" rows="2" class="rounded-xl border border-input bg-background px-3 py-3 text-sm" placeholder="Unknowns the writer must flag" /></label>
                    </div>
                </div>

                <div class="grid content-start gap-6">
                    <div class="rounded-3xl border border-border bg-card p-6 shadow-sm">
                        <div class="flex items-center justify-between gap-3">
                            <div><p class="text-sm font-medium text-violet-600">Bookmarkability gate</p><h2 class="mt-1 text-xl font-semibold">Score before scheduling</h2></div>
                            <div class="rounded-2xl bg-violet-600 px-4 py-3 text-center text-white"><p class="text-2xl font-bold">{{ total }}/12</p></div>
                        </div>
                        <div class="mt-5 grid gap-3">
                            <label v-for="item in rubric" :key="item" class="grid grid-cols-[1fr_auto] items-center gap-3 rounded-xl border border-border p-3 text-sm">
                                <span>{{ item }}</span>
                                <select v-model.number="scores[item]" class="rounded-lg border border-input bg-background px-2 py-1"><option :value="0">0</option><option :value="1">1</option><option :value="2">2</option></select>
                            </label>
                        </div>
                        <div class="mt-4 rounded-xl p-4 text-sm font-medium" :class="total >= 8 ? 'bg-emerald-100 text-emerald-900 dark:bg-emerald-950/40 dark:text-emerald-200' : 'bg-amber-100 text-amber-900 dark:bg-amber-950/40 dark:text-amber-200'">{{ verdict }}</div>
                    </div>

                    <div class="rounded-3xl border border-border bg-card p-6 shadow-sm">
                        <p class="text-sm font-medium text-violet-600">Approval rule</p>
                        <h2 class="mt-1 text-xl font-semibold">Human-finished, never blind autopilot</h2>
                        <ul class="mt-4 space-y-3 text-sm text-muted-foreground">
                            <li class="rounded-xl bg-muted p-3">AI creates the brief and draft package.</li>
                            <li class="rounded-xl bg-muted p-3">Verifier checks proof, voice, banned patterns and platform rules.</li>
                            <li class="rounded-xl bg-muted p-3">A person approves or sends back one specific correction.</li>
                            <li class="rounded-xl bg-muted p-3">24-hour and 72-hour results write lessons back into the system.</li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
    </AppLayout>
</template>
