<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        \App\Models\StoryItem::insert([
            ['id' => Str::ulid(), 'story_id' => '01J857FX8SP3F0Z3PGK31WFB0C', 'source_url' => 'https://cdn.inappstory.ru/file/dd/yj/sx/oqx9feuljibke3mknab7ilb35t.webp?k=IgAAAAAAAAAE'],
            ['id' => Str::ulid(), 'story_id' => '01J857FX8SP3F0Z3PGK31WFB0D', 'source_url' => 'https://cdn.inappstory.ru/file/jv/sb/fh/io7c5zarojdm7eus0trn7czdet.webp?k=IgAAAAAAAAAE'],
            ['id' => Str::ulid(), 'story_id' => '01J857FX8SP3F0Z3PGK31WFB0C', 'source_url' => 'https://cdn.inappstory.ru/file/ts/p9/vq/zktyxdxnjqbzufonxd8ffk44cb.webp?k=IgAAAAAAAAAE'],
            ['id' => Str::ulid(), 'story_id' => '01J857FX8SP3F0Z3PGK31WFB0E', 'source_url' => 'https://cdn.inappstory.ru/file/ur/uq/le/9ufzwtpdjeekidqq04alfnxvu2.webp?k=IgAAAAAAAAAE'],
            ['id' => Str::ulid(), 'story_id' => '01J857FX8SP3F0Z3PGK31WFB0G', 'source_url' => 'https://cdn.inappstory.ru/file/sy/vl/c7/uyqzmdojadcbw7o0a35ojxlcul.webp?k=IgAAAAAAAAAE'],
        ]);
    }
}
