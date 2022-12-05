<template>
    <v-group
        :config="{
            x: position.x,
            y: position.y,
        }"
        :draggable="true"
    >
        <v-rect
            :config="{
                x: 0,
                y: 0,
                width: widthTable,
                height: 35 + 20 * Object.keys(tableData.columns).length,
                fill: '#316896',
                strokeWidth: 0,
                shadowBlur: 2,
            }"
        />
        <v-rect
            :config="{
                x: 0,
                y: 25,
                width: widthTable,
                height: 10 + 20 * Object.keys(tableData.columns).length,
                strokeWidth: 0,
                fill: 'white',
                shadowBlur: 0,
            }"
        />
        <v-text
            :config="{
                text: tableData.name,
                x: 15,
                y: 8,
                fill: 'white',
            }"
        />
        <template
            v-for="(column, index) in tableData.columns"
            :key="column.name"
        >
            <div>
                <!--                <v-image-->
                <!--                    v-if="column.name === tableData.primaryKey"-->
                <!--                    :config="{-->
                <!--                        image: primaryKey,-->
                <!--                        width: 13,-->
                <!--                        height: 13,-->
                <!--                        x: 5,-->
                <!--                        y: 5 + 30 - 2 + index * 20,-->
                <!--                    }"-->
                <!--                />-->
                <!--                <v-image-->
                <!--                    v-else-if="column.notnull === true"-->
                <!--                    :config="{-->
                <!--                        image: imageNotNull,-->
                <!--                        width: 13,-->
                <!--                        height: 13,-->
                <!--                        x: 5,-->
                <!--                        y: 5 + 30 - 2 + index * 20,-->
                <!--                    }"-->
                <!--                />-->
                <!--                <v-image-->
                <!--                    v-else-if="column.notnull === false"-->
                <!--                    :config="{-->
                <!--                        image: imageNull,-->
                <!--                        width: 13,-->
                <!--                        height: 13,-->
                <!--                        x: 5,-->
                <!--                        y: 5 + 30 - 2 + index * 20,-->
                <!--                    }"-->
                <!--                />-->
                <v-text
                    :config="{
                        text: column.name,
                        x: 23,
                        y: 5 + 30 + index * 20,
                    }"
                />
                <v-text
                    :config="{
                        text: column.type,
                        x: 0,
                        y: 5 + 30 + index * 20,
                        width: widthTable - 5,
                        align: 'right',
                    }"
                />
            </div>
        </template>
    </v-group>
</template>

<script setup>
import { ref, onMounted, defineProps } from 'vue';

import primaryKeyImage from '@/assets/primary-key.png';
import notNull from '@/assets/icons8-diamonds-40.png';
import imageNullImage from '@/assets/icons8-diamonds-40-white.png';

const { position, tableData, widthTable } = defineProps({
    position: Object,
    tableData: Object,
    widthTable: Number,
});

const primaryKey = ref('');
const imageNotNull = ref('');
const imageNull = ref('');

onMounted(() => {
    const primaryKeyImageObject = new window.Image();

    primaryKeyImageObject.src = primaryKeyImage;

    primaryKeyImageObject.onload = () => {
        primaryKey.value = primaryKeyImageObject;
    };

    const imageNotNullObject = new window.Image();

    imageNotNullObject.src = notNull;

    imageNotNullObject.onload = () => {
        imageNotNull.value = imageNotNullObject;
    };

    const imageNullObject = new window.Image();

    imageNullObject.src = imageNullImage;

    imageNullObject.onload = () => {
        imageNull.value = imageNullObject;
    };
});
</script>
