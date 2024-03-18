import "./bootstrap";

import { createApp } from "vue";
import HelloWorld from "./components/Test.vue";
import HomePage from "./components/HomePage.vue";
import CoupangBestPage from "./components/CoupangBest.vue";

const app = createApp({});
app.component("hello-world", HelloWorld).mount("#hello-world");
app.component("home-page", HomePage).mount("#home-page");
app.component("coupang-best-page", CoupangBestPage).mount("#coupang-best-page");