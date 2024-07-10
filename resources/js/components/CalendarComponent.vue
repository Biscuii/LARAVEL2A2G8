<template>
    <div>
        <v-calendar
            :attributes="attributes"
            @dayclick="handleDayClick"
            @rangeselect="handleRangeSelect"
        />
        <input type="hidden" id="blocked-dates-input">
        <input type="hidden" id="unblocked-dates-input">
    </div>
</template>

<script setup>
import {ref, onMounted} from 'vue';
import VCalendar from 'v-calendar';

// Props
const props = defineProps({
    initialDates: {
        type: Array,
        required: true,
    },
});

const blockedDates = ref([]);
const unblockedDates = ref([]);

// Prépare les attributs pour les dates bloquées
const attributes = ref(props.initialDates.map(date => ({
    key: 'blocked',
    dates: {start: date.date_debut, end: date.date_fin},
    highlight: {
        backgroundColor: 'red',
    },
    popover: {
        label: 'Indisponible',
    },
})));

function handleDayClick(day) {
    const dateStr = day.date; // Format de date adapté
    removeBlockedDate(dateStr);
}

function handleRangeSelect(info) {
    addBlockedDate(info.start, info.end);
}

function addBlockedDate(start, end) {
    blockedDates.value.push({date_debut: start, date_fin: end});
    updateBlockedDatesInput();
}

function removeBlockedDate(date) {
    unblockedDates.value.push({date_debut: date, date_fin: date});
    updateUnblockedDatesInput();
}

function updateBlockedDatesInput() {
    document.getElementById('blocked-dates-input').value = JSON.stringify(blockedDates.value);
}

function updateUnblockedDatesInput() {
    document.getElementById('unblocked-dates-input').value = JSON.stringify(unblockedDates.value);
}
</script>

<style scoped>
#calendar {
    max-width: 900px;
    margin: 0 auto;
}
</style>
