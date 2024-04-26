import ProgressSpinner from "primevue/progressspinner";
import SplitterPanel from "primevue/splitterpanel";
import InputText from "primevue/inputtext";
import Splitter from "primevue/splitter";
import TabPanel from 'primevue/tabpanel';
import TabMenu from "primevue/tabmenu";
import PrimeVue from "primevue/config";
import TabView from 'primevue/tabview';
import Button from "primevue/button";
import Dialog from "primevue/dialog";
import Image from "primevue/image";
import Chart from "primevue/chart";
import Card from "primevue/card";
import { createApp } from "vue";
import "./bootstrap";

import "primevue/resources/themes/saga-blue/theme.css";
import "/node_modules/primeflex/primeflex.css";
import "primevue/resources/primevue.min.css";
import "primeicons/primeicons.css";

import GetTotalCnaeConsumePage from "./pages/GetTotalCnaeConsumePage.vue";

const app = createApp({});

app.use(PrimeVue);
app.component("ProgressSpinner", ProgressSpinner);
app.component("SplitterPanel", SplitterPanel);
app.component("InputText", InputText);
app.component("Splitter", Splitter);
app.component("TabPanel", TabPanel);
app.component("TabMenu", TabMenu);
app.component("TabView", TabView);
app.component("Button", Button);
app.component("Dialog", Dialog);
app.component("Chart", Chart);
app.component("Image", Image);
app.component("Card", Card);

app.component("total-cnae-consume-charts-page", GetTotalCnaeConsumePage);

app.mount("#app");
