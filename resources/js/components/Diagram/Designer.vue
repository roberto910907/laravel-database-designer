<template>
    <v-stage
        ref="stage"
        :config="{
            width: canvasProperties.width,
            height: canvasProperties.height,
            draggable: true,
        }"
    >
        <v-layer ref="layer">
            <v-rect
                :config="{
                    width: canvasProperties.width,
                    height: canvasProperties.height,
                    fillPatternImage: backgroundImage,
                }"
                @click.prevent=""
            />

            <Entity
                v-for="(table, index) in tables"
                :key="table.name"
                :table-data="table"
                :position="{
                    x: index * 100,
                    y: index * 20,
                }"
                :width-table="224"
            />
        </v-layer>
    </v-stage>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { storeToRefs } from 'pinia';
import { useDatabaseStore } from '@/stores/database.ts';
import backgroundPatternImage from '@/assets/canvas-background.png';
import Entity from './Entity.vue';

const store = useDatabaseStore();

const { tables } = storeToRefs(store);

const canvasProperties = {
    width: 1200,
    height: 800,
    zoom: 1,
    canvas_position_x: 0,
    canvas_position_y: 0,
    grid_background: true,
};

const backgroundImage = ref('');

onMounted(() => {
    const backgroundPattern = new window.Image();

    backgroundPattern.src = backgroundPatternImage;

    backgroundPattern.onload = () => {
        backgroundImage.value = backgroundPattern;
    };
});
</script>
