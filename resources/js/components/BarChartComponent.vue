<template>
    <Chart
        class="w-auto"
        type="bar"
        :data="chartData"
        :options="chartOptions"
    />
</template>

<script setup>
import { ref } from "vue";

const chartData = ref();
const chartOptions = ref();

function setComponentData(labels, data, unidimentional = true) {
    chartData.value = setChartData(labels, data, unidimentional);
    chartOptions.value = setChartOptions();
}

const setChartData = (labels, data, unidimentional) => {
    const getHue = (value) => `hsl(${(value * 137.508) % 360}, 70%, 50%)`;
    const getRandomColors = (datasetLength, index) => {
        const colors = [getHue(index)];
        if (unidimentional) {
            for (let i = 1; i <= datasetLength; i++) {
                colors.push(getHue(index + i));
            }
        }
        return colors;
    };

    return {
        labels,
        datasets: data.map((item, index) => ({
            label: item.label,
            data: item.body,
            backgroundColor: getRandomColors(item.body.length, index),
            borderColor: Array(item.body.length).fill("#000"),
            borderWidth: 2,
        })),
    };
};

const setChartOptions = () => {
    const documentStyle = getComputedStyle(document.documentElement);
    const textColor = documentStyle.getPropertyValue("--text-color");
    const textColorSecondary = documentStyle.getPropertyValue(
        "--text-color-secondary"
    );
    const surfaceBorder = documentStyle.getPropertyValue("--surface-border");
    return {
        plugins: {
            legend: {
                labels: {
                    color: textColor,
                },
            },
        },
        scales: {
            x: {
                ticks: {
                    color: textColorSecondary,
                },
                grid: {
                    color: surfaceBorder,
                },
            },
            y: {
                beginAtZero: true,
                ticks: {
                    color: textColorSecondary,
                },
                grid: {
                    color: surfaceBorder,
                },
            },
        },
    };
};

defineExpose({
    setComponentData,
});
</script>
