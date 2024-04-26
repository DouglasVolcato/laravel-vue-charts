<template>
    <LoadingSpinner ref="loadingSpinner" />
    <TabView>
        <TabPanel>
            <template #header>
                <span class="font-bold white-space-nowrap m-3">Por Região</span>
            </template>
            <div class="w-10 m-auto">
                <BarChartComponent ref="regionQuantityChart" />
            </div>
        </TabPanel>
        <TabPanel>
            <template #header>
                <span class="font-bold white-space-nowrap m-3"
                    >Por Descrição</span
                >
            </template>
            <div class="w-10 m-auto">
                <BarChartComponent ref="descriptionQuantityChart" />
            </div>
        </TabPanel>
        <TabPanel>
            <template #header>
                <span class="font-bold white-space-nowrap m-3">Por Estado</span>
            </template>
            <div class="w-10 m-auto">
                <BarChartComponent ref="stateQuantityChart" />
            </div>
        </TabPanel>
        <TabPanel>
            <template #header>
                <span class="font-bold white-space-nowrap m-3"
                    >Por Região/Ano</span
                >
            </template>
            <div class="w-10 m-auto">
                <BarChartComponent ref="regionYearQuantityChart" />
            </div>
        </TabPanel>
        <TabPanel>
            <template #header>
                <span class="font-bold white-space-nowrap m-3"
                    >Por Estado/Ano</span
                >
            </template>
            <div class="w-10 m-auto">
                <BarChartComponent ref="stateYearQuantityChart" />
            </div>
        </TabPanel>
        <TabPanel>
            <template #header>
                <span class="font-bold white-space-nowrap m-3"
                    >Por Ano/Região</span
                >
            </template>
            <div class="w-10 m-auto">
                <BarChartComponent ref="yearRegionQuantityChart" />
            </div>
        </TabPanel>
        <TabPanel>
            <template #header>
                <span class="font-bold white-space-nowrap m-3"
                    >Por Ano/Estado</span
                >
            </template>
            <div class="w-10 m-auto">
                <BarChartComponent ref="yearStateQuantityChart" />
            </div>
        </TabPanel>
    </TabView>
</template>

<script setup>
import LoadingSpinner from "../components/LoadingSpinnerComponent.vue";
import BarChartComponent from "../components/BarChartComponent.vue";
import { onMounted, ref } from "vue";
import axios from "axios";

const loadingSpinner = ref();
const regionQuantityChart = ref();
const descriptionQuantityChart = ref();
const stateQuantityChart = ref();
const regionYearQuantityChart = ref();
const stateYearQuantityChart = ref();
const yearRegionQuantityChart = ref();
const yearStateQuantityChart = ref();

onMounted(() => {
    loadingSpinner.value.setLoading(true);
    getTotalCnaeConsumeData().then((response) => {
        setChartsData(response.data).then(() => {
            loadingSpinner.value.setLoading(false);
        });
    });
});

async function getTotalCnaeConsumeData() {
    return await axios.get("/total-cnae-consume-data/get");
}

async function setChartsData(data) {
    regionQuantityChart.value.setComponentData(data.regionGroup.regions, [
        {
            label: "Quantidade x Região",
            body: data.regionGroup.quantities,
        },
    ]);

    descriptionQuantityChart.value.setComponentData(
        data.descriptionGroup.descriptions,
        [
            {
                label: "Quantidade x Descrição",
                body: data.descriptionGroup.quantities,
            },
        ]
    );

    console.log(data.stateGroup)
    stateQuantityChart.value.setComponentData(data.stateGroup.states, [
        {
            label: "Quantidade x Estado",
            body: data.stateGroup.quantities,
        },
    ]);

    regionYearQuantityChart.value.setComponentData(
        data.regionYearGroup.regions,
        data.regionYearGroup.years.map((item) => ({
            label: item.year,
            body: item.quantities,
        })),
        false
    );

    stateYearQuantityChart.value.setComponentData(
        data.stateYearGroup.states,
        data.stateYearGroup.years.map((item) => ({
            label: item.year,
            body: item.quantities,
        })),
        false
    );

    yearRegionQuantityChart.value.setComponentData(
        data.yearRegionGroup.years,
        data.yearRegionGroup.regions.map((item) => ({
            label: item.region,
            body: item.quantities,
        })),
        false
    );

    yearStateQuantityChart.value.setComponentData(
        data.yearStateGroup.years,
        data.yearStateGroup.states.map((item) => ({
            label: item.state,
            body: item.quantities,
        })),
        false
    );
}
</script>
