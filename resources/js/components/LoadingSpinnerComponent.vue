<template>
    <div
        v-if="data.loading"
        class="absolute top-0 left-0 surface-300 opacity-90 w-screen h-screen flex align-items-center justify-content-center"
    >
        <div class="w-min h-min m-auto ali">
            <ProgressSpinner
                class="w-15rem h-15rem"
                animationDuration="1s"
                strokeWidth="3"
            />
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";

const data = ref({ loading: false });

function setLoading(param) {
    data.value.loading = param;
}

defineExpose({
    setLoading,
});
</script>
