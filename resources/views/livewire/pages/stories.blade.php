<?php

use function Livewire\Volt\{state, mount};
use function Livewire\Volt\layout;

use App\Models\Story;
use App\Models\StoryItem;

layout('components.layouts.app');

state(['stories']);

mount(function (Story $story) {
    $data = StoryItem::whereBelongsTo($story)->get();
    $this->stories = $data;
});

?>

<x-container class="my-10 pb-5 md:pb-0 flex items-center justify-center">
    <div x-data="storyPlayer()" x-init="$nextTick(() => { init() })"
        class="relative w-full max-w-md h-[800px] m-auto bg-black rounded-lg overflow-hidden">
        {{-- Story Content --}}
        <div x-html="currentStoryContent" class="w-full h-full"></div>

        {{-- Progress Bar --}}
        <div class="absolute top-0 left-0 right-0 flex space-x-1 p-2">
            <template x-for="(_, i) in stories" :key="i">
                <div class="flex-1 h-1 bg-gray-300 rounded-full overflow-hidden">
                    <div class="h-full bg-white transition-all duration-100 ease-linear"
                        :style="{ width: `${i < currentIndex ? '100%' : (i === currentIndex ? `${progress}%` : '0%')}` }">
                    </div>
                </div>
            </template>
        </div>

        {{-- Navigation Controls --}}
        <div class="absolute inset-y-0 left-0 w-1/3" @click="prevStory"></div>
        <div class="absolute inset-y-0 right-0 w-1/3" @click="nextStory"></div>
    </div>
</x-container>

@script
<script>
    Alpine.data('storyPlayer', () => ({
        currentIndex: 0,
        stories: @json($stories),
        isPlaying: false,
        progress: 0,
        storyDuration: 5000, // 5 seconds for image stories
        timer: null,
        startTime: null,

        init() {
            if (this.stories && this.stories.length > 0) {
                this.startStoryTimer();
                
            } else {
                console.error('No stories available');
            }
        },
        
        isImage(url) {
            return url && /\.(jpg|jpeg|png|webp|avif|gif|svg)/i.test(url);
        },

        isVideo(url) {
            return url && /\.(mp4|webm|ogg)/i.test(url);
        },

        startStoryTimer() {
            clearTimeout(this.timer);
            this.startTime = Date.now();
            if (this.isImage(this.currentStory.source_url)) {
                this.timer = setTimeout(() => this.nextStory(), this.storyDuration);
            }
        },

        playVideo() {
            const video = document.querySelector('video');
            if (video) {
                video.play();
                this.isPlaying = true;
            }
        },

        updateProgress() {
            const video = document.querySelector('video');
            if (video) {
                this.progress = (video.currentTime / video.duration) * 100;
            } else {
                this.progress = (Date.now() - this.startTime) / this.storyDuration * 100;
            }
        },

        nextStory() {
            clearTimeout(this.timer);
            if (this.currentIndex < this.stories.length - 1) {
                this.currentIndex++;
                this.startStoryTimer();
            } else {
                this.closeStories();
            }
            this.progress = 0;
            this.isPlaying = false;
        },

        prevStory() {
            clearTimeout(this.timer);
            if (this.currentIndex > 0) {
                this.currentIndex--;
                this.startStoryTimer();
            }
            this.progress = 0;
            this.isPlaying = false;
        },

        closeStories() {
            // Implement close functionality (e.g., emit an event, change route, etc.)
            window.location.href = '/'
            console.log('Stories closed');
        },

        get currentStory() {
            return this.stories[this.currentIndex] || {};
        },

        get currentStoryContent() {
            const story = this.currentStory;
            if (!story.source_url) return '';
            
            if (this.isImage(story.source_url)) { 
                return `
                    <img src="${story.source_url}" alt="Story Image" class="w-full h-full object-cover">
                    <div class="absolute inset-x-0 bottom-0 p-4 bg-gradient-to-t from-black/60 to-transparent">
                        <p class="text-white text-sm">${story.caption || ''}</p>
                    </div>
                `;
            } else if (this.isVideo(story.source_url)) {
                return `
                    <div class="relative w-full h-full">
                        <video src="${story.source_url}" class="w-full h-full object-cover" @ended="nextStory" @timeupdate="updateProgress"></video>
                        <div x-show="!isPlaying" @click="playVideo" class="absolute inset-0 flex items-center justify-center cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="absolute inset-x-0 bottom-0 p-4 bg-gradient-to-t from-black/60 to-transparent">
                            <p class="text-white text-sm">${story.caption || ''}</p>
                        </div>
                    </div>
                `;
            }

            return '';
        }
    }));
</script>
@endscript