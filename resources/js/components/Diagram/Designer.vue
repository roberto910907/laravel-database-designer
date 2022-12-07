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
import { ref, onMounted, defineProps } from 'vue';
import backgroundPatternImage from '@/assets/canvas-background.png';
import Entity from './Entity.vue';

const canvasProperties = {
    width: 1500,
    height: 700,
    zoom: 1,
    canvas_position_x: 0,
    canvas_position_y: 0,
    grid_background: true,
};

const backgroundImage = ref('');

const { tables } = defineProps({
    tables: Array,
});

onMounted(() => {
    const backgroundPattern = new window.Image();

    backgroundPattern.src = backgroundPatternImage;

    backgroundPattern.onload = () => {
        backgroundImage.value = backgroundPattern;
    };
});
</script>
